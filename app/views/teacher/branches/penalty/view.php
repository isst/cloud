<div class="pageContent">
    <div class="pageFormContent" layoutH="24">
        <div style="position: relative; padding: 10px;">
            <label>标题：</label><?php echo $penalty->title; ?>
        </div>
        <div style="position: relative; padding: 10px;">
            <label>学生姓名：</label><?php echo $penalty->student_name; ?>
        </div>
        <div style="position: relative; padding: 10px;">
            <label>公告时间：</label><?php echo $penalty->time; ?>
        </div>
        <div style="position: relative; padding: 10px;">
            <label>内容：</label>
            <textarea class="editor" tools="About,Fullscreen" name="content" rows="12" style="width: 580px;"><?php echo $penalty->content; ?></textarea>
        </div>
    </div>
</div>
