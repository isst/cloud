<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * 三助申请
 */
class Aid_request extends MY_Controller {

	function __construct() {
		// 设置各角色的访问权限
		$this->user_permit = array(
			'teacher' => array('index', 'view', 'review', 'bulk_review',),
			'student' => array('index', 'view', 'add', 'edit'),
			'unit' => array('index', 'view', 'review', 'bulk_review',),
			'enterprise' => array(),
		);
		parent::__construct();

		$this->load->model('classes/aid_item_model');
		$this->load->model('classes/aid_request_model');
		$this->require_status_names = array(
			'等待德育导师审批',
			'德育导师审核未通过',
			'德育导师已通过，等待用人单位审批',
			'用人单位审核未通过',
			'用人单位已通过，等待研工部审批',
			'研工部审核未通过',
			'研工部审核已通过',
		);
	}

	/**
	 * 三助申请列表
	 */
	public function index() {

		$this->load->library('pagination');
		$student_id = empty($_GET['student_id']) ? 0 : (int) $_GET['student_id'];
		if ($student_id) {
			$this->pagination->total($this->aid_request_model->countAid_requestsByStudent($student_id));
			$this->aid_requests = $this->aid_request_model->getAid_requestsByStudent($student_id);
		} else {
			switch ($this->user_type) {
				case 'student':
					$this->pagination->total($this->aid_request_model->countAid_requestsByStudent($this->user->id));
					$this->aid_requests = $this->aid_request_model->getAid_requestsByStudent($this->user->id);
					break;
				case 'teacher':
					$this->pagination->total($this->aid_request_model->countAid_requestsByClassAdviser($this->user->id));
					$this->aid_requests = $this->aid_request_model->getAid_requestsByClassAdviser($this->user->id);
					break;
				case 'unit':
					$this->pagination->total($this->aid_request_model->countAid_requestsByUnit($this->user->id));
					$this->aid_requests = $this->aid_request_model->getAid_requestsByUnit($this->user->id);
					break;
				case 'administrator':
					$item_id = isset($_GET['item_id']) ? (int) $_GET['item_id'] : 0;
					$this->pagination->total($this->aid_request_model->countAid_requestsByAdmin($item_id));
					$this->aid_requests = $this->aid_request_model->getAid_requestsByAdmin($item_id);
					break;
				default:
					$this->pagination->total($this->aid_request_model->countAid_requests());
					$this->aid_requests = $this->aid_request_model->getAid_requests();
					break;
			}
		}

		$this->load->view('classes/aid_request/list', $this);
	}

	/**
	 * 创建三助申请
	 */
	public function add() {
		$this->item_id = empty($_GET['item_id']) ? 0 : (int) $_GET['item_id'];
		if ($this->aid_request_model->isAidItemRequestedByStudent($this->user->id, $this->item_id)) {
			$ret = array(
				'statusCode' => '300',
				'message' => '您已申请过该岗位!',
				'navTabId' => 'aid_request',
				'callbackType' => 'closeCurrent',
			);
			die(json_encode($ret));
		}

		$request_count = $this->aid_request_model->countAid_requestsByStudent($this->user->id);
		if ($request_count >= 2) {
			$ret = array(
				'statusCode' => '300',
				'message' => '已申请两个岗位，不允许再进行申请',
				'navTabId' => 'aid_request',
				'callbackType' => 'closeCurrent',
			);
			die(json_encode($ret));
		}
		if (empty($_POST)) {
			$this->load->model('classes/classes_model');
			$this->class = $this->classes_model->getClass($this->user->class_id);
			$this->load->view('classes/aid_request/add', $this);
		} else {
			$data = array(
				'request_time' => date('Y-m-d H:i:s'),
				'item_id' => $this->item_id,
				'student_id' => $this->user->id,
				'bedroom_tel' => @$_POST['bedroom_tel'],
				'cellphone' => @$_POST['cellphone'],
				'stipend' => @$_POST['stipend'],
				'scholarship' => @$_POST['scholarship'],
				'student_loan' => @$_POST['student_loan'],
				'strong_point' => @$_POST['strong_point'],
				'family_info' => @$_POST['family_info'],
			);
			if ($this->aid_request_model->addAid_request($data)) {
				$ret = array(
					'statusCode' => '200',
					'message' => '申请成功',
					'navTabId' => 'aid_request',
					'callbackType' => 'closeCurrent',
				);
			} else {
				$ret = array(
					'statusCode' => '300',
					'message' => '添加失败',
					'navTabId' => 'aid_request',
					'callbackType' => 'closeCurrent',
				);
			}
			die(json_encode($ret));
		}
	}

	/**
	 * 编辑三助申请
	 */
	public function edit() {
		$id = (int) $_GET['id'];
		$this->aid_request = $this->aid_request_model->getAid_request($id);
		if ($this->aid_request->status) {
			$ret = array(
				'statusCode' => '300',
				'message' => '已经过审批的申请不能再修改!',
				'navTabId' => 'aid_request',
			);
			die(json_encode($ret));
		}
		if (empty($_POST)) {
			$this->load->model('classes/member_model');
			$this->student = $this->member_model->getMember($this->aid_request->student_id);
			$this->load->model('classes/classes_model');
			$this->class = $this->classes_model->getClass($this->student->class_id);
			$this->load->view('classes/aid_request/edit', $this);
		} else {
			$data = array(
				'request_time' => date('Y-m-d H:i:s'),
				'bedroom_tel' => @$_POST['bedroom_tel'],
				'cellphone' => @$_POST['cellphone'],
				'stipend' => @$_POST['stipend'],
				'scholarship' => @$_POST['scholarship'],
				'student_loan' => @$_POST['student_loan'],
				'strong_point' => @$_POST['strong_point'],
				'family_info' => @$_POST['family_info'],
			);
			if ($this->aid_request_model->editAid_request($id, $data)) {
				$ret = array(
					'statusCode' => '200',
					'message' => '修改三助申请信息成功',
					'navTabId' => 'aid_request',
					'callbackType' => 'closeCurrent',
				);
			} else {
				$ret = array(
					'statusCode' => '300',
					'message' => '修改三助申请信息失败',
					'navTabId' => 'aid_request',
					'callbackType' => 'closeCurrent',
				);
			}
			echo json_encode($ret);
		}
	}

	/**
	 * 查看三助申请
	 */
	public function view() {
		$id = (int) $_GET['id'];
		$this->aid_request = $this->aid_request_model->getAid_request($id);

		$this->load->model('classes/member_model');
		$this->student = $this->member_model->getMember($this->aid_request->student_id);

		$this->load->view('classes/aid_request/view', $this);
	}

	/**
	 * 打印三助申请
	 */
	public function print_view() {
		$id = (int) $_GET['id'];
		$this->aid_request = $this->aid_request_model->getAid_request($id);

		$this->load->model('classes/member_model');
		$this->student = $this->member_model->getMember($this->aid_request->student_id);

		$this->load->view('classes/aid_request/print', $this);
	}

	/**
	 * 删除三助申请
	 */
	public function del() {
		$this->id = empty($_GET['id']) ? 0 : (int) $_GET['id'];
		if ($this->aid_request_model->delAid_request($this->id)) {
			$ret = array(
				'statusCode' => '200',
				'message' => '删除成功',
				'navTabId' => 'aid_request',
			);
		} else {
			$ret = array(
				'statusCode' => '300',
				'message' => '删除失败',
				'navTabId' => 'aid_request',
			);
		}
		echo json_encode($ret);
	}

	public function review() {
		$this->id = empty($_GET['id']) ? 0 : (int) $_GET['id'];
		if ($_POST) {
			$request = $this->aid_request_model->getAid_request($this->id);
			switch ($this->user_type) {
				case 'teacher':
					$user_status_plus = 0;
					break;
				case 'unit':
					$user_status_plus = 2;
					break;
				case 'administrator':
					$user_status_plus = 4;
					break;
				default:
					$user_status_plus = 0;
					break;
			}
			$new_status = @$_POST['status'] + $user_status_plus;
			if ($request->status > 2 + $user_status_plus) {
				$ret = array(
					'statusCode' => '300',
					'message' => '后续部门已进行审核操作，不允许再更改审核状态！',
				);
				die(json_encode($ret));
			}
			$data = array(
				'status' => $new_status,
			);
			if ($this->aid_request_model->editAid_request($this->id, $data)) {
				$ret = array(
					'statusCode' => '200',
					'message' => '审核成功',
					'callbackType' => 'closeCurrent',
					'navTabId' => 'aid_request',
				);
				die(json_encode($ret));
			}
			$ret = array(
				'statusCode' => '300',
				'message' => '审核失败',
			);
			die(json_encode($ret));
		} else {
			$this->load->view('classes/aid_request/review', $this);
		}
	}

	public function bulk_review() {
		if (empty($_POST) || empty($_GET['status'])) {
			$ret = array(
				'statusCode' => '300',
				'message' => '审核失败',
			);
			die(json_encode($ret));
		} else {
			$this->ids = empty($_POST['ids']) ? '' : $_POST['ids'];
			$ids = explode(',', $this->ids);

			switch ($this->user_type) {
				case 'teacher':
					$user_status_plus = 0;
					break;
				case 'unit':
					$user_status_plus = 2;
					break;
				case 'administrator':
					$user_status_plus = 4;
					break;
				default:
					$user_status_plus = 0;
					break;
			}
			$new_status = (int) $_GET['status'] + $user_status_plus;
			foreach ($ids as $id) {
				$request = $this->aid_request_model->getAid_request($id);
				if ($request->status > 2 + $user_status_plus) {
					# 后续部门已进行审核操作，不允许再更改审核状态，跳过处理
					continue;
				}
				$data = array(
					'status' => $new_status,
				);
				$this->aid_request_model->editAid_request($id, $data);
			}
			$ret = array(
				'statusCode' => '200',
				'message' => '审核操作成功',
				'navTabId' => 'aid_request',
			);
			die(json_encode($ret));
		}
	}

}

/* End of file aid_request.php */
/* Location: ./app/controllers/classes/aid_request.php */