{include file="header.tpl" title=foo}
<h2 class="sub-header">Добавление элемента списка</h2>
<div class="table-responsive">
	<form class="bs-example bs-example-form" data-example-id="input-group-with-checkbox-radio" action="lists.php" method="POST" name="form_ls" id="form_ls" style="width: 70%">
		<input type="hidden" name="action" id="action" value=""/>
		<input type="hidden" name="id" id="id" value="{if isset($list)}{$list['id']}{else}-1{/if}"/>
		<div class="row" style="width: 100%">
			<div class="col-lg-5">
				<div class="input-group input-group-lg">
				  <span class="input-group-addon" id="sizing-addon1">Название</span>
				  <input type="text" class="form-control" aria-describedby="sizing-addon1" name="title" id="title" value=""/>
				</div>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-lg-5">	
				<button type="button" class="btn btn-success" onclick="$('#action').val('add_c2');$('#form_ls').submit();">Добавить</button>
				<button type="button" class="btn btn-default" onclick="$('#action').val('');$('#form_ls').submit();">Отмена</button>
			</div>
		</div>
	</form>
</div>
{include file="footer.tpl"}