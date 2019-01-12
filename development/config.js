'use strict';

/**
 * Path configuration
 */
exports.paths = {
	src: 'src',
	images: 'img',
	fonts: 'fonts',
	tmp: 'tmp',
	built: '../wordpress/wp-content/themes/fixstream'
};

exports.types = {
	ext: '.php'
};


/**
 * gulp-sass configuration
 * https://www.npmjs.com/package/gulp-sass
 */
exports.sassOptions = {
	outputStyle: 'compressed',
	includePaths: [
		'./src/scss/_partials/',
		'./node_modules/reset-css/sass/'
	],
	themeRoot: '/foo/'
};


/**
* https://github.com/postcss/autoprefixer#options
* browsers (array): list of queries for target browsers.
* Try to not use it.  The best practice is to use .browserslistrc config
* or browserslist key in package.json to share target browsers with
* Babel, ESLint and Stylelint. See Browserslist docs for available
* queries and default value.
*/
exports.autoprefixerOptions = {
	browsers: ['last 2 versions'],
	cascade: false,
	grid: true
}