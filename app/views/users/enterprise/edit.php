
<div class="pageContent">
	<form method="post" action="users/enterprise/edit.html?id=<?php echo $enterprise->id; ?>" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">
		<div class="pageFormContent" layoutH="56">
			<p>
				<label>企业名称：</label>
				<input type="text" value="<?php echo $enterprise->name; ?>" name="name" class="textInput">
			</p>
			<p>
				<label>用户名：</label>
				<input type="text" value="<?php echo $enterprise->username; ?>" name="username" class="textInput" readonly="readonly">
			</p>
			<p>
				<label>密码：</label>
				<input type="password" value="" name="password" class="textInput">
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
