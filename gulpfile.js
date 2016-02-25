var gulp = require('gulp');
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var imagemin = require('gulp-imagemin');
var sourcemaps = require('gulp-sourcemaps');
var prettify = require('gulp-html-prettify');
var livereload = require('gulp-livereload');
var watch = require('gulp-watch');
var server = require('gulp-server-livereload');
var del = require('del');

// Directorio local de componentes bower
var bower = './bower_components/';

var config = {
    bootstrapSass: bower + 'bootstrap-sass',
    bootstrapJs: bower + 'bootstrap-sass/assets/javascripts/bootstrap.js',
    jquery: bower + 'jquery/dist/jquery.js',
    publicDir: './public',
    scripts: 'js/*.js',
    images: 'images/**/*'
};


gulp.task('webserver', function() {
  gulp.src('./public')
    .pipe(server({
      livereload: true,
      directoryListing: false,
      open: true,
	    defaultFile: 'index.html'
    }));
});

gulp.task('css', function() {
    return gulp.src('./sass/app.scss')
    .pipe(sass({
        includePaths: [config.bootstrapSass + '/assets/stylesheets'],
    }))
    .pipe(sass({outputStyle: 'compressed'}))
    .pipe(gulp.dest(config.publicDir + '/css'))
    .pipe(livereload());
});



// Copy all static images
gulp.task('images', ['clean'], function() {
  return gulp.src(config.images)
    // Pass in options to the task
    .pipe(imagemin({optimizationLevel: 5}))
    .pipe(gulp.dest('build/img'));
});


gulp.task('fonts', function() {
    return gulp.src(config.bootstrapDir + '/assets/fonts/**/*')
    .pipe(gulp.dest(config.publicDir + '/fonts'));
});

gulp.task('scripts', function() {
  return gulp.src([
    config.jquery,
    config.bootstrapJs,
    config.scripts
  ])
    .pipe(concat('app.js'))
    .pipe(uglify())
    .pipe(gulp.dest(config.publicDir + '/js'))
});

gulp.task('templates', function() {
  gulp.src('./*.html')
    .pipe(prettify({indent_char: ' ', indent_size: 2}))
    .pipe(gulp.dest('./public/'))
    .pipe(livereload());
});

gulp.task('watch', function () {
    livereload.listen();
    gulp.watch('./sass/*.scss', ['css']);
    gulp.watch('./*.html', ['templates']);
    gulp.watch('./js/*.js', ['scripts']);
});

gulp.task('default', ['webserver','css', 'fonts', 'watch','scripts','templates']);
