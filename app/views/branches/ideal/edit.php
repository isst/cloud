
<div class="pageContent">
    <form method="post" action="branches/ideal/edit.html?id=<?php echo $ideal->ideal_id; ?>" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">
        <div class="pageFormContent" layoutH="56">
			<p>
				<label>学生姓名：</label>
				<select name="student_id">
					<?php foreach ($members as $member): ?>
						<option value="<?php echo $member->id; ?><?php if ($member->id == $ideal->student_id): ?>" selected="selected<?php endif; ?>"><?php echo $member->name; ?></option>
					<?php endforeach; ?>
				</select>
			</p>
            <p>
                <label>结果：</label>
                <input type="radio" name="result" value="1<?php if ($ideal->result) : ?>" checked="checked<?php endif; ?>" /> 通过
				<input type="radio" name="result" value="0<?php if (!$ideal->result) : ?>" checked="checked<?php endif; ?>" /> 未通过
            </p>
            <p>
                <label>公示时间</label>
                <input type="text" value="<?php echo $ideal->date_from; ?>" name="date_from"  class="date" dateFmt="yyyy-MM-dd" readonly="true"/>
                <a class="inputDateButton" href="javascript:;">选择</a>
            </p>
            <p>
                <label>备注：</label>
                <textarea name="notes" rows="12" style="width: 600px;"><?php echo $ideal->notes; ?></textarea>
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
