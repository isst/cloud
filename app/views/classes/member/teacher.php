
<div class="accordionHeader">
	<h2><span>Folder</span>学生事务</h2>
</div>
<div class="accordionContent">
	<ul class="tree treeFolder">
		<?php if ($user->is_class_adviser): ?>
			<!-- 德育导师菜单 -->
			<li><a href="javascript:;">德育工作</a>
				<ul>
					<li><a href="classes/classes/grid.html?type=moral_edu" target="navTab" rel="classes_grid" class="default">班级网格</a></li>
					<!--<li><a href="classes/home/teacher_home.html" target="navTab" rel="teacher_class_home" class="default">我的班级</a></li>-->
					<li><a href="classes/memcon.html?talker_type=teacher&amp;type=moral_edu" rel="memcon_list" target="navTab">谈话记录</a></li>
				</ul>
			</li>
		<?php endif; ?>

		<?php if ($user->is_major_adviser): ?>
			<!-- 专业导师菜单 -->
			<li><a href="javascript:;">专业工作</a>
				<ul>
					<li><a href="classes/classes/grid.html?type=major_edu" target="navTab" rel="classes_grid" class="default">班级网格</a></li>
					<li><a href="classes/memcon.html?talker_type=teacher&amp;type=major_edu" rel="memcon_list" target="navTab">谈话记录</a></li>
				</ul>
			</li>
		<?php endif; ?>

		<?php if ($user->is_supervisor): ?>
			<!-- 论文导师菜单 -->
			<li><a href="javascript:;">论文工作</a>
				<ul>
					<li><a href="classes/member/supervisor_student_list.html" rel="supervisor_student_list" target="navTab">我的学生</a></li>
					<li><a href="classes/memcon.html?talker_type=teacher&amp;type=thesis_edu" rel="memcon_list" target="navTab">谈话记录</a></li>
				</ul>
			</li>
		<?php endif; ?>

		<?php if ($user->is_class_adviser): ?>
			<!-- 德育导师菜单 -->
			<li><a href="javascript:;">三助岗位</a>
				<ul>
					<li><a href="classes/aid_request.html" rel="aid_request" target="navTab">申请管理</a></li>
				</ul>
			</li>
			<li><a href="javascript:;">困难补助</a>
				<ul>
					<li><a href="classes/hardship_request.html" rel="hardship_request" target="navTab">申请管理</a></li>
				</ul>
			</li>
			<li><a href="javascript:;">奖学金</a>
				<ul>
					<li><a href="classes/scholarship_quota.html" rel="scholarship_quota" target="navTab">查看名额</a></li>
					<li><a href="classes/scholarship_request.html" rel="scholarship_request" target="navTab">申请管理</a></li>
				</ul>
			</li>
		<?php endif; ?>



		<!--
		<li><a href="classes/file_transfer.html" target="navTab">调档管理</a></li>
		<li><a href="classes/politics_audit.html" target="navTab">政审管理</a></li>
		<li><a href="classes/score.html" target="navTab">学生成绩</a></li>
		-->
	</ul>
</div>

<?php if ($user->is_branch_instructor): ?>
	<!-- 支部指导老师菜单 -->
	<div class="accordionHeader">
		<h2><span>Folder</span>党务管理</h2>
	</div>
	<div class="accordionContent">
		<ul class="tree treeFolder">
			<li><a href="branches/home/teacher_home.html" target="navTab" rel="teacher_branch_home" class="default">我的支部</a></li>
		</ul>
	</div>
<?php endif; ?>
