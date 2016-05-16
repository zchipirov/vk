<?php
/* Smarty version 3.1.29, created on 2016-05-10 18:49:27
  from "Z:\home\localhost\www\vk\templates\index.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5731f4f750b1c3_93815939',
  'file_dependency' => 
  array (
    'a51529a07b787c33c336169904a55f2eab332043' => 
    array (
      0 => 'Z:\\home\\localhost\\www\\vk\\templates\\index.tpl',
      1 => 1462891762,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5731f4f750b1c3_93815939 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->configLoad->_loadConfigFile($_smarty_tpl, "test.conf", "setup", 0);
?>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
?>

<h2 class="sub-header">Поиск по группам VK</h2>
  <form method="POST" action="index.php" name="form_indx" id="form_indx">
		<input type="hidden" name="action" id="action" value=""/>
		<div class="btn-group" role="group" aria-label="...">
			<div class="btn-group">
			  <button type="button" class="btn btn-danger">Список</button>
			  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
			 <span class="caret"></span>
			 <span class="sr-only">Меню с переключением</span>
			 </button>
			  <ul class="dropdown-menu" role="menu">
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
					<li><a><input type="radio" name="ls" id="ls" value="<?php echo $_smarty_tpl->tpl_vars['ls']->value['id'];?>
"/>&nbsp;<?php echo $_smarty_tpl->tpl_vars['ls']->value['title'];?>
</a></li>
				<?php
$_smarty_tpl->tpl_vars['ls'] = $__foreach_ls_0_saved_local_item;
}
if ($__foreach_ls_0_saved_item) {
$_smarty_tpl->tpl_vars['ls'] = $__foreach_ls_0_saved_item;
}
?>
			  </ul>
			</div>
			<button type="button" class="btn btn-success" onclick="$('#action').val('search');$('#form_indx').submit();">Анализировать</button>
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
$__foreach_gr_1_saved_item = isset($_smarty_tpl->tpl_vars['gr']) ? $_smarty_tpl->tpl_vars['gr'] : false;
$_smarty_tpl->tpl_vars['gr'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['gr']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['gr']->value) {
$_smarty_tpl->tpl_vars['gr']->_loop = true;
$__foreach_gr_1_saved_local_item = $_smarty_tpl->tpl_vars['gr'];
?>
					<tr>
					  <td><input type='radio' name='rb[]' value='<?php echo $_smarty_tpl->tpl_vars['gr']->value["id"];?>
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
$_smarty_tpl->tpl_vars['gr'] = $__foreach_gr_1_saved_local_item;
}
if ($__foreach_gr_1_saved_item) {
$_smarty_tpl->tpl_vars['gr'] = $__foreach_gr_1_saved_item;
}
?>
				
			  </tbody>
			</table>
		</div>
  </form>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
