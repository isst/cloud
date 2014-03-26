<style type="text/css">
	ul.rightTools {float:right; display:block;}
	ul.rightTools li{float:left; display:block; margin-left:5px}
</style>

<div class="pageContent" style="padding:5px">
	<div class="tabs">
		<div class="tabsHeader">
			<div class="tabsHeaderContent">
				<ul>
					<li><span>基本信息</span></a></li>
					<li><a href="classes/member.html?class_id=<?php echo $class->id; ?>" class="j-ajax"><span>同班同学</span></a></li>
				</ul>
			</div>
		</div>
		<div class="tabsContent">
			<div id="class_general">
				<div class="pageContent">
					<div>
						<div layoutH="72" style="display:block; overflow:auto; border:solid 1px #CCC; line-height:21px; background:#fff; margin: 0 auto; padding: 10px;">
							<h2 class="contentTitle"><?php echo $class->name; ?></h2>
							<div style="margin:15px;">党支部名称：<?php echo $class->branch_name; ?></div>
							<div style="margin:15px;">德育导师：<?php echo $class->class_adviser_name; ?></div>
							<div style="margin:15px;">班级名称：<?php echo $class->name; ?></div>
						</div>
					</div>
				</div>
			</div>
			<div id="class_member">班级学生</div>
		</div>
		<div class="tabsFooter">
			<div class="tabsFooterContent"></div>
		</div>
	</div>

</div>




