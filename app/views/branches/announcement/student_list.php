<form id="pagerForm" method="post" action="branches/announcement/student_list.html?class_id=<?php echo $branch->id; ?>">
    <input type="hidden" name="pageNum" value="<?php echo $pagination->cur; ?>" />
    <input type="hidden" name="numPerPage" value="<?php echo $pagination->per; ?>" />
</form>

<div class="pageContent">
    <div class="panelBar">
        <ul class="toolBar">
            <li><a class="icon" href="branches/announcement/student_list.html?class_id=<?php echo $branch->id; ?>" target="ajax" rel="branch_announcement"><span>刷新</span></a></li>
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
            <select name="numPerPage" onchange="navTabPageBreak({numPerPage:this.value},'branch_announcement')">
                <?php
                foreach (array(20,50,100,200) as $per) {
                    echo sprintf('<option value="%s"%s>%s</option>', $per, $per==$pagination->per?' selected="selected"':'', $per);
                }
                ?>
            </select>
            <span>条，共<?php echo $pagination->total; ?>条</span>
        </div>

        <div class="pagination" rel="branch_announcement" totalCount="<?php echo $pagination->total; ?>" numPerPage="<?php echo $pagination->per; ?>" pageNumShown="10" currentPage="<?php echo $pagination->cur; ?>"></div>

    </div>

</div>
