<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * 预备党员转正材料审核
 */
class Full_material extends MY_Controller {

	function __construct() {
		// 设置各角色的访问权限
		$this->user_permit = array(
			'administrator' => array('index', 'view', 'add', 'edit', 'del', 'review',),
			'teacher' => array('index', 'view', 'edit', 'del', 'review',),
			'student' => array('index', 'add', 'edit', 'del',),
			'enterprise' => array(),
		);
		parent::__construct();

		$this->load->model('branches/branch_model');
		$this->load->model('branches/member_model');
		$this->load->model('branches/full_material_model');
	}

	public function index() {
		$this->load->library('pagination');
		$class_id = empty($_GET['class_id']) ? 0 : (int) $_GET['class_id'];

		$this->branch = $this->branch_model->getBranch($class_id);
		$this->pagination->total($this->full_material_model->countMaterials($class_id));
		$this->full_materials = $this->full_material_model->getMaterials($class_id);
		$this->load->view('branches/full_material/list', $this);
	}

	public function add() {
		$this->class_id = (int) $_GET['class_id'];
		if (empty($_POST)) {
			$this->load->model('branches/member_model');
			$this->members = $this->member_model->getAllMembers($this->class_id);
			$this->load->view('branches/full_material/add', $this);
		} else {
			$data = array(
				'class_id' => $this->class_id,
				'student_id' => (int) $_POST['student_id'],
				'thinking_report' => empty($_POST['thinking_report']) ? 0 : 1,
				'application' => empty($_POST['application']) ? 0 : 1,
				'completion_certificate' => empty($_POST['completion_certificate']) ? 0 : 1,
				'ideal' => empty($_POST['ideal']) ? 0 : 1,
			);
			if ($this->full_material_model->addMaterial($data)) {
				$ret = array(
					'statusCode' => '200',
					'message' => '添加成功',
					'rel' => 'excellent_full_box',
					'callbackType' => 'closeCurrent',
				);
			} else {
				$ret = array(
					'statusCode' => '300',
					'message' => '添加失败',
					'rel' => 'excellent_full_box',
					'callbackType' => 'closeCurrent',
				);
			}
			echo json_encode($ret);
		}
	}

	public function edit() {
		$this->id = empty($_GET['id']) ? 0 : (int) $_GET['id'];
		if (empty($_POST)) {
			$this->full_material = $this->full_material_model->getMaterial($this->id);
			$this->load->model('branches/member_model');
			$this->members = $this->member_model->getAllMembers($this->full_material->class_id);
			$this->load->view('branches/full_material/edit', $this);
		} else {
			$data = array(
				'student_id' => (int) $_POST['student_id'],
				'thinking_report' => empty($_POST['thinking_report']) ? 0 : 1,
				'application' => empty($_POST['application']) ? 0 : 1,
				'completion_certificate' => empty($_POST['completion_certificate']) ? 0 : 1,
				'ideal' => empty($_POST['ideal']) ? 0 : 1,
			);
			if ($this->full_material_model->editMaterial($this->id, $data)) {
				$ret = array(
					'statusCode' => '200',
					'message' => '修改成功',
					'rel' => 'excellent_full_box',
					'callbackType' => 'closeCurrent',
				);
			} else {
				$ret = array(
					'statusCode' => '300',
					'message' => '修改失败',
					'rel' => 'excellent_full_box',
					'callbackType' => 'closeCurrent',
				);
			}
			echo json_encode($ret);
		}
	}

	public function del() {
		$this->id = empty($_GET['id']) ? 0 : (int) $_GET['id'];
		if ($this->full_material_model->delMaterial($this->id)) {
			$ret = array(
				'statusCode' => '200',
				'message' => '删除成功',
				'rel' => 'excellent_full_box',
			);
		} else {
			$ret = array(
				'statusCode' => '300',
				'message' => '删除失败',
				'rel' => 'excellent_full_box',
			);
		}
		echo json_encode($ret);
	}

}

/* End of file full_material.php */
/* Location: ./app/controllers/branches/full_material.php */