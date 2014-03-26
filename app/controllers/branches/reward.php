<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * 支部表扬
 */
class Reward extends MY_Controller {

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
		$this->load->model('branches/reward_model');
	}

	/**
	 * Index Page for this controller.
	 *
	 */
	public function index() {
		$this->load->library('pagination');
		$class_id = empty($_GET['class_id']) ? 0 : (int) $_GET['class_id'];

		$this->branch = $this->branch_model->getBranch($class_id);
		$this->pagination->total($this->reward_model->countRewards($class_id));
		$this->rewards = $this->reward_model->getRewards($class_id);
		if ('student' == $this->user_type) {
			$this->load->view('branches/reward/list_noadmin', $this);
		} else {
			$this->load->view('branches/reward/list', $this);
		}
	}

	// 按学生列表
	public function student_list() {
		$this->load->library('pagination');
		$this->student_id = empty($_GET['student_id']) ? 0 : (int) $_GET['student_id'];

		$this->pagination->total($this->reward_model->countRewardsByStudent($this->student_id));
		$this->rewards = $this->reward_model->getRewardsByStudent($this->student_id);
		$this->load->view('branches/reward/student_list', $this);
	}

	public function add() {
		$this->class_id = (int) $_GET['class_id'];
		if (empty($_POST)) {
			$this->load->model('branches/member_model');
			$this->members = $this->member_model->getAllMembers($this->class_id);
			$this->load->view('branches/reward/add', $this);
		} else {
			$data = array(
				'class_id' => $this->class_id,
				'student_id' => (int) $_POST['student_id'],
				'title' => $_POST['title'],
				'time' => $_POST['time'],
				'content' => $_POST['content'],
			);
			if ($this->reward_model->addReward($data)) {
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
			$this->reward = $this->reward_model->getReward($this->id);
			$this->load->model('branches/member_model');
			$this->members = $this->member_model->getAllMembers($this->reward->class_id);
			$this->load->view('branches/reward/edit', $this);
		} else {
			$data = array(
				'student_id' => $_POST['student_id'],
				'title' => $_POST['title'],
				'time' => $_POST['time'],
				'content' => $_POST['content'],
			);
			if ($this->reward_model->editReward($this->id, $data)) {
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
		if ($this->reward_model->delReward($this->id)) {
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
		$this->reward = $this->reward_model->getReward($this->id);
		$this->load->view('branches/reward/view', $this);
	}

}

/* End of file reward.php */
/* Location: ./app/controllers/branches/reward.php */