<form id="pagerForm" method="post" action="branches/member/student_list.html?class_id=<?php echo $branch->id; ?>">
    <input type="hidden" name="pageNum" value="<?php echo $pagination->cur; ?>" />
    <input type="hidden" name="numPerPage" value="<?php echo $pagination->per; ?>" />
</form>

<div class="pageContent">
    <div class="panelBar">
        <ul class="toolBar">
            <li><a class="icon" href="branches/member/student_list.html?class_id=<?php echo $branch->id; ?>" target="ajax" rel="branch_member"><span>刷新</span></a></li>
        </ul>
    </div>

    <div id="w_list_print">
        <table class="list" width="100%" targetType="navTab" layoutH="104"><!-- layoutH="52" -->
            <thead>
                <tr>
                    <th width="80">姓名</th>
                    <th width="40">性别</th>
                    <th width="60">政治面貌</th>
                    <th width="60">支部状态</th>
                    <th width="100">支部头衔</th>
                    <th>党费已交付至</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($members as $the): ?>
                    <tr target="member" rel="<?php echo $the->id; ?>">
                        <td><a href="users/student/view.html?id=<?php echo $the->id; ?>" rel="users/student/view.html?id=<?php echo $the->id; ?>" target="navTab"><?php echo $the->name; ?></a></td>
                        <td><?php echo $the->sexual; ?></td>
                        <td><?php echo $politics_status_names[$the->politics_status]; ?></td>
                        <td><?php echo $branch_status_names[$the->branch_status]; ?></td>
                        <td><?php echo $branch_title_names[$the->branch_title]; ?></td>
                        <td><?php echo $the->party_dues_paid; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="panelBar" >
        <div class="pages">
            <span>显示</span>
            <select name="numPerPage" onchange="navTabPageBreak({numPerPage:this.value},'branch_member')">
                <?php
                foreach (array(20,50,100,200) as $per)
                    echo sprintf('<option value="%s"%s>%s</option>', $per, $per==$pagination->per?' selected="selected"':'', $per);
                ?>
            </select>
            <span>条，共<?php echo $pagination->total; ?>条</span>
        </div>

        <div class="pagination" rel="branch_member" totalCount="<?php echo $pagination->total; ?>" numPerPage="<?php echo $pagination->per; ?>" pageNumShown="10" currentPage="<?php echo $pagination->cur; ?>"></div>

    </div>

</div>
