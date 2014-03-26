
<div class="pageContent">
    <form method="post" action="branches/growth_publicity/edit.html?id=<?php echo $growth_publicity->id; ?>" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">
        <div class="pageFormContent" layoutH="56">
			<p>
				<label>学生姓名：</label>
				<select name="student_id">
					<?php foreach ($members as $member): ?>
						<option value="<?php echo $member->id;?><?php if ($member->id == $growth_publicity->student_id): ?>" selected="selected<?php endif; ?>"><?php echo $member->name;?></option>
					<?php endforeach; ?>
				</select>
			</p>
            <p>
                <label>公示时间(起始)：</label>
                <input type="text" value="<?php echo $growth_publicity->date_from; ?>" name="date_from"  class="date" dateFmt="yyyy-MM-dd" readonly="true"/>
                <a class="inputDateButton" href="javascript:;">选择</a>
            </p>
            <p>
                <label>公示时间(截止)：</label>
                <input type="text" value="<?php echo $growth_publicity->date_to; ?>" name="date_to"  class="date" dateFmt="yyyy-MM-dd" readonly="true"/>
                <a class="inputDateButton" href="javascript:;">选择</a>
            </p>
            <p>
                <label>公示网址：</label>
                <input type="text" value="<?php echo $growth_publicity->url; ?>" name="url" class="textInput">
            </p>
            <p>
                <label>公示结果：</label>
                <input type="radio" name="result" value="1<?php if($growth_publicity->result) :?>" checked="checked<?php endif;?>" /> 通过
				<input type="radio" name="result" value="0<?php if(!$growth_publicity->result) :?>" checked="checked<?php endif;?>" /> 未通过
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
