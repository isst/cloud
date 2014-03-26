
<div class="pageContent">
	<form method="post" action="branches/member/add.html?class_id=<?php echo $class_id; ?>" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">
		<div class="pageFormContent" layoutH="60">
			<p>
				<label>姓名：</label>
				<select name="id">
					<?php foreach ($students as $student): ?>
						<option value="<?php echo $student->id; ?>"><?php echo $student->name; ?></option>
					<?php endforeach; ?>
				</select>
			</p>
			<p>
				<label>政治面貌：</label>
				<select name="politics_status">
					<?php foreach ($politics_status_names as $id => $name): ?>
						<option value="<?php echo $id; ?>"><?php echo $name; ?></option>
					<?php endforeach; ?>
				</select>
			</p>
			<p>
				<label>支部状态：</label>
				<select name="branch_status">
					<?php foreach ($branch_status_names as $id => $name): ?>
						<option value="<?php echo $id; ?>"><?php echo $name; ?></option>
					<?php endforeach; ?>
				</select>
			</p>
			<p>
				<label>支部头衔：</label>
				<select name="branch_title">
					<?php foreach ($branch_title_names as $id => $name): ?>
						<option value="<?php echo $id; ?>"><?php echo $name; ?></option>
					<?php endforeach; ?>
				</select>
			</p>
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
