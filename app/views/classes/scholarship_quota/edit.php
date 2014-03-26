
<div class="pageContent">
	<form method="post" action="classes/scholarship_quota/edit.html?id=<?php echo $scholarship_quota->id; ?>" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">
		<div layoutH="56" style="padding: 10px;">
			<table width="100%">
				<thead>
					<tr style="height: 30px;">
						<th style="font-weight: bold;" width="120">
							奖项
						</th>
						<th style="font-weight: bold;">
							名额
						</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($scholarship_items as $item): ?>
						<tr style="height: 30px;">
							<td><?php echo $item->title; ?>：</td>
							<td>
								<input type="text" name="quotas[<?php echo $item->id; ?>]" value="<?php isset($quotas[$item->id]) and print $quotas[$item->id]; ?>" />
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
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
