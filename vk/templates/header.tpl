<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Поиск и анализ информации в социальной сети vk.com</title>

    <!-- Bootstrap core CSS -->
    <link href="./bs/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="./bs/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
	<link rel="stylesheet" href="./bs/css/bootstrap-select.css">
	
    <!-- Custom styles for this template -->
    <link href="./bs/css/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="./bs/js/ie-emulation-modes-warning.js"></script>
	<script src="http://vk.com/js/api/openapi.js" type="text/javascript"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="./index.php"><img src="./bs/img/logo.png"/></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="./groups.php">Группы</a></li>
            <li><a href="./lists.php">Списки</a></li>
            <li><a href="./settings.php">Настройки</a></li>
			<!--<li><a href="./users.php">Пользователи</a></li>-->
            <li><a href="./auth.php?logout=1">Выход</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li {if isset($home)}class="active"{/if}><a href="index.php">Поиск по группам <span class="sr-only">(current)</span></a></li>
			<li {if isset($user)}class="active"{/if}><a href="index2.php">Поиск по пользователю <span class="sr-only">(current)</span></a></li>
          </ul>
          <!--<ul class="nav nav-sidebar">
            <li>Поиск на странице пользователя:</li>
            <li><a href="">- по стене</a></li>
            <li><a href="">- по аудио</a></li>
            <li><a href="">- по видео</a></li>
            <li><a href="">- по документам</a></li>
			<li><a href="">- по друзьям</a></li>
			<li><a href="">- по группам</a></li>
          </ul>-->
        </div>
		<script type="text/javascript">
			VK.init({
				apiId: 5382063
			});

			// VK.Auth.logout(function(response) {});

			VK.Auth.getLoginStatus(function(response) {
			  if (response.session) {
				/* Авторизованный в Open API пользователь, response.status="connected" */
			  } else {
					VK.Auth.login(function(response) {
					  if (response.session) {
						/* Пользователь успешно авторизовался */
						if (response.settings) {
						  /* Выбранные настройки доступа пользователя, если они были запрошены */
						}
					  } else {
						/* Пользователь нажал кнопку Отмена в окне авторизации */
					  }
					}, 8+2+262144+131072+16);
			  }
			});
			
			function CloseMessagePanel() {
				$("#panel").hide(300);
			}
		</script>
		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		{if isset($info) || isset($errors)}<script>setTimeout(CloseMessagePanel, 3000);</script><div class="alert alert-{if isset($info)}success{elseif isset($errors)}danger{/if}" role="alert" name="panel" id="panel">{if isset($info)}{$info}{elseif isset($errors)}{$errors}{/if}</div>{/if}
