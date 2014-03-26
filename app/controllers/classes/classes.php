<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * 班级网格
 */
class Classes extends MY_Controller {

	function __construct() {
		// 设置各角色的访问权限
		$this->user_permit = array(
			'administrator' => array('index', 'view', 'add', 'edit', 'del', 'grid', 'lookup',),
			'teacher' => array('grid',),
			'student' => array('lookup'),
			'enterprise' => array(),
		);
		parent::__construct();
		$this->load->model('classes/classes_model');
	}

	/**
	 * 班级列表
	 */
	public function index() {

		$this->load->library('pagination');

		$this->pagination->total($this->classes_model->countClasses());
		$this->classes = $this->classes_model->getClasses();
		$this->load->view('classes/classes/list', $this);
	}

	/**
	 * 班级网格
	 */
	public function grid() {

		$this->load->library('pagination');
		switch ($this->user->user_type) {
			case 'administrator':
				$this->pagination->total($this->classes_model->countClasses());
				$this->classes = $this->classes_model->getClasses();
				break;
			case 'teacher':
				if ($this->user->is_class_adviser && 'moral_edu' == @$_GET['type']) {
					$this->pagination->total($this->classes_model->countClassesByClassAdviser($this->user->id));
					$this->classes = $this->classes_model->getClassesByClassAdviser($this->user->id);
				}
				if ($this->user->is_major_adviser && 'major_edu' == @$_GET['type']) {
					$this->pagination->total($this->classes_model->countClassesByMajorAdviser($this->user->id));
					$this->classes = $this->classes_model->getClassesByMajorAdviser($this->user->id);
				}
				break;
			default:
				break;
		}
		$this->load->view('classes/classes/grid', $this);
	}

	/**
	 * 班级查找
	 */
	public function lookup() {

		$this->load->library('pagination');

		$this->pagination->total($this->classes_model->countClasses());
		$this->classes = $this->classes_model->getClasses();
		$this->load->view('classes/classes/lookup', $this);
	}

	/**
	 * 创建班级
	 */
	public function add() {
		if (empty($_POST)) {
			$this->load->view('classes/classes/add');
		} else {
			$data = array(
				'name' => $_POST['name'],
				'start_year' => $_POST['start_year'],
				'class_adviser_id' => $_POST['class_adviser_id'],
				'major_adviser_id' => $_POST['major_adviser_id'],
				'branch_instructor_id' => $_POST['branch_instructor_id'],
			);
			if ($this->classes_model->addClass($data)) {
				$ret = array(
					'statusCode' => '200',
					'message' => '添加成功',
					'navTabId' => 'class_list',
					'callbackType' => 'closeCurrent',
				);
			} else {
				$ret = array(
					'statusCode' => '300',
					'message' => '添加失败',
					'navTabId' => 'class_list',
					'callbackType' => 'closeCurrent',
				);
			}
			echo json_encode($ret);
		}
	}

	/**
	 * 批量编辑班级
	 */
	public function editall() {
		var_dump('POST'.'-'.$_POST['ids']);
		//$this->load->view('classes/classes/edit', $this);
		//$id =  $_POST['ids'];
		//$ids = explode(',', $id);
		//$idd = (int)$ids[0];
		//var_dump($id);
		//$this->class = $this->classes_model->getClass($id);
		//var_dump($this->class);
		//if (!empty($_POST['ids'])) {
			//$this->load->view('classes/classes/editall', $this);
		//}
	}

	/**
	 * 编辑班级
	 */
	public function edit() {
		$id = (int) $_GET['id'];
		$this->class = $this->classes_model->getClass($id);
		if (empty($_POST)) {
			$this->load->view('classes/classes/edit', $this);
		} else {
			$data = array(
				'name' => $_POST['name'],
				'start_year' => $_POST['start_year'],
				'class_adviser_id' => $_POST['class_adviser_id'],
				'major_adviser_id' => $_POST['major_adviser_id'],
				'branch_instructor_id' => $_POST['branch_instructor_id'],
			);
			if ($this->classes_model->editClass($id, $data)) {
				$ret = array(
					'statusCode' => '200',
					'message' => '修改班级信息成功',
					'navTabId' => 'class_list',
					'callbackType' => 'closeCurrent',
				);
			} else {
				$ret = array(
					'statusCode' => '300',
					'message' => '修改班级信息失败',
					'navTabId' => 'class_list',
					'callbackType' => 'closeCurrent',
				);
			}
			echo json_encode($ret);
		}
	}

	/**
	 * 删除班级
	 */
	public function del() {
		$this->id = empty($_GET['id']) ? 0 : (int) $_GET['id'];
		if ($this->classes_model->delClass($this->id)) {
			$ret = array(
				'statusCode' => '200',
				'message' => '删除成功',
				'navTabId' => 'class_list',
			);
		} else {
			$ret = array(
				'statusCode' => '300',
				'message' => '删除失败',
				'navTabId' => 'class_list',
			);
		}
		echo json_encode($ret);
	}

}

/* End of file classes.php */
/* Location: ./app/controllers/classes/classes.php */