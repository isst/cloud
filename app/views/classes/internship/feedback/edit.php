<div class="pageContent">
	<form method="post" action="classes/internship/feedback/edit.html?id=<?php echo $internship->id; ?>" class="pageForm required-validate" id="internship_feedback_edit_form"  onsubmit="return validateCallback(this, dialogAjaxDone);">
		<div layoutH="56">
			<p style="margin: 5px;">
				<label>填写人：</label>
				<input name="feedback_editor" class="required textInput" type="text" size="30" value="<?php echo $internship->feedback_editor; ?>"/>
			</p>
			<p style="margin: 5px;">
				<label style="float: left; display: block; padding-top: 2px;">反馈内容：</label>
                <textarea name="feedback_content" class="required textInput"  style="width: 400px; height: 100px;"><?php echo $internship->feedback_content; ?></textarea>
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
