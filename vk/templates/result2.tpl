{include file="header.tpl" title=foo}
<script src="./bs/js/vk.js"></script>
<script type="text/javascript">
	getMembers2('{$source}', {$list_id}, {$percent}, '{$userid}');
</script>
<form method="POST" action="index2.php" name="form_r" id="form_r">
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
				<td width="30%"><b>Поиск на стринице пользователя</b></td>
				<td><a target='_blank' href='http://vk.com/id{$userid}'>{$userid}</a></td>
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
				  <th>Процент соответствия</th>
				  <th>Адрес</th>
				</tr>
			  </thead>
			  <tbody>
				
			  </tbody>
			</table>
		</div>
	{/if}
	{if isset($source) && $source=='video'}
		<div class="table-responsive">
			<h3 class="sub-header">Видео</h3>
			<table class="table table-striped">
			  <thead>
				<tr>
				  <th>#</th>
				  <th>Владелец</th>
				  <th>Название</th>
				  <th>Длительность</th>
				  <th>Процент соответствия</th>
				  <th>Примечание</th>
				</tr>
			  </thead>
			  <tbody>
			  </tbody>
			</table>
		</div>
	{/if}
	
	{if isset($source) && $source=='docs'}
		<div class="table-responsive">
			<h3 class="sub-header">Документы</h3>
			<table class="table table-striped">
			  <thead>
				<tr>
				  <th>#</th>
				  <th>Владелец</th>
				  <th>Название</th>
				  <th>Размер</th>
				  <th>Примечание</th>
				</tr>
			  </thead>
			  <tbody>
			  </tbody>
			</table>
		</div>
	{/if}
	
	{if isset($source) && $source=='groups'}
		<div class="table-responsive">
			<h3 class="sub-header">Группы</h3>
			<table class="table table-striped">
			  <thead>
				<tr>
				  <th>#</th>
				  <th>Владелец</th>
				  <th>Название</th>
				</tr>
			  </thead>
			  <tbody>
			  </tbody>
			</table>
		</div>
	{/if}
	
	{if isset($source) && $source=='friends'}
		<div class="table-responsive">
			<h3 class="sub-header">Друзья</h3>
			<table class="table table-striped">
			  <thead>
				<tr>
				  <th>#</th>
				  <th>Владелец</th>
				  <th>Имя</th>
				  <th>Фамилия</th>
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