<div class="pageContent">
    <div class="pageFormContent" layoutH="20">

		<div class="tabs">
			<div class="tabsHeader">
				<div class="tabsHeaderContent">
					<ul>
						<li><a href="javascript:;"><span>基本信息</span></a></li>
						<?php if (2 == $activity->status): ?>
							<li><a href="javascript:;"><span>经费使用明细</span></a></li>
							<li><a href="javascript:;"><span>活动开展情况</span></a></li>
						<?php endif; ?>
					</ul>
				</div>
			</div>
			<div class="tabsContent">
				<!--基本信息-->
				<div layoutH="82" style="display:block; overflow:auto; border:solid 1px #CCC; line-height:21px; background:#fff; margin: 0 auto; padding: 10px;">
					<h2 class="contentTitle">基本信息</h2>

					<table>
						<tbody>
							<tr style="height: 30px;">
								<td>活动主题：</td>
								<td>
									<?php echo $activity->title; ?>
								</td>
								<td>活动类型：</td>
								<td>
									<?php echo $activity_type_names[$activity->type]; ?>
								</td>
							</tr>
							<tr style="height: 30px;">
								<td>活动时间：</td>
								<td>
									<?php echo $activity->date; ?>
								</td>
								<td>活动地点：</td>
								<td>
									<?php echo $activity->place; ?>
								</td>
							</tr>
							<tr style="height: 30px;">
								<td>应到人数：</td>
								<td>
									<?php echo $activity->people_plan; ?>人
								</td>
								<td>活动预算：</td>
								<td>
									<?php echo $activity->activity_budget; ?>元
								</td>
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
											<input type="checkbox" name="plan_peoples[]" value="<?php echo $the->id; ?><?php if (in_array($the->id, $activity->plan_peoples)): ?>" checked="checked<?php endif; ?>" disabled="disabled" /><?php echo $the->name; ?>
										</div>
									<?php endforeach; ?>
								</td>
							</tr>
							<tr style="height: 30px;">
								<td>审批状态：</td>
								<td>
									<?php echo $activity_status_names[$activity->status]; ?>
								</td>
								<td>
									<?php if (2 == $activity->status): ?>
										审批金额：
									<?php endif; ?>
								</td>
								<td>
									<?php if (2 == $activity->status): ?>
										<?php echo $activity->approval_amount; ?>元
									<?php endif; ?>
								</td>
							</tr>
						</tbody>
					</table>
				</div>

				<!--活动经费使用明细-->
				<div layoutH="82" style="display:block; overflow:auto; border:solid 1px #CCC; line-height:21px; background:#fff; margin: 0 auto; padding: 10px;">
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
									<?php echo nl2br($activity->money_usage); ?>
								</td>
							</tr>
						</tbody>
					</table>
				</div>

				<!--活动总结-->
				<div layoutH="82" style="display:block; overflow:auto; border:solid 1px #CCC; line-height:21px; background:#fff; margin: 0 auto; padding: 10px;">
					<h2 class="contentTitle">活动开展情况</h2>
					<table>
						<tbody>
							<tr style="height: 30px;">
								<td colspan="2">
									实到人数：
									<?php echo $activity->people_actual; ?>人
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
											<input type="checkbox" name="actual_peoples[]" value="<?php echo $the->id; ?><?php if (in_array($the->id, $activity->actual_peoples)): ?>" checked="checked<?php endif; ?>" disabled="disabled" /><?php echo $the->name; ?>
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
									<?php echo nl2br($activity->summary); ?>
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
	</div>
</div>
