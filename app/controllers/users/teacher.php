<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * 教师
 */
class Teacher extends MY_Controller {

	function __construct() {
		// 设置各角色的访问权限
		$this->user_permit = array(
			'teacher' => array('view', 'edit'),
		);
		parent::__construct();

		$this->load->model('user_model');
	}

	public function index() {
		$this->load->library('pagination');

		$this->pagination->total($this->user_model->countTeachers());
		$this->teachers = $this->user_model->getTeachers();
		$this->load->view('users/teacher/list', $this);
	}

	public function lookup() {
		$this->load->library('pagination');

		// 根据教师类别来判断返回数据到哪个字段
		$teacher_type = $_GET['type'];
		if (in_array($teacher_type, array('class_adviser', 'major_adviser', 'branch_instructor'))) {
			$this->teacher_type = $teacher_type;
		}

		$this->pagination->total($this->user_model->countTeachers());
		$this->teachers = $this->user_model->getTeachers();
		$this->load->view('users/teacher/lookup', $this);
	}

	public function add() {
		if (empty($_POST)) {
			$this->load->view('users/teacher/add');
		} else {
			$data = array(
				'password' => crypt($_POST['password']),
				'username' => $_POST['username'],
				'name' => $_POST['name'],
				'sexual' => $_POST['sexual'],
				'contact' => $_POST['contact'],
			);
			if ($this->user_model->addTeacher($data)) {
				$ret = array(
					'statusCode' => '200',
					'message' => '添加成功',
					'navTabId' => 'users_teacher',
					'callbackType' => 'closeCurrent',
				);
			} else {
				$ret = array(
					'statusCode' => '300',
					'message' => '添加失败',
					'navTabId' => 'users_teacher',
					'callbackType' => 'closeCurrent',
				);
			}
			echo json_encode($ret);
		}
	}

	public function edit() {
		$this->id = empty($_GET['id']) ? 0 : (int) $_GET['id'];
		if ('teacher' == $this->user->user_type) {
			# 限制教师用户只能编辑自己的资料
			$this->id = $this->user->id;
		}
		$this->teacher = $this->user_model->getTeacher($this->id);
		if (empty($_POST)) {
			$this->load->view('users/teacher/edit', $this);
		} else {
			$data = array(
				'name' => $_POST['name'],
				'sexual' => $_POST['sexual'],
				'contact' => $_POST['contact'],
				'updatetime'=>  $time,
			);
			if (!empty($_POST['password'])) {
				$data['password'] = crypt($_POST['password']);
			}
			if ($this->user_model->editTeacher($this->id, $data)) {
				$ret = array(
					'statusCode' => '200',
					'message' => '修改成功',
					'navTabId' => 'users_teacher',
					'callbackType' => 'closeCurrent',
				);
			} else {
				$ret = array(
					'statusCode' => '300',
					'message' => '修改失败',
					'navTabId' => 'users_teacher',
					'callbackType' => 'closeCurrent',
				);
			}
			echo json_encode($ret);
		}
	}

	public function del() {
		$this->id = empty($_GET['id']) ? 0 : (int) $_GET['id'];
		// TODO: 判断是否是自己
		if ($this->user_model->delTeacher($this->id)) {
			$ret = array(
				'statusCode' => '200',
				'message' => '删除成功',
				'navTabId' => 'users_teacher',
			);
		} else {
			$ret = array(
				'statusCode' => '300',
				'message' => '删除失败',
				'navTabId' => 'users_teacher',
			);
		}
		echo json_encode($ret);
	}

	public function view() {
		$this->id = empty($_GET['id']) ? 0 : (int) $_GET['id'];
		$this->teacher = $this->user_model->getTeacher($this->id);
		$this->load->view('users/teacher/view', $this);
	}

}

/* End of file teacher.php */
/* Location: ./app/controllers/users/teacher.php */