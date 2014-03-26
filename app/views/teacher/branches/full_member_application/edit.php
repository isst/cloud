
<div class="pageContent">
    <form method="post" action="branches/full_member_application/edit.html?id=<?php echo $full_member_application->full_member_application_id; ?>" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">
        <div class="pageFormContent" layoutH="56">
			<p>
				<label>学生姓名：</label>
				<select name="student_id">
					<?php foreach ($members as $member): ?>
						<option value="<?php echo $member->student_id; ?><?php if ($member->student_id == $full_member_application->student_id): ?>" selected="selected<?php endif; ?>"><?php echo $member->student_name; ?></option>
					<?php endforeach; ?>
				</select>
			</p>
            <p>
                <label>标题：</label>
                <input type="text" value="<?php echo $full_member_application->title; ?>" name="title" class="textInput">
            </p>
            <p>
                <label>内容：</label>
                <textarea class="editor" tools="mini" name="content" rows="12" style="width: 600px;"><?php echo $full_member_application->content; ?></textarea>
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
