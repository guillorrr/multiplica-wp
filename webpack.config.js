const {VueLoaderPlugin} = require('vue-loader');
const path = require('path');
const pkg = require('./package.json');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');

const webpackConfig = {
    mode: "development",
    entry: {
        app: path.join(__dirname, 'src', './index.js')
    },
    output: {
        // filename: 'js/[name].js',
        // path: path.resolve(__dirname, 'public'),
        // publicPath: '/'
        path: path.resolve(__dirname, "./dist"),
        filename: 'bundle.js'
    },
    module: {
        rules: [
            {
                test: /\.vue$/,
                use: 'vue-loader',
            },
            {
                test: /\.js$/,
                exclude: /node_modules/,
                use: {
                    loader: 'babel-loader',
                    options: {
                        presets: ['env']
                    }
                }
            },
            {
                test: /\.s?[c]ss$/i,
                use: [
                    MiniCssExtractPlugin.loader,
                    'css-loader',
                    'sass-loader',
                ],
            },
            {
                test: /\.sass$/i,
                use: [
                    MiniCssExtractPlugin.loader,
                    'css-loader',
                    {
                        loader: 'sass-loader',
                        options: {
                            sassOptions: {indentedSyntax: true},
                        },
                    },
                ],
            },
            {
                test: /\.(woff(2)?|ttf|eot|svg)(\?v=\d+\.\d+\.\d+)?$/,
                use: [
                    {
                        loader: 'file-loader',
                        options: {
                            name: '[name].[ext]',
                            outputPath: 'fonts/'
                        }
                    }
                ]
            },
            // {
            //     test: /\.(png|svg|jpg|jpeg|gif)$/,
            //     use: {
            //         loader: 'file-loader',
            //         options: {
            //             name: `img/[name].ext`
            //         }
            //     }
            // }
        ]
    },
    plugins: [
        new VueLoaderPlugin(),
        new BrowserSyncPlugin({
            // fixes pagination urls otherwise they get re-written to use the service `container_name`...
            host: 'localhost',
            // service container_name...
            proxy: 'https://myapp.local/',
            // matches the port number exposed earlier...
            port: 3000,
            https: true,
            files: ['**/*.php'],
            cors: true,
            reloadDelay: 0,
            open: false
        }),
        new MiniCssExtractPlugin({
            disable: false,
            filename: 'theme.css',
            allChunks: true
        })
    ],
    resolve: {
        alias: {vue: 'vue/dist/vue.esm-bundler.js'},
    },
};

module.exports = webpackConfig;
