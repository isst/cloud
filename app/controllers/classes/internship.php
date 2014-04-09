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
            'administrator' => array('list_all'),
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

    public function list_all() {
        $this->load->library('pagination');
        $this->load->model('classes/major_field_model');
        $this->load->model('classes/classes_model');
        $this->major_fields = $this->major_field_model->getAllMajor_fields();
        $this->class_names = $this->classes_model->getClassNames();
        if (empty($_POST)) {
            $this->zj = ' ';
            $this->pagination->total($this->internship_model->countAllStudentInternships());
            $this->internships = $this->internship_model->getAllStudentInternships();
        } else {
            $conditions = array();
            if (!empty($_POST['major'])) {
                $conditions['major like'] = '%' . $_POST['major'] . '%';
                $this->major = $_POST['major'];
            }
            if (!empty($_POST['nation'])) {
                $conditions['nation like'] = '%' . $_POST['nation'] . '%';
                $this->nation = $_POST['nation'];
            }
            if (!empty($_POST['name'])) {
                $conditions['name like'] = '%' . $_POST['name'] . '%';
                $this->name = $_POST['name'];
            }
            if (!empty($_POST['student_num'])) {
                $conditions['student_num like'] = '%' . $_POST['student_num'] . '%';
                $this->student_num = $_POST['student_num'];
            }
            if (!empty($_POST['birthplace'])) {
                $conditions['birthplace like'] = '%' . $_POST['birthplace'] . '%';
                $this->birthplace = $_POST['birthplace'];
            }
            if (!empty($_POST['home_addr'])) {
                $conditions['home_addr like'] = '%' . $_POST['home_addr'] . '%';
                $this->home_addr = $_POST['home_addr'];
            }
            if (!empty($_POST['grade'])) {//年级查询
                $conditions['grade like'] = '%' . $_POST['grade'] . '%';
                $this->grade = $_POST['grade'];
            }
            if (!empty($_POST['edu_system'])) {//学制查询
                $conditions['edu_system like'] = '%' . $_POST['edu_system'] . '%';
                $this->grade = $_POST['edu_system'];
            }
            if (!empty($_POST['at_school_type'])) {//在校类型查询
                $conditions['at_school_type like'] = '%' . $_POST['at_school_type'] . '%';
                $this->grade = $_POST['at_school_type'];
            }
            if (isset($_POST['politics_status']) && ($_POST['politics_status'] || $_POST['politics_status'] === '0')) {
                $conditions['politics_status'] = (int) $_POST['politics_status'];
                $this->politics_status = $_POST['politics_status'];
            }
            if (!empty($_POST['is_psychology_hard'])) {
                $conditions['is_psychology_hard'] = 1;
                $this->is_psychology_hard = 1;
            }
            if (!empty($_POST['is_financial_hard'])) {
                $conditions['is_financial_hard'] = 1;
                $this->is_financial_hard = 1;
            }
            if (!empty($_POST['is_study_hard'])) {
                $conditions['is_study_hard'] = 1;
                $this->is_study_hard = 1;
            }
            if (!empty($_POST['class_title'])) { //修改后  判断是否为班长
                $conditions['class_title'] = 1;
                $this->class_title = 1;
            }if (!empty($_POST['branch_title'])) {//判断是否为支书
                $conditions['branch_title'] = 1;
                $this->branch_title = 1;
            }if (!empty($_POST['branch_title2'])) {//判断是否为班委
                $conditions['branch_title'] = 3;
                $this->branch_title2 = 1;
            }
            if (!empty($_POST['ziduan'])) {//判断查询字段
                $zj = $_POST['ziduan'];
            } else {
                $zj = 'username';
            }
            $this->zj = $zj;
            $this->load->model('user_model');
            $this->pagination->total($this->internship_model->countAllStudentInternships($conditions));
            $this->internships = $this->internship_model->getAllStudentInternships($conditions, $zj);
        }

        $this->load->view('classes/member/internship_list', $this);
    }
}

/* End of file internship.php */
/* Location: ./app/controllers/classes/internship.php */