<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Aid_report_model extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->report_cols = 'class_aid_reports.*,'
				. 'class_aid_items.title AS item_title,'
				. 'class_aid_items.money AS item_money,'
				. 'units.name AS unit_name,'
				. 'students.id AS student_id,'
				. 'students.name AS student_name,'
				. 'students.username AS student_username,'
				. 'students.boc_card_num AS student_boc_card,'
				. 'students.major AS student_major,'
				. 'students.sexual AS student_sexual,'
				. 'students.class_id AS class_id,'
				. 'classes.name AS class_name';
	}

	/**
	 * 获取三助考核总数
	 *
	 * @return int 三助考核总数
	 */
	function countAid_reports() {
		$this->db->select('COUNT(*) AS total')
				->from('class_aid_reports')
				->join('class_aid_items', 'class_aid_reports.item_id = class_aid_items.id', 'left')
				->join('units', 'class_aid_items.unit_id = units.id', 'left')
				->join('students', 'class_aid_reports.student_id = students.id', 'left')
				->join('classes', 'students.class_id = classes.id', 'left');
		$query = $this->db->get();
		$row = $query->row();
		return $row->total;
	}

	/**
	 * 获取三助考核列表
	 *
	 * @return array 三助考核列表
	 */
	function getAid_reports() {
		$this->load->library('pagination');
		$this->db->select($this->report_cols)
				->from('class_aid_reports')
				->join('class_aid_items', 'class_aid_reports.item_id = class_aid_items.id', 'left')
				->join('units', 'class_aid_items.unit_id = units.id', 'left')
				->join('students', 'class_aid_reports.student_id = students.id', 'left')
				->join('classes', 'students.class_id = classes.id', 'left')
				->limit($this->pagination->per, $this->pagination->per * ($this->pagination->cur - 1));
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * 获取管理员需审核的三助考核总数
	 *
	 * @return int 三助考核总数
	 */
	function countAid_reportsByAdmin($item_id) {
		$where = $item_id ? array('class_aid_reports.item_id' => $item_id) : array();
		$this->db->select('COUNT(*) AS total')
				->from('class_aid_reports')
				->join('class_aid_items', 'class_aid_reports.item_id = class_aid_items.id', 'left')
				->join('units', 'class_aid_items.unit_id = units.id', 'left')
				->join('students', 'class_aid_reports.student_id = students.id', 'left')
				->where($where);
		$query = $this->db->get();
		$row = $query->row();
		return $row->total;
	}

	/**
	 * 获取管理员需审核的三助考核列表
	 *
	 * @return array 三助考核列表
	 */
	function getAid_reportsByAdmin($item_id) {
		$where = $item_id ? array('class_aid_reports.item_id' => $item_id) : array();
		$this->load->library('pagination');
		$this->db->select($this->report_cols)
				->from('class_aid_reports')
				->join('class_aid_items', 'class_aid_reports.item_id = class_aid_items.id', 'left')
				->join('units', 'class_aid_items.unit_id = units.id', 'left')
				->join('students', 'class_aid_reports.student_id = students.id', 'left')
				->join('classes', 'students.class_id = classes.id', 'left')
				->where($where);
		$this->db->limit($this->pagination->per, $this->pagination->per * ($this->pagination->cur - 1));
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * 根据学生获取三助考核总数
	 *
	 * @return int 三助考核总数
	 */
	function countAid_reportsByStudent($id) {
		$this->db->select('COUNT(*) AS total')
				->from('class_aid_reports')
				->join('class_aid_items', 'class_aid_reports.item_id = class_aid_items.id', 'left')
				->join('units', 'class_aid_items.unit_id = units.id', 'left')
				->join('students', 'class_aid_reports.student_id = students.id', 'left')
				->join('classes', 'students.class_id = classes.id', 'left')
				->where(array('class_aid_reports.student_id' => $id));
		$query = $this->db->get();
		$row = $query->row();
		return $row->total;
	}

	/**
	 * 获取学生三助考核列表
	 *
	 * @return array 三助考核列表
	 */
	function getAid_reportsByStudent($id) {
		$this->load->library('pagination');
		$this->db->select($this->report_cols)
				->from('class_aid_reports')
				->join('class_aid_items', 'class_aid_reports.item_id = class_aid_items.id', 'left')
				->join('units', 'class_aid_items.unit_id = units.id', 'left')
				->join('students', 'class_aid_reports.student_id = students.id', 'left')
				->join('classes', 'students.class_id = classes.id', 'left')
				->where(array('class_aid_reports.student_id' => $id));
		$this->db->limit($this->pagination->per, $this->pagination->per * ($this->pagination->cur - 1));
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * 根据单位获取三助考核总数
	 *
	 * @return int 三助考核总数
	 */
	function countAid_reportsByUnit($id) {
		$this->db->select('COUNT(*) AS total')
				->from('class_aid_reports')
				->join('class_aid_items', 'class_aid_reports.item_id = class_aid_items.id', 'left')
				->join('units', 'class_aid_items.unit_id = units.id', 'left')
				->join('students', 'class_aid_reports.student_id = students.id', 'left')
				->where(array('class_aid_items.unit_id' => $id));
		$query = $this->db->get();
		$row = $query->row();
		return $row->total;
	}

	/**
	 * 获取单位三助考核列表
	 *
	 * @return array 三助考核列表
	 */
	function getAid_reportsByUnit($id) {
		$this->load->library('pagination');
		$this->db->select($this->report_cols)
				->from('class_aid_reports')
				->join('class_aid_items', 'class_aid_reports.item_id = class_aid_items.id', 'left')
				->join('units', 'class_aid_items.unit_id = units.id', 'left')
				->join('students', 'class_aid_reports.student_id = students.id', 'left')
				->join('classes', 'students.class_id = classes.id', 'left')
				->where(array('class_aid_items.unit_id' => $id));
		$this->db->limit($this->pagination->per, $this->pagination->per * ($this->pagination->cur - 1));
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * 根据岗位获取三助考核总数
	 *
	 * @return int 三助考核总数
	 */
	function countAid_reportsByItem($id) {
		$this->db->select('COUNT(*) AS total')
				->from('class_aid_reports')
				->join('class_aid_items', 'class_aid_reports.item_id = class_aid_items.id', 'left')
				->join('units', 'class_aid_items.unit_id = units.id', 'left')
				->join('students', 'class_aid_reports.student_id = students.id', 'left')
				->where(array('class_aid_reports.item_id' => $id));
		$query = $this->db->get();
		$row = $query->row();
		return $row->total;
	}

	/**
	 * 获取岗位三助考核列表
	 *
	 * @return array 三助考核列表
	 */
	function getAid_reportsByItem($id) {
		$this->load->library('pagination');
		$this->db->select($this->report_cols)
				->from('class_aid_reports')
				->join('class_aid_items', 'class_aid_reports.item_id = class_aid_items.id', 'left')
				->join('units', 'class_aid_items.unit_id = units.id', 'left')
				->join('students', 'class_aid_reports.student_id = students.id', 'left')
				->join('classes', 'students.class_id = classes.id', 'left')
				->where(array('class_aid_reports.item_id' => $id));
		$this->db->limit($this->pagination->per, $this->pagination->per * ($this->pagination->cur - 1));
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * 获取三助考核
	 *
	 * @param	int	$id	int	三助考核ID
	 * @return array 三助考核
	 */
	function getAid_report($id) {
		$this->db->select($this->report_cols)
				->from('class_aid_reports')
				->join('class_aid_items', 'class_aid_reports.item_id = class_aid_items.id', 'left')
				->join('units', 'class_aid_items.unit_id = units.id', 'left')
				->join('students', 'class_aid_reports.student_id = students.id', 'left')
				->join('classes', 'students.class_id = classes.id', 'left')
				->where(array('class_aid_reports.id' => $id));
		$query = $this->db->get();
		return $query->row();
	}

	/**
	 * 添加三助考核
	 *
	 * @param array $data 三助考核数据数组
	 * @return bool 是否添加成功
	 */
	function addAid_report($data) {
		return $this->db->insert('class_aid_reports', $data);
	}

	/**
	 * 编辑三助考核
	 *
	 * @param int $id 三助考核ID
	 * @param array $data 三助考核数据数组
	 * @return bool 是否编辑成功
	 */
	function editAid_report($id, $data) {
		return $this->db->update('class_aid_reports', $data, array('id' => $id));
	}

	/**
	 * 删除三助考核
	 *
	 * @param int $id 三助考核ID
	 * @return bool 是否编辑成功
	 */
	function delAid_report($id) {
		return $this->db->delete('class_aid_reports', array('id' => $id));
	}

}
