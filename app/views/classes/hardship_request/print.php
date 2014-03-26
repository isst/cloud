<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>浙江大学研究生困难补助申请表</title>
		<style type="text/css">
			body{font-size:14px;font-family:Arial, Helvetica, sans-serif;margin:0;padding:0;color:#000; }
			form,li,p,ul,h3,h2,span,dl,dt,dd,ol{margin:0;padding:0;border:none;}
			input,select{line-height:16px;font-size:13px;margin:0;padding:0;}
			textarea{line-height:16px;font-size:12px;}
			img{border:none;display:block;}
			li{list-style-type:none;}
			.auto{margin:0 auto;}
		</style>
	</head>
	<body>
		<table width="860" border="0" align="center" cellpadding="0" cellspacing="0">
			<tr>
				<td height="50" style="font-size:20px;font-weight:bold;text-align:center;">浙江大学研究生困难补助申请表</td>
			</tr>
		</table>

		<table width="860" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#000000">
			<tr>
				<td width="153" bgcolor="#FFFFFF" style="padding:10px 5px;"><strong>姓名：</strong><?php echo $hardship_request->student_name; ?></td>
				<td width="169" bgcolor="#FFFFFF" style="padding:10px 5px;"><strong>性别：</strong><?php echo $student->sexual; ?></td>
				<td width="197" bgcolor="#FFFFFF" style="padding:10px 5px;"><strong>学号：</strong><?php echo $student->student_num; ?></td>
				<td width="347" bgcolor="#FFFFFF" style="padding:10px 5px;"><strong>所学专业：</strong><?php echo $hardship_request->major; ?></td>
			</tr>
			<tr>
				<td colspan="2" bgcolor="#FFFFFF" style="padding:10px 5px;line-height:20px;">所在学院：<?php echo $hardship_request->college; ?></td>
				<td bgcolor="#FFFFFF" style="padding:10px 5px;">德育导师姓名：<?php echo $class->class_adviser_name; ?></td>
				<td bgcolor="#FFFFFF" style="padding:10px 5px;">本人联系方式：（电话 ：  Email）<?php echo $hardship_request->contact; ?></td>
			</tr>
			<tr>
				<td colspan="2" bgcolor="#FFFFFF" style="padding:10px 5px;">政治面貌：<?php echo $hardship_request->politics_status; ?></td>
				<td bgcolor="#FFFFFF" style="padding:10px 5px;">入学年月：<?php echo $hardship_request->enrollment_date; ?></td>
				<td bgcolor="#FFFFFF" style="padding:10px 5px;">家庭住址：<?php echo $hardship_request->home_addr; ?></td>
			</tr>
			<tr>
				<td colspan="4" bgcolor="#FFFFFF" style="padding:10px 5px;"><table width="860" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td height="35"><strong>申请理由：</strong>（可加附页说明）</td>
						</tr>
						<tr>
							<td style="font-size:12px;float:left;line-height:20px;color:#333;"><?php echo $hardship_request->reason; ?></td>
						</tr>
						<tr>
							<td><p style="width:300px;float:left;height:30px;line-height:30px;padding-left:550px;">申请人（签名）：</p>
								<p style="width:200px;float:left;height:30px;line-height:30px;padding-left:650px;">年　　　　月　　　日</p></td>
						</tr>
					</table></td>
			</tr>
			<tr>
				<td colspan="4" bgcolor="#FFFFFF" style="padding:10px 5px;"><p style="width:850px;font-weight:bold;float:left;line-height:22px;">申请补助金额：</p>
					<p style="width:200px;float:left;height:30px;line-height:30px;padding-left:650px;text-align:right;"><?php echo $hardship_request->amount_apply; ?> 元</p></td>
			</tr>
			<tr>
				<td colspan="4" bgcolor="#FFFFFF" style="padding:10px 5px;"><p style="width:850px;font-weight:bold;float:left;line-height:22px;">导师意见：</p>
					<p style="width:250px;float:left;height:30px;line-height:30px;padding-left:600px;">签名:</p>
					<p style="width:200px;float:left;height:30px;line-height:30px;padding-left:650px;">年　　　　月　　　日</p></td>
			</tr>
			<tr>
				<td colspan="4" bgcolor="#FFFFFF" style="padding:10px 5px;"><p style="width:850px;float:left;line-height:22px;">所在学院研究生科意见：（需注明补助由学院或研工部支付金额）</p>
					<p style="width:850px;float:left;height:30px;line-height:30px;">金额 <?php echo $hardship_request->amount_grant; ?> 元</p>
					<p style="width:250px;float:left;height:30px;line-height:30px;padding-left:600px;">负责人签名：</p>
					<p style="width:200px;float:left;height:30px;line-height:30px;padding-left:650px;">年　　　　月　　　日</p></td>
			</tr>
			<tr>
				<td colspan="4" bgcolor="#FFFFFF" style="padding:10px 5px;"><p style="width:850px;float:left;line-height:22px;">所在学院分管领导意见：</p>
					<p style="width:250px;float:left;height:30px;line-height:30px;padding-left:600px;">签名：　　　　　　　(公章)</p>
					<p style="width:200px;float:left;height:30px;line-height:30px;padding-left:650px;">年　　　　月　　　日</p></td>
			</tr>
			<tr>
				<td colspan="3" bgcolor="#FFFFFF" style="padding:10px 5px;"><p style="width:500px;float:left;line-height:22px;">党委研究生工作部审核意见：</p>
					<p style="width:200px;float:left;padding-left:300px;">签名：　　　　（公章）</p>
					<p style="width:150px;float:left;padding-left:350px;padding-top:5px;">年　　　月　　　日</p></td>
				<td bgcolor="#FFFFFF" style="padding:10px 5px;"><p style="width:325px;float:left;line-height:22px;">最后审定补助金额：</p>
					<p style="width:275px;float:left;padding-left:50px;">___________元（需大写）</p>
					<p style="width:325px;float:left;padding-top:5px;">经费卡号码：</p></td>
			</tr>
		</table>
		<table width="860" border="0" align="center" cellpadding="0" cellspacing="0">
			<tr>
				<td style="padding:10px 0;line-height:25px;">备注：１.如申请的补助费由学院支付，则无需签署研工部意见，可由学院分管领导签署意见后，直接到计财处领取。
					<br />
					２.本表一式两份，一份交计财处领补助费之用，一份由学院或研工部留存。</td>
			</tr>
		</table>
	</body>
</html>
