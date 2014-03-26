<div class="pageContent">
	<div class="pageFormContent" layoutH="20">

        <div class="tabs">
            <div class="tabsHeader">
                <div class="tabsHeaderContent">
                    <ul>
                        <li><a href="javascript:;"><span>基本信息</span></a></li>
                        <li><a href="javascript:;"><span>班级信息</span></a></li>
                        <li><a href="classes/memcon/student_list.html?student_id=<?php echo $student->id; ?>" class="j-ajax"><span>班级谈话记录</span></a></li>
                        <li><a href="javascript:;"><span>支部信息</span></a></li>
                        <li><a href="branches/applicant_memcon/student_list.html?student_id=<?php echo $student->id; ?>" class="j-ajax"><span>支部谈话记录</span></a></li>
                        <li><a href="branches/reward/student_list.html?student_id=<?php echo $student->id; ?>" class="j-ajax"><span>支部表扬</span></a></li>
                        <li><a href="branches/penalty/student_list.html?student_id=<?php echo $student->id; ?>" class="j-ajax"><span>支部警告</span></a></li>
                    </ul>
                </div>
            </div>
            <div class="tabsContent">
                <!--基本信息-->
                <div layoutH="72" style="display:block; overflow:auto; border:solid 1px #CCC; line-height:21px; background:#fff; margin: 0 auto; padding: 10px;">
                    <h2 class="contentTitle">基本信息</h2>
                    <p>
                        <label>用户名：</label><?php echo $student->username; ?>
                    </p>
                    <p>
                        <label>姓名：</label><?php echo $student->name; ?>
                    </p>
                    <p>
                        <label>性别：</label><?php echo $student->sexual; ?>
                    </p>
                    <p>
                        <label>学号：</label><?php echo $student->student_num; ?>
                    </p>
                    <p>
                        <label>身份证号：</label><?php echo $student->id_no; ?>
                    </p>
                    <p>
                        <label>民族：</label><?php echo $student->nation; ?>
                    </p>
                    <p>
                        <label>籍贯：</label><?php echo $student->birthplace; ?>
                    </p>
                    <p>
                        <label>出生年月：</label><?php echo $student->birthday; ?>
                    </p>
                    <p>
                        <label>联系电话：</label><?php echo $student->tel; ?>
                    </p>
                    <p>
                        <label>邮箱：</label><?php echo $student->email; ?>
                    </p>
                    <p>
                        <label>寝室号：</label><?php echo $student->dormitory; ?>
                    </p>
                    <p>
                        <label>家庭住址：</label><?php echo $student->home_addr; ?>
                    </p>
                    <p>
                        <label>介绍信抬头：</label><?php echo $student->letter_title; ?>
                    </p>
                </div>

                <!--班级信息-->
                <div layoutH="72" style="display:block; overflow:auto; border:solid 1px #CCC; line-height:21px; background:#fff; margin: 0 auto; padding: 10px;">
                    <h2 class="contentTitle">班级信息</h2>
                    <p>
                        <label>班级：</label><?php $student->class_id and print $class_names[$student->class_id]; ?>
                    </p>
                </div>

                <!--班级谈话记录-->
                <div id="class_memcon">班级谈话记录</div>

                <!--支部信息-->
                <div layoutH="72" style="display:block; overflow:auto; border:solid 1px #CCC; line-height:21px; background:#fff; margin: 0 auto; padding: 10px;">
                    <h2 class="contentTitle">支部信息</h2>
                    <p>
                        <label>支部状态：</label><?php echo $branch_status_names[$branch_member->status]; ?>
                    </p>
                    <p>
                        <label>支部头衔：</label><?php echo $branch_title_names[$branch_member->branch_title]; ?>
                    </p>
                    <p>
                        <label>党费已交付至：</label><?php echo $branch_member->paid_time; ?>
                    </p>
                    <p>
                        <label>党校学习情况：</label>
						<textarea class="editor" tools="About,Fullscreen" name="party_study" rows="12" style="width: 600px;">
							<?php echo $branch_member->party_study; ?>
						</textarea>
                        <label>党员的家庭情况：</label>
						<textarea class="editor" tools="About,Fullscreen" name="family" rows="12" style="width: 600px;">
							<?php echo $branch_member->family; ?>
						</textarea>
                    </p>
                </div>

                <!--支部谈话记录-->
                <div id="branch_memcon">支部谈话记录</div>

                <!--支部表扬-->
                <div id="branch_reward">支部表扬</div>

                <!--支部警告-->
                <div id="branch_penalty">支部警告</div>

            </div>
            <div class="tabsFooter">
                <div class="tabsFooterContent"></div>
            </div>
        </div>
    </div>
</div>
