
<div class="pageContent">
	<form method="post" action="branches/member/add.html?class_id=<?php echo $branch->id; ?>" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">
		<div class="pageFormContent" layoutH="60">
			<p>
				<label>姓名：</label>
				<select name="student_id">
					<?php foreach ($students as $student): ?>
						<option value="<?php echo $student->id; ?>"><?php echo $student->name; ?></option>
					<?php endforeach; ?>
				</select>
			</p>
			<p>
				<label>状态：</label>
				<select name="status">
					<option value="0">积极分子</option>
					<option value="1">确定转预备党员</option>
					<option value="2">预备党员</option>
					<option value="3">确定转正式党员</option>
					<option value="4">正式党员</option>
				</select>
			</p>
			<p>
				<label>支部头衔：</label>
				<select name="branch_title">
					<option value="0">无头衔</option>
					<option value="1">支部书记</option>
					<option value="2">支部宣传委员</option>
					<option value="3">组织委员</option>
				</select>
			</p>
			<div style="clear: both; display:block; overflow:auto; line-height:21px; margin: 0 auto; padding:0 10px;">
				<div style="margin: 10px 0;">
					<label>党校学习情况：</label>
				</div>
				<textarea  name="party_study" rows="12" style="width: 645px;height: 150px;"></textarea>
			</div>
			<div style="display:block; overflow:auto; line-height:21px; margin: 0 auto; padding:0 10px;">
				<div style="margin: 10px 0;">
					<label>党员的家庭情况：</label>
				</div>
				<textarea  name="family" rows="12" style="width: 645px;height: 150px;"></textarea>
			</div>
		</div>
		<div class="formBar">
			<ul>
				<li><div class="buttonActive"><div class="buttonContent"><button type="submit">保存</button></div></div></li>
				<li>
					<div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div>
				</li>
			</ul>
		</div>
	</form>
</div>
