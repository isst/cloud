<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * 三助岗位
 */
class Aid_item extends MY_Controller {

	function __construct() {
		// 设置各角色的访问权限
		$this->user_permit = array(
			'administrator' => array('index', 'view', 'add', 'edit', 'del'),
			'teacher' => array('view',),
			'unit' => array('view',),
			'student' => array('index', 'view',),
			'enterprise' => array(),
		);
		parent::__construct();
		$this->load->model('classes/aid_item_model');
		$this->load->model('user_model');

		// 三助类型名
		$this->aid_type_names = array(
			'助管',
			'助研',
			'助教',
		);
	}

	/**
	 * 三助岗位列表
	 */
	public function index() {

		$this->load->library('pagination');
		if ('student' == $this->user->user_type) {
			$this->pagination->total($this->aid_item_model->countEnabledAid_items());
			$this->aid_items = $this->aid_item_model->getEnabledAid_items();
		} else {
			$this->pagination->total($this->aid_item_model->countAid_items());
			$this->aid_items = $this->aid_item_model->getAid_items();
		}
		$this->load->view('classes/aid_item/list', $this);
	}

	/**
	 * 创建三助岗位
	 */
	public function add() {
		if (empty($_POST)) {
			$this->units = $this->user_model->getUnits();
			$this->load->view('classes/aid_item/add', $this);
		} else {
			$data = array(
				'title' => @$_POST['title'],
				'type' => @$_POST['type'],
				'money' => @$_POST['money'],
				'unit_id' => @$_POST['unit_id'],
				'enabled' => @$_POST['enabled'],
				'content' => @$_POST['content'],
			);
			if ($this->aid_item_model->addAid_item($data)) {
				$ret = array(
					'statusCode' => '200',
					'message' => '添加成功',
					'navTabId' => 'aid_item',
					'callbackType' => 'closeCurrent',
				);
			} else {
				$ret = array(
					'statusCode' => '300',
					'message' => '添加失败',
					'navTabId' => 'aid_item',
					'callbackType' => 'closeCurrent',
				);
			}
			echo json_encode($ret);
		}
	}

	/**
	 * 编辑三助岗位
	 */
	public function edit() {
		$id = (int) $_GET['id'];
		$this->aid_item = $this->aid_item_model->getAid_item($id);
		if (empty($_POST)) {
			$this->units = $this->user_model->getUnits();
			$this->load->view('classes/aid_item/edit', $this);
		} else {
			$data = array(
				'title' => $_POST['title'],
				'type' => @$_POST['type'],
				'money' => @$_POST['money'],
				'unit_id' => @$_POST['unit_id'],
				'enabled' => @$_POST['enabled'],
				'content' => $_POST['content'],
			);
			if ($this->aid_item_model->editAid_item($id, $data)) {
				$ret = array(
					'statusCode' => '200',
					'message' => '修改三助岗位信息成功',
					'navTabId' => 'aid_item',
					'callbackType' => 'closeCurrent',
				);
			} else {
				$ret = array(
					'statusCode' => '300',
					'message' => '修改三助岗位信息失败',
					'navTabId' => 'aid_item',
					'callbackType' => 'closeCurrent',
				);
			}
			echo json_encode($ret);
		}
	}

	/**
	 * 查看三助岗位
	 */
	public function view() {
		$id = (int) $_GET['id'];
		$this->aid_item = $this->aid_item_model->getAid_item($id);
		$this->load->view('classes/aid_item/view', $this);
	}

	/**
	 * 删除三助岗位
	 */
	public function del() {
		$this->id = empty($_GET['id']) ? 0 : (int) $_GET['id'];
		if ($this->aid_item_model->delAid_item($this->id)) {
			$ret = array(
				'statusCode' => '200',
				'message' => '删除成功',
				'navTabId' => 'aid_item',
			);
		} else {
			$ret = array(
				'statusCode' => '300',
				'message' => '删除失败',
				'navTabId' => 'aid_item',
			);
		}
		echo json_encode($ret);
	}

}

/* End of file aid_item.php */
/* Location: ./app/controllers/classes/aid_item.php */