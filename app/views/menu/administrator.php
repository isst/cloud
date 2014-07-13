
<div class="accordionHeader">
	<h2><span>Folder</span>学生事务</h2>
</div>
<div class="accordionContent">
	<ul class="tree treeFolder">
		<!-- 管理员菜单 -->
		<li><a href="javascript:;">班级管理</a>
			<ul>
				<li><a href="classes/major_field.html" target="navTab" rel="major_field" class="default">专业方向</a></li>
				<li><a href="classes/classes/grid.html" target="navTab" rel="classes_grid" class="default">班级网格</a></li>
				<li><a href="classes/classes.html" target="navTab" rel="class_list">班级管理</a></li>
				<li><a href="classes/classes/add.html" target="dialog" rel="add_class" mask="true">创建班级</a></li>
			</ul>
		</li>
		<li><a href="javascript:;">三助岗位</a>
			<ul>
				<li><a href="classes/aid_item.html" rel="aid_item" target="navTab">岗位管理</a></li>
				<li><a href="classes/aid_request.html" rel="aid_request" target="navTab">申请管理</a></li>
				<li><a href="classes/aid_report.html" rel="aid_report" target="navTab">三助考核</a></li>
			</ul>
		</li>
		<li><a href="javascript:;">困难补助</a>
			<ul>
				<li><a href="classes/hardship_item.html" rel="hardship_item" target="navTab">项目管理</a></li>
				<li><a href="classes/hardship_request.html" rel="hardship_request" target="navTab">申请管理</a></li>
			</ul>
		</li>
		<li><a href="javascript:;">奖学金</a>
			<ul>
				<li><a href="classes/scholarship_item.html" rel="scholarship_item" target="navTab">奖项管理</a></li>
				<li><a href="classes/scholarship_quota.html" rel="scholarship_quota" target="navTab">名额管理</a></li>
				<li><a href="classes/scholarship_request.html" rel="scholarship_request" target="navTab">申请管理</a></li>
			</ul>
		</li>
		<li><a href="javascript:;">谈话记录</a>
			<ul>
                <li><a href="classes/memcon.html?talker_type=administrator&type=administrator" rel="memcon_list" target="navTab">管理员谈话</a></li>
				<li><a href="classes/memcon.html?talker_type=teacher" rel="memcon_list" target="navTab">教师谈话记录</a></li>
				<li><a href="classes/memcon.html?talker_type=student" rel="memcon_list" target="navTab">班委谈话记录</a></li>
			</ul>
		</li>
        <li><a href="javascript:;">实习就业</a>
            <ul>
                <li><a href="classes/internship/list_all.html" rel="internship_list_all" target="navTab">实习信息</a></li>
            </ul>
        </li>

		<!--
		<li><a href="classes/file_transfer.html" target="navTab">调档管理</a></li>
		<li><a href="classes/politics_audit.html" target="navTab">政审管理</a></li>
		<li><a href="classes/score.html" target="navTab">学生成绩</a></li>
		-->
	</ul>
</div>
<!--
<div class="accordionHeader">
	<h2><span>Folder</span>网格小组</h2>
</div>
<div class="accordionContent">
	<ul class="tree treeFolder">
		<li><a href="javascript:;">网格小组</a>
			<ul>
				<li><a href="grids/grid.html" rel="grid_list" target="navTab">网格列表</a></li>
				<li><a href="grids/grid/add.html" target="dialog" rel="grid" mask="true">创建网格</a></li>
			</ul>
		</li>
	</ul>
</div>-->

<div class="accordionHeader">
	<h2><span>Folder</span>党务管理</h2>
</div>
<div class="accordionContent">
	<ul class="tree treeFolder">
		<li><a href="javascript:;">班级党支部</a>
			<ul>
				<li><a href="branches/branch/grid.html" target="navTab" rel="branch_grid" class="default">支部网格</a></li>
				<li><a href="branches/branch.html" target="navTab" rel="branch_admin">支部管理</a></li>
			</ul>
		</li>
		<!--
				<li><a href="javascript:;">同城党支部</a>
					<ul>
						<li><a href="city_branches/branch.html" rel="city_branch_list" target="navTab">同城支部管理</a></li>
						<li><a href="city_branches/group.html" rel="city_branch_group_list" target="navTab">党小组管理</a></li>
					</ul>
				</li>-->

	</ul>
</div>


<?php if (0): ?>
	<div class="accordionHeader">
		<h2><span>Folder</span>应用管理</h2>
	</div>
	<div class="accordionContent">
		<ul class="tree treeFolder">
			<li><a href="app/tuition.html" target="navTab">学费管理</a></li>
			<li><a href="app/data_bank.html" target="navTab">资料库</a></li>
		</ul>
	</div>
<?php endif; ?>

<div class="accordionHeader">
	<h2><span>Folder</span>系统管理</h2>
</div>
<div class="accordionContent">
	<ul class="tree treeFolder">
		<li>
			<a href="javascript:;">用户管理</a>
			<ul>
				<li><a href="users/administrator.html" target="navTab" rel="users_administrator">管理员</a></li>
				<li><a href="users/student.html" target="navTab" rel="users_student">学生</a></li>
				<li><a href="users/teacher.html" target="navTab" rel="users_teacher">教师</a></li>
				<li><a href="users/unit.html" target="navTab" rel="users_unit">用人单位</a></li>
				<li><a href="users/enterprise.html" target="navTab" rel="users_enterprise">企业导师</a></li>
			</ul>
		</li>
		<li>
			<a href="javascript:;">学生导入设置</a>
			<ul>
				<li><a href="options/users/student_import.html?type=single" target="dialog" width="800" height="600" rel="options_student_import">单证导入设置</a></li>
				<li><a href="options/users/student_import.html?type=dual" target="dialog" width="800" height="600" rel="options_student_import">双证导入设置</a></li>
			</ul>
		</li>
	</ul>
</div>