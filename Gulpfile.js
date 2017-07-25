var gulp         = require('gulp'),
      /** Sass - Css **/
      sass         = require('gulp-sass'),
      plumber      = require('gulp-plumber'),
      nano         = require('gulp-cssnano'),
      autoprefixer = require('gulp-autoprefixer'),
      sourcemaps   = require('gulp-sourcemaps'),
      /** javascript **/
      concat       = require('gulp-concat'),
      uglify       = require('gulp-uglify'),
      /** Images **/
      imagemin     = require('gulp-imagemin'),
      /** Development **/
      del          = require('del'),
      webstandards = require('gulp-webstandards'),
      gulpif       = require('gulp-if');


/** Check to see if project is in development **/
var inDevelopment = false;

/**  Theme name **/
var theme = 'blush';
/** Path to Theme **/
var output = '../cosmetics/wp-content/themes/' + theme + '/';

/** Development Paths **/
var Paths = {
  'bower' : 'bower_components'
};

/** An Array of Sass file paths to include **/
var SassArray = [];

var JavascriptArray = [
  Paths.bower + '/jquery/dist/jquery.js',
  Paths.bower + '/fastclick/lib/fastclick.js',
  Paths.bower + '/jquery-slimscroll/jquery.slimscroll.js',
  Paths.bower + '/slabText/js/jquery.slabtext.js',
  Paths.bower + '/Waves/dist/waves.js',
  theme + '/js/plugin.js'
];

var FontArray = [
  Paths.bower + '/lunacon/lunacon/fonts/**/*.{eot,svg,ttf,woff}'
];

/** Sass Builder **/
gulp.task('sass', function(){
  return gulp.src(theme + '/sass/**/*.{sass,scss}')
  // return gulp.src(theme + '/sass/style-steam.{sass,scss}')
    .pipe(plumber())
    .pipe(sourcemaps.init())
    .pipe(sass({
      sourceComments: true,
      includePaths: SassArray,
    }).on('error', sass.logError))
    .pipe(autoprefixer({
      browsers: ['last 5 versions'],
      cascade: false
    }))
    .pipe(gulpif(!inDevelopment, nano()))
    .pipe(sourcemaps.write('/'))
    .pipe(gulp.dest(output));
});

/** Html Builder **/
gulp.task('html', function(){
  return gulp.src(theme + '/html/**/*.php')
    .pipe(gulp.dest(output));
});

/** Javascript Builder **/
gulp.task('javasript', function(){
  return gulp.src(JavascriptArray)
    .pipe(gulpif(!inDevelopment, uglify()))
    .pipe(concat('app.js'))
    .pipe(gulp.dest(output + '/js'));
});

/** Image Minifacation**/
gulp.task('image', function(){
  return gulp.src(theme + '/img/**/*.{jpg,jpeg,png,gif,webp}')
    .pipe(imagemin())
    .pipe(gulp.dest(output + '/img'));
});

/** Copy font to Output directory**/
gulp.task('fonts', function(){
  gulp.src(FontArray)
  .pipe(gulp.dest(output + '/fonts'));
});

/** Gulp Watcher - Watch for changes when saves **/
gulp.task('watch', function(){
  gulp.watch(theme + '/sass/**/*.{sass,scss}', ['sass']);
  gulp.watch(theme + '/html/**/*.php', ['html']);
  gulp.watch(theme + '/js/**/*.js', ['javasript']);
  gulp.watch(theme + '/img/**/*.{jpg,jpeg,png,gif,webp}', ['image']);

});

/** Remove fonts from build folder **/
gulp .task('clean', function(){
  del([output + '/fonts/**/*'], {force: true});
});

gulp.task('web', function () {
    return gulp.src(output + '*.css')
        .pipe(webstandards());
});



gulp.task('default', ['watch','sass', 'html', 'image', 'javasript', 'fonts']);
