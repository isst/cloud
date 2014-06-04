<form id="pagerForm" method="post" action="classes/member/student_list.html?class_id=<?php echo $class->id; ?>">
	<input type="hidden" name="pageNum" value="<?php echo $pagination->cur; ?>" />
	<input type="hidden" name="numPerPage" value="<?php echo $pagination->per; ?>" />
</form>

<div class="pageContent">
    <div class="panelBar">
        <ul class="toolBar">
            <li><a class="icon" href="classes/member/student_list.html?class_id=<?php echo $class->id; ?>" target="ajax" rel="class_memcon"><span>刷新</span></a></li>
        </ul>
    </div>
	<div id="w_list_print">
		<table class="list" width="100%" targetType="navTab" layoutH="104"><!-- layoutH="52" -->
			<thead>
				<tr>
					<th width="80">姓名</th>
					<th width="80">学号</th>
					<th width="40">性别</th>
					<th width="60">班级职务</th>
                    <th width="100">联系电话</th>
                    <th>实习公司</th>
                    <?php if ($is_class_monitor) { ?>
                    <th>住宿地址</th>
                    <th width="120">更新时间</th>
                    <?php } ?>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($members as $member): ?>
					<tr target="member" rel="<?php echo $member->id; ?>">
						<td><?php echo $member->name; ?></td>
						<td><?php echo $member->student_num; ?></td>
						<td><?php echo $member->sexual; ?></td>
						<td><?php echo $member_class_title_names[$member->class_title]; ?></td>
                        <td><?php echo $member->tel; ?></td>
                        <td><?php echo $member->company; ?></td>
                        <?php if ($is_class_monitor) { ?>
                            <td><?php echo $member->lodging; ?></td>
                            <td><?php echo $member->updated; ?></td>
                        <?php } ?>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<div class="panelBar" >
		<div class="pages">
			<span>共<?php echo $pagination->total; ?>条</span>
		</div>
	</div>

</div>
