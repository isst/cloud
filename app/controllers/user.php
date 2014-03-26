<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * 用户管理控制器
 */
class User extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->user_type_names = array(
			'student' => '学生',
			'teacher' => '教师',
			'enterprise' => '企业导师',
			'unit' => '用人单位',
			'administrator' => '管理员',
		);
		session_start();
		$this->load->model('user_model');
	}

	/**
	 *  生成验证码
	 */
	function captcha() {
		$this->load->helper('getcode');
		code();
	}

	/**
	 * 用户登录
	 */
	public function login() {
		$this->load->helper('getcode');
		$user_type = empty($_POST['user_type']) ? '' : $_POST['user_type'];
		in_array($user_type, array_keys($this->user_type_names)) or
				die('<meta charset="utf-8" /><script>alert("请选择用户类型!");history.back();</script>');
		empty($_POST['username']) and
				die('<meta charset="utf-8" /><script>alert("输入用户名!");history.back();</script>');
		empty($_POST['password']) and
				die('<meta charset="utf-8" /><script>alert("输入用密码!");history.back();</script>');
		chk_code($_POST['captcha']) or
				die('<meta charset="utf-8" /><script>alert("验证码不正确!");history.back();</script>');
		$user = $this->user_model->checkpwd($user_type, $_POST['username'], $_POST['password']);
		if ($user) {
			$_SESSION['user_type'] = $user_type;
			$user->user_type = $user_type;
			switch ($user_type) {
				case 'teacher':
					$this->load->model('branches/branch_model');
					$this->load->model('classes/classes_model');
					$this->load->model('classes/member_model');
					// 判断是否支部指导老师
					$user->is_branch_instructor = (bool) $this->branch_model->countBranchesByInstructor($user->id);
					// 判断教师用户是否是德育导师
					$user->is_class_adviser = (bool) $this->classes_model->countClassesByClassAdviser($user->id);
					// 判断教师用户是否是专业导师
					$user->is_major_adviser = (bool) $this->classes_model->countClassesByMajorAdviser($user->id);
					// 判断教师用户是否是论文导师
					$user->is_supervisor = (bool) $this->member_model->countStudentsBySupervisor($user->id);
					break;
				case 'student':
					// 判断学生用户是否是班长
					$user->is_class_monitor = (1 == $user->class_title);
					// 判断学生用户是否是支部书记
					$user->is_branch_secretary = (1 == $user->branch_title);
					// 判断学生用户是否是同城党支部临时书记
					$user->is_city_branch_secretary = (1 == $user->city_branch_title);
					break;
			}
			$_SESSION['user'] = $user;
			$_SESSION['username'] = $_POST['username'];
			header('Location: ../');
		} else {
			die('<meta charset="utf-8" /><script>alert("用户名密码不正确或与角色不匹配!");history.back();</script>');
		}
	}
	public function forgotPwd(){
		$user_type = empty($_POST['user_type']) ? '' : $_POST['user_type'];
		//$die = die('<meta charset="utf-8" /><script>alert("用户名验证信息不正确,请联系管理员!");history.back();</script>');
		if(empty($_POST['name'])){die('<meta charset="utf-8" /><script>alert("验证姓名不能为空,请填写完整!");history.back();</script>');}
		if(empty($_POST['username'])){die('<meta charset="utf-8" /><script>alert("验证学号不能为空,请填写完整!");history.back();</script>');}
		if(empty($_POST['id_no'])){die('<meta charset="utf-8" /><script>alert("验证身份证不能为空,请填写完整!");history.back();</script>');}
		$user = $this->user_model->forgotpwd($user_type, $_POST['username']);
		if($user[0]->id_no==$_POST['id_no']&&$user[0]->username==$_POST['username']&&$user[0]->email==$_POST['email']){
			if($this->user_model->modpwd($_POST['user_type'],$_POST['username'],$_POST['username'])){
				die('<meta charset="utf-8" /><script>alert("密码已重置为您的学号,请登录后进行修改!");window.close();</script>');
			}
		}else{
			die('<meta charset="utf-8" /><script>alert("验证信息不正确,请重新输出!");window.close();</script>');
		}
	}
	/**
	 * 用户退出
	 */
	public function logout() {
		session_destroy();
		header('Location: ../login.html');
	}

	/**
	 * 修改密码
	 */
	public function changepwd() {
		if (empty($_SESSION['user'])) {
			$ret = array(
				'statusCode' => '301',
				'message' => '会话超时，请重新登录',
			);
			die(json_encode($ret));
		}
		$this->user = $_SESSION['user'];
		$this->user_type = $_SESSION['user_type'];
		if (empty($_POST)) {
			$this->load->view('user/changepwd', $this);
		} else {
			empty($_POST['password_old']) and die(json_encode(array('statusCode' => '300', 'message' => '请输入旧密码')));
			empty($_POST['password_new']) and die(json_encode(array('statusCode' => '300', 'message' => '请输入新密码')));
			empty($_POST['password_confirm']) and die(json_encode(array('statusCode' => '300', 'message' => '请输入确认密码')));
			if ($_POST['password_new'] != $_POST['password_confirm']) {
				die(json_encode(array('statusCode' => '300', 'message' => '新密码和确认密码不一致')));
			}

			$user = $this->user_model->checkpwd($this->user_type, $this->user->username, $_POST['password_old']);
			if ($user) {
				if ($this->user_model->modpwd($this->user_type, $this->user->username, $_POST['password_new'])) {
					session_destroy();
					die(json_encode(array(
						'statusCode' => '200',
						'message' => '修改密码成功，请重新登录',
						'callbackType' => 'closeCurrent',
						'forwardUrl' => 'user/logout.html'
					)));
				} else {
					die(json_encode(array('statusCode' => '300', 'message' => '修改密码失败')));
				}
			} else {
				die(json_encode(array('statusCode' => '300', 'message' => '原密码不正确')));
			}
		}
	}

}

/* End of file user.php */
/* Location: ./app/controllers/user.php */