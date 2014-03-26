
<div class="pageContent">
	<form method="post" action="classes/hardship_request/review.html?id=<?php echo $id; ?>" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">
		<div layoutH="56">
			<p style="text-align: center; margin: 20px;">
				<input type="radio" name="status" value="1<?php if ($user_status_plus + 1 == $hardship_request->status): ?>" checked="checked<?php endif; ?>" onclick="$('#amount_grant').hide();" />不通过
				<input type="radio" name="status" value="2<?php if ($user_status_plus + 2 == $hardship_request->status): ?>" checked="checked<?php endif; ?>" onclick="$('#amount_grant').show();" />通过
			</p>
			<?php if ('administrator' == $user_type): ?>
				<p id="amount_grant" style="text-align: center; margin: 20px;<?php if ($user_status_plus + 2 != $hardship_request->status): ?> display: none;<?php endif; ?>">
					审批金额： <input type="text" name="amount_grant" value="<?php $hardship_request->amount_grant and print $hardship_request->amount_grant; ?>" /> 元 (填写数字)
				</p>
			<?php endif; ?>
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
