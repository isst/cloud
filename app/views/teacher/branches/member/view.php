<div class="pageContent">
		<div class="pageFormContent" layoutH="20">
			<p>
				<label>姓名：</label><?php echo $member->student_name; ?>
			</p>
			<p>
				<label>性别：</label><?php echo $member->student_sexual; ?>
			</p>
			<p>
				<label>状态：</label><?php echo $branch_status_names[$member->member_status]; ?>
			</p>
			<p>
				<label>支部头衔：</label><?php echo $branch_title_names[$member->branch_title]; ?>
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
</div>
