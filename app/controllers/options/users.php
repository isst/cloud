<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * 用户相关选项
 */
class Users extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('options/option_model');
	}

	public function student_import() {
		$this->load->helper('column_select');
		$this->type = empty($_GET['type']) ? '' : $_GET['type'];
		$key = 'student_import_' . $this->type;
		if (empty($_POST)) {
			$this->columns = $this->option_model->getOption($key);
			$this->load->view('options/users/student_import', $this);
		} else {
			$data = $_POST['columns'];
			if ($this->option_model->setOption($key, $data)) {
				$ret = array(
					'statusCode' => '200',
					'message' => '设置成功',
					'navTabId' => 'options_student_import',
					'callbackType' => 'closeCurrent',
				);
			} else {
				$ret = array(
					'statusCode' => '300',
					'message' => '设置成功',
					'navTabId' => 'options_student_import',
					'callbackType' => 'closeCurrent',
				);
			}
			echo json_encode($ret);
		}
	}

}

/* End of file users.php */
/* Location: ./app/controllers/options/users.php */