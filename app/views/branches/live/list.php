<form id="pagerForm" method="post" action="branches/live.html?class_id=<?php echo $branch->id; ?>">
	<input type="hidden" name="pageNum" value="<?php echo $pagination->cur; ?>" />
	<input type="hidden" name="numPerPage" value="<?php echo $pagination->per; ?>" />
</form>

<div class="pageContent">
	<div class="panelBar">
		<ul class="toolBar">
			<?php if ('administrator' == $user->user_type || ('student' == $user->user_type && $user->is_branch_secretary)): ?>
				<li><a class="add" href="branches/live/add.html?class_id=<?php echo $branch->id; ?>" target="dialog" width="645" height="400" mask="true"><span>添加</span></a></li>
				<li><a class="delete" href="branches/live/del.html?id={live}" target="ajaxTodo" title="确定要删除吗？" warn="请选择一条记录"><span>删除</span></a></li>
				<li><a class="edit" href="branches/live/edit.html?id={live}" target="dialog" width="645" height="400"  mask="true" warn="请选择一条记录"><span>修改</span></a></li>
				<li class="line">line</li>
			<?php endif; ?>
			<li><a class="icon" href="branches/live.html?class_id=<?php echo $branch->id; ?>" target="ajax" rel="branch_live"><span>刷新</span></a></li>
		</ul>
	</div>

	<div id="w_list_print">
		<table class="list" width="100%" targetType="navTab" layoutH="104"><!-- layoutH="52" -->
			<thead>
				<tr>
                    <th width="40">ID</th>
                    <th width="80">时间</th>
                    <th width="160">地点</th>
					<th>标题</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($lives as $live): ?>
					<tr target="live" rel="<?php echo $live->id; ?>">
						<td><?php echo $live->id; ?></td>
						<td><?php echo $live->date; ?></td>
						<td><?php echo $live->place; ?></td>
						<td>
							<a href="branches/live/view.html?id=<?php echo $live->id; ?>" target="dialog" width="645" height="400" mask="true"><?php echo $live->title; ?></a>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<div class="panelBar" >
		<div class="pages">
			<span>显示</span>
			<select name="numPerPage" onchange="navTabPageBreak({numPerPage: this.value}, 'branch_live')">
				<option value="20">20</option>
				<option value="50">50</option>
				<option value="100">100</option>
				<option value="200">200</option>
			</select>
			<span>条，共<?php echo $pagination->total; ?>条</span>
		</div>

		<div class="pagination" rel="branch_live" totalCount="<?php echo $pagination->total; ?>" numPerPage="<?php echo $pagination->per; ?>" pageNumShown="10" currentPage="<?php echo $pagination->cur; ?>"></div>

	</div>

</div>
