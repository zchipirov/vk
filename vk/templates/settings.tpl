{include file="header.tpl" title=foo}
<form method="POST" action="settings.php" name="form_r" id="form_r">
	<input type="hidden" name="action" id="action" value=""/>
	<div class="panel panel-default" style="margin-top: 5px;width: 50%">
		<div class="panel-heading"></div>
		<table class="table">
			<tr>
				<td width="30%"><b>Процент совпадения</b></td>
				<td><input type="text" id="percent" name="percent" value="{$percent}"/></td>
			</tr>
		</table>
	</div>
	<br>
	<button type="button" class="btn btn-success" onclick="$('#form_r').submit();" id="save">Сохранить</button>
</form>

{include file="footer.tpl"}