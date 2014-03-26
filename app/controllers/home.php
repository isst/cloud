<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * 主界面
	 *
	 * 如果已登录则直接显示，否则跳转到登录页
	 */
	public function index() {
		session_start();
		$this->load->model('branches/announcement_model');
		if (empty($_SESSION['user'])) {
			header('Location: login.html');
			die;
		}
		$this->user = $_SESSION['user'];
		$this->user_type = $_SESSION['user_type'];
		$this->publics = $this->announcement_model->getAnnouncementsPublic(1);//获取公共的公告
		if('student' == $this->user_type){
			// $this->student_type
		}
		if('teacher' == $this->user_type){
			// $this->teacher_type
		}
		$this->load->view('home', $this);
	}

}

/* End of file home.php */
/* Location: ./app/controllers/home.php */