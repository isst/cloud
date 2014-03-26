<div class="pageContent">
	<form method="post" enctype="multipart/form-data" action="users/student/edit.html?id=<?php echo $student->id; ?>" class="pageForm required-validate" onsubmit="return iframeCallback(this, dialogAjaxDone);">

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
						<li>
							<a href="javascript:;"><span>保险信息</span></a>
						</li>
						<li>
							<a href="javascript:;"><span>贷款信息</span></a>
						</li>
						<li>
							<a href="javascript:;"><span>住宿信息</span></a>
						</li>
						<li>
							<a href="javascript:;"><span>实习信息</span></a>
						</li>
						<li>
							<a href="javascript:;"><span>就业信息</span></a>
						</li>
						<li>
							<a href="javascript:;"><span>获奖信息</span></a>
						</li>
					</ul>
				</div>
			</div>
			<div class="tabsContent">
				<div layoutH="104" style="display:block; overflow:auto; border:solid 1px #CCC; line-height:21px; background:#fff; margin: 0 auto; padding: 10px;">
					<h2 class="contentTitle">基本信息</h2>
					<table width="100%">
						<tbody>
							<tr style="height: 30px;">
								<td>姓名：</td>
								<td>
									<?php if ($user_type == 'student'): ?>
										<?php echo $student->name; ?>
									<?php else: ?>
										<input type="text" value="<?php echo $student->name;?>" name="name" class="textInput"/>
									<?php endif; ?>
								</td>
								<td>学号：</td>
								<td>
									<?php if ($user_type == 'student'): ?>
										<?php echo $student->student_num; ?>
                                        <input type="hidden" name="student_num" value="<?php echo $student->student_num;?>" />
									<?php else: ?>
										<input type="text" value="<?php echo $student->student_num; ?>" name="student_num" class="textInput" readonly="readonly">
									<?php endif; ?>
								</td>
								<td rowspan="6">(图片不能超过2MB)
									<div style="width: 120px;height: 160px; border: 1px #CCC solid;line-height: 160px; text-align: center;position:relative;">
                                        贴图添加
                                        <input type="hidden" name="img_url" value="<?php echo $student->img_url;?>" />
								        <input style="width:120px;height:160px;overflow: hidden;font-size: 300px;position:absolute;right:0;top:0;opacity: 0;filter:alpha(opacity=0);cursor:pointer;" type="file" name="img"  />
								    </div>
								</td>
							</tr>
							<tr style="height: 30px;">
								<td>密码：</td>
								<td>
									<?php if ($user_type == 'student'): ?>
										&lt;&lt;请在主界面右上角修改&gt;&gt;
									<?php else: ?>
										<input type="password" value="" name="password" class="textInput"> (不改留空)
									<?php endif; ?>
								</td>
								<td>性别：</td>
								<td>
									<?php if ($user_type == 'student'): ?>
										<?php echo $student->sexual; ?>
									<?php else: ?>
										<select name="sexual">
											<option value="">请选择</option>
											<option value="男<?php if ('男' == $student->sexual): ?>" selected="selected<?php endif; ?>">男</option>
											<option value="女<?php if ('女' == $student->sexual): ?>" selected="selected<?php endif; ?>">女</option>
										</select>
									<?php endif; ?>
								</td>
							</tr>
							<tr style="height: 30px;">
								<td>出生年月：</td>
								<td>
									<?php if ($user_type == 'student'): ?>
										<?php echo $student->birthday; ?>
									<?php else: ?>
										<input type="text" value="<?php echo $student->birthday; ?>" name="birthday" class="textInput">
									<?php endif; ?>
								</td>
								<td>身份证号：</td>
								<td>
									<?php if ($user_type == 'student'): ?>
										<?php echo $student->id_no; ?>
									<?php else: ?>
										<input type="text" value="<?php echo $student->id_no; ?>" name="id_no" class="textInput">
									<?php endif; ?>
								</td>
							</tr>
							<tr style="height: 30px;">
								<td>政治面貌：</td>
								<td>
									<select name="politics_status">
										<option value="">请选择</option>
										<?php foreach ($politics_status_names as $key => $name): ?>
											<option value="<?php echo $key; ?><?php if ($key == $student->politics_status): ?>" selected="selected<?php endif; ?>"><?php echo $name; ?></option>
										<?php endforeach; ?>
									</select>
								</td>
								<td>婚姻状况：</td>
								<td>
									<select name="marital_status">
										<option value="">请选择</option>
										<option value="未婚<?php if ('未婚' == $student->marital_status): ?>" selected="selected<?php endif; ?>">未婚</option>
										<option value="已婚<?php if ('已婚' == $student->marital_status): ?>" selected="selected<?php endif; ?>">已婚</option>
										<option value="离异<?php if ('离异' == $student->marital_status): ?>" selected="selected<?php endif; ?>">离异</option>
									</select>
								</td>
							</tr>
							<tr style="height: 30px;">
								<td>入团年月：</td>
								<td>
									<input type="text" value="<?php echo $student->league_join_time; ?>" name="league_join_time" class="textInput">
								</td>
								<td>入党年月：</td>
								<td>
									<input type="text" value="<?php echo $student->party_join_time; ?>" name="party_join_time" class="textInput">
								</td>
							</tr>
							<tr style="height: 30px;">
								<td>民族：</td>
								<td>
									<input type="text" value="<?php echo $student->nation; ?>" name="nation" class="textInput">
								</td>
								<td>籍贯：</td>
								<td>
									<input type="text" value="<?php echo $student->birthplace; ?>" name="birthplace" class="textInput">
								</td>
							</tr>
							<tr style="height: 30px;">
								<td>所在班级：</td>
								<td>
									<input type="text" readonly="readonly" value="<?php $student->class_id and print $class_names[$student->class_id]; ?>" name="class_name" class="textInput" style="float: left;" />
									<input name="class_id" type="hidden" value="<?php echo $student->class_id; ?>" />
									<a class="btnLook" href="classes/classes/lookup.html" target="dialog" mask="true" lookupGroup="">查找带回</a>
								</td>
								<td>寝室号：</td>
								<td>
									<input type="text" value="<?php echo $student->bedroom; ?>" name="bedroom" class="textInput">
								</td>
								<td></td>
							</tr>
							<tr style="height: 30px;">
								<td>联系电话：</td>
								<td>
									<input type="text" value="<?php echo $student->tel; ?>" name="tel" class="textInput">
								</td>
								<td>邮箱：</td>
								<td>
									<input type="text" value="<?php echo $student->email; ?>" name="email" class="textInput">
								</td>
								<td></td>
							</tr>
							<tr style="height: 30px;">
								<td>姓名拼音：</td>
								<td>
									<input type="text" value="<?php echo $student->pinyin; ?>" name="pinyin" class="textInput">
								</td>
								<td>入学时间：</td>
								<td>
									<input type="text" value="<?php echo $student->enroll_date; ?>" name="enroll_date" class="textInput">
								</td>
								<td></td>
							</tr>
							<tr style="height: 30px;">
								<td>学制：</td>
								<td>
									<input type="text" value="<?php echo $student->edu_system; ?>" name="edu_system" class="textInput">
								</td>
								<td>年级：</td>
								<td>
									<input type="text" value="<?php echo $student->grade; ?>" name="grade" class="textInput">
								</td>
								<td></td>
							</tr>
							<tr style="height: 30px;">
								<td>专业方向：</td>
								<td>
									<select name="major">
										<option value="">请选择</option>
										<?php foreach ($major_fields as $field): ?>
											<option value="<?php echo $field->name; ?><?php if ($field->name == $student->major): ?>" selected="selected<?php endif; ?>"><?php echo $field->name; ?></option>
										<?php endforeach; ?>
									</select>
								</td>
								<td>社会工作职务：</td>
								<td>
									<input type="text" value="<?php echo $student->job_title; ?>" name="job_title" class="textInput">
								</td>
								<td></td>
							</tr>
							<tr style="height: 30px;">
								<td>在校类型：</td>
								<td>
									<input type="text" value="<?php echo $student->at_school_type; ?>" name="at_school_type" class="textInput">
								</td>
								<td>中行卡号：</td>
								<td>
									<input type="text" value="<?php echo $student->boc_card_num; ?>" name="boc_card_num" class="textInput">
								</td>
								<td></td>
							</tr>
							<tr style="height: 30px;">
								<td>是否创新基地班：</td>
								<td>
									<input type="radio" name="is_innovation_base" value="1<?php if ($student->is_innovation_base): ?>" checked="checked<?php endif; ?>" />是
									<input type="radio" name="is_innovation_base" value="0<?php if (!$student->is_innovation_base): ?>" checked="checked<?php endif; ?>" />否
								</td>
								<td>入学奖金额：</td>
								<td>
									<input type="text" value="<?php echo $student->entrance_scholarship; ?>" name="entrance_scholarship" class="textInput">
								</td>
								<td></td>
							</tr>
							<tr style="height: 30px;">
								<td>是否在校：</td>
								<td>
									<?php if ($user_type == 'student'): ?>
										<?php echo $student->is_at_school ? '是' : '否'; ?>
									<?php else: ?>
										<input type="radio" name="is_at_school" value="1<?php if ($student->is_at_school): ?>" checked="checked<?php endif; ?>" />是
										<input type="radio" name="is_at_school" value="0<?php if (!$student->is_at_school): ?>" checked="checked<?php endif; ?>" />否
									<?php endif; ?>
								</td>
								<td>是否注册：</td>
								<td>
									<?php if ($user_type == 'student'): ?>
										<?php echo $student->registered ? '是' : '否'; ?>
									<?php else: ?>
										<input type="radio" name="registered" value="1<?php if ($student->registered): ?>" checked="checked<?php endif; ?>" />是
										<input type="radio" name="registered" value="0<?php if (!$student->registered): ?>" checked="checked<?php endif; ?>" />否
									<?php endif; ?>
								</td>
								<td></td>
							</tr>
							<tr style="height: 30px;">
								<td>最近注册时间：</td>
								<td>
									<?php if ($user_type == 'student'): ?>
										<?php echo $student->last_registered; ?>
									<?php else: ?>
										<input type="text" value="<?php echo $student->last_registered; ?>" name="last_registered" class="textInput">
									<?php endif; ?>
								</td>
								<td>学习期限到期时间：</td>
								<td>
									<?php if ($user_type == 'student'): ?>
										<?php echo $student->graduation_time; ?>
									<?php else: ?>
										<input type="text" value="<?php echo $student->graduation_time; ?>" name="graduation_time" class="textInput">
									<?php endif; ?>
								</td>
								<td></td>
							</tr>
							<?php if ($user_type != 'student'): ?>
								<tr style="height: 30px;">
									<td>是否心理困难：</td>
									<td>
										<input type="radio" name="is_psychology_hard" value="1<?php if ($student->is_psychology_hard): ?>" checked="checked<?php endif; ?>" />是
										<input type="radio" name="is_psychology_hard" value="0<?php if (!$student->is_psychology_hard): ?>" checked="checked<?php endif; ?>" />否
									</td>
									<td>是否经济困难：</td>
									<td>
										<input type="radio" name="is_financial_hard" value="1<?php if ($student->is_financial_hard): ?>" checked="checked<?php endif; ?>" />是
										<input type="radio" name="is_financial_hard" value="0<?php if (!$student->is_financial_hard): ?>" checked="checked<?php endif; ?>" />否
									</td>
									<td></td>
								</tr>
								<tr style="height: 30px;">
									<td>是否学业困难：</td>
									<td>
										<input type="radio" name="is_study_hard" value="1<?php if ($student->is_study_hard): ?>" checked="checked<?php endif; ?>" />是
										<input type="radio" name="is_study_hard" value="0<?php if (!$student->is_study_hard): ?>" checked="checked<?php endif; ?>" />否
									</td>
									<td colspan="3"></td>
								</tr>
							<?php endif; ?>
							<tr style="height: 30px;">
								<td>介绍信抬头：</td>
								<td>
									<input type="text" value="<?php echo $student->letter_title; ?>" name="letter_title" class="textInput">
								</td>
								<td colspan="3"></td>
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
									<input type="text" value="<?php echo $student->foreign_language; ?>" name="foreign_language" class="textInput">
								</td>
								<td>外语成绩：</td>
								<td>
									<input type="text" value="<?php echo $student->foreign_language_score; ?>" name="foreign_language_score" class="textInput">
								</td>
							</tr>
							<tr style="height: 30px;">
								<td>外语听力：</td>
								<td>
									<input type="text" value="<?php echo $student->foreign_language_listening_score; ?>" name="foreign_language_listening_score" class="textInput">
								</td>
							</tr>
							<tr style="height: 30px;">
								<td>政治理论：</td>
								<td>
									<input type="text" value="<?php echo $student->political_theory; ?>" name="political_theory" class="textInput">
								</td>
								<td>政治理论成绩：</td>
								<td>
									<input type="text" value="<?php echo $student->political_theory_score; ?>" name="political_theory_score" class="textInput">
								</td>
							</tr>
							<tr style="height: 30px;">
								<td>业务课一：</td>
								<td>
									<input type="text" value="<?php echo $student->pro_course1; ?>" name="pro_course1" class="textInput">
								</td>
								<td>业务课一成绩：</td>
								<td>
									<input type="text" value="<?php echo $student->pro_course1_score; ?>" name="pro_course1_score" class="textInput">
								</td>
							</tr>
							<tr style="height: 30px;">
								<td>业务课二：</td>
								<td>
									<input type="text" value="<?php echo $student->pro_course2; ?>" name="pro_course2" class="textInput">
								</td>
								<td>业务课二成绩：</td>
								<td>
									<input type="text" value="<?php echo $student->pro_course2_score; ?>" name="pro_course2_score" class="textInput">
								</td>
							</tr>
							<tr style="height: 30px;">
								<td>业务课三：</td>
								<td>
									<input type="text" value="<?php echo $student->pro_course3; ?>" name="pro_course3" class="textInput">
								</td>
								<td>业务课三成绩：</td>
								<td>
									<input type="text" value="<?php echo $student->pro_course3_score; ?>" name="pro_course3_score" class="textInput">
								</td>
							</tr>
							<tr style="height: 30px;">
								<td>复试成绩：</td>
								<td>
									<input type="text" value="<?php echo $student->retest_score; ?>" name="retest_score" class="textInput">
								</td>
								<td>总成绩：</td>
								<td>
									<input type="text" value="<?php echo $student->total_score; ?>" name="total_score" class="textInput">
								</td>
							</tr>
							<tr style="height: 30px;">
								<td>备注：</td>
								<td colspan="3">
									<input type="text" value="<?php echo $student->score_note; ?>" name="score_note" class="textInput">
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
									<input type="text" value="<?php echo $student->student_source; ?>" name="student_source" class="textInput">
								</td>
								<td>入学前工龄：</td>
								<td>
									<input type="text" value="<?php echo $student->working_age; ?>" name="working_age" class="textInput">
								</td>
							</tr>
							<tr style="height: 30px;">
								<td>入学方式：</td>
								<td>
									<input type="text" value="<?php echo $student->entrance_way; ?>" name="entrance_way" class="textInput">
								</td>
								<td>原学历：</td>
								<td>
									<input type="text" value="<?php echo $student->original_degree; ?>" name="original_degree" class="textInput">
								</td>
							</tr>
							<tr style="height: 30px;">
								<td>原毕业单位：</td>
								<td>
									<input type="text" value="<?php echo $student->original_graduation_unit; ?>" name="original_graduation_unit" class="textInput">
								</td>
								<td>原工作单位：</td>
								<td>
									<input type="text" value="<?php echo $student->original_graduation_year; ?>" name="original_graduation_year" class="textInput">
								</td>
							</tr>
							<tr style="height: 30px;">
								<td>原毕业年度：</td>
								<td>
									<input type="text" value="<?php echo $student->original_work_unit; ?>" name="original_work_unit" class="textInput">
								</td>
								<td>原毕业专业：</td>
								<td>
									<input type="text" value="<?php echo $student->original_major; ?>" name="original_major" class="textInput">
								</td>
							</tr>
							<tr style="height: 30px;">
								<td>简历：</td>
								<td colspan="3">
									<input type="text" value="<?php echo $student->entrance_resume; ?>" name="entrance_resume" class="textInput">
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
									<input type="text" value="<?php echo $student->home_tel; ?>" name="home_tel" class="textInput">
								</td>
								<td>家庭邮编：</td>
								<td>
									<input type="text" value="<?php echo $student->home_postcode; ?>" name="home_postcode" class="textInput">
								</td>
							</tr>
							<tr style="height: 30px;">
								<td>家庭地址：</td>
								<td colspan="3">
									<input type="text" value="<?php echo $student->home_addr; ?>" name="home_addr" class="textInput">
								</td>
							</tr>
							<tr style="height: 30px;">
								<td>父亲姓名：</td>
								<td>
									<input type="text" value="<?php echo $student->father_name; ?>" name="father_name" class="textInput">
								</td>
								<td>父亲联系方式：</td>
								<td>
									<input type="text" value="<?php echo $student->father_tel; ?>" name="father_tel" class="textInput">
								</td>
							</tr>
							<tr style="height: 30px;">
								<td>父亲工作单位：</td>
								<td colspan="3">
									<input type="text" value="<?php echo $student->father_work_unit; ?>" name="father_work_unit" class="textInput">
								</td>
							</tr>
							<tr style="height: 30px;">
								<td>母亲姓名：</td>
								<td>
									<input type="text" value="<?php echo $student->mother_name; ?>" name="mother_name" class="textInput">
								</td>
								<td>母亲联系方式：</td>
								<td>
									<input type="text" value="<?php echo $student->mother_tel; ?>" name="mother_tel" class="textInput">
								</td>
							</tr>
							<tr style="height: 30px;">
								<td>母亲工作单位：</td>
								<td colspan="3">
									<input type="text" value="<?php echo $student->mother_work_unit; ?>" name="mother_work_unit" class="textInput">
								</td>
							</tr>
							<tr style="height: 30px;">
								<td>其他亲属姓名：</td>
								<td>
									<input type="text" value="<?php echo $student->other_relative_name; ?>" name="other_relative_name" class="textInput">
								</td>
								<td>亲属联系方式：</td>
								<td>
									<input type="text" value="<?php echo $student->other_relative_tel; ?>" name="other_relative_tel" class="textInput">
								</td>
							</tr>
							<tr style="height: 30px;">
								<td>亲属工作单位：</td>
								<td colspan="3">
									<input type="text" value="<?php echo $student->other_relative_work_unit; ?>" name="other_relative_work_unit" class="textInput">
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div layoutH="104" style="display:block; overflow:auto; border:solid 1px #CCC; line-height:21px; background:#fff; margin: 0 auto; padding: 10px;">
					<h2 class="contentTitle">保险信息</h2>
					<table width="75%">
						<tbody>
							<tr style="height: 30px;">
								<td>第一年保险：</td>
								<td>
									<select name="insurance_1st">
										<option value="0<?php if ('0' == $student->insurance_1st): ?>" selected="selected<?php endif; ?>">否</option>
										<option value="1<?php if ('1' == $student->insurance_1st): ?>" selected="selected<?php endif; ?>">是</option>
									</select>
								</td>
								<td>第二年保险：</td>
								<td>
									<select name="insurance_2nd">
										<option value="0<?php if ('0' == $student->insurance_2nd): ?>" selected="selected<?php endif; ?>">否</option>
										<option value="1<?php if ('1' == $student->insurance_2nd): ?>" selected="selected<?php endif; ?>">是</option>
									</select>
								</td>
							</tr>
							<tr style="height: 30px;">
								<td>其它保险：</td>
								<td colspan="3">
									<input type="text" value="<?php echo $student->insurance_other; ?>" name="insurance_other" class="textInput">
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div layoutH="104" style="display:block; overflow:auto; border:solid 1px #CCC; line-height:21px; background:#fff; margin: 0 auto; padding: 10px;">
					<h2 class="contentTitle">贷款信息</h2>
				</div>
				<div layoutH="104" style="display:block; overflow:auto; border:solid 1px #CCC; line-height:21px; background:#fff; margin: 0 auto; padding: 10px;">
					<h2 class="contentTitle">住宿信息</h2>
				</div>
				<div layoutH="104" style="display:block; overflow:auto; border:solid 1px #CCC; line-height:21px; background:#fff; margin: 0 auto; padding: 10px;">
					<h2 class="contentTitle">实习信息</h2>
				</div>
				<div layoutH="104" style="display:block; overflow:auto; border:solid 1px #CCC; line-height:21px; background:#fff; margin: 0 auto; padding: 10px;">
					<h2 class="contentTitle">就业信息</h2>
				</div>
				<div layoutH="104" style="display:block; overflow:auto; border:solid 1px #CCC; line-height:21px; background:#fff; margin: 0 auto; padding: 10px;">
					<h2 class="contentTitle">获奖信息</h2>
				</div>
			</div>

		</div>
		<div class="formBar">
			<ul>
				<!--<li><a class="buttonActive" href="javascript:;"><span>保存</span></a></li>-->
				<li><div class="buttonActive"><div class="buttonContent"><button type="submit">保存</button></div></div></li>
				<li>
					<div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div>
				</li>
			</ul>
		</div>
	</form>
</div>