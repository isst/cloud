<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Scholarship_item_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	/**
	 * 获取奖项总数
	 *
	 * @return int 奖项总数
	 */
	function countScholarship_items() {
		$this->db->select('COUNT(*) AS total')
				->from('class_scholarship_items');
		$query = $this->db->get();
		$results = $query->result();
		$row = $query->row();
		return $row->total;
	}

	/**
	 * 获取奖项列表
	 *
	 * @return array 奖项列表
	 */
	function getScholarship_items() {
		$this->load->library('pagination');
		$this->db->select('*')
				->from('class_scholarship_items')
				->limit($this->pagination->per, $this->pagination->per * ($this->pagination->cur - 1));
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * 获取开放申请的奖项总数
	 *
	 * @return int 奖项总数
	 */
	function countEnabledScholarship_items() {
		$this->db->select('COUNT(*) AS total')
				->from('class_scholarship_items')
				->where(array('enabled' => 1));
		$query = $this->db->get();
		$results = $query->result();
		return $results[0]->total;
	}

	/**
	 * 获取开放申请的奖项列表
	 *
	 * @return array 奖项列表
	 */
	function getEnabledScholarship_items() {
		$this->load->library('pagination');
		$this->db->select('*')
				->from('class_scholarship_items')
				->where(array('enabled' => 1))
				->limit($this->pagination->per, $this->pagination->per * ($this->pagination->cur - 1));
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * 获取奖项
	 *
	 * @param	int	$id	int	奖项ID
	 * @return array 奖项
	 */
	function getScholarship_item($id) {
		$this->db->select('*')
				->from('class_scholarship_items')
				->where(array('id' => $id));
		$query = $this->db->get();
		return $query->row();
	}

	/**
	 * 添加奖项
	 *
	 * @param array $data 奖项数据数组
	 * @return bool 是否添加成功
	 */
	function addScholarship_item($data) {
		return $this->db->insert('class_scholarship_items', $data);
	}

	/**
	 * 编辑奖项
	 *
	 * @param int $id 奖项ID
	 * @param array $data 奖项数据数组
	 * @return bool 是否编辑成功
	 */
	function editScholarship_item($id, $data) {
		return $this->db->update('class_scholarship_items', $data, array('id' => $id));
	}

	/**
	 * 删除奖项
	 *
	 * @param int $id 奖项ID
	 * @return bool 是否编辑成功
	 */
	function delScholarship_item($id) {
		return $this->db->delete('class_scholarship_items', array('id' => $id));
	}

}
