<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>浙江大学软件学院研究生奖学金申请表</title>
		<style type="text/css">
			body{font-size:12px;font-family:Arial, Helvetica, sans-serif;margin:0;padding:0;background:url(../images/bg.jpg);color:#000000; }
			form,li,p,ul,h3,h2,span,dl,dt,dd,ol{margin:0;padding:0;border:none;}
			input,select{line-height:16px;font-size:13px;margin:0;padding:0;}
			textarea{line-height:16px;font-size:12px;}
			img{border:none;display:block;}
			li{list-style-type:none;}
			.auto{margin:0 auto;}

			.warp_title{width:860px;height:50px;line-height:50px;float:left;font-size:20px;font-weight:bold;color:#000;text-align:center;}
			.warp{width:860px;}
			.warp_border{width:860px;border:1px solid #000;border-top:none;float:left;}
			.list_one{width:860px;float:left;border-top:1px solid #000;}
			.list_one_01{width:90px;text-align:center;border-right:1px solid #000;font-size:14px;float:left;padding:10px 5px;}
			.list_one_02{width:140px;text-align:center;border-right:1px solid #000;font-size:14px;float:left;padding:10px 5px;}
			.list_one_03{width:245px;float:left;text-align:center;font-size:14px;float:left;padding:10px 0;}

			.list_one_04{width:250px;text-align:center;border-left:1px solid #000;font-size:14px;float:left;padding:10px 5px;}
			.list_one_05{width:50px;text-align:center;font-size:14px;float:left;padding:10px 5px;border-left:1px solid #000;}
			.list_one_06{width:90px;text-align:center;border-left:1px solid #000;font-size:14px;float:left;padding:10px 5px;}
			.list_one_07{width:265px;float:left;text-align:center;font-size:14px;float:left;padding:10px 5px;border-left:1px solid #000;}

			.list_one_09{width:100px;text-align:center;border-right:1px solid #000;font-size:14px;float:left;padding:10px 5px;}
			.list_one_10{width:290px;text-align:center;border-right:1px solid #000;font-size:14px;float:left;padding:10px 5px;}
			.list_one_11{width:335px;text-align:center;font-size:14px;float:left;padding:10px 5px;}

			.list_one_12{width:90px;text-align:center;font-size:14px;float:left;line-height:22px;padding:10px 5px;border-right:1px solid #000000;}
			.list_one_13{width:748px;text-align:left;border-left:1px solid #000;font-size:14px;float:left;padding:10px 5px;margin-left:-1px;}

			.list_one_14{width:30px;text-align:center;font-size:14px;float:left;line-height:22px;padding:10px 5px;border-right:1px solid #000000;}
			.list_one_15{width:805px;text-align:left;border-left:1px solid #000;font-size:14px;float:left;padding:10px 5px;margin-left:-1px;}

			.beiz{width:850px;float:left;padding:10px 5px;font-size:14px;color:#000;}
		</style>
	</head>
	<body>
		<div style="width:860px;margin:0 auto;page-break-after:always;">
			<div class="warp_title">浙江大学软件学院研究生奖学金申请表</div>
			<div class="warp auto">
				<div class="warp_border">
					<dl class="list_one">
						<dd class="list_one_01">姓名</dd>
						<dd class="list_one_02"><?php echo $scholarship_request->student_name; ?></dd>
						<dd class="list_one_01">学号</dd>
						<dd class="list_one_02"><?php echo $student->student_num; ?></dd>
						<dd class="list_one_01">专业班级</dd>
						<dd class="list_one_03"><?php echo $class->name; ?></dd>
					</dl>

					<dl class="list_one">
						<dd class="list_one_01">性别</dd>
						<dd class="list_one_02"><?php echo $student->sexual; ?></dd>
						<dd class="list_one_01">政治面貌</dd>
						<dd class="list_one_02"><?php echo $scholarship_request->politics_status; ?></dd>
						<dd class="list_one_01">民族</dd>
						<dd class="list_one_03"><?php echo $student->nation; ?></dd>
					</dl>

					<dl class="list_one">
						<dd class="list_one_01">申报奖项</dd>
						<dd class="list_one_08"><?php echo $scholarship_request->item_title; ?></dd>
					</dl>

					<dl class="list_one">
						<table width="860" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td width="100" align="center" style="padding:10px 0;font-size:14px;">本<br />学<br />年<br />课<br />程<br />学<br />习<br />成<br />绩<br />(自填)</td>
								<td width="760" valign="top">
									<ul style="width:760px;float:left;">
										<li class="list_one_04"><strong>课程名称</strong></li>
										<li class="list_one_05"><strong>学分</strong></li>
										<li class="list_one_05"><strong>成绩</strong></li>
										<li class="list_one_06"><strong>课程性质</strong></li>
										<li class="list_one_07"><strong>学年学期</strong></li>
									</ul>
									<ul style="width:760px;float:left;border-top:1px solid #000;">
										<li class="list_one_04">&nbsp;</li>
										<li class="list_one_05">&nbsp;</li>
										<li class="list_one_05">&nbsp;</li>
										<li class="list_one_06">&nbsp;</li>
										<li class="list_one_07">&nbsp;</li>
									</ul>
									<ul style="width:760px;float:left;border-top:1px solid #000;">
										<li class="list_one_04">&nbsp;</li>
										<li class="list_one_05">&nbsp;</li>
										<li class="list_one_05">&nbsp;</li>
										<li class="list_one_06">&nbsp;</li>
										<li class="list_one_07">&nbsp;</li>
									</ul>
									<ul style="width:760px;float:left;border-top:1px solid #000;">
										<li class="list_one_04">&nbsp;</li>
										<li class="list_one_05">&nbsp;</li>
										<li class="list_one_05">&nbsp;</li>
										<li class="list_one_06">&nbsp;</li>
										<li class="list_one_07">&nbsp;</li>
									</ul>
									<ul style="width:760px;float:left;border-top:1px solid #000;">
										<li class="list_one_04">&nbsp;</li>
										<li class="list_one_05">&nbsp;</li>
										<li class="list_one_05">&nbsp;</li>
										<li class="list_one_06">&nbsp;</li>
										<li class="list_one_07">&nbsp;</li>
									</ul>
									<ul style="width:760px;float:left;border-top:1px solid #000;">
										<li class="list_one_04">&nbsp;</li>
										<li class="list_one_05">&nbsp;</li>
										<li class="list_one_05">&nbsp;</li>
										<li class="list_one_06">&nbsp;</li>
										<li class="list_one_07">&nbsp;</li>
									</ul>
									<ul style="width:760px;float:left;border-top:1px solid #000;">
										<li class="list_one_04">&nbsp;</li>
										<li class="list_one_05">&nbsp;</li>
										<li class="list_one_05">&nbsp;</li>
										<li class="list_one_06">&nbsp;</li>
										<li class="list_one_07">&nbsp;</li>
									</ul>
									<ul style="width:760px;float:left;border-top:1px solid #000;">
										<li class="list_one_04">&nbsp;</li>
										<li class="list_one_05">&nbsp;</li>
										<li class="list_one_05">&nbsp;</li>
										<li class="list_one_06">&nbsp;</li>
										<li class="list_one_07">&nbsp;</li>
									</ul>
									<ul style="width:760px;float:left;border-top:1px solid #000;">
										<li class="list_one_04">&nbsp;</li>
										<li class="list_one_05">&nbsp;</li>
										<li class="list_one_05">&nbsp;</li>
										<li class="list_one_06">&nbsp;</li>
										<li class="list_one_07">&nbsp;</li>
									</ul>
									<ul style="width:760px;float:left;border-top:1px solid #000;">
										<li class="list_one_04">&nbsp;</li>
										<li class="list_one_05">&nbsp;</li>
										<li class="list_one_05">&nbsp;</li>
										<li class="list_one_06">&nbsp;</li>
										<li class="list_one_07">&nbsp;</li>
									</ul>
									<ul style="width:760px;float:left;border-top:1px solid #000;">
										<li class="list_one_04">&nbsp;</li>
										<li class="list_one_05">&nbsp;</li>
										<li class="list_one_05">&nbsp;</li>
										<li class="list_one_06">&nbsp;</li>
										<li class="list_one_07">&nbsp;</li>
									</ul>
									<ul style="width:760px;float:left;border-top:1px solid #000;">
										<li class="list_one_04">学位课平均分 </li>
										<li class="list_one_05">&nbsp;</li>
										<li class="list_one_05">&nbsp;</li>
										<li class="list_one_06">&nbsp;</li>
										<li class="list_one_07">&nbsp;</li>
									</ul>
								</td>
							</tr>
						</table>
					</dl>

					<dl class="list_one">
						<dd class="list_one_09">外语等级 (自填)</dd>
						<dd class="list_one_01">&nbsp;</dd>
						<dd class="list_one_10">学习成绩班级排序（排名/班级人数）(自填)</dd>
						<dd class="list_one_11">&nbsp;</dd>
					</dl>

					<dl class="list_one">
						<dd class="list_one_12"><strong>担任社会工作情况（2010-2011学年参与社会工作情况简介）</strong></dd>
						<dd class="list_one_13"><strong>（简要介绍避免附页）</strong><?php echo $scholarship_request->job_info; ?></dd>
					</dl>
				</div>
			</div>
		</div>

		<div style="width:860px;margin:0 auto;page-break-after:always;">
			<div class="warp auto">
				<div class="warp_border">
					<dl class="list_one">
						<dd class="list_one_12"><strong>参加科研情况（2010-2011学年包括论文或成果名称发表时间发表单位第几作者证明人）与社会&nbsp;情况</strong></dd>
						<dd class="list_one_13"><strong>（简要介绍避免附页）</strong><?php echo $scholarship_request->research_info; ?></dd>
					</dl>
					<dl class="list_one">
						<dd class="list_one_12"><strong>所获奖励（2010-2011学年期间所获各项奖学金及荣誉）</strong></dd>
						<dd class="list_one_13"><strong>（简要介绍避免附页）</strong><?php echo $scholarship_request->awards; ?></dd>
					</dl>
					<dl class="list_one">
						<dd class="list_one_14"><strong>个<br />人<br />签<br />名</strong></dd>
						<dd class="list_one_15">
							<p style="width:805px;font-size:14px;float:left;line-height:22px;">我保证所填写的以上信息真实准确，并愿意承担上述信息虚假带来的一切责任和后果。</p>
							<p style="padding-top:10px;width:805px;float:left;font-size:14px;text-align:right;">签名：　　　　　年　　月　　日</p>
						</dd>
					</dl>
					<dl class="list_one">
						<dd class="list_one_14"><strong>德<br />育<br />导<br />师<br />意<br />见</strong></dd>
						<dd class="list_one_15">
							<p style="width:805px;font-size:14px;float:left;line-height:22px;">我保证所填写的以上信息真实准确，并愿意承担上述信息虚假带来的一切责任和后果。</p>
							<p style="padding-top:10px;width:805px;float:left;font-size:14px;text-align:right;">签名：　　　　　年　　月　　日</p>
						</dd>
					</dl>
					<dl class="list_one">
						<dd class="list_one_14"><strong>院<br />党<br />政<br />意<br />见</strong></dd>
						<dd class="list_one_15">
							<p style="width:805px;font-size:14px;float:left;line-height:22px;">我保证所填写的以上信息真实准确，并愿意承担上述信息虚假带来的一切责任和后果。</p>
							<p style="padding-top:10px;width:805px;float:left;font-size:14px;text-align:right;">签名：　　　　　年　　月　　日</p>
						</dd>
					</dl>
				</div>
			</div>
			<div class="beiz">注：本表一式两份，正反面打印。</div>
		</div>
	</body>
</html>
