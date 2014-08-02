var gulp = require('gulp');
var path = require('path');
var less = require('gulp-less');
var autoprefixer = require('gulp-autoprefixer');

var lessDir = './app/MasonACM/Assets/less/';
var cssDir = './public/css/';

gulp.task('less', function() {
	gulp.src(lessDir + 'styles.less')
		.pipe(less())
		.pipe(autoprefixer('last 10 versions'))
		.pipe(gulp.dest(cssDir));
});

gulp.task('watch', function() {
	gulp.watch(lessDir + '*.less', ['less']);
});

gulp.task('default', ['watch']);