<div class="pageContent">
    <div class="pageFormContent" layoutH="24">
        <p>
            <label>标题：</label><?php echo $announcement->title; ?>
        </p>
        <p>
            <label>公告时间：</label><?php echo $announcement->time; ?>
        </p>
        <p>
            <label>内容：</label>
            <textarea class="editor" tools="About,Fullscreen" name="content" rows="12" style="width: 600px;"><?php echo $announcement->content; ?></textarea>
        </p>
    </div>
</div>
