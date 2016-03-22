var gulp = require('gulp');
var elixir = require('laravel-elixir');

var bowerDir = 'bower_components';
var publicDir = 'public';
var cssDir = publicDir + '/css';
var fontsDir = publicDir + '/fonts';
var jsDir = publicDir + '/js';
var imgDir = publicDir + '/img';

/**
 * Default gulp is to run this elixir stuff
 */
elixir(function(mix) {
  mix.copy(bowerDir + '/bootstrap/dist/fonts', fontsDir)
     .copy(bowerDir + '/bootstrap/dist/css/bootstrap.min.css', cssDir + '/bootstrap.min.css')
     .copy(bowerDir + '/bootstrap/dist/js/bootstrap.min.js', jsDir + '/bootstrap.min.js')

     .copy(bowerDir + '/datatables/media/css/dataTables.bootstrap.min.css', cssDir + '/dataTables.bootstrap.min.css')
     .copy(bowerDir + '/datatables/media/js/dataTables.bootstrap.min.js', jsDir + '/dataTables.bootstrap.min.js')
     .copy(bowerDir + '/datatables/media/images', imgDir)

     .copy(bowerDir + '/font-awesome/css/font-awesome.min.css', cssDir + '/font-awesome.min.css')
     .copy(bowerDir + '/font-awesome/fonts', fontsDir)

     .copy(bowerDir + '/jquery/dist/jquery.min.js', jsDir + '/jquery.min.js')

     .copy(bowerDir + '/jquery-mask-plugin/dist/jquery.mask.min.js', jsDir + '/jquery.mask.min.js')

     .copy(bowerDir + '/morrisjs/morris.css', cssDir + '/morris.css')
     .copy(bowerDir + '/morrisjs/morris.js', jsDir + '/morris.js')
     .copy(bowerDir + '/raphael/raphael-min.js', jsDir + '/raphael-min.js')

     .copy('resources/assets/css', cssDir + cssDir)
     .copy('resources/assets/img', cssDir + imgDir)
     .copy('resources/assets/js', cssDir + jsDir)

     .copy(bowerDir + '/ckeditor', publicDir + '/ckeditor');
});
