<form id="pagerForm" method="post" action="classes/classes.html">
    <input type="hidden" name="pageNum" value="<?php echo $pagination->cur; ?>" />
    <input type="hidden" name="numPerPage" value="<?php echo $pagination->per; ?>" />
</form>

<div class="pageContent">
    <div class="panelBar">
        <ul class="toolBar">
            <li><a class="add" href="classes/classes/add.html" rel="add_class" target="dialog" mask="true"><span>添加</span></a></li>
            <li><a class="delete" href="classes/classes/del.html?id={class}" target="ajaxTodo" title="确定要删除吗？" warn="请选择一个班级"><span>删除</span></a></li>
            <li><a class="edit" href="classes/classes/edit.html?id={class}" target="dialog"  mask="true" rel="edit_class" warn="请选择一个班级"><span>修改</span></a></li>
            <li class="line">line</li>
            <li><a class="icon" href="classes/classes.html" target="ajax" rel="class_list"><span>刷新</span></a></li>
        </ul>
    </div>

    <div id="w_list_print">
        <table class="list" width="100%" targetType="navTab" layoutH="52">
            <thead>
                <tr>
                    <th width="100">班级</th>
                    <th width="60">入学年份</th>
                    <th>德育导师</th>
                    <th>专业导师</th>
                    <th>支部指导老师</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($classes as $class): ?>
                    <tr target="class" rel="<?php echo $class->id; ?>">
                        <td><a class="add" href="classes.html?class_id=<?php echo $class->id; ?>" target="navTab" rel="class"><?php echo $class->name; ?></a></td>
                        <td><?php echo $class->start_year; ?></td>
                        <td><?php echo $class->class_adviser_name; ?></td>
                        <td><?php echo $class->major_adviser_name; ?></td>
                        <td><?php echo $class->branch_instructor_name; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="panelBar" >
        <div class="pages">
            <span>显示</span>
            <select name="numPerPage" onchange="navTabPageBreak({numPerPage:this.value})">
                <option value="20">20</option>
                <option value="50">50</option>
                <option value="100">100</option>
                <option value="200">200</option>
            </select>
            <span>条，共<?php echo $pagination->total; ?>条</span>
        </div>

        <div class="pagination" targetType="navTab" totalCount="<?php echo $pagination->total; ?>" numPerPage="<?php echo $pagination->per; ?>" pageNumShown="10" currentPage="<?php echo $pagination->cur; ?>"></div>

    </div>

</div>
