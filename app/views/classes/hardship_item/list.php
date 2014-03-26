<form id="pagerForm" method="post" action="classes/hardship_item.html">
	<input type="hidden" name="pageNum" value="<?php echo $pagination->cur; ?>" />
	<input type="hidden" name="numPerPage" value="<?php echo $pagination->per; ?>" />
</form>

<div class="pageContent">
	<div class="panelBar">
		<ul class="toolBar">
			<?php if ('administrator' == $user_type): ?>
				<li><a class="add" href="classes/hardship_item/add.html" rel="add_hardship_item" target="dialog" width="800" height="600" mask="true"><span>添加</span></a></li>
				<li><a class="delete" href="classes/hardship_item/del.html?id={hardship_item}" target="ajaxTodo" title="确定要删除吗？" warn="请选择一个补助项目"><span>删除</span></a></li>
				<li><a class="edit" href="classes/hardship_item/edit.html?id={hardship_item}" target="dialog" width="800" height="600" mask="true" rel="edit_hardship_item" warn="请选择一个补助项目"><span>修改</span></a></li>
				<li><a class="edit" href="classes/hardship_request.html?item_id={hardship_item}" target="navTab" rel="hardship_request" warn="请选择一个补助项目"><span>查看申请</span></a></li>
			<?php endif; ?>
			<?php if ('student' == $user_type): ?>
				<li><a class="add" href="classes/hardship_request/add.html?item_id={hardship_item}" rel="add_hardship_item" target="dialog" width="800" height="600" mask="true" warn="请选择一个补助项目"><span>申请</span></a></li>
			<?php endif; ?>
			<li class="line">line</li>
			<!--<li><a class="icon" href="classes/hardship_item.html" target="navTab" rel="hardship_item"><span>刷新</span></a></li>-->
		</ul>
	</div>

	<div id="w_list_print">
		<table class="list" width="100%" targetType="navTab" layoutH="52">
			<thead>
				<tr>
					<th>项目名称</th>
					<th>开放申请</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($hardship_items as $hardship_item): ?>
					<tr target="hardship_item" rel="<?php echo $hardship_item->id; ?>">
						<td>
							<a href="classes/hardship_item/view.html?id=<?php echo $hardship_item->id; ?>" target="dialog" width="800" height="600"><?php echo $hardship_item->title; ?></a>
						</td>
						<td><?php echo $hardship_item->enabled ? '√' : '×'; ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<div class="panelBar" >
		<div class="pages">
			<span>显示</span>
			<select name="numPerPage" onchange="navTabPageBreak({numPerPage: this.value})">
				<option value="20">20</option>
				<option value="50">50</option>
				<option value="100">100</option>
				<option value="200">200</option>
			</select>
			<span>条，共<?php echo $pagination->total; ?>条</span>
		</div>

		<div class="pagination" targetType="navTab" totalCount="<?php echo $pagination->total; ?>" numPerPage="<?php echo $pagination->per; ?>" pageNumShown="10" currentPage="<?php echo $pagination->cur; ?>"></div>

	</div>

</div>
