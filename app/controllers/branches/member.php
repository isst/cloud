<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * 支部成员
 */
class Member extends MY_Controller {

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
		$this->load->model('branches/member_model');
	}

	public function index() {
		$this->load->library('pagination');
		$class_id = empty($_GET['class_id']) ? 0 : (int) $_GET['class_id'];

		$this->branch = $this->branch_model->getBranch($class_id);
		$this->pagination->total($this->member_model->countMembers($class_id));
		$this->members = $this->member_model->getMembers($class_id);

		$this->load->view('branches/member/list', $this);
	}

	public function add() {
		$this->class_id = empty($_GET['class_id']) ? 0 : (int) $_GET['class_id'];

		if (empty($_POST)) {
			$this->students = $this->member_model->getAllNonMembers($this->class_id);
			if (empty($this->students)) {
				$ret = array(
					'statusCode' => '300',
					'message' => '该班级成员已全部加入党支部',
					'navTabId' => 'branch_member',
					'callbackType' => 'closeCurrent',
				);
				die(json_encode($ret));
			}
			$this->load->view('branches/member/add', $this);
		} else {
			$data = array(
				'politics_status' => (int) $_POST['politics_status'],
				'branch_status' => (int) $_POST['branch_status'],
				'branch_title' => (int) $_POST['branch_title'],
			);
			if (empty($data['politics_status'])) {
				$ret = array(
					'statusCode' => '300',
					'message' => '政治面貌至少更改为共青团员才能在成员列表中显示',
					'rel' => 'branch_member',
					'callbackType' => 'closeCurrent',
				);
				die(json_encode($ret));
			}
			if ($id = (int) $_POST['id'] and $this->member_model->editMember($id, $data)) {
				$ret = array(
					'statusCode' => '200',
					'message' => '添加成员成功',
					'rel' => 'branch_member',
					'callbackType' => 'closeCurrent',
				);
			} else {
				$ret = array(
					'statusCode' => '300',
					'message' => '添加成员失败',
					'rel' => 'branch_member',
					'callbackType' => 'closeCurrent',
				);
			}
			echo json_encode($ret);
		}
	}

	public function edit() {
		$this->id = empty($_GET['id']) ? 0 : (int) $_GET['id'];
		$this->member = $this->member_model->getMember($this->id);
		if (empty($_POST)) {
			$this->load->view('branches/member/edit', $this);
		} else {
			$data = array(
				'politics_status' => (int) $_POST['politics_status'],
				'branch_status' => (int) $_POST['branch_status'],
				'branch_title' => (int) $_POST['branch_title'],
				'party_dues_paid' => $_POST['party_dues_paid'],
				'party_school_learning' => $_POST['party_school_learning'],
				'party_family' => $_POST['party_family'],
			);
			if ($this->member_model->editMember($this->id, $data)) {
				$ret = array(
					'statusCode' => '200',
					'message' => '修改成员成功',
					'rel' => 'branch_member',
					'callbackType' => 'closeCurrent',
				);
			} else {
				$ret = array(
					'statusCode' => '300',
					'message' => '修改成员失败',
					'rel' => 'branch_member',
					'callbackType' => 'closeCurrent',
				);
			}
			echo json_encode($ret);
		}
	}

}

/* End of file member.php */
/* Location: ./app/controllers/branches/member.php */