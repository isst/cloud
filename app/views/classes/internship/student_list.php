<form id="pagerForm" method="post" action="classes/internship/student_list.html?student_id=<?php echo $student_id;?>">
    <input type="hidden" name="pageNum" value="<?php echo $pagination->cur; ?>" />
    <input type="hidden" name="numPerPage" value="<?php echo $pagination->per; ?>" />
</form>

<div class="pageContent">
    <?php if ($user_type != 'student') {?>
        <div class="panelBar">
            <ul class="toolBar">
            </ul>
        </div>
    <?php }?>

    <div id="w_list_print">
        <table class="list" width="100%" targetType="navTab" layoutH="104">
            <thead>
            <tr>
                <th width="30">ID</th>
                <th>实习公司名称</th>
                <th width="30">城市</th>
                <th>住宿地址</th>
                <th>公司负责人</th>
                <th>公司地址</th>
                <th>起止时间</th>
                <th><?php echo $user_type == 'student' ? '实习内容' : '实习反馈'?></th>
                <th>提交时间</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($internships as $internship): ?>
                <tr target="internshipId" rel="<?php echo $internship->id; ?>">
                    <td><?php echo $internship->id; ?></td>
                    <td><?php echo $internship->company; ?></td>
                    <td><?php echo $internship->city_name ? $internship->city_name : '其他'; ?></td>
                    <td><?php echo $internship->lodging; ?></td>
                    <td><?php echo $internship->principal; ?><br /><?php echo $internship->principal_contact; ?></td>
                    <td><?php echo $internship->company_addr; ?></td>
                    <td><?php echo $internship->internship_time; ?></td>
                    <td><?php echo $user_type == 'student' ? $internship->internship_content : $internship->feedback_content; ?></td>
                    <td><?php echo $internship->updated; ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="panelBar" >
        <div class="pages">
            <span>显示</span>
            <select name="numPerPage" onchange="navTabPageBreak({numPerPage: this.value}, 'internship_student_list')">
                <?php
                foreach (array(20,50,100,200) as $per)
                    echo sprintf('<option value="%s"%s>%s</option>', $per, $per==$pagination->per?' selected="selected"':'', $per);
                ?>
            </select>
            <span>条，共<?php echo $pagination->total; ?>条</span>
        </div>

        <div class="pagination" rel="internship_student_list" totalCount="<?php echo $pagination->total; ?>" numPerPage="<?php echo $pagination->per; ?>" pageNumShown="10" currentPage="<?php echo $pagination->cur; ?>"></div>

    </div>

</div>
