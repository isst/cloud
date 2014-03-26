
<div class="pageContent">
    <form method="post" action="branches/full_material/add.html?class_id=<?php echo $class_id; ?>" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">
        <div class="pageFormContent" layoutH="56">
			<p>
				<label>姓名：</label>
				<select name="student_id">
					<?php foreach ($members as $member): ?>
						<option value="<?php echo $member->id; ?>"><?php echo $member->name; ?></option>
					<?php endforeach; ?>
				</select>
			</p>
			<div style="float: left; clear: left; width: 150px;">
				<input type="checkbox" name="thinking_report" value="1" />思想汇报
			</div>
			<div style="float: left; width: 150px;">
				<input type="checkbox" name="application" value="1" />转正申请
			</div>
			<div style="float: left; width: 150px;">
				<input type="checkbox" name="completion_certificate" value="1" />预备党员党校结业证复印件
			</div>
			<div style="float: left; width: 150px;">
				<input type="checkbox" name="ideal" value="1" />入党志愿书
			</div>
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
