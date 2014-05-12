<form id="pagerForm" method="post" action="branches/full_member_application.html?class_id=<?php echo $branch->id; ?>">
    <input type="hidden" name="pageNum" value="<?php echo $pagination->cur; ?>" />
    <input type="hidden" name="numPerPage" value="<?php echo $pagination->per; ?>" />
</form>

<div class="pageContent">
    <div class="panelBar">
        <ul class="toolBar">
            <li><a class="add" href="branches/full_member_application/add.html?class_id=<?php echo $branch->id; ?>" target="dialog" width="645" height="400" mask="true"><span>添加</span></a></li>
            <li><a class="delete" href="branches/full_member_application/del.html?id={full_member_application}" target="ajaxTodo" title="确定要删除吗？" warn="请选择一条记录"><span>删除</span></a></li>
            <li><a class="edit" href="branches/full_member_application/edit.html?id={full_member_application}" target="dialog" width="645" height="400"  mask="true" warn="请选择一条记录"><span>修改</span></a></li>
            <li class="line">line</li>
            <li><a class="edit" href="branches/full_member_application/review.html?id={full_member_application}" target="ajaxTodo" title="确定要成为正式党员吗？" warn="请选择一条记录"><span>成为正式党员</span></a></li>
            <li class="line">line</li>
            <li><a class="icon" href="branches/full_member_application.html?class_id=<?php echo $branch->id; ?>" target="ajax" rel="excellent_full_box"><span>刷新</span></a></li>
        </ul>
    </div>

    <div id="w_list_print">
        <table class="list" width="100%" targetType="navTab" layoutH="104"><!-- layoutH="52" -->
            <thead>
                <tr>
                    <th width="80">学生姓名</th>
                    <th width="320">审核结果</th>
                    <th>备注</th>
                </tr>
            </thead>
            <tbody>
				<?php foreach ($full_member_applications as $full_member_application): ?>
					<tr target="full_member_application" rel="<?php echo $full_member_application->id; ?>">
						<td>
							<a href="users/student/view.html?id=<?php echo $full_member_application->student_id; ?>" rel="users/student/view.html?id=<?php echo $full_member_application->student_id; ?>" target="navTab"><?php echo $full_member_application->student_name; ?></a>
						</td>
						<td>
							<?php if ($full_member_application->result): ?>
								通过(<?php echo $full_member_application->date_from; ?>起转为中共正式党员)
							<?php else: ?>
								不通过
							<?php endif; ?>
						</td>
						<td>
							<?php echo $full_member_application->notes; ?>
						</td>
					</tr>
				<?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="panelBar" >
        <div class="pages">
            <span>显示</span>
            <select name="numPerPage" onchange="navTabPageBreak({numPerPage: this.value}, 'excellent_full_box')">
                <?php
                foreach (array(20,50,100,200) as $per)
                    echo sprintf('<option value="%s"%s>%s</option>', $per, $per==$pagination->per?' selected="selected"':'', $per);
                ?>
            </select>
            <span>条，共<?php echo $pagination->total; ?>条</span>
        </div>

        <div class="pagination" rel="excellent_full_box" totalCount="<?php echo $pagination->total; ?>" numPerPage="<?php echo $pagination->per; ?>" pageNumShown="10" currentPage="<?php echo $pagination->cur; ?>"></div>

    </div>

</div>
