<?php
/* Smarty version 3.1.29, created on 2016-06-17 11:28:00
  from "Z:\home\localhost\www\vk\templates\index2.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5763a6804e0b19_33866040',
  'file_dependency' => 
  array (
    '65290f04659e1000fd58ea2656cbccd14d32b180' => 
    array (
      0 => 'Z:\\home\\localhost\\www\\vk\\templates\\index2.tpl',
      1 => 1466148478,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5763a6804e0b19_33866040 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->configLoad->_loadConfigFile($_smarty_tpl, "test.conf", "setup", 0);
?>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
?>


<h2 class="sub-header">Поиск по пользователю VK</h2>
  <form method="POST" action="index.php" name="form_indx" id="form_indx">
		<input type="hidden" name="action" id="action" value=""/>
		<div class="btn-group" role="group" aria-label="...">
			<div class="btn-group">
			 <div class="dropdown">
			 <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
				Список
				<span class="caret"></span>
			  </button>
				  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
					<?php
$_from = $_smarty_tpl->tpl_vars['lists']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_ls_0_saved_item = isset($_smarty_tpl->tpl_vars['ls']) ? $_smarty_tpl->tpl_vars['ls'] : false;
$_smarty_tpl->tpl_vars['ls'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['ls']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['ls']->value) {
$_smarty_tpl->tpl_vars['ls']->_loop = true;
$__foreach_ls_0_saved_local_item = $_smarty_tpl->tpl_vars['ls'];
?>
						<li><a><label><input type="radio" checked name="ls" id="ls" value="<?php echo $_smarty_tpl->tpl_vars['ls']->value['id'];?>
"/>&nbsp;<?php echo $_smarty_tpl->tpl_vars['ls']->value['title'];?>
</label></a></li>
					<?php
$_smarty_tpl->tpl_vars['ls'] = $__foreach_ls_0_saved_local_item;
}
if ($__foreach_ls_0_saved_item) {
$_smarty_tpl->tpl_vars['ls'] = $__foreach_ls_0_saved_item;
}
?>
				  </ul>
			  </div>
			  
			</div>
			<button type="button" class="btn btn-success" onclick="$('#action').val('search');$('#form_indx').submit();">Анализировать</button>
		</div>		
		<div class="panel panel-default" style="margin-top: 5px;">
		  <div class="panel-body">
			<ul class="list-group">
				<li class="list-group-item list-group-item-success">выберите источник информации</li>
			</ul>
			<div class="radio">
			  <label><input type="radio" value="1" name="inf" id="audio" checked>&nbsp;Аудио</label>&nbsp;
			  <label><input type="radio" value="2" name="inf" id="video">&nbsp;Видео</label>&nbsp;
			  <label><input type="radio" value="3" name="inf" id="docs">&nbsp;Документы</label>&nbsp;
			  <label><input type="radio" value="4" name="inf" id="friends">&nbsp;Друзья</label>&nbsp;
			  <label><input type="radio" value="5" name="inf" id="groups">&nbsp;Группы</label>&nbsp;
			</div>
			<div class="input-group" style="width: 30%;">
				
			</div>
			<div class="input-group" style="width: 50%;">
			<span class="input-group-addon" id="basic-addon4">ID пользователя:</span>
				<input type="text" class="form-control" id="userid" name="userid" aria-describedby="basic-addon4" placeholder="Обязательный параметр"/>
				<span class="input-group-addon" id="basic-addon3">Город:</span>
				<input type="text" class="form-control" id="city" name="city" aria-describedby="basic-addon3" placeholder="Необязательный параметр"/>
			</div>
		  </div>
		</div>
  </form>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
