<div class="pageContent" layoutH="24">
    <div class="pageFormContent">
		<div style="padding: 10px;">
			<table width="100%">
				<tbody>
					<tr style="height: 30px;">
						<td>
							姓名：
							<?php echo $student->name; ?>
						</td>
						<td>
							学号：
							<?php echo $student->student_num; ?>
						</td>
						<td colspan="2">
							月份：
							<?php echo $aid_report->month; ?>月
						</td>
					</tr>
					<tr style="height: 30px;">
						<td>日期</td>
						<td>
							工作内容
						</td>
						<td>工作时间</td>
						<td>
						</td>
					</tr>
					<?php foreach ($aid_report->content as $row): ?>
						<tr style="height: 30px;" class="jobs">
							<td>
								<?php echo $row['date']; ?>
							</td>
							<td>
								<?php echo $row['job']; ?>
							</td>
							<td>
								<?php echo $row['time']; ?>
							</td>
							<td>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
    </div>
</div>
