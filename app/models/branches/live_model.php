<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Live_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	/**
	 * 获取党支部生活总数
	 *
	 * @return int 党支部生活总数
	 */
	function countLives($class_id) {
		$this->db->select('COUNT(*) AS total');
		$this->db->from('branch_lives');
		$this->db->where(array('class_id' => $class_id));
		$query = $this->db->get();
		$results = $query->result();
		return $results[0]->total;
	}

	/**
	 * 获取党支部生活列表
	 *
	 * @return array 党支部生活列表
	 */
	function getLives($class_id) {
		$this->load->library('pagination');
		$this->db->select('*');
		$this->db->from('branch_lives');
		$this->db->where(array('class_id' => $class_id));
		$this->db->limit($this->pagination->per, $this->pagination->per * ($this->pagination->cur - 1));
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * 获取党支部生活
	 *
	 * @return array 党支部生活
	 */
	function getLive($id) {
		$this->db->select('*');
		$this->db->from('branch_lives');
		$this->db->where(array('id' => $id));
		$query = $this->db->get();
        return ($ret = $query->result()) ? $ret[0] : false;
	}

	/**
	 * 添加党支部生活
	 *
	 * @return bool 是否添加成功
	 */
	function addLive($data) {
		return $this->db->insert('branch_lives', $data);
	}

	/**
	 * 编辑党支部生活
	 *
	 * @return bool 是否编辑成功
	 */
	function editLive($id, $data) {
		return $this->db->update('branch_lives', $data, array('id' => $id));
	}

	/**
	 * 删除党支部生活
	 *
	 * @return bool 是否编辑成功
	 */
	function delLive($id) {
		return $this->db->delete('branch_lives', array('id' => $id));
	}

}
