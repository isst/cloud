<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * 三助考核
 */
class Aid_report extends MY_Controller {

	function __construct() {
		// 设置各角色的访问权限
		$this->user_permit = array(
			'student' => array('index', 'view', 'add',),
			'unit' => array('index', 'view', 'review', 'bulk_review',),
			'enterprise' => array(),
		);
		parent::__construct();

		$this->load->model('classes/aid_item_model');
		$this->load->model('classes/aid_request_model');
		$this->load->model('classes/aid_report_model');
		$this->report_status_names = array(
			'等待用人单位审批',
			'用人单位审核未通过',
			'用人单位已通过，等待研工部审批',
			'研工部审核未通过',
			'研工部审核已通过',
		);
	}

	/**
	 * 三助考核列表
	 */
	public function index() {

		$this->load->library('pagination');
		$student_id = empty($_GET['student_id']) ? 0 : (int) $_GET['student_id'];
        //var_dump($student_id);
		if ($student_id) {
			$this->pagination->total($this->aid_report_model->countAid_reportsByStudent($student_id));
			$this->aid_reports = $this->aid_report_model->getAid_reportsByStudent($student_id);
		} else {
			switch ($this->user_type) {
				case 'student':
					$this->pagination->total($this->aid_report_model->countAid_reportsByStudent($this->user->id));
					$this->aid_reports = $this->aid_report_model->getAid_reportsByStudent($this->user->id);
                    $this->aid_r = $this->aid_reports;
					break;
				case 'unit':
					$this->pagination->total($this->aid_report_model->countAid_reportsByUnit($this->user->id));
					$this->aid_reports = $this->aid_report_model->getAid_reportsByUnit($this->user->id);
                    $this->aid_r = $this->aid_reports;
					break;
				case 'administrator':
					$item_id = isset($_GET['item_id']) ? (int) $_GET['item_id'] : 0;
					$this->pagination->total($this->aid_report_model->countAid_reportsByAdmin($item_id));
					$this->aid_reports = $this->aid_report_model->getAid_reportsByAdmin($item_id);
                    $this->aid_r = $this->aid_reports;
					break;
				default:
					$this->pagination->total($this->aid_report_model->countAid_reports());
					$this->aid_reports = $this->aid_report_model->getAid_reports();
					break;
			}
		}
		$this->load->view('classes/aid_report/list', $this);
	}

	/**
	 * 创建三助考核
	 */
	public function add() {
		$reviewed = $this->aid_request_model->getAidRequestReviewedByStudent($this->user->id);
		if (!$reviewed) {
			$ret = array(
				'statusCode' => '300',
				'message' => '没有已通过审核的三助申请，无法提交三助考核',
				'navTabId' => 'aid_report',
				'callbackType' => 'closeCurrent',
			);
			die(json_encode($ret));
		}
		if (empty($_POST)) {
			$this->load->model('classes/classes_model');
			$this->class = $this->classes_model->getClass($this->user->class_id);
			$this->load->view('classes/aid_report/add', $this);
		} else {
			$date = @$_POST['date'];
			$job = @$_POST['job'];
			$time = @$_POST['time'];
			if (count($date) !== count($job) && count($date) !== count($time)) {
				$ret = array(
					'statusCode' => '300',
					'message' => '提交的数据有问题',
					'navTabId' => 'aid_report',
					'callbackType' => 'closeCurrent',
				);
				die(json_encode($ret));
			}

			$content = array();
			for ($i = 0; $i < count($date); $i++) {
				$content[] = array(
					'date' => $date[$i],
					'job' => $job[$i],
					'time' => $time[$i],
				);
			}

			$data = array(
				'report_time' => date('Y-m-d H:i:s'),
				'item_id' => $reviewed->item_id,
				'student_id' => $this->user->id,
				'month' => (int) @$_POST['month'],
				'content' => serialize($content),
			);
			if ($this->aid_report_model->addAid_report($data)) {
				$ret = array(
					'statusCode' => '200',
					'message' => '申请成功',
					'navTabId' => 'aid_report',
					'callbackType' => 'closeCurrent',
				);
			} else {
				$ret = array(
					'statusCode' => '300',
					'message' => '添加失败',
					'navTabId' => 'aid_report',
					'callbackType' => 'closeCurrent',
				);
			}
			die(json_encode($ret));
		}
	}

	/**
	 * 编辑三助考核
	 */
	public function edit() {
		$id = (int) $_GET['id'];
		$this->aid_report = $this->aid_report_model->getAid_report($id);
		if (empty($_POST)) {
			$this->load->view('classes/aid_report/edit', $this);
		} else {
			$data = array(
				'title' => $_POST['title'],
				'report_time' => $_POST['report_time'],
				'content' => $_POST['content'],
			);
			if ($this->aid_report_model->editAid_report($id, $data)) {
				$ret = array(
					'statusCode' => '200',
					'message' => '修改三助考核信息成功',
					'navTabId' => 'aid_report',
					'callbackType' => 'closeCurrent',
				);
			} else {
				$ret = array(
					'statusCode' => '300',
					'message' => '修改三助考核信息失败',
					'navTabId' => 'aid_report',
					'callbackType' => 'closeCurrent',
				);
			}
			echo json_encode($ret);
		}
	}

	/**
	 * 查看三助考核
	 */
	public function view() {
		$id = (int) $_GET['id'];
		$this->aid_report = $this->aid_report_model->getAid_report($id);
		$this->aid_report->content = unserialize($this->aid_report->content);
		$this->load->model('classes/member_model');
		$this->student = $this->member_model->getMember($this->aid_report->student_id);

		$this->load->view('classes/aid_report/view', $this);
	}

	/**
	 * 打印三助考核
	 */
	public function print_view() {
		$id = (int) $_GET['id'];
		$this->aid_report = $this->aid_report_model->getAid_report($id);
		$this->aid_report->content = unserialize($this->aid_report->content);
		$this->load->model('classes/member_model');
		$this->student = $this->member_model->getMember($this->aid_report->student_id);

		$this->load->view('classes/aid_report/print', $this);
	}

	/**
	 * 删除三助考核
	 */
	public function del() {
		$this->id = empty($_GET['id']) ? 0 : (int) $_GET['id'];
		if ($this->aid_report_model->delAid_report($this->id)) {
			$ret = array(
				'statusCode' => '200',
				'message' => '删除成功',
				'navTabId' => 'aid_report',
			);
		} else {
			$ret = array(
				'statusCode' => '300',
				'message' => '删除失败',
				'navTabId' => 'aid_report',
			);
		}
		echo json_encode($ret);
	}

	public function review() {
		$this->id = empty($_GET['id']) ? 0 : (int) $_GET['id'];
		if ($_POST) {
			$report = $this->aid_report_model->getAid_report($this->id);
			switch ($this->user_type) {
				case 'teacher':
				case 'unit':
					$user_status_plus = 0;
					break;
				case 'administrator':
					$user_status_plus = 2;
					break;
				default:
					$user_status_plus = 0;
					break;
			}
			$new_status = @$_POST['status'] + $user_status_plus;
			if ($report->status > 2 + $user_status_plus) {
				$ret = array(
					'statusCode' => '300',
					'message' => '后续部门已进行审核操作，不允许再更改审核状态！',
				);
				die(json_encode($ret));
			}
			if ($report->status < $user_status_plus) {
				$ret = array(
					'statusCode' => '300',
					'message' => '上一部门尚未审核通过，请在其审核通过后再进行审核！',
				);
				die(json_encode($ret));
			}
			$data = array(
				'status' => $new_status,
			);
			if ($this->aid_report_model->editAid_report($this->id, $data)) {
				$ret = array(
					'statusCode' => '200',
					'message' => '审核成功',
					'callbackType' => 'closeCurrent',
					'navTabId' => 'aid_report',
				);
				die(json_encode($ret));
			}
			$ret = array(
				'statusCode' => '300',
				'message' => '审核失败',
			);
			die(json_encode($ret));
		} else {
			$this->load->view('classes/aid_report/review', $this);
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

			switch ($this->user_type) {
				case 'unit':
					$user_status_plus = 0;
					break;
				case 'administrator':
					$user_status_plus = 2;
					break;
				default:
					$user_status_plus = 0;
					break;
			}
			$new_status = (int) $_GET['status'] + $user_status_plus;
			foreach ($ids as $id) {
				$report = $this->aid_report_model->getAid_report($id);
				if (($report->status > 2 + $user_status_plus) || ($report->status < $user_status_plus)) {
					# 后续部门已进行审核操作或上一部门未审核通过，不允许再更改审核状态，跳过处理
					continue;
				}
				$data = array(
					'status' => $new_status,
				);
				$this->aid_report_model->editAid_report($id, $data);
			}
			$ret = array(
				'statusCode' => '200',
				'message' => '审核操作成功',
				'navTabId' => 'aid_report',
			);
			die(json_encode($ret));
		}
	}

   function export() {
		if (empty($_POST)) {
			$this->load->view('classes/aid_report/export');
		} else {
			set_include_path(get_include_path() . PATH_SEPARATOR . APPPATH . 'PHPExcel/');
			require_once 'PHPExcel.php';
			$objPHPExcel = new PHPExcel();

			$objPHPExcel->getProperties()->setCreator('School of Software Technology, Zhejiang University')
					->setLastModifiedBy('School of Software Technology, Zhejiang University')
					->setTitle('Student Data Export');
			$sheet_title='三助考核Excel表';
			$objPHPExcel->setActiveSheetIndex(0)->setTitle($sheet_title);
			$sheet = $objPHPExcel->getActiveSheet();

			// 填入 Excel 的列标题
			$titles = array('姓名', '学号', '班级', '专业','岗位','金额','中行卡号');
			$col = 0;
			foreach ($titles as $title) {
				$sheet->setCellValueByColumnAndRow($col, 1, $title);
				//$sheet->getStyleByColumnAndRow($col, 1)->applyFromArray(array('font' => array('bold' => true)));
				$col++;
			}
			// 标题加粗
			$sheet->getStyle('A1:D1')->applyFromArray(array('font' => array('bold' => true)));
			$item_id = isset($_GET['item_id']) ? (int) $_GET['item_id'] : 0;
			$winners = $this->aid_report_model->getAid_reportsByAdmin($item_id);
			// 填入 Excel 数据
			$row = 2;
			foreach ($winners as $winner) {

				$sheet->setCellValueByColumnAndRow(0, $row, $winner->student_name);
				$sheet->setCellValueByColumnAndRow(1, $row, $winner->student_username);
				$sheet->setCellValueByColumnAndRow(2, $row, $winner->class_name);
				$sheet->setCellValueByColumnAndRow(3, $row, $winner->student_major);
				$sheet->setCellValueByColumnAndRow(4, $row, $winner->item_title);
				$sheet->setCellValueByColumnAndRow(5, $row, $winner->item_money);
				$sheet->setCellValueByColumnAndRow(6, $row, $winner->student_boc_card);
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

/* End of file aid_report.php */
/* Location: ./app/controllers/classes/aid_report.php */