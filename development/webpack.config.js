const path = require('path');
const UglifyJsPlugin = require('uglifyjs-webpack-plugin');

const mode = process.env['NODE_ENV'] || 'production';
const watch = mode === 'development';

module.exports = {
    mode,
    watch,
    entry: './src/js/head.js',
    output: {
        filename: 'head.js',
        path: path.resolve(__dirname, '../wordpress/wp-content/themes/fixstream/js'),
    },
    optimization: {
        minimizer: [new UglifyJsPlugin({
            extractComments: false,
            uglifyOptions: {
                comments: false,
                mangle: true
            },
            parallel: 4
        })]
    },
    module: {
        rules: [
            {
                enforce: "pre",
                test: /\.js$/,
                exclude: /node_modules/,
                loader: "eslint-loader",
            },
            {
                test: /\.m?js$/,
                exclude: /(node_modules|bower_components)/,
                use: {
                    loader: 'babel-loader',
                    options: {
                        presets: ['@babel/preset-env']
                    }
                }
            }
        ]
    }
}
