<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * 班级谈话记录
 */
class Memcon extends MY_Controller {

	function __construct() {
		// 设置各角色的访问权限
		$this->user_permit = array(
			'administrator' => array('index', 'view', 'add', 'edit', 'del', 'student_list',),
			'teacher' => array('index', 'view', 'add', 'edit', 'del', 'student_list',),
			'student' => array('index', 'view', 'add', 'edit'),
			'enterprise' => array(),
		);
		parent::__construct();

		$this->load->model('classes/classes_model');
		$this->load->model('classes/memcon_model');
	}

	/**
	 * 谈话列表
	 */
	public function index() {
		$this->load->library('pagination');
		$this->talker_type = empty($_GET['talker_type']) ? '' : $_GET['talker_type'];
		//var_dump($this->talker_type);die;
		$class_id = empty($_GET['class_id']) ? 0 : (int) $_GET['class_id'];
        $this->statusLabels = $this->memcon_model->getStatusLabels();
        $this->type = empty($_GET['type']) ? '' : $_GET['type'];
        $this->readOnly = false;
		if ($class_id) {
			$this->class = $this->classes_model->getClass($class_id);
			$this->pagination->total($this->memcon_model->countMemconsByClass($this->talker_type, $class_id));
			$this->memcons = $this->memcon_model->getMemconsByClass($this->talker_type, $class_id);
			$this->load->view('classes/memcon/class_list', $this);
		} else {
			if ($this->type&&$this->type<>'administrator') {
				$this->pagination->total($this->memcon_model->countMemconsByTalker($this->user->user_type, $this->type, $this->user->id));
				$this->memcons = $this->memcon_model->getMemconsByTalker($this->user->user_type, $this->type, $this->user->id);
			} else {
				//var_dump($this->talker_type);
				$student_id = empty($_GET['student_id']) ? 0 : (int) $_GET['student_id'];
				if ($student_id) {
					$this->pagination->total($this->memcon_model->countMemconsByStudent($this->talker_type, $student_id));
					$this->memcons = $this->memcon_model->getMemconsByStudent($this->talker_type, $student_id);
				} else {
					switch ($this->user->user_type) {
						case 'administrator':
							$this->pagination->total($this->memcon_model->countMemconsByTalkerType($this->talker_type));
							$this->memcons = $this->memcon_model->getMemconsByTalkerType($this->talker_type);
							break;
						case 'student':
							$this->pagination->total($this->memcon_model->countMemconsByStudent($this->talker_type, $this->user->id));
							$this->memcons = $this->memcon_model->getMemconsByStudent($this->talker_type, $this->user->id);
							break;
                        case 'teacher':
                            $this->pagination->total($this->memcon_model->countMemconsByTeacher($this->talker_type, $this->type, $this->user->id));
                            $this->memcons = $this->memcon_model->getMemconsByTeacher($this->talker_type, $this->type, $this->user->id);
                            $this->readOnly = true;
                            break;
						default:
							break;
					}
					//var_dump($this->memcons);
				}
			}
			$this->load->view('classes/memcon/list', $this);
		}
	}

	public function student_list() {
		$this->load->library('pagination');
		$this->talker_type = $this->user_type;
        $this->type = $this->user_type == 'administrator' ? 'administrator' : 'moral_edu';
		$this->student_id = empty($_GET['student_id']) ? 0 : (int) $_GET['student_id'];
        $this->statusLabels = $this->memcon_model->getStatusLabels();

        $talker_type = $this->user_type == "administrator" ? null : $this->user_type;
		$this->pagination->total($this->memcon_model->countMemconsByStudent($talker_type, $this->student_id));
		$this->memcons = $this->memcon_model->getMemconsByStudent($talker_type,  $this->student_id);
		$this->load->view('classes/memcon/student_list', $this);
	}

	public function add() {
		$this->load->model('classes/member_model');
		$this->type = empty($_GET['type']) ? null : $_GET['type'];
        $this->talker_type = empty($_GET['talker_type']) ? $this->user_type : $_GET['talker_type'];
		$class_id = empty($_GET['class_id']) ? 0 : (int) $_GET['class_id'];

        $this->statusLabels = $this->memcon_model->getStatusLabels();
		if (empty($_POST)) {
            $this->student_id = empty($_GET['student_id']) ? 0 : (int) $_GET['student_id'];
            $this->student_name = $this->student_id > 0 ? $this->member_model->getMemberName($this->student_id) : '';

			if ($class_id) {
				$this->class_id = (int) $_GET['class_id'];
				$this->type = 'moral_edu';
				$this->members = $this->member_model->getAllMembers($this->class_id);
			} else {
				$this->type = empty($_GET['type']) ? '' : $_GET['type'];
				switch ($this->type) {
					case 'moral_edu':
						# 德育导师谈话
						$this->members = $this->member_model->getAllStudentsByClassAdviser($this->user->id);
						break;
					case 'major_edu':
						# 专业导师谈话
						$this->members = $this->member_model->getAllStudentsByMajorAdviser($this->user->id);
						break;
					case 'thesis_edu':
						# 论文导师谈话
						$this->members = $this->member_model->getAllStudentsBySupervisor($this->user->id);
						break;
					case 'class_monitor':
					case 'branch_secretary':
						# 党支书谈话
						# 班长谈话
						$this->members = $this->member_model->getAllMembers($this->user->class_id);
						break;
					case 'administrator':
						#超级管理员谈话
						$this->members = $this->member_model->getAllStudents();
						break;
					default:
						break;
				}
			}
			$this->load->view('classes/memcon/add', $this);
		} else {
			$student_id = (int) $_POST['student_id'];
			$this->student = $this->member_model->getMember($student_id);
			$nowtime = date("Y-m-d",time());
			$data = array(
				'class_id' => $this->student->class_id,
				'talker_id' => $this->user->id,
				'talker_type' => $this->type == 'administrator' ? 'administrator' : $this->user->user_type,
				'type' => $this->type,
				'student_id' => $student_id,
				'title' => $_POST['title'],
				'time' => $_POST['time'],
				'content' => $_POST['content'],
                'address' => $_POST['address'],
                'status' => $_POST['status'],
                'talker_name' => isset($_POST['talker_name']) ? $_POST['talker_name'] : $this->user->name,
				'inputtime'=>$nowtime,
                'updatetime'=>$nowtime,
                'place'=>'',
                'admin_content' => ''
			);
			if ($this->memcon_model->addMemcon($data)) {
				$ret = array(
					'statusCode' => '200',
					'message' => '添加成功',
					'callbackType' => 'closeCurrent',
				);
			} else {
				$ret = array(
					'statusCode' => '300',
					'message' => '添加失败',
					'callbackType' => 'closeCurrent',
				);
			}
            if (isset($_GET['rel'])&&!empty($_GET['rel'])) {
                $ret['rel'] = $_GET['rel'];
            } else {
                $ret[isset($_GET['from']) && $_GET['from']=='div' ? 'rel' : 'navTabId'] = 'memcon_list';
            }

			echo json_encode($ret);
		}
	}

	public function edit() {
		$this->id = empty($_GET['id']) ? 0 : (int) $_GET['id'];
		if(empty($_GET['type'])){
			$this->hid_type ='';
		}else{
			$this->hid_type =$_GET['type'];
		}
        $this->statusLabels = $this->memcon_model->getStatusLabels();
		if (empty($_POST)) {
			$this->memcon = $this->memcon_model->getMemcon($this->id);
            $this->type = $this->memcon->type;
            $this->talker_type = $this->memcon->talker_type;
			$this->load->model('classes/member_model');
			$this->members = $this->member_model->getAllMembers($this->memcon->class_id);
			$this->load->view('classes/memcon/edit', $this);
		} else {
            $nowtime = date("Y-m-d",time());
            $data = array(
                'student_id' => (int) $_POST['student_id'],
                'title' => $_POST['title'],
                'status' => $_POST['status'],
                'time' => $_POST['time'],
                'content' => $_POST['content'],
                'address' => $_POST['address'],
                'updatetime'=>$nowtime,
            );


            if (isset($_POST['talker_name'])) {
                $data['talker_name'] = $_POST['talker_name'];
            }

            if ($this->user_type == 'administrator' && isset($_POST['admin_content'])) {
                $data['admin_content'] = $_POST['admin_content'];
            }

			if ($this->memcon_model->editMemcon($this->id, $data)) {
				$ret = array(
					'statusCode' => '200',
					'message' => '修改成功',
					'callbackType' => 'closeCurrent',
				);
			} else {
				$ret = array(
					'statusCode' => '300',
					'message' => '修改失败',
                    'rel' => 'memcon_list',
					'callbackType' => 'closeCurrent',
				);
			}

            if (isset($_GET['rel'])&&!empty($_GET['rel'])) {
                $ret['rel'] = $_GET['rel'];
            } else {
                $ret[isset($_GET['from']) && $_GET['from']=='div' ? 'rel' : 'navTabId'] = 'memcon_list';
            }

			echo json_encode($ret);
		}
	}

	public function del() {
		$this->id = empty($_GET['id']) ? 0 : (int) $_GET['id'];
		if ($this->memcon_model->delMemcon($this->id)) {
			$ret = array(
				'statusCode' => '200',
				'message' => '删除成功',
			);
		} else {
			$ret = array(
				'statusCode' => '300',
				'message' => '删除失败',
			);
		}


        if (isset($_GET['rel'])&&!empty($_GET['rel'])) {
            $ret['rel'] = $_GET['rel'];
        } else {
            $ret[isset($_GET['from']) && $_GET['from']=='div' ? 'rel' : 'navTabId'] = 'memcon_list';
        }
		echo json_encode($ret);
	}

	public function view() {
		$this->id = empty($_GET['id']) ? 0 : (int) $_GET['id'];
        $this->statusLabels = $this->memcon_model->getStatusLabels();

		$this->memcon = $this->memcon_model->getMemcon($this->id);
		if (!( 'administrator' == $this->user->user_type )) {
			if ($this->user->user_type != $this->memcon->talker_type || $this->user->id != $this->memcon->talker_id) {
				die(json_encode(array('statusCode' => '300', 'message' => '对不起，您没有权限查看他人发起的谈话!',)));
			}
		}
		$this->load->view('classes/memcon/view', $this);
	}

}

/* End of file memcon.php */
/* Location: ./app/controllers/classes/memcon.php */