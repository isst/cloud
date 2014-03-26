
<div class="pageContent">
    <form method="post" action="classes/member/edit.html?id=<?php echo $member->id; ?>" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">
        <div class="pageFormContent" layoutH="56">
            <p>
                <label>用户名：</label>
                <input type="text" value="<?php echo $member->username; ?>" name="username" class="textInput" readonly="readonly">
            </p>
            <p>
                <label>姓名：</label>
                <input type="text" value="<?php echo $member->name; ?>" name="name" class="textInput">
            </p>
            <p>
                <label>性别：</label>
                <select name="sexual">
                    <option value="">请选择</option>
                    <option value="男<?php if ('男' == $member->sexual): ?>" selected="selected<?php endif; ?>">男</option>
                    <option value="女<?php if ('女' == $member->sexual): ?>" selected="selected<?php endif; ?>">女</option>
                </select>
            </p>
            <p>
                <label>联系电话：</label>
                <input type="text" value="<?php echo $member->tel; ?>" name="tel" class="textInput">
            </p>
            <p>
                <label>邮箱：</label>
                <input type="text" value="<?php echo $member->email; ?>" name="email" class="textInput">
            </p>
            <p>
                <label>寝室号：</label>
                <input type="text" value="<?php echo $member->bedroom; ?>" name="bedroom" class="textInput">
            </p>
            <p>
                <label>班级职务：</label>
                <select name="class_title">
                    <option value="0<?php if (0 == $member->class_title): ?>" selected="selected<?php endif; ?>">无职务</option>
                    <option value="1<?php if (1 == $member->class_title): ?>" selected="selected<?php endif; ?>">班长</option>
                    <option value="2<?php if (2 == $member->class_title): ?>" selected="selected<?php endif; ?>">学习委员</option>
                </select>
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
