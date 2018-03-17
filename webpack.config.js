var Encore = require('@symfony/webpack-encore');

Encore
    // the project directory where compiled assets will be stored
    .setOutputPath('public/build/')
    // the public path used by the web server to access the previous directory
    .setPublicPath('/build')
    .cleanupOutputBeforeBuild()
    .enableBuildNotifications()
    .enableSourceMaps(!Encore.isProduction())
    // uncomment to create hashed filenames (e.g. app.abc123.css)
    // .enableVersioning(Encore.isProduction())

    // uncomment to define the assets of the project
     .addEntry('js/jquery.zoom.min', './assets/js/jquery.zoom.min.js')
     .addEntry('js/slick.min', './assets/js/slick.min.js')
     .addEntry('js/main.min', './assets/js/main.js')
     .addEntry('js/nouislider.min', './assets/js/nouislider.min.js')
     .addEntry('js/bootstrap.min', './assets/js/bootstrap.min.js')
    // .addStylentry('css/app', './assets/css/app.scss')

    // uncomment if you use Sass/SCSS files
    // .enableSassLoader()

    // uncomment for legacy applications that require $/jQuery as a global variable
    // .autoProvidejQuery()
;

module.exports = Encore.getWebpackConfig();
