const Encore = require('@symfony/webpack-encore');

Encore
    // directory where compiled assets will be stored
    .setOutputPath('public/build/')
    // public path used by the web server to access the output path
    .setPublicPath('/build')
    // entry
    .addEntry('app', './assets/app.js')
    // enable single runtime chunk for multiple pages
    .enableSingleRuntimeChunk()
    // enable source maps
    .enableSourceMaps(!Encore.isProduction())
    // enable versioning (e.g. app.css?version=1234)
    .enableVersioning(Encore.isProduction())
    // enable Sass/SCSS files
    .enableSassLoader()
    // enable React preset if needed
    //.enableReactPreset()
    ;

module.exports = Encore.getWebpackConfig();
