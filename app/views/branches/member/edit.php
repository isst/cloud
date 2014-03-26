<div class="pageContent">
	<form method="post" action="branches/member/edit.html?id=<?php echo $member->id; ?>" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">
		<div class="pageFormContent" layoutH="60">
			<p>
				<label>姓名：</label><?php echo $member->name; ?>
			</p>
			<p>
				<label>性别：</label><?php echo $member->sexual; ?>
			</p>
			<p>
				<label>政治面貌：</label>
				<select name="politics_status">
					<?php foreach ($politics_status_names as $id => $name): ?>
						<option value="<?php echo $id; ?><?php if ($id == $member->politics_status): ?>" selected="selected<?php endif; ?>"><?php echo $name; ?></option>
					<?php endforeach; ?>
				</select>
			</p>
			<p>
				<label>支部状态：</label>
				<select name="branch_status">
					<?php foreach ($branch_status_names as $id => $name): ?>
						<option value="<?php echo $id; ?><?php if ($id == $member->branch_status): ?>" selected="selected<?php endif; ?>"><?php echo $name; ?></option>
					<?php endforeach; ?>
				</select>
			</p>
			<p>
				<label>支部头衔：</label>
				<select name="branch_title">
					<?php foreach ($branch_title_names as $id => $name): ?>
						<option value="<?php echo $id; ?><?php if ($id == $member->branch_title): ?>" selected="selected<?php endif; ?>"><?php echo $name; ?></option>
					<?php endforeach; ?>
				</select>
			</p>
            <p>
                <label>党费已交付至：</label>
                <input type="text" value="<?php echo $member->party_dues_paid; ?>" name="party_dues_paid" />
            </p>
			<div style="clear: both; display:block; overflow:auto; line-height:21px; margin: 0 auto; padding:0 10px;">
				<div style="margin: 10px 0;">
					<label>党校学习情况：</label>
				</div>
				<textarea  name="party_school_learning" rows="12" style="width: 645px;height: 150px;"><?php echo $member->party_school_learning; ?></textarea>
			</div>
			<div style="display:block; overflow:auto; line-height:21px; margin: 0 auto; padding:0 10px;">
				<div style="margin: 10px 0;">
					<label>党员的家庭情况：</label>
				</div>
				<textarea  name="party_family" rows="12" style="width: 645px;height: 150px;"><?php echo $member->party_family; ?></textarea>
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
