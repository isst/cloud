
<div class="pageContent">
    <form method="post" action="branches/activity/edit.html?id=<?php echo $activity->id; ?>" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">
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
					<div layoutH="110" style="display:block; overflow:auto; border:solid 1px #CCC; line-height:21px; background:#fff; margin: 0 auto; padding: 10px;">
						<h2 class="contentTitle">基本信息</h2>
						<p>
							<label>活动类型：</label>
							<select name="type">
								<option value="0<?php if (0 == $activity->type): ?>" selected="selected<?php endif; ?>">娱乐型</option>
								<option value="1<?php if (1 == $activity->type): ?>" selected="selected<?php endif; ?>">素质拓展型</option>
							</select>
						</p>
						<p>
							<label>活动主题：</label>
							<input type="text" value="<?php echo $activity->title; ?>" name="title" class="textInput">
						</p>
						<p>
							<label>活动时间：</label>
							<input type="text" name="date" value="<?php echo $activity->date; ?>" class="date" readonly="true"/>
							<a class="inputDateButton" href="javascript:;">选择</a>
							<span class="info"></span>
						</p>
						<p>
							<label>活动地点：</label>
							<input type="text" value="<?php echo $activity->place; ?>" name="place" class="textInput">
						</p>
						<p>
							<label>应到人数：</label>
							<input type="text" value="<?php echo $activity->people_plan; ?>" name="people_plan" class="textInput">
						</p>
						<p>
							<label>实到人数：</label>
							<input type="text" value="<?php echo $activity->people_actual; ?>" name="people_actual" class="textInput">
						</p>
						<p>
							<label>活动预算：</label>
							<input type="text" value="<?php echo $activity->activity_budget; ?>" name="activity_budget" class="textInput">
						</p>
						<p>
							<label>审批金额：</label>
							<input type="text" value="<?php echo $activity->approval_amount; ?>" name="approval_amount" class="textInput">
						</p>
					</div>

					<!--活动经费使用明细-->
					<div layoutH="110" style="display:block; overflow:auto; border:solid 1px #CCC; line-height:21px; background:#fff; margin: 0 auto; padding: 10px;">
						<h2 class="contentTitle">活动经费使用明细</h2>
						<p>
							<label>活动经费使用明细：</label>
							<textarea class="editor" tools="mini" name="money_usage" rows="12" style="width: 645px ;height: 360px;"><?php echo $activity->money_usage; ?></textarea>
						</p>
					</div>

					<!--活动总结-->
					<div layoutH="110" style="display:block; overflow:auto; border:solid 1px #CCC; line-height:21px; background:#fff; margin: 0 auto; padding: 10px;">
						<h2 class="contentTitle">活动总结</h2>
						<p>
							<label>活动总结：</label>
							<textarea class="editor" tools="mini" name="summary" rows="12" style="width: 645px ;height: 360px;"><?php echo $activity->summary; ?></textarea>
						</p>
					</div>

					<!--活动具体开展情况-->
					<div layoutH="110" style="display:block; overflow:auto; border:solid 1px #CCC; line-height:21px; background:#fff; margin: 0 auto; padding: 10px;">
						<h2 class="contentTitle">活动具体开展情况</h2>
						<p>
							<label>活动具体开展情况：</label>
							<textarea class="editor" tools="mini" name="detail" rows="12" style="width: 645px ;height: 360px;"><?php echo $activity->detail; ?></textarea>
						</p>
					</div>

					<!--活动照片-->
					<div layoutH="110" style="display:block; overflow:auto; border:solid 1px #CCC; line-height:21px; background:#fff; margin: 0 auto; padding: 10px;">
						活动照片
					</div>

					<!--活动视频-->
					<div layoutH="110" style="display:block; overflow:auto; border:solid 1px #CCC; line-height:21px; background:#fff; margin: 0 auto; padding: 10px;">
						活动视频
					</div>
				</div>
				<div class="tabsFooter">
					<div class="tabsFooterContent"></div>
				</div>
			</div>
			<div class="formBar">
				<ul>
						<!--<li><a class="buttonActive" href="javascript:;"><span>保存</span></a></li>-->
					<li><div class="buttonActive"><div class="buttonContent"><button type="submit">保存</button></div></div></li>
					<li>
						<div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div>
					</li>
				</ul>
			</div>
		</div>
</div>
