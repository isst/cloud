<form id="pagerForm" method="post" action="users/unit.html">
	<input type="hidden" name="pageNum" value="<?php echo $pagination->cur; ?>" />
	<input type="hidden" name="numPerPage" value="<?php echo $pagination->per; ?>" />
</form>

<div class="pageContent">
	<div class="panelBar">
		<ul class="toolBar">
			<li><a class="add" href="users/unit/add.html" target="dialog" mask="true"><span>添加</span></a></li>
			<li><a class="delete" href="users/unit/del.html?id={unit}" target="ajaxTodo" title="确定要删除吗？" warn="请选择一个用户"><span>删除</span></a></li>
			<li><a class="edit" href="users/unit/edit.html?id={unit}" target="dialog" mask="true" warn="请选择一个用户"><span>修改</span></a></li>
			<li class="line">line</li>
			<li><a class="add" href="users/unit/view.html?id={unit}" target="dialog" mask="true" warn="请选择一个用户"><span>查看</span></a></li>
		</ul>
	</div>

	<div id="w_list_print">
		<table class="list" width="100%" targetType="navTab" layoutH="52">
			<thead>
				<tr>
					<th>单位名称</th>
					<th>用户名</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($units as $unit): ?>
					<tr target="unit" rel="<?php echo $unit->id; ?>">
						<td><a class="add" href="users/unit/view.html?id=<?php echo $unit->id; ?>" target="dialog" mask="true"><?php echo $unit->name; ?></a></td>
						<td><?php echo $unit->username; ?></td>
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
