
<form id="pagerForm" action="users/teacher/lookup.html?type=<?php echo $teacher_type; ?>">
	<input type="hidden" name="pageNum" value="<?php echo $pagination->cur; ?>" />
	<input type="hidden" name="numPerPage" value="<?php echo $pagination->per; ?>" />
</form>

<div class="pageHeader">
	<form rel="pagerForm" method="post" action="users/teacher/lookup.html?type=<?php echo $teacher_type; ?>" onsubmit="return dwzSearch(this, 'dialog');">
		<div class="searchBar">
			<ul class="searchContent">
				<li>
					<label>教师姓名:</label>
					<input class="textInput" name="name" value="" type="text">
					<input type="hidden" name="type" value="<?php echo $teacher_type; ?>" />
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
				<th>ID</th>
				<th>用户名</th>
				<th>姓名</th>
				<th>性别</th>
				<th width="80">选择</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($teachers as $teacher): ?>
				<tr target="teacher" rel="<?php echo $teacher->id; ?>">
					<td><?php echo $teacher->id; ?></td>
					<td><?php echo $teacher->username; ?></td>
					<td><a class="add" href="users/teacher/view.html?id=<?php echo $teacher->id; ?>" target="dialog" mask="true"><?php echo $teacher->name; ?></a></td>
					<td><?php echo $teacher->sexual; ?></td>
					<td>
						<a class="btnSelect" href="javascript:$.bringBack({<?php echo $teacher_type; ?>_id:'<?php echo $teacher->id; ?>', <?php echo $teacher_type; ?>_name:'<?php echo $teacher->name; ?>'})" title="选择">选择</a>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

	<div class="panelBar">
		<div class="pages">
			<span>每页</span>

			<select name="numPerPage" onchange="dwzPageBreak({targetType: dialog, numPerPage: '10'})">
				<option value="10" selected="selected">10</option>
				<?php
				foreach (array(20,50,100,200) as $per)
				    echo sprintf('<option value="%s"%s>%s</option>', $per, $per==$pagination->per?' selected="selected"':'', $per);
                ?>
			</select>
			<span>条，共<?php echo $pagination->total?>条</span>
		</div>
		<div class="pagination" targetType="dialog" totalCount="2" numPerPage="10" pageNumShown="1" currentPage="1"></div>
	</div>
</div>