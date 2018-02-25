# Livereload Package

<p align="center">
    <img src="https://wp-rocket.me/wp-content/uploads/2/auto-update.jpg" width="546">
</p>

<p align="center">
    Livereload package for php.
</p>



## How to install

Execute next command in terminal:

    composer require sbkinfo/livereload


## Initialization Live

Run method <b>LiveReload::initReload()</b> 
in your project main file.

```php

use LiveReloadPHP\LiveReload;

LiveReload::initReload();

```

Create file <b>server.php</b>:

```php

use LiveReloadPHP\Server;

$config = array(
	'host' => 'localhost',
	'port' => '9060',
	'sleep' => '1', #seconds
	'folders' => array(
		'/test',
		'/recursive',
	)
);

Server::runServer($config);

```

## How to run server

Execute next command in terminal:

    php server.php
