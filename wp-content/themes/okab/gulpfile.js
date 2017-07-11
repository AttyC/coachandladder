// Include gulp
var gulp = require('gulp');

// Include Our Plugins
var jshint = require('gulp-jshint');
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var minifycss = require('gulp-minify-css');
var lec = require('gulp-line-ending-corrector');
var autoprefixer = require('gulp-autoprefixer');
var rename = require('gulp-rename');
var notify = require('gulp-notify');
var sourcemaps = require('gulp-sourcemaps');
var sassdoc = require('sassdoc');
var _ = require('lodash');
var clean = require('gulp-clean');
var browserSync = require('browser-sync');

var sass_input = './framework/asset/site/css/sass/**/*.scss';
var sass_out = './framework/asset/site/css/';
var js_out = './framework/asset/site/js/';
var sassOptions = {};
var env = process.env.NODE_ENV || 'development';
if (env != 'development') {
    sassOptions = {
        errLogToConsole: true,
        sourceComments: true,
        outputStyle: 'expanded'
    };
}
else {
    sassOptions = {
        errLogToConsole: false,
        sourceComments: false,
        outputStyle: 'compressed'
    };
}

var autoprefixerOptions = {
    browsers: ['last 2 versions', '> 5%', 'Firefox ESR', 'safari 5', 'ie 9', 'ios 6', 'android 3']
};
var sassdocOptions = {
    dest: './framework/asset/sassdoc'
};

// Lint Task
gulp.task('lint', function () {
    return gulp
        .src('framework/asset/site/js/module/**/*.js')
        .pipe(jshint())
        .pipe(jshint.reporter('default'));
});

// Compile Our Sass
gulp.task('sass', function () {
    return gulp
        .src(sass_input)
        .pipe(sourcemaps.init())
        .pipe(sass(sassOptions)).on('error', sass.logError)
        .pipe(autoprefixer(autoprefixerOptions))
        .pipe(lec())
        /*.pipe(rename({
         suffix: '.min'
         }))*/
        //.pipe(minifycss())
        //.pipe(sourcemaps.write('./maps'))
        .pipe(gulp.dest(sass_out));

    /*.pipe(notify({
     message: "Generated file: <%= file.relative %>",
     }));*/
    return gulp.src('app/tmp', {read: false})
        .pipe(clean());
});

gulp.task('sassdoc', function () {
    return gulp
        .src(sass_input)
        .pipe(sassdoc(sassdocOptions))
        .resume();
});

// Concatenate & Minify JS
gulp.task('scripts', function () {
    return gulp.src('framework/asset/site/js/module/**/*.js')
    //.pipe(sourcemaps.init())
        .pipe(concat('libs.js'))
        .pipe(lec())
        .pipe(gulp.dest(js_out))
        .pipe(rename("libs.min.js"))
        .pipe(uglify())
        //.pipe(sourcemaps.write("./"))
        .pipe(gulp.dest(js_out));
});

gulp.task('set-dev-node-env', function () {
    return process.env.NODE_ENV = 'development';
});

gulp.task('set-prod-node-env', function () {
    return process.env.NODE_ENV = 'production';
});


// Watch Files For Changes
gulp.task('watch', function () {

    var files = [
        './framework/asset/site/css/**/*.css',
        './**/*.php'
    ];

    //initialize browsersync
    /*browserSync.init(files, {
     //browsersync with a php server
     proxy: "localhost/wp/411/",
     notify: false
     });*/

    gulp.watch('framework/asset/site/js/module/**/*.js', ['scripts']);
    gulp.watch(sass_input, ['sass'])
        .on('change', function (evt) {
            console.log(
                '[watcher] File ' + evt.path.replace(/.*(?=sass)/, '') + ' was ' + evt.type + ', compiling...'
            );
        });
});


// Default Task
gulp.task('default', ['apigen', 'imagemin', 'sassdoc', 'sass', 'scripts', 'watch']);
