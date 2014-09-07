var gulp = require('gulp');
var path = require('path');
var less = require('gulp-less');
var notify = require('gulp-notify');
var minifyCSS = require('gulp-minify-css');
var autoprefixer = require('gulp-autoprefixer');

var lessDir = './app/MasonACM/Assets/less/';
var cssDir = './public/css/';

gulp.task('less', function() {
	gulp.src(lessDir + 'styles.less')
		.pipe(less())
		.on('error', notify.onError({
			title: 'Failure!',
			icon: __dirname + '/fail.png',
			message: 'An error occured while compiling LESS'
		}))
		.pipe(autoprefixer('last 10 versions'))
		.pipe(minifyCSS())
		.pipe(gulp.dest(cssDir))
		.pipe(notify({
			title: 'Success',
			icon: __dirname + '/success.png',
			message: 'LESS compiled without error!'
		}));
});

gulp.task('watch', function() {
	gulp.watch(lessDir + '*.less', ['less']);
});

gulp.task('default', ['watch']);