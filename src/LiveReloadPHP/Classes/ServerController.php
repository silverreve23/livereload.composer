<?php

namespace Classes;

use Exception;

class ServerController{

	protected $socket = null;
	public static $filesTimes = [];

	function __construct($config = null){

		$this->secketCreate($socket, $config);

		while(true){

			$this->socketAccept($socketAccept, $socket, $config);

		    if(!isset($socketAccept))
		    	continue;

			sleep($config['sleep']);

	        $this->isChanged($socketAccept, $config['folders']);

		}

	}

	public function isChanged($socketAccept, $folders){

		$isChanged = false;
		$buf = "@changed";

		foreach($folders as $folder){

			$files = scandir(getcwd().$folder);

			unset($files[0]);
			unset($files[1]);

			foreach($files as $file){

				if(@self::$filesTimes[$file] != stat(getcwd().$folder.$file)['mtime']){

					self::$filesTimes[$file] = stat(getcwd().$folder.$file)['mtime'];

					$isChanged = true;

				}

			}

		}

		if($isChanged === true)
			@socket_write(
				$socketAccept,
				$this->mask($buf),
				strlen($this->mask($buf))
			);

	}

	protected function secketCreate(&$socket, $conf){

		if(($socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)) === false)
			throw new Exception("Error socket_create");

		socket_set_option($socket, SOL_SOCKET, SO_REUSEADDR, 1);

		if(socket_bind($socket, $conf['host'], $conf['port']) === false)
		    throw new Exception("Error socket_bind");

		if(socket_listen($socket, 1) === false)
		    throw new Exception("Error socket_listen");

	}

	protected function socketAccept(&$socketAccept, $socket, $conf){

		$changed = array($socket);

		socket_select($changed, $null, $null, 0, 10);

	    if(in_array($socket, $changed)){

	    	if(($socketAccept = socket_accept($socket)) === false)
		        throw new Exception("Error socket_accept!");

	    	$recevedHeader = socket_read($socketAccept, 2048);

			$this->performHandshaking(
				$recevedHeader,
				$socketAccept,
				$conf
			);

	    }

	}


	function performHandshaking($recevedHeader, $socket, $conf){

		$headers = array();
		$lines = preg_split("/\r\n/", $recevedHeader);

		foreach($lines as $line){

			$line = chop($line);

			if(preg_match('/\A(\S+): (.*)\z/', $line, $matches))
				$headers[$matches[1]] = $matches[2];

		}

		$secKey = $headers['Sec-WebSocket-Key'];
		$location = $conf['host'].':'.$conf['port'];

		$secAccept = base64_encode(sha1(
			$secKey.'258EAFA5-E914-47DA-95CA-C5AB0DC85B11',
			true
		));

		$upgrade  =
			"HTTP/1.1 101 Web Socket Protocol\r\n" .
			"Upgrade: websocket\r\n" .
			"Connection: Upgrade\r\n" .
			"WebSocket-Origin: $conf[host]\r\n" .
			"WebSocket-Location: ws://$location\r\n".
			"Sec-WebSocket-Accept:$secAccept\r\n\r\n";

		socket_write($socket, $upgrade, strlen($upgrade));

	}

	public function unmask($text){

		$masks = substr($text, 2, 4);
		$data = substr($text, 6);

		for($i = 0; $i < strlen($data); ++$i)
			$text .= $data[$i] ^ $masks[$i % 4];

		return @$text;

	}

	public function mask($text){

		$b1 = 0x80 | (0x1 & 0x0f);

		$length = strlen($text);

		$header = pack('CC', $b1, $length);

		return $header.$text;
	}

}
