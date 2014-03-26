<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Branch_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	/**
	 * 获取党支部总数
	 *
	 * @return int 党支部总数
	 */
	function countBranches() {
		$this->db->select('COUNT(*) AS total')
				->from('classes');
		$query = $this->db->get();
		$results = $query->result();
		return $results[0]->total;
	}

	/**
	 * 获取党支部列表
	 *
	 * @return array 党支部列表
	 */
	function getBranches() {
		$this->load->library('pagination');
		$this->db->select('classes.id as id,'
						. ' classes.name as name,'
						. ' classes.branch_instructor_id as branch_instructor_id,'
						. ' teachers.name as branch_instructor_name')
				->from('classes')
				->join('teachers', 'classes.branch_instructor_id = teachers.id', 'left')
				->limit($this->pagination->per, $this->pagination->per * ($this->pagination->cur - 1));
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * 获取党支部
	 *
	 * @return array 党支部
	 */
	function getBranch($id) {
		$this->db->select('classes.id as id,'
						. ' classes.name as name,'
						. ' classes.branch_instructor_id as branch_instructor_id,'
						. ' teachers.name as branch_instructor_name')
				->from('classes')
				->join('teachers', 'classes.branch_instructor_id = teachers.id', 'left')
				->where(array('classes.id' => $id));
		$query = $this->db->get();
		return ($ret = $query->result()) ? $ret[0] : false;
	}

	/**
	 * 根据支部指导老师查询党支部
	 *
	 * @param	$id	int	支部指导老师ID
	 * @return	array	支部指导老师所在的党支部信息
	 */
	function getBranchByInstructor($id) {
		$this->db->select('classes.id as id,'
						. ' classes.name as name,'
						. ' classes.branch_instructor_id as branch_instructor_id,'
						. ' teachers.name as branch_instructor_name')
				->from('classes')
				->join('teachers', 'classes.branch_instructor_id = teachers.id', 'left')
				->where(array('classes.branch_instructor_id' => $id));
		$query = $this->db->get();
		return ($ret = $query->result()) ? $ret[0] : false;
	}

	/**
	 * 根据支部指导老师获取党支部总数
	 *
	 * @return int 党支部总数
	 */
	function countBranchesByInstructor($id) {
		$this->db->select('COUNT(*) AS total')
				->from('classes')
				->where(array('classes.branch_instructor_id' => $id));
		$query = $this->db->get();
		$results = $query->result();
		return $results[0]->total;
	}

	/**
	 * 根据支部指导老师获取党支部列表
	 *
	 * @return array 党支部列表
	 */
	function getBranchesByInstructor($id) {
		$this->load->library('pagination');
		$this->db->select('classes.id as id,'
						. ' classes.name as name,'
						. ' classes.branch_instructor_id as branch_instructor_id,'
						. ' teachers.name as branch_instructor_name')
				->from('classes')
				->join('teachers', 'classes.branch_instructor_id = teachers.id', 'left')
				->where(array('classes.branch_instructor_id' => $id))
				->limit($this->pagination->per, $this->pagination->per * ($this->pagination->cur - 1));
		$query = $this->db->get();
		return $query->result();
	}

}
