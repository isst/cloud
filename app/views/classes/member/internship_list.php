<form id="pagerForm" method="post" action="classes/internship.html">
    <input type="hidden" name="pageNum" value="<?php echo $pagination->cur; ?>" />
    <input type="hidden" name="numPerPage" value="<?php echo $pagination->per; ?>" />
</form>

<div class="pageContent">
    <div class="panelBar">
        <ul class="toolBar">
            <li class="line">line</li>
            <?php if (isset($class) && $class->id) {?>
            <li><a class="icon" href="classes/member/internship_list.html?class_id=<?php echo $class->id; ?>" target="ajax" rel="class_internship"><span>刷新</span></a></li>
            <?php } else { ?>
            <li><a class="icon" href="classes/internship/list_all.html" rel="internship_list_all" target="ajax"><span>刷新</span></a></li>
            <?php }?>
        </ul>
    </div>

    <div id="w_list_print">
        <table class="list" width="100%" targetType="navTab" layoutH="52">
            <thead>
            <tr>
                <th width="30">ID</th>
                <th width="70">学号</th>
                <th width="60">姓名</th>
                <th>实习公司名称</th>
                <th>住宿地址</th>
                <th>本人联系方式</th>
                <th>公司负责人</th>
                <th>负责人联系方式</th>
                <th>公司地址</th>
                <th>实习起止时间</th>
                <th>实习内容</th>
                <th>提交时间</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($internships as $internship): ?>
                <tr target="internship" rel="<?php echo $internship->id; ?>">
                    <td><?php echo $internship->id; ?></td>
                    <td><?php echo $internship->student_num; ?></td>
                    <td><?php echo $internship->name; ?></td>
                    <td><?php echo $internship->company; ?></td>
                    <td><?php echo $internship->lodging; ?></td>
                    <td><?php echo $internship->contact; ?></td>
                    <td><?php echo $internship->principal; ?></td>
                    <td><?php echo $internship->principal_contact; ?></td>
                    <td><?php echo $internship->company_addr; ?></td>
                    <td><?php echo $internship->internship_time; ?></td>
                    <td><?php echo $internship->internship_content; ?></td>
                    <td><?php echo $internship->updated; ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="panelBar" >
        <div class="pages">
            <span>显示</span>
            <select name="numPerPage" onchange="navTabPageBreak({numPerPage: this.value})">
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
