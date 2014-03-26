<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * 补助项目
 */
class Hardship_item extends MY_Controller {

	function __construct() {
		// 设置各角色的访问权限
		$this->user_permit = array(
			'administrator' => array('index', 'view', 'add', 'edit', 'del'),
			'teacher' => array('view',),
			'student' => array('index', 'view',),
			'enterprise' => array(),
		);
		parent::__construct();
		$this->load->model('classes/hardship_item_model');
		$this->load->model('user_model');
	}

	/**
	 * 补助项目列表
	 */
	public function index() {

		$this->load->library('pagination');
		if ('student' == $this->user->user_type) {
			$this->pagination->total($this->hardship_item_model->countEnabledHardship_items());
			$this->hardship_items = $this->hardship_item_model->getEnabledHardship_items();
		} else {
			$this->pagination->total($this->hardship_item_model->countHardship_items());
			$this->hardship_items = $this->hardship_item_model->getHardship_items();
		}
		$this->load->view('classes/hardship_item/list', $this);
	}

	/**
	 * 创建补助项目
	 */
	public function add() {
		if (empty($_POST)) {
			$this->load->view('classes/hardship_item/add', $this);
		} else {
			$data = array(
				'title' => @$_POST['title'],
				'enabled' => @$_POST['enabled'],
				'content' => @$_POST['content'],
			);
			if ($this->hardship_item_model->addHardship_item($data)) {
				$ret = array(
					'statusCode' => '200',
					'message' => '添加成功',
					'navTabId' => 'hardship_item',
					'callbackType' => 'closeCurrent',
				);
			} else {
				$ret = array(
					'statusCode' => '300',
					'message' => '添加失败',
					'navTabId' => 'hardship_item',
					'callbackType' => 'closeCurrent',
				);
			}
			echo json_encode($ret);
		}
	}

	/**
	 * 编辑补助项目
	 */
	public function edit() {
		$id = (int) $_GET['id'];
		$this->hardship_item = $this->hardship_item_model->getHardship_item($id);
		if (empty($_POST)) {
			$this->load->view('classes/hardship_item/edit', $this);
		} else {
			$data = array(
				'title' => $_POST['title'],
				'enabled' => @$_POST['enabled'],
				'content' => $_POST['content'],
			);
			if ($this->hardship_item_model->editHardship_item($id, $data)) {
				$ret = array(
					'statusCode' => '200',
					'message' => '修改补助项目信息成功',
					'navTabId' => 'hardship_item',
					'callbackType' => 'closeCurrent',
				);
			} else {
				$ret = array(
					'statusCode' => '300',
					'message' => '修改补助项目信息失败',
					'navTabId' => 'hardship_item',
					'callbackType' => 'closeCurrent',
				);
			}
			echo json_encode($ret);
		}
	}

	/**
	 * 查看补助项目
	 */
	public function view() {
		$id = (int) $_GET['id'];
		$this->hardship_item = $this->hardship_item_model->getHardship_item($id);
		$this->load->view('classes/hardship_item/view', $this);
	}

	/**
	 * 删除补助项目
	 */
	public function del() {
		$this->id = empty($_GET['id']) ? 0 : (int) $_GET['id'];
		if ($this->hardship_item_model->delHardship_item($this->id)) {
			$ret = array(
				'statusCode' => '200',
				'message' => '删除成功',
				'navTabId' => 'hardship_item',
			);
		} else {
			$ret = array(
				'statusCode' => '300',
				'message' => '删除失败',
				'navTabId' => 'hardship_item',
			);
		}
		echo json_encode($ret);
	}

}

/* End of file hardship_item.php */
/* Location: ./app/controllers/classes/hardship_item.php */