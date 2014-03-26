<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * 支部入党志愿书
 */
class Ideal extends MY_Controller {

	function __construct() {
		// 设置各角色的访问权限
		$this->user_permit = array(
			'administrator' => array('index', 'view', 'add', 'edit', 'del',),
			'teacher' => array('index', 'view', 'add', 'edit', 'del',),
			'student' => array('index',),
			'enterprise' => array(),
		);
		parent::__construct();

		$this->load->model('branches/branch_model');
		$this->load->model('branches/ideal_model');
	}

	/**
	 * Index Page for this controller.
	 *
	 */
	public function index() {
		$this->load->library('pagination');
		$class_id = empty($_GET['class_id']) ? 0 : (int) $_GET['class_id'];

		$this->branch = $this->branch_model->getBranch($class_id);
		$this->pagination->total($this->ideal_model->countIdeals($class_id));
		$this->ideals = $this->ideal_model->getIdeals($class_id);
		$this->load->view('branches/ideal/list', $this);
	}

	public function add() {
		$this->class_id = (int) $_GET['class_id'];
		if (empty($_POST)) {
			$this->load->model('branches/member_model');
			$this->members = $this->member_model->getAllMembers($this->class_id);
			$this->load->view('branches/ideal/add', $this);
		} else {
			$data = array(
				'class_id' => $this->class_id,
				'student_id' => (int) $_POST['student_id'],
				'result' => empty($_POST['result']) ? 0 : 1,
				'date_from' => @$_POST['date_from'],
				'notes' => @$_POST['notes'],
			);
			if ($this->ideal_model->addIdeal($data)) {
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
			$this->ideal = $this->ideal_model->getIdeal($this->id);
			$this->load->model('branches/member_model');
			$this->members = $this->member_model->getAllMembers($this->ideal->class_id);
			$this->load->view('branches/ideal/edit', $this);
		} else {
			$data = array(
				'student_id' => (int) $_POST['student_id'],
				'result' => empty($_POST['result']) ? 0 : 1,
				'date_from' => @$_POST['date_from'],
				'notes' => @$_POST['notes'],
			);
			if ($this->ideal_model->editIdeal($this->id, $data)) {
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
		if ($this->ideal_model->delIdeal($this->id)) {
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
	 * 成为预备党员
	 */
	public function review() {
		$this->load->model('branches/member_model');
		$this->id = empty($_GET['id']) ? 0 : (int) $_GET['id'];
		$ideal = $this->ideal_model->getIdeal($this->id);
		if (!$ideal->result) {
			$ret = array(
				'statusCode' => '300',
				'message' => '审核结果没有通过',
				'rel' => 'excellent_full_box',
			);
			die(json_encode($ret));
		}
		$member = $this->member_model->getMember($ideal->student_id);
		if ($member->branch_status > 2) {
			$ret = array(
				'statusCode' => '200',
				'message' => '该成员已成为预备党员',
				'rel' => 'excellent_full_box',
			);
			die(json_encode($ret));
		}
		// 通过审核，成为积极分子
		if ($this->member_model->editMember($ideal->student_id, array('branch_status' => 3,))) {
			$ret = array(
				'statusCode' => '200',
				'message' => '升级为预备党员成功',
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

/* End of file ideal.php */
/* Location: ./app/controllers/branches/ideal.php */