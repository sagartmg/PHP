// var gulp = require('gulp');
// var php = require('gulp-connect-php');

// var browserSync = require('browser-sync').create();

// gulp.task('php', function(){
//     php.server({base:'./', port:8010, keepalive:true});
// });

// gulp.task('browserSync',gulp.series('php', function() {
//     browserSync.init({
//         proxy:"localhost:8010",
//         baseDir: "./",
//         open:true,
//         notify:false

//     });
// }));

// // gulp.task('dev', gulp.series('browserSync', function() {
// // 		console.log("fucccccccccccccccck");
// //        gulp.watch('./*.php', browserSync.reload);
// // }));


// // gulp.task("serve",gulp.series("php",function(){

// // 	browserSync.init({
// // 		server:"./"
// // 	});

// // 	gulp.watch("./*.php").on('change',browserSync.reload);

// // }));

// // gulp.task('default',gulp.series('serve'));


// gulp.task('reload', function(){
//     browserSync.reload()
// })

// gulp.task('dev', gulp.series('browserSync', function(){
//    gulp.watch('./*.php', gulp.series('reload'));
// }));


var gulp = require('gulp');
var connect = require('gulp-connect-php');
var browserSync = require('browser-sync');

gulp.task('browserSync', function() {
    browserSync.init({
        proxy: '127.0.0.1:8000'
    });
});

gulp.task('default', function() {
  connect.server({}, function (){
    browserSync({
      proxy: '127.0.0.1:8000'
    });
  });

  gulp.watch('**/*.php').on('change', function () {
    browserSync.reload();
  });
});