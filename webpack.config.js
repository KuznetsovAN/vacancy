"use strict";
var webpack = require('webpack');
var ExtractTextPlugin = require ('extract-text-webpack-plugin');

const BundleAnalyzerPlugin = require('webpack-bundle-analyzer').BundleAnalyzerPlugin;


module.exports = {
  context: __dirname + '/src',
  entry: {
      news:'./news',
      common: './common'
  },
  output: {
    path: __dirname + '/assets/',
    filename: '[name].js',
    library: '[name]'
  },
  watch:true,
  module: {
    loaders: [
      {test: /\.js$/, loaders: 'babel-loader',  query: { presets: ['es2015','stage-1']}},
      {test: /\.jsx$/, loaders: 'babel-loader',  exclude: /node_modules/, query: { presets: ['es2015', 'react']}},
      {test: /\.html$/, loader: 'raw'},
      {test: /\.css$/, loader: ExtractTextPlugin.extract({ fallback: 'style-loader', use: 'css-loader!clean-css-loader' })},
      {test: /\.less$/, loader: ExtractTextPlugin.extract({ fallback: 'style-loader', use: 'css-loader!clean-css-loader!less-loader' })},
      { test: /\.woff(2)?(\?v=[0-9]\.[0-9]\.[0-9])?$/, loader:  "url-loader?limit=10000&mimetype=application/font-woff&name=/fonts/[name].[ext]&publicPath=/assets/" },
      { test: /\.(ttf|eot)(\?v=[0-9]\.[0-9]\.[0-9])?$/, loader: "file-loader?name=/fonts/[name].[ext]&publicPath=/assets/" },
      {test: /\.(jpe?g|png|gif|svg)$/i,loaders: [
          {
              loader: 'image-webpack-loader',
              options: {
                  query: {
                      mozjpeg: {
                          progressive: true,
                      },
                      gifsicle: {
                          interlaced: true,
                      },
                      optipng: {
                          optimizationLevel: 7,
                      }
                  }
              }
          },
          {
              loader: 'url-loader?limit=2048&hash=sha512&digest=hex&name=/images/[hash].[ext]&publicPath=/assets/',
          }

          ]}
    ]
  },
  plugins: [
      new ExtractTextPlugin('/css/[name].css'),
      new webpack.optimize.UglifyJsPlugin({
          beautify: false,
          comments: false,
          minimize: true,
          compress: {
              sequences     : true,
              booleans      : true,
              loops         : true,
              unused      : true,
              warnings    : false,
              drop_console: true,
              unsafe      : true
          }
      }),
      new webpack.optimize.CommonsChunkPlugin({
        name:'common'
      }),
      new webpack.ProvidePlugin({
          $: 'jquery',
          jQuery: 'jquery'
      }),
  ]
};

/*
module.exports.plugin.push(

);*/
