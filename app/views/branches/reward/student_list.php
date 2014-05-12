<form id="pagerForm" method="post" action="branches/reward/student_list.html?student_id=<?php echo $student_id; ?>">
    <input type="hidden" name="pageNum" value="<?php echo $pagination->cur; ?>" />
    <input type="hidden" name="numPerPage" value="<?php echo $pagination->per; ?>" />
</form>

<div class="pageContent">

    <div class="panelBar">
        <ul class="toolBar">
            <li><a class="icon" href="branches/reward/student_list.html?student_id=<?php echo $student_id; ?>" target="ajax" rel="branch_reward"><span>刷新</span></a></li>
        </ul>
    </div>
    <div id="w_list_print">
        <table class="list" width="100%" targetType="navTab" layoutH="104"><!-- layoutH="52" -->
            <thead>
                <tr>
                    <th width="40">ID</th>
                    <th>主题</th>
                    <th>时间</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rewards as $reward): ?>
                    <tr target="reward" rel="<?php echo $reward->reward_id; ?>">
                        <td><?php echo $reward->reward_id; ?></td>
                        <td>
                            <a href="branches/reward/view.html?id=<?php echo $reward->reward_id; ?>" target="dialog" rel="reward_view" width="645" height="400" mask="true"><?php echo $reward->title; ?></a>
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
            <select name="numPerPage" onchange="navTabPageBreak({numPerPage:this.value},'branch_reward')">
                <?php
                foreach (array(20,50,100,200) as $per)
                    echo sprintf('<option value="%s"%s>%s</option>', $per, $per==$pagination->per?' selected="selected"':'', $per);
                ?>
            </select>
            <span>条，共<?php echo $pagination->total; ?>条</span>
        </div>

        <div class="pagination"  targetType="dialog" rel="branch_reward" totalCount="<?php echo $pagination->total; ?>" numPerPage="<?php echo $pagination->per; ?>" pageNumShown="10" currentPage="<?php echo $pagination->cur; ?>"></div>

    </div>

</div>
