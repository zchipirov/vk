<?php
/* Smarty version 3.1.29, created on 2016-06-01 17:23:59
  from "Z:\home\localhost\www\vk\templates\groups.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_574ee1ef9df9d0_34536572',
  'file_dependency' => 
  array (
    'ac46037ea51020c1f044cfd723c3d08ed871b058' => 
    array (
      0 => 'Z:\\home\\localhost\\www\\vk\\templates\\groups.tpl',
      1 => 1464787435,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_574ee1ef9df9d0_34536572 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
?>


  <h2 class="sub-header">Группы VK</h2>
  <form method="POST" action="groups.php" name="form_gr" id="form_gr">
		<input type="hidden" name="action" id="action" value=""/>
		<div class="btn-group" role="group" aria-label="...">
			<button type="button" class="btn btn-success" onclick="$('#action').val('add');$('#form_gr').submit();">Добавить</button>
			<button type="button" class="btn btn-info" onclick="$('#action').val('edit');$('#form_gr').submit();">Редактировать</button>
			<button type="button" class="btn btn-danger" onclick="$('#action').val('del');$('#form_gr').submit();">Удалить</button>
		</div>
		<div class="table-responsive">
			<table class="table table-striped">
			  <thead>
				<tr>
				  <th>#</th>
				  <th>Название</th>
				  <th>ID</th>
				  <th>Пользователь</th>
				  <th>Дата добавления</th>
				</tr>
			  </thead>
			  <tbody>
				<?php
$_from = $_smarty_tpl->tpl_vars['groups']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_gr_0_saved_item = isset($_smarty_tpl->tpl_vars['gr']) ? $_smarty_tpl->tpl_vars['gr'] : false;
$_smarty_tpl->tpl_vars['gr'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['gr']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['gr']->value) {
$_smarty_tpl->tpl_vars['gr']->_loop = true;
$__foreach_gr_0_saved_local_item = $_smarty_tpl->tpl_vars['gr'];
?>
					<tr>
					  <td><input type='checkbox' name='ch[]' value='<?php echo $_smarty_tpl->tpl_vars['gr']->value["id"];?>
'></td>
					  <td><?php echo $_smarty_tpl->tpl_vars['gr']->value['title'];?>
</td>
					  <td><?php echo $_smarty_tpl->tpl_vars['gr']->value['group_id'];?>
</td>
					  <td><?php echo $_smarty_tpl->tpl_vars['gr']->value['u_id'];?>
</td>
					  <td><?php echo $_smarty_tpl->tpl_vars['gr']->value['dt'];?>
</td>
					</tr>
				<?php
$_smarty_tpl->tpl_vars['gr'] = $__foreach_gr_0_saved_local_item;
}
if ($__foreach_gr_0_saved_item) {
$_smarty_tpl->tpl_vars['gr'] = $__foreach_gr_0_saved_item;
}
?>
				
			  </tbody>
			</table>
		</div>
  </form>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
