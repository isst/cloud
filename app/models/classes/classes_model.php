<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Classes_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	/**
	 * 获取班级总数
	 *
	 * @return int 班级总数
	 */
	function countClasses() {
		$this->db->select('COUNT(*) AS total')
				->from('classes')
				->join('teachers AS class_advisers', 'classes.class_adviser_id = class_advisers.id', 'left')
				->join('teachers AS major_advisers', 'classes.major_adviser_id = major_advisers.id', 'left')
				->join('teachers AS branch_instructors', 'classes.branch_instructor_id = branch_instructors.id', 'left');
		$query = $this->db->get();
		$row = $query->row();
		return $row->total;
	}

	/**
	 * 获取班级列表
	 *
	 * @return array 班级列表
	 */
	function getClasses() {
		$this->load->library('pagination');
		$select = $this->db->select('classes.*,'
						. ' class_advisers.name as class_adviser_name,'
						. ' major_advisers.name as major_adviser_name,'
						. ' branch_instructors.name as branch_instructor_name,'
						. ' class_advisers.contact as class_adviser_contact,'
						. ' major_advisers.contact as major_adviser_contact,'
						. ' branch_instructors.contact as branch_instructor_contact')
				->from('classes')
				->join('teachers AS class_advisers', 'classes.class_adviser_id = class_advisers.id', 'left')
				->join('teachers AS major_advisers', 'classes.major_adviser_id = major_advisers.id', 'left')
				->join('teachers AS branch_instructors', 'classes.branch_instructor_id = branch_instructors.id', 'left')
                ->order_by('classes.name', 'asc');
        if ($this->pagination->per > 0) {
            $select->limit($this->pagination->per, $this->pagination->per * ($this->pagination->cur - 1));
        }
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * 根据德育导师ID获取班级总数
	 *
	 * @param	int	$id	德育导师ID
	 * @return int 班级总数
	 */
	function countClassesByClassAdviser($id) {
		$this->db->select('COUNT(*) AS total')
				->from('classes')
				->join('teachers AS class_advisers', 'classes.class_adviser_id = class_advisers.id', 'left')
				->join('teachers AS major_advisers', 'classes.major_adviser_id = major_advisers.id', 'left')
				->join('teachers AS branch_instructors', 'classes.branch_instructor_id = branch_instructors.id', 'left')
				->where(array('class_advisers.id' => $id));
		$query = $this->db->get();
		$row = $query->row();
		return $row->total;
	}

	/**
	 * 根据德育导师ID获取班级列表
	 *
	 * @param	int	$id	德育导师ID
	 * @return array 班级列表
	 */
	function getClassesByClassAdviser($id) {
		$this->load->library('pagination');
		$select = $this->db->select('classes.*,'
						. ' class_advisers.name as class_adviser_name,'
						. ' major_advisers.name as major_adviser_name,'
						. ' branch_instructors.name as branch_instructor_name')
				->from('classes')
				->join('teachers AS class_advisers', 'classes.class_adviser_id = class_advisers.id', 'left')
				->join('teachers AS major_advisers', 'classes.major_adviser_id = major_advisers.id', 'left')
				->join('teachers AS branch_instructors', 'classes.branch_instructor_id = branch_instructors.id', 'left')
				->where(array('class_advisers.id' => $id));
        if ($this->pagination->per > 0) {
            $select->limit($this->pagination->per, $this->pagination->per * ($this->pagination->cur - 1));
        }
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * 根据专业导师ID获取班级总数
	 *
	 * @param	int	$id	专业导师ID
	 * @return int 班级总数
	 */
	function countClassesByMajorAdviser($id) {
		$this->db->select('COUNT(*) AS total')
				->from('classes')
				->join('teachers AS class_advisers', 'classes.class_adviser_id = class_advisers.id', 'left')
				->join('teachers AS major_advisers', 'classes.major_adviser_id = major_advisers.id', 'left')
				->join('teachers AS branch_instructors', 'classes.branch_instructor_id = branch_instructors.id', 'left')
				->where(array('major_advisers.id' => $id));
		$query = $this->db->get();
		$row = $query->row();
		return $row->total;
	}

	/**
	 * 根据专业导师ID获取班级列表
	 *
	 * @param	int	$id	专业导师ID
	 * @return array 班级列表
	 */
	function getClassesByMajorAdviser($id) {
		$this->load->library('pagination');
		$select = $this->db->select('classes.*,'
						. ' class_advisers.name as class_adviser_name,'
						. ' major_advisers.name as major_adviser_name,'
						. ' branch_instructors.name as branch_instructor_name')
				->from('classes')
				->join('teachers AS class_advisers', 'classes.class_adviser_id = class_advisers.id', 'left')
				->join('teachers AS major_advisers', 'classes.major_adviser_id = major_advisers.id', 'left')
				->join('teachers AS branch_instructors', 'classes.branch_instructor_id = branch_instructors.id', 'left')
				->where(array('major_advisers.id' => $id));
        if ($this->pagination->per > 0) {
            $select->limit($this->pagination->per, $this->pagination->per * ($this->pagination->cur - 1));
        }
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * 获取班级名称列表
	 *
	 * @return array 班级名称列表
	 */
	function getClassNames() {
		$this->db->select('id, name')
				->from('classes');
		$query = $this->db->get();
		$results = $query->result();
		$names = array();
		foreach ($results as $row) {
			$names[$row->id] = $row->name;
		}
		return $names;
	}

	/**
	 * 获取班级
	 *
	 * @param	int	$id	班级ID
	 * @return array 班级
	 */
	function getClass($id) {
		$this->db->select('classes.*,'
						. ' class_advisers.name as class_adviser_name,'
						. ' major_advisers.name as major_adviser_name,'
						. ' branch_instructors.name as branch_instructor_name,'
						. ' class_advisers.contact as class_adviser_contact,'
						. ' major_advisers.contact as major_adviser_contact,'
						. ' branch_instructors.contact as branch_instructor_contact')
				->from('classes')
				->join('teachers AS class_advisers', 'classes.class_adviser_id = class_advisers.id', 'left')
				->join('teachers AS major_advisers', 'classes.major_adviser_id = major_advisers.id', 'left')
				->join('teachers AS branch_instructors', 'classes.branch_instructor_id = branch_instructors.id', 'left')
				->where(array('classes.id' => $id));
		$query = $this->db->get();
		return $query->row();
	}

	/**
	 * 根据德育导师ID获取班级
	 *
	 * @param	int	$id	德育导师ID
	 * @return array 班级
	 */
	function getClassByClassAdviser($id) {
		$this->db->select('classes.*,'
						. ' class_advisers.name as class_adviser_name,'
						. ' major_advisers.name as major_adviser_name,'
						. ' branch_instructors.name as branch_instructor_name')
				->from('classes')
				->join('teachers AS class_advisers', 'classes.class_adviser_id = class_advisers.id', 'left')
				->join('teachers AS major_advisers', 'classes.major_adviser_id = major_advisers.id', 'left')
				->join('teachers AS branch_instructors', 'classes.branch_instructor_id = branch_instructors.id', 'left')
				->where(array('classes.class_adviser_id' => $id));
		$query = $this->db->get();
		return $query->row();
	}

	/**
	 * 获取班级中的所有学生
	 *
	 * @param int $id 班级ID
	 * @return array 学生信息数组
	 */
	function getClassStudents($id) {
		$this->db->select('*')
				->from('students')
				->where(array('class_id' => $id));
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * 添加班级
	 *
	 * @param array $data 班级数据数组
	 * @return bool 是否添加成功
	 */
	function addClass($data) {
		return $this->db->insert('classes', $data);
	}

	/**
	 * 编辑班级
	 *
	 * @param int $id 班级ID
	 * @param array $data 班级数据数组
	 * @return bool 是否编辑成功
	 */
	function editClass($id, $data) {
		return $this->db->update('classes', $data, array('id' => $id));
	}

	/**
	 * 删除班级
	 *
	 * @param int $id 班级ID
	 * @return bool 是否编辑成功
	 */
	function delClass($id) {
		return $this->db->delete('classes', array('id' => $id));
	}

}
