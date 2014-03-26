<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Internship_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	/**
	 * 获取实习信息总数
	 *
	 * @return int 实习信息总数
	 */
	function countInternships() {
		$this->db->select('COUNT(*) AS total')
				->from('class_internships');
		$query = $this->db->get();
		$row = $query->row();
		return $row->total;
	}

	/**
	 * 获取实习信息列表
	 *
	 * @return array 实习信息列表
	 */
	function getInternships() {
		$this->load->library('pagination');
		$this->db->select('*')
				->from('class_internships')
				->limit($this->pagination->per, $this->pagination->per * ($this->pagination->cur - 1));
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * 获取所有实习信息列表
	 *
	 * @return array 实习信息列表
	 */
	function getAllInternships() {
		$this->load->library('pagination');
		$this->db->select('*')
				->from('class_internships');
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * 根据学生获取实习信息总数
	 *
	 * @return int 实习信息总数
	 */
	function countInternshipsByStudent($id) {
		$this->db->select('COUNT(*) AS total')
				->from('class_internships')
				->where(array('student_id' => $id));
		$query = $this->db->get();
		$row = $query->row();
		return $row->total;
	}

	/**
	 * 根据学生获取实习信息列表
	 *
	 * @return array 实习信息列表
	 */
	function getInternshipsByStudent($id) {
		$this->load->library('pagination');
		$this->db->select('*')
				->from('class_internships')
				->where(array('student_id' => $id))
				->limit($this->pagination->per, $this->pagination->per * ($this->pagination->cur - 1));
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * 根据学生获取所有实习信息列表
	 *
	 * @return array 实习信息列表
	 */
	function getAllInternshipsByStudent($id) {
		$this->load->library('pagination');
		$this->db->select('*')
				->from('class_internships')
				->where(array('student_id' => $id));
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * 获取最新实习信息
	 *
	 * @param	int	$id	int	实习信息ID
	 * @return array 实习信息
	 */
	function getNewestInternship() {
		$this->db->select('*')
				->from('class_internships')
				->order_by('updated', 'ASC');
		$query = $this->db->get();
		return $query->row();
	}

	/**
	 * 获取实习信息
	 *
	 * @param	int	$id	int	实习信息ID
	 * @return array 实习信息
	 */
	function getInternship($id) {
		$this->db->select('*')
				->from('class_internships')
				->where(array('id' => $id));
		$query = $this->db->get();
		return $query->row();
	}

	/**
	 * 添加实习信息
	 *
	 * @param array $data 实习信息数据数组
	 * @return bool 是否添加成功
	 */
	function addInternship($data) {
		return $this->db->insert('class_internships', $data);
	}

	/**
	 * 编辑实习信息
	 *
	 * @param int $id 实习信息ID
	 * @param array $data 实习信息数据数组
	 * @return bool 是否编辑成功
	 */
	function editInternship($id, $data) {
		return $this->db->update('class_internships', $data, array('id' => $id));
	}

	/**
	 * 删除实习信息
	 *
	 * @param int $id 实习信息ID
	 * @return bool 是否编辑成功
	 */
	function delInternship($id) {
		return $this->db->delete('class_internships', array('id' => $id));
	}

}
