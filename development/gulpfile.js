'use strict';

const gulp            = require('gulp'),
      webpack         = require('webpack'),
      gulpWebpack     = require('webpack-stream'),
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
      del             = require('del'),
      gutil           = require('gulp-util'),
      filelist        = require('gulp-filelist'),
      zopfli          = require("gulp-zopfli"),
      brotli          = require('gulp-brotli');

let pagefiles;

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

function arr_diff (a1, a2) {
    var a = [], diff = [];
    for (var i = 0; i < a1.length; i++) {
        a[a1[i]] = true;
    }
    for (var i = 0; i < a2.length; i++) {
        if (a[a2[i]]) {
            delete a[a2[i]];
        } else {
            a[a2[i]] = true;
        }
    }
    for (var k in a) {
        diff.push(k);
    }
    return diff;
}


/* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
~~~~~~~~    CSS PIPELINE
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

gulp.task('css:compile', function(){
    return gulp.src(path.join(config.paths.src, '/scss/**/*.scss'))
        .pipe(sass(config.sassOptions)
            .on('error', sass.logError))
        .pipe(autoprefixer(config.autoprefixerOptions))
        .pipe(gulp.dest(path.join(config.paths.built, '/css')))
});

gulp.task('css:brotli', function(){
    return gulp.src(path.join(config.paths.built, '/css/**/*.css'))
            .pipe(brotli.compress({
                      extension: 'br',
                      skipLarger: true,
                      mode: 0,
                      quality: 11,
                      lgblock: 0
                    }))
            .pipe(gulp.dest(function (file) {
                return file.base;
            }))
});

gulp.task('css:gzip', function(){
    return gulp.src(path.join(config.paths.built, '/css/**/*.css'))
            .pipe(zopfli())
            .pipe(gulp.dest(function (file) {
                return file.base;
            }))
});

gulp.task('css:compress', ['css:compile'], function(){
    gulp.start('css:gzip');
    gulp.start('css:brotli');
});


gulp.task('css', ['css:compress']);

gulp.task('css:watch', function(){
    gulp.watch(path.join(config.paths.src, '/scss/**/*.scss'), ['css']);
});


/* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
~~~~~~~~    JS PIPELINE
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

gulp.task('js:compile', function() {
  return gulp.src(path.join(config.paths.src, '/js/head.js'))
    .pipe(gulpWebpack(require('./webpack.config.js'), webpack))
    .pipe(gulp.dest(path.join(config.paths.built, 'js')));
});

gulp.task('js:brotli', function(){
    return gulp.src(path.join(config.paths.built, '/js/**/*.js'))
            .pipe(brotli.compress({
                      extension: 'br',
                      skipLarger: true,
                      mode: 0,
                      quality: 11,
                      lgblock: 0
                    }))
            .pipe(gulp.dest(function (file) {
                return file.base;
            }))
});

gulp.task('js:gzip', function(){
    return gulp.src(path.join(config.paths.built, '/js/**/*.js'))
            .pipe(zopfli())
            .pipe(gulp.dest(function (file) {
                return file.base;
            }))
});

gulp.task('js:compress', ['js:compile'], function(){
    gulp.start('js:gzip');
    gulp.start('js:brotli');
});

gulp.task('js', ['js:compress']);

gulp.task('js:watch', function(){
    gulp.watch(path.join(config.paths.src, '/js/**/*.js'), ['js']);
});


/* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
~~~~~~~~    HBS PIPELINE
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

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
                                concat: function(){
                                    let arry = [];
                                    let idx = 0;
                                    for (var key in arguments) {
                                      if (idx < arguments.length - 1) {
                                        arry.push(arguments[key]);
                                        idx++;
                                      }
                                    }
                                    return arry.join('');
                                },
                                navIndex: function(){
                                    return navIndex;
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
    gulp.watch([
        path.join(config.paths.src, '/hbs/pages/**/*.hbs'),
        path.join(config.paths.src, 'functions.hbs')
        ], ['hbs']);
});


/* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
~~~~~~~~    Source Control
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

gulp.task('pages', ['audit'], function(){
    const pageTypes = ['scss','hbs','js'];
    let errCount = 0,
        pageCount = 0,
        fileCount = 0,
        uniqueJSCount = 0,
        pagesTested = [],
        pagesCreated = [],
        nestLvl = 0;
    loopPageSet(data.site.pages, "");
    countPages(data.site.pages);

    function countPages(set){
        for (var key in set) {
            pageCount++;
            pageTypes.forEach(function(type){
                // There are only JS source files for pages that have uniqueJS in data object
                if (type !== 'js' || set[key].uniqueJS) {
                    fileCount++;
                }
            })
            // Keep track of pages that need unique JS for testing success later
            if (set[key].uniqueJS) {
                uniqueJSCount++;
            }
            // console.log(uniqueJSCount);
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

                    // There are only JS source files for pages that have uniqueJS in data object
                    if (type !== 'js' || set[key].uniqueJS) {                    
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
                                pagesCreated.push(filepath);
                            } else {
                                // console.log('No error on: ' + key + "." + type);
                                pagesTested.push(filepath);
                            }
                            testSuccess();
                        });
                    }
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
        if ((pagesTested.length + pagesCreated.length) == fileCount) {
             console.log('##########################################################');
             console.log('Congratulations!');
             console.log('Source files for all pages in data exist!');
             console.log('There are ' + pageCount + ' pages; each with SCSS and HBS (' + (pageCount * 2) + ' files)');
             console.log('There are ' + uniqueJSCount + ' unique JS files');
             console.log('##########################################################');
             console.log('');

            pagefiles = require('./' + config.paths.tmp + '/' + 'filelist.json');
            // console.log('##########################################################');
            // console.log('Audited ' + pagefiles.length + ' files in source folders');
            // console.log('##########################################################');
            // console.log('');

            if (arr_diff(pagesTested, pagefiles).length > 0) {
                let pageDifs = arr_diff(pagesTested, pagefiles);
                let headIndex = pageDifs.indexOf('src/js/head.js');                
                console.log('##########################################################');
                console.log('The following ('+ pageDifs.length + ') source files exist with no page data association');
                console.log('');
                pageDifs.forEach(function(file){
                    console.log(file);
                });
                console.log('');
                console.log('Review for deletion');
                console.log('##########################################################');
                console.log('');
            }
        }
    }
});

gulp.task('audit', function(){
    const sourcepages = [
        path.join(config.paths.src, '/hbs/pages/**/*.hbs'),
        path.join(config.paths.src, '/js/**/*.js'),
        "!" + path.join(config.paths.src, '/js/_modules/*.js'),
        path.join(config.paths.src, '/scss/**/*.scss'),
        "!" + path.join(config.paths.src, '/scss/_partials/*.scss')
    ];

    return gulp.src(sourcepages)
    .pipe(filelist('filelist.json'))
    .pipe(gulp.dest(config.paths.tmp));
});


/* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
~~~~~~~~    Misc Control
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

gulp.task('images', function(){
    gulp.src(path.join(config.paths.images, '*.*'))
        .pipe(gulp.dest(path.join(config.paths.built, 'img')));
});

gulp.task('fonts', function(){
    gulp.src(path.join(config.paths.fonts, '*.*'))
        .pipe(gulp.dest(path.join(config.paths.built, 'fonts')));
});

gulp.task('assets', ['images', 'fonts']);

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

gulp.task('build', ['css', 'hbs', 'js', 'assets', 'theme']);

gulp.task('build:watch', function(){
    gulp.watch([
        path.join(config.paths.src, '/js/*.js'),
        path.join(config.paths.src, '/hbs/**/**/*.hbs'),
        path.join(config.paths.src, 'functions.hbs'),
        path.join(config.paths.src, '/scss/**/*.scss'),
        path.join(config.paths.images, '*.*'),
        path.join(config.paths.fonts, '*.*')
        ], ['build']);
});

gulp.task('default', ['build']);



