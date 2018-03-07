# Livereload Package

<p align="center">
    <img src="https://lh3.googleusercontent.com/T0SsbqhWYl-tRhJFanF0m-6p3y4YjmpjS8o2e401aTaD6cPdcGW7iUHyMuaIvKFabYeylNn8II3ulhUp1C_-iDd3yVCuEGZrnLhx9P1CrKv0eXnl59Q6i1QZSg7gob4UyZ6kpMUQCbhVqgTktNkf3-dACUZeNDDzAMMUDlRBfMPHY0_R-lLeTA8QOQhzVDPo7bBx9_6EUL64hRGUVUyW5iqmhvJ8UrVG6J4KB7nkFYQF0bT8ibcNgRAuBPlBKZEPkCNYAYFgY_sygR56wFlOiTJVgRwJgwkkqXBDFZ66SGWE8RF33IrPlvNjA0JHYQ3bOrtbvCaE-x99gORAnGDyMTEVwBM-UeRZThQ-Z987SPf0DAUmcR9ftk2r8rxxsTElu56QI9bCSSg1lE7oGmAEqN_3GW4fJe8DfcN6vWXnsNPPfE_dUE0In7mp5T8hePFEzagmcakOz4Jdn0ztEY1sU6eSR0t0JLbmewFRvH6BsvN6_-H-d8bW26A5f6A24nJiJ3sAz_Kj9W4ucyazoAHcbbRlN3nXP7mFib1DcvUbTfWuJnSPy5HlAlgF7U6G5wb1lz29ffy00QNoZiTt48yiThjRuruMHpYlZVkMchc=w900-h490-no" width="546">
</p>

<p align="center">
    Livereload package for php.
</p>

## How to install

Run this command in terminal from root folder your project:

    composer require sbkinfo/livereload


Run this command in terminal from root folder your project:

    wget https://github.com/silverreve23/livereload/blob/master/livestart

## Initialization Live

Include method:
## LiveReload::initReload()
in your project main file.

```php

<?php 

use LiveReloadPHP\LiveReload;

LiveReload::initReload();

```

## How to run server

Execute next command in terminal from root folder your project:

    livestart
    
## Configuration 

Default path wather / (root project).
For change default config, create <b>config.php</b>

```php

<?php 

return array(
	'host' => 'localhost',
	'port' => '9060',
	'sleep' => '1', #seconds
	'folders' => array(
		'/test',
		'/recursive',
	)
);

```

Include <b>config.php</b> and pass to methods:

* LiveReload::initReload($config) # in main file 
* Server::runServer($config) # in livestart file




