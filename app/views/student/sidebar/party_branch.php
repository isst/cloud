<div class="accordion" fillSpace="sideBar">
	<div class="accordionHeader">
		<h2><span>Folder</span>支部管理</h2>
	</div>
	<div class="accordionContent">
		<ul class="tree treeFolder">
			<!--if(非党员):-->
			<li><a href="branches/application/apply.html" target="navTab" height="500"  mask="true" rel="application_apply">入党申请</a></li>
			<!--else:-->
			<?php if($member):?>
			<li><a href="branches/my_branch.html" target="navTab" rel="my_branch" class="default">我的支部</a></li>
			<!--支部宣传委员和支部书记提交-->
			<!--<li><a href="branches/live.html" target="navTab">支部生活</a></li>-->
			<!--支部书记提交-->
			<!--<li><a href="branches/activity.html" target="navTab" rel="branch">主题活动</a></li>-->
			<?php endif;?>
			<!--endif;-->

		</ul>
	</div>
</div>