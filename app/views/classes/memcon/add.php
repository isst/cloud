
<div class="pageContent">
    <form method="post" action="classes/memcon/add.html?class_id=<?php isset($class_id) and print $class_id; ?>&amp;talker_type=<?php isset($talker_type) and print $talker_type; ?>&amp;type=<?php isset($type) and print $type; ?>" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">
        <div class="pageFormContent" layoutH="56">
            <p>
                <label>学生姓名：</label>
                <?php
                if (isset($talker_type) && $talker_type == 'administrator') {
                ?>
                    <input type="text" readonly="readonly" value="" name="student_name" class="required textInput">
                    <input name="student_id" type="hidden" value=""/>
                    <a class="btnLook" href="users/student/lookup.html" target="dialog" mask="true" rel="" lookupGroup="">查找带回</a>
                <?php
                } else {
                ?>
                    <select name="student_id">
                        <?php foreach ($members as $member): ?>
                            <option value="<?php echo $member->id; ?>"><?php echo $member->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                <?php
                }
                ?>
            </p>
            <p>
                <label>主题：</label>
                <input type="text" value="" name="title" class="textInput">
            </p>
            <?php
            if (isset($talker_type) && $talker_type == 'administrator') {
                ?>
                <p>
                    <label>谈话者：</label>
                    <input type="text" value="" name="talker_name" class="textInput">
                </p>
            <?php
            }
            ?>
            <p>
                <label>谈话时间：</label>
                <input type="text" name="time" class="date" dateFmt="yyyy-MM-dd" readonly="true"/>
                <a class="inputDateButton" href="javascript:;">选择</a>
            </p>
            <p>
                <label>内容：</label>
                <textarea class="editor" tools="mini" name="content" rows="12" style="width: 600px;"></textarea>
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
