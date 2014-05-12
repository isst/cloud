<form id="pagerForm" method="post" action="<?php echo empty($class) ? 'classes/internship/list_all.html' : ('classes/member/internship_list.html?class_id=' . $class->id)?>">
    <?php if (empty($class)) {?>
    <input type="hidden" name="pageNum" value="<?php echo $pagination->cur; ?>" />
    <input type="hidden" name="numPerPage" value="<?php echo $pagination->per; ?>" />
    <?php }?>
</form>

<?php if (empty($class)):?>
<div class="pageHeader">
    <form rel="pagerForm" method="post" action="classes/internship/list_all.html" onsubmit="return '1' === $(this).find('input[name=export]').val() ? true : navTabSearch(this);">
        <div class="searchBar">
            专业方向:
            <select name="major">
                <option value="">请选择</option>
                <?php foreach ($major_fields as $field): ?>
                    <option value="<?php echo $field->name; ?><?php if ($field->name == @$major): ?>" selected="selected<?php endif; ?>"><?php echo $field->name; ?></option>
                <?php endforeach; ?>
            </select>

            民族: <input type="text" name="nation" value="<?php echo @$nation; ?>" style="width: 20px;" />

            姓名: <input type="text" name="name" value="<?php echo @$name; ?>" style="width: 40px;" />

            学号: <input type="text" name="student_num" value="<?php echo @$student_num; ?>" style="width: 80px;" />

            籍贯: <input type="text" name="birthplace" value="<?php echo @$birthplace; ?>" style="width: 80px;" />

            家庭地址: <input type="text" name="home_addr" value="<?php echo @$home_addr; ?>" style="width: 80px;" />

            年级: <input type="text" name="grade" value="<?php echo @$grade; ?>" style="width: 40px;" />

            学制: <input type="text" name="edu_system" value="<?php echo @$edu_system; ?>" style="width: 40px;" />

            在校类型: <input type="text" name="at_school_type" value="<?php echo @$at_school_type; ?>" style="width: 40px;" />
            <br />
            城市：
            <select name="city_id">
                <option value="-1">请选择</option>
                <?php foreach ($cities as $cityId => $cityName): ?>
                    <option value="<?php echo $cityId; ?>"<?php if (isset($city_id) && $city_id == $cityId): ?> selected="selected"<?php endif; ?>><?php echo $cityName; ?></option>
                <?php endforeach; ?>
                <option value="0"<?php if (isset($city_id) && $city_id == 0): ?> selected="selected"<?php endif; ?>>其他</option>
            </select>
            公司: <input type="text" name="company" value="<?php echo @$company; ?>" size="8" />
            住宿地址: <input type="text" name="lodging" value="<?php echo @$lodging; ?>" size="8" />

            政治面貌:
            <select name="politics_status">
                <option value="">请选择</option>
                <?php foreach ($politics_status_names as $key => $name): ?>
                    <option value="<?php echo $key; ?><?php if (isset($politics_status) && $key == $politics_status): ?>" selected="selected<?php endif; ?>"><?php echo $name; ?></option>
                <?php endforeach; ?>
            </select>
            班长<input type="checkbox" name="class_title" value="1<?php if (@$class_title): ?>" checked="checked<?php endif; ?>" />
            支书<input type="checkbox" name="branch_title" value="1<?php if (@$branch_title): ?>" checked="checked<?php endif; ?>" />
            班委<input type="checkbox" name="branch_title2" value="3<?php if (@$branch_title2): ?>" checked="checked<?php endif; ?>" />
            心理困难<input type="checkbox" name="is_psychology_hard" value="1<?php if (@$is_psychology_hard): ?>" checked="checked<?php endif; ?>" />
            经济困难<input type="checkbox" name="is_financial_hard" value="1<?php if (@$is_financial_hard): ?>" checked="checked<?php endif; ?>" />
            学业困难<input type="checkbox" name="is_study_hard" value="1<?php if (@$is_study_hard): ?>" checked="checked<?php endif; ?>" />
            <select name="ziduan">
                <option value="">排序</option>
                <option value="name<?php if($zj == 'name'):?>" selected="selected<?php endif;?>" >姓名</option>
                <option value="username<?php if($zj == 'username'):?>" selected="selected<?php endif;?>">学号</option>
                <option value="class_id<?php if($zj == 'class_id'):?>" selected="selected<?php endif;?>">班级</option>
                <option value="sexual<?php if($zj == 'sexual'):?>" selected="selected<?php endif;?>">性别</option>
            </select>
            <button type="submit">查询</button>
        </div>
    </form>
</div>
<?php endif;?>

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
        <table class="list" width="100%" targetType="navTab" layoutH="117">
            <thead>
            <tr>
                <th width="60">姓名</th>
                <th width="70">学号</th>
                <th>实习公司名称</th>
                <th>城市</th>
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
                <tr target="internship" rel="<?php echo $internship->stu_id; ?>">
                    <td><a href="users/student/view.html?id=<?php echo $internship->stu_id; ?>" rel="users/student/view.html?id=<?php echo $internship->stu_id; ?>" target="navTab"><?php echo $internship->name; ?></a></td>
                    <td><?php echo $internship->student_num; ?></td>
                    <td><?php echo $internship->company; ?></td>
                    <td><?php echo $internship->city_name ? $internship->city_name : '其他'; ?></td>
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
    <?php if (!empty($class)) {?>
        <div class="pages"><span>共<?php echo $pagination->total; ?>条</span></div>
    <?php } else {?>
        <div class="pages">
            <span>显示</span>
            <select name="numPerPage" onchange="navTabPageBreak({numPerPage: this.value})">
                <?php
                foreach (array(20,50,100,200) as $per)
                    echo sprintf('<option value="%s"%s>%s</option>', $per, $per==$pagination->per?' selected="selected"':'', $per);
                ?>
            </select>
            <span>条，共<?php echo $pagination->total; ?>条</span>
        </div>
        <div class="pagination" targetType="navTab" totalCount="<?php echo $pagination->total; ?>" numPerPage="<?php echo $pagination->per; ?>" pageNumShown="10" currentPage="<?php echo $pagination->cur; ?>"></div>
    <?php }?>
    </div>
</div>
