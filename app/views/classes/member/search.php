<form id="pagerForm" method="post" action="classes/member/search.html?class_id=<?php echo $class_id; ?>">
	<input type="hidden" name="pageNum" value="<?php echo $pagination->cur; ?>" />
	<input type="hidden" name="numPerPage" value="<?php echo $pagination->per; ?>" />
</form>

<div class="pageHeader">
	<form rel="pagerForm" method="post" action="classes/member/search.html?class_id=<?php echo $class_id; ?>" onsubmit="return dwzSearch(this, 'dialog');">
		<div class="searchBar">
			<label>专业方向:</label>
			<select name="major">
				<option value="">请选择</option>
				<?php foreach ($major_fields as $field): ?>
					<option value="<?php echo $field->name; ?><?php if ($field->name == @$major): ?>" selected="selected<?php endif; ?>"><?php echo $field->name; ?></option>
				<?php endforeach; ?>
			</select>
			<button type="submit">查询</button>
		</div>
	</form>
</div>
<div class="pageContent">
	<form method="post" action="classes/member/add.html?class_id=<?php echo $class_id; ?>" class="pageForm" onsubmit="return validateCallback(this, dialogAjaxDone);">

		<div id="w_list_print">
			<table class="list" width="100%" targetType="navTab" layoutH="104"><!-- layoutH="52" -->
				<thead>
					<tr>
						<th width="22"><input type="checkbox" onclick="$t = $(this).parentsUntil('table').siblings().find('.id:checkbox');$(this).is(':checked') ? $t.attr('checked', 'checked') : $t.removeAttr('checked');"></th>
						<th width="80">姓名</th>
						<th width="120">学号</th>
						<th>性别</th>
						<th>专业方向</th>
						<th>民族</th>
						<th>籍贯</th>
						<th>出生年月</th>
						<th>联系电话</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($students as $student): ?>
						<tr target="student" rel="<?php echo $student->id; ?>">
							<td><input class="id" name="ids[]" value="<?php echo $student->id; ?>" type="checkbox"></td>
							<td><a href="users/student/view.html?id=<?php echo $student->id; ?>" rel="users/student/view.html?id=<?php echo $student->id; ?>" target="navTab"><?php echo $student->name; ?></a></td>
							<td><?php echo $student->student_num; ?></td>
							<td><?php echo $student->sexual; ?></td>
							<td><?php echo $student->major; ?></td>
							<td><?php echo $student->nation; ?></td>
							<td><?php echo $student->birthplace; ?></td>
							<td><?php echo $student->birthday; ?></td>
							<td><?php echo $student->tel; ?></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>

		<div class="panelBar" >
			<div class="pages">
				<span>显示</span>
				<select name="numPerPage" onchange="dwzPageBreak({targetType: 'dialog', numPerPage: this.value});">
					<option value="20<?php if (20 == $pagination->per): ?>" selected="selected<?php endif; ?>">20</option>
					<option value="50<?php if (50 == $pagination->per): ?>" selected="selected<?php endif; ?>">50</option>
					<option value="100<?php if (100 == $pagination->per): ?>" selected="selected<?php endif; ?>">100</option>
					<option value="200<?php if (200 == $pagination->per): ?>" selected="selected<?php endif; ?>">200</option>
				</select>
				<span>条，共<?php echo $pagination->total; ?>条</span>
			</div>

			<div class="pagination" targetType="dialog" totalCount="<?php echo $pagination->total; ?>" numPerPage="<?php echo $pagination->per; ?>" pageNumShown="10" currentPage="<?php echo $pagination->cur; ?>"></div>

		</div>
		<div class="formBar">
			<ul>
				<li><div class="buttonActive"><div class="buttonContent"><button type="submit">加入</button></div></div></li>
				<li>
					<div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div>
				</li>
			</ul>
		</div>
	</form>
</div>
