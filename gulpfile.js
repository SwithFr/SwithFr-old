var gulp        = require('gulp');
var browserSync = require('browser-sync').create();
var sass        = require('gulp-sass');
var uglify      = require('gulp-uglify');

gulp.task('serve', ['sass'], function() {

    browserSync.init({
        proxy: "swith.dev"
    });

    gulp.watch("./App/Webroot/sass/**/*.scss", ['sass']);
    gulp.watch("./App/Webroot/js/*.js", ['js']);
    gulp.watch("./App/Views/**/*").on('change', browserSync.reload);
});

gulp.task('sass', function() {
    return gulp.src("./App/Webroot/sass/*")
        .pipe(sass({outputStyle: 'compressed'}))
        .pipe(gulp.dest("./App/Webroot/css"))
        .pipe(browserSync.stream());
});

gulp.task('js', function() {
    return gulp.src('./App/Webroot/js/*.js')
        .pipe(uglify())
        .pipe(gulp.dest('./App/Webroot/js/min'))
        .pipe(browserSync.stream());
});

gulp.task('default', ['serve']);