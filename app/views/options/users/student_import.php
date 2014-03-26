<div class="pageContent" style="padding:5px">
	<form method="post" action="options/users/student_import.html?type=<?php echo $type; ?>" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">

		<div class="tabs">
			<div class="tabsHeader">
				<div class="tabsHeaderContent">
					<ul>
						<li>
							<a href="javascript:;"><span>基本信息</span></a>
						</li>
						<li>
							<a href="javascript:;"><span>入学成绩</span></a>
						</li>
						<li>
							<a href="javascript:;"><span>来源信息</span></a>
						</li>
						<li>
							<a href="javascript:;"><span>家庭资料</span></a>
						</li>
					</ul>
				</div>
			</div>
			<div class="tabsContent">

				<div layoutH="104" style="display:block; overflow:auto; border:solid 1px #CCC; line-height:21px; background:#fff; margin: 0 auto; padding: 10px;">
					<h2 class="contentTitle">基本信息</h2>
					<table>
						<tbody>
							<tr style="height: 30px;">
								<td>姓名：</td>
								<td>
									<?php column_select('name'); ?>
								</td>
								<td>学号：</td>
								<td>
									<?php column_select('student_num'); ?>
								</td>
							</tr>
							<tr style="height: 30px;">
								<td>性别：</td>
								<td>
									<?php column_select('sexual'); ?>
								</td>
								<td></td>
								<td>
								</td>
							</tr>
							<tr style="height: 30px;">
								<td>出生年月：</td>
								<td>
									<?php column_select('birthday'); ?>
								</td>
								<td>身份证号：</td>
								<td>
									<?php column_select('id_no'); ?>
								</td>
							</tr>
							<tr style="height: 30px;">
								<td>民族：</td>
								<td>
									<?php column_select('nation'); ?>
								</td>
								<td>籍贯：</td>
								<td>
									<?php column_select('birthplace'); ?>
								</td>
							</tr>
							<tr style="height: 30px;">
								<td>寝室号：</td>
								<td>
									<?php column_select('bedroom'); ?>
								</td>
								<td></td>
								<td>
								</td>
							</tr>
							<tr style="height: 30px;">
								<td>联系电话：</td>
								<td>
									<?php column_select('tel'); ?>
								</td>
								<td>邮箱：</td>
								<td>
									<?php column_select('email'); ?>
								</td>
								<td></td>
							</tr>
							<tr style="height: 30px;">
								<td>姓名拼音：</td>
								<td>
									<?php column_select('pinyin'); ?>
								</td>
								<td>入学时间：</td>
								<td>
									<?php column_select('enroll_date'); ?>
								</td>
								<td></td>
							</tr>
							<tr style="height: 30px;">
								<td>学制：</td>
								<td>
									<?php column_select('edu_system'); ?>
								</td>
								<td>年级：</td>
								<td>
									<?php column_select('grade'); ?>
								</td>
								<td></td>
							</tr>
							<tr style="height: 30px;">
								<td>专业方向：</td>
								<td>
									<?php column_select('major'); ?>
								</td>
								<td>社会工作职务：</td>
								<td>
									<?php column_select('job_title'); ?>
								</td>
								<td></td>
							</tr>
							<tr style="height: 30px;">
								<td>在校类型：</td>
								<td>
									<?php column_select('at_school_type'); ?>
								</td>
								<td>中行卡号：</td>
								<td>
									<?php column_select('boc_card_num'); ?>
								</td>
								<td></td>
							</tr>
							<tr style="height: 30px;">
								<td>入学奖金额：</td>
								<td>
									<?php column_select('entrance_scholarship'); ?>
								</td>
								<td>学习期限到期时间：</td>
								<td>
									<?php column_select('graduation_time'); ?>
								</td>
								<td></td>
							</tr>
							<tr style="height: 30px;">
								<td>介绍信抬头：</td>
								<td>
									<?php column_select('letter_title'); ?>
								</td>
								<td colspan="2"></td>
							</tr>
							<tr style="height: 60px;">
								<td colspan="4">
									说明： 请选择各信息字段在Excel中所对应的列，没有对应信息的请选择&lt;未指定&gt;<br><br>
									请务必选择学号所对应的列，否则导入的数据将是完全无法使用的
								</td>
							</tr>
						</tbody>
					</table>
				</div>

				<div layoutH="104" style="display:block; overflow:auto; border:solid 1px #CCC; line-height:21px; background:#fff; margin: 0 auto; padding: 10px;">
					<h2 class="contentTitle">入学成绩</h2>
					<table width="75%">
						<tbody>
							<tr style="height: 30px;">
								<td rowspan="2">外语语种：</td>
								<td rowspan="2">
									<?php column_select('foreign_language'); ?>
								</td>
								<td>外语成绩：</td>
								<td>
									<?php column_select('foreign_language_score'); ?>
								</td>
							</tr>
							<tr style="height: 30px;">
								<td>外语听力：</td>
								<td>
									<?php column_select('foreign_language_listening_score'); ?>
								</td>
							</tr>
							<tr style="height: 30px;">
								<td>政治理论：</td>
								<td>
									<?php column_select('political_theory'); ?>
								</td>
								<td>政治理论成绩：</td>
								<td>
									<?php column_select('political_theory_score'); ?>
								</td>
							</tr>
							<tr style="height: 30px;">
								<td>业务课一：</td>
								<td>
									<?php column_select('pro_course1'); ?>
								</td>
								<td>业务课一成绩：</td>
								<td>
									<?php column_select('pro_course1_score'); ?>
								</td>
							</tr>
							<tr style="height: 30px;">
								<td>业务课二：</td>
								<td>
									<?php column_select('pro_course2'); ?>
								</td>
								<td>业务课二成绩：</td>
								<td>
									<?php column_select('pro_course2_score'); ?>
								</td>
							</tr>
							<tr style="height: 30px;">
								<td>业务课三：</td>
								<td>
									<?php column_select('pro_course3'); ?>
								</td>
								<td>业务课三成绩：</td>
								<td>
									<?php column_select('pro_course3_score'); ?>
								</td>
							</tr>
							<tr style="height: 30px;">
								<td>复试成绩：</td>
								<td>
									<?php column_select('retest_score'); ?>
								</td>
								<td>总成绩：</td>
								<td>
									<?php column_select('total_score'); ?>
								</td>
							</tr>
							<tr style="height: 30px;">
								<td>备注：</td>
								<td colspan="3">
									<?php column_select('score_note'); ?>
								</td>
							</tr>
						</tbody>
					</table>
				</div>

				<div layoutH="104" style="display:block; overflow:auto; border:solid 1px #CCC; line-height:21px; background:#fff; margin: 0 auto; padding: 10px;">
					<h2 class="contentTitle">来源信息</h2>
					<table width="75%">
						<tbody>
							<tr style="height: 30px;">
								<td>考生来源：</td>
								<td>
									<?php column_select('student_source'); ?>
								</td>
								<td>入学前工龄：</td>
								<td>
									<?php column_select('working_age'); ?>
								</td>
							</tr>
							<tr style="height: 30px;">
								<td>入学方式：</td>
								<td>
									<?php column_select('entrance_way'); ?>
								</td>
								<td>原学历：</td>
								<td>
									<?php column_select('original_degree'); ?>
								</td>
							</tr>
							<tr style="height: 30px;">
								<td>原毕业单位：</td>
								<td>
									<?php column_select('original_graduation_unit'); ?>
								</td>
								<td>原工作单位：</td>
								<td>
									<?php column_select('original_graduation_year'); ?>
								</td>
							</tr>
							<tr style="height: 30px;">
								<td>原毕业年度：</td>
								<td>
									<?php column_select('original_work_unit'); ?>
								</td>
								<td>原毕业专业：</td>
								<td>
									<?php column_select('original_major'); ?>
								</td>
							</tr>
							<tr style="height: 30px;">
								<td>简历：</td>
								<td colspan="3">
									<?php column_select('entrance_resume'); ?>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div layoutH="104" style="display:block; overflow:auto; border:solid 1px #CCC; line-height:21px; background:#fff; margin: 0 auto; padding: 10px;">
					<h2 class="contentTitle">家庭资料</h2>
					<table width="75%">
						<tbody>
							<tr style="height: 30px;">
								<td>家庭电话：</td>
								<td>
									<?php column_select('home_tel'); ?>
								</td>
								<td>家庭邮编：</td>
								<td>
									<?php column_select('home_postcode'); ?>
								</td>
							</tr>
							<tr style="height: 30px;">
								<td>家庭地址：</td>
								<td colspan="3">
									<?php column_select('home_addr'); ?>
								</td>
							</tr>
							<tr style="height: 30px;">
								<td>父亲姓名：</td>
								<td>
									<?php column_select('father_name'); ?>
								</td>
								<td>父亲联系方式：</td>
								<td>
									<?php column_select('father_tel'); ?>
								</td>
							</tr>
							<tr style="height: 30px;">
								<td>父亲工作单位：</td>
								<td colspan="3">
									<?php column_select('father_work_unit'); ?>
								</td>
							</tr>
							<tr style="height: 30px;">
								<td>母亲姓名：</td>
								<td>
									<?php column_select('mother_name'); ?>
								</td>
								<td>母亲联系方式：</td>
								<td>
									<?php column_select('mother_tel'); ?>
								</td>
							</tr>
							<tr style="height: 30px;">
								<td>母亲工作单位：</td>
								<td colspan="3">
									<?php column_select('mother_work_unit'); ?>
								</td>
							</tr>
							<tr style="height: 30px;">
								<td>其他亲属姓名：</td>
								<td>
									<?php column_select('other_relative_name'); ?>
								</td>
								<td>亲属联系方式：</td>
								<td>
									<?php column_select('other_relative_tel'); ?>
								</td>
							</tr>
							<tr style="height: 30px;">
								<td>亲属工作单位：</td>
								<td colspan="3">
									<?php column_select('other_relative_work_unit'); ?>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>

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
