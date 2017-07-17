<?php

namespace LiveReloadPHP;

class LiveReload{

	public static function initReload($config = null){

		if(!$config)
			$config = include __DIR__.'/Config/Config.php';

		require __DIR__.'/JS/Client.php';

	}

}
