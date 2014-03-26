<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Memcon_model extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->select_cols = 'class_memcons.*,'
				. ' students.name as student_name,'
				. ' students.sexual as student_sexual,'
				. ' talkers.name as talker_name,'
				. ' classes.name as class_name,';
	}

	/**
	 * 根据谈话人类型获取谈话记录总数
	 *
	 * @return int 谈话记录总数
	 */
	function countMemconsByTalkerType($talker_type) {
		$talker_table = ('teacher' == $talker_type) ? 'teachers' : 'students';
		$this->db->select('COUNT(*) AS total')
				->from('class_memcons')
				->join('students', 'class_memcons.student_id = students.id')
				->join('classes', 'class_memcons.class_id = classes.id')
				->join($talker_table . ' as talkers', 'class_memcons.talker_id = talkers.id')
				->where(array('class_memcons.talker_type' => $talker_type));
		$query = $this->db->get();
		$row = $query->row();
		return $row->total;
	}

	/**
	 * 根据谈话人类型获取谈话记录列表
	 *
	 * @return array 谈话记录列表
	 */
	function getMemconsByTalkerType($talker_type) {
		$talker_table = ('teacher' == $talker_type) ? 'teachers' : 'students';
		$this->load->library('pagination');
		$this->db->select($this->select_cols)
				->from('class_memcons')
				->join('students', 'class_memcons.student_id = students.id')
				->join('classes', 'class_memcons.class_id = classes.id')
				->join($talker_table . ' as talkers', 'class_memcons.talker_id = talkers.id')
				->where(array('class_memcons.talker_type' => $talker_type))
				->limit($this->pagination->per, $this->pagination->per * ($this->pagination->cur - 1));
		 //echo $this->db->last_query();
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * 根据谈话人获取谈话记录总数
	 *
	 * @return int 谈话记录总数
	 */
	function countMemconsByTalker($talker_type, $type, $id) {
		$talker_table = ('teacher' == $talker_type) ? 'teachers' : 'students';
		$where = array(
			'class_memcons.talker_id' => $id,
			'class_memcons.talker_type' => $talker_type,
			'class_memcons.type' => $type,
		);
		$this->db->select('COUNT(*) AS total')
				->from('class_memcons')
				->join('students', 'class_memcons.student_id = students.id')
				->join('classes', 'class_memcons.class_id = classes.id')
				->join($talker_table . ' as talkers', 'class_memcons.talker_id = talkers.id')
				->where($where);
		$query = $this->db->get();
		$row = $query->row();
		return $row->total;
	}

	/**
	 * 根据谈话人获取谈话记录列表
	 *
	 * @return array 谈话记录列表
	 */
	function getMemconsByTalker($talker_type, $type, $id) {
		$talker_table = ('teacher' == $talker_type) ? 'teachers' : 'students';
		$where = array(
			'class_memcons.talker_id' => $id,
			'class_memcons.talker_type' => $talker_type,
			'class_memcons.type' => $type,
		);
		$this->load->library('pagination');
		$this->db->select($this->select_cols)
				->from('class_memcons')
				->join('students', 'class_memcons.student_id = students.id')
				->join('classes', 'class_memcons.class_id = classes.id')
				->join($talker_table . ' as talkers', 'class_memcons.talker_id = talkers.id')
				->where($where)
				->limit($this->pagination->per, $this->pagination->per * ($this->pagination->cur - 1));
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * 根据班级ID获取谈话记录总数
	 *
	 * @return int 谈话记录总数
	 */
	function countMemconsByClass($talker_type, $class_id) {
		$talker_table = ('teacher' == $talker_type) ? 'teachers' : 'students';
		$this->db->select('COUNT(*) AS total')
				->from('class_memcons')
				->join('students', 'class_memcons.student_id = students.id')
				->join('classes', 'class_memcons.class_id = classes.id')
				->join($talker_table . ' as talkers', 'class_memcons.talker_id = talkers.id')
				->where(array('class_memcons.talker_type' => $talker_type, 'class_memcons.class_id' => $class_id));
		$query = $this->db->get();
		$row = $query->row();
		return $row->total;
	}

	/**
	 * 根据班级ID获取谈话记录列表
	 *
	 * @return array 谈话记录列表
	 */
	function getMemconsByClass($talker_type, $class_id) {
		$talker_table = ('teacher' == $talker_type) ? 'teachers' : 'students';
		$this->load->library('pagination');
		$this->db->select($this->select_cols)
				->from('class_memcons')
				->join('students', 'class_memcons.student_id = students.id')
				->join('classes', 'class_memcons.class_id = classes.id')
				->join($talker_table . ' as talkers', 'class_memcons.talker_id = talkers.id')
				->where(array('class_memcons.talker_type' => $talker_type, 'class_memcons.class_id' => $class_id))
				->limit($this->pagination->per, $this->pagination->per * ($this->pagination->cur - 1));
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * 根据学生ID获取谈话记录总数
	 *
	 * @return int 谈话记录总数
	 */
	function countMemconsByStudent($talker_type, $student_id) {
		$talker_table = ('teacher' == $talker_type) ? 'teachers' : 'students';
		$this->db->select('COUNT(*) AS total')
				->from('class_memcons')
				->join('students', 'class_memcons.student_id = students.id')
				->join('classes', 'class_memcons.class_id = classes.id')
				->join($talker_table . ' as talkers', 'class_memcons.talker_id = talkers.id')
				->where(array('class_memcons.talker_type' => $talker_type, 'class_memcons.student_id' => $student_id));
		$query = $this->db->get();
		$results = $query->result();
		return $results[0]->total;
	}

	/**
	 * 根据学生ID获取谈话记录列表
	 *
	 * @param int $id 学生ID
	 * @return array 返回谈话记录列表
	 */
	function getMemconsByStudent($talker_type, $student_id) {
		$talker_table = ('teacher' == $talker_type) ? 'teachers' : 'students';
		$this->load->library('pagination');
		$this->db->select($this->select_cols)
				->from('class_memcons')
				->join('students', 'class_memcons.student_id = students.id')
				->join('classes', 'class_memcons.class_id = classes.id')
				->join($talker_table . ' as talkers', 'class_memcons.talker_id = talkers.id')
				->where(array('class_memcons.talker_type' => $talker_type, 'class_memcons.student_id' => $student_id))
				->limit($this->pagination->per, $this->pagination->per * ($this->pagination->cur - 1));
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * 获取谈话记录
	 *
	 * @return array 谈话记录
	 */
	function getMemcon($id) {
		$this->db->select('talker_type')
				->from('class_memcons')
				->where(array('id' => $id));
		$query = $this->db->get();
		$row = $query->row();
		$talker_type = $row->talker_type;

		$talker_table = ('teacher' == $talker_type) ? 'teachers' : 'students';
		$this->db->select($this->select_cols)
				->from('class_memcons')
				->join('students', 'class_memcons.student_id = students.id')
				->join('classes', 'class_memcons.class_id = classes.id')
				->join($talker_table . ' as talkers', 'class_memcons.talker_id = talkers.id')
				->where(array('class_memcons.talker_type' => $talker_type, 'class_memcons.id' => $id));
		$query = $this->db->get();
		return $query->row();
	}

	/**
	 * 添加谈话记录
	 *
	 * @return bool 是否添加成功
	 */
	function addMemcon($data) {
		return $this->db->insert('class_memcons', $data);
	}

	/**
	 * 编辑谈话记录
	 *
	 * @return bool 是否编辑成功
	 */
	function editMemcon($id, $data) {
		return $this->db->update('class_memcons', $data, array('id' => $id));
	}

	/**
	 * 删除谈话记录
	 *
	 * @return bool 是否编辑成功
	 */
	function delMemcon($id) {
		return $this->db->delete('class_memcons', array('id' => $id));
	}

}
