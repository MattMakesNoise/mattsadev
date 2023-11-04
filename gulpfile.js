/* -------------------------------------------------------------------------- */
/* USING GULP V 4.0.2 & GULP-CLI V 2.3.0
/* -------------------------------------------------------------------------- */
const {src, dest, watch, series, task} = require('gulp');
const sass        = require('gulp-sass');
const browserSync = require('browser-sync').create();
const rename      = require('gulp-rename');
const wait        = require('gulp-wait');
const uglifyCSS   = require('gulp-uglifycss');
const uglifyJS    = require('gulp-uglify');
const concat = require('gulp-concat');

// Compile Sass
function styles() {
	//1. Where is my SCSS file?
    return src('./src/assets/scss/**/*.scss', {sourcemaps: true})
        //2. Pass the file through compiler
        .pipe(sass().on('error', sass.logError)) // Throw shortened error if you make a mistake
        //3. Where is the compiled CSS output
        .pipe(dest('./assets/css', {sourcemaps: '.'}));
}

//Minify CSS to a dist folder
function minifyCSS() {
    //1. Where is my CSS file?
    return src('./src/assets/scss/**/*.css')
        //2. Make the task wait so that Sass has compiled and outputted.
        .pipe(wait(100))
        //3. Pass that file through CSS Uglifier.
        .pipe(uglifyCSS())
        //4. Rename the output file to be .min.css
        .pipe(rename({
            suffix:'.min'
        }))
        //5. Where do I save the minified CSS?
        .pipe(dest('./assets/css'));
}

//Compile JS
function javascriptFrontend() {
	//1. Where are my FrontEnd JS files?
	return src('./src/assets/js/custom/frontend/*.js', {sourcemaps: true})
	//2. Make the task wait so that JS has compiled
	.pipe(wait(100))
	//3. Concatenate the JS files
	.pipe(concat('frontend.js'))
	//4. Pass that file through JS Uglifier.
	.pipe(uglifyJS())
	//5. Rename the output file to be .min.js
	.pipe(rename({
		suffix:'.min'
	}))
	//6. Where do I save the minified JS?
	.pipe(dest('./assets/js/frontend', { sourcemaps: '.' }));
}

function javascriptAdmin() {
	//1. Where are my Admin JS files?
	return src('./src/assets/js/custom/admin/*.js', {sourcemaps: true})
	//2. Make the task wait so that JS has compiled
	.pipe(wait(100))
	//3. Concatenate the JS files
	.pipe(concat('admin.js'))
	//4. Pass that file through JS Uglifier.
	.pipe(uglifyJS())
	//5. Rename the output file to be .min.js
	.pipe(rename({
		suffix:'.min'
	}))
	//6. Where do I save the minified JS?
	.pipe(dest('./assets/js/admin', { sourcemaps: '.' }));
}

//Browser-sync Tasks
function browserSyncServe(cb) {
    browserSync.init({
        // Change this to be whatever your Virtual Host url is
        proxy: `http://mattsadev.local/`,
    });
    cb();
}

function browserSyncReload(cb) {
    browserSync.reload();
    cb();
}

function watchTask() {
    watch('./**/*.php', browserSyncReload);
    watch(['src/assets/scss/**/*.scss', 'src/assets/js/**/*.js'], series(styles, minifyCSS, javascriptFrontend, javascriptAdmin, browserSyncReload));
}

//Default GULP Task
exports.default = series(
    styles,
    minifyCSS,
    javascriptFrontend,
	javascriptAdmin,
    browserSyncServe,
    watchTask
);

