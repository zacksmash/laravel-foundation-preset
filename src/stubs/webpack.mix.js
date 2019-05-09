const mix     = require('laravel-mix');
require('laravel-mix-auto-extract');

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
const localDomain = 'changemeidiot.test';
const assetsPath  = `resources`;
const publicPath  = `public`;

mix
// Add jQuery globally
.autoload({ jquery: ['$', 'jQuery'] })

// Suppress success messages
.disableSuccessNotifications()

// Compile Javascript (ES6)
.js(`${assetsPath}/js/app.js`, `${publicPath}/js`)

// Compile Sass
.standaloneSass(`${assetsPath}/scss/app.scss`, `${publicPath}/css`, {
  includedPaths: ['node_modules']
})

// Utilities
.sourceMaps()
.autoExtract()

// Setup BrowserSync
.browserSync({
  proxy: 'http://' + localDomain,
  host: localDomain,
  notify: false,
  open: false,
  injectChanges: true,
  files: [
    `**/*.php`,
    `${publicPath}/**/*.js`,
    `${publicPath}/**/*.css`
  ],
  // https: {
  //   key: '/Users/YOUR_COMPUTER/.config/valet/Certificates/YOUR_SITE.test.key',
  //   cert: '/Users/YOUR_COMPUTER/.config/valet/Certificates/YOUR_SITE.test.crt'
  // }
})

// Setup versioning (cache-busting)
if (mix.inProduction()) {
  mix.version();
  mix.babel(`${publicPath}/js/main.js`, `${publicPath}/js/main.js`);
}
