{config_load file="test.conf" section="setup"}
{include file="header.tpl" title=foo}

<h2 class="sub-header">Поиск по пользователю VK</h2>
  <form method="POST" action="index.php" name="form_indx" id="form_indx">
		<input type="hidden" name="action" id="action" value=""/>
		<div class="btn-group" role="group" aria-label="...">
			<div class="btn-group">
			 <div class="dropdown">
			 <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
				Список
				<span class="caret"></span>
			  </button>
				  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
					{foreach $lists as $ls}
						<li><a><label><input type="radio" checked name="ls" id="ls" value="{$ls['id']}"/>&nbsp;{$ls['title']}</label></a></li>
					{/foreach}
				  </ul>
			  </div>
			  
			</div>
			<button type="button" class="btn btn-success" onclick="$('#action').val('search');$('#form_indx').submit();">Анализировать</button>
		</div>		
		<div class="panel panel-default" style="margin-top: 5px;">
		  <div class="panel-body">
			<ul class="list-group">
				<li class="list-group-item list-group-item-success">выберите источник информации</li>
			</ul>
			<div class="radio">
			  <label><input type="radio" value="1" name="inf" id="audio" checked>&nbsp;Аудио</label>&nbsp;
			  <label><input type="radio" value="2" name="inf" id="video">&nbsp;Видео</label>&nbsp;
			  <label><input type="radio" value="3" name="inf" id="docs">&nbsp;Документы</label>&nbsp;
			  <label><input type="radio" value="4" name="inf" id="friends">&nbsp;Друзья</label>&nbsp;
			  <label><input type="radio" value="5" name="inf" id="groups">&nbsp;Группы</label>&nbsp;
			</div>
			<div class="input-group" style="width: 30%;">
				
			</div>
			<div class="input-group" style="width: 50%;">
			<span class="input-group-addon" id="basic-addon4">ID пользователя:</span>
				<input type="text" class="form-control" id="userid" name="userid" aria-describedby="basic-addon4" placeholder="Обязательный параметр"/>
				<span class="input-group-addon" id="basic-addon3">Город:</span>
				<input type="text" class="form-control" id="city" name="city" aria-describedby="basic-addon3" placeholder="Необязательный параметр"/>
			</div>
		  </div>
		</div>
  </form>
{include file="footer.tpl"}