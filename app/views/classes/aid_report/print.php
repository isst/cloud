<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>浙江大学软件学院学生“三助”工作考核表</title>
		<style type="text/css">
			body{font-size:14px;font-family:Arial, Helvetica, sans-serif;margin:0;padding:0;background:url(../images/bg.jpg);color:#666; }
			form,li,p,ul,h3,h2,span,dl,dt,dd,ol{margin:0;padding:0;border:none;}
			input,select{line-height:16px;font-size:13px;margin:0;padding:0;}
			textarea{line-height:16px;font-size:12px;}
			img{border:none;display:block;}
			li{list-style-type:none;}
			.auto{margin:0 auto;}
			table, td {border:1px solid #000;border-collapse:collapse;}
		</style>
	</head>

	<body>
		<div style="width:860px;margin:0 auto;">
			<div style="width:860px;font-size:20px;font-weight:bold;color:#000;height:50px;line-height:50px;text-align:center;">浙江大学软件学院学生“三助”工作考核表</div>
		</div>

		<table width="860" border="0" align="center" cellpadding="0" cellspacing="0">
			<tr>
				<td height="35" colspan="2" bgcolor="#FFFFFF" style="padding:0 5px;"><strong>姓名：</strong><?php echo $student->name; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>学号：</strong><?php echo $student->student_num; ?></td>
				<td colspan="2" align="center" bgcolor="#FFFFFF" style="padding:0 5px;"><?php echo $aid_report->month; ?> <strong>月份</strong></td>
			</tr>
			<tr>
				<td width="238" bgcolor="#FFFFFF" style="padding:10px 5px;text-align:center;font-weight:bold;">日期</td>
				<td width="231" bgcolor="#FFFFFF" style="padding:10px 5px;text-align:center;font-weight:bold;">工作内容</td>
				<td width="205" bgcolor="#FFFFFF" style="padding:10px 5px;text-align:center;font-weight:bold;">工作时间</td>
				<td width="183" bgcolor="#FFFFFF" style="padding:10px 5px;text-align:center;font-weight:bold;">&nbsp;</td>
			</tr>
			<?php foreach ($aid_report->content as $row): ?>
			<tr>
				<td bgcolor="#FFFFFF" style="padding:10px 5px;text-align:center;font-weight:bold;">
					<?php echo $row['date']; ?>&nbsp;
				</td>
				<td bgcolor="#FFFFFF" style="padding:10px 5px;text-align:center;font-weight:bold;">
					<?php echo $row['job']; ?>&nbsp;
				</td>
				<td bgcolor="#FFFFFF" style="padding:10px 5px;text-align:center;font-weight:bold;">
					<?php echo $row['time']; ?>&nbsp;
				</td>
				<td bgcolor="#FFFFFF" style="padding:10px 5px;text-align:center;font-weight:bold;">
					&nbsp;
				</td>
			</tr>
			<?php endforeach; ?>
			<tr>
				<td colspan="4" align="left" bgcolor="#FFFFFF" style="padding:10px 5px;">
					<p style="font-size:14px;font-weight:bold;color:#000;width:850px;padding-bottom:10px;">部门考核意见：</p>
					<p style="font-size:14px;color:#333;line-height:20px;width:850px;">
						<br />
						<br />
						<br />
					</p>
				</td>
			</tr>
		</table>
	</body>
</html>
