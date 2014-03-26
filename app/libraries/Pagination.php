<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class MY_Pagination {
	var $total = 0;

	public function __construct($total = null) {
		$this->per = empty($_POST['numPerPage']) ? 20 : $_POST['numPerPage'];
		$this->cur = empty($_POST['pageNum']) ? 1 : $_POST['pageNum'];
		if($total){
			$this->total($total);
		}
	}

	public function total($total){
		$this->total = $total;
		//$CI = & get_instance();
		//$CI->pagination = $this;
	}

}

// END Pagination Class

/* End of file Pagination.php */
/* Location: ./app/libraries/Pagination.php */