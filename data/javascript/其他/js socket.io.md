# socket.io的使用方法

> 配合wokerman的web-sender使用

```html
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<script src='//cdn.bootcss.com/socket.io/1.3.7/socket.io.js'></script>
</head>
<body>
	<script>
		function connector(config){
		    // 连接服务端
		    var socket = io(config.url);
		    // 连接后登录
		    socket.on('connect', function(){
		    	socket.emit('login', config.uid||'');
		    });
		    return socket;
		}
		var socket = connector({
			url:'http://'+document.domain+':2120',
			uid:123
		});
	    // 后端推送来消息时
	    socket.on('new_msg', function(msg){
	        new Notification('new message',{body:msg});
	    });
	    // 后端推送来在线数据时
	    socket.on('update_online_count', function(online_stat){
	        new Notification('update_online_count',{body:online_stat,icon:'https://ss0.bdstatic.com/5aV1bjqh_Q23odCf/static/superman/img/logo_top_ca79a146.png'});
	    });
	</script>
</body>
</html>

```

