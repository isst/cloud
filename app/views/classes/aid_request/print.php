<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>浙江大学软件学院学生“三助”工作申请表</title>
		<style type="text/css">
			body{font-size:12px;font-family:Arial, Helvetica, sans-serif;margin:0;padding:0;background:url(../images/bg.jpg);color:#666; }
			form,li,p,ul,h3,h2,span,dl,dt,dd,ol{margin:0;padding:0;border:none;}
			input,select{line-height:16px;font-size:13px;margin:0;padding:0;}
			textarea{line-height:16px;font-size:12px;}
			img{border:none;display:block;}
			li{list-style-type:none;}
			.auto{margin:0 auto;}

			.warp_title{width:860px;height:50px;line-height:50px;font-size:20px;font-weight:bold;color:#000;text-align:center;}
			.warp{width:860px;}
			.warp_border{width:860px;border:1px solid #000;border-top:none;float:left;}
			.list_one{width:860px;float:left;border-top:1px solid #000;}
			.list_one_01{width:90px;text-align:center;border-right:1px solid #000;font-size:14px;float:left;padding:10px 5px;}
			.list_one_02{width:140px;text-align:center;border-right:1px solid #000;font-size:14px;float:left;padding:10px 5px;}
			.list_one_03{width:245px;float:left;text-align:center;font-size:14px;float:left;padding:10px 0;}

			.list_one_04{width:241px;text-align:center;border-right:1px solid #000;font-size:14px;float:left;padding:10px 5px;}
			.list_one_05{width:395px;text-align:center;font-size:14px;float:left;padding:10px 0;}

			.list_one_06{width:140px;text-align:center;border-right:1px solid #000;font-size:14px;float:left;padding:10px 5px;}
			.list_one_07{width:195px;float:left;text-align:center;font-size:14px;float:left;padding:10px 5px;}
			.list_one_08{width:749px;float:left;font-size:14px;float:left;padding:10px 5px;}
			.list_one_09{width:850px;float:left;font-size:14px;float:left;text-align:center;font-weight:bold;padding:10px 5px;}
			.list_one_10{width:96px;text-align:center;border-right:1px solid #000;font-size:14px;float:left;padding:10px 5px;}
			.list_one_11{width:97px;text-align:center;font-size:14px;float:left;padding:10px 5px;}
			.list_one_12{width:850px;float:left;font-size:14px;float:left;padding:10px 5px;line-height:20px;}
			.beiz{width:850px;float:left;padding:10px 5px;font-size:14px;color:#000;}
		</style>
	</head>
	<body>
		<div class="warp_title auto">浙江大学软件学院学生“三助”工作申请表</div>
		<div class="warp auto">
			<div class="warp_border">
				<dl class="list_one">
					<dd class="list_one_01">姓名</dd>
					<dd class="list_one_02"><?php echo $aid_request->student_name; ?></dd>
					<dd class="list_one_01">性别</dd>
					<dd class="list_one_02"><?php echo $student->sexual; ?></dd>
					<dd class="list_one_01">学号</dd>
					<dd class="list_one_03"><?php echo $student->student_num; ?></dd>
				</dl>
				<dl class="list_one">
					<dd class="list_one_04">所在系/专业班级</dd>
					<dd class="list_one_04"><?php echo $aid_request->class_name; ?></dd>
					<dd class="list_one_01">寝室及电话</dd>
					<dd class="list_one_03"><?php echo $aid_request->bedroom_tel; ?></dd>
				</dl>
				<dl class="list_one">
					<dd class="list_one_01">手机</dd>
					<dd class="list_one_04"><?php echo $aid_request->cellphone; ?></dd>
					<dd class="list_one_01">E-mail</dd>
					<dd class="list_one_05"><?php echo $student->email; ?></dd>
				</dl>
				<dl class="list_one">
					<dd class="list_one_01">助学金额度</dd>
					<dd class="list_one_02"><?php echo $aid_request->stipend; ?></dd>
					<dd class="list_one_01">奖学金额度</dd>
					<dd class="list_one_02"><?php echo $aid_request->scholarship; ?></dd>
					<dd class="list_one_06">国家助学贷款额度</dd>
					<dd class="list_one_07"><?php echo $aid_request->student_loan; ?></dd>
				</dl>
				<dl class="list_one">
					<dd class="list_one_01">有何特长（专业技能）</dd>
					<dd class="list_one_08"><?php echo $aid_request->strong_point; ?></dd>
				</dl>
				<dl class="list_one">
					<dd class="list_one_09">可参加勤工助学的时间（在空格内打勾）</dd>
				</dl>
				<dl class="list_one">
					<dd class="list_one_10">&nbsp;</dd>
					<dd class="list_one_10">周一</dd>
					<dd class="list_one_10">周二</dd>
					<dd class="list_one_10">周三</dd>
					<dd class="list_one_10">周四</dd>
					<dd class="list_one_10">周五</dd>
					<dd class="list_one_10">周六</dd>
					<dd class="list_one_11">周日</dd>
				</dl>
				<dl class="list_one">
					<dd class="list_one_10">上午</dd>
					<dd class="list_one_10">&nbsp;</dd>
					<dd class="list_one_10">&nbsp;</dd>
					<dd class="list_one_10">&nbsp;</dd>
					<dd class="list_one_10">&nbsp;</dd>
					<dd class="list_one_10">&nbsp;</dd>
					<dd class="list_one_10">&nbsp;</dd>
					<dd class="list_one_11">&nbsp;</dd>
				</dl>
				<dl class="list_one">
					<dd class="list_one_10">下午</dd>
					<dd class="list_one_10">&nbsp;</dd>
					<dd class="list_one_10">&nbsp;</dd>
					<dd class="list_one_10">&nbsp;</dd>
					<dd class="list_one_10">&nbsp;</dd>
					<dd class="list_one_10">&nbsp;</dd>
					<dd class="list_one_10">&nbsp;</dd>
					<dd class="list_one_11">&nbsp;</dd>
				</dl>
				<dl class="list_one">
					<dd class="list_one_10">晚上</dd>
					<dd class="list_one_10">&nbsp;</dd>
					<dd class="list_one_10">&nbsp;</dd>
					<dd class="list_one_10">&nbsp;</dd>
					<dd class="list_one_10">&nbsp;</dd>
					<dd class="list_one_10">&nbsp;</dd>
					<dd class="list_one_10">&nbsp;</dd>
					<dd class="list_one_11">&nbsp;</dd>
				</dl>
				<dl class="list_one">
					<dd class="list_one_12"><strong>家庭情况说明：(可附件)</strong><br /><?php echo $aid_request->family_info; ?></dd>
				</dl>
				<dl class="list_one">
					<dd class="list_one_12"><strong>德育导师意见：</strong><br /><br /><br /><br /></dd>
				</dl>
				<dl class="list_one">
					<dd class="list_one_12"><strong>学生应聘意见：（请写明应聘岗位，每人仅限两个岗位）</strong><br /></dd>
				</dl>
				<dl class="list_one">
					<dd class="list_one_04">填表日期</dd>
					<dd class="list_one_04">&nbsp;</dd>
					<dd class="list_one_01">编号</dd>
					<dd class="list_one_03">&nbsp;</dd>
				</dl>
			</div>
			<div class="beiz">备注：每个学生仅限申请两个岗位</div>
		</div>
	</body>
</html>
