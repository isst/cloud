
<div class="pageContent">
	<form method="post" action="users/teacher/edit.html?id=<?php echo $teacher->id; ?>" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">
		<div class="pageFormContent" layoutH="56">
			<p>
				<label>用户名：</label>
				<input type="text" value="<?php echo $teacher->username; ?>" name="username" class="textInput" readonly="readonly">
			</p>
			<?php if ('administrator' == $user->user_type): ?>
				<p>
					<label>密码：</label>
					<input type="text" value="" name="password" class="textInput">
				</p>
			<?php endif; ?>
			<p>
				<label>姓名：</label>
				<input type="text" value="<?php echo $teacher->name; ?>" name="name" class="textInput">
			</p>
			<p>
				<label>性别：</label>
				<select name="sexual">
					<option value="">请选择</option>
					<option value="男<?php if ('男' == $teacher->sexual): ?>" selected="selected<?php endif; ?>">男</option>
					<option value="女<?php if ('女' == $teacher->sexual): ?>" selected="selected<?php endif; ?>">女</option>
				</select>
			</p>
			<p>
				<label>联系方式：</label>
				<input type="text" value="<?php echo $teacher->contact; ?>" name="contact" class="textInput">
			</p>
            <p>
                <label>手机号：</label>
                <input type="text" value="<?php echo $teacher->tel; ?>" name="tel" class="textInput">
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
