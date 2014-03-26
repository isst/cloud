<div class="pageContent">
    <form method="post" action="branches/activity/apply.html?class_id=<?php echo $class_id; ?>" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">
		<div layoutH="56" style="display:block; overflow:auto; border:solid 1px #CCC; line-height:21px; background:#fff; margin: 0 auto; padding: 10px;">
			<h2 class="contentTitle">基本信息</h2>
			<table>
				<tbody>
					<tr style="height: 30px;">
						<td>活动类型：</td>
						<td>
							<select name="type">
								<option value="0">娱乐型</option>
								<option value="1">素质拓展型</option>
							</select>
						</td>
						<td>活动主题：</td>
						<td>
							<input type="text" value="" name="title" class="textInput">
						</td>
					</tr>
					<tr style="height: 30px;">
						<td>活动时间：</td>
						<td>
							<input type="text" name="date" class="date" readonly="true" style="float: left;" />
							<a class="inputDateButton" href="javascript:;">选择</a>
							<span class="info"></span>
						</td>
						<td>活动地点：</td>
						<td>
							<input type="text" value="" name="place" class="textInput">
						</td>
					</tr>
					<tr style="height: 30px;">
						<td>应到人数：</td>
						<td>
							<input type="text" value="" name="people_plan" class="textInput">人
						</td>
						<td>活动预算：</td>
						<td>
							<input type="text" value="" name="activity_budget" class="textInput">元
						</td>
					</tr>
					<tr>
						<td><span>活动内容:</span></td>
						<td colspan="3"><textarea name="content" cols="60" rows="4"></textarea></td>
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
									<input type="checkbox" name="plan_peoples[]" value="<?php echo $the->id; ?>" /><?php echo $the->name; ?>
								</div>
							<?php endforeach; ?>
						</td>
					</tr>
				</tbody>
			</table>
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
    </form>
</div>
