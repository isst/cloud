<div class="pageContent">
    <div class="pageFormContent" layoutH="24">
        <div style="position: relative; padding: 10px;">
            <label>主题：</label><?php echo $memcon->title; ?>
        </div>
        <div style="position: relative; padding: 10px;">
            <label>学生姓名：</label><?php echo $memcon->student_name; ?>
        </div>
        <div style="position: relative; padding: 10px;">
            <label>谈话时间：</label><?php echo $memcon->time; ?>
        </div>
        <div style="position: relative; padding: 10px;">
            <label>内容：</label>
            <textarea class="editor" tools="About,Fullscreen" name="content" rows="12" style="width: 580px;"><?php echo $memcon->content; ?></textarea>
        </div>
    </div>
</div>
