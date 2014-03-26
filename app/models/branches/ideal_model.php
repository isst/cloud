<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Ideal_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	/**
	 * 获取党支部入党志愿书总数
	 *
	 * @return int 党支部入党志愿书总数
	 */
	function countIdeals($class_id) {
		$this->db->select('COUNT(*) AS total');
		$this->db->from('branch_ideals');
		$this->db->join('students', 'branch_ideals.student_id = students.id');
		$this->db->where(array('branch_ideals.class_id' => $class_id));
		$query = $this->db->get();
		$results = $query->result();
		return $results[0]->total;
	}

	/**
	 * 获取党支部入党志愿书列表
	 *
	 * @return array 党支部入党志愿书列表
	 */
	function getIdeals($class_id) {
		$this->load->library('pagination');
		$this->db->select('branch_ideals.student_id as student_id,'
						. ' students.name as student_name,'
						. ' students.sexual as student_sexual,'
						. ' branch_ideals.id as ideal_id,'
						. ' branch_ideals.class_id as class_id,'
						. ' branch_ideals.result as result,'
						. ' branch_ideals.date_from as date_from,'
						. ' branch_ideals.notes as notes,')
				->from('branch_ideals')
				->join('students', 'branch_ideals.student_id = students.id')
				->where(array('branch_ideals.class_id' => $class_id))
				->limit($this->pagination->per, $this->pagination->per * ($this->pagination->cur - 1));
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * 获取党支部入党志愿书
	 *
	 * @return array 党支部入党志愿书
	 */
	function getIdeal($id) {
		$this->db->select('branch_ideals.student_id as student_id,'
						. ' students.name as student_name,'
						. ' students.sexual as student_sexual,'
						. ' branch_ideals.id as ideal_id,'
						. ' branch_ideals.class_id as class_id,'
						. ' branch_ideals.result as result,'
						. ' branch_ideals.date_from as date_from,'
						. ' branch_ideals.notes as notes,')
				->from('branch_ideals')
				->join('students', 'branch_ideals.student_id = students.id')
				->where(array('branch_ideals.id' => $id));
		$query = $this->db->get();
		return ($ret = $query->result()) ? $ret[0] : false;
	}

	/**
	 * 添加党支部入党志愿书
	 *
	 * @return bool 是否添加成功
	 */
	function addIdeal($data) {
		return $this->db->insert('branch_ideals', $data);
	}

	/**
	 * 编辑党支部入党志愿书
	 *
	 * @return bool 是否编辑成功
	 */
	function editIdeal($id, $data) {
		return $this->db->update('branch_ideals', $data, array('id' => $id));
	}

	/**
	 * 删除党支部入党志愿书
	 *
	 * @return bool 是否编辑成功
	 */
	function delIdeal($id) {
		return $this->db->delete('branch_ideals', array('id' => $id));
	}

}
