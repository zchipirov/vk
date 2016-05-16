<?php
/* Smarty version 3.1.29, created on 2016-05-10 16:30:38
  from "Z:\home\localhost\www\vk\templates\newlist.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5731d46e0e4d50_48357230',
  'file_dependency' => 
  array (
    'c820aabfece529b99e6b42fea6552562a00f2664' => 
    array (
      0 => 'Z:\\home\\localhost\\www\\vk\\templates\\newlist.tpl',
      1 => 1462883309,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5731d46e0e4d50_48357230 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
?>

<h2 class="sub-header"><?php if (isset($_smarty_tpl->tpl_vars['action']->value) && $_smarty_tpl->tpl_vars['action']->value == 'edit') {?>Редактирование<?php } else { ?>Добавление<?php }?> списка</h2>
<div class="table-responsive">
	<form class="bs-example bs-example-form" data-example-id="input-group-with-checkbox-radio" action="lists.php" method="POST" name="form_ls" id="form_ls" style="width: 70%">
		<input type="hidden" name="action" id="action" value=""/>
		<input type="hidden" name="id" id="id" value="<?php if (isset($_smarty_tpl->tpl_vars['list']->value)) {
echo $_smarty_tpl->tpl_vars['list']->value['id'];
} else { ?>-1<?php }?>"/>
		<div class="row" style="width: 100%">
			<div class="col-lg-5">
				<div class="input-group input-group-lg">
				  <span class="input-group-addon" id="sizing-addon1">Название</span>
				  <input type="text" class="form-control" aria-describedby="sizing-addon1" name="title" id="title" value="<?php if (isset($_smarty_tpl->tpl_vars['list']->value)) {
echo $_smarty_tpl->tpl_vars['list']->value['title'];
}?>"/>
				</div>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-lg-5">	
				<button type="button" class="btn btn-success" onclick="$('#action').val('<?php if (isset($_smarty_tpl->tpl_vars['list']->value)) {?>update<?php } else { ?>save<?php }?>');$('#form_ls').submit();"><?php if (isset($_smarty_tpl->tpl_vars['action']->value) && $_smarty_tpl->tpl_vars['action']->value == 'edit') {?>Править<?php } else { ?>Добавить<?php }?></button>
				<button type="button" class="btn btn-default" onclick="$('#action').val('');$('#form_ls').submit();">Отмена</button>
			</div>
		</div>
	</form>
</div>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
