
<div class="pageContent">
	<form method="post" action="classes/aid_report/review.html?id=<?php echo $id; ?>" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">
		<div layoutH="56">
			<p style="text-align: center; margin: 20px;">
				<input type="radio" name="status" value="1" />不通过 <input type="radio" name="status" value="2" />通过
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
