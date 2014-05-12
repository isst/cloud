<form id="pagerForm" method="post" action="branches/full_material.html?class_id=<?php echo $branch->id; ?>">
    <input type="hidden" name="pageNum" value="<?php echo $pagination->cur; ?>" />
    <input type="hidden" name="numPerPage" value="<?php echo $pagination->per; ?>" />
</form>

<div class="pageContent">
    <div class="panelBar">
        <ul class="toolBar">
            <li><a class="add" href="branches/full_material/add.html?class_id=<?php echo $branch->id; ?>" target="dialog" width="645" height="400" mask="true"><span>添加</span></a></li>
            <li><a class="delete" href="branches/full_material/del.html?id={full_material}" target="ajaxTodo" title="确定要删除吗？" warn="请选择一条记录"><span>删除</span></a></li>
            <li><a class="edit" href="branches/full_material/edit.html?id={full_material}" target="dialog" width="645" height="400"  mask="true" warn="请选择一条记录"><span>修改</span></a></li>
            <li class="line">line</li>
            <li><a class="icon" href="branches/full_material.html?class_id=<?php echo $branch->id; ?>" target="ajax" rel="excellent_full_box"><span>刷新</span></a></li>
        </ul>
    </div>

    <div id="w_list_print">
        <table class="list" width="100%" targetType="navTab" layoutH="104"><!-- layoutH="52" -->
            <thead>
                <tr>
                    <th width="60">学生姓名</th>
                    <th>思想汇报</th>
                    <th>转正申请</th>
                    <th>预备党员党校结业证复印件</th>
                    <th>入党志愿书</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($full_materials as $full_material): ?>
                    <tr target="full_material" rel="<?php echo $full_material->material_id; ?>">
                        <td>
                            <a href="users/student/view.html?id=<?php echo $full_material->student_id; ?>" rel="users/student/view.html?id=<?php echo $full_material->student_id; ?>" target="navTab"><?php echo $full_material->student_name; ?></a>
                        </td>
                        <td>
                            <?php $full_material->thinking_report and print '√'; ?>
                        </td>
                        <td>
                            <?php $full_material->application and print '√'; ?>
                        </td>
                        <td>
                            <?php $full_material->completion_certificate and print '√'; ?>
                        </td>
                        <td>
                            <?php $full_material->ideal and print '√'; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="panelBar" >
        <div class="pages">
            <span>显示</span>
            <select name="numPerPage" onchange="navTabPageBreak({numPerPage:this.value},'excellent_full_box')">
                <?php
                foreach (array(20,50,100,200) as $per) {
                    echo sprintf('<option value="%s"%s>%s</option>', $per, $per==$pagination->per?' selected="selected"':'', $per);
                }
                ?>
            </select>
            <span>条，共<?php echo $pagination->total; ?>条</span>
        </div>

        <div class="pagination" rel="excellent_full_box" totalCount="<?php echo $pagination->total; ?>" numPerPage="<?php echo $pagination->per; ?>" pageNumShown="10" currentPage="<?php echo $pagination->cur; ?>"></div>

    </div>

</div>
