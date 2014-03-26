<form id="pagerForm" method="post" action="classes/member.html?class_id=<?php echo $class->id; ?>">
	<input type="hidden" name="pageNum" value="<?php echo $pagination->cur; ?>" />
	<input type="hidden" name="numPerPage" value="<?php echo $pagination->per; ?>" />
</form>

<div class="pageContent">
	<div class="panelBar">
		<ul class="toolBar">
			<?php if ('administrator' == $user_type): ?>
				<li><a class="add" href="classes/member/search.html?class_id=<?php echo $class->id; ?>" target="dialog" width="800" height="600" mask="true"><span>添加</span></a></li>
				<li><a class="delete" href="classes/member/del.html?id={member}" target="ajaxTodo" title="确定要删除吗？" warn="请选择一个学生"><span>删除</span></a></li>
			<?php endif; ?>
			<?php if ('administrator' == $user_type || 'teacher' == $user_type): ?>
				<li><a class="edit" href="classes/member/edit.html?id={member}" target="dialog" width="400" height="400"  mask="true" rel="edit_member" warn="请选择一个学生"><span>修改</span></a></li>
			<?php endif; ?>
			<li class="line">line</li>
			<li><a class="icon" href="classes/member.html?class_id=<?php echo $class->id; ?>" target="ajax" rel="class_member"><span>刷新</span></a></li>
		</ul>
	</div>

	<div id="w_list_print">
		<table class="list" width="100%" targetType="navTab" layoutH="104"><!-- layoutH="52" -->
			<thead>
				<tr>
					<th width="80">姓名</th>
					<th width="120">学号</th>
					<th>性别</th>
					<th>班级职务</th>
                    <td>联系电话</td>
                    <td>邮箱</td>
                    <td>寝室号</td>
					<td>更新时间</td>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($members as $member): ?>
					<tr target="member" rel="<?php echo $member->id; ?>">
						<td><a href="users/student/view.html?id=<?php echo $member->id; ?>" rel="users/student/view.html?id=<?php echo $member->id; ?>" target="navTab"><?php echo $member->name; ?></a></td>
						<td><?php echo $member->student_num; ?></td>
						<td><?php echo $member->sexual; ?></td>
						<td><?php echo $member_class_title_names[$member->class_title]; ?></td>
                        <td><?php echo $member->tel; ?></td>
                        <td><?php echo $member->email; ?></td>
                        <td><?php echo $member->bedroom; ?></td>
						<td><?php echo $member->updatetime; ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<div class="panelBar" >
		<div class="pages">
			<span>显示</span>
			<select name="numPerPage" onchange="navTabPageBreak({numPerPage: this.value}, 'classes_member')">
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
