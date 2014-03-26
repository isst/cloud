<form id="pagerForm" method="post" action="branches/growth_publicity.html?class_id=<?php echo $branch->id; ?>">
    <input type="hidden" name="pageNum" value="<?php echo $pagination->cur; ?>" />
    <input type="hidden" name="numPerPage" value="<?php echo $pagination->per; ?>" />
</form>

<div class="pageContent">
    <div class="panelBar">
        <ul class="toolBar">
            <li><a class="add" href="branches/growth_publicity/add.html?class_id=<?php echo $branch->id; ?>" target="dialog" width="645" height="400" mask="true"><span>添加</span></a></li>
            <li><a class="delete" href="branches/growth_publicity/del.html?id={growth_publicity}" target="ajaxTodo" title="确定要删除吗？" warn="请选择一条记录"><span>删除</span></a></li>
            <li><a class="edit" href="branches/growth_publicity/edit.html?id={growth_publicity}" target="dialog" width="645" height="400"  mask="true" warn="请选择一条记录"><span>修改</span></a></li>
            <li class="line">line</li>
            <li><a class="edit" href="branches/growth_publicity/review.html?id={growth_publicity}" target="ajaxTodo" width="400" height="240" title="确定要升为发展对象吗？" warn="请选择一条记录"><span>升为发展对象</span></a></li>
            <li class="line">line</li>
            <li><a class="icon" href="branches/growth_publicity.html?class_id=<?php echo $branch->id; ?>" target="ajax" rel="excellent_full_box"><span>刷新</span></a></li>
        </ul>
    </div>

    <div id="w_list_print">
        <table class="list" width="100%" targetType="navTab" layoutH="104"><!-- layoutH="52" -->
            <thead>
                <tr>
                    <th width="60">学生姓名</th>
                    <th>公示时间</th>
                    <th>公示网址</th>
                    <th>公示结果</th>
                </tr>
            </thead>
            <tbody>
				<?php foreach ($growth_publicitys as $growth_publicity): ?>
					<tr target="growth_publicity" rel="<?php echo $growth_publicity->id; ?>">
						<td>
							<a href="users/student/view.html?id=<?php echo $growth_publicity->student_id; ?>" rel="users/student/view.html?id=<?php echo $growth_publicity->student_id; ?>" target="navTab"><?php echo $growth_publicity->student_name; ?></a>
						</td>
						<td>
							<?php echo $growth_publicity->date_from; ?> 至 <?php echo $growth_publicity->date_to; ?>
						</td>
						<td>
							<a href="<?php echo $growth_publicity->url; ?>" target="_blank"><?php echo $growth_publicity->url; ?></a>
						</td>
						<td>
							<?php echo $growth_publicity->result ? '通过' : '未通过'; ?>
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
                <option value="20">20</option>
                <option value="50">50</option>
                <option value="100">100</option>
                <option value="200">200</option>
            </select>
            <span>条，共<?php echo $pagination->total; ?>条</span>
        </div>

        <div class="pagination" rel="excellent_full_box" totalCount="<?php echo $pagination->total; ?>" numPerPage="<?php echo $pagination->per; ?>" pageNumShown="10" currentPage="<?php echo $pagination->cur; ?>"></div>

    </div>

</div>
