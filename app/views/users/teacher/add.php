
<div class="pageContent">
	<form method="post" action="users/teacher/add.html" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">
		<div class="pageFormContent" layoutH="56">
			<p>
				<label>用户名：</label>
				<input type="text" value="" name="username" class="textInput">
			</p>
			<p>
				<label>密码：</label>
				<input type="password" value="" name="password" class="textInput">
			</p>
			<p>
				<label>姓名：</label>
				<input type="text" value="" name="name" class="textInput">
			</p>
			<p>
				<label>性别：</label>
				<select name="sexual">
					<option value="">请选择</option>
					<option value="男">男</option>
					<option value="女">女</option>
				</select>
			</p>
			<p>
				<label>联系方式：</label>
				<input type="text" value="" name="contact" class="textInput">
			</p>
            <p>
                <label>手机号：</label>
                <input type="text" value="" name="tel" class="textInput">
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
