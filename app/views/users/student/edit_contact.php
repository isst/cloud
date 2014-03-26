
<div class="pageContent">

	<form method="post" action="users/student/edit_contact.html" class="pageForm" onsubmit="return validateCallback(this, changepwdAjaxDone)">
		<div class="pageFormContent" layoutH="58">
			<div class="unit">
				<label>联系电话：</label>
				<input type="text" value="<?php echo $student->tel; ?>" name="tel" class="textInput">
			</div>
		</div>
		<div class="formBar">
			<ul>
				<li><div class="buttonActive"><div class="buttonContent"><button type="submit">更新</button></div></div></li>
				<li><div class="button"><div class="buttonContent"><button type="button" class="close">关闭</button></div></div></li>
			</ul>
		</div>
	</form>

</div>

