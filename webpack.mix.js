let mix = require('laravel-mix');

const publicPath = 'public/vendor/core/plugins/maintenance-mode';
const resourcePath = './platform/plugins/maintenance-mode';

mix
    .js(resourcePath + '/resources/assets/js/maintenance.js', publicPath + '/js/maintenance.js')
    .copy(publicPath + '/js/maintenance.js', resourcePath + '/public/js');