<form id="pagerForm" method="post" action="branches/prepare_material.html?class_id=<?php echo $branch->id; ?>">
    <input type="hidden" name="pageNum" value="<?php echo $pagination->cur; ?>" />
    <input type="hidden" name="numPerPage" value="<?php echo $pagination->per; ?>" />
</form>

<div class="pageContent">
    <div class="panelBar">
        <ul class="toolBar">
            <li><a class="add" href="branches/prepare_material/add.html?class_id=<?php echo $branch->id; ?>" target="dialog" width="645" height="400" mask="true"><span>添加</span></a></li>
            <li><a class="delete" href="branches/prepare_material/del.html?id={prepare_material}" target="ajaxTodo" title="确定要删除吗？" warn="请选择一条记录"><span>删除</span></a></li>
            <li><a class="edit" href="branches/prepare_material/edit.html?id={prepare_material}" target="dialog" width="645" height="400"  mask="true" warn="请选择一条记录"><span>修改</span></a></li>
            <li class="line">line</li>
			<?php if ('administrator' == $user->user_type): ?>
	            <li><a class="edit" href="branches/prepare_material/review.html?id={prepare_material}" target="ajaxTodo" title="确定要通过审核吗？" warn="请选择一条记录"><span>审核</span></a></li>
	            <li class="line">line</li>
			<?php endif; ?>
            <li><a class="icon" href="branches/prepare_material.html?class_id=<?php echo $branch->id; ?>" target="ajax" rel="excellent_full_box"><span>刷新</span></a></li>
        </ul>
    </div>

    <div id="w_list_print">
        <table class="list" width="100%" targetType="navTab" layoutH="104"><!-- layoutH="52" -->
            <thead>
                <tr>
                    <th width="60">学生姓名</th>
                    <th>入党申请书</th>
                    <th>团组织推优表</th>
                    <th>积极分子考察表</th>
                    <th>思想汇报</th>
                    <th>党校结业证复印件</th>
                    <th>群众座谈会议记录</th>
                    <th>政审函调</th>
                    <th>政审综合表</th>
                    <th>自传</th>
                </tr>
            </thead>
            <tbody>
				<?php foreach ($prepare_materials as $prepare_material): ?>
					<tr target="prepare_material" rel="<?php echo $prepare_material->material_id; ?>">
						<td>
							<a href="users/student/view.html?id=<?php echo $prepare_material->student_id; ?>" rel="users/student/view.html?id=<?php echo $prepare_material->student_id; ?>" target="navTab"><?php echo $prepare_material->student_name; ?></a>
						</td>
						<td>
							<?php $prepare_material->membership_application and print '√'; ?>
						</td>
						<td>
							<?php $prepare_material->tuiyou_table and print '√'; ?>
						</td>
						<td>
							<?php $prepare_material->activist_inspection and print '√'; ?>
						</td>
						<td>
							<?php $prepare_material->thinking_report and print '√'; ?>
						</td>
						<td>
							<?php $prepare_material->completion_certificate and print '√'; ?>
						</td>
						<td>
							<?php $prepare_material->masses_discussion and print '√'; ?>
						</td>
						<td>
							<?php $prepare_material->politics_audit_letter and print '√'; ?>
						</td>
						<td>
							<?php $prepare_material->politics_audit_complex and print '√'; ?>
						</td>
						<td>
							<?php $prepare_material->autobiography and print '√'; ?>
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
