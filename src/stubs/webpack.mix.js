let mix = require('laravel-mix');

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

// Set project paths
let localDomain = 'changemeidiot.test';
let assetsPath  = `resources`;
let publicPath  = `public`;

mix
// Suppress success messages
.disableSuccessNotifications()

// Compile Javascript (ES6)
.js(`${assetsPath}/js/app.js`, `${publicPath}/js`)

// Compile Sass
.standaloneSass(`${assetsPath}/scss/app.scss`, `${publicPath}/css`, {
  includedPaths: ['node_modules']
})
.sourceMaps()

// Setup BrowserSync
.browserSync({
  proxy: localDomain,
  host: localDomain,
  notify: false,
  browser: 'google chrome',
  open: 'external',
  injectChanges: true,
  files: [
    `**/*.php`,
    `${publicPath}/**/*.js`,
    `${publicPath}/**/*.css`
  ]
})

// Setup versioning (cache-busting)
if (mix.inProduction()) {
  mix.version();
}
