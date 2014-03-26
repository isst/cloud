
<div class="pageContent">
	<form method="post" action="classes/scholarship_request/export.html" target="_blank" class="pageForm required-validate">
		<div layoutH="56">
			<p style="text-align: center; margin: 20px;">
				请选择学年:
				<select name="year">
					<?php for ($i = (int) date('Y'); $i > 2010; $i--): ?>
						<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
					<?php endfor; ?>
				</select>
			</p>
		</div>
		<div class="formBar">
			<ul>
				<li><div class="buttonActive"><div class="buttonContent"><button type="submit">导出</button></div></div></li>
				<li>
					<div class="button"><div class="buttonContent"><button type="button" class="close">关闭</button></div></div>
				</li>
			</ul>
		</div>
	</form>
</div>
