<form id="pagerForm" method="post" action="classes/internship.html">
	<input type="hidden" name="pageNum" value="<?php echo $pagination->cur; ?>" />
	<input type="hidden" name="numPerPage" value="<?php echo $pagination->per; ?>" />
</form>

<div class="pageContent">
	<div class="panelBar">
		<ul class="toolBar">
			<li><a class="add" href="classes/internship/add.html" rel="add_internship" target="dialog" width="600" height="420" mask="true"><span>添加</span></a></li>
			<li><a class="edit" href="classes/internship/edit.html?id={internship}" target="dialog" width="600" height="420" mask="true" rel="edit_internship" warn="请选择一个实习信息"><span>修改</span></a></li>
			<li><a class="delete" href="classes/internship/del.html?id={internship}" target="ajaxTodo" title="确定要删除吗？" warn="请选择一个实习信息"><span>删除</span></a></li>
			<li class="line">line</li>
			<!--<li><a class="icon" href="classes/internship.html" target="navTab" rel="internship"><span>刷新</span></a></li>-->
		</ul>
	</div>

	<div id="w_list_print">
		<table class="list" width="100%" targetType="navTab" layoutH="52">
			<thead>
				<tr>
					<th width="30">ID</th>
					<th>实习公司名称</th>
                    <th width="30">城市</th>
					<th>住宿地址</th>
					<th>公司负责人</th>
					<th>负责人联系方式</th>
					<th>公司地址</th>
					<th>实习起止时间</th>
					<th>实习内容</th>
                    <th>提交时间</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($internships as $internship): ?>
					<tr target="internship" rel="<?php echo $internship->id; ?>">
						<td><?php echo $internship->id; ?></td>
						<td><?php echo $internship->company; ?></td>
                        <td><?php echo $internship->city_name ? $internship->city_name : '其他'; ?></td>
						<td><?php echo $internship->lodging; ?></td>
						<td><?php echo $internship->principal; ?></td>
						<td><?php echo $internship->principal_contact; ?></td>
						<td><?php echo $internship->company_addr; ?></td>
						<td><?php echo $internship->internship_time; ?></td>
						<td><?php echo $internship->internship_content; ?></td>
                        <td><?php echo $internship->updated; ?></td>
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
