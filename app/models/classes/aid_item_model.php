<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Aid_item_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	/**
	 * 获取三助岗位总数
	 *
	 * @return int 三助岗位总数
	 */
	function countAid_items() {
		$this->db->select('COUNT(*) AS total')
				->from('class_aid_items')
				->join('units', 'class_aid_items.unit_id = units.id', 'left');
		$query = $this->db->get();
		$row = $query->row();
		return $row->total;
	}

	/**
	 * 获取三助岗位列表
	 *
	 * @return array 三助岗位列表
	 */
	function getAid_items() {
		$this->load->library('pagination');
		$this->db->select('class_aid_items.*, units.name as unit_name')
				->from('class_aid_items')
				->join('units', 'class_aid_items.unit_id = units.id', 'left')
				->limit($this->pagination->per, $this->pagination->per * ($this->pagination->cur - 1));
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * 获取开放申请的三助岗位总数
	 *
	 * @return int 三助岗位总数
	 */
	function countEnabledAid_items() {
		$this->db->select('COUNT(*) AS total')
				->from('class_aid_items')
				->join('units', 'class_aid_items.unit_id = units.id', 'left')
				->where(array('class_aid_items.enabled' => 1));
		$query = $this->db->get();
		$row = $query->row();
		return $row->total;
	}

	/**
	 * 获取开放申请的三助岗位列表
	 *
	 * @return array 三助岗位列表
	 */
	function getEnabledAid_items() {
		$this->load->library('pagination');
		$this->db->select('class_aid_items.*, units.name as unit_name')
				->from('class_aid_items')
				->join('units', 'class_aid_items.unit_id = units.id', 'left')
				->where(array('class_aid_items.enabled' => 1))
				->limit($this->pagination->per, $this->pagination->per * ($this->pagination->cur - 1));
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * 获取三助岗位
	 *
	 * @param	int	$id	int	三助岗位ID
	 * @return array 三助岗位
	 */
	function getAid_item($id) {
		$this->db->select('class_aid_items.*, units.name as unit_name')
				->from('class_aid_items')
				->join('units', 'class_aid_items.unit_id = units.id', 'left')
				->where(array('class_aid_items.id' => $id));
		$query = $this->db->get();
		return $query->row();
	}

	/**
	 * 添加三助岗位
	 *
	 * @param array $data 三助岗位数据数组
	 * @return bool 是否添加成功
	 */
	function addAid_item($data) {
		return $this->db->insert('class_aid_items', $data);
	}

	/**
	 * 编辑三助岗位
	 *
	 * @param int $id 三助岗位ID
	 * @param array $data 三助岗位数据数组
	 * @return bool 是否编辑成功
	 */
	function editAid_item($id, $data) {
		return $this->db->update('class_aid_items', $data, array('id' => $id));
	}

	/**
	 * 删除三助岗位
	 *
	 * @param int $id 三助岗位ID
	 * @return bool 是否编辑成功
	 */
	function delAid_item($id) {
		return $this->db->delete('class_aid_items', array('id' => $id));
	}

}
