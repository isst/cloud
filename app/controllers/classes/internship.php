<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * 实习信息
 */
class Internship extends MY_Controller {

	function __construct() {
		// 设置各角色的访问权限
		$this->user_permit = array(
			'student' => array('index', 'add', 'edit', 'del'),
		);
		parent::__construct();
		$this->load->model('classes/internship_model');
	}

	/**
	 * 实习信息列表
	 */
	public function index() {

		$this->load->library('pagination');
		$this->pagination->total($this->internship_model->countInternshipsByStudent($this->user->id));
		$this->internships = $this->internship_model->getInternshipsByStudent($this->user->id);
		$this->load->view('classes/internship/list', $this);
	}

	/**
	 * 创建实习信息
	 */
	public function add() {
		if (empty($_POST)) {
			$this->load->view('classes/internship/add', $this);
		} else {
			$data = array(
				'student_id' => $this->user->id,
				'company' => @$_POST['company'],
				'lodging' => @$_POST['lodging'],
				'contact' => @$_POST['contact'],
				'principal_contact' => @$_POST['principal_contact'],
				'principal' => @$_POST['principal'],
				'company_addr' => @$_POST['company_addr'],
				'internship_time' => @$_POST['internship_time'],
				'internship_content' => @$_POST['internship_content'],
			);
			if ($this->internship_model->addInternship($data)) {
				$ret = array(
					'statusCode' => '200',
					'message' => '添加成功',
					'navTabId' => 'internship',
					'callbackType' => 'closeCurrent',
				);
			} else {
				$ret = array(
					'statusCode' => '300',
					'message' => '添加失败',
					'navTabId' => 'internship',
					'callbackType' => 'closeCurrent',
				);
			}
			echo json_encode($ret);
		}
	}

	/**
	 * 编辑实习信息
	 */
	public function edit() {
		$id = (int) $_GET['id'];
		$this->internship = $this->internship_model->getInternship($id);
		if (empty($_POST)) {
			$this->load->view('classes/internship/edit', $this);
		} else {
			$data = array(
				'company' => @$_POST['company'],
				'lodging' => @$_POST['lodging'],
				'contact' => @$_POST['contact'],
				'principal_contact' => @$_POST['principal_contact'],
				'principal' => @$_POST['principal'],
				'company_addr' => @$_POST['company_addr'],
				'internship_time' => @$_POST['internship_time'],
				'internship_content' => @$_POST['internship_content'],
			);
			if ($this->internship_model->editInternship($id, $data)) {
				$ret = array(
					'statusCode' => '200',
					'message' => '修改实习信息信息成功',
					'navTabId' => 'internship',
					'callbackType' => 'closeCurrent',
				);
			} else {
				$ret = array(
					'statusCode' => '300',
					'message' => '修改实习信息信息失败',
					'navTabId' => 'internship',
					'callbackType' => 'closeCurrent',
				);
			}
			echo json_encode($ret);
		}
	}

	/**
	 * 删除实习信息
	 */
	public function del() {
		$this->id = empty($_GET['id']) ? 0 : (int) $_GET['id'];
		if ($this->internship_model->delInternship($this->id)) {
			$ret = array(
				'statusCode' => '200',
				'message' => '删除成功',
				'navTabId' => 'internship',
			);
		} else {
			$ret = array(
				'statusCode' => '300',
				'message' => '删除失败',
				'navTabId' => 'internship',
			);
		}
		echo json_encode($ret);
	}

}

/* End of file internship.php */
/* Location: ./app/controllers/classes/internship.php */