<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Growth_publicity_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	/**
	 * 获取党支部发展公示总数
	 *
	 * @return int 党支部发展公示总数
	 */
	function countGrowthPublicities($class_id) {
		$this->db->select('COUNT(*) AS total')
				->from('branch_growth_publicity')
				->join('students', 'branch_growth_publicity.student_id = students.id')
				->where(array('branch_growth_publicity.class_id' => $class_id));
		$query = $this->db->get();
		$results = $query->result();
		return $results[0]->total;
	}

	/**
	 * 获取党支部发展公示列表
	 *
	 * @return array 党支部发展公示列表
	 */
	function getGrowthPublicities($class_id) {
		$this->load->library('pagination');
		$this->db->select('branch_growth_publicity.student_id as student_id,'
						. ' students.name as student_name,'
						. ' students.sexual as student_sexual,'
						. ' branch_growth_publicity.id as id,'
						. ' branch_growth_publicity.class_id as class_id,'
						. ' branch_growth_publicity.date_from as date_from,'
						. ' branch_growth_publicity.date_to as date_to,'
						. ' branch_growth_publicity.url as url,'
						. ' branch_growth_publicity.result as result')
				->from('branch_growth_publicity')
				->join('students', 'branch_growth_publicity.student_id = students.id')
				->where(array('branch_growth_publicity.class_id' => $class_id))
				->limit($this->pagination->per, $this->pagination->per * ($this->pagination->cur - 1));
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * 获取党支部发展公示
	 *
	 * @return array 党支部发展公示
	 */
	function getGrowthPublicity($id) {
		$this->db->select('branch_growth_publicity.student_id as student_id,'
						. ' students.name as student_name,'
						. ' students.sexual as student_sexual,'
						. ' branch_growth_publicity.id as id,'
						. ' branch_growth_publicity.class_id as class_id,'
						. ' branch_growth_publicity.date_from as date_from,'
						. ' branch_growth_publicity.date_to as date_to,'
						. ' branch_growth_publicity.url as url,'
						. ' branch_growth_publicity.result as result')
				->from('branch_growth_publicity')
				->join('students', 'branch_growth_publicity.student_id = students.id')
				->where(array('branch_growth_publicity.id' => $id));
		$query = $this->db->get();
		return ($ret = $query->result()) ? $ret[0] : false;
	}

	/**
	 * 根据学生ID获取党支部发展公示
	 *
	 * @param int $id 学生ID
	 * @return array 党支部发展公示
	 */
	function getGrowthPublicityByStudent($id) {
		$this->db->select('branch_growth_publicity.student_id as student_id,'
						. ' students.name as student_name,'
						. ' students.sexual as student_sexual,'
						. ' branch_growth_publicity.id as id,'
						. ' branch_growth_publicity.class_id as class_id,'
						. ' branch_growth_publicity.date_from as date_from,'
						. ' branch_growth_publicity.date_to as date_to,'
						. ' branch_growth_publicity.url as url,'
						. ' branch_growth_publicity.result as result')
				->from('branch_growth_publicity')
				->join('students', 'branch_growth_publicity.student_id = students.id')
				->where(array('students.id' => $id));
		$query = $this->db->get();
		return ($ret = $query->result()) ? $ret[0] : false;
	}

	/**
	 * 添加党支部发展公示
	 *
	 * @return bool 是否添加成功
	 */
	function addGrowthPublicity($data) {
		return $this->db->insert('branch_growth_publicity', $data);
	}

	/**
	 * 编辑党支部发展公示
	 *
	 * @return bool 是否编辑成功
	 */
	function editGrowthPublicity($id, $data) {
		return $this->db->update('branch_growth_publicity', $data, array('id' => $id));
	}

	/**
	 * 删除党支部发展公示
	 *
	 * @return bool 是否编辑成功
	 */
	function delGrowthPublicity($id) {
		return $this->db->delete('branch_growth_publicity', array('id' => $id));
	}

}
