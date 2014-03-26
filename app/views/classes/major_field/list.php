<form id="pagerForm" method="post" action="classes/major_field.html">
	<input type="hidden" name="pageNum" value="<?php echo $pagination->cur; ?>" />
	<input type="hidden" name="numPerPage" value="<?php echo $pagination->per; ?>" />
</form>

<div class="pageContent">
	<div class="panelBar">
		<ul class="toolBar">
			<li><a class="add" href="classes/major_field/add.html" rel="add_major_field" target="dialog" width="300" height="200" mask="true"><span>添加</span></a></li>
			<li><a class="edit" href="classes/major_field/edit.html?id={major_field}" target="dialog" width="300" height="200" mask="true" rel="edit_major_field" warn="请选择一个专业方向"><span>修改</span></a></li>
			<li><a class="delete" href="classes/major_field/del.html?id={major_field}" target="ajaxTodo" title="确定要删除吗？" warn="请选择一个专业方向"><span>删除</span></a></li>
			<li class="line">line</li>
			<!--<li><a class="icon" href="classes/major_field.html" target="navTab" rel="major_field"><span>刷新</span></a></li>-->
		</ul>
	</div>

	<div id="w_list_print">
		<table class="list" width="100%" targetType="navTab" layoutH="52">
			<thead>
				<tr>
					<th width="30">ID</th>
					<th>专业名称</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($major_fields as $major_field): ?>
					<tr target="major_field" rel="<?php echo $major_field->id; ?>">
						<td><?php echo $major_field->id; ?></td>
						<td><?php echo $major_field->name; ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<div class="panelBar" >
		<div class="pages">
			<span>显示</span>
			<select name="numPerPage" onchange="navTabPageBreak({numPerPage: this.value})">
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
