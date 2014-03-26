
<div class="pageContent">
	<form method="post" action="classes/aid_report/edit.html?id=<?php echo $aid_report->id; ?>" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">
		<div class="pageFormContent" layoutH="56">
			<p>
				<label>项目标题：</label>
				<input name="title" class="required textInput" type="text" size="30" value="<?php echo $aid_report->title; ?>" alt="请输入项目标题"/>
			</p>
			<p>
				<label>申请时间：</label>
				<input name="report_time" class="required textInput" type="text" size="30" value="<?php echo $aid_report->report_time; ?>"/>
			</p>
			<p>
				<label>项目介绍：</label>
				<textarea class="editor" tools="simple" name="content" rows="20" style="width: 645px ;height: 390px;"><?php echo $aid_report->content; ?></textarea>
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
