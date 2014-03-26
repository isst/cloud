
<div class="pageContent">
	<form method="post" action="classes/internship/add.html" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">
		<div layoutH="56">
			<p style="margin: 5px;">
				<label>实习公司：</label>
				<input name="company" class="required textInput" type="text" size="30" value="" />
			</p>
			<p style="margin: 5px;">
				<label>住宿地址：</label>
				<input name="lodging" class="required textInput" type="text" size="30" value="" />
			</p>
			<p style="margin: 5px;">
				<label>本人联系方式：</label>
				<input name="contact" class="required textInput" type="text" size="30" value="<?php echo $user->tel; ?>" />
			</p>
			<p style="margin: 5px;">
				<label>公司负责人：</label>
				<input name="principal" class="required textInput" type="text" size="30" value="" />
			</p>
			<p style="margin: 5px;">
				<label>负责人联系方式：</label>
				<input name="principal_contact" class="required textInput" type="text" size="30" value="" />
			</p>
			<p style="margin: 5px;">
				<label>公司地址：</label>
				<input name="company_addr" class="required textInput" type="text" size="30" value="" />
			</p>
			<p style="margin: 5px;">
				<label>实习起止时间：</label>
				<input name="internship_time" class="required textInput" type="text" size="30" value="" />
			</p>
			<p style="margin: 5px;">
				<label>实习内容：</label>
				<input name="internship_content" class="required textInput" type="text" size="30" value="" />
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
