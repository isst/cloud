<script type="text/javascript">
    $(function() {
        $("#internship_edit_form").submit(function() {
            $("#internship_time").val($("#internship_time_start").val() + "至" + $("#internship_time_end").val());
            return validateCallback(this, dialogAjaxDone);
        });

        $("#internship_time_start").datepicker();
        $("#internship_time_end").datepicker();
    });
</script>
<div class="pageContent">
	<form method="post" action="classes/internship/edit.html?id=<?php echo $internship->id; ?>&adminId=<?php echo @$_GET['adminId'];?>" class="pageForm required-validate" id="internship_edit_form">
		<div layoutH="56">
			<p style="margin: 5px;">
				<label>实习公司：</label>
				<input name="company" class="required textInput" type="text" size="30" value="<?php echo $internship->company; ?>"<?php echo $canUpdateCompany?'':' disabled="disabled"'?>/>
			</p>
            <p style="margin: 5px;">
                <label>城市：</label>
                <select name="city_id">
                    <?php
                    foreach ($cities as $cityId => $cityName) {
                        echo sprintf('<option value="%s"%s>%s</option>', $cityId, $internship->city_id == $cityId ? ' selected="selected"' : '', $cityName);
                    }
                    echo sprintf('<option value="0"%s>其他</option>', $internship->city_id == 0 ? ' selected="selected"' : '');
                    ?>
                </select>
            </p>
			<p style="margin: 5px;">
				<label>住宿地址：</label>
				<input name="lodging" class="required textInput" type="text" size="30" value="<?php echo $internship->lodging; ?>"/>

                <p style="margin-left: 10px;">西溪校区范例：浙江大学西溪校区X舍XXX室<br />
                在外住宿范例：上海市浦东新区华夏X路景东苑X幢－XXX</p>
			</p>
			<!--<p style="margin: 5px;">
				<label>本人联系方式：</label>
				<input name="contact" class="required textInput" type="text" size="30" value="<?php //echo $internship->contact; ?>"/>
			</p>-->
			<p style="margin: 5px;">
				<label>公司负责人：</label>
				<input name="principal" class="required textInput" type="text" size="30" value="<?php echo $internship->principal; ?>"/>
			</p>
			<p style="margin: 5px;">
				<label>负责人联系方式：</label>
				<input name="principal_contact" class="required textInput" type="text" size="30" value="<?php echo $internship->principal_contact; ?>"/>
			</p>
			<p style="margin: 5px;">
				<label>公司地址：</label>
				<input name="company_addr" class="required textInput" type="text" size="30" value="<?php echo $internship->company_addr; ?>"/>
			</p>
			<p style="margin: 5px;">
				<label>实习起止时间：</label>
                <?php
                $internshipTimes = explode("至", $internship->internship_time);
                $internshipStartTime = isset($internshipTimes[0]) ? $internshipTimes[0] : "";
                $internshipEndTime = isset($internshipTimes[1]) ? $internshipTimes[1] : "";
                ?>
				<input name="internship_time" class="required textInput" type="hidden" value="<?php echo $internship->internship_time; ?>"/>
                <input name="internship_time" type="hidden" id="internship_time" />
                从<input class="required textInput" type="text" size="20" value="<?php echo $internshipStartTime;?>" id="internship_time_start" />
                到<input class="required textInput" type="text" size="20" value="<?php echo $internshipEndTime;?>" id="internship_time_end" />
			</p>
			<p style="margin: 5px;">
				<label style="float: left; display: block; padding-top: 2px;">实习内容：</label>
                <textarea name="internship_content" class="required textInput"  style="width: 400px; height: 100px;"><?php echo $internship->internship_content; ?></textarea>
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
