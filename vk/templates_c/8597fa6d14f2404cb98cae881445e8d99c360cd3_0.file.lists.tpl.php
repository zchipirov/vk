<?php
/* Smarty version 3.1.29, created on 2016-05-10 16:28:39
  from "Z:\home\localhost\www\vk\templates\lists.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5731d3f7680537_43679458',
  'file_dependency' => 
  array (
    '8597fa6d14f2404cb98cae881445e8d99c360cd3' => 
    array (
      0 => 'Z:\\home\\localhost\\www\\vk\\templates\\lists.tpl',
      1 => 1462883288,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5731d3f7680537_43679458 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
?>


<h2 class="sub-header">Списки</h2>
<form method="POST" action="lists.php" name="form_ls" id="form_ls">
	<input type="hidden" name="action" id="action" value=""/>
	<div class="btn-group" role="group" aria-label="...">
		<button type="button" class="btn btn-success" onclick="$('#action').val('add');$('#form_ls').submit();">Добавить</button>
		<button type="button" class="btn btn-info" onclick="$('#action').val('edit');$('#form_ls').submit();">Редактировать</button>
		<button type="button" class="btn btn-warning" onclick="$('#action').val('open');$('#form_ls').submit();">Открыть</button>
		<button type="button" class="btn btn-danger" onclick="$('#action').val('del');$('#form_ls').submit();">Удалить</button>
	</div>
	<div class="table-responsive">
		<table class="table table-striped">
		  <thead>
			<tr>
			  <th>#</th>
			  <th>Название</th>
			  <th>Пользователь</th>
			  <th>Дата добавления</th>
			</tr>
		  </thead>
		  <tbody>
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
				<tr>
				  <td><input type='radio' name='rb[]' value='<?php echo $_smarty_tpl->tpl_vars['ls']->value["id"];?>
'></td>
				  <td><?php echo $_smarty_tpl->tpl_vars['ls']->value['title'];?>
</td>
				  <td><?php echo $_smarty_tpl->tpl_vars['ls']->value['user_id'];?>
</td>
				  <td><?php echo $_smarty_tpl->tpl_vars['ls']->value['dt'];?>
</td>
				</tr>
			<?php
$_smarty_tpl->tpl_vars['ls'] = $__foreach_ls_0_saved_local_item;
}
if ($__foreach_ls_0_saved_item) {
$_smarty_tpl->tpl_vars['ls'] = $__foreach_ls_0_saved_item;
}
?>			
		  </tbody>
		</table>
	</div>
</form>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
