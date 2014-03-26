<script>
	var add_job = function(a) {
		var $table = $(a).parentsUntil('table').parent();
		var $jobs = $table.find('tr.jobs');
		$jobs.last().clone().find('input').val('').end().insertAfter($jobs.last());
	};
	var del_job = function(a) {
		var $table = $(a).parentsUntil('table').parent();
		var $jobs = $table.find('tr.jobs');
		if ($jobs.size() > 1) {
			$jobs.last().remove();
		} else {
			alert('请至少保留一条记录');
		}
	};
</script>
<div class="pageContent">
	<form method="post" action="classes/aid_report/add.html" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">
		<div layoutH="56" style="padding: 10px;">
			<table width="100%">
				<tbody>
					<tr style="height: 30px;">
						<td>
							姓名：
							<?php echo $user->name; ?>
						</td>
						<td>
							学号：
							<?php echo $user->student_num; ?>
						</td>
						<td colspan="2">
							月份：
							<select name="month">
								<?php for ($m = 1; $m <= 12; $m++): ?>
									<option value="<?php echo $m; ?>"><?php echo $m; ?></option>
								<?php endfor; ?>
							</select>月
						</td>
					</tr>
					<tr style="height: 30px;">
						<td>日期</td>
						<td>
							工作内容
						</td>
						<td>工作时间</td>
						<td>
							<a class="button" href="javascript:;" onclick="add_job(this);"><span>+ 增加</span></a>
							<a class="button" href="javascript:;" onclick="del_job(this);"><span>- 减少</span></a>
						</td>
					</tr>
					<tr style="height: 30px;" class="jobs">
						<td>
							<input type="text" name="date[]" value="" />
						</td>
						<td>
							<input type="text" name="job[]" value="" />
						</td>
						<td>
							<input type="text" name="time[]" value="" />
						</td>
						<td>
						</td>
					</tr>
					<tr style="height: 30px;" class="jobs">
						<td>
							<input type="text" name="date[]" value="" />
						</td>
						<td>
							<input type="text" name="job[]" value="" />
						</td>
						<td>
							<input type="text" name="time[]" value="" />
						</td>
						<td>
						</td>
					</tr>
					<tr style="height: 30px;" class="jobs">
						<td>
							<input type="text" name="date[]" value="" />
						</td>
						<td>
							<input type="text" name="job[]" value="" />
						</td>
						<td>
							<input type="text" name="time[]" value="" />
						</td>
						<td>
						</td>
					</tr>
					<tr style="height: 30px;" class="jobs">
						<td>
							<input type="text" name="date[]" value="" />
						</td>
						<td>
							<input type="text" name="job[]" value="" />
						</td>
						<td>
							<input type="text" name="time[]" value="" />
						</td>
						<td>
						</td>
					</tr>
					<tr style="height: 30px;" class="jobs">
						<td>
							<input type="text" name="date[]" value="" />
						</td>
						<td>
							<input type="text" name="job[]" value="" />
						</td>
						<td>
							<input type="text" name="time[]" value="" />
						</td>
						<td>
						</td>
					</tr>
				</tbody>
			</table>
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
