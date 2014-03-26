<div class="pageContent">
    <div class="pageFormContent" layoutH="20">

		<div class="tabs">
			<div class="tabsHeader">
				<div class="tabsHeaderContent">
					<ul>
						<li><a href="javascript:;"><span>基本信息</span></a></li>
						<li><a href="javascript:;"><span>活动经费使用明细</span></a></li>
						<li><a href="javascript:;"><span>活动总结</span></a></li>
						<li><a href="javascript:;"><span>活动具体开展情况</span></a></li>
						<li><a href="javascript:;"><span>活动照片</span></a></li>
						<li><a href="javascript:;"><span>活动视频</span></a></li>
					</ul>
				</div>
			</div>
			<div class="tabsContent">
				<!--基本信息-->
				<div layoutH="72" style="display:block; overflow:auto; border:solid 1px #CCC; line-height:21px; background:#fff; margin: 0 auto; padding: 10px;">
					<h2 class="contentTitle">基本信息</h2>
					<p>
						<label>状态：</label><?php echo $activity_status_names[$activity->status]; ?>
					</p>
					<p>
						<label>活动主题：</label><?php echo $activity->title; ?>
					</p>
					<p>
						<label>活动类型：</label><?php echo $activity_type_names[$activity->type]; ?>
					</p>
					<p>
						<label>活动时间：</label><?php echo $activity->date; ?>
					</p>
					<p>
						<label>活动地点：</label><?php echo $activity->place; ?>
					</p>
					<p>
						<label>应到人数：</label><?php echo $activity->people_plan; ?>
					</p>
					<p>
						<label>实到人数：</label><?php echo $activity->people_actual; ?>
					</p>
					<p>
						<label>活动预算：</label><?php echo $activity->activity_budget; ?>
					</p>
					<p>
						<label>审批金额：</label><?php echo $activity->approval_amount; ?>
					</p>
				</div>

				<!--活动经费使用明细-->
				<div layoutH="72" style="display:block; overflow:auto; border:solid 1px #CCC; line-height:21px; background:#fff; margin: 0 auto; padding: 10px;">
					<h2 class="contentTitle">活动经费使用明细</h2>
					<p>
						<label>活动经费使用明细：</label>
						<textarea class="editor" tools="About,Fullscreen" name="money_usage" rows="12" style="width: 645px;height: 386px;"><?php echo $activity->money_usage; ?></textarea>
					</p>
				</div>

				<!--活动总结-->
				<div layoutH="72" style="display:block; overflow:auto; border:solid 1px #CCC; line-height:21px; background:#fff; margin: 0 auto; padding: 10px;">
					<h2 class="contentTitle">活动总结</h2>
					<p>
						<label>活动总结：</label>
						<textarea class="editor" tools="About,Fullscreen" name="summary" rows="12" style="width: 645px;height: 386px;"><?php echo $activity->summary; ?></textarea>
					</p>
				</div>

				<!--活动具体开展情况-->
				<div layoutH="72" style="display:block; overflow:auto; border:solid 1px #CCC; line-height:21px; background:#fff; margin: 0 auto; padding: 10px;">
					<h2 class="contentTitle">活动具体开展情况</h2>
					<p>
						<label>活动具体开展情况：</label>
						<textarea class="editor" tools="About,Fullscreen" name="detail" rows="12" style="width: 645px;height: 386px;"><?php echo $activity->detail; ?></textarea>
					</p>
				</div>

				<!--活动照片-->
				<div layoutH="72" style="display:block; overflow:auto; border:solid 1px #CCC; line-height:21px; background:#fff; margin: 0 auto; padding: 10px;">
					活动照片
				</div>

				<!--活动视频-->
				<div layoutH="72" style="display:block; overflow:auto; border:solid 1px #CCC; line-height:21px; background:#fff; margin: 0 auto; padding: 10px;">
					活动视频
				</div>

			</div>
			<div class="tabsFooter">
				<div class="tabsFooterContent"></div>
			</div>
		</div>
	</div>
</div>
