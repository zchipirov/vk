{include file="header.tpl" title=foo}
<script src="./bs/js/vk.js"></script>
<script type="text/javascript">
	getMembers('{$source}', '{$group_id}', {$list_id}, {$percent});
</script>
<form method="POST" action="index.php" name="form_r" id="form_r">
	<input type="hidden" name="action" id="action" value=""/>
	<div class="btn-group" role="group" aria-label="...">
		<h2 class="sub-header">Результат</h2>&nbsp;<button type="button" class="btn btn-default" onclick="$('#form_r').submit();">Назад</button>
	</div>
	<div class="panel panel-default" style="margin-top: 5px;">
		<div class="panel-heading">Обработка...</div>
		<div class="panel-body">
			<p>Данные обрабатываются в синхронном режиме, во избежание блокировки VK. Возможны подвисания интерфейса. Дождитесь загрузки и сохраните результат.</p>
		</div>
		<table class="table">
			<tr>
				<td width="30%"><b>Группа</b></td>
				<td>{$group_title}</td>
			</tr>
			<tr>
				<td><b>Поиск по</b></td>
				<td>{$source}</td>
			</tr>
			<tr>
				<td><b>Число подписчиков</b></td>
				<td id="group_count">{$group_count}</td>
			</tr>
			<tr>
				<td><b>Список</b></td>
				<td>{$list_title}</td>
			</tr>
			<tr>
				<td><b>Минимальный процент соответствия</b></td>
				<td>{$percent}%</td>
			</tr>
			<tr>
				<td><b>Обработано</b></td>
				<td id="search_status"></td>
			</tr>
			<tr>
				<td><b>Найдено записей</b></td>
				<td id="search_result"></td>
			</tr>
		</table>
	</div>
	<br>
	{if isset($source) && $source=='audio'}
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
				
			  </tbody>
			</table>
		</div>
	{/if}
	<!--<button type="button" class="btn btn-success" onclick="" id="save">Сохранить в Excel</button>-->
</form>

{include file="footer.tpl"}