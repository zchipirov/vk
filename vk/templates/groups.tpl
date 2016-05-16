{include file="header.tpl" title=foo}

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
				{foreach $groups as $gr}
					<tr>
					  <td><input type='checkbox' name='ch[]' value='{$gr["id"]}'></td>
					  <td>{$gr['title']}</td>
					  <td>{$gr['group_id']}</td>
					  <td>{$gr['u_id']}</td>
					  <td>{$gr['dt']}</td>
					</tr>
				{/foreach}
				
			  </tbody>
			</table>
		</div>
  </form>

{include file="footer.tpl"}