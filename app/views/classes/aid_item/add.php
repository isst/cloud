
<div class="pageContent">
	<form method="post" action="classes/aid_item/add.html" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">
		<div layoutH="56">
			<p style="margin: 5px;">
				<label>项目标题：</label>
				<input name="title" class="required textInput" type="text" size="30" value="" alt="请输入项目标题"/>
			</p>
			<p style="margin: 5px;">
				<label>项目金额：</label>
				<input name="money" class="required textInput" type="text" size="30" value="" alt="请输入项目金额"/>
			</p>
			<p style="margin: 5px;">
				<label>项目类型：</label>
				<select name="type">
					<?php foreach ($aid_type_names as $id => $name): ?>
						<option value="<?php echo $id; ?>"><?php echo $name; ?></option>
					<?php endforeach; ?>
				</select>

			</p>
			<p style="margin: 5px;">
				<label>用人单位：</label>
				<select name="unit_id">
					<?php foreach ($units as $unit): ?>
						<option value="<?php echo $unit->id; ?>"><?php echo $unit->name; ?></option>
					<?php endforeach; ?>
				</select>
			</p>
			<p style="margin: 5px;">
				<label>是否开放申请：</label>
				<input type="radio" name="enabled" value="1" /> 开放申请
				<input type="radio" name="enabled" value="0" checked="checked" /> 关闭申请
			</p>
			<p style="margin: 5px;">
				<label>项目介绍：</label>
			</p>
			<p style="margin: 5px;">
				<textarea name="content" rows="20" style="width: 645px ;height: 300px;"></textarea>
			</p>
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
