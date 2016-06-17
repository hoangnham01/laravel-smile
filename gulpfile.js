var args = require('yargs').argv,
    path = require('path'),
    flip = require('css-flip'),
    through = require('through2'),
    gulp = require('gulp'),
    gulpSync = require('gulp-sync')(gulp),
    jshint = require('gulp-jshint'),
    watch = require('gulp-watch'),
    sass = require('gulp-sass'),
    minifyCss = require('gulp-minify-css'),
    uglify = require('gulp-uglify'),
    sourcemaps = require('gulp-sourcemaps'),
    livereload = require('gulp-livereload'),
    notify = require('gulp-notify'),
    gulpIf = require('gulp-if'),
    concat = require('gulp-concat');

var browserSync = require('browser-sync').create();
var reload = browserSync.reload;

const _option = {
    sourcemaps: true,
    production: false,
    livereload: true,
    liveReloadDelay: 1000
};
const fileName = {
    backend : {
        styles : {
            vendor: "backend-vendor.css",
            theme: "backend-theme.css",
            custom: "backend-style.css"
        },
        scripts: {
            vendor: "backend-vendor.js",
            theme: "backend-app.js"
        }
    }
};

var _config = require('./resources/assets/config.json');

/*************** Styles ***************/

gulp.task('styles::backend-vendor', function(){
    return gulp.src(_config.backend.styles.vendor)
        .pipe(gulpIf(_option.sourcemaps, sourcemaps.init()))
        .pipe(concat(fileName.backend.styles.vendor))
        .on('error', handleError)
        .pipe(gulpIf(_option.production, minifyCss()))
        .pipe(gulpIf(_option.sourcemaps, sourcemaps.write('./')))
        .pipe(gulp.dest(_config.build.css));
        //.pipe(notify("styles::backend-vendor"));
});

gulp.task('styles::backend-theme', function(){
    return gulp.src(_config.backend.styles.theme.file)
        .pipe(gulpIf(_option.sourcemaps, sourcemaps.init()))
        .pipe(concat(fileName.backend.styles.theme))
        .pipe(sass().on('error', handleError))
        .pipe(gulpIf(_option.production, minifyCss()))
        .pipe(gulpIf(_option.sourcemaps, sourcemaps.write('./')))
        .pipe(gulp.dest(_config.build.css));
        //.pipe(notify("styles::backend-vendor"));
});

/*************** Scripts ***************/

gulp.task('scripts::backend-vendor', function () {
    if(_option.livereload){
        _config.backend.scripts.vendor = _config.backend.scripts.vendor.concat('./resources/assets/js/livereload.js');
    }
    return gulp.src(_config.backend.scripts.vendor)
        .pipe(gulpIf(_option.sourcemaps, sourcemaps.init()))
        .pipe(concat(fileName.backend.scripts.vendor))
        .on('error', handleError)
        .pipe(gulpIf(_option.production, uglify()))
        .pipe(gulpIf(_option.sourcemaps, sourcemaps.write('./')))
        .pipe(gulp.dest(_config.build.js));
        //.pipe(notify('scripts::backend-vendor'));
});

gulp.task('scripts::backend-theme', function () {
    return gulp.src(_config.backend.scripts.theme)
        .pipe(gulpIf(_option.sourcemaps, sourcemaps.init()))
        .pipe(concat(fileName.backend.scripts.theme))
        .on('error', handleError)
        .pipe(gulpIf(_option.production, uglify()))
        .pipe(gulpIf(_option.sourcemaps, sourcemaps.write('./')))
        .pipe(gulp.dest(_config.build.js));
});
gulp.task('assets::copy', function() {
    for(var key in _config.copy){
        gulp.src(_config.copy[key])
            .pipe(gulp.dest(key));
    }
});

gulp.task('watch', function () {
    log('Starting watch and LiveReload..');

    livereload.listen();

    gulp.watch('resources/assets/config.json', ['default']);

    gulp.watch(_config.backend.styles.vendor, ['styles::backend-vendor']);
    gulp.watch(_config.backend.styles.theme.watch, ['styles::backend-theme']);

    gulp.watch(_config.backend.scripts.vendor, ['scripts::backend-vendor']);
    gulp.watch(_config.backend.scripts.theme, ['scripts::backend-theme']);

    var copy = [];
    for(var key in _config.copy){
        copy = copy.concat(_config.copy[key]);
    }
    console.log(copy);
    gulp.watch(copy, ['assets::copy']);

    // list of source file to watch for live reload
    var watchSource = ['./resources/assets/config.json'].concat(
        _config.backend.styles.vendor,
        _config.backend.styles.theme.watch,
        _config.backend.scripts.vendor,
        _config.backend.scripts.theme,
        copy
    );

    gulp
        .watch(watchSource)
        .on('change', function (event) {
            setTimeout(function () {
                livereload.changed(event.path);
            }, _option.liveReloadDelay);
        });

});


gulp.task('default', gulpSync.sync([
    'styles::backend-vendor', 'styles::backend-theme',
    'scripts::backend-vendor', 'scripts::backend-theme',
    'assets::copy',
    'watch'
]), function () {

    log('************');
    log('* All Done * You can start editing your code, LiveReload will update your browser after any change..');
    log('************');

});
function log(msg){
    console.log(msg);
}
function handleError(err) {
    log(err.toString());
    this.emit('end');
}
