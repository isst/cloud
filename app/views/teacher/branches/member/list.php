<form id="pagerForm" method="post" action="branches/member.html?class_id=<?php echo $branch->id; ?>">
	<input type="hidden" name="pageNum" value="<?php echo $pagination->cur; ?>" />
	<input type="hidden" name="numPerPage" value="<?php echo $pagination->per; ?>" />
</form>

<div class="pageContent">
	<div class="panelBar">
		<ul class="toolBar">
            <li><a class="add" href="branches/member/add.html?class_id=<?php echo $branch->id; ?>" target="dialog" width="800" height="600" mask="true"><span>添加</span></a></li>
			<li><a class="delete" href="branches/member/del.html?id={member}" target="ajaxTodo" title="确定要删除吗？" warn="请选择一个成员"><span>删除</span></a></li>
            <li><a class="edit" href="branches/member/edit.html?id={member}" target="dialog" width="800" height="600" mask="true" warn="请选择一个成员"><span>修改</span></a></li>
			<li class="line">line</li>
			<li><a class="icon" href="branches/member.html?class_id=<?php echo $branch->id; ?>" target="ajax" rel="branch_member"><span>刷新</span></a></li>
		</ul>
	</div>

	<div id="w_list_print">
		<table class="list" width="100%" targetType="navTab" layoutH="104"><!-- layoutH="52" -->
			<thead>
				<tr>
                    <th width="40">ID</th>
					<th>姓名</th>
					<th>性别</th>
					<th>状态</th>
					<th>支部头衔</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($members as $member): ?>
					<tr target="member" rel="<?php echo $member->member_id; ?>">
						<td><?php echo $member->member_id; ?></td>
						<td><a href="users/student/view.html?id=<?php echo $member->student_id; ?>" rel="users/student/view.html?id=<?php echo $member->id; ?>" target="navTab"><?php echo $member->student_name; ?></a></td>
						<td><?php echo $member->student_sexual; ?></td>
						<td><?php echo $branch_status_names[$member->member_status]; ?></td>
						<td><?php echo $branch_title_names[$member->branch_title]; ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<div class="panelBar" >
		<div class="pages">
			<span>显示</span>
			<select name="numPerPage" onchange="navTabPageBreak({numPerPage:this.value},'branch_member')">
				<option value="20">20</option>
				<option value="50">50</option>
				<option value="100">100</option>
				<option value="200">200</option>
			</select>
			<span>条，共<?php echo $pagination->total; ?>条</span>
		</div>

		<div class="pagination" rel="branch_member" totalCount="<?php echo $pagination->total; ?>" numPerPage="<?php echo $pagination->per; ?>" pageNumShown="10" currentPage="<?php echo $pagination->cur; ?>"></div>

	</div>

</div>
