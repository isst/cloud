
<div class="pageContent">
    <form method="post" action="branches/announcement/edit.html?id=<?php echo $announcement->id; ?>" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">
        <div class="pageFormContent" layoutH="56">
            <p>
                <label>标题：</label>
                <input type="text" value="<?php echo $announcement->title; ?>" name="title" class="textInput">
            </p>
            <p>
                <label>时间：</label>
                <input type="text" value="<?php echo $announcement->time; ?>" name="time" class="date" dateFmt="yyyy-MM-dd HH:mm:ss" readonly="true"/>
                <a class="inputDateButton" href="javascript:;">选择</a>
            </p>
            <p>
                <label>内容：</label>
                <textarea class="editor" tools="mini" name="content" rows="12" style="width: 600px;"><?php echo $announcement->content; ?></textarea>
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
