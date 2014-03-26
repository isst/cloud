<div class="pageContent">
	<form method="post" action="classes/hardship_request/add.html?item_id=<?php echo $item_id; ?>" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">
		<div layoutH="56" style="padding: 10px;">
			<table width="100%">
				<tbody>
					<tr style="height: 30px;">
						<td>姓名：</td>
						<td>
							<?php echo $user->name; ?>
						</td>
						<td>性别：</td>
						<td>
							<?php echo $user->sexual; ?>
						</td>
					</tr>
					<tr style="height: 30px;">
						<td>学号：</td>
						<td>
							<?php echo $user->student_num; ?>
						</td>
						<td>所学专业：</td>
						<td>
							<input type="text" name="major" value="" />
						</td>
					</tr>
					<tr style="height: 30px;">
						<td>所在学院：</td>
						<td>
							<input type="text" name="college" value="" />
						</td>
						<td>德育导师姓名</td>
						<td>
							<?php echo $class->class_adviser_name; ?>
						</td>
					</tr>
					<tr style="height: 30px;">
						<td>本人联系方式：</td>
						<td>
							<input type="text" name="contact" value="" />
						</td>
						<td>政治面貌：</td>
						<td>
							<input type="text" name="politics_status" value="" />
						</td>
					</tr>
					<tr style="height: 30px;">
						<td>入学年月：</td>
						<td>
							<input type="text" name="enrollment_date" value="" />
						</td>
						<td>家庭住址：</td>
						<td>
							<input type="text" name="home_addr" value="" />
						</td>
					</tr>
					<tr style="height: 30px;">
						<td>申请理由：</td>
						<td colspan="3">
							<textarea name="reason" rows="4" cols="100"></textarea>
						</td>
					</tr>
					<tr style="height: 30px;">
						<td>申请补助金额：</td>
						<td colspan="3">
							<input type="text" name="amount_apply" value="" /> 元 (填写数字)
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
