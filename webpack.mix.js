const mix = require('laravel-mix');

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

require('laravel-mix-polyfill');

const fs = require('fs');
const path = require('path');
fs.readdirSync(path.join(__dirname, 'resources', 'js', 'pages'))
    .forEach(pageJs => mix.js(`resources/js/pages/${pageJs}`, `public/js/pages/${pageJs}`));

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/plugins/spectre-0.5.8/src/spectre-all.scss', 'public/plugins/spectre-0.5.8/spectre.css')
    .sourceMaps(false, 'inline-source-map')
    .options({
        postCss: [
            require('autoprefixer'),
            require('postcss-flexbugs-fixes')
        ]
    })
    .polyfill({
        enabled: true,
        useBuiltIns: "usage",
        targets: {"firefox": "50", "ie": 11}
    })
    .webpackConfig({
        plugins: [
            new (require('webpack-livereload-plugin'))()
        ]
    })
    .version();
