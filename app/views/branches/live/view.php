<div class="pageContent">
    <div class="pageFormContent" layoutH="24">
		<table>
			<tbody>
				<tr style="height: 30px;">
					<td>主题：</td>
					<td>
						<?php echo $live->title; ?>
					</td>
					<td></td>
					<td>
					</td>
				</tr>
				<tr style="height: 30px;">
					<td>时间：</td>
					<td>
						<?php echo $live->date; ?>
					</td>
					<td>地点：</td>
					<td>
						<?php echo $live->place; ?>
					</td>
				</tr>
				<tr style="height: 30px;">
					<td colspan="4">
						参会人员：
					</td>
				</tr>
				<tr style="height: 30px;">
					<td colspan="4">
						<?php foreach ($students as $the): ?>
							<div style="float: left; width: 80px;">
								<input type="checkbox" name="peoples[]" value="<?php echo $the->id; ?><?php if (in_array($the->id, $live->peoples)): ?>" checked="checked<?php endif; ?>" disabled="disabled" /><?php echo $the->name; ?>
							</div>
						<?php endforeach; ?>
					</td>
				</tr>
				<tr style="height: 30px;">
					<td colspan="4">
						会议纪要：
					</td>
				</tr>
				<tr style="height: 30px;">
					<td colspan="4">
						<?php echo nl2br($live->content); ?>
					</td>
				</tr>
			</tbody>
		</table>
    </div>
</div>
