const mix = require('laravel-mix')

const is_prod = mix.inProduction() ? true : false

mix
  .options({
    processCssUrls: is_prod,
  })
  .js('src/js/app.js', 'dist/js')
  .sass('src/scss/app.scss', 'dist/css')
  .postCss('src/css/app.css', 'dist/css', [require('tailwindcss')])
  .copyDirectory('src/images', 'dist/images')
