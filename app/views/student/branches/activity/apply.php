<div class="pageContent">
    <form method="post" action="branches/activity/apply.html?class_id=<?php echo $class_id; ?>" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">
        <div class="pageFormContent" layoutH="56">
			<p>
				<label>活动类型：</label>
				<select name="type">
					<option value="0">娱乐型</option>
					<option value="1">素质拓展型</option>
				</select>
			</p>
			<p>
				<label>活动主题：</label>
				<input type="text" value="" name="title" class="textInput">
			</p>
			<p>
				<label>活动时间：</label>
				<input type="text" name="date" class="date" readonly="true"/>
				<a class="inputDateButton" href="javascript:;">选择</a>
				<span class="info"></span>
			</p>
			<p>
				<label>活动地点：</label>
				<input type="text" value="" name="place" class="textInput">
			</p>
			<p>
				<label>应到人数：</label>
				<input type="text" value="" name="people_plan" class="textInput">
			</p>
			<p>
				<label>活动预算：</label>
				<input type="text" value="" name="activity_budget" class="textInput">
			</p>
        </div>
        <div class="formBar">
            <ul>
                    <!--<li><a class="buttonActive" href="javascript:;"><span>保存</span></a></li>-->
                <li><div class="buttonActive"><div class="buttonContent"><button type="submit">保存</button></div></div></li>
                <li>
                    <div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div>
                </li>
            </ul>
        </div>
    </form>
</div>
