<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>����� � ������ ���������� � ���������� ���� vk.com</title>

    <!-- Bootstrap core CSS -->
    <link href="./bs/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="./bs/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./bs/css/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="./bs/js/ie-emulation-modes-warning.js"></script>

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
          <a class="navbar-brand" href="#"><img src="./bs/img/logo.png"/></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="./groups.php">������</a></li>
            <li><a href="./lists.php">������</a></li>
            <li><a href="./settings.php">���������</a></li>
            <li><a href="./auth.php?logout=1">�����</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="index.php">����� �� ������� <span class="sr-only">(current)</span></a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li>����� �� �������� ������������:</li>
            <li><a href="">- �� �����</a></li>
            <li><a href="">- �� �����</a></li>
            <li><a href="">- �� �����</a></li>
            <li><a href="">- �� ����������</a></li>
			<li><a href="">- �� �������</a></li>
			<li><a href="">- �� �������</a></li>
          </ul>
        </div>
		<script>
		function CloseMessagePanel() {
			$("#panel").hide(300);
		}
		</script>
		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		{if isset($info) || isset($errors)}<script>setTimeout(CloseMessagePanel, 3000);</script><div class="alert alert-{if isset($info)}success{elseif isset($errors)}danger{/if}" role="alert" name="panel" id="panel">{if isset($info)}{$info}{elseif isset($errors)}{$errors}{/if}</div>{/if}
