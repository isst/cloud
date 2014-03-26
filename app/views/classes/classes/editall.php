
<div class="pageContent">
	<form method="post" action="classes/classes/editall.html?id=<?php echo $class->id; ?>" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">
		<div class="pageFormContent" layoutH="56">
			<p>
				<label>班级名称：</label>
				<input name="name" class="required" type="text" size="30" value="<?php echo $class->name; ?>" alt="请输入班级名称"/>
			</p>
			<p>
				<label>入学年份：</label>
				<select name="start_year">
					<?php for ($i = (int) date('Y'); $i > 2010; $i--): ?>
						<option value="<?php echo $i; ?><?php if ($i == $class->start_year): ?>" selected="selected<?php endif; ?>"><?php echo $i; ?></option>
					<?php endfor; ?>
				</select>
			</p>
			<p>
				<label>德育导师：</label>
				<input type="text" readonly="readonly" value="<?php echo $class->class_adviser_name; ?>" name="class_adviser_name" class="required textInput">
				<input name="class_adviser_id" type="hidden" value="<?php echo $class->class_adviser_id; ?>"/>
				<a class="btnLook" href="users/teacher/lookup.html?type=class_adviser" target="dialog" mask="true" lookupGroup="">查找带回</a>
			</p>
			<p>
				<label>专业导师：</label>
				<input type="text" readonly="readonly" value="<?php echo $class->major_adviser_name; ?>" name="major_adviser_name" class="required textInput">
				<input name="major_adviser_id" type="hidden" value="<?php echo $class->major_adviser_id; ?>"/>
				<a class="btnLook" href="users/teacher/lookup.html?type=major_adviser" target="dialog" mask="true" lookupGroup="">查找带回</a>
			</p>
			<p>
				<label>支部指导老师：</label>
				<input type="text" readonly="readonly" value="<?php echo $class->branch_instructor_name; ?>" name="branch_instructor_name" class="required textInput">
				<input name="branch_instructor_id" type="hidden" value="<?php echo $class->branch_instructor_id; ?>"/>
				<a class="btnLook" href="users/teacher/lookup.html?type=branch_instructor" target="dialog" mask="true" rel="" lookupGroup="">查找带回</a>
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
