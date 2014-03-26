
<div class="pageContent">
    <form method="post" action="branches/penalty/add.html?class_id=<?php echo $class_id; ?>" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">
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
                <label>标题：</label>
                <input type="text" value="" name="title" class="textInput">
            </p>
            <p>
                <label>公告时间：</label>
                <input type="text" name="time" class="date" dateFmt="yyyy-MM-dd HH:mm:ss" readonly="true"/>
                <a class="inputDateButton" href="javascript:;">选择</a>
            </p>
            <p>
                <label>内容：</label>
                <textarea class="editor" tools="mini" name="content" rows="12" style="width: 645px ;height: 400px;"></textarea>
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
