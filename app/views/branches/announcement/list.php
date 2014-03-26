<form id="pagerForm" method="post" action="branches/announcement.html?class_id=<?php echo $branch->id; ?>">
    <input type="hidden" name="pageNum" value="<?php echo $pagination->cur; ?>" />
    <input type="hidden" name="numPerPage" value="<?php echo $pagination->per; ?>" />
</form>

<div class="pageContent">
    <div class="panelBar">
        <ul class="toolBar">
			<?php if ('administrator' == $user->user_type): ?>
	            <li><a class="add" href="branches/announcement/add.html?class_id=<?php echo $branch->id; ?>" target="dialog" width="645" height="400" mask="true"><span>添加</span></a></li>
	            <li><a class="delete" href="branches/announcement/del.html?id={announcement}" target="ajaxTodo" title="确定要删除吗？" warn="请选择一条记录"><span>删除</span></a></li>
	            <li><a class="edit" href="branches/announcement/edit.html?id={announcement}" target="dialog" width="645" height="400"  mask="true" warn="请选择一条记录"><span>修改</span></a></li>
	            <li class="line">line</li>
			<?php endif; ?>
            <li><a class="icon" href="branches/announcement.html?class_id=<?php echo $branch->id; ?>" target="ajax" rel="branch_announcement"><span>刷新</span></a></li>
        </ul>
    </div>

    <div id="w_list_print">
        <table class="list" width="100%" targetType="navTab" layoutH="104"><!-- layoutH="52" -->
            <thead>
                <tr>
                    <th width="40">ID</th>
                    <th>标题</th>
                    <th>公告时间</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($publics as $public): ?>
					<tr target="announcement" rel="<?php echo $public->id; ?>">
						<td><?php echo $public->id; ?></td>
						<td>
							<a href="branches/announcement/view.html?id=<?php echo $public->id; ?>" target="dialog" width="645" height="400" mask="true"><?php echo $public->title; ?>(公)</a>
						</td>
						<td><?php echo $public->time; ?></td>
					</tr>
				<?php endforeach; ?>
				<?php foreach ($announcements as $announcement): ?>
					<tr target="announcement" rel="<?php echo $announcement->id; ?>">
						<td><?php echo $announcement->id; ?></td>
						<td>
							<a href="branches/announcement/view.html?id=<?php echo $announcement->id; ?>" target="dialog" width="645" height="400" mask="true"><?php echo $announcement->title; ?></a>
						</td>
						<td><?php echo $announcement->time; ?></td>
					</tr>
				<?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="panelBar" >
        <div class="pages">
            <span>显示</span>
            <select name="numPerPage" onchange="navTabPageBreak({numPerPage: this.value}, 'branch_announcement')">
                <option value="20">20</option>
                <option value="50">50</option>
                <option value="100">100</option>
                <option value="200">200</option>
            </select>
            <span>条，共<?php echo $pagination->total; ?>条</span>
        </div>

        <div class="pagination" rel="branch_announcement" totalCount="<?php echo $pagination->total; ?>" numPerPage="<?php echo $pagination->per; ?>" pageNumShown="10" currentPage="<?php echo $pagination->cur; ?>"></div>

    </div>

</div>
