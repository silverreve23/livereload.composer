
<script language="javascript" type="text/javascript">
	
	var wsUri = null;
	var host = "<?php echo @$config['host'] ?>";
	var port = "<?php echo @$config['port'] ?>";
	var protocoleHttp = window.location.protocol;
	var protocoleWs = "ws://";
	
	if(protocoleHttp.indexOf('https') + 1)
		protocoleWs = "wss://";
		
	wsUri = protocoleWs + host + ":" + port;
	

	websocket = new WebSocket(wsUri);

	websocket.onopen = function(ev){

		console.log('Open connection LiveReload!');

	}

	websocket.onmessage = function(ev) {

		if(ev.data == "@changed")
			window.location.reload();

	};

	window.addEventListener('beforeunload', function(window){

	    return function(){

	        console.log("close connection LiveReload!");

		    websocket.close();

	    }

	}(window));

</script>
