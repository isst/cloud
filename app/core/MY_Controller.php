<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	protected $user_permit = array();

	public function __construct() {
		parent::__construct();
		session_start();
		// 检查登录状态
		if (empty($_SESSION['user'])) {
			die(json_encode(array('statusCode' => '301', 'message' => '会话超时，请重新登录',)));
		}
		$this->user = $_SESSION['user'];
		$this->user_type = $_SESSION['user_type'];
		// 超级管理员用户给予全部权限
		if ('administrator' !== $_SESSION['user_type']) {
			// 检查操作权限
			$action = $this->uri->segment(3, 'index');
			// 如果是用户类型加下划线开头的方法默认给予权限
			if (strncmp($this->user_type . '_', $action, 1 + strlen($this->user_type))) {
				if (!in_array($this->user_type, array_keys($this->user_permit))) {
					die(json_encode(array('statusCode' => '300', 'message' => '对不起，您没有权限进行该操作!',)));
				}
				if (!in_array($action, $this->user_permit[$this->user_type])) {
					die(json_encode(array('statusCode' => '300', 'message' => '对不起，您没有权限进行该操作!',)));
				}
			}
		}

		// 政治面貌状态名列表
		$this->politics_status_names = array(
			'群众',
			'共青团员',
			'中共党员',
			'其它',
		);
		// 支部成员状态名列表
		$this->branch_status_names = array(
			'未入党',
			'积极分子',
			'发展对象',
			'预备党员',
			'正式党员',
		);
		// 支部成员头衔名列表
		$this->branch_title_names = array(
			'无',
			'支部书记',
			'支部宣传委员',
			'组织委员',
		);
	}

}