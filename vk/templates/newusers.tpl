{include file="header.tpl" title=foo}
<h2 class="sub-header">Добавление пользователя</h2>
<div class="table-responsive">
	<form class="bs-example bs-example-form" data-example-id="input-group-with-checkbox-radio" action="users2.php" method="POST" name="form_ls" id="form_ls" style="width: 70%">
		<input type="hidden" name="action" id="action" value=""/>
		<div class="row" style="width: 100%">
			<div class="col-lg-5">
				<div class="input-group input-group-lg">
				  <span class="input-group-addon" id="sizing-addon1">Логин</span>
				  <input type="text" class="form-control" aria-describedby="sizing-addon1" name="login" id="login" value="{if isset($list)}{$list['title']}{/if}"/>
				</div>
				<div class="input-group input-group-lg">
				  <span class="input-group-addon" id="sizing-addon1">Пароль</span>
				  <input type="password" class="form-control" aria-describedby="sizing-addon1" name="passwd" id="passwd" value="{if isset($list)}{$list['title']}{/if}"/>
				</div>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-lg-5">	
				<button type="button" class="btn btn-success" onclick="$('#action').val('{if isset($list)}update{else}save{/if}');$('#form_ls').submit();">Добавить</button>
				<button type="button" class="btn btn-default" onclick="$('#action').val('');$('#form_ls').submit();">Отмена</button>
			</div>
		</div>
	</form>
</div>
{include file="footer.tpl"}