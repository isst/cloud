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
            'teacher' => array('add', 'edit'),
            'administrator' => array('list_all', 'add', 'edit', 'feedback'),
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

    public function student_list() {
        $this->student_id = empty($_GET['student_id']) ? 0 : (int) $_GET['student_id'];
        if ('student' == $this->user_type && $this->user->id != $this->student_id) {
            die(json_encode(array('statusCode' => '300', 'message' => '对不起，您没有权限查看他人资料!',)));
        }

        $this->load->library('pagination');
        $this->pagination->total($this->internship_model->countInternshipsByStudent($this->student_id));
        $this->internships = $this->internship_model->getInternshipsByStudent($this->student_id);
        $this->load->view('classes/internship/student_list', $this);

    }

	/**
	 * 创建实习信息
	 */
	public function add() {
		if (empty($_POST)) {
            $this->load->model('city_model');
            $this->cities = $this->city_model->getCityNames();
			$this->load->view('classes/internship/add', $this);
		} else {
			$data = array(
				'student_id' => (!empty($_GET['stuId'])&&($this->user_type=='administrator'||$this->user_type=='teacher'))?intval($_GET['stuId']) : $this->user->id,
				'company' => @$_POST['company'],
				'lodging' => @$_POST['lodging'],
				//'contact' => @$_POST['contact'],
                'city_id' => @$_POST['city_id'],
				'principal_contact' => @$_POST['principal_contact'],
				'principal' => @$_POST['principal'],
				'company_addr' => @$_POST['company_addr'],
				'internship_time' => @$_POST['internship_time'],
				'internship_content' => @$_POST['internship_content'],
                'updated' => date('Y-m-d H:i:s')
			);
			if ($this->internship_model->addInternship($data)) {
				$ret = array(
					'statusCode' => '200',
					'message' => '添加成功',
                    empty($_GET['stuId']) ? 'navTabId' : 'rel' =>  'internship',
					'callbackType' => 'closeCurrent',
				);
			} else {
				$ret = array(
					'statusCode' => '300',
					'message' => '添加失败',
                    empty($_GET['stuId']) ? 'navTabId' : 'rel' =>  'internship',
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
            $this->load->model('city_model');
            $this->cities = $this->city_model->getCityNames();
			$this->load->view('classes/internship/edit', $this);
		} else {
			$data = array(
				'company' => @$_POST['company'],
				'lodging' => @$_POST['lodging'],
				//'contact' => @$_POST['contact'],
                'city_id' => @$_POST['city_id'],
				'principal_contact' => @$_POST['principal_contact'],
				'principal' => @$_POST['principal'],
				'company_addr' => @$_POST['company_addr'],
				'internship_time' => @$_POST['internship_time'],
				'internship_content' => @$_POST['internship_content'],
                'updated' => date('Y-m-d H:i:s')
			);
			if ($this->internship_model->editInternship($id, $data)) {
				$ret = array(
					'statusCode' => '200',
					'message' => '修改实习信息信息成功',
                    empty($_GET['adminId']) ? 'navTabId' : 'rel' => 'internship',
					'callbackType' => 'closeCurrent',
				);
			} else {
				$ret = array(
					'statusCode' => '300',
					'message' => '修改实习信息信息失败',
                    empty($_GET['adminId']) ? 'navTabId' : 'rel' => 'internship',
					'callbackType' => 'closeCurrent',
				);
			}
			echo json_encode($ret);
		}
	}


    /**
     * 编辑实习反馈信息
     */
    public function feedback() {
        $id = (int) $_GET['id'];
        $this->internship = $this->internship_model->getInternship($id);
        if (empty($_POST)) {
            $this->load->view('classes/internship/feedback/edit', $this);
        } else {
            $data = array(
                'feedback_editor' => @$_POST['feedback_editor'],
                'feedback_content' => @$_POST['feedback_content'],
                'feedback_time' => date('Y-m-d H:i:s')
            );
            if ($this->internship_model->editInternship($id, $data)) {
                $ret = array(
                    'statusCode' => '200',
                    'message' => '修改实习信息信息成功',
                    'rel' => 'internship_student_list',
                    'callbackType' => 'closeCurrent',
                );
            } else {
                $ret = array(
                    'statusCode' => '300',
                    'message' => '修改实习信息信息失败',
                    'rel' => 'internship_student_list',
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
        $this->load->model('city_model');
        $this->cities = $this->city_model->getCityNames();
        if (empty($_POST)) {
            $this->zj = ' ';
            $this->pagination->total($this->internship_model->countAllStudentInternships());
            $this->internships = $this->internship_model->getAllStudentInternships();
        } else {
            $conditions = array();
            if (!empty($_POST['major'])) {
                $conditions['s.major like'] = '%' . $_POST['major'] . '%';
                $this->major = $_POST['major'];
            }

            if (!empty($_POST['nation'])) {
                $conditions['s.nation like'] = '%' . $_POST['nation'] . '%';
                $this->nation = $_POST['nation'];
            }
            if (!empty($_POST['name'])) {
                $conditions['s.name like'] = '%' . $_POST['name'] . '%';
                $this->name = $_POST['name'];
            }
            if (!empty($_POST['student_num'])) {
                $conditions['s.student_num like'] = '%' . $_POST['student_num'] . '%';
                $this->student_num = $_POST['student_num'];
            }
            if (!empty($_POST['birthplace'])) {
                $conditions['s.birthplace like'] = '%' . $_POST['birthplace'] . '%';
                $this->birthplace = $_POST['birthplace'];
            }
            if (!empty($_POST['home_addr'])) {
                $conditions['s.home_addr like'] = '%' . $_POST['home_addr'] . '%';
                $this->home_addr = $_POST['home_addr'];
            }
            if (!empty($_POST['grade'])) {//年级查询
                $conditions['s.grade like'] = '%' . $_POST['grade'] . '%';
                $this->grade = $_POST['grade'];
            }
            if (!empty($_POST['edu_system'])) {//学制查询
                $conditions['s.edu_system like'] = '%' . $_POST['edu_system'] . '%';
                $this->grade = $_POST['edu_system'];
            }
            if (!empty($_POST['at_school_type'])) {//在校类型查询
                $conditions['s.at_school_type like'] = '%' . $_POST['at_school_type'] . '%';
                $this->grade = $_POST['at_school_type'];
            }
            if (isset($_POST['politics_status']) && ($_POST['politics_status'] || $_POST['politics_status'] === '0')) {
                $conditions['s.politics_status'] = (int) $_POST['politics_status'];
                $this->politics_status = $_POST['politics_status'];
            }
            if (!empty($_POST['is_psychology_hard'])) {
                $conditions['s.is_psychology_hard'] = 1;
                $this->is_psychology_hard = 1;
            }
            if (!empty($_POST['is_financial_hard'])) {
                $conditions['s.is_financial_hard'] = 1;
                $this->is_financial_hard = 1;
            }
            if (!empty($_POST['is_study_hard'])) {
                $conditions['s.is_study_hard'] = 1;
                $this->is_study_hard = 1;
            }
            if (!empty($_POST['class_title'])) { //修改后  判断是否为班长
                $conditions['s.class_title'] = 1;
                $this->class_title = 1;
            }if (!empty($_POST['branch_title'])) {//判断是否为支书
                $conditions['s.branch_title'] = 1;
                $this->branch_title = 1;
            }if (!empty($_POST['branch_title2'])) {//判断是否为班委
                $conditions['s.branch_title'] = 3;
                $this->branch_title2 = 1;
            }
            if (!empty($_POST['ziduan'])) {//判断查询字段
                $zj = $_POST['ziduan'];
            } else {
                $zj = 'username';
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