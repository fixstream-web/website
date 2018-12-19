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
    gutil           = require('gulp-util');

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
    return gulp.src(path.join(config.paths.src, '/scss/*.scss'))
        .pipe(sass(config.sassOptions)
            .on('error', sass.logError))
        .pipe(autoprefixer(config.autoprefixerOptions))
        .pipe(gulp.dest(path.join(config.paths.built, '/css')))
});

gulp.task('css:watch', function(){
    gulp.watch(path.join(config.paths.src, '/scss/**/*.scss'), ['css']);
});

gulp.task('pages', function(){
    const pageTypes = ['scss','hbs','js'];
    loopPageSet(data.site.pages);

    function loopPageSet(set) {
        // Loop over all pages in site data
        for (var key in set) {

            // Establish defaults
            // Needs to be nested in object loop so we have access to key
            const defaultHBS =
    `{{#embed "templates/page" data=pages.${key} additionalClasses="page-${key}"}}
    {{#content "head" mode="append"}}
    {{!-- append page specific head tags --}}
    {{/content}}
    {{#content "body" mode="append"}}
    {{!-- page specific body content --}}
    {{/content}}
    {{/embed}}`;
            const defaultJS = '/* Default JS*/';
            const defaultSCSS = "@import '_partials/core';";

            pageTypes.forEach(function(type){
                // Check if a file.[type] exists for this page                
                // Try to access the source file by key
                ((key, type) => {
                    // let filepath = path.join(config.paths.src, '/' + type + '/', key + '.' + type);
                    let filedir = (type == 'hbs' ? path.join(config.paths.src, '/' + type + '/pages/') : path.join(config.paths.src, '/' + type + '/'));
                    let filename = key + '.' + type;
                    let filepath = path.join(filedir, filename);
                    return fs.access(filepath, (err) => {
                        if (err) {
                            // There is no file.[type] by that name
                            console.log('###########################################');
                            console.log('No ' + type.toUpperCase() + ' file found for: ' + key);
                            console.log('The build has created it');
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
                            string_src(key + '.' + type, content)
                                .pipe(gulp.dest(filedir));
                        } else {
                            // console.log('No error on: ' + key + "." + type);
                        }
                    });
                })(key, type);
            });
            //**TODO: Handle subpage generation
                // Place into parent folder in hbs/pages/ (?)
            // if (set[key].subpages) {
            //     loopPageSet(set[key].subpages);
            // }
        }
    }
    
    //**TODO: Create an errCount checker for success message
        // Encountering an async issue
        // Need to wait until all looping is done before testing errCount
    /*
    if (errCount <= 0) {
         console.log('##################################################');
         console.log('Source files are in sync with pages in site data!');
         console.log('##################################################');
    }
    */
});

gulp.task('hbs', function(){
    gulp.src(path.join(config.paths.src, '/hbs/pages/*.hbs'))
        .pipe(compilehbs(data.site, {
                            ignorePartials: true,
                            batch: [path.join(config.paths.src, '/hbs/partials')],
                            helpers: {
                                eq: function(arg1, arg2, options) {
                                    return (arg1 == arg2) ? options.fn(this) : options.inverse(this);
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

gulp.task('js', function() {
    // Single entry point to browserify
    gulp.src(path.join(config.paths.src, '/js/*.js'))
        .pipe(browserify())
        .pipe(gulp.dest(path.join(config.paths.built, '/js')))
});

gulp.task('js:watch', function(){
    gulp.watch(path.join(config.paths.src, '/js/*.js'), ['js']);
});

gulp.task('functions', function(){
    // Processes any HBS in functions.php
        // Loops site nav to assign templates
    gulp.src(path.join(config.paths.src, 'functions.hbs'))
        .pipe(compilehbs(data.site, {}))
        .pipe(rename({
            extname: config.types.ext
        }))
    .pipe(gulp.dest(config.paths.built));
});

gulp.task('theme', ['functions'], function(){
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
    del(config.paths.built, {force:true});
});

gulp.task('build', ['css', 'hbs', 'js', 'theme']);
gulp.task('default', ['build']);



