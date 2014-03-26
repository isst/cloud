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
							<?php echo $aid_request->item_title; ?>
						</th>
					</tr>
					<tr style="height: 30px;">
						<th style="font-weight: bold;">
							申请时间：
						</th>
						<th style="font-weight: bold;">
							<?php echo $aid_request->request_time; ?>
						</th>
						<th style="font-weight: bold;">
							审批状态：
						</th>
						<th style="font-weight: bold;">
							<?php echo $require_status_names[$aid_request->status]; ?>
						</th>
					</tr>
				</thead>
				<tbody>
					<tr style="height: 30px;">
						<td>姓名：</td>
						<td>
							<?php echo $aid_request->student_name; ?>
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
						<td>所在系/专业班级：</td>
						<td>
							<?php echo $aid_request->class_name; ?>
						</td>
					</tr>
					<tr style="height: 30px;">
						<td>寝室及电话：</td>
						<td>
							<?php echo $aid_request->bedroom_tel; ?>
						</td>
						<td>手机</td>
						<td>
							<?php echo $aid_request->cellphone; ?>
						</td>
					</tr>
					<tr style="height: 30px;">
						<td>E-mail：</td>
						<td>
							<?php echo $student->email; ?>
						</td>
						<td>助学金额度</td>
						<td>
							<?php echo $aid_request->stipend; ?>
						</td>
					</tr>
					<tr style="height: 30px;">
						<td>奖学金额度：</td>
						<td>
							<?php echo $aid_request->scholarship; ?>
						</td>
						<td>国家助学贷款额度</td>
						<td>
							<?php echo $aid_request->student_loan; ?>
						</td>
					</tr>
					<tr style="height: 30px;">
						<td>有何特长：</td>
						<td colspan="3">
							<?php echo $aid_request->strong_point; ?>
						</td>
					</tr>
					<tr style="height: 30px;">
						<td>家庭情况说明：</td>
						<td colspan="3">
							<?php echo $aid_request->family_info; ?>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
    </div>
</div>
