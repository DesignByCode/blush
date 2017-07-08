const gulp         = require('gulp'),
      /** Sass - Css **/
      sass         = require('gulp-sass'),
      plumber      = require('gulp-plumber'),
      nano         = require('gulp-cssnano'),
      autoprefixer = require('gulp-autoprefixer'),
      sourcemaps   = require('gulp-sourcemaps'),
      /** javascript **/
      uglify       = require('gulp-uglify'),
      /** Images **/
      imagemin     = require('gulp-imagemin'),
      /** Development **/
      del          = require('del'),
      gulpif       = require('gulp-if');


/** Check to see if project is in development **/
const inDevelopment = true;

/**  Theme name **/
const theme = 'blush';
/** Path to Theme **/
const output = '../cosmetics/wp-content/themes/' + theme + '/';

/** Development Paths **/
const Paths = {
  'bower' : 'bower_components'
}

/** An Array of Sass file paths to include **/
const SassArray = [];

const FontArray = [
  `${Paths.bower}/lunacon/lunacon/fonts/**/*.{eot,svg,ttf,woff}`
];

/** Sass Builder **/
gulp.task('sass', ()=>{
  return gulp.src(theme + '/sass/**/*.{sass,scss}')
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
gulp.task('html', ()=>{
  return gulp.src(theme + '/html/**/*.php')
    .pipe(gulp.dest(output));
});

/** Javascript Builder **/
gulp.task('javasript', ()=>{
  return gulp.src(theme + '/js/**/*.js')
    .pipe(gulpif(!inDevelopment, uglify()))
    .pipe(gulp.dest(output + '/js'));
});

/** Image Minifacation**/
gulp.task('image', ()=>{
  return gulp.src(theme + '/img/**/*.{jpg,jpeg,png,gif,webp}')
    .pipe(imagemin())
    .pipe(gulp.dest(output + '/img'));
});

/** Copy font to Output directory**/
gulp.task('fonts', ()=>{
  gulp.src(FontArray)
  .pipe(gulp.dest(output + '/fonts'));
});

/** Gulp Watcher - Watch for changes when saves **/
gulp.task('watch', ()=>{
  gulp.watch(theme + '/sass/**/*.{sass,scss}', ['sass']);
  gulp.watch(theme + '/html/**/*.php', ['html']);
  gulp.watch(theme + '/js/**/*.js', ['javasript']);
  gulp.watch(theme + '/img/**/*.{jpg,jpeg,png,gif,webp}', ['image']);

});


gulp.task('default', ['watch','sass', 'html', 'image', 'javasript', 'fonts']);
