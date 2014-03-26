
<div class="pageContent">
    <form method="post" action="branches/prepare_material/add.html?class_id=<?php echo $class_id; ?>" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">
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
				<input type="checkbox" name="membership_application" value="1" />入党申请书
			</div>
			<div style="float: left; width: 150px;">
				<input type="checkbox" name="tuiyou_table" value="1" />团组织推优表
			</div>
			<div style="float: left; width: 150px;">
				<input type="checkbox" name="activist_inspection" value="1" />积极分子考察表
			</div>
			<div style="float: left; width: 150px;">
				<input type="checkbox" name="thinking_report" value="1" />思想汇报
			</div>
			<div style="float: left; width: 150px;">
				<input type="checkbox" name="completion_certificate" value="1" />党校结业证复印件
			</div>
			<div style="float: left; width: 150px;">
				<input type="checkbox" name="masses_discussion" value="1" />群众座谈会议记录
			</div>
			<div style="float: left; width: 150px;">
				<input type="checkbox" name="politics_audit_letter" value="1" />政审函调
			</div>
			<div style="float: left; width: 150px;">
				<input type="checkbox" name="politics_audit_complex" value="1" />政审综合表
			</div>
			<div style="float: left; width: 150px;">
				<input type="checkbox" name="autobiography" value="1" />自传
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
