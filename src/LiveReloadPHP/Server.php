<?php 

namespace LiveReloadPHP;

require __DIR__.'/Classes/ServerController.php';

class Server{

	public static function runServer($config = null){

		if(!$config)
			$config = include __DIR__.'/Config/Config.php';
        
        self::printMessage($config);

		new \Classes\ServerController($config);

	}
           
    private static function printMessage($config = array()){
        
        $folders = $config['folders'];
        
        echo "\n\e[32mServer live reload started!";

        echo "\n\e[93m    Host: ".$config['host'];
        echo "\n\e[93m    Port: ".$config['port'];
        echo "\n\e[93m    Sleep: ".$config['sleep'].'s';
        echo "\n\e[93m    Folders: \n";
        
        self::printFolders($folders);

        echo "\n\n\e[39m";
        
    }
    
    private static function printFolders($folders = array()){
        
        foreach($folders as $folder)
            echo "\t\e[96m".$folder."\n";
        
    }
    
}

