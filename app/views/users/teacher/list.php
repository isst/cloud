<form id="pagerForm" method="post" action="users/teacher.html">
	<input type="hidden" name="pageNum" value="<?php echo $pagination->cur; ?>" />
	<input type="hidden" name="numPerPage" value="<?php echo $pagination->per; ?>" />
</form>

<div class="pageContent">
	<div class="panelBar">
		<ul class="toolBar">
			<li><a class="add" href="users/teacher/add.html" target="dialog" mask="true"><span>添加</span></a></li>
			<li><a class="delete" href="users/teacher/del.html?id={teacher}" target="ajaxTodo" title="确定要删除吗？" warn="请选择一个用户"><span>删除</span></a></li>
			<li><a class="edit" href="users/teacher/edit.html?id={teacher}" target="dialog" mask="true" warn="请选择一个用户"><span>修改</span></a></li>
			<li class="line">line</li>
			<li><a class="add" href="users/teacher/view.html?id={teacher}" target="dialog" mask="true" warn="请选择一个用户"><span>查看</span></a></li>
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
					<th>联系方式</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($teachers as $teacher): ?>
					<tr target="teacher" rel="<?php echo $teacher->id; ?>">
						<td><?php echo $teacher->id; ?></td>
						<td><?php echo $teacher->username; ?></td>
						<td><a class="add" href="users/teacher/view.html?id=<?php echo $teacher->id; ?>" target="dialog" mask="true"><?php echo $teacher->name; ?></a></td>
						<td><?php echo $teacher->sexual; ?></td>
						<td><?php echo $teacher->contact; ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<div class="panelBar" >
		<div class="pages">
			<span>显示</span>
			<select name="numPerPage" onchange="navTabPageBreak({numPerPage:this.value})">
				<option value="20">20</option>
				<option value="50">50</option>
				<option value="100">100</option>
				<option value="200">200</option>
			</select>
			<span>条，共<?php echo $pagination->total; ?>条</span>
		</div>

		<div class="pagination" targetType="navTab" totalCount="<?php echo $pagination->total; ?>" numPerPage="<?php echo $pagination->per; ?>" pageNumShown="10" currentPage="<?php echo $pagination->cur; ?>"></div>

	</div>

</div>
