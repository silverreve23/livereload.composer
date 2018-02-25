# Livereload Package

<p align="center">
    <img src="https://wp-rocket.me/wp-content/uploads/2/auto-update.jpg" width="546">
</p>

<p align="center">
    Livereload package for php.
</p>



## How to install

This is code help instaled and configure livereload for files

First step require package live reload:

    composer require sbkinfo/livereload


## Initialization Live

Run method <b>LiveReload::initReload()</b> on index page.

```php

use LiveReloadPHP\LiveReload;

LiveReload::initReload();

```

Last step create file <b>server.php</b>:

```php

use LiveReloadPHP\Server;

$config = array(
	'host' => 'localhost',
	'port' => '9060',
	'sleep' => '1',
	'folders' => array(
		'/test',
		'/recursive',
	)
);

Server::runServer($config);

```

## How to run server

Execute next command in terminal or apache server:

    php server.php
