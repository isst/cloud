<div class="pageContent">
    <div class="pageFormContent" layoutH="24">
        <p>
            <label>标题：</label><?php echo $penalty->title; ?>
        </p>
        <p>
            <label>内容：</label>
            <textarea class="editor" tools="About,Fullscreen" name="content" rows="12" style="width: 600px;"><?php echo $penalty->content; ?></textarea>
        </p>
    </div>
</div>
