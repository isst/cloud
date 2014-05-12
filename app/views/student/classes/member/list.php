<form id="pagerForm" method="post" action="classes/member.html?class_id=<?php echo $class->id; ?>">
	<input type="hidden" name="pageNum" value="<?php echo $pagination->cur; ?>" />
	<input type="hidden" name="numPerPage" value="<?php echo $pagination->per; ?>" />
</form>

<div class="pageContent">
	<div class="panelBar">
		<ul class="toolBar">
			<li><a class="icon" href="classes/member.html?class_id=<?php echo $class->id; ?>" target="ajax" rel="class_member"><span>刷新</span></a></li>
		</ul>
	</div>

	<div id="w_list_print">
		<table class="list" width="100%" targetType="navTab" layoutH="52">
			<thead>
				<tr>
					<th width="40">ID</th>
					<th>学号</th>
					<th>学生姓名</th>
					<th>性别</th>
					<th>班级职务</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($members as $member): ?>
					<tr target="member" rel="<?php echo $member->student_id; ?>">
						<td><?php echo $member->student_id; ?></td>
						<td><?php echo $member->student_num; ?></td>
						<td><?php echo $member->name; ?></td>
						<td><?php echo $member->student_sexual; ?></td>
						<td><?php echo $member_class_title_names[$member->class_title]; ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<div class="panelBar" >
		<div class="pages">
			<span>显示</span>
			<select name="numPerPage" onchange="navTabPageBreak({numPerPage:this.value},'classes_member')">
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
