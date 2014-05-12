<form id="pagerForm" method="post" action="branches/reward.html?class_id=<?php echo $branch->id; ?>">
    <input type="hidden" name="pageNum" value="<?php echo $pagination->cur; ?>" />
    <input type="hidden" name="numPerPage" value="<?php echo $pagination->per; ?>" />
</form>

<div class="pageContent">
    <div class="panelBar">
        <ul class="toolBar">
            <li><a class="add" href="branches/reward/add.html?class_id=<?php echo $branch->id; ?>" target="dialog" width="750" height="600" mask="true"><span>添加</span></a></li>
            <li><a class="delete" href="branches/reward/del.html?id={reward}" target="ajaxTodo" title="确定要删除吗？" warn="请选择一条记录"><span>删除</span></a></li>
            <li><a class="edit" href="branches/reward/edit.html?id={reward}" target="dialog" width="800" height="600"  mask="true" warn="请选择一条记录"><span>修改</span></a></li>
            <li class="line">line</li>
            <li><a class="icon" href="branches/reward.html?class_id=<?php echo $branch->id; ?>" target="ajax" rel="reward_penalty_box"><span>刷新</span></a></li>
        </ul>
    </div>

    <div id="w_list_print">
        <table class="list" width="100%" targetType="navTab" layoutH="104"><!-- layoutH="52" -->
            <thead>
                <tr>
                    <th width="40">ID</th>
                    <th width="150">学生姓名</th>
                    <th>标题</th>
                    <th>公告时间</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rewards as $reward): ?>
                    <tr target="reward" rel="<?php echo $reward->reward_id; ?>">
                        <td><?php echo $reward->reward_id; ?></td>
						<td>
							<a href="users/student/view.html?id=<?php echo $reward->student_id; ?>" rel="users/student/view.html?id=<?php echo $reward->id; ?>" target="navTab"><?php echo $reward->student_name; ?></a>
						</td>
                        <td>
                            <a href="branches/reward/view.html?id=<?php echo $reward->reward_id; ?>" target="dialog" width="800" height="600" mask="true"><?php echo $reward->title; ?></a>
                        </td>
                        <td><?php echo $reward->time; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="panelBar" >
        <div class="pages">
            <span>显示</span>
            <select name="numPerPage" onchange="navTabPageBreak({numPerPage:this.value},'reward_penalty_box')">
                <?php
                foreach (array(20,50,100,200) as $per)
                    echo sprintf('<option value="%s"%s>%s</option>', $per, $per==$pagination->per?' selected="selected"':'', $per);
                ?>
            </select>
            <span>条，共<?php echo $pagination->total; ?>条</span>
        </div>

        <div class="pagination" rel="reward_penalty_box" totalCount="<?php echo $pagination->total; ?>" numPerPage="<?php echo $pagination->per; ?>" pageNumShown="10" currentPage="<?php echo $pagination->cur; ?>"></div>

    </div>

</div>
