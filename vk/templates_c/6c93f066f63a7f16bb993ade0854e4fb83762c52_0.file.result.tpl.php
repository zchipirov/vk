<?php
/* Smarty version 3.1.29, created on 2016-06-10 13:41:36
  from "Z:\home\localhost\www\vk\templates\result.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_575a8b4f703920_00789157',
  'file_dependency' => 
  array (
    '6c93f066f63a7f16bb993ade0854e4fb83762c52' => 
    array (
      0 => 'Z:\\home\\localhost\\www\\vk\\templates\\result.tpl',
      1 => 1465551277,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_575a8b4f703920_00789157 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
?>


<form method="POST" action="index.php" name="form_r" id="form_r">
	<input type="hidden" name="action" id="action" value=""/>
	<div class="btn-group" role="group" aria-label="...">
		<h2 class="sub-header">Результат</h2>&nbsp;<button type="button" class="btn btn-default" onclick="$('#form_r').submit();">Назад</button>
	</div>
	<?php if (isset($_smarty_tpl->tpl_vars['audio_']->value)) {?>
		<div class="table-responsive">
			<h3 class="sub-header">Аудио</h3>
			<table class="table table-striped">
			  <thead>
				<tr>
				  <th>#</th>
				  <th>Владелец</th>
				  <th>Название</th>
				  <th>Адрес</th>
				</tr>
			  </thead>
			  <tbody>
				<?php $_smarty_tpl->tpl_vars["i"] = new Smarty_Variable("1", null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "i", 0);?>
				<?php
$_from = $_smarty_tpl->tpl_vars['audio_']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_audio_0_saved_item = isset($_smarty_tpl->tpl_vars['audio']) ? $_smarty_tpl->tpl_vars['audio'] : false;
$_smarty_tpl->tpl_vars['audio'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['audio']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['audio']->value) {
$_smarty_tpl->tpl_vars['audio']->_loop = true;
$__foreach_audio_0_saved_local_item = $_smarty_tpl->tpl_vars['audio'];
?>
					<tr>
						<td><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</td>
						<td><a href="https://vk.com/id<?php echo $_smarty_tpl->tpl_vars['audio']->value['user_id'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['audio']->value['user_id'];?>
</a></td>
						<td><?php echo $_smarty_tpl->tpl_vars['audio']->value['title'];?>
</td>
						<td><a href="<?php echo $_smarty_tpl->tpl_vars['audio']->value['url'];?>
" target="_blank">ссылка</a></td>
						<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable($_smarty_tpl->tpl_vars['i']->value+1, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'i', 0);?>
					</tr>
				<?php
$_smarty_tpl->tpl_vars['audio'] = $__foreach_audio_0_saved_local_item;
}
if ($__foreach_audio_0_saved_item) {
$_smarty_tpl->tpl_vars['audio'] = $__foreach_audio_0_saved_item;
}
?>
			  </tbody>
			</table>
		</div>
	<?php }?>
	
	<?php if (isset($_smarty_tpl->tpl_vars['video_']->value)) {?>
		<div class="table-responsive">
			<h3 class="sub-header">Видео</h3>
			<table class="table table-striped">
			  <thead>
				<tr>
				  <th>#</th>
				  <th>Название</th>
				  <th>Описание</th>
				  <th>Длительность</th>
				  <th>Примечание</th>
				</tr>
			  </thead>
			  <tbody>
				<?php $_smarty_tpl->tpl_vars["i"] = new Smarty_Variable("1", null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "i", 0);?>
				<?php
$_from = $_smarty_tpl->tpl_vars['video_']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_video_1_saved_item = isset($_smarty_tpl->tpl_vars['video']) ? $_smarty_tpl->tpl_vars['video'] : false;
$_smarty_tpl->tpl_vars['video'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['video']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['video']->value) {
$_smarty_tpl->tpl_vars['video']->_loop = true;
$__foreach_video_1_saved_local_item = $_smarty_tpl->tpl_vars['video'];
?>
					<tr>
						<td><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</td>
						<td><a href="https://vk.com/id<?php echo $_smarty_tpl->tpl_vars['video']->value['user_id'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['video']->value['user_id'];?>
</a></td>
						<td><?php echo $_smarty_tpl->tpl_vars['video']->value['title'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['video']->value['duration'];?>
</td>
						<td><a href="<?php echo $_smarty_tpl->tpl_vars['video']->value['player'];?>
" target="_blank">ссылка</a></td>
						<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable($_smarty_tpl->tpl_vars['i']->value+1, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'i', 0);?>
					</tr>
				<?php
$_smarty_tpl->tpl_vars['video'] = $__foreach_video_1_saved_local_item;
}
if ($__foreach_video_1_saved_item) {
$_smarty_tpl->tpl_vars['video'] = $__foreach_video_1_saved_item;
}
?>
			  </tbody>
			</table>
		</div>
	<?php }?>
	
	<?php if (isset($_smarty_tpl->tpl_vars['docs_']->value)) {?>
		<div class="table-responsive">
			<h3 class="sub-header">Документы</h3>
			<table class="table table-striped">
			  <thead>
				<tr>
				  <th>#</th>
				  <th>Название</th>
				  <th>Описание</th>
				  <th>Размер</th>
				  <th>Примечание</th>
				</tr>
			  </thead>
			  <tbody>
				<?php $_smarty_tpl->tpl_vars["i"] = new Smarty_Variable("1", null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "i", 0);?>
				<?php
$_from = $_smarty_tpl->tpl_vars['docs_']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_docs_2_saved_item = isset($_smarty_tpl->tpl_vars['docs']) ? $_smarty_tpl->tpl_vars['docs'] : false;
$_smarty_tpl->tpl_vars['docs'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['docs']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['docs']->value) {
$_smarty_tpl->tpl_vars['docs']->_loop = true;
$__foreach_docs_2_saved_local_item = $_smarty_tpl->tpl_vars['docs'];
?>
					<tr>
						<td><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</td>
						<td><a href="https://vk.com/id<?php echo $_smarty_tpl->tpl_vars['docs']->value['user_id'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['docs']->value['user_id'];?>
</a></td>
						<td><?php echo $_smarty_tpl->tpl_vars['docs']->value['title'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['docs']->value['size'];?>
</td>
						<td><a href="<?php echo $_smarty_tpl->tpl_vars['docs']->value['url'];?>
" target="_blank">ссылка</a></td>
						<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable($_smarty_tpl->tpl_vars['i']->value+1, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'i', 0);?>
					</tr>
				<?php
$_smarty_tpl->tpl_vars['docs'] = $__foreach_docs_2_saved_local_item;
}
if ($__foreach_docs_2_saved_item) {
$_smarty_tpl->tpl_vars['docs'] = $__foreach_docs_2_saved_item;
}
?>
			  </tbody>
			</table>
		</div>
	<?php }?>
	
	<?php if (isset($_smarty_tpl->tpl_vars['groups_']->value)) {?>
		<div class="table-responsive">
			<h3 class="sub-header">Группы</h3>
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
				<?php $_smarty_tpl->tpl_vars["i"] = new Smarty_Variable("1", null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "i", 0);?>
				<?php
$_from = $_smarty_tpl->tpl_vars['groups_']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_groups_3_saved_item = isset($_smarty_tpl->tpl_vars['groups']) ? $_smarty_tpl->tpl_vars['groups'] : false;
$_smarty_tpl->tpl_vars['groups'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['groups']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['groups']->value) {
$_smarty_tpl->tpl_vars['groups']->_loop = true;
$__foreach_groups_3_saved_local_item = $_smarty_tpl->tpl_vars['groups'];
?>
					<tr>
						<td><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</td>
						<td><a href="https://vk.com/id<?php echo $_smarty_tpl->tpl_vars['groups']->value['user_id'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['groups']->value['user_id'];?>
</a></td>
						<td><?php echo $_smarty_tpl->tpl_vars['groups']->value['title'];?>
</td>
						<td><a href="<?php echo $_smarty_tpl->tpl_vars['docs']->value['url'];?>
" target="_blank">ссылка</a></td>
						<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable($_smarty_tpl->tpl_vars['i']->value+1, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'i', 0);?>
					</tr>
				<?php
$_smarty_tpl->tpl_vars['groups'] = $__foreach_groups_3_saved_local_item;
}
if ($__foreach_groups_3_saved_item) {
$_smarty_tpl->tpl_vars['groups'] = $__foreach_groups_3_saved_item;
}
?>
			  </tbody>
			</table>
		</div>
	<?php }?>
	
	<?php if (isset($_smarty_tpl->tpl_vars['friends_']->value)) {?>
		<div class="table-responsive">
			<h3 class="sub-header">Друзья</h3>
			<table class="table table-striped">
			  <thead>
				<tr>
				  <th>#</th>
				  <th>Название</th>
				  <th>Имя</th>
				  <th>Фамилия</th>
				</tr>
			  </thead>
			  <tbody>
				<?php $_smarty_tpl->tpl_vars["i"] = new Smarty_Variable("1", null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "i", 0);?>
				<?php
$_from = $_smarty_tpl->tpl_vars['friends_']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_friends_4_saved_item = isset($_smarty_tpl->tpl_vars['friends']) ? $_smarty_tpl->tpl_vars['friends'] : false;
$_smarty_tpl->tpl_vars['friends'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['friends']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['friends']->value) {
$_smarty_tpl->tpl_vars['friends']->_loop = true;
$__foreach_friends_4_saved_local_item = $_smarty_tpl->tpl_vars['friends'];
?>
					<tr>
						<td><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</td>
						<td><a href="https://vk.com/id<?php echo $_smarty_tpl->tpl_vars['friends']->value['user_id'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['friends']->value['user_id'];?>
</a></td>
						<td><?php echo $_smarty_tpl->tpl_vars['friends']->value['first_name'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['friends']->value['last_name'];?>
</td>
						<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable($_smarty_tpl->tpl_vars['i']->value+1, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'i', 0);?>
					</tr>
				<?php
$_smarty_tpl->tpl_vars['friends'] = $__foreach_friends_4_saved_local_item;
}
if ($__foreach_friends_4_saved_item) {
$_smarty_tpl->tpl_vars['friends'] = $__foreach_friends_4_saved_item;
}
?>
			  </tbody>
			</table>
		</div>
	<?php }?>
</form>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
