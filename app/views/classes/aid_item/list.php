<form id="pagerForm" method="post" action="classes/aid_item.html">
	<input type="hidden" name="pageNum" value="<?php echo $pagination->cur; ?>" />
	<input type="hidden" name="numPerPage" value="<?php echo $pagination->per; ?>" />
</form>

<div class="pageContent">
	<div class="panelBar">
		<ul class="toolBar">
			<?php if ('administrator' == $user_type): ?>
				<li><a class="add" href="classes/aid_item/add.html" rel="add_aid_item" target="dialog" width="800" height="600" mask="true"><span>添加</span></a></li>
				<li><a class="delete" href="classes/aid_item/del.html?id={aid_item}" target="ajaxTodo" title="确定要删除吗？" warn="请选择一个三助岗位"><span>删除</span></a></li>
				<li><a class="edit" href="classes/aid_item/edit.html?id={aid_item}" target="dialog" width="800" height="600" mask="true" rel="edit_aid_item" warn="请选择一个三助岗位"><span>修改</span></a></li>
				<li><a class="edit" href="classes/aid_request.html?item_id={aid_item}" target="navTab" rel="aid_request" warn="请选择一个三助岗位"><span>查看申请</span></a></li>
			<?php endif; ?>
			<?php if ('student' == $user_type): ?>
				<li><a class="add" href="classes/aid_request/add.html?item_id={aid_item}" rel="add_aid_item" target="dialog" width="800" height="600" mask="true" warn="请选择一个三助岗位"><span>申请</span></a></li>
			<?php endif; ?>
			<li class="line">line</li>
			<!--<li><a class="icon" href="classes/aid_item.html" target="navTab" rel="aid_item"><span>刷新</span></a></li>-->
		</ul>
	</div>

	<div id="w_list_print">
		<table class="list" width="100%" targetType="navTab" layoutH="52">
			<thead>
				<tr>
					<th width="60">类型</th>
					<th>岗位名称</th>
					<th>用人单位</th>
					<th>开放申请</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($aid_items as $aid_item): ?>
					<tr target="aid_item" rel="<?php echo $aid_item->id; ?>">
						<td><?php echo $aid_type_names[$aid_item->type]; ?></td>
						<td>
							<a href="classes/aid_item/view.html?id=<?php echo $aid_item->id; ?>" target="dialog" width="800" height="600"><?php echo $aid_item->title; ?></a>
						</td>
						<td><?php echo $aid_item->unit_name; ?></td>
						<td><?php echo $aid_item->enabled ? '√' : '×'; ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<div class="panelBar" >
		<div class="pages">
			<span>显示</span>
			<select name="numPerPage" onchange="navTabPageBreak({numPerPage: this.value})">
				<?php
				foreach (array(20,50,100,200) as $per)
				    echo sprintf('<option value="%s"%s>%s</option>', $per, $per==$pagination->per?' selected="selected"':'', $per);
				?>
			</select>
			<span>条，共<?php echo $pagination->total; ?>条</span>
		</div>

		<div class="pagination" targetType="navTab" totalCount="<?php echo $pagination->total; ?>" numPerPage="<?php echo $pagination->per; ?>" pageNumShown="10" currentPage="<?php echo $pagination->cur; ?>"></div>

	</div>

</div>
