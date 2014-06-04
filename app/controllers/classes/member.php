<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * 班级成员
 */
class Member extends MY_Controller {

	function __construct() {
		// 设置各角色的访问权限
		$this->user_permit = array(
			'administrator' => array('index', 'view', 'add', 'edit', 'del', 'internship_list'),
			'teacher' => array('index', 'view', 'add', 'edit', 'del', 'supervisor_student_list', 'internship_list'),
			'student' => array('index',),
			'enterprise' => array(),
		);
		parent::__construct();

		$this->load->model('classes/classes_model');
		$this->load->model('classes/member_model');
        $this->load->model('classes/internship_model');
		$this->member_class_title_names = array(
			'无职务',
			'班长',
			'学习委员',
		);
	}

	public function index() {
		$this->load->library('pagination');
		$id = empty($_GET['class_id']) ? 0 : (int) $_GET['class_id'];
        $this->pagination->per = 0;
		$this->class = $this->classes_model->getClass($id);
		$this->pagination->total($this->member_model->countMembers($id));
		$this->members = $this->member_model->getMembers($id);

		$this->load->view('classes/member/list', $this);
	}

	public function student_list() {
		$this->load->library('pagination');
		$id = empty($_GET['class_id']) ? 0 : (int) $_GET['class_id'];
        $this->pagination->per = 0;
		$this->class = $this->classes_model->getClass($id);
		$this->pagination->total($this->member_model->countMembers($id));
		$this->members = $this->member_model->getMembersWithInternship($id);
        $this->is_class_monitor = $this->user->class_title == 1;
		$this->load->view('classes/member/student_list', $this);
	}

    public function internship_list() {
        $this->load->library('pagination');
        $id = empty($_GET['class_id']) ? 0 : (int) $_GET['class_id'];

        $conditions = array();

        if (!empty($_POST)) {
            if (!empty($_POST['name'])) {
                $conditions['s.name like'] = '%' . $_POST['name'] . '%';
                $this->name = $_POST['name'];
            }
            if (!empty($_POST['student_num'])) {
                $conditions['s.student_num like'] = '%' . $_POST['student_num'] . '%';
                $this->student_num = $_POST['student_num'];
            }

            if (isset($_POST['city_id'])) {
                $cityId = intval($_POST['city_id']);
                if ($cityId >= 0) {
                    $conditions['ci.city_id'] = $cityId;
                }
                $this->city_id = $cityId;
            } else {
                $this->city_id = -1;
            }

            if (!empty($_POST['company'])) {
                $conditions['ci.company like'] = '%' . $_POST['company'] . '%';
                $this->company = $_POST['company'];
            }

            if (!empty($_POST['lodging'])) {
                $conditions['ci.lodging like'] = '%' . $_POST['lodging'] . '%';
                $this->lodging = $_POST['lodging'];
            }
        }

        $this->pagination->total($this->internship_model->countInternshipsByClass($id, $conditions));
        $this->internships = $this->internship_model->getInternshipsByClass($id, $conditions);
        $this->class = $this->classes_model->getClass($id);

        $this->load->model('city_model');
        $this->cities = $this->city_model->getCityNames();

        $this->load->view('classes/member/internship_list', $this);
    }

	public function supervisor_student_list() {
		$this->load->library('pagination');
		$this->pagination->total($this->member_model->countStudentsBySupervisor($this->user->id));
		$this->members = $this->member_model->getStudentsBySupervisor($this->user->id);

		$this->load->view('classes/member/supervisor_student_list', $this);
	}

	public function search() {
		$this->load->library('pagination');
		$this->class_id = empty($_GET['class_id']) ? 0 : (int) $_GET['class_id'];
		$conditions = array();
		if ($_POST && !empty($_POST['major'])) {
			$conditions = array(
				'major like' => '%' . $_POST['major'] . '%',
			);
			$this->major = $_POST['major'];
		}
		$this->load->model('classes/major_field_model');
		$this->major_fields = $this->major_field_model->getAllMajor_fields();
		$this->load->model('user_model');
		$this->pagination->total($this->user_model->countSearchStudents($conditions));
		$this->students = $this->user_model->getSearchStudents($conditions);
		$this->load->view('classes/member/search', $this);
	}

	public function add() {
		$this->class_id = empty($_GET['class_id']) ? 0 : (int) $_GET['class_id'];
		if ($_POST) {
			$ids = empty($_POST['ids']) ? array() : $_POST['ids'];
			$ids = array_filter($ids, 'intval');

			foreach ($ids as $id) {
				$this->member_model->editMember($id, array('class_id' => $this->class_id));
			}
			$ret = array(
				'statusCode' => '200',
				'message' => '添加班级成员成功',
				'rel' => 'class_member',
				'callbackType' => 'closeCurrent',
			);
			die(json_encode($ret));
		}
	}

	public function edit() {
		$id = empty($_GET['id']) ? 0 : (int) $_GET['id'];
		$this->member = $this->member_model->getMember($id);
		if (empty($_POST)) {
			$this->load->view('classes/member/edit', $this);
		} else {
			$this->class_monitor = $this->member_model->getSpecMember($this->member->class_id, 1); // 班长
			if ($this->class_monitor && 1 == $_POST['class_title'] && $id != $this->class_monitor->id) {
				$ret = array(
					'statusCode' => '300',
					'message' => '该班级已设置班长！',
					'rel' => 'class_member',
					'callbackType' => 'closeCurrent',
				);
				die(json_encode($ret));
			}

			$data = array(
				'name' => $_POST['name'],
				'sexual' => $_POST['sexual'],
				'tel' => $_POST['tel'],
				'email' => $_POST['email'],
				'bedroom' => $_POST['bedroom'],
				'class_title' => (int) $_POST['class_title'],
			);
			if ($this->member_model->editMember($id, $data)) {
				$ret = array(
					'statusCode' => '200',
					'message' => '修改成员成功',
					'rel' => 'class_member',
					'callbackType' => 'closeCurrent',
				);
			} else {
				$ret = array(
					'statusCode' => '300',
					'message' => '修改成员失败',
					'rel' => 'class_member',
					'callbackType' => 'closeCurrent',
				);
			}
			echo json_encode($ret);
		}
	}

	public function del() {
		$id = empty($_GET['id']) ? 0 : (int) $_GET['id'];
		if ($this->member_model->editMember($id, array('class_id' => 0))) {
			$ret = array(
				'statusCode' => '200',
				'message' => '删除班级成员成功',
				'rel' => 'class_member',
			);
		} else {
			$ret = array(
				'statusCode' => '300',
				'message' => '删除班级成员失败',
				'rel' => 'class_member',
			);
		}
		echo json_encode($ret);
	}

}

/* End of file member.php */
/* Location: ./app/controllers/classes/member.php */