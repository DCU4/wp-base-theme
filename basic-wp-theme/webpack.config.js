const path = require('path');
const ExtractTextPlugin = require("extract-text-webpack-plugin");
const UglifyJsPlugin = require('uglifyjs-webpack-plugin');
const autoprefixer = require('autoprefixer');

module.exports = {
  entry: {
    main: "./src/index",
    home: "./src/templates/home/index",
    press: "./src/templates/press/index",
  },
  mode: 'development',
  output: {
    path: path.resolve(__dirname, "dist"),
    filename: "[name].bundle.js"
  },
  module: {
    rules: [{
        test: /\.js$/,
        exclude: /(node_modules)/,
        use: {
          loader: 'babel-loader',
          options: {
            presets: ['@babel/preset-env']
          }
        }
      },
      {
        test: /\.scss$/,
        use: ExtractTextPlugin.extract({
          fallback: 'style-loader',
          use: [
            {
              loader: 'css-loader',
              options: {sourceMap: true}
            },
            {
              loader: 'postcss-loader',
              options: {
                plugins: () => [autoprefixer()]
              }
            },
            {
              loader: 'sass-loader',
              options: {
                importLoaders: 1,
                sourceMap: true
              }
            },
            {
              loader: "sass-resources-loader",
              options: {
                resources: require(path.join(process.cwd(), "src/sass/utils/utils.js")),
              }
            }
          ]
        })
      },
      {
        test: /\.(png|svg|jpg|gif)$/,
        use: [
          'file-loader'
        ]
      }
    ],
  },
  plugins: [
    new ExtractTextPlugin({
      filename: (getPath) => {
        return getPath('css/[name].css').replace('css/js', 'css');
      },
      allChunks: true
    }),
    new UglifyJsPlugin({
      sourceMap: true,
      uglifyOptions: {
        ie8: false,
        ecma: 8,
        mangle: true,
        output: {
          comments: false,
          beautify: false
        },
        warnings: false
      }
    })
  ]
}
