'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
var minifycss = require('gulp-minify-css');

gulp.task('build-global-css', function () {
    return gulp.src('./assets/scss/**/*.scss')
        .pipe(sass().on('error', sass.logError))
        //.pipe(minifycss())
        .pipe(gulp.dest('./public/css'));
});

gulp.task('build-all', function() {
    gulp.run('build-global-css');
});

gulp.task('watch', function () {
    gulp.watch('./assets/scss/**/*.scss', ['build-global-css']);
});