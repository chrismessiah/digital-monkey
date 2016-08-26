// Handy addons

// var jshint = require('gulp-jshint');
// var uglify = require('gulp-uglify');
// var imagemin = require('gulp-imagemin');
// var cache = require('gulp-cache');
// var livereload = require('gulp-livereload');
// var del = require('del');

var gulp = require('gulp');
var notify = require('gulp-notify');
var cssnano = require('gulp-cssnano');
var rename = require('gulp-rename');
var sassPath = 'sass';
var sourcemaps = require('gulp-sourcemaps');
var concat = require('gulp-concat');

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
    .pipe(sass({indentedSyntax: true}))
    //.pipe(gulp.dest('css'))
    .pipe(rename({suffix: '.min'}))
    .pipe(cssnano())
    .pipe(gulp.dest('public'))
});


gulp.task('default', function() {
  gulp.start('styles');
  gulp.start('scripts');
  gulp.start('watch');
});

gulp.task('concat-js', function() {
  return gulp.src([
      'js/*.js'
    ])
    .pipe(concat('master.js'))
    .pipe(gulp.dest('public')); 
});


gulp.task('scripts', function() {
  gulp.start('concat-js');
  //gulp.start('minify-js');
});

gulp.task('watch', function() { 
  gulp.watch(`${sassPath}/*.sass`, ['styles']);
  gulp.watch(`js/*.js`, ['scripts']);
});
