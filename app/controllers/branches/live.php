<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * 支部生活
 */
class Live extends MY_Controller {

	function __construct() {
		// 设置各角色的访问权限
		$this->user_permit = array(
			'administrator' => array('index', 'view', 'add', 'edit', 'del',),
			'teacher' => array('index', 'view',),
			'student' => array('index', 'view', 'add', 'edit', 'del',),
			'enterprise' => array(),
		);
		parent::__construct();

		$this->load->model('branches/branch_model');
		$this->load->model('branches/live_model');
	}

	public function index() {
		$this->load->library('pagination');
		$class_id = empty($_GET['class_id']) ? 0 : (int) $_GET['class_id'];

		$this->branch = $this->branch_model->getBranch($class_id);
		$this->pagination->total($this->live_model->countLives($class_id));
		$this->lives = $this->live_model->getLives($class_id);
		$this->load->view('branches/live/list', $this);
	}

	public function add() {
		if (empty($_POST)) {
			$this->class_id = (int) $_GET['class_id'];
			$this->load->model('classes/member_model');
			$this->students = $this->member_model->getAllMembers($this->class_id);
			$this->load->view('branches/live/add', $this);
		} else {
			$peoples = empty($_POST['peoples']) ? '' : implode(',', array_filter($_POST['peoples'], 'intval'));
			$data = array(
				'class_id' => (int) $_GET['class_id'],
				'date' => $_POST['date'],
				'title' => $_POST['title'],
				'place' => $_POST['place'],
				'content' => $_POST['content'],
				'peoples' => $peoples,
			);
			if ($this->live_model->addLive($data)) {
				$ret = array(
					'statusCode' => '200',
					'message' => '添加成功',
					'rel' => 'branch_live',
					'callbackType' => 'closeCurrent',
				);
			} else {
				$ret = array(
					'statusCode' => '300',
					'message' => '添加失败',
					'rel' => 'branch_live',
					'callbackType' => 'closeCurrent',
				);
			}
			echo json_encode($ret);
		}
	}

	public function edit() {
		$this->id = empty($_GET['id']) ? 0 : (int) $_GET['id'];
		$this->live = $this->live_model->getLive($this->id);
		if (empty($_POST)) {
			$this->live->peoples = explode(',', $this->live->peoples);
			$this->load->model('classes/member_model');
			$this->students = $this->member_model->getAllMembers($this->live->class_id);
			$this->load->view('branches/live/edit', $this);
		} else {
			$peoples = empty($_POST['peoples']) ? '' : implode(',', array_filter($_POST['peoples'], 'intval'));
			$data = array(
				'title' => $_POST['title'],
				'date' => $_POST['date'],
				'place' => $_POST['place'],
				'content' => $_POST['content'],
				'peoples' => $peoples,
			);
			if ($this->live_model->editLive($this->id, $data)) {
				$ret = array(
					'statusCode' => '200',
					'message' => '修改成功',
					'rel' => 'branch_live',
					'callbackType' => 'closeCurrent',
				);
			} else {
				$ret = array(
					'statusCode' => '300',
					'message' => '修改失败',
					'rel' => 'branch_live',
					'callbackType' => 'closeCurrent',
				);
			}
			echo json_encode($ret);
		}
	}

	public function del() {
		$this->id = empty($_GET['id']) ? 0 : (int) $_GET['id'];
		if ($this->live_model->delLive($this->id)) {
			$ret = array(
				'statusCode' => '200',
				'message' => '删除成功',
				'rel' => 'branch_live',
			);
		} else {
			$ret = array(
				'statusCode' => '300',
				'message' => '删除失败',
				'rel' => 'branch_live',
			);
		}
		echo json_encode($ret);
	}

	public function view() {
		$this->id = empty($_GET['id']) ? 0 : (int) $_GET['id'];
		$this->live = $this->live_model->getLive($this->id);
		$this->live->peoples = explode(',', $this->live->peoples);
		$this->load->model('classes/member_model');
		$this->students = $this->member_model->getAllMembers($this->live->class_id);
		$this->load->view('branches/live/view', $this);
	}

}

/* End of file live.php */
/* Location: ./app/controllers/branches/live.php */