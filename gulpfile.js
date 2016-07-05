var gulp = require('gulp'),
    sass = require('gulp-sass'),
    minify = require('gulp-minify-css'),
    uglify = require('gulp-uglify'),
    concat = require('gulp-concat'),
    rename = require('gulp-rename')
browserSync = require('browser-sync');

gulp.task('hello', function () {
    console.log('hello les dev');
});


gulp.task('browserSync', function () {
    browserSync({
        proxy: 'localhost:8000'
    })
});

var path = {
    'resources': {
        'sass': './resources/assets/sass',
        'js': './resources/assets/js'
    },
    'public': {
        'css': './public/assets/css',
        'js': './public/assets/js'
    },
    'sass': './resources/assets/sass/**/*.scss',
    'js': './resources/assets/js/**/*.js'
};

gulp.task('task-sass', function () {

    return gulp.src(path.resources.sass + '/app.scss')
        .pipe(sass({
            onError: console.error.bind(console, 'SASS ERROR')
        }))
        .pipe(minify())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest(path.public.css))
        .pipe(browserSync.reload({
            stream: true
        }))
});

gulp.task('task-js', function () {

    return gulp.src(path.resources.js + '/app.js')
        .pipe(uglify())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest(path.public.js));

});

// task lancé si une modification est faite dans les fichiers scss des resources/assets/sass
gulp.task('watch', function () {
    gulp.watch(path.sass, ['task-sass']);
    gulp.watch(path.js, ['task-js']);
});

gulp.task('default', ['watch']);