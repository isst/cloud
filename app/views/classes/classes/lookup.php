
<form id="pagerForm" action="classes/classes/lookup.html">
	<input type="hidden" name="pageNum" value="<?php echo $pagination->cur; ?>" />
	<input type="hidden" name="numPerPage" value="<?php echo $pagination->per; ?>" />
</form>

<div class="pageHeader">
	<form rel="pagerForm" method="post" action="classes/classes/lookup.html" onsubmit="return dwzSearch(this, 'dialog');">
		<div class="searchBar">
			<ul class="searchContent">
				<li>
					<label>班级名称:</label>
					<input class="textInput" name="name" value="" type="text">
				</li>
			</ul>
			<div class="subBar">
				<ul>
					<li><div class="buttonActive"><div class="buttonContent"><button type="submit">查询</button></div></div></li>
				</ul>
			</div>
		</div>
	</form>
</div>
<div class="pageContent">

	<table class="table" layoutH="118" targetType="dialog" width="100%">
		<thead>
			<tr>
				<th>班级ID</th>
				<th>班级名称</th>
				<th>德育导师</th>
				<th width="80">选择</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($classes as $class): ?>
				<tr target="class" rel="<?php echo $class->id; ?>">
					<td><?php echo $class->id; ?></td>
					<td><?php echo $class->name; ?></td>
					<td><?php echo $class->class_adviser_name; ?></td>
					<td>
						<a class="btnSelect" href="javascript:$.bringBack({class_id:'<?php echo $class->id; ?>', class_name:'<?php echo $class->name; ?>'})" title="选择">选择</a>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

	<div class="panelBar">
		<div class="pages">
			<span>每页</span>

			<select name="numPerPage" onchange="dwzPageBreak({targetType:dialog, numPerPage:'10'})">
				<option value="10" selected="selected">10</option>
				<option value="20">20</option>
				<option value="50">50</option>
				<option value="100">100</option>
			</select>
			<span>条，共2条</span>
		</div>
		<div class="pagination" targetType="dialog" totalCount="2" numPerPage="10" pageNumShown="1" currentPage="1"></div>
	</div>
</div>