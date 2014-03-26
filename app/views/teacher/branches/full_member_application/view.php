<div class="pageContent">
    <div class="pageFormContent" layoutH="24">
		<p>
			<label>学生姓名：</label><?php echo $full_member_application->student_name; ?>
		</p>
        <p>
            <label>标题：</label><?php echo $full_member_application->title; ?>
        </p>
        <p>
            <label>内容：</label>
            <textarea class="editor" tools="About,Fullscreen" name="content" rows="12" style="width: 600px;"><?php echo $full_member_application->content; ?></textarea>
        </p>
    </div>
</div>
