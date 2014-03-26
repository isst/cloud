<form id="pagerForm" method="post" action="classes/classes/grid.html">
	<input type="hidden" name="pageNum" value="<?php echo $pagination->cur; ?>" />
	<input type="hidden" name="numPerPage" value="<?php echo $pagination->per; ?>" />
</form>

<div class="pageContent">
	<div layoutH="30">
		<?php foreach ($classes as $class): ?>
			<div style="width: 200px; height: 60px; margin: 10px 0 0 10px; float: left; border: #CCC solid thin; background-color: #FFF; text-align: center;">
				<a class="add" href="classes.html?class_id=<?php echo $class->id; ?>" target="navTab" rel="class" style="line-height: 60px; color: #333;"><?php echo $class->name; ?></a>
			</div>
		<?php endforeach; ?>
	</div>

	<div class="panelBar" >
		<div class="pages">
			<span>显示</span>
			<select name="numPerPage" onchange="navTabPageBreak({numPerPage:this.value})">
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
