<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * 支部警告
 */
class Penalty extends MY_Controller {

	function __construct() {
		// 设置各角色的访问权限
		$this->user_permit = array(
			'administrator' => array('index', 'view', 'add', 'edit', 'del', 'student_list',),
			'teacher' => array('index', 'view', 'add', 'edit', 'del', 'student_list',),
			'student' => array('index', 'view',),
			'enterprise' => array(),
		);
		parent::__construct();

		$this->load->model('branches/branch_model');
		$this->load->model('branches/penalty_model');
	}

	/**
	 * Index Page for this controller.
	 *
	 */
	public function index() {
		$this->load->library('pagination');
		$class_id = empty($_GET['class_id']) ? 0 : (int) $_GET['class_id'];

		$this->branch = $this->branch_model->getBranch($class_id);
		$this->pagination->total($this->penalty_model->countPenalties($class_id));
		$this->penalties = $this->penalty_model->getPenalties($class_id);
		if ('student' == $this->user_type) {
			$this->load->view('branches/penalty/list_noadmin', $this);
		} else {
			$this->load->view('branches/penalty/list', $this);
		}
	}

	/**
	 * Index Page for this controller.
	 *
	 */
	public function student_list() {
		$this->load->library('pagination');
		$this->student_id = empty($_GET['student_id']) ? 0 : (int) $_GET['student_id'];

		$this->pagination->total($this->penalty_model->countPenaltiesByStudent($this->student_id));
		$this->penalties = $this->penalty_model->getPenaltiesByStudent($this->student_id);
		$this->load->view('branches/penalty/student_list', $this);
	}

	public function add() {
		$this->class_id = (int) $_GET['class_id'];
		if (empty($_POST)) {
			$this->load->model('branches/member_model');
			$this->members = $this->member_model->getAllMembers($this->class_id);
			$this->load->view('branches/penalty/add', $this);
		} else {
			$data = array(
				'class_id' => $this->class_id,
				'student_id' => (int) $_POST['student_id'],
				'title' => $_POST['title'],
				'time' => $_POST['time'],
				'content' => $_POST['content'],
			);
			if ($this->penalty_model->addPenalty($data)) {
				$ret = array(
					'statusCode' => '200',
					'message' => '添加成功',
					'rel' => 'reward_penalty_box',
					'callbackType' => 'closeCurrent',
				);
			} else {
				$ret = array(
					'statusCode' => '300',
					'message' => '添加失败',
					'rel' => 'reward_penalty_box',
					'callbackType' => 'closeCurrent',
				);
			}
			echo json_encode($ret);
		}
	}

	public function edit() {
		$this->id = empty($_GET['id']) ? 0 : (int) $_GET['id'];
		if (empty($_POST)) {
			$this->penalty = $this->penalty_model->getPenalty($this->id);
			$this->load->model('branches/member_model');
			$this->members = $this->member_model->getAllMembers($this->penalty->class_id);
			$this->load->view('branches/penalty/edit', $this);
		} else {
			$data = array(
				'student_id' => $_POST['student_id'],
				'title' => $_POST['title'],
				'time' => $_POST['time'],
				'content' => $_POST['content'],
			);
			if ($this->penalty_model->editPenalty($this->id, $data)) {
				$ret = array(
					'statusCode' => '200',
					'message' => '修改成功',
					'rel' => 'reward_penalty_box',
					'callbackType' => 'closeCurrent',
				);
			} else {
				$ret = array(
					'statusCode' => '300',
					'message' => '修改失败',
					'rel' => 'reward_penalty_box',
					'callbackType' => 'closeCurrent',
				);
			}
			echo json_encode($ret);
		}
	}

	public function del() {
		$this->id = empty($_GET['id']) ? 0 : (int) $_GET['id'];
		if ($this->penalty_model->delPenalty($this->id)) {
			$ret = array(
				'statusCode' => '200',
				'message' => '删除成功',
				'rel' => 'reward_penalty_box',
			);
		} else {
			$ret = array(
				'statusCode' => '300',
				'message' => '删除失败',
				'rel' => 'reward_penalty_box',
			);
		}
		echo json_encode($ret);
	}

	public function view() {
		$this->id = empty($_GET['id']) ? 0 : (int) $_GET['id'];
		$this->penalty = $this->penalty_model->getPenalty($this->id);
		$this->load->view('branches/penalty/view', $this);
	}

}

/* End of file penalty.php */
/* Location: ./app/controllers/branches/penalty.php */