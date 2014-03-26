<div class="pageContent" layoutH="24">
    <div class="pageFormContent">
        <p>
            <label>项目标题：</label><?php echo $hardship_item->title; ?>
        </p>
        <p>
            <label>开放申请：</label><?php echo $hardship_item->enabled ? '√' : '×'; ?>
        </p>
    </div>
    <div style="padding: 10px 10px;">
		<label>项目介绍：</label>
		<div class="editMode" style="padding: 10px 2em;">
			<?php echo nl2br($hardship_item->content); ?>
		</div>
    </div>
</div>
