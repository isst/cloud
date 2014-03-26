<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * 配额
 */
class Scholarship_quota extends MY_Controller {

	function __construct() {
		// 设置各角色的访问权限
		$this->user_permit = array(
			'administrator' => array('index', 'view', 'add', 'edit', 'del'),
			'teacher' => array('index', 'view',),
		);
		parent::__construct();
		$this->load->model('classes/scholarship_quota_model');
		$this->load->model('user_model');
	}

	/**
	 * 配额列表
	 */
	public function index() {
		$this->load->model('classes/scholarship_item_model');
		$scholarship_items = $this->scholarship_item_model->getScholarship_items();
		$item_titles = array();
		foreach ($scholarship_items as $item) {
			$item_titles[$item->id] = $item->title;
		}
		$this->item_titles = $item_titles;

		$this->load->library('pagination');
		if ('teacher' == $this->user->user_type) {
			$this->pagination->total($this->scholarship_quota_model->countScholarship_quotasByClassAdviser($this->user->id));
			$this->scholarship_quotas = $this->scholarship_quota_model->getScholarship_quotasByClassAdviser($this->user->id);
		} else {
			$this->pagination->total($this->scholarship_quota_model->countScholarship_quotas());
			$this->scholarship_quotas = $this->scholarship_quota_model->getScholarship_quotas();
		}
		$this->load->view('classes/scholarship_quota/list', $this);
	}

	/**
	 * 编辑配额
	 */
	public function edit() {
		$id = (int) $_GET['id'];
		$this->scholarship_quota = $this->scholarship_quota_model->getScholarship_quota($id);
		$this->quotas = $this->scholarship_quota->quotas ? unserialize($this->scholarship_quota->quotas) : array();
		if (empty($_POST)) {
			$this->load->model('classes/scholarship_item_model');
			$this->scholarship_items = $this->scholarship_item_model->getScholarship_items();
			$this->load->view('classes/scholarship_quota/edit', $this);
		} else {
			$data = array(
				'quotas' => serialize(@$_POST['quotas']),
			);
			if ($this->scholarship_quota_model->editScholarship_quota($id, $data)) {
				$ret = array(
					'statusCode' => '200',
					'message' => '修改配额信息成功',
					'navTabId' => 'scholarship_quota',
					'callbackType' => 'closeCurrent',
				);
			} else {
				$ret = array(
					'statusCode' => '300',
					'message' => '修改配额信息失败',
					'navTabId' => 'scholarship_quota',
					'callbackType' => 'closeCurrent',
				);
			}
			echo json_encode($ret);
		}
	}

	/**
	 * 查看配额
	 */
	public function view() {
		$id = (int) $_GET['id'];
		$this->scholarship_quota = $this->scholarship_quota_model->getScholarship_quota($id);
		$this->load->view('classes/scholarship_quota/view', $this);
	}

	/**
	 * 删除配额
	 */
	public function del() {
		$this->id = empty($_GET['id']) ? 0 : (int) $_GET['id'];
		if ($this->scholarship_quota_model->delScholarship_quota($this->id)) {
			$ret = array(
				'statusCode' => '200',
				'message' => '删除成功',
				'navTabId' => 'scholarship_quota',
			);
		} else {
			$ret = array(
				'statusCode' => '300',
				'message' => '删除失败',
				'navTabId' => 'scholarship_quota',
			);
		}
		echo json_encode($ret);
	}

}

/* End of file scholarship_quota.php */
/* Location: ./app/controllers/classes/scholarship_quota.php */