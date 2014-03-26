
<div class="pageContent">

	<form method="post" action="user/changepwd.html" class="pageForm" onsubmit="return validateCallback(this, changepwdAjaxDone)">
		<div class="pageFormContent" layoutH="58">
			<div class="unit">
				<label>用户类型：</label>
				<input type="text" size="30" readonly="readonly" value="<?php echo $user_type_names[$user_type]; ?>" />
			</div>
			<div class="unit">
				<label>用户名：</label>
				<input type="text" size="30" readonly="readonly" value="<?php echo $user->username; ?>" />
			</div>
			<div class="unit">
				<label>姓名：</label>
				<input type="text" size="30" readonly="readonly" value="<?php echo $user->name; ?>" />
			</div>
			<div class="unit">
				<label>原密码：</label>
				<input type="password" name="password_old" size="30" class="required" />
			</div>
			<div class="unit">
				<label>新密码：</label>
				<input type="password" name="password_new" size="30" class="required" />
			</div>
			<div class="unit">
				<label>确认密码：</label>
				<input type="password" name="password_confirm" size="30" class="required" />
			</div>
		</div>
		<div class="formBar">
			<ul>
				<li><div class="buttonActive"><div class="buttonContent"><button type="submit">提交</button></div></div></li>
				<li><div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div></li>
			</ul>
		</div>
	</form>

</div>

