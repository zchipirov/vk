{include file="header.tpl" title=foo}
<script src="./bs/js/ie-emulation-modes-warning.js"></script>

<h2 class="sub-header">Управление списком "{$list['title']}"</h2>
<form method="POST" action="lists.php" name="form_ls" id="form_ls" enctype="multipart/form-data">
	<input type="hidden" name="action" id="action" value=""/>
	<input type="hidden" name="id" id="id" value="{if isset($id)}{$id}{/if}"/>
	<div class="btn-group" role="group" aria-label="...">
		<button type="button" class="btn btn-default" onclick="$('#form_ls').submit();">Назад</button>
		<button type="button" class="btn btn-success" onclick="$('#action').val('add_c');$('#form_ls').submit();">Добавить</button>
		<button type="button" class="btn btn-danger" onclick="$('#action').val('del_c');$('#form_ls').submit();">Удалить</button>
	</div>
	
	<div class="btn-group" role="group" aria-label="...">
		<label class="btn btn-warning btn-file">
			Открыть файл excel <input type="file" style="display: none;" name="f" id="f">
		</label>
		<button type="button" class="btn btn-primary" onclick="$('#action').val('load');$('#form_ls').submit();">Загрузить</button>
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
			{foreach $list_content as $lc}
				<tr>
				  <td><input type='radio' name='lc[]' value='{$lc["id"]}'></td>
				  <td>{$lc['title']}</td>
				  <td>{$lc['caption']}</td>
				  <td>{$lc['note']}</td>
				</tr>
			{/foreach}			
		  </tbody>
		</table>
	</div>
</form>

{include file="footer.tpl"}