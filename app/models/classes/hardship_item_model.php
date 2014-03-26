<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Hardship_item_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	/**
	 * 获取补助项目总数
	 *
	 * @return int 补助项目总数
	 */
	function countHardship_items() {
		$this->db->select('COUNT(*) AS total')
				->from('class_hardship_items');
		$query = $this->db->get();
		$row = $query->row();
		return $row->total;
	}

	/**
	 * 获取补助项目列表
	 *
	 * @return array 补助项目列表
	 */
	function getHardship_items() {
		$this->load->library('pagination');
		$this->db->select('*')
				->from('class_hardship_items')
				->limit($this->pagination->per, $this->pagination->per * ($this->pagination->cur - 1));
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * 获取开放申请的补助项目总数
	 *
	 * @return int 补助项目总数
	 */
	function countEnabledHardship_items() {
		$this->db->select('COUNT(*) AS total')
				->from('class_hardship_items')
				->where(array('enabled' => 1));
		$query = $this->db->get();
		$row = $query->row();
		return $row->total;
	}

	/**
	 * 获取开放申请的补助项目列表
	 *
	 * @return array 补助项目列表
	 */
	function getEnabledHardship_items() {
		$this->load->library('pagination');
		$this->db->select('*')
				->from('class_hardship_items')
				->where(array('enabled' => 1))
				->limit($this->pagination->per, $this->pagination->per * ($this->pagination->cur - 1));
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * 获取补助项目
	 *
	 * @param	int	$id	int	补助项目ID
	 * @return array 补助项目
	 */
	function getHardship_item($id) {
		$this->db->select('*')
				->from('class_hardship_items')
				->where(array('id' => $id));
		$query = $this->db->get();
		return $query->row();
	}

	/**
	 * 添加补助项目
	 *
	 * @param array $data 补助项目数据数组
	 * @return bool 是否添加成功
	 */
	function addHardship_item($data) {
		return $this->db->insert('class_hardship_items', $data);
	}

	/**
	 * 编辑补助项目
	 *
	 * @param int $id 补助项目ID
	 * @param array $data 补助项目数据数组
	 * @return bool 是否编辑成功
	 */
	function editHardship_item($id, $data) {
		return $this->db->update('class_hardship_items', $data, array('id' => $id));
	}

	/**
	 * 删除补助项目
	 *
	 * @param int $id 补助项目ID
	 * @return bool 是否编辑成功
	 */
	function delHardship_item($id) {
		return $this->db->delete('class_hardship_items', array('id' => $id));
	}

}
