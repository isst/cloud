<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * 管理员
 */
class Administrator extends MY_Controller {

	function __construct() {
		parent::__construct();

		$this->load->model('user_model');
	}

	/**
	 * Index Page for this controller.
	 *
	 */
	public function index() {
		$this->load->library('pagination');

		$this->pagination->total($this->user_model->countAdministrators());
		$this->administrators = $this->user_model->getAdministrators();
		$this->load->view('users/administrator/list', $this);
	}

	public function add() {
		if (empty($_POST)) {
			$this->load->view('users/administrator/add');
		} else {
			$data = array(
				'password' => crypt($_POST['password']),
				'username' => $_POST['username'],
				'name' => $_POST['name'],
				'sexual' => $_POST['sexual'],
			);
			if ($this->user_model->addAdministrator($data)) {
				$ret = array(
					'statusCode' => '200',
					'message' => '添加成功',
					'navTabId' => 'users_administrator',
					'callbackType' => 'closeCurrent',
				);
			} else {
				$ret = array(
					'statusCode' => '300',
					'message' => '添加失败',
					'navTabId' => 'users_administrator',
					'callbackType' => 'closeCurrent',
				);
			}
			echo json_encode($ret);
		}
	}

	public function edit() {
		$this->id = empty($_GET['id']) ? 0 : (int) $_GET['id'];
		$this->administrator = $this->user_model->getAdministrator($this->id);
		if (empty($_POST)) {
			$this->load->view('users/administrator/edit', $this);
		} else {
			$data = array(
				'name' => $_POST['name'],
				'sexual' => $_POST['sexual'],
			);
			if (!empty($_POST['password'])) {
				$data['password'] = crypt($_POST['password']);
			}
			if ($this->user_model->editAdministrator($this->id, $data)) {
				$ret = array(
					'statusCode' => '200',
					'message' => '修改成功',
					'navTabId' => 'users_administrator',
					'callbackType' => 'closeCurrent',
				);
			} else {
				$ret = array(
					'statusCode' => '300',
					'message' => '修改失败',
					'navTabId' => 'users_administrator',
					'callbackType' => 'closeCurrent',
				);
			}
			echo json_encode($ret);
		}
	}

	public function del() {
		$this->id = empty($_GET['id']) ? 0 : (int) $_GET['id'];
		// TODO: 判断是否是自己
		if ($this->user_model->delAdministrator($this->id)) {
			$ret = array(
				'statusCode' => '200',
				'message' => '删除成功',
				'navTabId' => 'users_administrator',
			);
		} else {
			$ret = array(
				'statusCode' => '300',
				'message' => '删除失败',
				'navTabId' => 'users_administrator',
			);
		}
		echo json_encode($ret);
	}

	public function view() {
		$this->id = empty($_GET['id']) ? 0 : (int) $_GET['id'];
		$this->administrator = $this->user_model->getAdministrator($this->id);
		$this->load->view('users/administrator/view', $this);
	}

}

/* End of file administrator.php */
/* Location: ./app/controllers/users/administrator.php */