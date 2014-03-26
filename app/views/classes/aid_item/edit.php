
<div class="pageContent">
	<form method="post" action="classes/aid_item/edit.html?id=<?php echo $aid_item->id; ?>" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">
		<div layoutH="56">
			<p style="margin: 5px;">
				<label>项目标题：</label>
				<input name="title" class="required textInput" type="text" size="30" value="<?php echo $aid_item->title; ?>" alt="请输入项目标题"/>
			</p>
			<p style="margin: 5px;">
				<label>项目金额：</label>
				<input name="money" class="required textInput" type="text" size="30" value="<?php echo $aid_item->money; ?>" alt="请输入项目金额"/>
			</p>
			<p style="margin: 5px;">
				<label>项目类型：</label>
				<select name="type">
					<?php foreach ($aid_type_names as $id => $name): ?>
						<option value="<?php echo $id; ?><?php if ($id == $aid_item->type): ?>" selected="selected<?php endif; ?>"><?php echo $name; ?></option>
					<?php endforeach; ?>
				</select>
			</p>
			<p style="margin: 5px;">
				<label>用人单位：</label>
				<select name="unit_id">
					<?php foreach ($units as $unit): ?>
						<option value="<?php echo $unit->id; ?><?php if ($unit->id == $aid_item->unit_id): ?>" selected="selected<?php endif; ?>"><?php echo $unit->name; ?></option>
					<?php endforeach; ?>
				</select>
			</p>
			<p style="margin: 5px;">
				<label>是否开放申请：</label>
				<input type="radio" name="enabled" value="1<?php if (1 == $aid_item->enabled): ?>" checked="checked<?php endif; ?>" /> 开放申请
				<input type="radio" name="enabled" value="0<?php if (0 == $aid_item->enabled): ?>" checked="checked<?php endif; ?>" /> 关闭申请
			</p>
			<p style="margin: 5px;">
				<label>项目介绍：</label>
			</p>
			<p style="margin: 5px;">
				<textarea name="content" rows="20" style="width: 645px ;height: 300px;"><?php echo $aid_item->content; ?></textarea>
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
