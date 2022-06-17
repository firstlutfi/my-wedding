const mix = require("laravel-mix");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js("resources/js/app.js", "public/js/app.js")
    .js("resources/js/dashboard.js", "public/js/dashboard.js")
    .js("resources/js/guest_book.js", "public/js/guest_book.js")
    .postCss("resources/css/tailwind.css", "public/css")
    .postCss("resources/css/invitation-dark.css", "public/css")
    .sass("resources/sass/app.scss", "public/css")
    .version();
