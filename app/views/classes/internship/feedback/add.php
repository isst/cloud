<div class="pageContent">
	<form method="post" action="classes/internship_feedback/add.html?student_id=<?php echo $student_id; ?>" class="pageForm required-validate" id="internship_feedback_edit_form"  onsubmit="return validateCallback(this, dialogAjaxDone);">
		<div layoutH="56" class="pageFormContent">
            <p>
                <label>实习公司：</label>
                <select name="internship_id">
                <?php
                foreach ($internships as $internship) {
                    echo printf('<option value="%s">%s</option>', $internship->id, $internship->company);
                }
                ?>
                </select>
            </p>

            <p >
                <label>反馈时间：</label>
                <input class="required date" type="text" size="20" value="" name="feedback_time" dateFmt="yyyy-MM-dd" />
            </p>
            <p>
                <label>填写人：</label>
                <input name="editor" class="required textInput" type="text" size="30" value=""/>
            </p>
			<p>
				<label>反馈内容：</label>
                <textarea name="content" class="required textInput"  style="width: 500px; height: 100px;"></textarea>
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
