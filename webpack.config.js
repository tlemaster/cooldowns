var Encore = require('@symfony/webpack-encore');

Encore
    // the project directory where compiled assets will be stored
    .setOutputPath('public/build/')

    // the public path used by the web server to access the previous directory
    .setPublicPath('/build')

    // empty the outputPath dir before each build
    .cleanupOutputBeforeBuild()

    // enable source maps during development
    .enableSourceMaps(!Encore.isProduction())

    // uncomment to create hashed filenames (e.g. app.abc123.css)
    // .enableVersioning(Encore.isProduction())

    // main vue js entry point
    .addEntry('app', './assets/js/app.js')

    // add a sass or scss file
    // .addStyleEntry('css/main', './assets/css/main.scss')

    // allow sass/scss files to be processed
    .enableSassLoader()

    // uncomment for legacy applications that require $/jQuery as a global variable
    // .autoProvidejQuery()

    // Enable Vue loader
    .enableVueLoader()
;

module.exports = Encore.getWebpackConfig();
