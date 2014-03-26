<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Member_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	/**
	 * 获取党支部成员总数
	 *
	 * @param int $id 党支部ID
	 * @return int 党支部成员总数
	 */
	function countMembers($id) {
		$this->db->select('COUNT(*) AS total')
				->from('students')
				->where(array('class_id' => $id, 'politics_status >' => 0));
		$query = $this->db->get();
		$results = $query->result();
		return $results[0]->total;
	}

	/**
	 * 获取党支部成员列表
	 *
	 * @param int $id 党支部ID
	 * @return array 党支部成员列表
	 */
	function getMembers($id) {
		$this->load->library('pagination');
		$this->db->select('*')
				->from('students')
				->where(array('class_id' => $id, 'politics_status >' => 0))
				->limit($this->pagination->per, $this->pagination->per * ($this->pagination->cur - 1));
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * 获取党支部全部成员列表
	 *
	 * @param int $id 党支部ID
	 * @return array 党支部成员列表
	 */
	function getAllMembers($id) {
		$this->load->library('pagination');
		$this->db->select('*')
				->from('students')
				->where(array('class_id' => $id, 'politics_status >' => 0));
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * 获取班级中非党支部成员的学生列表
	 *
	 * @param int $id 党支部ID
	 * @return array 党支部成员列表
	 */
	function getAllNonMembers($id) {
		$this->db->select('*')
				->from('students')
				->where(array('class_id' => $id, 'politics_status' => 0));
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * 获取党支部成员
	 *
	 * @param int $id 党支部成员ID
	 * @return array 成功时返回党支部成员信息，否则返回FALSE
	 */
	function getMember($id) {
		$this->db->select('*')
				->from('students')
				->where(array('id' => $id, 'politics_status >' => 0));
		$query = $this->db->get();
		return ($ret = $query->result()) ? $ret[0] : FALSE;
	}

	/**
	 * 获取具备头衔的党支部成员姓名
	 *
	 * @param int $class_id 党支部ID
	 * @param int $branch_title 党支部头衔编号
	 * @return array 具备头衔的党支部成员姓名，失败时返回FALSE
	 */
	function getSpecMember($class_id, $branch_title) {
		$this->db->select('name')
				->from('students')
				->where(array('class_id' => $class_id, 'branch_title' => $branch_title));
		$query = $this->db->get();
		return ($ret = $query->result()) ? $ret[0] : false;
	}

	/**
	 * 添加党支部成员
	 *
	 * @param array $data 成员信息数组
	 * @return bool 是否添加成功
	 */
	function addMember($data) {
		return $this->db->insert('branch_members', $data);
	}

	/**
	 * 编辑党支部成员
	 *
	 * @param int $id 党支部成员ID
	 * @param int $data 成员信息数组
	 * @return bool 是否编辑成功
	 */
	function editMember($id, $data) {
		return $this->db->update('students', $data, array('id' => $id));
	}

}
