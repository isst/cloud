
<div class="pageContent">
    <form method="post" action="branches/activity/edit.html?id=<?php echo $activity->id; ?>" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">
        <div class="pageFormContent" layoutH="20">
			<div class="tabs">
				<div class="tabsHeader">
					<div class="tabsHeaderContent">
						<ul>
							<li><a href="javascript:;"><span>基本信息</span></a></li>
							<li><a href="javascript:;"><span>经费使用明细</span></a></li>
							<li><a href="javascript:;"><span>活动开展情况</span></a></li>
						</ul>
					</div>
				</div>
				<div class="tabsContent">
					<!--基本信息-->
					<div layoutH="120" style="display:block; overflow:auto; border:solid 1px #CCC; line-height:21px; background:#fff; margin: 0 auto; padding: 10px;">
						<h2 class="contentTitle">基本信息</h2>
						<table>
							<tbody>
								<tr style="height: 30px;">
									<td>活动类型：</td>
									<td>
										<select name="type">
											<option value="0<?php if (0 == $activity->type): ?>" selected="selected<?php endif; ?>">娱乐型</option>
											<option value="1<?php if (1 == $activity->type): ?>" selected="selected<?php endif; ?>">素质拓展型</option>
										</select>
									</td>
									<td>活动主题：</td>
									<td>
										<input type="text" value="<?php echo $activity->title; ?>" name="title" class="textInput">
									</td>
								</tr>
								<tr style="height: 30px;">
									<td>活动时间：</td>
									<td>
										<input type="text" name="date" value="<?php echo $activity->date; ?>" class="date" style="float: left;"/>
										<a class="inputDateButton" href="javascript:;">选择</a>
										<span class="info"></span>
									</td>
									<td>活动地点：</td>
									<td>
										<input type="text" value="<?php echo $activity->place; ?>" name="place" class="textInput">
									</td>
								</tr>
								<tr style="height: 30px;">
									<td>应到人数：</td>
									<td>
										<input type="text" value="<?php echo $activity->people_plan; ?>" name="people_plan" class="textInput">人
									</td>
									<td>活动预算：</td>
									<td>
										<input type="text" value="<?php echo $activity->activity_budget; ?>" name="activity_budget" class="textInput">元
									</td>
								</tr>
								<tr>
									<td><span>活动内容:</span></td>
									<td colspan="3"><textarea name="content" cols="60" rows="4"><?php echo $activity->content; ?></textarea></td>
								</tr>
								<tr style="height: 30px;">
									<td colspan="4">
										参与人员：
									</td>
								</tr>
								<tr style="height: 30px;">
									<td colspan="4">
										<?php foreach ($students as $the): ?>
											<div style="float: left; width: 80px;">
												<input type="checkbox" name="plan_peoples[]" value="<?php echo $the->id; ?><?php if (in_array($the->id, $activity->plan_peoples)): ?>" checked="checked<?php endif; ?>" /><?php echo $the->name; ?>
											</div>
										<?php endforeach; ?>
									</td>
								</tr>
							</tbody>
						</table>
					</div>


					<!--活动经费使用明细-->
					<div layoutH="120" style="display:block; overflow:auto; border:solid 1px #CCC; line-height:21px; background:#fff; margin: 0 auto; padding: 10px;">
						<h2 class="contentTitle">经费使用明细</h2>
						<table>
							<tbody>
								<tr style="height: 30px;">
									<td colspan="2">
										经费使用明细：
									</td>
								</tr>
								<tr style="height: 30px;">
									<td colspan="2">
										<textarea name="money_usage" rows="12" style="width: 645px ;height: 300px;"><?php echo $activity->money_usage; ?></textarea>
									</td>
								</tr>
							</tbody>
						</table>
					</div>

					<!--活动总结-->
					<div layoutH="120" style="display:block; overflow:auto; border:solid 1px #CCC; line-height:21px; background:#fff; margin: 0 auto; padding: 10px;">
						<h2 class="contentTitle">活动开展情况</h2>
						<table>
							<tbody>
								<tr style="height: 30px;">
									<td colspan="2">
										实到人数：
										<input type="text" value="<?php echo $activity->people_actual; ?>" name="people_actual" style="float: none;">人
									</td>
								</tr>
								<tr style="height: 30px;">
									<td colspan="2">
										实到人员：
									</td>
								</tr>
								<tr style="height: 30px;">
									<td colspan="2">
										<?php foreach ($students as $the): ?>
											<div style="float: left; width: 80px;">
												<input type="checkbox" name="actual_peoples[]" value="<?php echo $the->id; ?><?php if (in_array($the->id, $activity->actual_peoples)): ?>" checked="checked<?php endif; ?>" /><?php echo $the->name; ?>
											</div>
										<?php endforeach; ?>
									</td>
								</tr>
								<tr style="height: 30px;">
									<td colspan="2">
										活动总结：
									</td>
								</tr>
								<tr style="height: 30px;">
									<td colspan="2">
										<textarea name="summary" rows="10" style="width: 645px ;height: 300px;"><?php echo $activity->summary; ?></textarea>
									</td>
								</tr>
							</tbody>
						</table>
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
