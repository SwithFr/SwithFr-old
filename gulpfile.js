var gulp        = require('gulp');
var browserSync = require('browser-sync').create();
var sass        = require('gulp-sass');

gulp.task('serve', ['sass'], function() {

    browserSync.init({
        proxy: "site.dev/MY_SITES/SwithV5"
    });

    gulp.watch("./App/Webroot/sass/**/*.scss", ['sass']);
    gulp.watch("./App/Views/**/*").on('change', browserSync.reload);
});

gulp.task('sass', function() {
    return gulp.src("./App/Webroot/sass/*")
        .pipe(sass())
        .pipe(gulp.dest("./App/Webroot/css"))
        .pipe(browserSync.stream());
});

gulp.task('default', ['serve']);
