<form id="pagerForm" method="post" action="classes/aid_report.html">
	<input type="hidden" name="pageNum" value="<?php echo $pagination->cur; ?>" />
	<input type="hidden" name="numPerPage" value="<?php echo $pagination->per; ?>" />
</form>

<div class="pageContent">
<form rel="pagerForm" method="post" action="classes/aid_report.html" onsubmit="return '1' === $(this).find('input[name=export]').val() ? true : navTabSearch(this);">
	<div class="panelBar">
		<ul class="toolBar">
			<!--<li><a class="add" href="classes/aid_report/add.html" rel="add_aid_report" target="dialog" width="800" height="600" mask="true"><span>添加</span></a></li>-->
			<!--<li><a class="edit" href="classes/aid_report/edit.html?id={aid_report}" target="dialog" width="800" height="600" mask="true" rel="edit_aid_report" warn="请选择一条记录"><span>修改</span></a></li>-->
			<?php if ('administrator' == $user_type): ?>
				<li><a class="delete" href="classes/aid_report/del.html?id={aid_report}" target="ajaxTodo" title="确定要删除吗？" warn="请选择一条申请"><span>删除</span></a></li>
				<li class="line">line</li>
			<?php endif; ?>
			<?php if (in_array($user_type, array('administrator', 'unit'))): ?>
				<li><a class="edit" href="classes/aid_report/review.html?id={aid_report}" target="dialog" width="300" height="200" mask="true" rel="review_aid_report" warn="请选择一条申请"><span>单个审批</span></a></li>
				<li><a class="edit" title="确实要审批通过这些申请吗?" target="selectedTodo" rel="ids" postType="string" href="classes/aid_report/bulk_review.html?status=2"><span>批量通过审批</span></a></li>
				<li><a class="delete" title="确实要审批不通过这些申请吗?" target="selectedTodo" rel="ids" postType="string" href="classes/aid_report/bulk_review.html?status=1"><span>批量不通过审批</span></a></li>
				<li class="line">line</li>
			<?php endif; ?>
			<?php if ('student' == $user_type): ?>
				<li><a class="add" href="classes/aid_report/add.html" rel="add_aid_item" target="dialog" width="800" height="600" mask="true"><span>提交考核</span></a></li>
				<li class="line">line</li>
			<?php endif; ?>
			<li><a class="icon" href="classes/aid_report/view.html?id={aid_report}" target="dialog" width="800" height="600" mask="true" rel="view_aid_report" warn="请选择一条申请"><span>查看</span></a></li>
			<li class="line">line</li>
			<!--<li><a class="icon" href="classes/aid_report.html" target="ajax" rel="aid_report" fresh="false"><span>刷新</span></a></li>-->
        <?php if ('administrator' == $user_type): ?>
				<li><a class="edit" href="classes/aid_report/export.html" target="dialog" width="350" height="200" mask="true" rel="view_aid_report"><span>导出Excel</span></a></li>
				<li class="line">line</li>
		<?php endif; ?>
		</ul>
	</div>
</form>
	<div id="w_list_print">
		<table class="list" width="100%" targetType="navTab" layoutH="52">
			<thead>
				<tr>
					<th width="22"><input type="checkbox" group="ids" class="checkboxCtrl"></th>
					<th width="60">学生姓名</th>
					<th width="120">所在班级</th>
					<th>用人单位</th>
					<th>岗位</th>
					<th>月份</th>
					<th>提交时间</th>
					<th>用人单位审批</th>
					<th>研工部审批</th>
					<?php if ('administrator' == $user->user_type): ?>
						<th width="60">打印</th>
					<?php endif; ?>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($aid_reports as $aid_report): ?>
					<tr target="aid_report" rel="<?php echo $aid_report->id; ?>">
						<td><input name="ids" value="<?php echo $aid_report->id; ?>" type="checkbox"></td>
						<td>
							<a href="users/student/view.html?id=<?php echo $aid_report->student_id; ?>" rel="users/student/view.html?id=<?php echo $aid_report->student_id; ?>" target="navTab"><?php echo $aid_report->student_name; ?></a>
						</td>
						<td>
							<a href="classes.html?class_id=<?php echo $aid_report->class_id; ?>" target="navTab" rel="class"><?php echo $aid_report->class_name; ?></a>
						</td>
						<td>
							<?php echo $aid_report->unit_name; ?>
						</td>
						<td>
							<a href="classes/aid_item/view.html?id=<?php echo $aid_report->item_id; ?>" target="dialog" width="800" height="600" mask="true"><?php echo $aid_report->item_title; ?></a>
						</td>
						<td>
							<?php echo $aid_report->month; ?>月
						</td>
						<td><?php echo $aid_report->report_time; ?></td>
						<td>
							<?php if ($aid_report->status < 1): ?>
								<span style="color: orange;">未审批</span>
							<?php elseif ($aid_report->status == 1): ?>
								<span style="color: red;">未通过</span>
							<?php else: ?>
								<span style="color: green;">已通过</span>
							<?php endif; ?>
						</td>
						<td>
							<?php if ($aid_report->status < 3): ?>
								<span style="color: orange;">未审批</span>
							<?php elseif ($aid_report->status == 3): ?>
								<span style="color: red;">未通过</span>
							<?php else: ?>
								<span style="color: green;">已通过</span>
							<?php endif; ?>
						</td>
						<?php if ('administrator' == $user->user_type): ?>
							<td>
								<a title="打印" class="btnInfo" href="classes/aid_report/print_view.html?id=<?php echo $aid_report->id; ?>" target="_blank"><span>打印</span></a>
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
