var gulp = require('gulp');
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var sourcemaps = require('gulp-sourcemaps');
var prettify = require('gulp-html-prettify');
var livereload = require('gulp-livereload');
var watch = require('gulp-watch');
var server = require('gulp-server-livereload');
var imageop = require('gulp-image-optimization');
var del = require('del');

// Directorio local de componentes bower
var bower = './bower_components/';

var config = {
    bootstrapSass: bower + 'bootstrap-sass',
    bootstrapJs: bower + 'bootstrap-sass/assets/javascripts/bootstrap.js',
    jquery: bower + 'jquery/dist/jquery.js',
    validator: bower + 'jquery-form-validator/form-validator/jquery.form-validator.js',
    validatorlang: bower + 'jquery-form-validator/form-validator/lang/es.js',
    publicDir: './public',
    scripts: 'js/*.js',
    img: 'images'
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
    .pipe(sass({outputStyle: 'uncompressed'}))
    .pipe(gulp.dest(config.publicDir + '/css'))
    .pipe(livereload());
});


// gulp.task('images', function(cb) {
//     gulp.src([config.img+'/**/*.png', config.img+'/**/*.jpg', config.img+'/**/*.gif', config.img+'/**/*.jpeg', config.img+'/**/*.svg']).pipe(imageop({
//         optimizationLevel: 5,
//         progressive: true,
//         interlaced: true
//     })).pipe(gulp.dest('public/images')).on('end', cb).on('error', cb);
// });


gulp.task('fonts', function() {
    return gulp.src(config.bootstrapDir + '/assets/fonts/**/*')
    .pipe(gulp.dest(config.publicDir + '/fonts'));
});

gulp.task('scripts', function() {
  return gulp.src([
    config.jquery,
    config.bootstrapJs,
    config.validator,
    config.validatorlang,
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

gulp.task('blog', function() {
  gulp.src('./blog/*.html')
    .pipe(prettify({indent_char: ' ', indent_size: 2}))
    .pipe(gulp.dest('./public/blog/'))
    .pipe(livereload());
});

gulp.task('watch', function () {
    livereload.listen();
    gulp.watch('./sass/*.scss', ['css']);
    gulp.watch('./*.html', ['templates']);
    gulp.watch('./blog/*.html', ['blog']);
    // gulp.watch('./images/*.jpg', ['images']);
    // gulp.watch('./images/*.svg', ['images']);
    // gulp.watch('./images/*.jpeg', ['images']);
    // gulp.watch('./images/*.png', ['images']);
    // gulp.watch('./images/*.gif', ['images']);
    gulp.watch('./js/*.js', ['scripts']);
});

gulp.task('default', ['webserver','css', 'fonts', 'watch','scripts', 'templates', 'blog']);
