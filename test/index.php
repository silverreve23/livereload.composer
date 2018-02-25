<?php 

require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/config.php';

use LiveReloadPHP\LiveReload;

LiveReload::initReload($config);
