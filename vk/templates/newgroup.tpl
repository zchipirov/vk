{include file="header.tpl" title=foo}
<h2 class="sub-header">{if isset($action) && $action == 'edit'}Редактирование{else}Добавление{/if} группы VK</h2>
<div class="table-responsive">
	<form class="bs-example bs-example-form" data-example-id="input-group-with-checkbox-radio" action="groups.php" method="POST" name="form_gr" id="form_gr" style="width: 70%">
		<input type="hidden" name="action" id="action" value=""/>
		<input type="hidden" name="id" id="id" value="{if isset($group)}{$group['id']}{else}-1{/if}"/>
		<div class="row" style="width: 100%">
			<div class="col-lg-5">
				<div class="input-group input-group-lg">
				  <span class="input-group-addon" id="sizing-addon1">Название</span>
				  <input type="text" class="form-control" aria-describedby="sizing-addon1" name="title" id="title" value="{if isset($group)}{$group['title']}{/if}"/>
				</div>
			</div>
		</div>
		<br>
		<div class="row" style="width: 100%">
			<div class="col-lg-5">
				<div class="input-group input-group-lg">
				  <span class="input-group-addon" id="sizing-addon1">ID группы</span>
				  <input type="text" class="form-control" aria-describedby="sizing-addon1" name="group_id" id="group_id" value="{if isset($group)}{$group['group_id']}{/if}"/>
				</div>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-lg-5">	
				<button type="button" class="btn btn-success" onclick="$('#action').val('{if isset($group)}update{else}save{/if}');$('#form_gr').submit();">{if isset($action) && $action == 'edit'}Править{else}Добавить{/if}</button>
				<button type="button" class="btn btn-default" onclick="$('#action').val('');$('#form_gr').submit();">Отмена</button>
			</div>
		</div>
	</form>
</div>
{include file="footer.tpl"}