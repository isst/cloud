<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Activity_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	/**
	 * 获取党支部活动总数
	 *
	 * @return int 党支部活动总数
	 */
	function countActivitys($class_id) {
		$this->db->select('COUNT(*) AS total');
		$this->db->from('branch_activities');
		$this->db->where(array('class_id' => $class_id));
		$query = $this->db->get();
		$results = $query->result();
		return $results[0]->total;
	}

	/**
	 * 获取党支部活动列表
	 *
	 * @return array 党支部活动列表
	 */
	function getActivitys($class_id) {
		$this->load->library('pagination');
		$this->db->select('*');
		$this->db->from('branch_activities');
		$this->db->where(array('class_id' => $class_id));
		$this->db->limit($this->pagination->per, $this->pagination->per * ($this->pagination->cur - 1));
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * 获取党支部活动
	 *
	 * @return array 党支部活动
	 */
	function getActivity($id) {
		$this->db->select('*');
		$this->db->from('branch_activities');
		$this->db->where(array('id' => $id));
		$query = $this->db->get();
        return ($ret = $query->result()) ? $ret[0] : false;
	}

	/**
	 * 添加党支部活动
	 *
	 * @return bool 是否添加成功
	 */
	function addActivity($data) {
		return $this->db->insert('branch_activities', $data);
	}

	/**
	 * 编辑党支部活动
	 *
	 * @return bool 是否编辑成功
	 */
	function editActivity($id, $data) {
		return $this->db->update('branch_activities', $data, array('id' => $id));
	}

	/**
	 * 删除党支部活动
	 *
	 * @return bool 是否编辑成功
	 */
	function delActivity($id) {
		return $this->db->delete('branch_activities', array('id' => $id));
	}

}
