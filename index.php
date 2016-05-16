<html>
<head>
<title>Перенаправление на служебный сайт Денвера...</title>
<script src="//vk.com/js/api/xd_connection.js?2"  type="text/javascript"></script>
<script type="text/javascript"> 
	VK.init(function() { 
		alert('succeeded');
	}, function() {
		alert('failed');
	}, '5.50'); 
	function UsersGet() {
		alert('a');
		VK.api("users.get", {user_ids:"299472499"}, function(data) { 
			alert('a');
		});
	}
	UsersGet();
</script>
</head>
</html>
