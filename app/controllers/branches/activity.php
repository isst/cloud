<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * 支部活动
 */
class Activity extends MY_Controller {

	function __construct() {
		// 设置各角色的访问权限
		$this->user_permit = array(
			'administrator' => array('index', 'view', 'add', 'edit', 'del', 'review',),
			'teacher' => array('index', 'view',),
			'student' => array('index', 'view', 'add', 'edit', 'del', 'apply', 'report',),
			'enterprise' => array(),
		);
		parent::__construct();

		$this->load->model('branches/branch_model');
		$this->load->model('branches/activity_model');
		$this->activity_type_names = array(
			'娱乐型',
			'素质拓展型',
		);
		$this->activity_status_names = array(
			'未处理',
			'未通过',
			'通过',
		);
	}

	public function index() {
		$this->load->library('pagination');
		$class_id = empty($_GET['class_id']) ? 0 : (int) $_GET['class_id'];

		$this->branch = $this->branch_model->getBranch($class_id);
		$this->pagination->total($this->activity_model->countActivitys($class_id));
		$this->activities = $this->activity_model->getActivitys($class_id);
		$this->load->view('branches/activity/list', $this);
	}

	/**
	 * 活动申请
	 */
	public function apply() {
		if (empty($_POST)) {
			$this->class_id = (int) $_GET['class_id'];
			$this->load->model('classes/member_model');
			$this->students = $this->member_model->getAllMembers($this->class_id);
			$this->load->view('branches/activity/apply', $this);
		} else {
			$plan_peoples = empty($_POST['plan_peoples']) ? '' : implode(',', array_filter($_POST['plan_peoples'], 'intval'));
			$data = array(
				'class_id' => (int) @$_GET['class_id'],
				'type' => @$_POST['type'],
				'title' => @$_POST['title'],
				'date' => @$_POST['date'],
				'place' => @$_POST['place'],
				'people_plan' => @$_POST['people_plan'],
				'content' => @$_POST['content'],
				'activity_budget' => @$_POST['activity_budget'],
				'plan_peoples' => $plan_peoples,
			);
			if ($this->activity_model->addActivity($data)) {
				$ret = array(
					'statusCode' => '200',
					'message' => '添加成功',
					'rel' => 'branch_activity',
					'callbackType' => 'closeCurrent',
				);
			} else {
				$ret = array(
					'statusCode' => '300',
					'message' => '添加失败',
					'rel' => 'branch_activity',
					'callbackType' => 'closeCurrent',
				);
			}
			echo json_encode($ret);
		}
	}

	public function add() {
		if (empty($_POST)) {
			$this->class_id = (int) $_GET['class_id'];
			$this->load->view('branches/activity/add', $this);
		} else {
			$data = array(
				'class_id' => (int) $_GET['class_id'],
				'type' => $_POST['type'],
				'title' => $_POST['title'],
				'date' => $_POST['date'],
				'place' => $_POST['place'],
				'people_plan' => $_POST['people_plan'],
				'people_actual' => $_POST['people_actual'],
				'activity_budget' => $_POST['activity_budget'],
				'approval_amount' => $_POST['approval_amount'],
				'money_usage' => $_POST['money_usage'],
				'photo' => $_POST['photo'],
				'video' => $_POST['video'],
				'summary' => $_POST['summary'],
				'detail' => $_POST['detail'],
			);
			if ($this->activity_model->addActivity($data)) {
				$ret = array(
					'statusCode' => '200',
					'message' => '添加成功',
					'rel' => 'branch_activity',
					'callbackType' => 'closeCurrent',
				);
			} else {
				$ret = array(
					'statusCode' => '300',
					'message' => '添加失败',
					'rel' => 'branch_activity',
					'callbackType' => 'closeCurrent',
				);
			}
			echo json_encode($ret);
		}
	}

	public function edit() {
		$this->id = empty($_GET['id']) ? 0 : (int) $_GET['id'];
		$this->activity = $this->activity_model->getActivity($this->id);
		if (empty($_POST)) {
			$this->activity->plan_peoples = explode(',', $this->activity->plan_peoples);
			$this->activity->actual_peoples = explode(',', $this->activity->actual_peoples);
			$this->load->model('classes/member_model');
			$this->students = $this->member_model->getAllMembers($this->activity->class_id);
			$this->load->view('branches/activity/edit', $this);
		} else {
			$plan_peoples = empty($_POST['plan_peoples']) ? '' : implode(',', array_filter($_POST['plan_peoples'], 'intval'));
			$actual_peoples = empty($_POST['actual_peoples']) ? '' : implode(',', array_filter($_POST['actual_peoples'], 'intval'));
			$data = array(
				'type' => $_POST['type'],
				'title' => $_POST['title'],
				'date' => $_POST['date'],
				'place' => $_POST['place'],
				'people_plan' => $_POST['people_plan'],
				'people_actual' => $_POST['people_actual'],
				'plan_peoples' => $plan_peoples,
				'actual_peoples' => $actual_peoples,
				'content' => $_POST['content'],
				'activity_budget' => $_POST['activity_budget'],
				'money_usage' => $_POST['money_usage'],
				'summary' => $_POST['summary'],
			);
			if ($this->activity_model->editActivity($this->id, $data)) {
				$ret = array(
					'statusCode' => '200',
					'message' => '修改成功',
					'rel' => 'branch_activity',
					'callbackType' => 'closeCurrent',
				);
			} else {
				$ret = array(
					'statusCode' => '300',
					'message' => '修改失败',
					'rel' => 'branch_activity',
					'callbackType' => 'closeCurrent',
				);
			}
			echo json_encode($ret);
		}
	}

	public function report() {
		$this->id = empty($_GET['id']) ? 0 : (int) $_GET['id'];
		$this->activity = $this->activity_model->getActivity($this->id);
		$this->activity->actual_peoples = explode(',', $this->activity->actual_peoples);
		if (empty($_POST)) {
			$this->load->model('classes/member_model');
			$this->students = $this->member_model->getAllMembers($this->activity->class_id);
			$this->load->view('branches/activity/report', $this);
		} else {
			$actual_peoples = empty($_POST['actual_peoples']) ? '' : implode(',', array_filter($_POST['actual_peoples'], 'intval'));
			$data = array(
				'money_usage' => $_POST['money_usage'],
				'people_actual' => $_POST['people_actual'],
				'actual_peoples' => $actual_peoples,
				'summary' => $_POST['summary'],
			);
			if ($this->activity_model->editActivity($this->id, $data)) {
				$ret = array(
					'statusCode' => '200',
					'message' => '修改成功',
					'rel' => 'branch_activity',
					'callbackType' => 'closeCurrent',
				);
			} else {
				$ret = array(
					'statusCode' => '300',
					'message' => '修改失败',
					'rel' => 'branch_activity',
					'callbackType' => 'closeCurrent',
				);
			}
			echo json_encode($ret);
		}
	}

	public function del() {
		$this->id = empty($_GET['id']) ? 0 : (int) $_GET['id'];
		if ($this->activity_model->delActivity($this->id)) {
			$ret = array(
				'statusCode' => '200',
				'message' => '删除成功',
				'rel' => 'branch_activity',
			);
		} else {
			$ret = array(
				'statusCode' => '300',
				'message' => '删除失败',
				'rel' => 'branch_activity',
			);
		}
		echo json_encode($ret);
	}

	/**
	 * 主题活动审核
	 */
	public function review() {
		$this->load->model('branches/activity_model');
		$this->id = empty($_GET['id']) ? 0 : (int) $_GET['id'];
		if (empty($_POST)) {
			$this->activity = $this->activity_model->getActivity($this->id);
			$this->load->view('branches/activity/review', $this);
		} else {
			$data = array(
				'status' => (int) $_POST['status'],
				'approval_amount' => (int) $_POST['approval_amount'],
				'refuse_reason' => $_POST['refuse_reason'],
			);
			if ($this->activity_model->editActivity($this->id, $data)) {
				$ret = array(
					'statusCode' => '200',
					'message' => '审核成功',
					'rel' => 'branch_activity',
				);
			} else {
				$ret = array(
					'statusCode' => '300',
					'message' => '审核失败',
					'rel' => 'branch_activity',
				);
			}
			echo json_encode($ret);
		}
	}

	public function view() {
		$this->id = empty($_GET['id']) ? 0 : (int) $_GET['id'];
		$this->activity = $this->activity_model->getActivity($this->id);
		$this->activity->plan_peoples = explode(',', $this->activity->plan_peoples);
		$this->activity->actual_peoples = explode(',', $this->activity->actual_peoples);
		$this->load->model('classes/member_model');
		$this->students = $this->member_model->getAllMembers($this->activity->class_id);
		$this->load->view('branches/activity/view', $this);
	}

}

/* End of file activity.php */
/* Location: ./app/controllers/branches/activity.php */