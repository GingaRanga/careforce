var gulp          = require('gulp');
var browserSync   = require('browser-sync').create();
var sass          = require('gulp-sass');

// Compile sass into css and auto inject into browserSync
gulp.task('sass', function() {
  return gulp.src(['node_modules/bootstrap/scss/bootstrap.scss', 'src/scss/*.scss']) // * means any scss file inside scss folder
    .pipe(sass()) // use sass
    .pipe(gulp.dest("src/css")) // put compiled sass into dest folder
    .pipe(browserSync.stream()); // notifys the browser
});

// Move the javascript files into our /src/js folder
gulp.task('js', function(){
  return gulp.src(['node_modules/bootstrap/dist/js/bootstrap.min.js'])
    .pipe(gulp.dest("src/js"))
    .pipe(browserSync.stream());
});

// Static server and watching scss/html files
gulp.task('serve', ['sass'], function(){

  browserSync.init({
    server: "./src"
  });

  gulp.watch(['node_modules/bootstrap/scss/bootstrap.scss', 'src/scss/*.scss'], ['sass']);
  gulp.watch("src/*.html").on('change', browserSync.reload);

});

gulp.task('default', ['js', 'serve']); // this will run the above two tasks when we type gulp in command line
