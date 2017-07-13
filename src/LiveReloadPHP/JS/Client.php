
<script language="javascript" type="text/javascript">  

	var wsUri = "ws://localhost:9060"; 	
	websocket = new WebSocket(wsUri); 
	
	websocket.onopen = function(ev){

		console.log('Open connection LiveReload!');

	}
	
	websocket.onmessage = function(ev) {

		if(ev.data == "@changed")
			window.location.reload();

	};

</script>



