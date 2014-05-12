<form id="pagerForm" method="post" action="classes/aid_request.html">
	<input type="hidden" name="pageNum" value="<?php echo $pagination->cur; ?>" />
	<input type="hidden" name="numPerPage" value="<?php echo $pagination->per; ?>" />
</form>

<div class="pageContent">
	<div class="panelBar">
		<ul class="toolBar">
			<!--<li><a class="add" href="classes/aid_request/add.html" rel="add_aid_request" target="dialog" width="800" height="600" mask="true"><span>添加</span></a></li>-->
			<?php if ('student' == $user_type): ?>
				<li><a class="edit" href="classes/aid_request/edit.html?id={aid_request}" target="dialog" width="800" height="600" mask="true" rel="edit_aid_request" warn="请选择一条记录"><span>修改</span></a></li>
			<?php endif; ?>
			<?php if ('administrator' == $user_type): ?>
				<li><a class="delete" href="classes/aid_request/del.html?id={aid_request}" target="ajaxTodo" title="确定要删除吗？" warn="请选择一条申请"><span>删除</span></a></li>
				<li class="line">line</li>
			<?php endif; ?>
			<?php if (in_array($user_type, array('administrator', 'teacher', 'unit'))): ?>
				<li><a class="edit" href="classes/aid_request/review.html?id={aid_request}" target="dialog" width="300" height="200" mask="true" rel="review_aid_request" warn="请选择一条申请"><span>单个审批</span></a></li>
				<li><a class="edit" title="确实要审批通过这些申请吗?" target="selectedTodo" rel="ids" postType="string" href="classes/aid_request/bulk_review.html?status=2"><span>批量通过审批</span></a></li>
				<li><a class="delete" title="确实要审批不通过这些申请吗?" target="selectedTodo" rel="ids" postType="string" href="classes/aid_request/bulk_review.html?status=1"><span>批量不通过审批</span></a></li>
				<li class="line">line</li>
			<?php endif; ?>
			<li><a class="add" href="classes/aid_request/view.html?id={aid_request}" target="dialog" width="800" height="600" mask="true" rel="view_aid_request" warn="请选择一条申请"><span>查看</span></a></li>
			<li class="line">line</li>
			<!--<li><a class="icon" href="classes/aid_request.html" target="ajax" rel="aid_request" fresh="false"><span>刷新</span></a></li>-->
		</ul>
	</div>

	<div id="w_list_print">
		<table class="list" width="100%" targetType="navTab" layoutH="52">
			<thead>
				<tr>
					<th width="22"><input type="checkbox" group="ids" class="checkboxCtrl"></th>
					<th width="60">学生姓名</th>
					<th width="120">所在班级</th>
					<th>申请岗位</th>
					<th>申请时间</th>
					<th>德育导师审批</th>
					<th>用人单位审批</th>
					<th>研工部审批</th>
					<?php if ('administrator' == $user->user_type): ?>
						<th width="60">打印</th>
					<?php endif; ?>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($aid_requests as $aid_request): ?>
					<tr target="aid_request" rel="<?php echo $aid_request->id; ?>">
						<td><input name="ids" value="<?php echo $aid_request->id; ?>" type="checkbox"></td>
						<td>
							<a href="users/student/view.html?id=<?php echo $aid_request->student_id; ?>" rel="users/student/view.html?id=<?php echo $aid_request->student_id; ?>" target="navTab"><?php echo $aid_request->student_name; ?></a>
						</td>
						<td>
							<a href="classes.html?class_id=<?php echo $aid_request->class_id; ?>" target="navTab" rel="class"><?php echo $aid_request->class_name; ?></a>
						</td>
						<td>
							<a href="classes/aid_item/view.html?id=<?php echo $aid_request->item_id; ?>" target="dialog" width="800" height="600" mask="true"><?php echo $aid_request->item_title; ?></a>
						</td>
						<td><?php echo $aid_request->request_time; ?></td>
						<td>
							<?php if ($aid_request->status < 1): ?>
								<span style="color: orange;">未审批</span>
							<?php elseif ($aid_request->status == 1): ?>
								<span style="color: red;">未通过</span>
							<?php else: ?>
								<span style="color: green;">已通过</span>
							<?php endif; ?>
						</td>
						<td>
							<?php if ($aid_request->status < 3): ?>
								<span style="color: orange;">未审批</span>
							<?php elseif ($aid_request->status == 3): ?>
								<span style="color: red;">未通过</span>
							<?php else: ?>
								<span style="color: green;">已通过</span>
							<?php endif; ?>
						</td>
						<td>
							<?php if ($aid_request->status < 5): ?>
								<span style="color: orange;">未审批</span>
							<?php elseif ($aid_request->status == 5): ?>
								<span style="color: red;">未通过</span>
							<?php else: ?>
								<span style="color: green;">已通过</span>
							<?php endif; ?>
						</td>
						<?php if ('administrator' == $user->user_type): ?>
							<td>
								<a title="打印" class="btnInfo" href="classes/aid_request/print_view.html?id=<?php echo $aid_request->id; ?>" target="_blank"><span>打印</span></a>
							</td>
						<?php endif; ?>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<div class="panelBar" >
		<div class="pages">
			<span>显示</span>
			<select name="numPerPage" onchange="navTabPageBreak({numPerPage: this.value})">
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
