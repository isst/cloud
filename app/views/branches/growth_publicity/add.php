
<div class="pageContent">
    <form method="post" action="branches/growth_publicity/add.html?class_id=<?php echo $class_id; ?>" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">
        <div class="pageFormContent" layoutH="56">
			<p>
				<label>姓名：</label>
				<select name="student_id">
					<?php foreach ($members as $member): ?>
						<option value="<?php echo $member->id; ?>"><?php echo $member->name; ?></option>
					<?php endforeach; ?>
				</select>
			</p>
            <p>
                <label>公示时间(起始)：</label>
                <input type="text" value="" name="date_from"  class="date" dateFmt="yyyy-MM-dd" readonly="true"/>
                <a class="inputDateButton" href="javascript:;">选择</a>
            </p>
            <p>
                <label>公示时间(截止)：</label>
                <input type="text" value="" name="date_to"  class="date" dateFmt="yyyy-MM-dd" readonly="true"/>
                <a class="inputDateButton" href="javascript:;">选择</a>
            </p>
            <p>
                <label>公示网址：</label>
                <input type="text" value="" name="url" class="textInput">
            </p>
            <p>
                <label>公示结果：</label>
                <input type="radio" name="result" value="1" /> 通过 <input type="radio" name="result" value="0" /> 未通过
            </p>
        </div>
        <div class="formBar">
            <ul>
                <li><div class="buttonActive"><div class="buttonContent"><button type="submit">保存</button></div></div></li>
                <li>
                    <div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div>
                </li>
            </ul>
        </div>
    </form>
</div>
