<form id="pagerForm" method="post" action="classes/scholarship_item.html">
	<input type="hidden" name="pageNum" value="<?php echo $pagination->cur; ?>" />
	<input type="hidden" name="numPerPage" value="<?php echo $pagination->per; ?>" />
</form>

<div class="pageContent">
	<div class="panelBar">
		<ul class="toolBar">
			<?php if ('administrator' == $user_type): ?>
				<li><a class="add" href="classes/scholarship_item/add.html" rel="add_scholarship_item" target="dialog" width="800" height="600" mask="true"><span>添加</span></a></li>
				<li><a class="delete" href="classes/scholarship_item/del.html?id={scholarship_item}" target="ajaxTodo" title="确定要删除吗？" warn="请选择一个奖项"><span>删除</span></a></li>
				<li><a class="edit" href="classes/scholarship_item/edit.html?id={scholarship_item}" target="dialog" width="800" height="600" mask="true" rel="edit_scholarship_item" warn="请选择一个奖项"><span>修改</span></a></li>
				<li><a class="edit" href="classes/scholarship_request.html?item_id={scholarship_item}" target="navTab" rel="scholarship_request" warn="请选择一个奖项"><span>查看申请</span></a></li>
			<?php endif; ?>
			<?php if ('student' == $user_type): ?>
				<li><a class="add" href="classes/scholarship_request/add.html?item_id={scholarship_item}" rel="add_scholarship_item" target="dialog" width="800" height="600" mask="true" warn="请选择一个奖项"><span>申请</span></a></li>
			<?php endif; ?>
			<li class="line">line</li>
			<!--<li><a class="icon" href="classes/scholarship_item.html" target="navTab" rel="scholarship_item"><span>刷新</span></a></li>-->
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
				<?php foreach ($scholarship_items as $scholarship_item): ?>
					<tr target="scholarship_item" rel="<?php echo $scholarship_item->id; ?>">
						<td>
							<a href="classes/scholarship_item/view.html?id=<?php echo $scholarship_item->id; ?>" target="dialog" width="800" height="600"><?php echo $scholarship_item->title; ?></a>
						</td>
						<td><?php echo $scholarship_item->enabled ? '√' : '×'; ?></td>
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
