<div class="pageContent" style="padding:5px">

	<div class="tabs">
		<div class="tabsHeader">
			<div class="tabsHeaderContent">
				<ul>
					<li><a href="javascript:;"><span>基本信息</span></a></li>
					<li>
						<a href="javascript:;"><span>入学成绩</span></a>
					</li>
					<li>
						<a href="javascript:;"><span>来源信息</span></a>
					</li>
					<li>
						<a href="javascript:;"><span>家庭资料</span></a>
					</li>
					<li>
						<a href="javascript:;"><span>保险信息</span></a>
					</li>
					<li>
						<a href="javascript:;"><span>贷款信息</span></a>
					</li>
                    <li>
                        <a href="classes/memcon/student_list.html?student_id=<?php echo $student->id; ?>" class="j-ajax"><span>谈话记录</span></a>
                    </li>
					<li>
						<a href="classes/internship/student_list.html?student_id=<?php echo $student->id; ?>" class="j-ajax"><span>实习信息</span></a>
					</li>
                    <li>
                        <a href="classes/internship_feedback.html?student_id=<?php echo $student->id;?>"  class="j-ajax">
                            <span>实习反馈</span>
                        </a>
                    </li>
					<li>
						<a href="javascript:;"><span>就业信息</span></a>
					</li>
					<li>
						<a href="javascript:;"><span>获奖信息</span></a>
					</li>
					<?php if ($branch_member): ?>
						<li>
							<a href="javascript:;"><span>支部信息</span></a>
						</li>
						<li><a href="branches/reward/student_list.html?student_id=<?php echo $student->id; ?>" class="j-ajax"><span>支部表扬</span></a></li>
						<li><a href="branches/penalty/student_list.html?student_id=<?php echo $student->id; ?>" class="j-ajax"><span>支部警告</span></a></li>
					<?php endif; ?>
				</ul>
			</div>
		</div>
		<div class="tabsContent">
			<!--基本信息-->
			<div layoutH="72" style="display:block; overflow:auto; border:solid 1px #CCC; line-height:21px; background:#fff; margin: 0 auto; padding: 10px;">
				<h2 class="contentTitle">基本信息</h2>

				<table width="90%">
					<tbody>
						<tr style="height: 30px;">
							<td>姓名：</td>
							<td>
								<?php echo $student->name; ?>
							</td>
							<td>学号：</td>
							<td>
								<?php echo $student->student_num; ?>
							</td>
							<td rowspan="6">
								<div style="width: 120px;height: 160px; border: 1px #CCC solid;line-height: 160px; text-align: center;position:relative;">
                                    <img src="<?php echo $student->img_url; ?>" width="120px" height="160px" />
								</div>
							</td>
						</tr>
						<tr style="height: 30px;">
							<td>密码：</td>
							<td>
								******
							</td>
							<td>性别：</td>
							<td>
								<?php echo $student->sexual; ?>
							</td>
						</tr>
						<tr style="height: 30px;">
							<td>出生年月：</td>
							<td>
								<?php echo $student->birthday; ?>
							</td>
							<td>身份证号：</td>
							<td>
								<?php echo $student->id_no; ?>
							</td>
						</tr>
						<tr style="height: 30px;">
							<td>政治面貌：</td>
							<td>
								<?php echo $politics_status_names[$student->politics_status]; ?>
							</td>
							<td>婚姻状况：</td>
							<td>
								<?php echo $student->marital_status; ?>
							</td>
						</tr>
						<tr style="height: 30px;">
							<td>民族：</td>
							<td>
								<?php echo $student->nation; ?>
							</td>
							<td>籍贯：</td>
							<td>
								<?php echo $student->birthplace; ?>
							</td>
						</tr>
						<tr style="height: 30px;">
							<td>所在班级：</td>
							<td>
								<?php $student->class_id and print $class_names[$student->class_id]; ?>
							</td>
							<td>寝室号：</td>
							<td>
								<?php echo $student->bedroom; ?>
							</td>
						</tr>
						<tr style="height: 30px;">
							<td>联系电话：</td>
							<td>
								<?php echo $student->tel; ?>
							</td>
							<td>邮箱：</td>
							<td>
								<?php echo $student->email; ?>
							</td>
							<td></td>
						</tr>
						<tr style="height: 30px;">
							<td>姓名拼音：</td>
							<td>
								<?php echo $student->pinyin; ?>
							</td>
							<td>入学时间：</td>
							<td>
								<?php echo $student->enroll_date; ?>
							</td>
							<td></td>
						</tr>
						<tr style="height: 30px;">
							<td>学制：</td>
							<td>
								<?php echo $student->edu_system; ?>
							</td>
							<td>年级：</td>
							<td>
								<?php echo $student->grade; ?>
							</td>
							<td></td>
						</tr>
						<tr style="height: 30px;">
							<td>专业方向：</td>
							<td>
								<?php echo $student->major; ?>
							</td>
							<td>社会工作职务：</td>
							<td>
								<?php echo $student->job_title; ?>
							</td>
							<td></td>
						</tr>
						<tr style="height: 30px;">
							<td>在校类型：</td>
							<td>
								<?php echo $student->at_school_type; ?>
							</td>
							<td>中行卡号：</td>
							<td>
								<?php echo $student->boc_card_num; ?>
							</td>
							<td></td>
						</tr>
						<tr style="height: 30px;">
							<td>是否创新基地班：</td>
							<td>
								<?php echo $student->is_innovation_base ? '是' : '否'; ?>
							</td>
							<td>入学奖金额：</td>
							<td>
								<?php echo $student->entrance_scholarship; ?>
							</td>
							<td></td>
						</tr>
						<tr style="height: 30px;">
							<td>是否在校：</td>
							<td>
								<?php echo $student->is_at_school ? '是' : '否'; ?>
							</td>
							<td>是否注册：</td>
							<td>
								<?php echo $student->registered ? '是' : '否'; ?>
							</td>
							<td></td>
						</tr>
						<tr style="height: 30px;">
							<td>最近注册时间：</td>
							<td>
								<?php echo $student->last_registered; ?>
							</td>
							<td>学习期限到期时间：</td>
							<td>
								<?php echo $student->graduation_time; ?>
							</td>
							<td></td>
						</tr>
                        <tr style="height: 30px;">
                            <td>实习住宿地址：</td>
                            <td>
                                <?php echo $newest_internship ? $newest_internship->lodging : ""; ?>
                            </td>
                            <td>实习联系方式：</td>
                            <td>
                                <?php echo $newest_internship ? $newest_internship->contact : ''; ?>
                            </td>
                            <td></td>
                        </tr>
						<?php if ($user_type != 'student'): ?>
							<tr style="height: 30px;">
								<td>是否心理困难：</td>
								<td>
									<?php echo $student->is_psychology_hard ? '是' : '否'; ?>
								</td>
								<td>是否经济困难：</td>
								<td>
									<?php echo $student->is_financial_hard ? '是' : '否'; ?>
								</td>
								<td></td>
							</tr>
							<tr style="height: 30px;">
								<td>是否学业困难：</td>
								<td>
									<?php echo $student->is_study_hard ? '是' : '否'; ?>
								</td>
								<td colspan="3"></td>
							</tr>
						<?php endif; ?>
						<?php if ($student->class_id): ?>
							<tr style="height: 30px;">
								<td>德育导师：</td>
								<td>
									<?php echo $class->class_adviser_name; ?>
								</td>
								<td>联系方式：</td>
								<td>
									<?php echo $class->class_adviser_contact; ?>
								</td>
								<td></td>
							</tr>
							<tr style="height: 30px;">
								<td>专业导师：</td>
								<td>
									<?php echo $class->major_adviser_name; ?>
								</td>
								<td>联系方式：</td>
								<td>
									<?php echo $class->major_adviser_contact; ?>
								</td>
								<td></td>
							</tr>
						<?php endif; ?>
						<tr style="height: 30px;">
							<td>家庭住址：</td>
							<td>
								<?php echo $student->home_addr; ?>
							</td>
							<td colspan="3"></td>
						</tr>
						<tr style="height: 30px;">
							<td>介绍信抬头：</td>
							<td>
								<?php echo $student->letter_title; ?>
							</td>
							<td colspan="3"></td>
						</tr>
						<tr style="height: 30px;">
							<td colspan="5"></td>
						</tr>
						<tr style="height: 30px;">
							<td colspan="4">
								<a href="classes/memcon.html?talker_type=teacher&amp;student_id=<?php echo $student->id; ?>" target="navTab" rel="memcon_list">
									<span style="border: #CCC solid 1px; padding: 10px; margin: 5px;">教师谈话记录</span></a>
								<a href="classes/memcon.html?talker_type=student&amp;student_id=<?php echo $student->id; ?>" target="navTab" rel="memcon_list">
									<span style="border: #CCC solid 1px; padding: 10px; margin: 5px;">班委谈话记录</span></a>
								<a href="classes/aid_request.html?student_id=<?php echo $student->id; ?>" rel="aid_request" target="navTab">
									<span style="border: #CCC solid 1px; padding: 10px; margin: 5px;">三助信息</span></a>
								<a href="classes/hardship_request.html?student_id=<?php echo $student->id; ?>" rel="hardship_request" target="navTab">
									<span style="border: #CCC solid 1px; padding: 10px; margin: 5px;">困难补助信息</span></a>
								<a href="classes/scholarship_request.html?student_id=<?php echo $student->id; ?>" rel="scholarship_request" target="navTab">
									<span style="border: #CCC solid 1px; padding: 10px; margin: 5px;">奖学金信息</span></a>
								<?php if (in_array($user_type, array('administrator', 'student'))): ?>
									<a href="users/student/edit.html?id=<?php echo $student->id; ?>" rel="users/student/edit.html?id=<?php echo $user->id; ?>" target="dialog" width="800" height="600" rel="student_edit" mask="true"><span style="border: #CCC solid 1px; padding: 10px; margin: 5px; background-color: #eee;">修改资料</span></a>
								<?php endif; ?>
							</td>
							<td>
								<div style="border: #CCC solid 1px; padding: 10px; width: 100px; text-align: center;">
									<a href="users/student/print_view.html?id=<?php echo $student->id; ?>" target="_blank">新生登记表下载</a>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>

			<div layoutH="72" style="display:block; overflow:auto; border:solid 1px #CCC; line-height:21px; background:#fff; margin: 0 auto; padding: 10px;">
				<h2 class="contentTitle">入学成绩</h2>
				<table width="75%">
					<tbody>
						<tr style="height: 30px;">
							<td rowspan="2">外语语种：</td>
							<td rowspan="2">
								<?php echo $student->foreign_language; ?>
							</td>
							<td>外语成绩：</td>
							<td>
								<?php echo $student->foreign_language_score; ?>
							</td>
						</tr>
						<tr style="height: 30px;">
							<td>外语听力：</td>
							<td>
								<?php echo $student->foreign_language_listening_score; ?>
							</td>
						</tr>
						<tr style="height: 30px;">
							<td>政治理论：</td>
							<td>
								<?php echo $student->political_theory; ?>
							</td>
							<td>政治理论成绩：</td>
							<td>
								<?php echo $student->political_theory_score; ?>
							</td>
						</tr>
						<tr style="height: 30px;">
							<td>业务课一：</td>
							<td>
								<?php echo $student->pro_course1; ?>
							</td>
							<td>业务课一成绩：</td>
							<td>
								<?php echo $student->pro_course1_score; ?>
							</td>
						</tr>
						<tr style="height: 30px;">
							<td>业务课二：</td>
							<td>
								<?php echo $student->pro_course2; ?>
							</td>
							<td>业务课二成绩：</td>
							<td>
								<?php echo $student->pro_course2_score; ?>
							</td>
						</tr>
						<tr style="height: 30px;">
							<td>业务课三：</td>
							<td>
								<?php echo $student->pro_course3; ?>
							</td>
							<td>业务课三成绩：</td>
							<td>
								<?php echo $student->pro_course3_score; ?>
							</td>
						</tr>
						<tr style="height: 30px;">
							<td>复试成绩：</td>
							<td>
								<?php echo $student->retest_score; ?>
							</td>
							<td>总成绩：</td>
							<td>
								<?php echo $student->total_score; ?>
							</td>
						</tr>
						<tr style="height: 30px;">
							<td>备注：</td>
							<td colspan="3">
								<?php echo $student->score_note; ?>
							</td>
						</tr>
					</tbody>
				</table>
			</div>

			<div layoutH="72" style="display:block; overflow:auto; border:solid 1px #CCC; line-height:21px; background:#fff; margin: 0 auto; padding: 10px;">
				<h2 class="contentTitle">来源信息</h2>
				<table width="75%">
					<tbody>
						<tr style="height: 30px;">
							<td>考生来源：</td>
							<td>
								<?php echo $student->student_source; ?>
							</td>
							<td>入学前工龄：</td>
							<td>
								<?php echo $student->working_age; ?>
							</td>
						</tr>
						<tr style="height: 30px;">
							<td>入学方式：</td>
							<td>
								<?php echo $student->entrance_way; ?>
							</td>
							<td>原学历：</td>
							<td>
								<?php echo $student->original_degree; ?>
							</td>
						</tr>
						<tr style="height: 30px;">
							<td>原毕业单位：</td>
							<td>
								<?php echo $student->original_graduation_unit; ?>
							</td>
							<td>原工作单位：</td>
							<td>
								<?php echo $student->original_graduation_year; ?>
							</td>
						</tr>
						<tr style="height: 30px;">
							<td>原毕业年度：</td>
							<td>
								<?php echo $student->original_work_unit; ?>
							</td>
							<td>原毕业专业：</td>
							<td>
								<?php echo $student->original_major; ?>
							</td>
						</tr>
						<tr style="height: 30px;">
							<td>简历：</td>
							<td colspan="3">
								<?php echo $student->entrance_resume; ?>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div layoutH="72" style="display:block; overflow:auto; border:solid 1px #CCC; line-height:21px; background:#fff; margin: 0 auto; padding: 10px;">
				<h2 class="contentTitle">家庭资料</h2>
				<table width="75%">
					<tbody>
						<tr style="height: 30px;">
							<td>家庭电话：</td>
							<td>
								<?php echo $student->home_tel; ?>
							</td>
							<td>家庭邮编：</td>
							<td>
								<?php echo $student->home_postcode; ?>
							</td>
						</tr>
						<tr style="height: 30px;">
							<td>家庭地址：</td>
							<td colspan="3">
								<?php echo $student->home_addr; ?>
							</td>
						</tr>
						<tr style="height: 30px;">
							<td>父亲姓名：</td>
							<td>
								<?php echo $student->father_name; ?>
							</td>
							<td>父亲联系方式：</td>
							<td>
								<?php echo $student->father_tel; ?>
							</td>
						</tr>
						<tr style="height: 30px;">
							<td>父亲工作单位：</td>
							<td colspan="3">
								<?php echo $student->father_work_unit; ?>
							</td>
						</tr>
						<tr style="height: 30px;">
							<td>母亲姓名：</td>
							<td>
								<?php echo $student->mother_name; ?>
							</td>
							<td>母亲联系方式：</td>
							<td>
								<?php echo $student->mother_tel; ?>
							</td>
						</tr>
						<tr style="height: 30px;">
							<td>母亲工作单位：</td>
							<td colspan="3">
								<?php echo $student->mother_work_unit; ?>
							</td>
						</tr>
						<tr style="height: 30px;">
							<td>其他亲属姓名：</td>
							<td>
								<?php echo $student->other_relative_name; ?>
							</td>
							<td>亲属联系方式：</td>
							<td>
								<?php echo $student->other_relative_tel; ?>
							</td>
						</tr>
						<tr style="height: 30px;">
							<td>亲属工作单位：</td>
							<td colspan="3">
								<?php echo $student->other_relative_work_unit; ?>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div layoutH="72" style="display:block; overflow:auto; border:solid 1px #CCC; line-height:21px; background:#fff; margin: 0 auto; padding: 10px;">
				<h2 class="contentTitle">保险信息</h2>
				<table width="75%">
					<tbody>
						<tr style="height: 30px;">
							<td>第一年保险：</td>
							<td>
								<?php echo $student->insurance_1st ? '是' : '否'; ?>
							</td>
							<td>第二年保险：</td>
							<td>
								<?php echo $student->insurance_2nd ? '是' : '否'; ?>
							</td>
						</tr>
						<tr style="height: 30px;">
							<td>其它保险：</td>
							<td colspan="3">
								<?php echo $student->insurance_other; ?>
							</td>
						</tr>
					</tbody>
				</table>
			</div>

			<div layoutH="72" style="display:block; overflow:auto; border:solid 1px #CCC; line-height:21px; background:#fff; margin: 0 auto; padding: 10px;">
				<h2 class="contentTitle">贷款信息</h2>
			</div>

            <div layout="72" id="memcon_list" style="display:block; overflow:auto; border:solid 1px #CCC; line-height:21px; background:#fff; margin: 0 auto; padding: 10px;">

            </div>

			<div layout="72" id="internship_student_list" style="display:block; overflow:auto; border:solid 1px #CCC; line-height:21px; background:#fff; margin: 0 auto; padding: 10px;">

            </div>

            <div layout="72" id="internship_feedback_list" style="display:block; overflow:auto; border:solid 1px #CCC; line-height:21px; background:#fff; margin: 0 auto; padding: 10px;">

            </div>

			<div layoutH="72" style="display:block; overflow:auto; border:solid 1px #CCC; line-height:21px; background:#fff; margin: 0 auto; padding: 10px;">
				<h2 class="contentTitle">就业信息</h2>
			</div>

			<div layoutH="72" style="display:block; overflow:auto; border:solid 1px #CCC; line-height:21px; background:#fff; margin: 0 auto; padding: 10px;">
				<h2 class="contentTitle">获奖信息</h2>
			</div>

			<?php if ($branch_member): ?>
				<!--支部信息-->
				<div layoutH="72" style="display:block; overflow:auto; border:solid 1px #CCC; line-height:21px; background:#fff; margin: 0 auto; padding: 10px;">
					<h2 class="contentTitle">支部信息</h2>
					<div style="margin:15px;">
						支部状态：<?php echo $branch_status_names[$branch_member->branch_status]; ?>
					</div>
					<div style="margin:15px;">
						支部头衔：<?php echo $branch_title_names[$branch_member->branch_title]; ?>
					</div>
					<div style="margin:15px;">
						党费已交付至：<?php echo $branch_member->party_dues_paid; ?>
					</div>
					<div style="margin:15px;">
						党校学习情况：<?php echo $branch_member->party_school_learning; ?>
					</div>
					<div style="margin:15px;">
						党员的家庭情况：<?php echo $branch_member->party_family; ?>
					</div>
				</div>

				<!--支部表扬-->
				<div id="branch_reward">支部表扬</div>

				<!--支部警告-->
				<div id="branch_penalty">支部警告</div>
			<?php endif; ?>


		</div>
		<div class="tabsFooter">
			<div class="tabsFooterContent"></div>
		</div>
	</div>
</div>
