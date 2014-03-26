<div class="pageContent" layoutH="24">
    <div class="pageFormContent">
		<div style="padding: 10px;">
			<table width="100%">
				<thead>
					<tr style="height: 30px;">
						<th style="font-weight: bold;">
							申请奖项：
						</th>
						<th style="font-weight: bold;" colspan="3">
							<?php echo $scholarship_request->item_title; ?>
						</th>
					</tr>
					<tr style="height: 30px;">
						<th style="font-weight: bold;">
							申请时间：
						</th>
						<th style="font-weight: bold;">
							<?php echo $scholarship_request->request_time; ?>
						</th>
						<th style="font-weight: bold;">
							审批状态：
						</th>
						<th style="font-weight: bold;">
							<?php echo $require_status_names[$scholarship_request->status]; ?>
						</th>
					</tr>
				</thead>
				<tbody>
					<tr style="height: 30px;">
						<td>姓名：</td>
						<td>
							<?php echo $scholarship_request->student_name; ?>
						</td>
						<td>学号：</td>
						<td>
							<?php echo $student->student_num; ?>
						</td>
					</tr>
					<tr style="height: 30px;">
						<td>专业班级：</td>
						<td>
							<?php echo $class->name; ?>
						</td>
						<td>性别：</td>
						<td>
							<?php echo $student->sexual; ?>
						</td>
					</tr>
					<tr style="height: 30px;">
						<td>政治面貌：</td>
						<td>
							<?php echo $scholarship_request->politics_status; ?>
						</td>
						<td>民族：</td>
						<td>
							<?php echo $student->nation; ?>
						</td>
					</tr>
					<tr style="height: 30px;">
						<td>担任社会工作情况：</td>
						<td colspan="3">
							<?php echo $scholarship_request->job_info; ?>
						</td>
					</tr>
					<tr style="height: 30px;">
						<td>参加科研情况：</td>
						<td colspan="3">
							<?php echo $scholarship_request->research_info; ?>
						</td>
					</tr>
					<tr style="height: 30px;">
						<td>所获奖励：</td>
						<td colspan="3">
							<?php echo $scholarship_request->awards; ?>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
    </div>
</div>
