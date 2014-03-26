
<div class="pageContent">
	<form method="post" action="branches/payment/edit.html?id=<?php echo $payment->member_id; ?>" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">
		<div class="pageFormContent" layoutH="56">
			<p>
				<label>姓名：</label>
				<input type="text" value="<?php echo $payment->student_name; ?>" name="name" readonly="readonly" class="textInput">
			</p>
            <p>
                <label>党费已交付至：</label>
                <input type="text" value="<?php echo $payment->paid_time; ?>" name="paid_time" class="date" readonly="true"/>
                <a class="inputDateButton" href="javascript:;">选择</a>
                <span class="info"></span>
            </p>
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
