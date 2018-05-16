const { mix } = require('laravel-mix');

mix.setPublicPath(path.normalize('dist'));

mix.options({
  processCssUrls: false,
  postCss: [require('autoprefixer')],
});


mix
   .js('src/js/app.js', 'dist/js')
   .sass('src/scss/app.scss', 'dist/css')
   // .sourceMaps();
