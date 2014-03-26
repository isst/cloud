<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * 用人单位
 */
class Unit extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('user_model');
	}

	public function index() {
		$this->load->library('pagination');

		$this->pagination->total($this->user_model->countUnits());
		$this->units = $this->user_model->getUnits();
		$this->load->view('users/unit/list', $this);
	}

	public function add() {
		if (empty($_POST)) {
			$this->load->view('users/unit/add');
		} else {
			$data = array(
				'password' => crypt($_POST['password']),
				'username' => $_POST['username'],
				'name' => $_POST['name'],
			);
			if ($this->user_model->addUnit($data)) {
				$ret = array(
					'statusCode' => '200',
					'message' => '添加成功',
					'navTabId' => 'users_unit',
					'callbackType' => 'closeCurrent',
				);
			} else {
				$ret = array(
					'statusCode' => '300',
					'message' => '添加失败',
					'navTabId' => 'users_unit',
					'callbackType' => 'closeCurrent',
				);
			}
			echo json_encode($ret);
		}
	}

	public function edit() {
		$this->id = empty($_GET['id']) ? 0 : (int) $_GET['id'];
		$this->unit = $this->user_model->getUnit($this->id);
		if (empty($_POST)) {
			$this->load->view('users/unit/edit', $this);
		} else {
			$data = array(
				'name' => $_POST['name'],
			);
			if (!empty($_POST['password'])) {
				$data['password'] = crypt($_POST['password']);
			}
			if ($this->user_model->editUnit($this->id, $data)) {
				$ret = array(
					'statusCode' => '200',
					'message' => '修改成功',
					'navTabId' => 'users_unit',
					'callbackType' => 'closeCurrent',
				);
			} else {
				$ret = array(
					'statusCode' => '300',
					'message' => '修改失败',
					'navTabId' => 'users_unit',
					'callbackType' => 'closeCurrent',
				);
			}
			echo json_encode($ret);
		}
	}

	public function del() {
		$this->id = empty($_GET['id']) ? 0 : (int) $_GET['id'];
		if ($this->user_model->delUnit($this->id)) {
			$ret = array(
				'statusCode' => '200',
				'message' => '删除成功',
				'navTabId' => 'users_unit',
			);
		} else {
			$ret = array(
				'statusCode' => '300',
				'message' => '删除失败',
				'navTabId' => 'users_unit',
			);
		}
		echo json_encode($ret);
	}

	public function view() {
		$this->id = empty($_GET['id']) ? 0 : (int) $_GET['id'];
		$this->unit = $this->user_model->getUnit($this->id);
		$this->load->view('users/unit/view', $this);
	}

}

/* End of file unit.php */
/* Location: ./app/controllers/users/unit.php */