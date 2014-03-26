<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * 支部奖惩
 */
class Reward_penalty extends MY_Controller {

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
	 * 加载支部奖惩页面
	 *
	 */
	public function index() {
		$this->class_id = empty($_GET['class_id']) ? 0 : (int) $_GET['class_id'];
		$this->load->view('branches/reward_penalty', $this);
	}

}

/* End of file announcement.php */
/* Location: ./app/controllers/branches/reward_penalty.php */