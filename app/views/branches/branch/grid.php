<form id="pagerForm" method="post" action="branches/branch/grid.html">
	<input type="hidden" name="pageNum" value="<?php echo $pagination->cur; ?>" />
	<input type="hidden" name="numPerPage" value="<?php echo $pagination->per; ?>" />
</form>


<div class="pageContent">
    <div layoutH="30">
        <?php
        $gradeClasses = array();
        foreach ($branches as $class) {
            $gradeClasses[$class->start_year][] = $class;
        }

        foreach ($gradeClasses as $grade => $cls) {
            ?>
            <div style="clear: both;">
                <p style="padding: 10px 10px 5px; border-bottom: 1px solid #aaa; margin: 0 10px; font-size: 14px; font-weight: bold;"><?php echo $grade;?></p>
                <?php foreach ($cls as $class): ?>
                    <div style=" margin: 10px 0 0 10px; float: left; border: #CCC solid thin; background-color: #FFF; text-align: center;">
                        <a class="add" href="branches.html?class_id=<?php echo $class->id; ?>" target="navTab" rel="branch" style=" padding: 20px; display: block; color: #333;"><?php echo $class->name; ?>党支部</a>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php
        }
        ?>
    </div>
    <div class="panelBar" >
        <div class="pages"><span>共<?php echo $pagination->total; ?>条</span></div>
    </div>
</div>
