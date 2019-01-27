const path           = require('path'),
      config         = require('./config'),
      UglifyJsPlugin = require('uglifyjs-webpack-plugin'),
      entry          = require('webpack-glob-entry');
// Note: Mode is intentionally set to hard coded development to turn off unwanted optimizations
module.exports = {
    mode: 'development',
    watch: false,
    entry: entry('./' + config.paths.src + '/js/*.js'),
    output: {
        filename: '[name].js',
        path: path.resolve(__dirname, config.paths.built + '/js'),
    },
    optimization: {
        minimizer: [new UglifyJsPlugin({
            extractComments: false,
            uglifyOptions: {
                comments: false,
                mangle: true
            },
            parallel: 4
        })],
        minimize: true
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
            },
          {
            test: /\.modernizrrc$/,
            loader: "modernizr-loader!json-loader"
          }
        ]
    },
    resolve: {
        alias: {
            modernizr$: path.resolve(__dirname, ".modernizrrc")
        }
    }
}





