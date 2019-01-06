'use strict';

var gulp            = require('gulp'),
    sass            = require('gulp-sass'),
    path            = require('path'),
    handlebars      = require('handlebars'),
    compilehbs      = require('gulp-compile-handlebars'),
    layouts         = require('handlebars-layouts'),
    rename          = require('gulp-rename'),
    data            = require('./data/site-data.json'),
    config          = require('./config'),
    fs              = require('file-system'),
    autoprefixer    = require('gulp-autoprefixer'),
    browserify      = require('gulp-browserify'),
    del             = require('del'),
    gutil           = require('gulp-util'),
    filelist        = require('gulp-filelist'),
    files;

try {
  files = require('./' + config.paths.tmp + '/' + 'filelist.json');
} catch (err) {
    console.log('###########################################');
    console.log(err.message);
    console.log('Run gulp audit to generate file list');
    console.log('###########################################');
}


sass.compiler = require('node-sass');
layouts.register(handlebars);

//function for generating a file on the fly
function string_src(filename, string) {
  var src = require('stream').Readable({ objectMode: true });
  src._read = function () {
    this.push(new gutil.File({
      cwd: "",
      base: "",
      path: filename,
      contents: new Buffer(string)
    }));
    this.push(null);
  }
  return src
}

gulp.task('css', function(){
    return gulp.src(path.join(config.paths.src, '/scss/**/*.scss'))
        .pipe(sass(config.sassOptions)
            .on('error', sass.logError))
        .pipe(autoprefixer(config.autoprefixerOptions))
        .pipe(gulp.dest(path.join(config.paths.built, '/css')))
});

gulp.task('css:watch', function(){
    gulp.watch(path.join(config.paths.src, '/scss/**/*.scss'), ['css']);
});

gulp.task('pages', ['audit'], function(){
    console.log('###########################################');
    console.log('Audited ' + files.length + ' files in source folders');
    console.log('###########################################');
    let errCount = 0;
    let pageCount = 0;
    let pagesTested = 0;
    const pageTypes = ['scss','hbs','js'];
    let nestLvl = 0;
    loopPageSet(data.site.pages, "");
    countPages(data.site.pages);

    function countPages(set){
        for (var key in set) {
            pageTypes.forEach(function(type){
                pageCount++;
            })
            if (set[key].subpages) {
                countPages(set[key].subpages);
            }
        }
    }

    function loopPageSet(set, parentCtx, resetCtx = false) {
        // Loop over all pages in site data
        for (var key in set) {
            // Handle level of nesting for subpages
            let newParentCtx;
            if (!resetCtx || nestLvl > 0) {
                newParentCtx = parentCtx;
            } else {
                newParentCtx = "";
            }

            // Establish defaults
            let datapath = key;
            let pageclasses = "page-" + set[key].name;
            let classprefix;
            let defaultSCSS = "@import 'core';";
            let defaultHBSattrs = `data=pages.${datapath} additionalClasses="${pageclasses}`;

            if (nestLvl > 0) {
                const slashes = new RegExp('\/', 'g');
                const lastSlash = new RegExp('\/$', 'g');
                const lastDash = new RegExp('\-$', 'g');
                const lastDot = new RegExp('\.$', 'g');

                // Logic for nested datapath
                datapath = newParentCtx.replace(slashes,'.subpages.') + key;

                // Logic for nested page classes
                classprefix = newParentCtx.replace(slashes,'-').replace(lastDash, '');
                pageclasses = "page-" + classprefix + " page-" + classprefix + "-" + set[key].name;

                defaultSCSS = `@import '../${newParentCtx.replace(lastSlash, "")}';`;
                defaultHBSattrs = `data=pages.${datapath} parentPath="${newParentCtx}" additionalClasses="${pageclasses}`;
            }

            const defaultHBS = 
    `{{#embed "templates/page" ${defaultHBSattrs}"}}
    {{#content "head" mode="append"}}
    {{!-- append page specific head tags --}}
    {{/content}}
    {{#content "body" mode="append"}}
    {{!-- page specific body content --}}
    {{/content}}
    {{/embed}}`;
            const defaultJS = '/* Default JS*/';

            pageTypes.forEach(function(type){
                // Check if a file.[type] exists for this page by trying to access the source file by key
                ((key, type, set) => {
                    let filedir = (() => {
                        let tmpPath = config.paths.src;
                        if (type == 'hbs') {
                            tmpPath = path.join(tmpPath, '/' + type + '/pages/', newParentCtx);
                        } else {
                            tmpPath = path.join(tmpPath, '/' + type, newParentCtx);
                        }
                        return tmpPath;
                    })();
                    let filename = set[key].name + '.' + type;
                    let filepath = path.join(filedir, filename);
                    return fs.access(filepath, (err) => {
                        if (err) {
                            errCount++;
                            // There is no file.[type] by that name
                            console.log('###########################################');
                            console.log('Created ' + set[key].name + '.' + type);
                            console.log('###########################################');
                            let content;
                            switch(type) {
                                case 'hbs':
                                    content = defaultHBS;
                                    break;
                                case 'js':
                                    content = defaultJS;
                                    break;
                                case 'scss':
                                    content = defaultSCSS;
                                    break;
                                default:
                                    content = 'Content undefined based on page type';
                            }
                            // Create a file.[type] for the page
                            string_src(set[key].name + '.' + type, content)
                                .pipe(gulp.dest(filedir));
                        } else {
                            // console.log('No error on: ' + key + "." + type);
                        }
                        pagesTested++;
                        testSuccess();
                    });
                })(key, type, set);
            });

            //if page is the last object in a set, reset parent context to "";
            function isLastPage(){
                if (Object.keys(set).slice(-1)[0] == key) {
                    return true
                } else {
                    return false
                }
            }

            // If this page has subpages
            if (set[key].subpages) {
                nestLvl++;
                // Establish the context for the subpages
                newParentCtx += key + "/";
                // Run page generation on subpages
                loopPageSet(set[key].subpages, newParentCtx, isLastPage());
            }

            if (resetCtx) {
                nestLvl = 0;
                newParentCtx = "";
            }
        }
    }

    function testSuccess(){
        // Mechanism to handle async page generation
        if (pagesTested == pageCount && errCount <= 0) {
             console.log('##################################################');
             console.log('Congratulations!');
             console.log('Source files are in sync with pages in site data!');
             console.log('There are ' + pageCount / pageTypes.length + ' pages; each with ' + pageTypes.join(', ').toUpperCase());
             console.log('##################################################');
        }
    }
});

gulp.task('audit', function(){
    const pagefiles = [
        path.join(config.paths.src, '/hbs/pages/**/*.hbs'),
        path.join(config.paths.src, '/js/**/*.js'),
        "!" + path.join(config.paths.src, '/js/_modules/*.js'),
        path.join(config.paths.src, '/scss/**/*.scss'),
        "!" + path.join(config.paths.src, '/scss/_partials/*.scss')
    ];

    return gulp.src(pagefiles)
    .pipe(filelist('filelist.json', { relative: true }))
    .pipe(gulp.dest(config.paths.tmp));
});


gulp.task('hbs', function(){
    let navIndex = 0;
    gulp.src([
        path.join(config.paths.src, '/hbs/pages/**/*.hbs'),
        path.join(config.paths.src, 'functions.hbs')
        ])
        .pipe(compilehbs(data.site, {
                            ignorePartials: true,
                            batch: [path.join(config.paths.src, '/hbs/partials')],
                            helpers: {
                                eq: function(arg1, arg2, options) {
                                    return (arg1 == arg2) ? options.fn(this) : options.inverse(this);
                                },
                                log: function(arg1) {
                                    console.log(arg1);
                                },
                                safe: function(string){
                                    return new handlebars.SafeString(string);
                                },
                                concat: function(arg1, arg2){
                                    return arg1 + arg2;
                                },
                                navCount: function(){
                                    return navIndex++;
                                },
                                both: function(arg1, arg2, options){
                                    if(arg1 && arg2) {
                                    return options.fn(this);
                                  } else {
                                    return options.inverse(this);
                                  }
                                }
                            }
                        }))
        .pipe(rename({
            extname: config.types.ext
        }))
    .pipe(gulp.dest(config.paths.built));
});

gulp.task('hbs:watch', function(){
    gulp.watch(path.join(config.paths.src, '/hbs/*.hbs'), ['hbs']);
});

gulp.task('images', function(){
    gulp.src(path.join(config.paths.images, '*.*'))
        .pipe(gulp.dest(path.join(config.paths.built, 'img')));
});

gulp.task('js', function() {
    // Single entry point to browserify
    gulp.src([
            path.join(config.paths.src, '/js/**/*.js'),
            "!" + path.join(config.paths.src, '/js/_modules/*.js')
        ])
        .pipe(browserify())
        .pipe(gulp.dest(path.join(config.paths.built, '/js')))
});

gulp.task('js:watch', function(){
    gulp.watch(path.join(config.paths.src, '/js/*.js'), ['js']);
});

gulp.task('theme', function(){
    // Generates comment string for theme registration
    let output = "/*\n";
    for (var key in data.site.theme) {
        if (data.site.theme.hasOwnProperty(key)) {
            output+= key + ': ' + data.site.theme[key] + '\n';
        }
    }
    output+= "/*";
    // Publishes the necessary string in style.css
    return string_src("style.css", output)
        .pipe(gulp.dest(config.paths.built));
});

gulp.task('clean', function(){
    del([config.paths.built,
        config.paths.tmp
        ], {force:true});
});

gulp.task('build', ['css', 'hbs', 'js', 'images', 'theme']);

gulp.task('build:watch', function(){
    gulp.watch([
        path.join(config.paths.src, '/js/*.js'),
        path.join(config.paths.src, '/hbs/**/**/*.hbs'),
        path.join(config.paths.src, 'functions.hbs'),
        path.join(config.paths.src, '/scss/**/*.scss'),
        path.join(config.paths.images, '*.*')
        ], ['build']);
});

gulp.task('default', ['build']);



