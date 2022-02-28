const mix = require('laravel-mix');
const webpack = require("webpack");
const glob = require('glob');
const path = require('path');

// const BundleAnalyzerPlugin = require('webpack-bundle-analyzer').BundleAnalyzerPlugin;

// Individually compile each standalone viewmodel as its own bundle
for (let file of glob.sync('app/resources/js/templates/**/*.js')) {
    mix.js(file, 'public/dist/' + file.slice(file.indexOf('js/templates')));
}

mix.webpackConfig({
    resolve: {
        modules: [
            path.resolve('./app/resources/js'),
            path.resolve('./app/resources/sass'),
            path.resolve('./node_modules')
        ]
    },
    plugins: [
        // Dont need to include all locales in our output bundle
        new webpack.IgnorePlugin(/^\.\/locale$/, /moment$/),
        new webpack.IgnorePlugin(/^\.\/languages$/, /numbro$/),
        // new BundleAnalyzerPlugin()
    ],
    // Make sure that commonly used es6 imports are not re-added to each individual viewmodel chunk:
    optimization: {
        splitChunks: {
            cacheGroups: {
                commons: {
                    test: /[\\/]node_modules[\\/]/,
                    name: 'js/vendor',
                    chunks: 'all'
                }
            }
        },
    },
});

mix
    .options({
        processCssUrls: false
    })
    .setResourceRoot('/dist')
    .setPublicPath('public/dist')
    .js('app/resources/js/application.js', 'public/dist/js/application.js')
    .sass('app/resources/sass/application.scss', 'public/dist/css', {
        implementation: require('node-sass')
    })
    .sass('app/resources/sass/editor.scss', 'public/dist/css', {
        implementation: require('node-sass')
    })
    .sass('app/resources/sass/security-login-styles.scss', 'public/dist/css', {
        implementation: require('node-sass')
    })
    .copy('app/resources/js/fontawesome', 'public/dist/js/fontawesome')
    // .sass('app/resources/sass/print.scss', 'public/dist/css')
    .browserSync({
        proxy: 'http://ss-webpack.localhost',
        files: ['public/dist/css/**/*.css', 'public/dist/js/**/*.js', 'app/templates/**/*.ss']
    });
