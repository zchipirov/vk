<?php
/* Smarty version 3.1.29, created on 2016-05-10 16:30:44
  from "Z:\home\localhost\www\vk\templates\filllist.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5731d474cb5912_39030209',
  'file_dependency' => 
  array (
    '4f635c0d2d75a476377a5bf3be17c06f7903c0ef' => 
    array (
      0 => 'Z:\\home\\localhost\\www\\vk\\templates\\filllist.tpl',
      1 => 1462883259,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5731d474cb5912_39030209 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
?>

<?php echo '<script'; ?>
 src="./bs/js/ie-emulation-modes-warning.js"><?php echo '</script'; ?>
>

<h2 class="sub-header">Управление списком "<?php echo $_smarty_tpl->tpl_vars['list']->value['title'];?>
"</h2>
<form method="POST" action="lists.php" name="form_ls" id="form_ls">
	<input type="hidden" name="action" id="action" value=""/>
	<div class="btn-group" role="group" aria-label="...">
		<button type="button" class="btn btn-success" onclick="$('#action').val('add');$('#form_ls').submit();">Добавить</button>
		<button type="button" class="btn btn-danger" onclick="$('#action').val('del');$('#form_ls').submit();">Удалить</button>
		<button type="button" class="btn btn-primary" onclick="$('#action').val('load');$('#form_ls').submit();">Загрузить с Excel</button>
	</div>
	<div class="table-responsive">
		<table class="table table-striped">
		  <thead>
			<tr>
			  <th>#</th>
			  <th>Название</th>
			  <th>Описание</th>
			  <th>Примечание</th>
			</tr>
		  </thead>
		  <tbody>
			<?php
$_from = $_smarty_tpl->tpl_vars['list_content']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_lc_0_saved_item = isset($_smarty_tpl->tpl_vars['lc']) ? $_smarty_tpl->tpl_vars['lc'] : false;
$_smarty_tpl->tpl_vars['lc'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['lc']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['lc']->value) {
$_smarty_tpl->tpl_vars['lc']->_loop = true;
$__foreach_lc_0_saved_local_item = $_smarty_tpl->tpl_vars['lc'];
?>
				<tr>
				  <td><input type='radio' name='rb[]' value='<?php echo $_smarty_tpl->tpl_vars['lc']->value["id"];?>
'></td>
				  <td><?php echo $_smarty_tpl->tpl_vars['lc']->value['title'];?>
</td>
				  <td><?php echo $_smarty_tpl->tpl_vars['lc']->value['caption'];?>
</td>
				  <td><?php echo $_smarty_tpl->tpl_vars['lc']->value['note'];?>
</td>
				</tr>
			<?php
$_smarty_tpl->tpl_vars['lc'] = $__foreach_lc_0_saved_local_item;
}
if ($__foreach_lc_0_saved_item) {
$_smarty_tpl->tpl_vars['lc'] = $__foreach_lc_0_saved_item;
}
?>			
		  </tbody>
		</table>
	</div>
</form>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
