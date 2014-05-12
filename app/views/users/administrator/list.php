<form id="pagerForm" method="post" action="users/administrator.html">
	<input type="hidden" name="pageNum" value="<?php echo $pagination->cur; ?>" />
	<input type="hidden" name="numPerPage" value="<?php echo $pagination->per; ?>" />
</form>

<div class="pageContent">
	<div class="panelBar">
		<ul class="toolBar">
			<li><a class="add" href="users/administrator/add.html" target="dialog" mask="true"><span>添加</span></a></li>
			<li><a class="delete" href="users/administrator/del.html?id={administrator}" target="ajaxTodo" title="确定要删除吗？" warn="请选择一个用户"><span>删除</span></a></li>
			<li><a class="edit" href="users/administrator/edit.html?id={administrator}" target="dialog" mask="true" warn="请选择一个用户"><span>修改</span></a></li>
			<li class="line">line</li>
			<li><a class="add" href="users/administrator/view.html?id={administrator}" target="dialog" mask="true" warn="请选择一个用户"><span>查看</span></a></li>
		</ul>
	</div>

	<div id="w_list_print">
		<table class="list" width="100%" targetType="navTab" layoutH="52">
			<thead>
				<tr>
					<th>ID</th>
					<th>用户名</th>
					<th>姓名</th>
					<th>性别</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($administrators as $administrator): ?>
					<tr target="administrator" rel="<?php echo $administrator->id; ?>">
						<td><?php echo $administrator->id; ?></td>
						<td><?php echo $administrator->username; ?></td>
						<td><a class="add" href="users/administrator/view.html?id=<?php echo $administrator->id; ?>" target="dialog" mask="true"><?php echo $administrator->name; ?></a></td>
						<td><?php echo $administrator->sexual; ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<div class="panelBar" >
		<div class="pages">
			<span>显示</span>
			<select name="numPerPage" onchange="navTabPageBreak({numPerPage:this.value})">
				<?php
				foreach (array(20,50,100,200) as $per)
				    echo sprintf('<option value="%s"%s>%s</option>', $per, $per==$pagination->per?' selected="selected"':'', $per);
				?>
			</select>
			<span>条，共<?php echo $pagination->total; ?>条</span>
		</div>

		<div class="pagination" targetType="navTab" totalCount="<?php echo $pagination->total; ?>" numPerPage="<?php echo $pagination->per; ?>" pageNumShown="10" currentPage="<?php echo $pagination->cur; ?>"></div>

	</div>

</div>
