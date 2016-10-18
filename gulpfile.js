// Include gulp
var gulp = require('gulp'); 

// Include Our Plugins
//var jshint = require('gulp-jshint');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');
var minifyCss = require('gulp-minify-css');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
var browserSync = require('browser-sync').create();
var autoprefixer = require('gulp-autoprefixer');
var useref = require('gulp-useref');

//for publish
var gutil = require('gulp-util');
var notify = require('gulp-notify');
//end

var resource = {
    src : {
      js: "js",
      css: "scss", 
      views: "public"           
    },
    dest : {
      js: "public/assets/js",
      css: "public/assets/css",
    },
    destDeploy : {
      js: "public/assets/js/deploy",
      css: "public/assets/css/deploy",
    },
    domain: "http://localhost/ampc/public/"
  };

var config = {  
    sassOptions: {
      errLogToConsole: false,
      outputStyle: 'nested'
    },
    autoprefixerOptions: {
      browsers: ['last 3 versions'],
      cascade: false
    }
  };

// Lint Task
// gulp.task('lint', function() {
//     return gulp.src(resource.src.js + '/**/*.js')
//         .pipe(jshint())
//         .pipe(jshint.reporter('default'));
// });

// Compile Our Sass
gulp.task('sass', function() {
    return gulp.src(resource.src.css +  '/*.scss')
        .pipe(sourcemaps.init())
        .pipe(sass(config.sassOptions).on('error', sass.logError))
        .pipe(autoprefixer(config.autoprefixerOptions))
        .pipe(sourcemaps.write('./'))                
        .pipe(gulp.dest(resource.dest.css)) 
        .pipe(browserSync.stream({match: '**/*.css'}));        
});
// Compile & minify Our Sass
gulp.task('sass-deploy', function() {
    return gulp.src(resource.src.css +  '/*.scss')
        .pipe(sourcemaps.init())
        .pipe(sass(config.sassOptions).on('error', sass.logError))
        .pipe(autoprefixer(config.autoprefixerOptions))
        .pipe(sourcemaps.write('./'))
        .pipe(minifyCss({compatibility: 'ie8'}))
        .pipe(gulp.dest(resource.destDeploy.css))          
});

//concat vendors
gulp.task('concatvendor', function () {
    return gulp.src('views/**/*.php')
        .pipe(useref())
        .pipe(gulp.dest(resource.src.views + '/views'));
});


//start watch
gulp.task('watch-sass', function() {
    gulp.watch(resource.src.css + '/**/*.{sass,scss}', ['sass']);
});

// Concatenate JS
gulp.task('scripts', function() {
    return gulp.src(resource.src.js + '/**/*.js')        
        .pipe(concat('all.js'))        
        .pipe(gulp.dest(resource.dest.js));
});
// Concatenate & Minify JS
gulp.task('scripts-deploy', function() {
    return gulp.src(resource.src.js + '/**/*.js')
        .pipe(concat('all.js'))        
        .pipe(uglify())        
        .pipe(gulp.dest(resource.destDeploy.js));
});


gulp.task('browser-sync', function() {
    browserSync.init({
        notify: false,
        debugInfo: true,
        //server: resource.domain
        proxy: resource.domain
    });
});

//end

// Watch Files For Changes
gulp.task('watch', function() {    
    gulp.watch(resource.src.css + '/**/*.{sass,scss}', ['sass']); 
    gulp.watch(resource.src.js + '/**/*.js', ['scripts']).on('change', browserSync.reload);

    //vendors Changes
    //gulp.watch('views/**/*.php', ['concatvendor']);

    gulp.watch(resource.src.views + '/**/*.php').on('change', browserSync.reload);
    
});

// Watch Files For Changes
gulp.task('deploy', [
  'sass-deploy', 
  'scripts-deploy',      
]);


// Default Task
gulp.task('default', [
  //'lint',
  'sass', 
  'scripts',  
  //'concatvendor',
  'watch',
  'browser-sync'
], function() {  
});