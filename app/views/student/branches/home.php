<style type="text/css">
	ul.rightTools {float:right; display:block;}
	ul.rightTools li{float:left; display:block; margin-left:5px}
</style>

<div class="pageContent" style="padding:5px">
	<div class="tabs">
		<div class="tabsHeader">
			<div class="tabsHeaderContent">
				<ul>
					<li><span>基本信息</span></a></li>
					<li><a href="branches/member.html?class_id=<?php echo $branch->id;?>" class="j-ajax"><span>支部成员</span></a></li>
					<li><a href="branches/live.html?class_id=<?php echo $branch->id;?>" class="j-ajax"><span>支部生活</span></a></li>
					<li><a href="branches/activity.html?class_id=<?php echo $branch->id;?>" class="j-ajax"><span>主题活动</span></a></li>
					<li><a href="branches/announcement.html?class_id=<?php echo $branch->id;?>" class="j-ajax"><span>信息公告</span></a></li>
					<li><a href="branches/reward_penalty.html?class_id=<?php echo $branch->id;?>" class="j-ajax"><span>支部奖惩</span></a></li>
					<li><a href="branches/excellent_full.html?class_id=<?php echo $branch->id;?>" class="j-ajax"><span>推优与转正</span></a></li>
				</ul>
			</div>
		</div>
		<div class="tabsContent">
			<div id="branch_general">
				<div class="pageContent">
					<div>
						<div layoutH="72" style="display:block; overflow:auto; border:solid 1px #CCC; line-height:21px; background:#fff; margin: 0 auto; padding: 10px;">
							<h2 class="contentTitle"><?php echo $branch->name; ?></h2>
							<div style="margin:15px;">指导老师：<?php echo $branch->teacher_name; ?></div>
							<div style="margin:15px;">支部书记：<?php echo $branch_secretary ? $branch_secretary->name : '空缺'; ?></div>
							<div style="margin:15px;">支部宣传委员：<?php echo $branch_publicity ? $branch_publicity->name : '空缺'; ?></div>
							<div style="margin:15px;">组织委员：<?php echo $branch_organizational ? $branch_organizational->name : '空缺'; ?></div>
						</div>
					</div>
				</div>
			</div>
			<div id="branch_member">支部成员</div>

			<div id="branch_live">支部生活</div>
			<div id="branch_activity">主题活动</div>
			<div id="branch_announcement">信息公告</div>
			<div id="branch_reward_penalty">支部奖惩</div>
			<div id="branch_excellent_full">推优与转正</div>
		</div>
		<div class="tabsFooter">
			<div class="tabsFooterContent"></div>
		</div>
	</div>

</div>




