<div class="pageContent">
    <form method="post" action="branches/activity/review.html?id=<?php echo $activity->id; ?>" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">
        <div class="pageFormContent" layoutH="56">
            <div>
				<label>
					<input type="radio" name="status" value="2" onclick="$('#approval_amount').show(); $('#refuse_reason').hide();">通过
				</label>
				<label>
					<input type="radio" name="status" value="1" onclick="$('#refuse_reason').show(); $('#approval_amount').hide();">拒绝
				</label>
            </div>
            <div id="approval_amount" style="display: none;">
                <label>审批金额：</label><br /><br />
				<input type="text" value="" name="approval_amount" class="textInput">
            </div>
            <div id="refuse_reason" style="display: none;">
                <label>理由：</label><br /><br />
                <textarea name="refuse_reason" rows="5" style="width: 98%;"></textarea>
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
