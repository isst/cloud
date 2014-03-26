
<div class="pageContent">
    <form method="post" action="branches/activity/report.html?id=<?php echo $activity->id; ?>" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">
        <div class="pageFormContent" layoutH="20">
			<div class="tabs">
				<div class="tabsHeader">
					<div class="tabsHeaderContent">
						<ul>
							<li><a href="javascript:;"><span>经费使用明细</span></a></li>
							<li><a href="javascript:;"><span>活动开展情况</span></a></li>
						</ul>
					</div>
				</div>
				<div class="tabsContent">
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
