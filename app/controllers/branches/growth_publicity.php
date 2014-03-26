<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * 发展公示
 */
class Growth_publicity extends MY_Controller {

	function __construct() {
		// 设置各角色的访问权限
		$this->user_permit = array(
			'administrator' => array('index', 'view', 'add', 'edit', 'del', 'review',),
			'teacher' => array('index', 'view', 'edit', 'del', 'review',),
			'student' => array('apply', 'apply_view'),
			'enterprise' => array(),
		);
		parent::__construct();

		$this->load->model('branches/branch_model');
		$this->load->model('branches/member_model');
		$this->load->model('branches/growth_publicity_model');
	}

	public function index() {
		$this->load->library('pagination');
		$class_id = empty($_GET['class_id']) ? 0 : (int) $_GET['class_id'];

		$this->branch = $this->branch_model->getBranch($class_id);
		$this->pagination->total($this->growth_publicity_model->countGrowthPublicities($class_id));
		$this->growth_publicitys = $this->growth_publicity_model->getGrowthPublicities($class_id);
		$this->load->view('branches/growth_publicity/list', $this);
	}

	public function add() {
		$this->class_id = (int) $_GET['class_id'];
		if (empty($_POST)) {
			$this->load->model('branches/member_model');
			$this->members = $this->member_model->getAllMembers($this->class_id);
			$this->load->view('branches/growth_publicity/add', $this);
		} else {
			$data = array(
				'class_id' => $this->class_id,
				'student_id' => (int) $_POST['student_id'],
				'date_from' => @$_POST['date_from'],
				'date_to' => @$_POST['date_to'],
				'url' => @$_POST['url'],
				'result' => empty($_POST['result']) ? 0 : 1,
			);
			if ($this->growth_publicity_model->addGrowthPublicity($data)) {
				$ret = array(
					'statusCode' => '200',
					'message' => '添加成功',
					'rel' => 'excellent_full_box',
					'callbackType' => 'closeCurrent',
				);
			} else {
				$ret = array(
					'statusCode' => '300',
					'message' => '添加失败',
					'rel' => 'excellent_full_box',
					'callbackType' => 'closeCurrent',
				);
			}
			echo json_encode($ret);
		}
	}

	public function edit() {
		$this->id = empty($_GET['id']) ? 0 : (int) $_GET['id'];
		if (empty($_POST)) {
			$this->growth_publicity = $this->growth_publicity_model->getGrowthPublicity($this->id);
			$this->load->model('branches/member_model');
			$this->members = $this->member_model->getAllMembers($this->growth_publicity->class_id);
			$this->load->view('branches/growth_publicity/edit', $this);
		} else {
			$data = array(
				'student_id' => (int) $_POST['student_id'],
				'date_from' => @$_POST['date_from'],
				'date_to' => @$_POST['date_to'],
				'url' => @$_POST['url'],
				'result' => empty($_POST['result']) ? 0 : 1,
			);
			if ($this->growth_publicity_model->editGrowthPublicity($this->id, $data)) {
				$ret = array(
					'statusCode' => '200',
					'message' => '修改成功',
					'rel' => 'excellent_full_box',
					'callbackType' => 'closeCurrent',
				);
			} else {
				$ret = array(
					'statusCode' => '300',
					'message' => '修改失败',
					'rel' => 'excellent_full_box',
					'callbackType' => 'closeCurrent',
				);
			}
			echo json_encode($ret);
		}
	}

	public function del() {
		$this->id = empty($_GET['id']) ? 0 : (int) $_GET['id'];
		if ($this->growth_publicity_model->delGrowthPublicity($this->id)) {
			$ret = array(
				'statusCode' => '200',
				'message' => '删除成功',
				'rel' => 'excellent_full_box',
			);
		} else {
			$ret = array(
				'statusCode' => '300',
				'message' => '删除失败',
				'rel' => 'excellent_full_box',
			);
		}
		echo json_encode($ret);
	}

	/**
	 * 成为发展对象
	 */
	public function review() {
		$this->load->model('branches/member_model');
		$this->id = empty($_GET['id']) ? 0 : (int) $_GET['id'];
		$growth_publicity = $this->growth_publicity_model->getGrowthPublicity($this->id);
		if (!$growth_publicity->result) {
			$ret = array(
				'statusCode' => '300',
				'message' => '公示结果没有通过',
				'rel' => 'excellent_full_box',
			);
			die(json_encode($ret));
		}
		$member = $this->member_model->getMember($growth_publicity->student_id);
		if ($member->branch_status > 1) {
			$ret = array(
				'statusCode' => '200',
				'message' => '该成员已成为发展对象',
				'rel' => 'excellent_full_box',
			);
			die(json_encode($ret));
		}
		// 通过审核，成为积极分子
		if ($this->member_model->editMember($growth_publicity->student_id, array('branch_status' => 2,))) {
			$ret = array(
				'statusCode' => '200',
				'message' => '升级为发展对象成功',
				'rel' => 'excellent_full_box',
			);
			die(json_encode($ret));
		}
		$ret = array(
			'statusCode' => '300',
			'message' => '审核失败',
			'rel' => 'excellent_full_box',
		);
		echo json_encode($ret);
	}

}

/* End of file growth_publicity.php */
/* Location: ./app/controllers/branches/growth_publicity.php */