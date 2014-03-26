<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * 学生
 */
class Student extends MY_Controller {

	function __construct() {
		// 设置各角色的访问权限
		$this->user_permit = array(
			'administrator' => array('index', 'view', 'add', 'edit', 'del',),
			'teacher' => array('view',),
			'unit' => array('view',),
			'student' => array('view', 'edit', 'edit_contact', 'print_view'),
			'enterprise' => array(),
		);
		parent::__construct();

		$this->load->model('user_model');
		$this->load->model('classes/classes_model');
        $this->class_names = $this->classes_model->getClassNames();
	}

	public function index() {
		$this->load->library('pagination');
		$this->load->model('classes/major_field_model');
		$this->major_fields = $this->major_field_model->getAllMajor_fields();
		$this->class_names = $this->classes_model->getClassNames();
		if (empty($_POST)) {
            $this->zj = ' ';
			$this->pagination->total($this->user_model->countStudents());
			$this->students = $this->user_model->getStudents();
            //var_dump($this->students);
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
			}else{$zj = 'id';}
            $this->zj = $zj;
            $this->load->model('user_model');
			if (!empty($_POST['export'])) {
				$this->students = $this->user_model->getAllSearchStudents($conditions);
				$this->_export('学生数据导出', $this->students);
				die;
			} else {
				$this->pagination->total($this->user_model->countSearchStudents($conditions));
				$this->students = $this->user_model->getSearchStudents($conditions,$zj);
			}
		}
		$this->load->view('users/student/list', $this);
	}

	public function add() {
		if (empty($_POST)) {
			$this->load->model('classes/major_field_model');
			$this->major_fields = $this->major_field_model->getAllMajor_fields();
			$this->load->view('users/student/add', $this);
		} else {
			$data = array(
				'class_id' => @$_POST['class_id'],
				'password' => crypt($_POST['password']),
				'username' => @$_POST['student_num'],
				'name' => @$_POST['name'],
				'sexual' => @$_POST['sexual'],
				'student_num' => @$_POST['student_num'],
				'birthday' => @$_POST['birthday'],
				'id_no' => @$_POST['id_no'],
				'politics_status' => (int) @$_POST['politics_status'],
				'marital_status' => @$_POST['marital_status'],
				'party_join_time' => @$_POST['party_join_time'],
				'league_join_time' => @$_POST['league_join_time'],
				'nation' => @$_POST['nation'],
				'birthplace' => @$_POST['birthplace'],
				'bedroom' => @$_POST['bedroom'],
				'tel' => @$_POST['tel'],
				'email' => @$_POST['email'],
				'home_addr' => @$_POST['home_addr'],
				'letter_title' => @$_POST['letter_title'],
				# 基础信息补完
				'pinyin' => @$_POST['pinyin'],
				'enroll_date' => @$_POST['enroll_date'],
				'edu_system' => @$_POST['edu_system'],
				'grade' => @$_POST['grade'],
				'major' => @$_POST['major'],
				'job_title' => @$_POST['job_title'],
				'at_school_type' => @$_POST['at_school_type'],
				'boc_card_num' => @$_POST['boc_card_num'],
				'is_innovation_base' => (int) @$_POST['is_innovation_base'],
				'entrance_scholarship' => @$_POST['entrance_scholarship'],
				'is_at_school' => (int) @$_POST['is_at_school'],
				'registered' => (int) @$_POST['registered'],
				'last_registered' => @$_POST['last_registered'],
				'graduation_time' => @$_POST['graduation_time'],
//				'internship_addr' => @$_POST['internship_addr'],
//				'internship_contact' => @$_POST['internship_contact'],
				'is_psychology_hard' => (int) @$_POST['is_psychology_hard'],
				'is_financial_hard' => (int) @$_POST['is_financial_hard'],
				'is_study_hard' => (int) @$_POST['is_study_hard'],
				# 入学成绩
				'foreign_language' => @$_POST['foreign_language'],
				'foreign_language_score' => @$_POST['foreign_language_score'],
				'foreign_language_listening_score' => @$_POST['foreign_language_listening_score'],
				'political_theory' => @$_POST['political_theory'],
				'political_theory_score' => @$_POST['political_theory_score'],
				'pro_course1' => @$_POST['pro_course1'],
				'pro_course1_score' => @$_POST['pro_course1_score'],
				'pro_course2' => @$_POST['pro_course2'],
				'pro_course2_score' => @$_POST['pro_course2_score'],
				'pro_course3' => @$_POST['pro_course3'],
				'pro_course3_score' => @$_POST['pro_course3_score'],
				'retest_score' => @$_POST['retest_score'],
				'total_score' => @$_POST['total_score'],
				'score_note' => @$_POST['score_note'],
				# 来源信息
				'student_source' => @$_POST['student_source'],
				'working_age' => @$_POST['working_age'],
				'entrance_way' => @$_POST['entrance_way'],
				'original_degree' => @$_POST['original_degree'],
				'original_graduation_unit' => @$_POST['original_graduation_unit'],
				'original_graduation_year' => @$_POST['original_graduation_year'],
				'original_work_unit' => @$_POST['original_work_unit'],
				'original_major' => @$_POST['original_major'],
				'entrance_resume' => @$_POST['entrance_resume'],
				# 家庭资料
				'home_tel' => @$_POST['home_tel'],
				'home_postcode' => @$_POST['home_postcode'],
				'home_addr' => @$_POST['home_addr'],
				'father_name' => @$_POST['father_name'],
				'father_tel' => @$_POST['father_tel'],
				'father_work_unit' => @$_POST['father_work_unit'],
				'mother_name' => @$_POST['mother_name'],
				'mother_tel' => @$_POST['mother_tel'],
				'mother_work_unit' => @$_POST['mother_work_unit'],
				'other_relative_name' => @$_POST['other_relative_name'],
				'other_relative_tel' => @$_POST['other_relative_tel'],
				'other_relative_work_unit' => @$_POST['other_relative_work_unit'],
				# 保险信息
				'insurance_1st' => (int) @$_POST['insurance_1st'],
				'insurance_2nd' => (int) @$_POST['insurance_2nd'],
				'insurance_other' => @$_POST['insurance_other'],
			);
			if ($this->user_model->addStudent($data)) {
				$ret = array(
					'statusCode' => '200',
					'message' => '添加成功',
					'navTabId' => 'users_student',
					'callbackType' => 'closeCurrent',
				);
			} else {
				$ret = array(
					'statusCode' => '300',
					'message' => '添加失败',
					'navTabId' => 'users_student',
					'callbackType' => 'closeCurrent',
				);
			}
			echo json_encode($ret);
		}
	}

	public function edit() {
		$time = date('Y-m-d',time());
		$this->id = empty($_GET['id']) ? 0 : (int) $_GET['id'];
		if ('student' == $this->user->user_type) {
			# 限制学生用户只能编辑自己的资料
			$this->id = $this->user->id;
		}
		$this->student = $this->user_model->getStudent($this->id);
		$this->class_names = $this->classes_model->getClassNames();
		if (empty($_POST)) {
			$this->load->model('classes/major_field_model');
			$this->major_fields = $this->major_field_model->getAllMajor_fields();
			$this->load->view('users/student/edit', $this);
		} else {
            //获取上传图片
            $file = $_FILES;
            $img_name = $file["img"]['name'];
            $img_type = $file["img"]['type'];
            $img_size = $file["img"]['size'];
            $str = strrchr($img_name,".");//获取图片类型
            $imgName = $_POST['student_num'];//获取学生学号
            $img_size_max = 1024*1024*2;//2M限制文件上传最大容量（bytes）
            $img_temp_name = $file["img"]['tmp_name'];//获取图片缓存路径
            $img_mtype = array('image/jpeg','image/gif','image/png','image/bmp','');
            //$upload_url = dirname(__FILE__).'/img_url/'.$imgName.$str;//设置图片最终路径
            $upload_url = UploadImage.'/uploadImages/'.$imgName.$str;//设置图片最终路径
            $img_url = 'uploadImages/'.$imgName.$str;//数据库图片路径
            if(empty($str)){//判断是否对贴图进行过修改
                $img_url = $_POST['img_url'];
            }
            if(!in_array($img_type, $img_mtype)){//判断是否为图片
                $ret = array(
		          'statusCode' => '300',
		          'message' => '只能上传图片',
		          'navTabId' => 'users_student',
		          'callbackType' => 'closeCurrent',
                );
                echo json_encode($ret);
                exit;
            }
            //var_dump($upload_url);
            if($img_size > $img_size_max){//判断图片是否否过大
                $ret = array(
		          'statusCode' => '300',
		          'message' => '图片过大',
		          'navTabId' => 'users_student',
		          'callbackType' => 'closeCurrent',
                );
                echo json_encode($ret);
                exit;
            }
            move_uploaded_file($img_temp_name,$upload_url); //复制文件到指定目录


			$data = array(
				'class_id' => @$_POST['class_id'],
//				'name' => @$_POST['name'],
//				'sexual' => @$_POST['sexual'],
//				'username' => @$_POST['student_num'],
//				'student_num' => @$_POST['student_num'],
//				'birthday' => @$_POST['birthday'],
//				'id_no' => @$_POST['id_no'],
				'politics_status' => (int) @$_POST['politics_status'],
				'marital_status' => @$_POST['marital_status'],
				'party_join_time' => @$_POST['party_join_time'],
				'league_join_time' => @$_POST['league_join_time'],
				'nation' => @$_POST['nation'],
				'birthplace' => @$_POST['birthplace'],
				'bedroom' => @$_POST['bedroom'],
				'tel' => @$_POST['tel'],
				'email' => @$_POST['email'],
				'home_addr' => @$_POST['home_addr'],
				'letter_title' => @$_POST['letter_title'],
				# 基础信息补完
				'pinyin' => @$_POST['pinyin'],
				'enroll_date' => @$_POST['enroll_date'],
				'edu_system' => @$_POST['edu_system'],
				'grade' => @$_POST['grade'],
				'major' => @$_POST['major'],
				'job_title' => @$_POST['job_title'],
				'at_school_type' => @$_POST['at_school_type'],
				'boc_card_num' => @$_POST['boc_card_num'],
				'is_innovation_base' => (int) @$_POST['is_innovation_base'],
				'entrance_scholarship' => @$_POST['entrance_scholarship'],
//				'is_at_school' => (int) @$_POST['is_at_school'],
//				'registered' => (int) @$_POST['registered'],
//				'last_registered' => @$_POST['last_registered'],
//				'graduation_time' => @$_POST['graduation_time'],
//				'internship_addr' => @$_POST['internship_addr'],
//				'internship_contact' => @$_POST['internship_contact'],
				'is_psychology_hard' => (int) @$_POST['is_psychology_hard'],
				'is_financial_hard' => (int) @$_POST['is_financial_hard'],
				'is_study_hard' => (int) @$_POST['is_study_hard'],
				# 入学成绩
				'foreign_language' => @$_POST['foreign_language'],
				'foreign_language_score' => @$_POST['foreign_language_score'],
				'foreign_language_listening_score' => @$_POST['foreign_language_listening_score'],
				'political_theory' => @$_POST['political_theory'],
				'political_theory_score' => @$_POST['political_theory_score'],
				'pro_course1' => @$_POST['pro_course1'],
				'pro_course1_score' => @$_POST['pro_course1_score'],
				'pro_course2' => @$_POST['pro_course2'],
				'pro_course2_score' => @$_POST['pro_course2_score'],
				'pro_course3' => @$_POST['pro_course3'],
				'pro_course3_score' => @$_POST['pro_course3_score'],
				'retest_score' => @$_POST['retest_score'],
				'total_score' => @$_POST['total_score'],
				'score_note' => @$_POST['score_note'],
				# 来源信息
				'student_source' => @$_POST['student_source'],
				'working_age' => @$_POST['working_age'],
				'entrance_way' => @$_POST['entrance_way'],
				'original_degree' => @$_POST['original_degree'],
				'original_graduation_unit' => @$_POST['original_graduation_unit'],
				'original_graduation_year' => @$_POST['original_graduation_year'],
				'original_work_unit' => @$_POST['original_work_unit'],
				'original_major' => @$_POST['original_major'],
				'entrance_resume' => @$_POST['entrance_resume'],
				# 家庭资料
				'home_tel' => @$_POST['home_tel'],
				'home_postcode' => @$_POST['home_postcode'],
				'home_addr' => @$_POST['home_addr'],
				'father_name' => @$_POST['father_name'],
				'father_tel' => @$_POST['father_tel'],
				'father_work_unit' => @$_POST['father_work_unit'],
				'mother_name' => @$_POST['mother_name'],
				'mother_tel' => @$_POST['mother_tel'],
				'mother_work_unit' => @$_POST['mother_work_unit'],
				'other_relative_name' => @$_POST['other_relative_name'],
				'other_relative_tel' => @$_POST['other_relative_tel'],
				'other_relative_work_unit' => @$_POST['other_relative_work_unit'],
				# 保险信息
				'insurance_1st' => (int) @$_POST['insurance_1st'],
				'insurance_2nd' => (int) @$_POST['insurance_2nd'],
				'insurance_other' => @$_POST['insurance_other'],
                'img_url' => "$img_url",
				'updatetime'=>"$time",
			);
			if (!empty($_POST['name'])) {
				$data['name'] = $_POST['name'];
			}
			if (!empty($_POST['student_num'])) {
				$data['student_num'] = $_POST['student_num'];
			}
			if (!empty($_POST['sexual'])) {
				$data['sexual'] = $_POST['sexual'];
			}
			if (!empty($_POST['birthday'])) {
				$data['birthday'] = $_POST['birthday'];
			}
			if (!empty($_POST['id_no'])) {
				$data['id_no'] = $_POST['id_no'];
			}
			if (!empty($_POST['is_at_school'])) {
				$data['is_at_school'] = $_POST['is_at_school'];
			}
			if (!empty($_POST['registered'])) {
				$data['registered'] = $_POST['registered'];
			}
			if (!empty($_POST['last_registered'])) {
				$data['last_registered'] = $_POST['last_registered'];
			}
			if (!empty($_POST['graduation_time'])) {
				$data['graduation_time'] = $_POST['graduation_time'];
			}
			if (!empty($_POST['password'])) {
				$data['password'] = crypt($_POST['password']);
			}
			if ($this->user_model->editStudent($this->id, $data)) {
				$ret = array(
					'statusCode' => '200',
					'message' => '修改成功',
					'navTabId' => 'users_student',
					'callbackType' => 'closeCurrent',
				);
			} else {
				$ret = array(
					'statusCode' => '300',
					'message' => '修改失败',
					'navTabId' => 'users_student',
					'callbackType' => 'closeCurrent',
				);
			}
			echo json_encode($ret);
		}
	}

	public function edit_contact() {
		# 限制学生用户只能编辑自己的资料
		$this->id = $this->user->id;
		$this->student = $this->user_model->getStudent($this->id);
		if (empty($_POST)) {
			$this->load->view('users/student/edit_contact', $this);
		} else {
			$data = array(
				'tel' => @$_POST['tel'],
			);
			if ($this->user_model->editStudent($this->id, $data)) {
				$ret = array(
					'statusCode' => '200',
					'message' => '更新成功',
					'navTabId' => 'users_student',
					'callbackType' => 'closeCurrent',
				);
			} else {
				$ret = array(
					'statusCode' => '300',
					'message' => '更新失败',
					'navTabId' => 'users_student',
					'callbackType' => 'closeCurrent',
				);
			}
			echo json_encode($ret);
		}
	}

	public function del() {
		$this->id = empty($_GET['id']) ? 0 : (int) $_GET['id'];
		// TODO: 判断是否是自己
		if ($this->user_model->delStudent($this->id)) {
			$ret = array(
				'statusCode' => '200',
				'message' => '删除成功',
				'navTabId' => 'users_student',
			);
		} else {
			$ret = array(
				'statusCode' => '300',
				'message' => '删除失败',
				'navTabId' => 'users_student',
			);
		}
		echo json_encode($ret);
	}

	public function bulk_del() {
		if (empty($_POST)) {
			$ret = array(
				'statusCode' => '300',
				'message' => '删除失败',
			);
			die(json_encode($ret));
		} else {
			$this->ids = empty($_POST['ids']) ? '' : $_POST['ids'];
			$ids = explode(',', $this->ids);
			foreach ($ids as $id) {
				$this->user_model->delStudent($id);
			}
			$ret = array(
				'statusCode' => '200',
				'message' => '删除成功',
				'navTabId' => 'users_student',
			);
			die(json_encode($ret));
		}
	}

	public function view() {
		$this->id = empty($_GET['id']) ? 0 : (int) $_GET['id'];
		if ('student' == $this->user_type && $this->user->id != $this->id) {
			die(json_encode(array('statusCode' => '300', 'message' => '对不起，您没有权限查看他人资料!',)));
		}

		$this->student = $this->user_model->getStudent($this->id);
		if ($this->student->class_id) {
			$this->class = $this->classes_model->getClass($this->student->class_id);
		}
		$this->class_names = $this->classes_model->getClassNames();
		$this->load->model('branches/member_model');
		$this->branch_member = $this->member_model->getMember($this->id);

		# 获取实习信息
		$this->load->model('classes/internship_model');
		$this->internships = $this->internship_model->getAllInternshipsByStudent($this->id);
		$this->newest_internship = $this->internship_model->getNewestInternship($this->id);
        //var_dump($this->newest_internship);
		$this->load->view('users/student/view', $this);
	}

	public function print_view() {
		$this->id = empty($_GET['id']) ? 0 : (int) $_GET['id'];
		if ('student' == $this->user_type && $this->user->id != $this->id) {
			die(json_encode(array('statusCode' => '300', 'message' => '对不起，您没有权限查看他人资料!',)));
		}

		$this->student = $this->user_model->getStudent($this->id);
		$this->class_names = $this->classes_model->getClassNames();
		$this->load->model('branches/member_model');
		$this->branch_member = $this->member_model->getMember($this->id);


		$filename = '新生登记表' . '.doc';
		$encoded_filename = str_replace("+", "%20", urlencode($filename));

		header('Content-Type: application/doc');
		if (preg_match("/MSIE/", $_SERVER['HTTP_USER_AGENT'])) {
			header('Content-Disposition: attachment;filename="' . $encoded_filename . '"');
		} elseif (preg_match("/Firefox/", $_SERVER['HTTP_USER_AGENT'])) {
			header('Content-Disposition: attachment;filename*="utf8\'\'' . $filename . '"');
		} else {
			header('Content-Disposition: attachment;filename="' . $filename . '"');
		}
		header('Cache-Control: max-age=0');

		$this->load->view('users/student/print', $this);
	}

	public function import() {
		$this->type = empty($_GET['type']) ? '' : $_GET['type'];
		$key = 'student_import_' . $this->type;
		$this->load->model('options/option_model');
		$this->columns = $this->option_model->getOption($key);
		if ($_POST) {
			error_reporting(E_ALL);
			set_time_limit(0);
			date_default_timezone_set('Asia/Shanghai');
			// PHPExcel 路径: APPPATH.'PHPExcel/'
			set_include_path(get_include_path() . PATH_SEPARATOR . APPPATH . 'PHPExcel/');
			// 上传路径: FCPATH . 'upload/'
			$upload_dir = FCPATH . 'upload/import/';
			$config['upload_path'] = $upload_dir;
			$config['allowed_types'] = 'xls';
			$config['max_size'] = '64000';

			$this->load->library('upload', $config);

			// 上传失败处理
			if (!$this->upload->do_upload('student_file')) {
				$ret = array(
					'statusCode' => '300',
					'message' => '上传失败: ' . $this->upload->display_errors(),
					'navTabId' => 'users_student',
				);
				die(json_encode($ret));
			}

			// 上传成功，开始导入数据
			$file_data = $this->upload->data();
			$inputFileName = $file_data['full_path'];
			$inputFileType = 'Excel5';
			include 'PHPExcel/IOFactory.php';
			$objReader = PHPExcel_IOFactory::createReader($inputFileType);
			$objReader->setReadDataOnly(true);
			$objPHPExcel = $objReader->load($inputFileName);
			$sheetData = $objPHPExcel->getActiveSheet()->toArray(null, false, false, true);
			unset($sheetData[1]);
			foreach ($sheetData as $row) {
				$is_empty_row = true;
				foreach ($this->columns as $key => $col) {
					if ($col) {
						$data[$key] = $row[$col];
						if ($row[$col]) {
							$is_empty_row = false;
						}
					}
				}
				if ($is_empty_row) {
					continue;
				}
				# 设置用户名和学号相同
				isset($data['student_num']) and $data['username'] = $data['student_num'];
				# 设置默认密码为 111111
				$data['password'] = crypt('111111');
				$this->user_model->addStudent($data);
			}
			// 导入完成后删除上传的文件
			@unlink($inputFileName);
			$ret = array(
				'statusCode' => '200',
				'message' => '导入成功',
				'navTabId' => 'users_student',
				'callbackType' => 'closeCurrent',
			);
			echo json_encode($ret);
		} else {
			if (empty($this->columns)) {
				die('请先进行导入设置!');
			}
			$this->load->view('users/student/import', $this);
		}
	}

	public function league_export() {
		if (empty($_POST)) {
			$this->load->view('users/student/league_export');
		} else {
			$year = isset($_POST['year']) ? (int) $_POST['year'] : '';
			if ($year) {
				$sheet_title = $year . '团员';
			} else {
				$sheet_title = '团员';
			}
			$this->load->model('classes/member_model');
			$members = $this->member_model->getLeagueMembersByYear($year);

			$this->_export($sheet_title, $members);
		}
	}

	private function _export($sheet_title, $students) {
		set_include_path(get_include_path() . PATH_SEPARATOR . APPPATH . 'PHPExcel/');
		require_once 'PHPExcel.php';
		$objPHPExcel = new PHPExcel();
		$objPHPExcel->getProperties()->setCreator('School of Software Technology, Zhejiang University')
				->setLastModifiedBy('School of Software Technology, Zhejiang University')
				->setTitle('Student Data Export');
		$objPHPExcel->setActiveSheetIndex(0)->setTitle($sheet_title);
		$sheet = $objPHPExcel->getActiveSheet();
		// 填入 Excel 的列标题
		$titles = array(
			'学号',
            '班级',
			'姓名',
			'性别',
			'身份证号',
			'民族',
			'政治面貌',
			'入党时间',
			'入团时间',
			'全日制教育学历',
			'团员所在区域',
			'是否在本县区从业',
			'固定电话',
			'手机号码',
			'邮箱',
			'备注',
		);
		$col = 0;
		foreach ($titles as $title) {
			$sheet->setCellValueByColumnAndRow($col, 1, $title);
			$col++;
		}
		// 标题加粗
		$sheet->getStyle('A1:N1')->applyFromArray(array('font' => array('bold' => true)));

		// 填入 Excel 数据
		$row = 2;
		foreach ($students as $student) {
//			foreach (array(0, 2, 11) as $col) {
//				$sheet->getStyleByColumnAndRow($col, $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
//			}
            $this->class_names = $this->classes_model->getClassNames();
            $id =   $student->class_id;
            if($id == 0){$class='无';}else{$class =  $this->class_names[$id];}
			$sheet->setCellValueByColumnAndRow(0, $row, $student->student_num . ' ');
            $sheet->setCellValueByColumnAndRow(1, $row, $class);
			$sheet->setCellValueByColumnAndRow(2, $row, $student->name);
			$sheet->setCellValueByColumnAndRow(3, $row, $student->sexual);
			$sheet->setCellValueByColumnAndRow(4, $row, $student->id_no . ' ');
			$sheet->setCellValueByColumnAndRow(5, $row, $student->nation);
			$sheet->setCellValueByColumnAndRow(6, $row, $student->politics_status == 1 ? '共青团员' : '中共党员');
			$sheet->setCellValueByColumnAndRow(7, $row, $student->party_join_time);
			$sheet->setCellValueByColumnAndRow(8, $row, $student->league_join_time);
			$sheet->setCellValueByColumnAndRow(9, $row, '大学本科');
			$sheet->setCellValueByColumnAndRow(10, $row, '学校');
			$sheet->setCellValueByColumnAndRow(11, $row, '否');
			$sheet->setCellValueByColumnAndRow(12, $row, '');
			$sheet->setCellValueByColumnAndRow(13, $row, $student->tel . ' ');
			$sheet->setCellValueByColumnAndRow(14, $row, $student->email);
			$sheet->setCellValueByColumnAndRow(15, $row, '');
			$row++;
		}
		$filename = $sheet_title . '.xls';
		$encoded_filename = str_replace("+", "%20", urlencode($filename));

		header('Content-Type: application/vnd.ms-excel');
		if (preg_match("/MSIE/", $_SERVER['HTTP_USER_AGENT'])) {
			header('Content-Disposition: attachment;filename="' . $encoded_filename . '"');
		} elseif (preg_match("/Firefox/", $_SERVER['HTTP_USER_AGENT'])) {
			header('Content-Disposition: attachment;filename*="utf8\'\'' . $filename . '"');
		} else {
			header('Content-Disposition: attachment;filename="' . $filename . '"');
		}
		header('Cache-Control: max-age=0');

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output');
		exit;
	}

}

/* End of file student.php */
/* Location: ./app/controllers/users/student.php */