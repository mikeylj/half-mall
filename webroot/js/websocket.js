// 初始话WebSocket
function initWebSocket(fn,user,url) {
	if (window.WebSocket) {
		// var websocket = new WebSocket(encodeURI('ws://'+url));
		// websocket.onopen = function() {
         //    msg = new Object();
         //    msg.cmd = 'login';
         //    msg.name = user.name;
         //    msg.avatar = user.avatar;
         //    websocket.send($.toJSON(msg));
        //
		// 	// websocket.send('Join' + user);
		// }
		// websocket.onerror = function() {
		// }
		// websocket.onclose = function() {
		//
		// }
		// // 消息接收
		// websocket.onmessage = function(message) {
		// 	var message = message.data;
		// 		fn(message);
		// }
		// return websocket;
	}
}
