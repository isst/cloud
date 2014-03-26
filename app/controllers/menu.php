<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * 系统菜单
 */
class Menu extends CI_Controller {

	function __construct() {
		parent::__construct();
		session_start();
		if (empty($_SESSION['user'])) {
			die('<script>window.location="login.html";</script>');
		}
		$this->user = $_SESSION['user'];
		if ('student' == $_SESSION['user_type']) {
			$this->load->model('branches/member_model');
			$this->member = $this->member_model->getMember($_SESSION['user']->id);
		}
	}

	public function index() {
		$this->load->view($_SESSION['user_type'] . '/menu', $this);
	}

	public function branch() {
		$this->load->view($_SESSION['user_type'] . '/sidebar/branch', $this);
	}

	public function student() {
		$this->load->view($_SESSION['user_type'] . '/sidebar/student', $this);
	}

	public function app() {
		$this->load->view($_SESSION['user_type'] . '/sidebar/app', $this);
	}

	public function sys() {
		$this->load->view($_SESSION['user_type'] . '/sidebar/sys', $this);
	}

}

/* End of file menu.php */
/* Location: ./app/controllers/menu.php */