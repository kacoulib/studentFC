var gulp = require('gulp'),
    sass = require('gulp-sass'),
    minify = require('gulp-minify-css'),
    concat = require('gulp-concat'),
    rename = require('gulp-rename')
    browserSync = require('browser-sync');

gulp.task('hello', function(){
    console.log('hello les dev');
});


gulp.task('browserSync', function() {
    browserSync({
        proxy: 'localhost:8000'
    })
});

var path = {
    'resources': {
        'sass': './resources/assets/sass'
    },
    'public': {
        'css': './public/assets/css'
    },
    'sass': './resources/assets/sass/**/*.scss'
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

// task lancé si une modification est faite dans les fichiers scss des resources/assets/sass
gulp.task('watch',['browserSync', 'task-sass'], function () {
    gulp.watch(path.sass, ['task-sass'])
});

gulp.task('default', ['watch']);