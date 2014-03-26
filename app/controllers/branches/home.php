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

		$this->load->model('branches/branch_model');
		$this->load->model('branches/member_model');
	}

	public function index() {
		$class_id = empty($_GET['class_id']) ? 0 : (int) $_GET['class_id'];
		$this->branch = $this->branch_model->getBranch($class_id);
		$this->branch_secretary = $this->member_model->getSpecMember($class_id, 1); // 支部书记
		$this->branch_publicity = $this->member_model->getSpecMember($class_id, 2); // 支部宣传委员
		$this->branch_organizational = $this->member_model->getSpecMember($class_id, 3); // 支部组织委员
		$this->load->view('branches/home', $this);
	}

	public function student_home() {
		// 学生
		$this->branch = $this->branch_model->getBranch($_SESSION['user']->class_id);
		if (!$this->branch) {
			$ret = array(
				'statusCode' => '300',
				'message' => '您所在班级尚未成立党支部',
				'navTabId' => 'student_home',
				'callbackType' => 'closeCurrent',
			);
			die(json_encode($ret));
		}
		if (!$this->member_model->getMember($_SESSION['user']->id)) {
			$ret = array(
				'statusCode' => '300',
				'message' => '您尚未入党，暂时不能查看支部信息',
				'navTabId' => 'student_home',
				'callbackType' => 'closeCurrent',
			);
			die(json_encode($ret));
		}
		$this->branch_secretary = $this->member_model->getSpecMember($this->branch->id, 1); // 支部书记
		$this->branch_publicity = $this->member_model->getSpecMember($this->branch->id, 2); // 支部宣传委员
		$this->branch_organizational = $this->member_model->getSpecMember($this->branch->id, 3); // 支部组织委员
		$this->load->view('branches/student_home', $this);
	}

	public function teacher_home() {
		// 教师
		$this->branch = $this->branch_model->getBranchByInstructor($_SESSION['user']->id);
		if (!$this->branch) {
			$ret = array(
				'statusCode' => '300',
				'message' => '对不起，你不是支部指导老师，没有支部相关信息可供查看',
				'navTabId' => 'teacher_home',
				'callbackType' => 'closeCurrent',
			);
			die(json_encode($ret));
		}
		$this->branch_secretary = $this->member_model->getSpecMember($this->branch->id, 1); // 支部书记
		$this->branch_publicity = $this->member_model->getSpecMember($this->branch->id, 2); // 支部宣传委员
		$this->branch_organizational = $this->member_model->getSpecMember($this->branch->id, 3); // 支部组织委员
		$this->load->view('branches/home', $this);
	}

}

/* End of file home.php */
/* Location: ./app/controllers/branches/home.php */