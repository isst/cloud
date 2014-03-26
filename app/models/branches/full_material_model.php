<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Full_material_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	/**
	 * 获取预备党员转正材料总数
	 *
	 * @return int 预备党员转正材料总数
	 */
	function countMaterials($class_id) {
		$this->db->select('COUNT(*) AS total')
				->from('branch_full_material')
				->join('students', 'branch_full_material.student_id = students.id')
				->where(array('branch_full_material.class_id' => $class_id));
		$query = $this->db->get();
		$results = $query->result();
		return $results[0]->total;
	}

	/**
	 * 获取预备党员转正材料列表
	 *
	 * @return array 预备党员转正材料列表
	 */
	function getMaterials($class_id) {
		$this->load->library('pagination');
		$this->db->select('branch_full_material.student_id as student_id,'
						. ' students.name as student_name,'
						. ' students.sexual as student_sexual,'
						. ' branch_full_material.id as material_id,'
						. ' branch_full_material.class_id as class_id,'
						. ' branch_full_material.thinking_report as thinking_report,'
						. ' branch_full_material.application as application,'
						. ' branch_full_material.completion_certificate as completion_certificate,'
						. ' branch_full_material.ideal as ideal')
				->from('branch_full_material')
				->join('students', 'branch_full_material.student_id = students.id')
				->where(array('branch_full_material.class_id' => $class_id))
				->limit($this->pagination->per, $this->pagination->per * ($this->pagination->cur - 1));
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * 获取预备党员转正材料
	 *
	 * @return array 预备党员转正材料
	 */
	function getMaterial($id) {
		$this->db->select('branch_full_material.student_id as student_id,'
						. ' students.name as student_name,'
						. ' students.sexual as student_sexual,'
						. ' branch_full_material.id as material_id,'
						. ' branch_full_material.class_id as class_id,'
						. ' branch_full_material.thinking_report as thinking_report,'
						. ' branch_full_material.application as application,'
						. ' branch_full_material.completion_certificate as completion_certificate,'
						. ' branch_full_material.ideal as ideal')
				->from('branch_full_material')
				->join('students', 'branch_full_material.student_id = students.id')
				->where(array('branch_full_material.id' => $id));
		$query = $this->db->get();
		return ($ret = $query->result()) ? $ret[0] : false;
	}

	/**
	 * 根据学生ID获取预备党员转正材料
	 *
	 * @param int $id 学生ID
	 * @return array 预备党员转正材料
	 */
	function getMaterialByStudent($id) {
		$this->db->select('branch_full_material.student_id as student_id,'
						. ' students.name as student_name,'
						. ' students.sexual as student_sexual,'
						. ' branch_full_material.id as material_id,'
						. ' branch_full_material.class_id as class_id,'
						. ' branch_full_material.thinking_report as thinking_report,'
						. ' branch_full_material.application as application,'
						. ' branch_full_material.completion_certificate as completion_certificate,'
						. ' branch_full_material.ideal as ideal')
				->from('branch_full_material')
				->join('students', 'branch_full_material.student_id = students.id')
				->where(array('students.id' => $id));
		$query = $this->db->get();
		return ($ret = $query->result()) ? $ret[0] : false;
	}

	/**
	 * 添加预备党员转正材料
	 *
	 * @return bool 是否添加成功
	 */
	function addMaterial($data) {
		return $this->db->insert('branch_full_material', $data);
	}

	/**
	 * 编辑预备党员转正材料
	 *
	 * @return bool 是否编辑成功
	 */
	function editMaterial($id, $data) {
		return $this->db->update('branch_full_material', $data, array('id' => $id));
	}

	/**
	 * 删除预备党员转正材料
	 *
	 * @return bool 是否编辑成功
	 */
	function delMaterial($id) {
		return $this->db->delete('branch_full_material', array('id' => $id));
	}

}
