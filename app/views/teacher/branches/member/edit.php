<div class="pageContent">
	<form method="post" action="branches/member/edit.html?id=<?php echo $member->student_id; ?>" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">
		<div class="pageFormContent" layoutH="60">
			<p>
				<label>姓名：</label><?php echo $member->student_name; ?>
			</p>
			<p>
				<label>性别：</label><?php echo $member->student_sexual; ?>
			</p>
			<p>
				<label>状态：</label>
				<select name="status">
					<option value="0<?php if (0 == $member->member_status): ?>" selected="selected<?php endif; ?>">积极分子</option>
					<option value="1<?php if (1 == $member->member_status): ?>" selected="selected<?php endif; ?>">确定转预备党员</option>
					<option value="2<?php if (2 == $member->member_status): ?>" selected="selected<?php endif; ?>">预备党员</option>
					<option value="3<?php if (3 == $member->member_status): ?>" selected="selected<?php endif; ?>">确定转正式党员</option>
					<option value="4<?php if (4 == $member->member_status): ?>" selected="selected<?php endif; ?>">正式党员</option>
				</select>
			</p>
			<p>
				<label>支部头衔：</label>
				<select name="branch_title">
					<option value="0<?php if (0 == $member->branch_title): ?>" selected="selected<?php endif; ?>">无头衔</option>
					<option value="1<?php if (1 == $member->branch_title): ?>" selected="selected<?php endif; ?>">支部书记</option>
					<option value="2<?php if (2 == $member->branch_title): ?>" selected="selected<?php endif; ?>">支部宣传委员</option>
					<option value="3<?php if (3 == $member->branch_title): ?>" selected="selected<?php endif; ?>">组织委员</option>
				</select>
			</p>
			<div style="clear: both; display:block; overflow:auto; line-height:21px; margin: 0 auto; padding:0 10px;">
				<div style="margin: 10px 0;">
					<label>党校学习情况：</label>
				</div>
				<textarea  name="party_study" rows="12" style="width: 645px;height: 150px;"><?php echo $member->party_study; ?></textarea>
			</div>
			<div style="display:block; overflow:auto; line-height:21px; margin: 0 auto; padding:0 10px;">
				<div style="margin: 10px 0;">
					<label>党员的家庭情况：</label>
				</div>
				<textarea  name="family" rows="12" style="width: 645px;height: 150px;"><?php echo $member->family; ?></textarea>
			</div>
		</div>
		<div class="formBar">
			<ul>
				<!--<li><a class="buttonActive" href="javascript:;"><span>保存</span></a></li>-->
				<li><div class="buttonActive"><div class="buttonContent"><button type="submit">保存</button></div></div></li>
				<li>
					<div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div>
				</li>
			</ul>
		</div>
	</form>
</div>
