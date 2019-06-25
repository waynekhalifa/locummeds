var gulp = require('gulp'),
    scripts = require('./scripts'),
    styles = require('./styles'),
    browserSync = require('browser-sync').create();

const FILES_PATH = './**/*.php';
const CSS_PATH = './style.css';
const SCRIPTS_PATH = './src/scripts/**/*.js';
const STYLES_PATH = './src/styles/**/*.scss';
const URL = "http://localhost/locummeds";

function watch() {
    browserSync.init({
        notify: false,
        proxy: URL
    });
    gulp.watch( FILES_PATH, refresh );
    gulp.watch( SCRIPTS_PATH, gulp.series( scripts, refresh ) );
    gulp.watch( STYLES_PATH, gulp.series( styles, cssInject ) );
}

function cssInject() {
    return gulp.src(CSS_PATH)
        .pipe(browserSync.stream());
}

function refresh(done) {
    browserSync.reload();
    done();
}

module.exports = watch;