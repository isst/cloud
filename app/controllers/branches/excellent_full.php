<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * 推优与转正
 */
class Excellent_full extends MY_Controller {

	function __construct() {
		// 设置各角色的访问权限
		$this->user_permit = array(
			'administrator' => array('index',),
			'teacher' => array('index',),
			'student' => array('index',),
			'enterprise' => array(),
		);
		parent::__construct();
	}

	/**
	 * 加载推优与转正页面
	 *
	 */
	public function index() {
		$this->class_id = empty($_GET['class_id']) ? 0 : (int) $_GET['class_id'];
		$this->load->view('branches/excellent_full', $this);
	}

	/**
	 * 加载推优与转正页面(学生)
	 *
	 */
	public function student_list() {
		$this->class_id = empty($_GET['class_id']) ? 0 : (int) $_GET['class_id'];
		$this->load->view('branches/student_excellent_full', $this);
	}

}

/* End of file announcement.php */
/* Location: ./app/controllers/branches/excellent_full.php */