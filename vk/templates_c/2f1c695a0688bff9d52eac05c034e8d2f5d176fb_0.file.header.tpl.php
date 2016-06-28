<?php
/* Smarty version 3.1.29, created on 2016-06-17 11:21:53
  from "Z:\home\localhost\www\vk\templates\header.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5763a511c3e899_01362273',
  'file_dependency' => 
  array (
    '2f1c695a0688bff9d52eac05c034e8d2f5d176fb' => 
    array (
      0 => 'Z:\\home\\localhost\\www\\vk\\templates\\header.tpl',
      1 => 1466148064,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5763a511c3e899_01362273 ($_smarty_tpl) {
?>
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
    <!--[if lt IE 9]><?php echo '<script'; ?>
 src="../../assets/js/ie8-responsive-file-warning.js"><?php echo '</script'; ?>
><![endif]-->
    <?php echo '<script'; ?>
 src="./bs/js/ie-emulation-modes-warning.js"><?php echo '</script'; ?>
>
  
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"><?php echo '</script'; ?>
>
      <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"><?php echo '</script'; ?>
>
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
            <li><a href="./groups.php">Группы</a></li>
            <li><a href="./lists.php">Списки</a></li>
            <li><a href="./settings.php">Настройки</a></li>
            <li><a href="./auth.php?logout=1">Выход</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li <?php if (isset($_smarty_tpl->tpl_vars['home']->value)) {?>class="active"<?php }?>><a href="index.php">Поиск по группам <span class="sr-only">(current)</span></a></li>
			<li <?php if (isset($_smarty_tpl->tpl_vars['user']->value)) {?>class="active"<?php }?>><a href="index2.php">Поиск по пользователю <span class="sr-only">(current)</span></a></li>
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
		<?php echo '<script'; ?>
>
		function CloseMessagePanel() {
			$("#panel").hide(300);
		}
		<?php echo '</script'; ?>
>
		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<?php if (isset($_smarty_tpl->tpl_vars['info']->value) || isset($_smarty_tpl->tpl_vars['errors']->value)) {
echo '<script'; ?>
>setTimeout(CloseMessagePanel, 3000);<?php echo '</script'; ?>
><div class="alert alert-<?php if (isset($_smarty_tpl->tpl_vars['info']->value)) {?>success<?php } elseif (isset($_smarty_tpl->tpl_vars['errors']->value)) {?>danger<?php }?>" role="alert" name="panel" id="panel"><?php if (isset($_smarty_tpl->tpl_vars['info']->value)) {
echo $_smarty_tpl->tpl_vars['info']->value;
} elseif (isset($_smarty_tpl->tpl_vars['errors']->value)) {
echo $_smarty_tpl->tpl_vars['errors']->value;
}?></div><?php }
}
}
