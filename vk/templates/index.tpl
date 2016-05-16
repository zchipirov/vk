{config_load file="test.conf" section="setup"}
{include file="header.tpl" title=foo}
<h2 class="sub-header">����� �� ������� VK</h2>
  <form method="POST" action="index.php" name="form_indx" id="form_indx">
		<input type="hidden" name="action" id="action" value=""/>
		<div class="btn-group" role="group" aria-label="...">
			<div class="btn-group">
			  <button type="button" class="btn btn-danger">������</button>
			  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
			 <span class="caret"></span>
			 <span class="sr-only">���� � �������������</span>
			 </button>
			  <ul class="dropdown-menu" role="menu">
				{foreach $lists as $ls}
					<li><a><input type="radio" name="ls" id="ls" value="{$ls['id']}"/>&nbsp;{$ls['title']}</a></li>
				{/foreach}
			  </ul>
			</div>
			<button type="button" class="btn btn-success" onclick="$('#action').val('search');$('#form_indx').submit();">�������������</button>
		</div>
		<div class="table-responsive">
			<table class="table table-striped">
			  <thead>
				<tr>
				  <th>#</th>
				  <th>��������</th>
				  <th>ID</th>
				  <th>������������</th>
				  <th>���� ����������</th>
				</tr>
			  </thead>
			  <tbody>
				{foreach $groups as $gr}
					<tr>
					  <td><input type='radio' name='rb[]' value='{$gr["id"]}'></td>
					  <td>{$gr['title']}</td>
					  <td>{$gr['group_id']}</td>
					  <td>{$gr['u_id']}</td>
					  <td>{$gr['dt']}</td>
					</tr>
				{/foreach}
				
			  </tbody>
			</table>
		</div>
  </form>
{include file="footer.tpl"}