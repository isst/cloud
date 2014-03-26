
<div class="accordionHeader">
	<h2><span>Folder</span>学生事务</h2>
</div>
<div class="accordionContent">
	<ul class="tree treeFolder">

		<!-- 学生菜单 -->
		<li><a href="javascript:;">个人信息</a>
			<ul>
				<li><a href="users/student/view.html?id=<?php echo $user->id; ?>" rel="users/student/view.html?id=<?php echo $user->id; ?>" target="navTab">我的资料</a></li>
				<li><a href="users/student/edit.html?id=<?php echo $user->id; ?>" rel="users/student/edit.html?id=<?php echo $user->id; ?>" target="dialog" width="800" height="600" rel="student_edit" mask="true">修改资料</a></li>
			</ul>
		</li>
		<li><a href="javascript:;">班级管理</a>
			<ul>
				<li><a href="classes/home/student_home.html" target="navTab" rel="student_class_home" class="default">我的班级</a></li>
				<?php if ($user->is_class_monitor): ?>
					<li><a href="classes/memcon.html?talker_type=student&amp;type=class_monitor" rel="memcon_list" target="navTab">班长谈话</a></li>
				<?php endif; ?>
				<?php if ($user->is_branch_secretary): ?>
					<li><a href="classes/memcon.html?talker_type=student&amp;type=branch_secretary" rel="memcon_list" target="navTab">支书谈话</a></li>
				<?php endif; ?>
				<li><a href="classes/memcon.html?talker_type=teacher" target="navTab" rel="memcon_list" class="default">教师谈话记录</a></li>
				<li><a href="classes/memcon.html?talker_type=student" target="navTab" rel="memcon_list" class="default">班委谈话记录</a></li>
			</ul>
		</li>
		<li><a href="javascript:;">三助岗位</a>
			<ul>
				<li><a href="classes/aid_item.html" rel="aid_item" target="navTab">三助岗位</a></li>
				<li><a href="classes/aid_request.html" rel="aid_request" target="navTab">我的申请</a></li>
				<li><a href="classes/aid_report.html" rel="aid_report" target="navTab">三助考核</a></li>
			</ul>
		</li>
		<li><a href="javascript:;">困难补助</a>
			<ul>
				<li><a href="classes/hardship_item.html" rel="hardship_item" target="navTab">补助项目</a></li>
				<li><a href="classes/hardship_request.html" rel="hardship_request" target="navTab">我的申请</a></li>
			</ul>
		</li>
		<li><a href="javascript:;">奖学金</a>
			<ul>
				<li><a href="classes/scholarship_item.html" rel="scholarship_item" target="navTab">奖学金项目</a></li>
				<li><a href="classes/scholarship_request.html" rel="scholarship_request" target="navTab">我的申请</a></li>
			</ul>
		</li>
		<li><a href="javascript:;">实习就业</a>
			<ul>
				<li><a href="classes/internship.html" rel="internship" target="navTab">实习信息</a></li>
				<li><a href="classes/career.html" rel="career" target="navTab" target="dialog" width="800" height="600" mask="true">就业信息</a></li>
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
				<li><a href="grids/grid/my.html" rel="my_grid" target="navTab">我的网格</a></li>
				<li><a href="classes/memcon.html?talker_type=student&amp;type=grid" rel="memcon_list" target="navTab">组长谈话</a></li>
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
				<?php if ($user->politics_status): ?>
					<li><a href="branches/home/student_home.html" target="navTab" rel="student_branch_home" class="default">我的支部</a></li>
					<!--支部宣传委员和支部书记提交-->
					<?php if (0 && in_array($user->branch_title, array(1, 2))): ?>
						<li><a href="branches/live.html" target="navTab">支部生活</a></li>
					<?php endif; ?>
					<!--支部书记提交-->
					<?php if (0 && in_array($user->branch_title, array(1))): ?>
						<li><a href="branches/activity.html" target="navTab" rel="branch">主题活动</a></li>
					<?php endif; ?>
				<?php endif; ?>

			</ul>
		</li>
		<?php if (0): ?>
			<li><a href="javascript:;">同城党支部</a>
				<ul>
					<li><a href="javascript:;" rel="city_branch_activity" target="navTab">同城活动</a></li>
					<li><a href="classes/memcon.html?talker_type=city_branch&amp;type=grid" rel="memcon_list" target="navTab">同城谈话</a></li>
				</ul>
			</li>
		<?php endif; ?>
	</ul>
</div>