// Handy addons

// var jshint = require('gulp-jshint');
// var uglify = require('gulp-uglify');
// var imagemin = require('gulp-imagemin');
// var concat = require('gulp-concat');
// var cache = require('gulp-cache');
// var livereload = require('gulp-livereload');
// var del = require('del');

var gulp = require('gulp');
var notify = require('gulp-notify');
var autoprefixer = require('gulp-autoprefixer');
var cssnano = require('gulp-cssnano');
var rename = require('gulp-rename');
var sassPath = 'sass';
var sourcemaps = require('gulp-sourcemaps');

// ruby-sass is 5x slower!

// var sass = require('gulp-ruby-sass');
// gulp.task('styles', function() {
//   return sass(`${sassPath}/main.sass`, { style: 'expanded'})
//     .pipe(autoprefixer('last 2 version'))
//     .pipe(gulp.dest('css'))
//     .pipe(rename({suffix: '.min'}))
//     .pipe(cssnano())
//     .pipe(gulp.dest('css'))
// });


// gulp-sass does not warn on faulty sass!

var sass = require('gulp-sass');
gulp.task('styles', function() {
  return gulp.src(`${sassPath}/master.sass`)
  	.pipe(autoprefixer('last 2 version'))
    .pipe(sass({
    	indentedSyntax: true,
    	includePaths: 'bower_components/susy/sass'
    }))
    .pipe(gulp.dest('css'))
    .pipe(rename({suffix: '.min'}))
    .pipe(cssnano())
    .pipe(gulp.dest('css'))
});


gulp.task('default', function() {
    gulp.start('styles');
    gulp.start('watch');
});

gulp.task('watch', function() { 
  gulp.watch(`${sassPath}/*.sass`, ['styles']);
});
