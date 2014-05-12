<form id="pagerForm" method="post" action="branches/activity/student_list.html?class_id=<?php echo $branch->id; ?>">
    <input type="hidden" name="pageNum" value="<?php echo $pagination->cur; ?>" />
    <input type="hidden" name="numPerPage" value="<?php echo $pagination->per; ?>" />
</form>

<div class="pageContent">
    <div class="panelBar">
        <ul class="toolBar">
            <li><a class="icon" href="branches/activity/student_list.html?class_id=<?php echo $branch->id; ?>" target="ajax" rel="branch_activity"><span>刷新</span></a></li>
        </ul>
    </div>

    <div id="w_list_print">
        <table class="list" width="100%" targetType="navTab" layoutH="104"><!-- layoutH="52" -->
            <thead>
                <tr>
                    <th width="40">ID</th>
                    <th width="80">活动时间</th>
                    <th>活动类型</th>
                    <th>活动主题</th>
                    <th width="40">状态</th>
                </tr>
            </thead>
            <tbody>
				<?php foreach ($activities as $activity): ?>
					<tr target="activity" rel="<?php echo $activity->id; ?>">
						<td><?php echo $activity->id; ?></td>
						<td><?php echo $activity->date; ?></td>
						<td><?php echo $activity_type_names[$activity->type]; ?></td>
						<td>
							<a href="branches/activity/view.html?id=<?php echo $activity->id; ?>" target="dialog" width="800" height="600" mask="true"><?php echo $activity->title; ?></a>
						</td>
						<td><?php echo $activity_status_names[$activity->status]; ?></td>
					</tr>
				<?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="panelBar" >
        <div class="pages">
            <span>显示</span>
            <select name="numPerPage" onchange="navTabPageBreak({numPerPage:this.value},'branch_activity')">
                <?php
                foreach (array(20,50,100,200) as $per) {
                    echo sprintf('<option value="%s"%s>%s</option>', $per, $per==$pagination->per?' selected="selected"':'', $per);
                }
                ?>
            </select>
            <span>条，共<?php echo $pagination->total; ?>条</span>
        </div>

        <div class="pagination" rel="branch_activity" totalCount="<?php echo $pagination->total; ?>" numPerPage="<?php echo $pagination->per; ?>" pageNumShown="10" currentPage="<?php echo $pagination->cur; ?>"></div>

    </div>

</div>
