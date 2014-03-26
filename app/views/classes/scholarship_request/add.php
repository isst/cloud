<div class="pageContent">
	<form method="post" action="classes/scholarship_request/add.html?item_id=<?php echo $item_id; ?>" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">
		<div layoutH="56" style="padding: 10px;">
			<table width="100%">
				<tbody>
					<tr style="height: 30px;">
						<td>姓名：</td>
						<td>
							<?php echo $user->name; ?>
						</td>
						<td>学号：</td>
						<td>
							<?php echo $user->student_num; ?>
						</td>
					</tr>
					<tr style="height: 30px;">
						<td>专业班级：</td>
						<td>
							<?php echo $class->name; ?>
						</td>
						<td>性别：</td>
						<td>
							<?php echo $user->sexual; ?>
						</td>
					</tr>
					<tr style="height: 30px;">
						<td>政治面貌：</td>
						<td>
							<input type="text" name="politics_status" value="" />
						</td>
						<td>民族：</td>
						<td>
							<?php echo $user->nation; ?>
						</td>
					</tr>
					<tr style="height: 30px;">
						<td>担任社会工作情况：</td>
						<td colspan="3">
							<textarea name="job_info" rows="4" cols="100"></textarea>
						</td>
					</tr>
					<tr style="height: 30px;">
						<td>参加科研情况：</td>
						<td colspan="3">
							<textarea name="research_info" rows="4" cols="100"></textarea>
						</td>
					</tr>
					<tr style="height: 30px;">
						<td>所获奖励：</td>
						<td colspan="3">
							<textarea name="awards" rows="4" cols="100"></textarea>
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
