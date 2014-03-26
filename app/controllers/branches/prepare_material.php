<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * 积极分子转预备材料审核
 */
class Prepare_material extends MY_Controller {

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
		$this->load->model('branches/prepare_material_model');
	}

	public function index() {
		$this->load->library('pagination');
		$class_id = empty($_GET['class_id']) ? 0 : (int) $_GET['class_id'];

		$this->branch = $this->branch_model->getBranch($class_id);
		$this->pagination->total($this->prepare_material_model->countMaterials($class_id));
		$this->prepare_materials = $this->prepare_material_model->getMaterials($class_id);
		$this->load->view('branches/prepare_material/list', $this);
	}

	public function add() {
		$this->class_id = (int) $_GET['class_id'];
		if (empty($_POST)) {
			$this->load->model('branches/member_model');
			$this->members = $this->member_model->getAllMembers($this->class_id);
			$this->load->view('branches/prepare_material/add', $this);
		} else {
			$data = array(
				'class_id' => $this->class_id,
				'student_id' => (int) $_POST['student_id'],
				'membership_application' => empty($_POST['membership_application']) ? 0 : 1,
				'tuiyou_table' => empty($_POST['tuiyou_table']) ? 0 : 1,
				'activist_inspection' => empty($_POST['activist_inspection']) ? 0 : 1,
				'thinking_report' => empty($_POST['thinking_report']) ? 0 : 1,
				'completion_certificate' => empty($_POST['completion_certificate']) ? 0 : 1,
				'masses_discussion' => empty($_POST['masses_discussion']) ? 0 : 1,
				'politics_audit_letter' => empty($_POST['politics_audit_letter']) ? 0 : 1,
				'politics_audit_complex' => empty($_POST['politics_audit_complex']) ? 0 : 1,
				'autobiography' => empty($_POST['autobiography']) ? 0 : 1,
			);
			if ($this->prepare_material_model->addMaterial($data)) {
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
			$this->prepare_material = $this->prepare_material_model->getMaterial($this->id);
			$this->load->model('branches/member_model');
			$this->members = $this->member_model->getAllMembers($this->prepare_material->class_id);
			$this->load->view('branches/prepare_material/edit', $this);
		} else {
			$data = array(
				'student_id' => (int) $_POST['student_id'],
				'membership_application' => empty($_POST['membership_application']) ? 0 : 1,
				'tuiyou_table' => empty($_POST['tuiyou_table']) ? 0 : 1,
				'activist_inspection' => empty($_POST['activist_inspection']) ? 0 : 1,
				'thinking_report' => empty($_POST['thinking_report']) ? 0 : 1,
				'completion_certificate' => empty($_POST['completion_certificate']) ? 0 : 1,
				'masses_discussion' => empty($_POST['masses_discussion']) ? 0 : 1,
				'politics_audit_letter' => empty($_POST['politics_audit_letter']) ? 0 : 1,
				'politics_audit_complex' => empty($_POST['politics_audit_complex']) ? 0 : 1,
				'autobiography' => empty($_POST['autobiography']) ? 0 : 1,
			);
			if ($this->prepare_material_model->editMaterial($this->id, $data)) {
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
		if ($this->prepare_material_model->delMaterial($this->id)) {
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

	/**
	 * 入党申请书审核
	 */
	public function review() {
		$this->load->model('branches/member_model');
		$this->id = empty($_GET['id']) ? 0 : (int) $_GET['id'];
		$prepare_material = $this->prepare_material_model->getMaterial($this->id);
		$has_all_material = false;
		foreach ($prepare_material as $val) {
			if ($val) {
				$has_all_material = TRUE;
			} else {
				$has_all_material = FALSE;
				$ret = array(
					'statusCode' => '300',
					'message' => '审核失败(材料不齐全)',
					'rel' => 'excellent_full_box',
				);
				die(json_encode($ret));
			}
		}
		$member = $this->member_model->getMember($prepare_material->student_id);
		if ($member->branch_status > 0) {
			$ret = array(
				'statusCode' => '200',
				'message' => '该成员已成为积极分子',
				'rel' => 'excellent_full_box',
			);
			die(json_encode($ret));
		}
		// 通过审核，成为积极分子
		if ($this->member_model->editMember($prepare_material->student_id, array('branch_status' => 1,))) {
			$ret = array(
				'statusCode' => '200',
				'message' => '审核成功',
				'rel' => 'excellent_full_box',
			);
			die(json_encode($ret));
		}
		$ret = array(
			'statusCode' => '300',
			'message' => '审核失败',
			'rel' => 'excellent_full_box',
		);
		echo json_encode($ret);
	}

}

/* End of file prepare_material.php */
/* Location: ./app/controllers/branches/prepare_material.php */