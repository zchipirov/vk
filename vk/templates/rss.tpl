{include file="header.tpl" title=foo}
<form method="POST" action="rss.php" name="form_r" id="form_r">
	<input type="hidden" name="action" id="action" value=""/>
	<div class="panel panel-default" style="margin-top: 5px;width: 50%">
		<div class="panel-heading"></div>
		<table class="table">
			<tr>
				<td width="80%"><b>RSS канал:</b></td>
				<td><input type="text" size="100" id="url" name="url" value="http://minjust.ru/ru/extremist-materials/rss"/></td>
			</tr>
		</table>
	</div>
	<br>
	<button type="button" class="btn btn-success" onclick="if (confirm('Данные в базе будут обновлены. Продолжить?')) { $('action').val('load'); $('#form_r').submit(); }" id="save">Загрузить</button>
</form>
{include file="footer.tpl"}