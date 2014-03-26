<form id="pagerForm" method="post" action="branches/penalty.html?class_id=<?php echo $branch->id; ?>">
    <input type="hidden" name="pageNum" value="<?php echo $pagination->cur; ?>" />
    <input type="hidden" name="numPerPage" value="<?php echo $pagination->per; ?>" />
</form>

<div class="pageContent">
    <div class="panelBar">
        <ul class="toolBar">
            <li><a class="icon" href="branches/penalty.html?class_id=<?php echo $branch->id; ?>" target="ajax" rel="penalty_penalty_box"><span>刷新</span></a></li>
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
                <?php foreach ($penalties as $penalty): ?>
                    <tr target="penalty" rel="<?php echo $penalty->penalty_id; ?>">
                        <td><?php echo $penalty->penalty_id; ?></td>
                        <td>
                            <?php echo $penalty->student_name; ?>
                        </td>
                        <td>
                            <a href="branches/penalty/view.html?id=<?php echo $penalty->penalty_id; ?>" target="dialog" width="800" height="600" mask="true"><?php echo $penalty->title; ?></a>
                        </td>
                        <td><?php echo $penalty->time; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="panelBar" >
        <div class="pages">
            <span>显示</span>
            <select name="numPerPage" onchange="navTabPageBreak({numPerPage:this.value},'penalty_penalty_box')">
                <option value="20">20</option>
                <option value="50">50</option>
                <option value="100">100</option>
                <option value="200">200</option>
            </select>
            <span>条，共<?php echo $pagination->total; ?>条</span>
        </div>

        <div class="pagination" rel="penalty_penalty_box" totalCount="<?php echo $pagination->total; ?>" numPerPage="<?php echo $pagination->per; ?>" pageNumShown="10" currentPage="<?php echo $pagination->cur; ?>"></div>

    </div>

</div>
