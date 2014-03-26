
<div class="pageContent">
    <form method="post" action="branches/full_member_application/add.html?class_id=<?php echo $class_id; ?>" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">
        <div class="pageFormContent" layoutH="56">
			<p>
				<label>学生姓名：</label>
				<select name="student_id">
					<?php foreach ($members as $member): ?>
						<option value="<?php echo $member->id; ?>"><?php echo $member->name; ?></option>
					<?php endforeach; ?>
				</select>
			</p>
            <p>
                <label>结果：</label>
                <input type="radio" name="result" value="1" /> 通过
				<input type="radio" name="result" value="0" /> 未通过
            </p>
            <p>
                <label>通过时间</label>
                <input type="text" value="" name="date_from"  class="date" dateFmt="yyyy-MM-dd" readonly="true"/>
                <a class="inputDateButton" href="javascript:;">选择</a>
            </p>
            <p>
                <label>备注：</label>
                <textarea name="notes" rows="12" style="width: 600px;"></textarea>
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
