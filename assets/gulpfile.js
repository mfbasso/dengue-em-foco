var gulp = require('gulp');
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');

gulp.task('scripts', () => {
  return gulp.src(['./scripts/**/*.js', '!./scripts/vendor/*.js'])
    .pipe(concat('main.js'))
    .pipe(uglify())
    .pipe(rename({suffix: '.min'}))
    .pipe(gulp.dest('./dist/'))
  ;
});

gulp.task('sass', () => {
  return gulp.src(['./sass/**/*.sass'])
    .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
    .pipe(rename({suffix: '.min'}))
    .pipe(gulp.dest('./css'))
  ;
});

gulp.task('sass:watch', () => {
  gulp.watch('./sass/**/*.sass', ['sass']);
});

gulp.task('javascript:watch', () => {
  gulp.watch('./scripts/**/*.js', ['scripts']);
});


gulp.task('default', ['sass:watch', 'javascript:watch']);
