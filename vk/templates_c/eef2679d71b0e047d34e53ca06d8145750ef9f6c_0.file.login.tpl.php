<?php
/* Smarty version 3.1.29, created on 2016-04-18 17:13:22
  from "Z:\home\localhost\www\vk\templates\login.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5714dd721b97f4_10601750',
  'file_dependency' => 
  array (
    'eef2679d71b0e047d34e53ca06d8145750ef9f6c' => 
    array (
      0 => 'Z:\\home\\localhost\\www\\vk\\templates\\login.tpl',
      1 => 1460538853,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:logheader.tpl' => 1,
    'file:logfooter.tpl' => 1,
  ),
),false)) {
function content_5714dd721b97f4_10601750 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:logheader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
?>

    <div class="container">

      <form class="form-signin" role="form" id="auth" name="auth" method="POST">
        <h2 class="form-signin-heading">Авторизация</h2>
        <input type="text" id="login" name="login" class="form-control" placeholder="Логин" required autofocus>
        <input type="password" id="passwd" name="passwd" class="form-control" placeholder="Пароль" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Вход</button>
      </form>

    </div> <!-- /container -->
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:logfooter.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
