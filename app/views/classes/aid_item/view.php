<div class="pageContent" layoutH="24">
    <div class="pageFormContent">
        <p>
            <label>项目标题：</label><?php echo $aid_item->title; ?>
        </p>
        <p>
            <label>项目类型：</label><?php echo $aid_type_names[$aid_item->type]; ?>
        </p>
		<p>
            <label>项目金额：</label><?php echo $aid_item->money ; ?>.
        </p>
        <p>
            <label>用人单位：</label><?php echo $aid_item->unit_name; ?>
        </p>
        <p>
            <label>开放申请：</label><?php echo $aid_item->enabled ? '√' : '×'; ?>
        </p>
    </div>
    <div style="padding: 10px 10px;">
		<label>项目介绍：</label>
		<div class="editMode" style="padding: 10px 2em;">
			<?php echo nl2br($aid_item->content); ?>
		</div>
    </div>
</div>
