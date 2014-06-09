<form id="pagerForm" method="post" action="users/student.html">
	<input type="hidden" name="pageNum" value="<?php echo $pagination->cur; ?>" />
	<input type="hidden" name="numPerPage" value="<?php echo $pagination->per; ?>" />
</form>

<div class="pageHeader">
	<form rel="pagerForm" method="post" action="users/student.html" onsubmit="return '1' === $(this).find('input[name=export]').val() ? true : navTabSearch(this);">
		<div class="searchBar">
            年级: <select name="grade">
                <?php
                for ($gradeYear=intval(date('Y')); $gradeYear>=2000; $gradeYear--) {
                    echo sprintf('<option value="%d"%s>%s</option>', $gradeYear, $gradeYear==@$grade ? ' selected="selected"':'', $gradeYear);
                }
                ?>
            </select>
			专业方向:
			<select name="major">
				<option value="">请选择</option>
				<?php foreach ($major_fields as $field): ?>
					<option value="<?php echo $field->name; ?><?php if ($field->name == @$major): ?>" selected="selected<?php endif; ?>"><?php echo $field->name; ?></option>
				<?php endforeach; ?>
			</select>

			民族: <input type="text" name="nation" value="<?php echo @$nation; ?>" size="2" />

			姓名: <input type="text" name="name" value="<?php echo @$name; ?>" size="4" />

			学号: <input type="text" name="student_num" value="<?php echo @$student_num; ?>" size="8" />

			籍贯: <input type="text" name="birthplace" value="<?php echo @$birthplace; ?>" size="8" />

			家庭地址: <input type="text" name="home_addr" value="<?php echo @$home_addr; ?>" size="8" />

            学制: <input type="text" name="edu_system" value="<?php echo @$edu_system; ?>" size="8" />

            在校类型: <input type="text" name="at_school_type" value="<?php echo @$at_school_type; ?>" size="8" />

			<br/>
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
			<input type="hidden" name="export" value="0" />
			<button type="submit" onclick="$(this).siblings('input[name=export]').val('0');">查询</button>
			<button type="submit" onclick="$(this).siblings('input[name=export]').val('1');">导出查询结果</button>
		</div>
	</form>
</div>
<div class="pageContent">
	<div class="panelBar">
		<ul class="toolBar">
			<li><a class="add" href="users/student/add.html" target="dialog" width="800" height="600" rel="student_add" mask="true"><span>添加</span></a></li>
			<li><a class="delete" href="users/student/del.html?id={student}" target="ajaxTodo" title="确定要删除吗？" warn="请选择一个用户"><span>删除</span></a></li>
			<li><a class="delete" title="确实要删除这些学生吗?" target="selectedTodo" rel="ids" postType="string" href="users/student/bulk_del.html"><span>批量删除</span></a></li>
			<li><a class="edit" href="users/student/edit.html?id={student}" target="dialog" width="800" height="600" rel="student_edit" mask="true" warn="请选择一个用户"><span>修改</span></a></li>
			<li class="line">line</li>
            <li><a class="icon" href="users/student.html" target="navTab" rel="users_student"><span>刷新</span></a></li>
			<li><a class="add" href="users/student/view.html?id={student}" rel="users/student/view.html?id={student}" target="navTab" warn="请选择一个用户"><span>查看</span></a></li>
			<li class="line">line</li>
			<li><a class="edit" href="users/student/league_export.html" target="dialog" width="350" height="200" mask="true" rel="review_scholarship_request"><span>导出团员</span></a></li>
			<li class="line">line</li>
			<li><a class="edit" href="users/student/import.html?type=single" target="dialog" width="400" height="300" rel="student_import" mask="true"><span>单证学生导入</span></a></li>
			<li><a class="edit" href="users/student/import.html?type=dual" target="dialog" width="400" height="300" rel="student_import" mask="true"><span>双证学生导入</span></a></li>
			<li class="line">line</li>
		</ul>
	</div>


	<div id="w_list_print">
		<table class="list" width="100%" targetType="navTab" layoutH="117">
			<thead>
				<tr>
					<th width="22"><input type="checkbox" group="ids" class="checkboxCtrl"></th>
					<th>姓名</th>
					<th>学号</th>
					<th>班级</th>
					<th>性别</th>
					<th>民族</th>
					<th>籍贯</th>
					<th>出生年月</th>
					<th>联系电话</th>
					<th>家庭地址</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($students as $student): ?>
					<tr target="student" rel="<?php echo $student->id; ?>">
						<td><input name="ids" value="<?php echo $student->id; ?>" type="checkbox"></td>
						<td><a href="users/student/view.html?id=<?php echo $student->id; ?>" rel="users/student/view.html?id=<?php echo $student->id; ?>" target="navTab"><?php echo $student->name; ?></a></td>
						<td><?php echo $student->student_num; ?></td>
						<td><?php $student->class_id and print $class_names[$student->class_id]; ?></td>
						<td><?php echo $student->sexual; ?></td>
						<td><?php echo $student->nation; ?></td>
						<td><?php echo $student->birthplace; ?></td>
						<td><?php echo $student->birthday; ?></td>
						<td><?php echo $student->tel; ?></td>
						<td><?php echo $student->home_addr; ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<div class="panelBar" >
		<div class="pages">
			<span>显示</span>
			<select name="numPerPage" onchange="navTabPageBreak({numPerPage: this.value});">
				<option value="20<?php if (20 == $pagination->per): ?>" selected="selected<?php endif; ?>">20</option>
				<option value="50<?php if (50 == $pagination->per): ?>" selected="selected<?php endif; ?>">50</option>
				<option value="100<?php if (100 == $pagination->per): ?>" selected="selected<?php endif; ?>">100</option>
				<option value="200<?php if (200 == $pagination->per): ?>" selected="selected<?php endif; ?>">200</option>
			</select>
			<span>条，共<?php echo $pagination->total; ?>条</span>
		</div>

		<div class="pagination" targetType="navTab" totalCount="<?php echo $pagination->total; ?>" numPerPage="<?php echo $pagination->per; ?>" pageNumShown="10" currentPage="<?php echo $pagination->cur; ?>"></div>

	</div>

</div>
