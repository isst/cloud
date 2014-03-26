<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Full_member_application_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	/**
	 * 获取党支部转正申请表总数
	 *
	 * @return int 党支部转正申请表总数
	 */
	function countFullMemberApplications($class_id) {
		$this->db->select('COUNT(*) AS total');
		$this->db->from('branch_full_member_applications');
		$this->db->join('students', 'branch_full_member_applications.student_id = students.id');
		$this->db->where(array('branch_full_member_applications.class_id' => $class_id));
		$query = $this->db->get();
		$results = $query->result();
		return $results[0]->total;
	}

	/**
	 * 获取党支部转正申请表列表
	 *
	 * @return array 党支部转正申请表列表
	 */
	function getFullMemberApplications($class_id) {
		$this->load->library('pagination');
		$this->db->select('branch_full_member_applications.student_id as student_id,'
						. ' students.name as student_name,'
						. ' students.sexual as student_sexual,'
						. ' branch_full_member_applications.id as id,'
						. ' branch_full_member_applications.class_id as class_id,'
						. ' branch_full_member_applications.result as result,'
						. ' branch_full_member_applications.date_from as date_from,'
						. ' branch_full_member_applications.notes as notes,')
				->from('branch_full_member_applications')
				->join('students', 'branch_full_member_applications.student_id = students.id')
				->where(array('branch_full_member_applications.class_id' => $class_id))
				->limit($this->pagination->per, $this->pagination->per * ($this->pagination->cur - 1));
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * 获取党支部转正申请表
	 *
	 * @return array 党支部转正申请表
	 */
	function getFullMemberApplication($id) {
		$this->db->select('branch_full_member_applications.student_id as student_id,'
						. ' students.name as student_name,'
						. ' students.sexual as student_sexual,'
						. ' branch_full_member_applications.id as id,'
						. ' branch_full_member_applications.class_id as class_id,'
						. ' branch_full_member_applications.result as result,'
						. ' branch_full_member_applications.date_from as date_from,'
						. ' branch_full_member_applications.notes as notes,')
				->from('branch_full_member_applications')
				->join('students', 'branch_full_member_applications.student_id = students.id')
				->where(array('branch_full_member_applications.id' => $id));
		$query = $this->db->get();
		return ($ret = $query->result()) ? $ret[0] : false;
	}

	/**
	 * 添加党支部转正申请表
	 *
	 * @return bool 是否添加成功
	 */
	function addFullMemberApplication($data) {
		return $this->db->insert('branch_full_member_applications', $data);
	}

	/**
	 * 编辑党支部转正申请表
	 *
	 * @return bool 是否编辑成功
	 */
	function editFullMemberApplication($id, $data) {
		return $this->db->update('branch_full_member_applications', $data, array('id' => $id));
	}

	/**
	 * 删除党支部转正申请表
	 *
	 * @return bool 是否编辑成功
	 */
	function delFullMemberApplication($id) {
		return $this->db->delete('branch_full_member_applications', array('id' => $id));
	}

}
