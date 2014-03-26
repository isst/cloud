<div class="pageContent">
    <div class="pageFormContent" layoutH="24">
        <div style="position: relative; padding: 10px;">
            <label>标题：</label><?php echo $reward->title; ?>
        </div>
        <div style="position: relative; padding: 10px;">
            <label>学生姓名：</label><?php echo $reward->student_name; ?>
        </div>
        <div style="position: relative; padding: 10px;">
            <label>时间：</label><?php echo $reward->time; ?>
        </div>
        <div style="position: relative; padding: 10px;">
            <label>内容：</label>
            <textarea class="editor" tools="About,Fullscreen" name="content" rows="12" style="width: 580px;"><?php echo $reward->content; ?></textarea>
        </div>
    </div>
</div>
