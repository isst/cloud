<form id="pagerForm" method="post" action="classes/memcon/student_list.html?student_id=<?php echo $student_id; ?>">
    <input type="hidden" name="pageNum" value="<?php echo $pagination->cur; ?>" />
    <input type="hidden" name="numPerPage" value="<?php echo $pagination->per; ?>" />
</form>

<div class="pageContent">

    <div class="panelBar">
        <ul class="toolBar">
            <li><a class="icon" href="classes/memcon/student_list.html?student_id=<?php echo $student_id; ?>" target="ajax" rel="class_memcon"><span>刷新</span></a></li>
        </ul>
    </div>
    <div id="w_list_print">
        <table class="list" width="100%" targetType="navTab" layoutH="104"><!-- layoutH="52" -->
            <thead>
                <tr>
                    <th width="40">ID</th>
                    <th>主题</th>
                    <th>谈话时间</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($memcons as $memcon): ?>
                    <tr target="memcon" rel="<?php echo $memcon->memcon_id; ?>">
                        <td><?php echo $memcon->memcon_id; ?></td>
                        <td>
                            <a href="classes/memcon/view.html?id=<?php echo $memcon->memcon_id; ?>" target="dialog" rel="memcon_view" width="645" height="400" mask="true"><?php echo $memcon->title; ?></a>
                        </td>
                        <td><?php echo $memcon->time; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>


    <div class="panelBar" >
        <div class="pages">
            <span>显示</span>
            <select name="numPerPage" onchange="navTabPageBreak({numPerPage:this.value},'class_memcon')">
                <option value="20">20</option>
                <option value="50">50</option>
                <option value="100">100</option>
                <option value="200">200</option>
            </select>
            <span>条，共<?php echo $pagination->total; ?>条</span>
        </div>

        <div class="pagination"  targetType="dialog" rel="class_memcon" totalCount="<?php echo $pagination->total; ?>" numPerPage="<?php echo $pagination->per; ?>" pageNumShown="10" currentPage="<?php echo $pagination->cur; ?>"></div>

    </div>

</div>
