
<div class="pageContent">
    <form method="post" action="branches/prepare_material/edit.html?id=<?php echo $prepare_material->material_id; ?>" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">
        <div class="pageFormContent" layoutH="56">
			<p>
				<label>学生姓名：</label>
				<select name="student_id">
					<?php foreach ($members as $member): ?>
						<option value="<?php echo $member->id;?><?php if ($member->id == $prepare_material->student_id): ?>" selected="selected<?php endif; ?>"><?php echo $member->name;?></option>
					<?php endforeach; ?>
				</select>
			</p>
			<div style="float: left; clear: left; width: 150px;">
				<input type="checkbox" name="membership_application" value="1<?php if($prepare_material->membership_application) :?>" checked="checked<?php endif;?>" />入党申请书
			</div>
			<div style="float: left; width: 150px;">
				<input type="checkbox" name="tuiyou_table" value="1<?php if($prepare_material->tuiyou_table) :?>" checked="checked<?php endif;?>" />团组织推优表
			</div>
			<div style="float: left; width: 150px;">
				<input type="checkbox" name="activist_inspection" value="1<?php if($prepare_material->activist_inspection) :?>" checked="checked<?php endif;?>" />积极分子考察表
			</div>
			<div style="float: left; width: 150px;">
				<input type="checkbox" name="thinking_report" value="1<?php if($prepare_material->thinking_report) :?>" checked="checked<?php endif;?>" />思想汇报
			</div>
			<div style="float: left; width: 150px;">
				<input type="checkbox" name="completion_certificate" value="1<?php if($prepare_material->completion_certificate) :?>" checked="checked<?php endif;?>" />党校结业证复印件
			</div>
			<div style="float: left; width: 150px;">
				<input type="checkbox" name="masses_discussion" value="1<?php if($prepare_material->masses_discussion) :?>" checked="checked<?php endif;?>" />群众座谈会议记录
			</div>
			<div style="float: left; width: 150px;">
				<input type="checkbox" name="politics_audit_letter" value="1<?php if($prepare_material->politics_audit_letter) :?>" checked="checked<?php endif;?>" />政审函调
			</div>
			<div style="float: left; width: 150px;">
				<input type="checkbox" name="politics_audit_complex" value="1<?php if($prepare_material->politics_audit_complex) :?>" checked="checked<?php endif;?>" />政审综合表
			</div>
			<div style="float: left; width: 150px;">
				<input type="checkbox" name="autobiography" value="1<?php if($prepare_material->autobiography) :?>" checked="checked<?php endif;?>" />自传
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
