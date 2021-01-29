let mix = require('laravel-mix');

const path = require('path');
let directory = path.basename(path.resolve(__dirname));

const source = 'platform/plugins/' + directory;
const dist = 'public/vendor/core/plugins/' + directory;

mix
    .js(source + '/resources/assets/js/maintenance.js', dist + '/js/maintenance.js')
    .copy(dist + '/js/maintenance.js', source + '/public/js');
