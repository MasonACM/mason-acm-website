var gulp = require('gulp');
var path = require('path');
var less = require('gulp-less');
var notify = require('gulp-notify');
var uglify = require('gulp-uglify');
var concat = require('gulp-concat');
var minifyCSS = require('gulp-minify-css');
var autoprefixer = require('gulp-autoprefixer');

var jsOutDir = './public/js/';
var cssOutDir = './public/css/';

var jsDir = './resources/js';
var lessDir = './resources/less/';

var jsFiles = [
	'./bower_components/jquery/dist/jquery.js',
	'./bower_components/bootstrap/js/modal.js',
	'./bower_components/bootstrap/js/dropdown.js',
	'./bower_components/bootstrap/js/affix.js',
	'./bower_components/bootstrap/js/collapse.js',
	'./resources/js/global.js',
];

// Files that are only needed on Admin pages
var jsAdminFiles = [
	'./bower_components/angular/angular.js',
	'./bower_components/angular-sanitize/angular-sanitize.js',
	'./bower_components/angular-bootstrap/ui-bootstrap-tpls.js',
	'./resources/js/user-list.js',
	'./resources/js/roster.js',
];

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
		.pipe(gulp.dest(cssOutDir))
		.pipe(notify({
			title: 'Success',
			icon: __dirname + '/success.png',
			message: 'LESS compiled without error!'
		}));
});

gulp.task('js', function() {
	gulp.src(jsFiles)
		.pipe(concat('app.js'))
		.pipe(uglify('app.js'))
		.pipe(gulp.dest(jsOutDir));

	gulp.src(jsAdminFiles)
		.pipe(concat('admin.js'))
		.pipe(uglify('admin.js'))
		.pipe(gulp.dest(jsOutDir));
});

gulp.task('watch', function() {
	gulp.watch(lessDir + '*.less', ['less']);
	gulp.watch(jsDir + '*.js', ['js']);
});

gulp.task('default', ['watch']);