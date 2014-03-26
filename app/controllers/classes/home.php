<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Home extends MY_Controller {

	function __construct() {
		// 设置各角色的访问权限
		$this->user_permit = array(
			'administrator' => array('index',),
			'teacher' => array('index',),
			'student' => array('index',),
			'enterprise' => array(),
		);
		parent::__construct();

		$this->load->model('classes/classes_model');
		$this->load->model('classes/member_model');
	}

	public function index() {
		$this->load->library('pagination');

		$id = empty($_GET['class_id']) ? 0 : (int) $_GET['class_id'];
		$this->class = $this->classes_model->getClass($id);
		$this->branch_secretary = $this->member_model->getSpecBranchMember($id, 1); // 支部书记
		$this->branch_publicity = $this->member_model->getSpecBranchMember($id, 2); // 支部宣传委员
		$this->branch_organizational = $this->member_model->getSpecBranchMember($id, 3); // 支部组织委员
		$this->class_monitor = $this->member_model->getSpecMember($id, 1); // 班长
		$this->load->view('classes/home', $this);
	}

	/**
	 * 我的班级(学生)
	 */
	public function student_home() {
		$this->class = $this->classes_model->getClass($_SESSION['user']->class_id);
		if (!$this->class) {
			$ret = array(
				'statusCode' => '300',
				'message' => '对不起，您尚未被分配到班级中',
				'navTabId' => 'student_home',
				'callbackType' => 'closeCurrent',
			);
			die(json_encode($ret));
		}
		$this->branch_secretary = $this->member_model->getSpecBranchMember($this->class->id, 1); // 支部书记
		$this->branch_publicity = $this->member_model->getSpecBranchMember($this->class->id, 2); // 支部宣传委员
		$this->branch_organizational = $this->member_model->getSpecBranchMember($this->class->id, 3); // 支部组织委员
		$this->class_monitor = $this->member_model->getSpecMember($this->class->id, 1); // 班长
		$this->load->view('classes/student_home', $this);
	}

	/**
	 * 我的班级(教师)
	 */
	public function teacher_home() {
		// 教师
		$this->class = $this->classes_model->getClassByClassAdviser($_SESSION['user']->id);
		if (!$this->class) {
			$ret = array(
				'statusCode' => '300',
				'message' => '对不起，你不是德育导师，没有班级相关信息可供查看',
				'navTabId' => 'teacher_home',
				'callbackType' => 'closeCurrent',
			);
			die(json_encode($ret));
		}
		$this->branch_secretary = $this->member_model->getSpecBranchMember($this->class->id, 1); // 支部书记
		$this->branch_publicity = $this->member_model->getSpecBranchMember($this->class->id, 2); // 支部宣传委员
		$this->branch_organizational = $this->member_model->getSpecBranchMember($this->class->id, 3); // 支部组织委员
		$this->class_monitor = $this->member_model->getSpecMember($this->class->id, 1); // 班长
		$this->load->view('classes/home', $this);
	}

}

/* End of file home.php */
/* Location: ./app/controllers/classes/home.php */