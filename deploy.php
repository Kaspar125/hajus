<?php
namespace Deployer;

require 'recipe/laravel.php';

// Zone yhendus

set('application', 'hajus2');
set('remote_user', 'virt118425');
set('http_user', 'virt118425');
set('keep_release', 2);

host('ta22kaasik.itmajakas.ee')
    ->setHostname('ta22kaasik.itmajakas.ee')
    ->set('http_user','virt118425')
    ->set('deploy_path','~/domeenid/www.ta22maarma.itmajakas.ee/hajus2')
    ->set('branch','main');

set('repository', 'git@hgithub.com/Kaspar125/hajus');

// tasks

task('opcache:clear', function () {
    run('killall php82-cgi || true');
})->desc('Clear opcache');

task('build:node', function() {
    cd('{{release_path}}');
    run('npm i');
    run('npx vite build');
    run('rm -fr node_modules');
});

task('deploy',[
    'deploy:prepare',
    'deploy:vendors',
    'artisan:storage:link',
    'artisan:view:cache',
    'artisan:config:cache',
    'build:node',
    'deploy:publish',
    'opcache:clear',
    'artisan:cache:clear'
]);

// Hooks

after('deploy:failed', 'deploy:unlock');