<form id="pagerForm" method="post" action="classes/scholarship_quota.html">
	<input type="hidden" name="pageNum" value="<?php echo $pagination->cur; ?>" />
	<input type="hidden" name="numPerPage" value="<?php echo $pagination->per; ?>" />
</form>

<div class="pageContent">
	<div class="panelBar">
		<ul class="toolBar">
			<?php if ('administrator' == $user_type): ?>
				<li><a class="edit" href="classes/scholarship_quota/edit.html?id={scholarship_quota}" target="dialog" width="800" height="600" mask="true" rel="edit_scholarship_quota" warn="请选择一个班级"><span>修改名额</span></a></li>
			<?php endif; ?>
			<?php if ('student' == $user_type): ?>
				<li><a class="add" href="classes/scholarship_request/add.html?quota_id={scholarship_quota}" rel="add_scholarship_quota" target="dialog" width="800" height="600" mask="true" warn="请选择一个班级"><span>申请</span></a></li>
			<?php endif; ?>
			<li class="line">line</li>
			<!--<li><a class="icon" href="classes/scholarship_quota.html" target="navTab" rel="scholarship_quota"><span>刷新</span></a></li>-->
		</ul>
	</div>

	<div id="w_list_print">
		<table class="list" width="100%" targetType="navTab" layoutH="52">
			<thead>
				<tr>
					<th>班级</th>
					<th>名额</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($scholarship_quotas as $scholarship_quota): ?>
					<tr target="scholarship_quota" rel="<?php echo $scholarship_quota->id; ?>">
						<td>
							<a class="add" href="classes.html?class_id=<?php echo $scholarship_quota->id; ?>" target="navTab" rel="class"><?php echo $scholarship_quota->name; ?></a>
						</td>
						<td>
							<?php $quotas = $scholarship_quota->quotas ? unserialize($scholarship_quota->quotas) : array(); ?>
							<?php foreach ($quotas as $id => $value): ?>
								<?php echo $item_titles[$id]; ?>:<?php echo $value; ?> 名; 
							<?php endforeach; ?>
						</td>
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
