<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * 支部管理
 */
class Branch extends MY_Controller {

	function __construct() {
		// 设置各角色的访问权限
		$this->user_permit = array(
			'administrator' => array('index', 'grid', 'view', 'add', 'edit', 'del',),
			'teacher' => array(),
			'student' => array(),
			'enterprise' => array(),
		);
		parent::__construct();

		$this->load->model('classes/classes_model');
	}

	/**
	 * 支部列表
	 */
	public function index() {

		$this->load->library('pagination');

		$this->pagination->total($this->classes_model->countClasses());
		$this->branches = $this->classes_model->getClasses();
		$this->load->view('branches/branch/list', $this);
	}

	/**
	 * 支部网格
	 */
	public function grid() {

		$this->load->library('pagination');
        $this->pagination->per = 0;
		$this->pagination->total($this->classes_model->countClasses());
		$this->branches = $this->classes_model->getClasses();
		$this->load->view('branches/branch/grid', $this);
	}

}

/* End of file branch.php */
/* Location: ./app/controllers/branches/branch.php */