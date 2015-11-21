var concat = require('gulp-concat');
var elixir = require('laravel-elixir');
var gulp = require('gulp');
var ngAnnotate = require('gulp-ng-annotate');
var templateCache = require('gulp-angular-templatecache');
var uglify = require('gulp-uglify');

/**
 * Custom Elixir Task to Annotate Angular App
 */
elixir.extend('annotate', function(src, dest) {
    new elixir.Task('annotate', function() {
        return gulp.src(src)
        .pipe(concat('app.js'))
        .pipe(ngAnnotate())
        .pipe(gulp.dest(dest));
    })
    .watch(src);
});

/**
 * Custom Elixir Task to Cache Angular Templates
 */
elixir.extend('cacheTemplates', function(src, dest, filename) {
    new elixir.Task('cacheTemplates', function() {
        return gulp.src(src)
        .pipe(templateCache(filename, {module: 'boneExplorer'}))
        .pipe(gulp.dest(dest))
        .pipe(new elixir.Notification('Templates Cached!'));
    })
    .watch(src);
});

elixir(function (mix) {
    mix.browserSync({
        proxy : 'bone-explorer.dev:8000'
    });
    mix.copy('./bower_components/font-awesome/fonts/**', 'public/build/fonts');

    /**
     * Vendor CSS
     */
    mix
    .sass([
        '_variables.scss',
        'bootstrap.scss'
    ], './public/css/bootstrap.css')
    .styles([
        './public/css/bootstrap.css',
        './bower_components/eeh-navigation/dist/eeh-navigation.css',
        './bower_components/ui-select/dist/select.css'
    ], 'public/css/vendor.css');

    /**
     * App CSS
     */
    mix
    .sass([
        '_variables.scss',
        'app.scss',
        './resources/assets/app/**/*.scss'
    ], './public/css/app.css')
    .styles('./public/css/app.css', 'public/css/app.css');

    /**
     * Vendor JS
     */
    mix.scripts([
        './bower_components/jquery/dist/jquery.js',
        './bower_components/angular/angular.js',
        './bower_components/angular-animate/angular-animate.js',
        './bower_components/angular-resource/angular-resource.js',
        './bower_components/angular-sanitize/angular-sanitize.js',
        './bower_components/angular-ui-router/release/angular-ui-router.js',
        './bower_components/angular-bootstrap/ui-bootstrap-tpls.js',
        './bower_components/angular-translate/angular-translate.js',
        './bower_components/eeh-navigation/dist/eeh-navigation.js',
        './bower_components/eeh-navigation/dist/eeh-navigation.tpl.js',
        './bower_components/ui-select/dist/select.js'
    ], 'public/js/vendor.js');

    /**
     * App JS
     */
    mix.annotate([
        './resources/assets/app/**/*.module.js',
        './resources/assets/app/**/*.!(module).js'
    ], './public/build/annotated/')
    .scripts('./public/build/annotated/app.js', './public/js/app.js');

    mix.cacheTemplates('./resources/assets/app/**/*.html', './public/js/', 'app.tpl.js');

    /**
     * Cache Busting
     */
    mix.version([
        'public/css/vendor.css',
        'public/css/app.css',
        'public/js/vendor.js',
        'public/js/app.js',
        'public/js/app.tpl.js'
    ]);
});
