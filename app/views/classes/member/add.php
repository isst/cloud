<div class="pageContent">
	<form method="post" action="classes/member/add.html?class_id=<?php echo $class->id; ?>" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">
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
				<label>学号：</label>
				<input type="text" value="" name="student_num" class="textInput">
			</p>
			<p>
				<label>身份证号：</label>
				<input type="text" value="" name="id_no" class="textInput">
			</p>
			<p>
				<label>民族：</label>
				<input type="text" value="" name="nation" class="textInput">
			</p>
			<p>
				<label>籍贯：</label>
				<input type="text" value="" name="birthplace" class="textInput">
			</p>
			<p>
				<label>出生年月：</label>
				<input type="text" value="" name="birthday" class="textInput">
			</p>
			<p>
				<label>联系电话：</label>
				<input type="text" value="" name="tel" class="textInput">
			</p>
			<p>
				<label>邮箱：</label>
				<input type="text" value="" name="email" class="textInput">
			</p>
			<p>
				<label>寝室号：</label>
				<input type="text" value="" name="bedroom" class="textInput">
			</p>
			<p>
				<label>家庭住址：</label>
				<input type="text" value="" name="home_addr" class="textInput">
			</p>
			<p>
				<label>介绍信抬头：</label>
				<input type="text" value="" name="letter_title" class="textInput">
			</p>
			<p>
				<label>班级职务：</label>
				<select name="class_title">
					<option value="0">无职务</option>
					<option value="1">班长</option>
					<option value="2">学习委员</option>
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
