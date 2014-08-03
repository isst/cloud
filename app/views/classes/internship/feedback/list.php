<form id="pagerForm" method="post" action="classes/internship_feedback.html?student_id=<?php echo $student_id; ?>">
	<input type="hidden" name="pageNum" value="<?php echo $pagination->cur; ?>" />
	<input type="hidden" name="numPerPage" value="<?php echo $pagination->per; ?>" />
</form>

<div class="pageContent">
	<div class="panelBar">
		<ul class="toolBar">
			<li><a class="add" href="classes/internship_feedback/add.html?student_id=<?php echo $student_id; ?>" rel="add_internship_feedback" target="dialog" width="600" height="420" mask="true"><span>添加</span></a></li>
			<li><a class="edit" href="classes/internship_feedback/edit.html?id={feedback_id}" target="dialog" width="600" height="420" mask="true" rel="edit_internship_feedback" warn="请选择一个反馈信息"><span>修改</span></a></li>
			<li><a class="delete" href="classes/internship_feedback/del.html?id={feedback_id}" target="ajaxTodo" title="确定要删除吗？" warn="请选择一个反馈信息"><span>删除</span></a></li>
			<li class="line">line</li>
			<!--<li><a class="icon" href="classes/internship.html" target="navTab" rel="internship"><span>刷新</span></a></li>-->
		</ul>
	</div>

	<div id="w_list_print">
		<table class="list" width="100%" targetType="navTab" layoutH="52">
			<thead>
				<tr>
					<th width="30">ID</th>
					<th>实习公司名称</th>
					<th>填写人</th>
					<th>反馈内容</th>
					<th>反馈时间</th>
                    <th>更新时间</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($feedbacks as $feedback): ?>
					<tr target="feedback_id" rel="<?php echo $feedback->id; ?>">
						<td><?php echo $feedback->id; ?></td>
						<td><?php echo $feedback->company; ?></td>
                        <td><?php echo $feedback->editor; ?></td>
						<td><?php echo $feedback->content; ?></td>
						<td><?php echo $feedback->feedback_time; ?></td>
                        <td><?php echo $feedback->updated; ?></td>
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
