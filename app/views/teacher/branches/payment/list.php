<form id="pagerForm" method="post" action="branches/payment.html?class_id=<?php echo $branch->id; ?>">
	<input type="hidden" name="pageNum" value="<?php echo $pagination->cur; ?>" />
	<input type="hidden" name="numPerPage" value="<?php echo $pagination->per; ?>" />
</form>

<div class="pageContent">
	<div class="panelBar">
		<ul class="toolBar">
			<li><a class="edit" href="branches/payment/edit.html?id={payment}" target="dialog" width="645" height="400"  mask="true" warn="请选择一条记录"><span>修改</span></a></li>
			<li class="line">line</li>
			<li><a class="icon" href="branches/payment.html?class_id=<?php echo $branch->id; ?>" target="ajax" rel="branch_payment"><span>刷新</span></a></li>
		</ul>
	</div>

	<div id="w_list_print">
		<table class="list" width="100%" targetType="navTab" layoutH="104"><!-- layoutH="52" -->
			<thead>
				<tr>
                    <th width="40">ID</th>
					<th>姓名</th>
					<th>党费已交付至</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($payments as $payment): ?>
					<tr target="payment" rel="<?php echo $payment->member_id; ?>">
						<td><?php echo $payment->member_id; ?></td>
						<td>
							<a href="users/student/view.html?id=<?php echo $payment->student_id; ?>" rel="users/student/view.html?id=<?php echo $payment->id; ?>" target="navTab"><?php echo $payment->student_name; ?></a>
						</td>
						<td>
							<a href="branches/payment/edit.html?id=<?php echo $payment->member_id; ?>" target="dialog" width="645" height="400" mask="true"><?php echo $payment->paid_time; ?></a>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<div class="panelBar" >
		<div class="pages">
			<span>显示</span>
			<select name="numPerPage" onchange="navTabPageBreak({numPerPage:this.value},'branch_payment')">
				<option value="20">20</option>
				<option value="50">50</option>
				<option value="100">100</option>
				<option value="200">200</option>
			</select>
			<span>条，共<?php echo $pagination->total; ?>条</span>
		</div>

		<div class="pagination" rel="branch_payment" totalCount="<?php echo $pagination->total; ?>" numPerPage="<?php echo $pagination->per; ?>" pageNumShown="10" currentPage="<?php echo $pagination->cur; ?>"></div>

	</div>

</div>
