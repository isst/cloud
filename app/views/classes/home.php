<style type="text/css">
	ul.rightTools {float:right; display:block;}
	ul.rightTools li{float:left; display:block; margin-left:5px}
</style>

<div class="pageContent" style="padding:5px">
	<div class="tabs">
		<div class="tabsHeader">
			<div class="tabsHeaderContent">
				<ul>
					<li><span>基本信息</span></a></li>
					<li><a href="classes/member.html?class_id=<?php echo $class->id; ?>" class="j-ajax"><span>班级学生</span></a></li>
                    <?php
                    if ($class->id) {
                    ?>
                        <li><a href="classes/member/internship_list.html?class_id=<?php echo $class->id; ?>" class="j-ajax"><span>实习信息</span></a></li>
                    <?php
                    }
                    ?>
					<?php if ('administrator' == $user_type): ?>
						<li><a href="classes/memcon.html?talker_type=teacher&amp;class_id=<?php echo $class->id; ?>" class="j-ajax"><span>教师谈话记录</span></a></li>
						<li><a href="classes/memcon.html?talker_type=student&amp;class_id=<?php echo $class->id; ?>" class="j-ajax"><span>班委谈话记录</span></a></li>
					<?php endif; ?>
				</ul>
			</div>
		</div>
		<div class="tabsContent">
			<div id="class_general">
				<div class="pageContent">
					<div>
						<div layoutH="72" style="display:block; overflow:auto; border:solid 1px #CCC; line-height:21px; background:#fff; margin: 0 auto; padding: 10px;">
							<h2 class="contentTitle"><?php echo $class->name; ?></h2>

							<table width="90%" style="margin:15px;">
								<thead>
									<tr style="height: 30px;">
										<th style="font-weight: bold;">
											班级：<?php echo $class->name; ?>
										</th>
										<th style="font-weight: bold;">
											党支部：<?php echo $class->name; ?>党支部
										</th>
									</tr>
								</thead>
								<tbody>
									<tr style="height: 30px;">
										<td>
											德育导师：<?php echo $class->class_adviser_name; ?>
										</td>
										<td>
											支部指导老师：<?php echo $class->branch_instructor_name; ?>
										</td>
									</tr>
									<tr style="height: 30px;">
										<td>
											专业导师：<?php echo $class->major_adviser_name; ?>
										</td>
										<td>
											支部书记：<?php $branch_secretary and print $branch_secretary->name; ?>
										</td>
									</tr>
									<tr style="height: 30px;">
										<td>
											班长：<?php $class_monitor and print $class_monitor->name; ?>
										</td>
										<td>
											支部宣传委员：<?php $branch_publicity and print $branch_publicity->name; ?>
										</td>
									</tr>
								</tbody>
							</table>
							<!--
							<div style="margin:15px;">
							学习委员：
							</div>
							<div style="margin:15px;">
							体育委员：
							</div>
							<div style="margin:15px;">
							文艺委员：
							</div>
							-->
						</div>
						<?php if ('administrator' == $user->user_type): ?>
							<div style="position: absolute; right: 20px; bottom: 10px;">
								<a class="button" target="dialog" mask="true" rel="classes_edit" href="classes/classes/edit.html?id=<?php echo $class->id; ?>"><span>编辑</span></a>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<div id="class_member">班级学生</div>
            <?php
            if ($class->id) {
            ?>
           <div id="internship">实习信息</div>
            <?php
            }
            ?>
			<?php if ('administrator' == $user_type): ?>
				<div id="class_teacher_memcon">教师谈话记录</div>
				<div id="class_student_memcon">班委谈话记录</div>
			<?php endif; ?>
		</div>
		<div class="tabsFooter">
			<div class="tabsFooterContent"></div>
		</div>
	</div>

</div>




