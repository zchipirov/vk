{include file="header.tpl" title=foo}

<h2 class="sub-header">Пользователи</h2>
<form method="POST" action="users.php" name="form_usr" id="form_usr">
	<input type="hidden" name="action" id="action" value=""/>
	<div class="btn-group" role="group" aria-label="...">
		<button type="button" class="btn btn-success" onclick="$('#action').val('add');$('#form_usr').submit();">Добавить</button>
	</div>
	<div class="table-responsive">
		<table class="table table-striped">
		  <thead>
			<tr>
			  <th>Логин</th>
			</tr>
		  </thead>
		  <tbody>
			{foreach $users as $us}
				<tr>
				  <td>{$us['user_login']}</td>
				</tr>
			{/foreach}			
		  </tbody>
		</table>
	</div>
</form>

{include file="footer.tpl"}