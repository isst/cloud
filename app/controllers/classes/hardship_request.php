<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * 困难补助申请
 */
class Hardship_request extends MY_Controller {

	function __construct() {
		// 设置各角色的访问权限
		$this->user_permit = array(
			'teacher' => array('index', 'view', 'review',),
			'student' => array('index', 'view', 'add',),
		);
		parent::__construct();

		$this->load->model('classes/hardship_item_model');
		$this->load->model('classes/hardship_request_model');
		$this->require_status_names = array(
			'等待德育导师审批',
			'德育导师审核未通过',
			'德育导师已通过，等待研工部审批',
			'研工部审核未通过',
			'研工部审核已通过',
		);
	}

	/**
	 * 困难补助申请列表
	 */
	public function index() {

		$this->load->library('pagination');
		$student_id = empty($_GET['student_id']) ? 0 : (int) $_GET['student_id'];
		if ($student_id) {
			$this->pagination->total($this->hardship_request_model->countHardship_requestsByStudent($student_id));
			$this->hardship_requests = $this->hardship_request_model->getHardship_requestsByStudent($student_id);
		} else {
			switch ($this->user_type) {
				case 'student':
					$this->pagination->total($this->hardship_request_model->countHardship_requestsByStudent($this->user->id));
					$this->hardship_requests = $this->hardship_request_model->getHardship_requestsByStudent($this->user->id);
					break;
				case 'teacher':
					$this->pagination->total($this->hardship_request_model->countHardship_requestsByClassAdviser($this->user->id));
					$this->hardship_requests = $this->hardship_request_model->getHardship_requestsByClassAdviser($this->user->id);
					break;
				case 'administrator':
					$item_id = isset($_GET['item_id']) ? (int) $_GET['item_id'] : 0;
					$this->pagination->total($this->hardship_request_model->countHardship_requestsByAdmin($item_id));
					$this->hardship_requests = $this->hardship_request_model->getHardship_requestsByAdmin($item_id);
					break;
				default:
					$this->pagination->total($this->hardship_request_model->countHardship_requests());
					$this->hardship_requests = $this->hardship_request_model->getHardship_requests();
					break;
			}
		}

		$this->load->view('classes/hardship_request/list', $this);
	}

	/**
	 * 创建困难补助申请
	 */
	public function add() {
		$this->item_id = empty($_GET['item_id']) ? 0 : (int) $_GET['item_id'];
		if (empty($_POST)) {
			$this->load->model('classes/classes_model');
			$this->class = $this->classes_model->getClass($this->user->class_id);
			$this->load->view('classes/hardship_request/add', $this);
		} else {
			$data = array(
				'request_time' => date('Y-m-d H:i:s'),
				'item_id' => $this->item_id,
				'student_id' => $this->user->id,
				'major' => @$_POST['major'],
				'college' => @$_POST['college'],
				'contact' => @$_POST['contact'],
				'politics_status' => @$_POST['politics_status'],
				'enrollment_date' => @$_POST['enrollment_date'],
				'home_addr' => @$_POST['home_addr'],
				'reason' => @$_POST['reason'],
				'amount_apply' => (int) @$_POST['amount_apply'],
			);
			if ($this->hardship_request_model->addHardship_request($data)) {
				$ret = array(
					'statusCode' => '200',
					'message' => '申请成功',
					'navTabId' => 'hardship_request',
					'callbackType' => 'closeCurrent',
				);
			} else {
				$ret = array(
					'statusCode' => '300',
					'message' => '添加失败',
					'navTabId' => 'hardship_request',
					'callbackType' => 'closeCurrent',
				);
			}
			die(json_encode($ret));
		}
	}

	/**
	 * 编辑困难补助申请
	 */
	public function edit() {
		$id = (int) $_GET['id'];
		$this->hardship_request = $this->hardship_request_model->getHardship_request($id);
		if (empty($_POST)) {
			$this->load->view('classes/hardship_request/edit', $this);
		} else {
			$data = array(
				'major' => @$_POST['major'],
				'college' => @$_POST['college'],
				'politics_status' => @$_POST['politics_status'],
				'enrollment_date' => @$_POST['enrollment_date'],
				'home_addr' => @$_POST['home_addr'],
				'reason' => @$_POST['reason'],
				'amount_apply' => @$_POST['amount_apply'],
			);
			if ($this->hardship_request_model->editHardship_request($id, $data)) {
				$ret = array(
					'statusCode' => '200',
					'message' => '修改困难补助申请信息成功',
					'navTabId' => 'hardship_request',
					'callbackType' => 'closeCurrent',
				);
			} else {
				$ret = array(
					'statusCode' => '300',
					'message' => '修改困难补助申请信息失败',
					'navTabId' => 'hardship_request',
					'callbackType' => 'closeCurrent',
				);
			}
			echo json_encode($ret);
		}
	}

	/**
	 * 查看困难补助申请
	 */
	public function view() {
		$id = (int) $_GET['id'];
		$this->hardship_request = $this->hardship_request_model->getHardship_request($id);

		$this->load->model('classes/member_model');
		$this->student = $this->member_model->getMember($this->hardship_request->student_id);
		$this->load->model('classes/classes_model');
		$this->class = $this->classes_model->getClass($this->student->class_id);

		$this->load->view('classes/hardship_request/view', $this);
	}

	/**
	 * 打印困难补助申请
	 */
	public function print_view() {
		$id = (int) $_GET['id'];
		$this->hardship_request = $this->hardship_request_model->getHardship_request($id);

		$this->load->model('classes/member_model');
		$this->student = $this->member_model->getMember($this->hardship_request->student_id);
		$this->load->model('classes/classes_model');
		$this->class = $this->classes_model->getClass($this->student->class_id);

		$this->load->view('classes/hardship_request/print', $this);
	}

	/**
	 * 删除困难补助申请
	 */
	public function del() {
		$this->id = empty($_GET['id']) ? 0 : (int) $_GET['id'];
		if ($this->hardship_request_model->delHardship_request($this->id)) {
			$ret = array(
				'statusCode' => '200',
				'message' => '删除成功',
				'navTabId' => 'hardship_request',
			);
		} else {
			$ret = array(
				'statusCode' => '300',
				'message' => '删除失败',
				'navTabId' => 'hardship_request',
			);
		}
		echo json_encode($ret);
	}

	public function review() {
		$this->id = empty($_GET['id']) ? 0 : (int) $_GET['id'];
		$user_status_plus = (('administrator' == $this->user_type) ? 2 : 0);
		if ($_POST) {
			$request = $this->hardship_request_model->getHardship_request($this->id);
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
			if ('administrator' == $this->user_type) {
				$data['amount_grant'] = @$_POST['amount_grant'];
			}
			if ($this->hardship_request_model->editHardship_request($this->id, $data)) {
				$ret = array(
					'statusCode' => '200',
					'message' => '审核成功',
					'callbackType' => 'closeCurrent',
					'navTabId' => 'hardship_request',
				);
				die(json_encode($ret));
			}
			$ret = array(
				'statusCode' => '300',
				'message' => '审核失败',
			);
			die(json_encode($ret));
		} else {
			$this->hardship_request = $this->hardship_request_model->getHardship_request($this->id);
			$this->user_status_plus = $user_status_plus;
			$this->load->view('classes/hardship_request/review', $this);
		}
	}
function export() {
		if (empty($_POST)) {
			$this->load->view('classes/hardship_request/export');
		} else {
			set_include_path(get_include_path() . PATH_SEPARATOR . APPPATH . 'PHPExcel/');
			require_once 'PHPExcel.php';
			$objPHPExcel = new PHPExcel();

			$objPHPExcel->getProperties()->setCreator('School of Software Technology, Zhejiang University')
					->setLastModifiedBy('School of Software Technology, Zhejiang University')
					->setTitle('Student Data Export');
			$sheet_title='困难补助';
			$objPHPExcel->setActiveSheetIndex(0)->setTitle($sheet_title);
			$sheet = $objPHPExcel->getActiveSheet();

			// 填入 Excel 的列标题
			$titles = array('姓名', '学号', '班级', '专业','金额');
			$col = 0;
			foreach ($titles as $title) {
				$sheet->setCellValueByColumnAndRow($col, 1, $title);
				//$sheet->getStyleByColumnAndRow($col, 1)->applyFromArray(array('font' => array('bold' => true)));
				$col++;
			}
			// 标题加粗
			$sheet->getStyle('A1:D1')->applyFromArray(array('font' => array('bold' => true)));
			$item_id = isset($_GET['item_id']) ? (int) $_GET['item_id'] : 0;
			$winners = $this->hardship_request_model->getHardship_requestsByAdmin($item_id);
			// 填入 Excel 数据
			$row = 2;
			foreach ($winners as $winner) {
				$sheet->setCellValueByColumnAndRow(0, $row, $winner->student_name);
				$sheet->setCellValueByColumnAndRow(1, $row, $winner->student_username);
				$sheet->setCellValueByColumnAndRow(2, $row, $winner->class_name);
				$sheet->setCellValueByColumnAndRow(3, $row, $winner->student_major);
				$sheet->setCellValueByColumnAndRow(4, $row, $winner->amount_apply);
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

/* End of file hardship_request.php */
					/* Location: ./app/controllers/classes/hardship_request.php */