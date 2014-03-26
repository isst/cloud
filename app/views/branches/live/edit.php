
<div class="pageContent">
	<form method="post" action="branches/live/edit.html?id=<?php echo $live->id; ?>" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">
		<div class="pageFormContent" layoutH="56">
			<table>
				<tbody>
					<tr style="height: 30px;">
						<td>主题：</td>
						<td>
							<input type="text" value="<?php echo $live->title; ?>" name="title" class="textInput">
						</td>
						<td></td>
						<td>
						</td>
					</tr>
					<tr style="height: 30px;">
						<td>时间：</td>
						<td>
							<input type="text" value="<?php echo $live->date; ?>" name="date" class="date" readonly="true"/>
							<a class="inputDateButton" href="javascript:;">选择</a>
						</td>
						<td>地点：</td>
						<td>
							<input type="text" value="<?php echo $live->place; ?>" name="place" class="textInput">
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
									<input type="checkbox" name="peoples[]" value="<?php echo $the->id; ?><?php if (in_array($the->id, $live->peoples)): ?>" checked="checked<?php endif; ?>" /><?php echo $the->name; ?>
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
							<textarea name="content" rows="10" cols="80" style="width: 600px;"><?php echo $live->content; ?></textarea>
						</td>
					</tr>
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
