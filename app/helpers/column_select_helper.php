<?php

function column_select($name) {
	$CI = & get_instance();
	$columns = $CI->columns;
	echo '<select name="columns[', $name, ']">';
	echo '<option value="">未指定</option>';
	foreach (array('', 'A', 'B', 'C') as $prefix) {
		for ($i = ord('A'); $i <= ord('Z'); $i++) {
			$col_name = $prefix . chr($i);
			echo '<option value="', $col_name;
			if ($columns && isset($columns[$name]) && ($columns[$name] == $col_name)) {
				echo '" selected ="selected';
			}
			echo '">', $col_name, '</option>';
		}
	}
	echo '</select>';
}
?>