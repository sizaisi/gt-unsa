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

mix.js("resources/js/app.js", "public/js").scripts(
    [
        "resources/vendor/jquery/jquery.min.js",
        "resources/vendor/bootstrap/js/bootstrap.bundle.min.js"
    ],
    "public/js/vendor.js"
);
/*.postCss("resources/css/app.css", "public/css", [
        require("postcss-import"),
        require("tailwindcss")
    ]);*/

mix.styles(
    [
        "resources/vendor/fontawesome-free-5.14.0-web/css/all.min.css",
        "resources/css/adminlte.css"
    ],
    "public/css/app.css"
);

mix.browserSync({
    proxy: "http://127.0.0.1:8000",
    open: false
});

mix.disableNotifications();

mix.copy(
    "resources/vendor/fontawesome-free-5.14.0-web/webfonts",
    "public/webfonts"
);
mix.copy("resources/img", "public/img");

mix.version();