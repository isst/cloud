<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * 奖学金申请
 */
class Scholarship_request extends MY_Controller {

	function __construct() {
		// 设置各角色的访问权限
		$this->user_permit = array(
			'teacher' => array('index', 'view', 'review', 'bulk_review',),
			'student' => array('index', 'view', 'add',),
		);
		parent::__construct();

		$this->load->model('classes/scholarship_item_model');
		$this->load->model('classes/scholarship_request_model');
		$this->require_status_names = array(
			'等待德育导师审批',
			'德育导师审核未通过',
			'德育导师已通过，等待研工部审批',
			'研工部审核未通过',
			'研工部审核已通过',
		);
	}

	/**
	 * 奖学金申请列表
	 */
	public function index() {

		$this->load->library('pagination');
		$student_id = empty($_GET['student_id']) ? 0 : (int) $_GET['student_id'];
		if ($student_id) {
			$this->pagination->total($this->scholarship_request_model->countScholarship_requestsByStudent($student_id));
			$this->scholarship_requests = $this->scholarship_request_model->getScholarship_requestsByStudent($student_id);
		} else {
			switch ($this->user_type) {
				case 'student':
					$this->pagination->total($this->scholarship_request_model->countScholarship_requestsByStudent($this->user->id));
					$this->scholarship_requests = $this->scholarship_request_model->getScholarship_requestsByStudent($this->user->id);
					break;
				case 'teacher':
					$this->pagination->total($this->scholarship_request_model->countScholarship_requestsByClassAdviser($this->user->id));
					$this->scholarship_requests = $this->scholarship_request_model->getScholarship_requestsByClassAdviser($this->user->id);
					break;
				case 'administrator':
					$item_id = isset($_GET['item_id']) ? (int) $_GET['item_id'] : 0;
					$this->pagination->total($this->scholarship_request_model->countScholarship_requestsByAdmin($item_id));
					$this->scholarship_requests = $this->scholarship_request_model->getScholarship_requestsByAdmin($item_id);
					break;
				default:
					$this->pagination->total($this->scholarship_request_model->countScholarship_requests());
					$this->scholarship_requests = $this->scholarship_request_model->getScholarship_requests();
					break;
			}
		}

		$this->load->view('classes/scholarship_request/list', $this);
	}

	/**
	 * 创建奖学金申请
	 */
	public function add() {
		$this->item_id = empty($_GET['item_id']) ? 0 : (int) $_GET['item_id'];
		if (empty($_POST)) {
			$this->load->model('classes/classes_model');
			$this->class = $this->classes_model->getClass($this->user->class_id);
			$this->load->view('classes/scholarship_request/add', $this);
		} else {
			$data = array(
				'request_time' => date('Y-m-d H:i:s'),
				'item_id' => $this->item_id,
				'student_id' => $this->user->id,
				'politics_status' => @$_POST['politics_status'],
				'job_info' => @$_POST['job_info'],
				'research_info' => @$_POST['research_info'],
				'awards' => @$_POST['awards'],
			);
			if ($this->scholarship_request_model->addScholarship_request($data)) {
				$ret = array(
					'statusCode' => '200',
					'message' => '申请成功',
					'navTabId' => 'scholarship_request',
					'callbackType' => 'closeCurrent',
				);
			} else {
				$ret = array(
					'statusCode' => '300',
					'message' => '添加失败',
					'navTabId' => 'scholarship_request',
					'callbackType' => 'closeCurrent',
				);
			}
			die(json_encode($ret));
		}
	}

	/**
	 * 编辑奖学金申请
	 */
	public function edit() {
		$id = (int) $_GET['id'];
		$this->scholarship_request = $this->scholarship_request_model->getScholarship_request($id);
		if (empty($_POST)) {
			$this->load->view('classes/scholarship_request/edit', $this);
		} else {
			$data = array(
				'politics_status' => @$_POST['politics_status'],
				'job_info' => @$_POST['job_info'],
				'research_info' => @$_POST['research_info'],
				'awards' => @$_POST['awards'],
			);
			if ($this->scholarship_request_model->editScholarship_request($id, $data)) {
				$ret = array(
					'statusCode' => '200',
					'message' => '修改奖学金申请信息成功',
					'navTabId' => 'scholarship_request',
					'callbackType' => 'closeCurrent',
				);
			} else {
				$ret = array(
					'statusCode' => '300',
					'message' => '修改奖学金申请信息失败',
					'navTabId' => 'scholarship_request',
					'callbackType' => 'closeCurrent',
				);
			}
			echo json_encode($ret);
		}
	}

	/**
	 * 查看奖学金申请
	 */
	public function view() {
		$id = (int) $_GET['id'];
		$this->scholarship_request = $this->scholarship_request_model->getScholarship_request($id);

		$this->load->model('classes/member_model');
		$this->student = $this->member_model->getMember($this->scholarship_request->student_id);
		$this->load->model('classes/classes_model');
		$this->class = $this->classes_model->getClass($this->student->class_id);

		$this->load->view('classes/scholarship_request/view', $this);
	}

	/**
	 * 打印奖学金申请
	 */
	public function print_view() {
		$id = (int) $_GET['id'];
		$this->scholarship_request = $this->scholarship_request_model->getScholarship_request($id);

		$this->load->model('classes/member_model');
		$this->student = $this->member_model->getMember($this->scholarship_request->student_id);
		$this->load->model('classes/classes_model');
		$this->class = $this->classes_model->getClass($this->student->class_id);

		$this->load->view('classes/scholarship_request/print', $this);
	}

	/**
	 * 删除奖学金申请
	 */
	public function del() {
		$this->id = empty($_GET['id']) ? 0 : (int) $_GET['id'];
		if ($this->scholarship_request_model->delScholarship_request($this->id)) {
			$ret = array(
				'statusCode' => '200',
				'message' => '删除成功',
				'navTabId' => 'scholarship_request',
			);
		} else {
			$ret = array(
				'statusCode' => '300',
				'message' => '删除失败',
				'navTabId' => 'scholarship_request',
			);
		}
		echo json_encode($ret);
	}

	public function review() {
		$this->id = empty($_GET['id']) ? 0 : (int) $_GET['id'];
		if ($_POST) {
			$request = $this->scholarship_request_model->getScholarship_request($this->id);
			$user_status_plus = (('administrator' == $this->user_type) ? 2 : 0);
			$new_status = @$_POST['status'] + $user_status_plus;
			if ($request->status > 2 + $user_status_plus) {
				$ret = array(
					'statusCode' => '300',
					'message' => '后续部门已进行审核操作，不允许再更改审核状态！',
				);
				die(json_encode($ret));
			}
			$data = array(
				'status' => $new_status,
			);
			if ($this->scholarship_request_model->editScholarship_request($this->id, $data)) {
				$ret = array(
					'statusCode' => '200',
					'message' => '审核成功',
					'callbackType' => 'closeCurrent',
					'navTabId' => 'scholarship_request',
				);
				die(json_encode($ret));
			}
			$ret = array(
				'statusCode' => '300',
				'message' => '审核失败',
			);
			die(json_encode($ret));
		} else {
			$this->scholarship_request = $this->scholarship_request_model->getScholarship_request($this->id);
			$this->load->view('classes/scholarship_request/review', $this);
		}
	}

	public function bulk_review() {
		if (empty($_POST) || empty($_GET['status'])) {
			$ret = array(
				'statusCode' => '300',
				'message' => '审核失败',
			);
			die(json_encode($ret));
		} else {
			$this->ids = empty($_POST['ids']) ? '' : $_POST['ids'];
			$ids = explode(',', $this->ids);
			$user_status_plus = (('administrator' == $this->user_type) ? 2 : 0);
			$new_status = (int) $_GET['status'] + $user_status_plus;
			foreach ($ids as $id) {
				$request = $this->scholarship_request_model->getScholarship_request($id);
				if ($request->status > 2 + $user_status_plus) {
					# 后续部门已进行审核操作，不允许再更改审核状态，跳过处理
					continue;
				}
				$data = array(
					'status' => $new_status,
				);
				$this->scholarship_request_model->editScholarship_request($id, $data);
			}
			$ret = array(
				'statusCode' => '200',
				'message' => '审核操作成功',
				'navTabId' => 'scholarship_request',
			);
			die(json_encode($ret));
		}
	}

	function export() {
		if (empty($_POST)) {
			$this->load->view('classes/scholarship_request/export');
		} else {
			$year = isset($_POST['year']) ? (int) $_POST['year'] : '';
			if ($year) {
				$sheet_title = $year . '年度奖学金';
			} else {
				$sheet_title = '奖学金';
			}
			set_include_path(get_include_path() . PATH_SEPARATOR . APPPATH . 'PHPExcel/');
			require_once 'PHPExcel.php';
			$objPHPExcel = new PHPExcel();

			$objPHPExcel->getProperties()->setCreator('School of Software Technology, Zhejiang University')
					->setLastModifiedBy('School of Software Technology, Zhejiang University')
					->setTitle('Student Data Export');
			$objPHPExcel->setActiveSheetIndex(0)->setTitle($sheet_title);
			$sheet = $objPHPExcel->getActiveSheet();

			// 填入 Excel 的列标题
			$titles = array('序号', '学号', '姓名', '班级','奖项','金额');
			$col = 0;
			foreach ($titles as $title) {
				$sheet->setCellValueByColumnAndRow($col, 1, $title);
				//$sheet->getStyleByColumnAndRow($col, 1)->applyFromArray(array('font' => array('bold' => true)));
				$col++;
			}
			// 标题加粗
			$sheet->getStyle('A1:D1')->applyFromArray(array('font' => array('bold' => true)));

			$winners = $this->scholarship_request_model->getScholarshipsWinnersByYear($year);

			// 填入 Excel 数据
			$row = 2;
			foreach ($winners as $winner) {
				$sheet->setCellValueByColumnAndRow(0, $row, $row - 1);
				$sheet->setCellValueByColumnAndRow(1, $row, $winner->student_num);
				$sheet->setCellValueByColumnAndRow(2, $row, $winner->student_name);
				$sheet->setCellValueByColumnAndRow(3, $row, $winner->class_name);
				$sheet->setCellValueByColumnAndRow(4, $row, $winner->item_title);
				$sheet->setCellValueByColumnAndRow(5, $row, $winner->item_money);
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

}

/* End of file scholarship_request.php */
/* Location: ./app/controllers/classes/scholarship_request.php */