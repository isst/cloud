<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * 奖项
 */
class Scholarship_item extends MY_Controller {

	function __construct() {
		// 设置各角色的访问权限
		$this->user_permit = array(
			'administrator' => array('index', 'view', 'add', 'edit', 'del'),
			'teacher' => array('view',),
			'student' => array('index', 'view',),
			'enterprise' => array(),
		);
		parent::__construct();
		$this->load->model('classes/scholarship_item_model');
		$this->load->model('user_model');
	}

	/**
	 * 奖项列表
	 */
	public function index() {

		$this->load->library('pagination');
		if ('student' == $this->user->user_type) {
			$this->pagination->total($this->scholarship_item_model->countEnabledScholarship_items());
			$this->scholarship_items = $this->scholarship_item_model->getEnabledScholarship_items();
		} else {
			$this->pagination->total($this->scholarship_item_model->countScholarship_items());
			$this->scholarship_items = $this->scholarship_item_model->getScholarship_items();
		}
		$this->load->view('classes/scholarship_item/list', $this);
	}

	/**
	 * 创建奖项
	 */
	public function add() {
		if (empty($_POST)) {
			$this->load->view('classes/scholarship_item/add', $this);
		} else {
			$data = array(
				'title' => @$_POST['title'],
				'money' => @$_POST['money'],
				'enabled' => @$_POST['enabled'],
				'content' => @$_POST['content'],
			);
			if ($this->scholarship_item_model->addScholarship_item($data)) {
				$ret = array(
					'statusCode' => '200',
					'message' => '添加成功',
					'navTabId' => 'scholarship_item',
					'callbackType' => 'closeCurrent',
				);
			} else {
				$ret = array(
					'statusCode' => '300',
					'message' => '添加失败',
					'navTabId' => 'scholarship_item',
					'callbackType' => 'closeCurrent',
				);
			}
			echo json_encode($ret);
		}
	}

	/**
	 * 编辑奖项
	 */
	public function edit() {
		$id = (int) $_GET['id'];
		$this->scholarship_item = $this->scholarship_item_model->getScholarship_item($id);
		if (empty($_POST)) {
			$this->load->view('classes/scholarship_item/edit', $this);
		} else {
			$data = array(
				'title' => $_POST['title'],
				'money' => $_POST['money'],
				'enabled' => @$_POST['enabled'],
				'content' => $_POST['content'],
			);
			if ($this->scholarship_item_model->editScholarship_item($id, $data)) {
				$ret = array(
					'statusCode' => '200',
					'message' => '修改奖项信息成功',
					'navTabId' => 'scholarship_item',
					'callbackType' => 'closeCurrent',
				);
			} else {
				$ret = array(
					'statusCode' => '300',
					'message' => '修改奖项信息失败',
					'navTabId' => 'scholarship_item',
					'callbackType' => 'closeCurrent',
				);
			}
			echo json_encode($ret);
		}
	}

	/**
	 * 查看奖项
	 */
	public function view() {
		$id = (int) $_GET['id'];
		$this->scholarship_item = $this->scholarship_item_model->getScholarship_item($id);
		$this->load->view('classes/scholarship_item/view', $this);
	}

	/**
	 * 删除奖项
	 */
	public function del() {
		$this->id = empty($_GET['id']) ? 0 : (int) $_GET['id'];
		if ($this->scholarship_item_model->delScholarship_item($this->id)) {
			$ret = array(
				'statusCode' => '200',
				'message' => '删除成功',
				'navTabId' => 'scholarship_item',
			);
		} else {
			$ret = array(
				'statusCode' => '300',
				'message' => '删除失败',
				'navTabId' => 'scholarship_item',
			);
		}
		echo json_encode($ret);
	}

}

/* End of file scholarship_item.php */
/* Location: ./app/controllers/classes/scholarship_item.php */