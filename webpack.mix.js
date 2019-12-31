const mix = require('laravel-mix');

mix
    /* Styles */
    .sass('resources/sass/main_admin.scss', 'public/css')
    .sass('resources/sass/main_public.scss', 'public/css');
