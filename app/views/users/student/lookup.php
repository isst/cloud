
<form id="pagerForm" action="users/student/lookup.html">
    <input type="hidden" name="name" value="<?php echo $name; ?>" />
	<input type="hidden" name="pageNum" value="<?php echo $pagination->cur; ?>" />
	<input type="hidden" name="numPerPage" value="<?php echo $pagination->per; ?>" />
</form>

<div class="pageHeader">
	<form rel="pagerForm" method="post" action="users/student/lookup.html" onsubmit="return dwzSearch(this, 'dialog');">
		<div class="searchBar">
			<ul class="searchContent">
				<li>
					<label>关键字:</label>
					<input placeholder="姓名或学号" class="textInput" name="name" value="<?php echo $name; ?>" type="text">
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
			<?php foreach ($students as $student): ?>
				<tr target="student" rel="<?php echo $student->id; ?>">
					<td><?php echo $student->id; ?></td>
					<td><?php echo $student->username; ?></td>
					<td><a class="add" href="users/student/view.html?id=<?php echo $student->id; ?>" target="dialog" mask="true"><?php echo $student->name; ?></a></td>
					<td><?php echo $student->sexual; ?></td>
                    <td>
                        <a class="btnSelect" href="javascript:$.bringBack({'student_id':'<?php echo $student->id; ?>', 'student_name':'<?php echo $student->name; ?>'})" title="选择">选择</a>
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

        <div class="pagination" targetType="dialog" totalCount="<?php echo $pagination->total; ?>" numPerPage="<?php echo $pagination->per; ?>" pageNumShown="3" currentPage="<?php echo $pagination->cur; ?>"></div>
	</div>
</div>