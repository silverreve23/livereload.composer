# livereload

LiveReloadPHP Install

This is code help instaled and configure livereload for files

First step require package live reload:

composer require sbkinfo/livereload

Next include autoload.php file in project.

Example:

require __DIR__.'/vendor/autoload.php';

Next step is inialize file watcher. Run method LiveReload::initReload() on index page.

use LiveReloadPHP\LiveReload;

LiveReload::initReload();

Last step create file server and run server watcher of files.

Example:

<?php 

require __DIR__.'/vendor/autoload.php';
require __DIR__.'/config.php';

use LiveReloadPHP\Server;

Server::runServer($config);

Methon runServer given config array.

Settings host and port for run server on host::port.

Settings sleep points to sleep server wher run server.

Settings folders => array indicates directory that it will breed all files the server.

Example:

array(
    'host' => 'localhost',
    'port' => '9060',
    'sleep' => '2',
    'folders' => array(
        '/'
    )
);

Run server file!
