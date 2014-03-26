<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * 企业导师
 */
class Enterprise extends MY_Controller {

	function __construct() {
		parent::__construct();

		$this->load->model('user_model');
	}

	public function index() {
		$this->load->library('pagination');

		$this->pagination->total($this->user_model->countEnterprises());
		$this->enterprises = $this->user_model->getEnterprises();
		$this->load->view('users/enterprise/list', $this);
	}

	public function add() {
		if (empty($_POST)) {
			$this->load->view('users/enterprise/add');
		} else {
			$data = array(
				'password' => crypt($_POST['password']),
				'username' => $_POST['username'],
				'name' => $_POST['name'],
			);
			if ($this->user_model->addEnterprise($data)) {
				$ret = array(
					'statusCode' => '200',
					'message' => '添加成功',
					'navTabId' => 'users_enterprise',
					'callbackType' => 'closeCurrent',
				);
			} else {
				$ret = array(
					'statusCode' => '300',
					'message' => '添加失败',
					'navTabId' => 'users_enterprise',
					'callbackType' => 'closeCurrent',
				);
			}
			echo json_encode($ret);
		}
	}

	public function edit() {
		$this->id = empty($_GET['id']) ? 0 : (int) $_GET['id'];
		$this->enterprise = $this->user_model->getEnterprise($this->id);
		if (empty($_POST)) {
			$this->load->view('users/enterprise/edit', $this);
		} else {
			$data = array(
				'name' => $_POST['name'],
			);
			if (!empty($_POST['password'])) {
				$data['password'] = crypt($_POST['password']);
			}
			if ($this->user_model->editEnterprise($this->id, $data)) {
				$ret = array(
					'statusCode' => '200',
					'message' => '修改成功',
					'navTabId' => 'users_enterprise',
					'callbackType' => 'closeCurrent',
				);
			} else {
				$ret = array(
					'statusCode' => '300',
					'message' => '修改失败',
					'navTabId' => 'users_enterprise',
					'callbackType' => 'closeCurrent',
				);
			}
			echo json_encode($ret);
		}
	}

	public function del() {
		$this->id = empty($_GET['id']) ? 0 : (int) $_GET['id'];
		if ($this->user_model->delEnterprise($this->id)) {
			$ret = array(
				'statusCode' => '200',
				'message' => '删除成功',
				'navTabId' => 'users_enterprise',
			);
		} else {
			$ret = array(
				'statusCode' => '300',
				'message' => '删除失败',
				'navTabId' => 'users_enterprise',
			);
		}
		echo json_encode($ret);
	}

	public function view() {
		$this->id = empty($_GET['id']) ? 0 : (int) $_GET['id'];
		$this->enterprise = $this->user_model->getEnterprise($this->id);
		$this->load->view('users/enterprise/view', $this);
	}

}

/* End of file enterprise.php */
/* Location: ./app/controllers/users/enterprise.php */