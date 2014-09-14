<form id="pagerForm" method="post" action="classes/memcon.html?class_id=<?php echo $class->id; ?>&talker_type=<?php echo $talker_type?>">
    <input type="hidden" name="pageNum" value="<?php echo $pagination->cur; ?>" />
    <input type="hidden" name="numPerPage" value="<?php echo $pagination->per; ?>" />
</form>
<?php $rel = $talker_type=='teacher'?'class_teacher_memcon':'class_student_memcon'?>
<div class="pageContent">
    <div class="panelBar">
        <ul class="toolBar">
			<?php if ('teacher' == $user_type): ?>
	            <li><a class="add" href="classes/memcon/add.html?class_id=<?php echo $class->id; ?>&talker_type=<?php echo $talker_type; ?>&amp;type=<?php echo $type; ?>" target="dialog" width="645" height="400" mask="true"><span>添加</span></a></li>
			<?php endif; ?>
            <li><a class="delete" href="classes/memcon/del.html?id={<?php echo $talker_type?>_memcon}&rel=<?php echo $rel?>" target="ajaxTodo" title="确定要删除吗？" warn="请选择一条记录"><span>删除</span></a></li>
            <li><a class="edit" href="classes/memcon/edit.html?id={<?php echo $talker_type?>_memcon}&rel=<?php echo $rel?><?php if('administrator' == $user_type){?>&type=admin<?php }?>" target="dialog" width="645" height="400"  mask="true" warn="请选择一条记录"><span>修改</span></a></li>
            <li class="line">line</li>
            <!--<li><a class="icon" href="classes/memcon.html?class_id=<?php echo $class->id; ?>" target="ajax" rel="class_memcon"><span>刷新</span></a></li>-->
        </ul>
    </div>

    <div id="w_list_print">
        <table class="list" width="100%" targetType="navTab" layoutH="104"><!-- layoutH="52" -->
            <thead>
                <tr>
                    <th width="150">谈话人</th>
                    <th width="150">被谈话人</th>
                    <th>主题</th>
                    <th>地点</th>
                    <th>谈话时间</th>
                    <th>重要程度</th>
                </tr>
            </thead>
            <tbody>
				<?php foreach ($memcons as $memcon): ?>
					<tr target="<?php echo $talker_type?>_memcon" rel="<?php echo $memcon->id; ?>">
						<td>
							<?php echo $memcon->talker_name; ?>
						</td>
						<td>
							<?php if ('student' == $user->user_type): ?>
								<?php echo $memcon->student_name; ?>
							<?php else: ?>
								<a href="users/student/view.html?id=<?php echo $memcon->student_id; ?>" rel="users/student/view.html?id=<?php echo $memcon->student_id; ?>" target="navTab"><?php echo $memcon->student_name; ?></a>
							<?php endif; ?>
						</td>
						<td>
							<?php if ('student' == $user->user_type): ?>
								<?php echo $memcon->title; ?>
							<?php else: ?>
								<a href="classes/memcon/view.html?id=<?php echo $memcon->id; ?>" target="dialog" width="645" height="400" mask="true"><?php echo $memcon->title; ?></a>
							<?php endif; ?>
						</td>
                        <td><?php echo $memcon->address; ?></td>
						<td><?php echo $memcon->time; ?></td>
                        <td><?php echo $statusLabels[$memcon->status]?></td>
					</tr>
				<?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="panelBar" >
        <div class="pages">
            <span>显示</span>
            <select name="numPerPage" onchange="navTabPageBreak({numPerPage: this.value}, '<?php echo $rel?>')">
                <?php
                foreach (array(20,50,100,200) as $per)
                    echo sprintf('<option value="%s"%s>%s</option>', $per, $per==$pagination->per?' selected="selected"':'', $per);
                ?>
            </select>
            <span>条，共<?php echo $pagination->total; ?>条</span>
        </div>

        <div class="pagination" rel="<?php echo $rel?>" totalCount="<?php echo $pagination->total; ?>" numPerPage="<?php echo $pagination->per; ?>" pageNumShown="10" currentPage="<?php echo $pagination->cur; ?>"></div>

    </div>

</div>
