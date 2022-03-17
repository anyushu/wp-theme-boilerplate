const mix = require('laravel-mix')

mix
  .options({
    processCssUrls: false,
  })
  .js('src/js/app.js', 'dist/js')
  .sass('src/scss/app.scss', 'dist/css')
  .copyDirectory('src/images', 'dist/images')
