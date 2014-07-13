
<div class="pageContent">
    <form method="post" action="classes/memcon/edit.html?id=<?php echo $memcon->id; ?>" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">
        <div class="pageFormContent" layoutH="56">
            <p>
                <label>学生姓名：</label>
                <?php
                if (isset($talker_type) && $talker_type == 'administrator') {
                    ?>
                    <input type="text" readonly="readonly" value="<?php echo $memcon->student_name; ?>" name="student_name" class="required textInput">
                    <input name="student_id" type="hidden" value="<?php echo $memcon->student_id; ?>"/>
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
                <input type="text" value="<?php echo $memcon->title; ?>" name="title" class="textInput">
            </p>
            <?php
            if (isset($talker_type) && $talker_type == 'administrator') {
                ?>
                <p>
                    <label>谈话者：</label>
                    <input type="text" value="<?php echo $memcon->talker_name; ?>" name="talker_name" class="textInput">
                </p>
            <?php
            }
            ?>
            <p>
                <label>谈话时间：</label>
                <input type="text" value="<?php echo $memcon->time; ?>" name="time" class="date" dateFmt="yyyy-MM-dd" readonly="true"/>
                <a class="inputDateButton" href="javascript:;">选择</a>
            </p>
			<p>
                <label>内容：(教师)</label><label><?php echo $memcon->inputtime; ?></label>
                <textarea class="editor" tools="mini" name="content" rows="8" style="width: 600px;"><?php echo $memcon->content; ?></textarea>
            </p>

            <?php
            if (isset($talker_type) && $talker_type != 'administrator') {
            ?>
			<p>
				<input type="hidden" name="hid_type" value="<?php echo $hid_type;?>"/>
                <label>内容：(超级管理员)</label><label><?php echo $memcon->updatetime; ?></label>
                <textarea class="<?php if('administrator'==$user_type){?>editor<?php }?>" tools="mini" name="admin_content" rows="8"<?php if('administrator'!=$user_type){?> disabled="disabled"<?php }?> style="width: 600px;"><?php echo $memcon->admin_content; ?></textarea>
            </p>
            <?php
            }
            ?>

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
