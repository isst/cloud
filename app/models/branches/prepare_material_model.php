<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Prepare_material_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	/**
	 * 获取党支部入党申请书总数
	 *
	 * @return int 党支部入党申请书总数
	 */
	function countMaterials($class_id) {
		$this->db->select('COUNT(*) AS total')
				->from('branch_prepare_material')
				->join('students', 'branch_prepare_material.student_id = students.id')
				->where(array('branch_prepare_material.class_id' => $class_id));
		$query = $this->db->get();
		$results = $query->result();
		return $results[0]->total;
	}

	/**
	 * 获取党支部入党申请书列表
	 *
	 * @return array 党支部入党申请书列表
	 */
	function getMaterials($class_id) {
		$this->load->library('pagination');
		$this->db->select('branch_prepare_material.student_id as student_id,'
						. ' students.name as student_name,'
						. ' students.sexual as student_sexual,'
						. ' branch_prepare_material.id as material_id,'
						. ' branch_prepare_material.class_id as class_id,'
						. ' branch_prepare_material.membership_application as membership_application,'
						. ' branch_prepare_material.tuiyou_table as tuiyou_table,'
						. ' branch_prepare_material.activist_inspection as activist_inspection,'
						. ' branch_prepare_material.thinking_report as thinking_report,'
						. ' branch_prepare_material.completion_certificate as completion_certificate,'
						. ' branch_prepare_material.masses_discussion as masses_discussion,'
						. ' branch_prepare_material.politics_audit_letter as politics_audit_letter,'
						. ' branch_prepare_material.politics_audit_complex as politics_audit_complex,'
						. ' branch_prepare_material.autobiography as autobiography,')
				->from('branch_prepare_material')
				->join('students', 'branch_prepare_material.student_id = students.id')
				->where(array('branch_prepare_material.class_id' => $class_id))
				->limit($this->pagination->per, $this->pagination->per * ($this->pagination->cur - 1));
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * 获取党支部入党申请书
	 *
	 * @return array 党支部入党申请书
	 */
	function getMaterial($id) {
		$this->db->select('branch_prepare_material.student_id as student_id,'
						. ' students.name as student_name,'
						. ' students.sexual as student_sexual,'
						. ' branch_prepare_material.id as material_id,'
						. ' branch_prepare_material.class_id as class_id,'
						. ' branch_prepare_material.membership_application as membership_application,'
						. ' branch_prepare_material.tuiyou_table as tuiyou_table,'
						. ' branch_prepare_material.activist_inspection as activist_inspection,'
						. ' branch_prepare_material.thinking_report as thinking_report,'
						. ' branch_prepare_material.completion_certificate as completion_certificate,'
						. ' branch_prepare_material.masses_discussion as masses_discussion,'
						. ' branch_prepare_material.politics_audit_letter as politics_audit_letter,'
						. ' branch_prepare_material.politics_audit_complex as politics_audit_complex,'
						. ' branch_prepare_material.autobiography as autobiography,')
				->from('branch_prepare_material')
				->join('students', 'branch_prepare_material.student_id = students.id')
				->where(array('branch_prepare_material.id' => $id));
		$query = $this->db->get();
		return ($ret = $query->result()) ? $ret[0] : false;
	}

	/**
	 * 根据学生ID获取党支部入党申请书
	 *
	 * @param int $id 学生ID
	 * @return array 党支部入党申请书
	 */
	function getMaterialByStudent($id) {
		$this->db->select('branch_prepare_material.student_id as student_id,'
						. ' students.name as student_name,'
						. ' students.sexual as student_sexual,'
						. ' branch_prepare_material.id as material_id,'
						. ' branch_prepare_material.class_id as class_id,'
						. ' branch_prepare_material.membership_application as membership_application,'
						. ' branch_prepare_material.tuiyou_table as tuiyou_table,'
						. ' branch_prepare_material.activist_inspection as activist_inspection,'
						. ' branch_prepare_material.thinking_report as thinking_report,'
						. ' branch_prepare_material.completion_certificate as completion_certificate,'
						. ' branch_prepare_material.masses_discussion as masses_discussion,'
						. ' branch_prepare_material.politics_audit_letter as politics_audit_letter,'
						. ' branch_prepare_material.politics_audit_complex as politics_audit_complex,'
						. ' branch_prepare_material.autobiography as autobiography,')
				->from('branch_prepare_material')
				->join('students', 'branch_prepare_material.student_id = students.id')
				->where(array('students.id' => $id));
		$query = $this->db->get();
		return ($ret = $query->result()) ? $ret[0] : false;
	}

	/**
	 * 添加党支部入党申请书
	 *
	 * @return bool 是否添加成功
	 */
	function addMaterial($data) {
		return $this->db->insert('branch_prepare_material', $data);
	}

	/**
	 * 编辑党支部入党申请书
	 *
	 * @return bool 是否编辑成功
	 */
	function editMaterial($id, $data) {
		return $this->db->update('branch_prepare_material', $data, array('id' => $id));
	}

	/**
	 * 删除党支部入党申请书
	 *
	 * @return bool 是否编辑成功
	 */
	function delMaterial($id) {
		return $this->db->delete('branch_prepare_material', array('id' => $id));
	}

}
