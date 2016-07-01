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
	<button type="button" class="btn btn-success" onclick="" id="save">Сохранить в Excel</button>
	<!--{if isset($source) && $source=='audio'}
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
	{/if}-->
	
	<!--{if isset($video_)}
		<div class="table-responsive">
			<h3 class="sub-header">Видео</h3>
			<table class="table table-striped">
			  <thead>
				<tr>
				  <th>#</th>
				  <th>Название</th>
				  <th>Описание</th>
				  <th>Длительность</th>
				  <th>Примечание</th>
				</tr>
			  </thead>
			  <tbody>
				{assign var="i" value="1"}
				{foreach $video_ as $video}
					<tr>
						<td>{$i}</td>
						<td><a href="https://vk.com/id{$video['user_id']}" target="_blank">{$video['user_id']}</a></td>
						<td>{$video['title']}</td>
						<td>{$video['duration']}</td>
						<td><a href="{$video['player']}" target="_blank">ссылка</a></td>
						{$i = $i + 1}
					</tr>
				{/foreach}
			  </tbody>
			</table>
		</div>
	{/if}
	
	{if isset($docs_)}
		<div class="table-responsive">
			<h3 class="sub-header">Документы</h3>
			<table class="table table-striped">
			  <thead>
				<tr>
				  <th>#</th>
				  <th>Название</th>
				  <th>Описание</th>
				  <th>Размер</th>
				  <th>Примечание</th>
				</tr>
			  </thead>
			  <tbody>
				{assign var="i" value="1"}
				{foreach $docs_ as $docs}
					<tr>
						<td>{$i}</td>
						<td><a href="https://vk.com/id{$docs['user_id']}" target="_blank">{$docs['user_id']}</a></td>
						<td>{$docs['title']}</td>
						<td>{$docs['size']}</td>
						<td><a href="{$docs['url']}" target="_blank">ссылка</a></td>
						{$i = $i + 1}
					</tr>
				{/foreach}
			  </tbody>
			</table>
		</div>
	{/if}
	
	{if isset($groups_)}
		<div class="table-responsive">
			<h3 class="sub-header">Группы</h3>
			<table class="table table-striped">
			  <thead>
				<tr>
				  <th>#</th>
				  <th>Название</th>
				  <th>Описание</th>
				  <th>Примечание</th>
				</tr>
			  </thead>
			  <tbody>
				{assign var="i" value="1"}
				{foreach $groups_ as $groups}
					<tr>
						<td>{$i}</td>
						<td><a href="https://vk.com/id{$groups['user_id']}" target="_blank">{$groups['user_id']}</a></td>
						<td>{$groups['title']}</td>
						<td><a href="{$docs['url']}" target="_blank">ссылка</a></td>
						{$i = $i + 1}
					</tr>
				{/foreach}
			  </tbody>
			</table>
		</div>
	{/if}
	
	{if isset($friends_)}
		<div class="table-responsive">
			<h3 class="sub-header">Друзья</h3>
			<table class="table table-striped">
			  <thead>
				<tr>
				  <th>#</th>
				  <th>Название</th>
				  <th>Имя</th>
				  <th>Фамилия</th>
				</tr>
			  </thead>
			  <tbody>
				{assign var="i" value="1"}
				{foreach $friends_ as $friends}
					<tr>
						<td>{$i}</td>
						<td><a href="https://vk.com/id{$friends['user_id']}" target="_blank">{$friends['user_id']}</a></td>
						<td>{$friends['first_name']}</td>
						<td>{$friends['last_name']}</td>
						{$i = $i + 1}
					</tr>
				{/foreach}
			  </tbody>
			</table>
		</div>
	{/if}-->
</form>

{include file="footer.tpl"}