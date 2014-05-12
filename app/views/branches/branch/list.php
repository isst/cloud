<form id="pagerForm" method="post" action="branches/branch.html">
	<input type="hidden" name="pageNum" value="<?php echo $pagination->cur; ?>" />
	<input type="hidden" name="numPerPage" value="<?php echo $pagination->per; ?>" />
</form>
<div class="pageContent">
	<div class="panelBar">
		<ul class="toolBar"><!--selectedTodo--><!--dialog-->
			<li><a class="edit" target="selectedTodo" targetType="dialog"  rel="ids"  postType="string" href="classes/classes/editall.html"><span>批量修改</span></a></li>
			<li><a class="edit" href="classes/classes/edit.html?id={branch}" target="dialog"  mask="true" rel="edit_class" warn="请选择一个支部"><span>修改</span></a></li>
			<li class="line">line</li>
			<li><a class="add" href="branches.html?class_id={branch}" target="navTab" rel="branch" warn="请选择一个支部"><span>查看</span></a></li>
            <li><a class="icon" href="branches/branch.html" target="ajax" rel="class_list"><span>刷新</span></a></li>
		</ul>
	</div>

	<div id="w_list_print">
		<table class="list" width="100%" targetType="navTab" layoutH="52">
			<thead>
				<tr>
					<th width="10"><input type="checkbox" group="ids" class="checkboxCtrl"></th>
					<th width="200">支部名称</th>
					<th width="100">班级</th>
					<th>指导老师</th>
					<th>德育导师</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($branches as $the): ?>
					<tr target="branch" rel="<?php echo $the->id; ?>">
						<td><input name="ids" value="<?php echo $the->id; ?>" type="checkbox"></td>
						<td><a class="add" href="branches.html?class_id=<?php echo $the->id; ?>" target="navTab" rel="branch"><?php echo $the->name; ?>党支部</a></td>
						<td><?php echo $the->name; ?></td>
						<td><?php echo $the->branch_instructor_name; ?></td>
                        <td><?php echo $the->class_adviser_name; ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	<div class="panelBar" >
		<div class="pages">
			<span>显示</span>
			<select name="numPerPage" onchange="navTabPageBreak({numPerPage:this.value})">
                <?php
                foreach (array(20,50,100,200) as $per) {
                    echo sprintf('<option value="%s"%s>%s</option>', $per, $per==$pagination->per?' selected="selected"':'', $per);
                }
                ?>
			</select>
			<span>条，共<?php echo $pagination->total; ?>条</span>
		</div>

		<div class="pagination" targetType="navTab" totalCount="<?php echo $pagination->total; ?>" numPerPage="<?php echo $pagination->per; ?>" pageNumShown="10" currentPage="<?php echo $pagination->cur; ?>"></div>

	</div>

</div>
