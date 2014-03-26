
<div class="pageContent">
	<form method="post" action="classes/aid_request/add.html?item_id=<?php echo $item_id; ?>" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">
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
						<td>所在系/专业班级：</td>
						<td>
							<?php echo $class->name; ?>
						</td>
					</tr>
					<tr style="height: 30px;">
						<td>寝室及电话：</td>
						<td>
							<input type="text" name="bedroom_tel" value="" />
						</td>
						<td>手机</td>
						<td>
							<input type="text" name="cellphone" value="" />
						</td>
					</tr>
					<tr style="height: 30px;">
						<td>E-mail：</td>
						<td>
							<?php echo $user->email; ?>
						</td>
						<td>助学金额度</td>
						<td>
							<input type="text" name="stipend" value="" />
						</td>
					</tr>
					<tr style="height: 30px;">
						<td>奖学金额度：</td>
						<td>
							<input type="text" name="scholarship" value="" />
						</td>
						<td>国家助学贷款额度</td>
						<td>
							<input type="text" name="student_loan" value="" />
						</td>
					</tr>
					<tr style="height: 30px;">
						<td>有何特长：</td>
						<td colspan="3">
							<textarea name="strong_point" rows="4" cols="100"></textarea>
						</td>
					</tr>
					<tr style="height: 30px;">
						<td>家庭情况说明：</td>
						<td colspan="3">
							<textarea name="family_info" rows="4" cols="100"></textarea>
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
