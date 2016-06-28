{include file="header.tpl" title=foo}

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
			{foreach $lists as $ls}
				<tr>
				  <td><input type='radio' name='rb[]' value='{$ls["id"]}'></td>
				  <td>{$ls['title']}</td>
				  <td>{$ls['user_id']}</td>
				  <td>{$ls['dt']}</td>
				</tr>
			{/foreach}			
		  </tbody>
		</table>
	</div>
</form>

{include file="footer.tpl"}