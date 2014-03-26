<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * 支部信息公告
 */
class Announcement extends MY_Controller {

	function __construct() {
		// 设置各角色的访问权限
		$this->user_permit = array(
			'administrator' => array('index', 'view', 'add', 'edit', 'del',),
			'teacher' => array('index', 'view',),
			'student' => array('index', 'view',),
			'enterprise' => array(),
		);
		parent::__construct();

		$this->load->model('branches/branch_model');
		$this->load->model('branches/announcement_model');
	}

	public function index() {
		$this->load->library('pagination');
		$class_id = empty($_GET['class_id']) ? 0 : (int) $_GET['class_id'];

		$this->branch = $this->branch_model->getBranch($class_id);
		$this->pagination->total($this->announcement_model->countAnnouncements($class_id));
		$this->announcements = $this->announcement_model->getAnnouncements($class_id);
        $this->publics = $this->announcement_model->getAnnouncementsPublic(1);//获取公共的公告
		$this->load->view('branches/announcement/list', $this);
	}

	public function add() {
		if (empty($_POST)) {
			$this->class_id = (int) $_GET['class_id'];
			$this->load->view('branches/announcement/add', $this);
		} else {
			$data = array(
				'class_id' => (int) $_GET['class_id'],
				'title' => $_POST['title'],
				'time' => $_POST['time'],
				'content' => $_POST['content'],
                'public' => $_POST['public'],
			);
			if ($this->announcement_model->addAnnouncement($data)) {
				$ret = array(
					'statusCode' => '200',
					'message' => '添加成功',
					'rel' => 'branch_announcement',
					'callbackType' => 'closeCurrent',
				);
			} else {
				$ret = array(
					'statusCode' => '300',
					'message' => '添加失败',
					'rel' => 'branch_announcement',
					'callbackType' => 'closeCurrent',
				);
			}
			echo json_encode($ret);
		}
	}

	public function edit() {
		$this->id = empty($_GET['id']) ? 0 : (int) $_GET['id'];
		$this->announcement = $this->announcement_model->getAnnouncement($this->id);
		if (empty($_POST)) {
			$this->load->view('branches/announcement/edit', $this);
		} else {
			$data = array(
				'title' => $_POST['title'],
				'time' => $_POST['time'],
				'content' => $_POST['content'],
                'public' => $_POST['public'],
			);
			if ($this->announcement_model->editAnnouncement($this->id, $data)) {
				$ret = array(
					'statusCode' => '200',
					'message' => '修改成功',
					'rel' => 'branch_announcement',
					'callbackType' => 'closeCurrent',
				);
			} else {
				$ret = array(
					'statusCode' => '300',
					'message' => '修改失败',
					'rel' => 'branch_announcement',
					'callbackType' => 'closeCurrent',
				);
			}
			echo json_encode($ret);
		}
	}

	public function del() {
		$this->id = empty($_GET['id']) ? 0 : (int) $_GET['id'];
		if ($this->announcement_model->delAnnouncement($this->id)) {
			$ret = array(
				'statusCode' => '200',
				'message' => '删除成功',
				'rel' => 'branch_announcement',
			);
		} else {
			$ret = array(
				'statusCode' => '300',
				'message' => '删除失败',
				'rel' => 'branch_announcement',
			);
		}
		echo json_encode($ret);
	}

	public function view() {
		$this->id = empty($_GET['id']) ? 0 : (int) $_GET['id'];
		$this->announcement = $this->announcement_model->getAnnouncement($this->id);
		$this->load->view('branches/announcement/view', $this);
	}

}

/* End of file announcement.php */
/* Location: ./app/controllers/branches/announcement.php */