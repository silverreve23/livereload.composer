<?php 

namespace LiveReloadPHP;

require __DIR__.'/Classes/ServerController.php';

class Server{

	public static function runServer($config = null){

		if(!$config)
			$config = include __DIR__.'/Config/Config.php'

		new \Classes\ServerController($config);

	}

}

