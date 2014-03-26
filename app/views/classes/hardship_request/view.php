<div class="pageContent" layoutH="24">
    <div class="pageFormContent">
		<div style="padding: 10px;">
			<table width="100%">
				<thead>
					<tr style="height: 30px;">
						<th style="font-weight: bold;">
							项目名称：
						</th>
						<th style="font-weight: bold;" colspan="3">
							<?php echo $hardship_request->item_title; ?>
						</th>
					</tr>
					<tr style="height: 30px;">
						<th style="font-weight: bold;">
							申请时间：
						</th>
						<th style="font-weight: bold;">
							<?php echo $hardship_request->request_time; ?>
						</th>
						<th style="font-weight: bold;">
							审批状态：
						</th>
						<th style="font-weight: bold;">
							<?php echo $require_status_names[$hardship_request->status]; ?>
						</th>
					</tr>
				</thead>
				<tbody>
					<tr style="height: 30px;">
						<td>姓名：</td>
						<td>
							<?php echo $hardship_request->student_name; ?>
						</td>
						<td>性别：</td>
						<td>
							<?php echo $student->sexual; ?>
						</td>
					</tr>
					<tr style="height: 30px;">
						<td>学号：</td>
						<td>
							<?php echo $student->student_num; ?>
						</td>
						<td>所学专业：</td>
						<td>
							<?php echo $hardship_request->major; ?>
						</td>
					</tr>
					<tr style="height: 30px;">
						<td>所在学院：</td>
						<td>
							<?php echo $hardship_request->college; ?>
						</td>
						<td>德育导师姓名</td>
						<td>
							<?php echo $class->class_adviser_name; ?>
						</td>
					</tr>
					<tr style="height: 30px;">
						<td>本人联系方式：</td>
						<td>
							<?php echo $hardship_request->contact; ?>
						</td>
						<td>政治面貌：</td>
						<td>
							<?php echo $hardship_request->politics_status; ?>
						</td>
					</tr>
					<tr style="height: 30px;">
						<td>入学年月：</td>
						<td>
							<?php echo $hardship_request->enrollment_date; ?>
						</td>
						<td>家庭住址：</td>
						<td>
							<?php echo $hardship_request->home_addr; ?>
						</td>
					</tr>
					<tr style="height: 30px;">
						<td>申请理由：</td>
						<td colspan="3">
							<?php echo $hardship_request->reason; ?>
						</td>
					</tr>
					<tr style="height: 30px;">
						<td>申请补助金额：</td>
						<td>
							<?php echo $hardship_request->amount_apply; ?> 元
						</td>
						<td>
							<?php if (4 == $hardship_request->status): ?>
								审批金额：
							<?php endif; ?>
						</td>
						<td>
							<?php if (4 == $hardship_request->status): ?>
								<?php echo $hardship_request->amount_grant; ?> 元
							<?php endif; ?>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
    </div>
</div>
