<?php

class User_model extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->user_table_map = array(
			'student' => 'students',
			'teacher' => 'teachers',
			'enterprise' => 'enterprises',
			'unit' => 'units',
			'administrator' => 'administrators',
		);
	}

	public function __call($method, $args) {
		if (preg_match('/^(?:count|get|add|edit|del|countSearch|getSearch|getAllSearch)(Administrator|Teacher|Student|Enterprise|Unit)s?$/', $method, $matches)) {
			$method_type = $matches[1]; //'1.';var_dump($method);
			$real_method = str_replace($method_type, 'User', $method);
            //var_dump($method_type);
            //var_dump($real_method);
			if (method_exists($this, $real_method)) {
				$user_type = strtolower($method_type);
                //echo '2.';var_dump($this);
                //var_dump($real_method);
				array_unshift($args, $user_type);
				return call_user_func_array(array($this, $real_method), $args);
			}
		}
		throw new Exception('Unknow method!');
	}

	/**
	 * 找回密码
	 *
	 * @return mixed 成功时返回用户信息，否则返回false
	 */
	function forgotpwd($user_type, $username) {
		$this->db->select('*')
				->from($this->user_table_map[$user_type])
				->where(array('username' => $username));
		$query = $this->db->get();
		$results = $query->result();
		//echo $this->db->last_query();
		return $results;
	}

	/**
	 * 检查用户密码
	 *
	 * @return mixed 成功时返回用户信息，否则返回false
	 */
	function checkpwd($user_type, $username, $password) {
		$this->db->select('*')
				->from($this->user_table_map[$user_type])
				->where(array('username' => $username));
		$query = $this->db->get();
		$results = $query->result();
		if ($results) {
			return crypt($password, $results[0]->password) == $results[0]->password ? $results[0] : false;
		} else {
			return FALSE;
		}
	}

	/**
	 * 修改用户密码
	 *
	 * @return bool 修改密码是否成功
	 */
	function modpwd($user_type, $username, $password) {
		$this->db->where(array('username' => $username));
		$ret = $this->db->update(
				$this->user_table_map[$user_type], array('password' => crypt($password))
		);
		return $ret;
	}

	/**
	 * 获取用户总数
	 *
	 * @return int 用户总数
	 */
	function countUsers($user_type) {
		$this->db->select('COUNT(*) AS total')
				->from($this->user_table_map[$user_type]);
		$query = $this->db->get();
		$results = $query->result();
		return $results[0]->total;
	}

	/**
	 * 获取用户列表
	 *
	 * @return array 用户列表
	 */
	function getUsers($user_type) {
		$this->load->library('pagination');
		$this->db->select('*')
				->from($this->user_table_map[$user_type])
				->limit($this->pagination->per, $this->pagination->per * ($this->pagination->cur - 1));
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * 获取查找的用户总数
	 *
	 * @return int 用户总数
	 */
	function countSearchUsers($user_type, $conditions) {
		$this->db->select('COUNT(*) AS total')
				->from($this->user_table_map[$user_type])
				->where($conditions);
		$query = $this->db->get();
		$results = $query->result();
		return $results[0]->total;
	}

	/**
	 * 获取查找的用户列表
	 *
	 * @return array 用户列表
	 */
	function getSearchUsers($user_type, $conditions,$order) {
		$this->load->library('pagination');
		$this->db->select('*')
				->from($this->user_table_map[$user_type])
				->where($conditions)->order_by("$order")
				->limit($this->pagination->per, $this->pagination->per * ($this->pagination->cur - 1));
		$query = $this->db->get();
		return $query->result();
	}
	/**
	 * 获取查找的用户列表
	 *
	 * @return array 用户列表
	 */
	function getAllSearchUsers($user_type,$conditions) {
		$this->load->library('pagination');
		$this->db->select('*')
				->from($this->user_table_map[$user_type])
				->where($conditions);
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * 获取用户
	 *
	 * @return array 用户
	 */
	function getUser($user_type, $id) {
		$this->db->select('*')
				->from($this->user_table_map[$user_type])
				->where(array('id' => $id));
		$query = $this->db->get();
		$ret = $query->result();
		return $ret[0];
	}

	/**
	 * 添加用户
	 *
	 * @return bool 是否添加成功
	 */
	function addUser($user_type, $data) {
		return $this->db->insert($this->user_table_map[$user_type], $data);
	}

	/**
	 * 编辑用户
	 *
	 * @return bool 是否编辑成功
	 */
	function editUser($user_type, $id, $data) {
		return $this->db->update($this->user_table_map[$user_type], $data, array('id' => $id));
	}

	/**
	 * 删除用户
	 *
	 * @return bool 是否编辑成功
	 */
	function delUser($user_type, $id) {
		return $this->db->delete($this->user_table_map[$user_type], array('id' => $id));
	}

}