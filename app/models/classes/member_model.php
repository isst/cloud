<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Member_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	/**
	 * 按入学年份获取团员列表
	 *
	 * @return array 团员列表
	 */
	function getLeagueMembersByYear($year = null) {
		$where = array('students.politics_status >' => 0,);
		if ($year) {
			$where['classes.start_year'] = $year;
		}
		$this->db->select('students.*, classes.name as class_name')
				->from('students')
				->join('classes', 'students.class_id = classes.id', 'left')
				->where($where);
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * 获取班级成员总数
	 *
	 * @param int $id 班级ID
	 * @return int 班级成员总数
	 */
	function countMembers($id) {
		$this->db->select('COUNT(*) AS total')
				->from('students')
				->where(array('class_id' => $id));
		$query = $this->db->get();
		$row = $query->row();
		return $row->total;
	}

	/**
	 * 获取班级成员列表
	 *
	 * @param int $id 班级ID
	 * @return array 班级成员列表
	 */
	function getMembers($id) {
		$this->load->library('pagination');
		$select = $this->db->select('*')
				->from('students')
				->where(array('class_id' => $id));
		if ($this->pagination->per > 0) {
            $select->limit($this->pagination->per, $this->pagination->per * ($this->pagination->cur - 1));
        }
		$query = $this->db->get();
		return $query->result();
	}

    /**
     * 获取班级成员及实习列表
     *
     * @param int $id 班级ID
     * @return array 班级成员及实习列表
     */
    function getMembersWithInternship($id) {
        $this->load->library('pagination');
        $select = $this->db->select('s.id, s.name, s.student_num, s.sexual, s.class_title, s.tel, ci.company, ci.lodging, ci.updated, c.name as city_name')
            ->from('students s')
            ->join('(SELECT * FROM (SELECT * FROM class_internships ORDER BY updated DESC) t GROUP BY student_id) ci', 'ci.student_id=s.id', 'left')
            ->join('cities c', 'ci.city_id=c.id', 'left')
            ->where(array('s.class_id' => $id));
        if ($this->pagination->per > 0) {
            $select->limit($this->pagination->per, $this->pagination->per * ($this->pagination->cur - 1));
        }
        $query = $this->db->get();
        return $query->result();
    }

    /**
	 * 根据论文导师ID获取学生总数
	 *
	 * @param int $id 论文导师ID
	 * @return int 班级成员总数
	 */
	function countStudentsBySupervisor($id) {
		$this->db->select('COUNT(*) AS total')
				->from('students')
				->join('classes', 'classes.id = students.class_id')
				->where(array('students.supervisor_id' => $id));
		$query = $this->db->get();
		$row = $query->row();
		return $row->total;
	}

	/**
	 * 根据论文导师ID获取学生列表
	 *
	 * @param int $id 论文导师ID
	 * @return array 班级成员列表
	 */
	function getStudentsBySupervisor($id) {
		$this->load->library('pagination');
		$this->db->select('students.*, classes.name as class_name')
				->from('students')
				->join('classes', 'classes.id = students.class_id')
				->where(array('students.supervisor_id' => $id))
				->limit($this->pagination->per, $this->pagination->per * ($this->pagination->cur - 1));
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * 根据德育导师ID获取全部学生列表
	 *
	 * @param int $id 论文导师ID
	 * @return array 班级成员列表
	 */
	function getAllStudentsByClassAdviser($id) {
		$this->db->select('students.*, classes.name as class_name')
				->from('students')
				->join('classes', 'classes.id = students.class_id')
				->where(array('classes.class_adviser_id' => $id));
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * 根据专业导师ID获取全部学生列表
	 *
	 * @param int $id 论文导师ID
	 * @return array 班级成员列表
	 */
	function getAllStudentsByMajorAdviser($id) {
		$this->db->select('students.*, classes.name as class_name')
				->from('students')
				->join('classes', 'classes.id = students.class_id')
				->where(array('classes.major_adviser_id' => $id));
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * 根据论文导师ID获取全部学生列表
	 *
	 * @param int $id 论文导师ID
	 * @return array 班级成员列表
	 */
	function getAllStudentsBySupervisor($id) {
		$this->db->select('students.*, classes.name as class_name')
				->from('students')
				->join('classes', 'classes.id = students.class_id')
				->where(array('students.supervisor_id' => $id));
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * 获取班级全部成员列表
	 *
	 * @param int $id 班级ID
	 * @return array 班级成员列表
	 */
	function getAllMembers($id) {
		$this->load->library('pagination');
		$this->db->select('*')
				->from('students')
				->where(array('class_id' => $id));
		$query = $this->db->get();
		return $query->result();
	}
	/**
	 * 获取全部学生列表
	 *
	 *
	 */
	function getAllStudents(){
		$this->db->select('students.*, classes.name as class_name')
				->from('students')
				->join('classes', 'classes.id = students.class_id');
		$query = $this->db->get();
		return $query->result();
	}
	/**
	 * 获取班级成员
	 *
	 * @param int $id 班级成员ID
	 * @return array 成功时返回班级成员信息，否则返回FALSE
	 */
	function getMember($id) {
		$this->db->select('*')
				->from('students')
				->where(array('id' => $id));
		$query = $this->db->get();
		return $query->row();
	}

	/**
	 * 获取具备职务的班级成员姓名
	 *
	 * @param int $class_id 班级ID
	 * @param int $class_title 班级职务编号
	 * @return array 具备职务的班级成员姓名，失败时返回FALSE
	 */
	function getSpecMember($id, $class_title) {
		$this->db->select('*')
				->from('students')
				->where(array('class_id' => $id, 'class_title' => $class_title));
		$query = $this->db->get();
		return ($ret = $query->result()) ? $ret[0] : false;
	}

	/**
	 * 添加班级成员
	 *
	 * @param array $data 成员信息数组
	 * @return bool 是否添加成功
	 */
	function addMember($data) {
		return $this->db->insert('students', $data);
	}

	/**
	 * 编辑班级成员
	 *
	 * @param int $id 班级成员ID
	 * @param int $data 成员信息数组
	 * @return bool 是否编辑成功
	 */
	function editMember($id, $data) {
		return $this->db->update('students', $data, array('id' => $id));
	}

	/**
	 * 删除班级成员
	 *
	 * @param int $id 班级成员ID
	 * @return bool 是否编辑成功
	 */
	function delMember($id) {
		return $this->db->delete('students', array('id' => $id));
	}

#-------------------------------------------------------------------------------
# 以下是党支部相关函数移植
#-------------------------------------------------------------------------------

	/**
	 * 获取具备头衔的党支部成员姓名
	 *
	 * @param int $class_id 党支部ID
	 * @param int $branch_title 党支部头衔编号
	 * @return array 具备头衔的党支部成员姓名，失败时返回FALSE
	 */
	function getSpecBranchMember($class_id, $branch_title) {
		$this->db->select('name')
				->from('students')
				->where(array('class_id' => $class_id, 'branch_title' => $branch_title));
		$query = $this->db->get();
		return ($ret = $query->result()) ? $ret[0] : false;
	}

}
