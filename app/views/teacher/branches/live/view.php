<div class="pageContent">
    <div class="pageFormContent" layoutH="24">
        <div style="position: relative; padding: 10px;">
            <label>主题：</label><?php echo $live->title; ?>
        </div>
        <div style="position: relative; padding: 10px;">
            <label>时间：</label><?php echo $live->time; ?>
        </div>
        <div style="position: relative; padding: 10px;">
            <label>内容：</label>
            <textarea class="editor" tools="About,Fullscreen" name="content" rows="12" style="width: 600px;"><?php echo $live->content; ?></textarea>
        </div>
    </div>
</div>
