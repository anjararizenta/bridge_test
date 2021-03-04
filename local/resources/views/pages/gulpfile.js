/* Needed gulp config */

var gulp = require('gulp');  
var sass = require('gulp-sass');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
var notify = require('gulp-notify');
var minifycss = require('gulp-minify-css');
var concat = require('gulp-concat');
var plumber = require('gulp-plumber');
var browserSync = require('browser-sync');
var reload = browserSync.reload;
const sourcemaps = require('gulp-sourcemaps');
const autoprefixer = require('gulp-autoprefixer');

/* Setup scss path */
var paths = {
    scss: './sass/*.scss'
};

/* Scripts task */
gulp.task('scripts', function() {
  return gulp.src([
    /* Add your JS files here, they will be combined in this order */
    'theme/js/vendor/jquery.min.js',
    'theme/js/vendor/jquery.easing.1.3.js',
    'theme/js/vendor/jquery.stellar.min.js',
    'theme/js/vendor/jquery.flexslider-min.js',
    'theme/js/vendor/jquery.countTo.js',
    'theme/js/vendor/jquery.appear.min.js',
    'theme/js/vendor/circle-progress.min.js',
    'theme/js/vendor/jquery.magnific-popup.min.js',
    'theme/js/vendor/owl.carousel.min.js',
    'theme/js/vendor/bootstrap.min.js',
    'theme/js/vendor/jquery.waypoints.min.js'
    ])
    .pipe(concat('scripts.js'))
    .pipe(gulp.dest('js'))
    .pipe(rename({suffix: '.min'}))
    .pipe(uglify())
    .pipe(gulp.dest('js'));
});

gulp.task('minify-main', function() {
  return gulp.src([
    /* Add your JS files here, they will be combined in this order */
    'theme/js/main.js'
    ])
    .pipe(rename({suffix: '.min'}))
    .pipe(uglify())
    .pipe(gulp.dest('js'));
});

/* Sass task */
gulp.task('sass', function () {  
    gulp.src('stheme/css/style.scss')
    .pipe(plumber())
    .pipe(sass({
      errLogToConsole: true,

      //outputStyle: 'compressed',
      // outputStyle: 'compact',
      // outputStyle: 'nested',
      outputStyle: 'expanded',
      precision: 10
    }))

    .pipe(sourcemaps.init())
    .pipe(autoprefixer({
        browsers: ['last 2 versions'],
        cascade: false
    }))
    .pipe(gulp.dest('css'))

    .pipe(rename({suffix: '.min'}))
    .pipe(minifycss())
    .pipe(gulp.dest('css'))
    /* Reload the browser CSS after every change */
    .pipe(reload({stream:true}));
});

gulp.task('merge-styles', function () {

    return gulp.src([
        'theme/css/vendor/bootstrap.min.css',
        'theme/css/vendor/animate.css',
        'theme/css/vendor/icomoon.css',
        'theme/css/vendor/flexslider.css',
        'theme/css/vendor/owl.carousel.min.css',
        'theme/css/vendor/owl.theme.default.min.css',
        'theme/css/vendor/magnific-popup.css',
        'theme/css/vendor/photoswipe.css',
        'theme/css/vendor/default-skin.css',
        'fonts/icomoon/style.css',
        ])
        // .pipe(sourcemaps.init())
        // .pipe(autoprefixer({
        //     browsers: ['last 2 versions'],
        //     cascade: false
        // }))
        .pipe(concat('styles-merged.css'))
        .pipe(gulp.dest('css'))
        // .pipe(rename({suffix: '.min'}))
        // .pipe(minifycss())
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('css'))
        .pipe(reload({stream:true}));
});

/* Reload task */
gulp.task('bs-reload', function () {
    browserSync.reload();
});

/* Prepare Browser-sync for localhost */
gulp.task('browser-sync', function() {
    browserSync.init(['theme/css/*.css', 'theme/js/*.js'], {
        
        proxy: 'localhost/probootstrap/charity'
        /* For a static server you would use this: */
        /*
        server: {
            baseDir: './'
        }
        */
    });
});

/* Watch scss, js and html files, doing different things with each. */
gulp.task('default', ['sass', 'scripts', 'browser-sync'], function () {
    /* Watch scss, run the sass task on change. */
    gulp.watch(['stheme/css/*.scss', 'stheme/css/**/*.scss'], ['sass'])
    /* Watch app.js file, run the scripts task on change. */
    gulp.watch(['theme/js/main.js'], ['minify-main'])
    /* Watch .html files, run the bs-reload task on change. */
    gulp.watch(['*.html'], ['bs-reload']);
});