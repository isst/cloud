<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Major_field_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	/**
	 * 获取专业方向总数
	 *
	 * @return int 专业方向总数
	 */
	function countMajor_fields() {
		$this->db->select('COUNT(*) AS total')
				->from('class_major_fields');
		$query = $this->db->get();
		$row = $query->row();
		return $row->total;
	}

	/**
	 * 获取专业方向列表
	 *
	 * @return array 专业方向列表
	 */
	function getMajor_fields() {
		$this->load->library('pagination');
		$this->db->select('*')
				->from('class_major_fields')
				->limit($this->pagination->per, $this->pagination->per * ($this->pagination->cur - 1));
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * 获取所有专业方向列表
	 *
	 * @return array 专业方向列表
	 */
	function getAllMajor_fields() {
		$this->load->library('pagination');
		$this->db->select('*')
				->from('class_major_fields');
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * 获取专业方向
	 *
	 * @param	int	$id	int	专业方向ID
	 * @return array 专业方向
	 */
	function getMajor_field($id) {
		$this->db->select('*')
				->from('class_major_fields')
				->where(array('id' => $id));
		$query = $this->db->get();
		return $query->row();
	}

	/**
	 * 添加专业方向
	 *
	 * @param array $data 专业方向数据数组
	 * @return bool 是否添加成功
	 */
	function addMajor_field($data) {
		return $this->db->insert('class_major_fields', $data);
	}

	/**
	 * 编辑专业方向
	 *
	 * @param int $id 专业方向ID
	 * @param array $data 专业方向数据数组
	 * @return bool 是否编辑成功
	 */
	function editMajor_field($id, $data) {
		return $this->db->update('class_major_fields', $data, array('id' => $id));
	}

	/**
	 * 删除专业方向
	 *
	 * @param int $id 专业方向ID
	 * @return bool 是否编辑成功
	 */
	function delMajor_field($id) {
		return $this->db->delete('class_major_fields', array('id' => $id));
	}

}
