<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * 专业方向
 */
class Major_field extends MY_Controller {

	function __construct() {
		// 设置各角色的访问权限
		$this->user_permit = array(
			'administrator' => array('index', 'add', 'edit', 'del'),
		);
		parent::__construct();
		$this->load->model('classes/major_field_model');
	}

	/**
	 * 专业方向列表
	 */
	public function index() {

		$this->load->library('pagination');
		$this->pagination->total($this->major_field_model->countMajor_fields());
		$this->major_fields = $this->major_field_model->getMajor_fields();
		$this->load->view('classes/major_field/list', $this);
	}

	/**
	 * 创建专业方向
	 */
	public function add() {
		if (empty($_POST)) {
			$this->load->view('classes/major_field/add', $this);
		} else {
			$data = array(
				'name' => @$_POST['name'],
			);
			if ($this->major_field_model->addMajor_field($data)) {
				$ret = array(
					'statusCode' => '200',
					'message' => '添加成功',
					'navTabId' => 'major_field',
					'callbackType' => 'closeCurrent',
				);
			} else {
				$ret = array(
					'statusCode' => '300',
					'message' => '添加失败',
					'navTabId' => 'major_field',
					'callbackType' => 'closeCurrent',
				);
			}
			echo json_encode($ret);
		}
	}

	/**
	 * 编辑专业方向
	 */
	public function edit() {
		$id = (int) $_GET['id'];
		$this->major_field = $this->major_field_model->getMajor_field($id);
		if (empty($_POST)) {
			$this->load->view('classes/major_field/edit', $this);
		} else {
			$data = array(
				'name' => @$_POST['name'],
			);
			if ($this->major_field_model->editMajor_field($id, $data)) {
				$ret = array(
					'statusCode' => '200',
					'message' => '修改专业方向信息成功',
					'navTabId' => 'major_field',
					'callbackType' => 'closeCurrent',
				);
			} else {
				$ret = array(
					'statusCode' => '300',
					'message' => '修改专业方向信息失败',
					'navTabId' => 'major_field',
					'callbackType' => 'closeCurrent',
				);
			}
			echo json_encode($ret);
		}
	}

	/**
	 * 删除专业方向
	 */
	public function del() {
		$this->id = empty($_GET['id']) ? 0 : (int) $_GET['id'];
		if ($this->major_field_model->delMajor_field($this->id)) {
			$ret = array(
				'statusCode' => '200',
				'message' => '删除成功',
				'navTabId' => 'major_field',
			);
		} else {
			$ret = array(
				'statusCode' => '300',
				'message' => '删除失败',
				'navTabId' => 'major_field',
			);
		}
		echo json_encode($ret);
	}

}

/* End of file major_field.php */
/* Location: ./app/controllers/classes/major_field.php */