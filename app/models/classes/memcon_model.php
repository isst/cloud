<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Memcon_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

    function getStatusLabels() {
        return array(
            '一般',
            '重要',
            '紧急'
        );
    }

	/**
	 * 根据谈话人类型获取谈话记录总数
	 *
	 * @return int 谈话记录总数
	 */
	function countMemconsByTalkerType($talker_type) {
		$this->db->select('COUNT(*) AS total')
				->from('class_memcons')
				->join('students', 'class_memcons.student_id = students.id')
				->join('classes', 'class_memcons.class_id = classes.id')
				->where(array('class_memcons.talker_type' => $talker_type));

		$query = $this->db->get();
		$row = $query->row();
		return $row->total;
	}

    function getSelectCols() {
        $select_cols = 'class_memcons.*,'
            . ' students.id as student_id,'
            . ' students.name as student_name,'
            . ' students.sexual as student_sexual,'
            . ' classes.name as class_name,';

        return $select_cols;
    }

	/**
	 * 根据谈话人类型获取谈话记录列表
	 *
	 * @return array 谈话记录列表
	 */
	function getMemconsByTalkerType($talker_type) {
		$this->load->library('pagination');
		$this->db->select($this->getSelectCols())
				->from('class_memcons')
				->join('students', 'class_memcons.student_id = students.id')
				->join('classes', 'class_memcons.class_id = classes.id')
				->where(array('class_memcons.talker_type' => $talker_type))
				->limit($this->pagination->per, $this->pagination->per * ($this->pagination->cur - 1))
                ->order_by("time", "desc");

		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * 根据谈话人获取谈话记录总数
	 *
	 * @return int 谈话记录总数
	 */
	function countMemconsByTalker($talker_type, $type, $id) {
		$where = array(
			'class_memcons.talker_id' => $id,
			'class_memcons.talker_type' => $talker_type,
			'class_memcons.type' => $type,
		);
		$this->db->select('COUNT(*) AS total')
				->from('class_memcons')
				->join('students', 'class_memcons.student_id = students.id')
				->join('classes', 'class_memcons.class_id = classes.id')
				->where($where);
		$query = $this->db->get();
		$row = $query->row();
		return $row->total;
	}

    function getMemconsByTeacher($talker_type, $type, $teacherId) {
        $where = array(
            'class_memcons.talker_type' => $talker_type,
            'class_memcons.type' => $type
        );
        $this->load->library('pagination');
        $this->db->select($this->getSelectCols())
            ->from('class_memcons')
            ->join('students', 'class_memcons.student_id = students.id')
            ->join('classes', 'class_memcons.class_id = classes.id')
            ->where($where)
            ->where("(classes.class_adviser_id={$teacherId} OR classes.major_adviser_id={$teacherId})")
            ->limit($this->pagination->per, $this->pagination->per * ($this->pagination->cur - 1))
            ->order_by("time", "desc");
        $query = $this->db->get();
        return $query->result();
    }

    function countMemconsByTeacher($talker_type, $type, $teacherId) {
        $where = array(
            'class_memcons.talker_type' => $talker_type,
            'class_memcons.type' => $type
        );
        $this->load->library('pagination');
        $this->db->select('COUNT(*) AS total')
            ->from('class_memcons')
            ->join('students', 'class_memcons.student_id = students.id')
            ->join('classes', 'class_memcons.class_id = classes.id')
            ->where($where)
            ->where("(classes.class_adviser_id={$teacherId} OR classes.major_adviser_id={$teacherId})");
        $query = $this->db->get();
        return $query->row()->total;
    }

	/**
	 * 根据谈话人获取谈话记录列表
	 *
	 * @return array 谈话记录列表
	 */
	function getMemconsByTalker($talker_type, $type, $id) {
		$where = array(
			'class_memcons.talker_id' => $id,
			'class_memcons.talker_type' => $talker_type,
			'class_memcons.type' => $type,
		);
		$this->load->library('pagination');
		$this->db->select($this->getSelectCols())
				->from('class_memcons')
				->join('students', 'class_memcons.student_id = students.id')
				->join('classes', 'class_memcons.class_id = classes.id')
				->where($where)
				->limit($this->pagination->per, $this->pagination->per * ($this->pagination->cur - 1))
                ->order_by("time", "desc");;
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * 根据班级ID获取谈话记录总数
	 *
	 * @return int 谈话记录总数
	 */
	function countMemconsByClass($talker_type, $class_id) {
		$this->db->select('COUNT(*) AS total')
				->from('class_memcons')
				->join('students', 'class_memcons.student_id = students.id')
				->join('classes', 'class_memcons.class_id = classes.id')
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
		$this->load->library('pagination');
		$this->db->select($this->getSelectCols())
				->from('class_memcons')
				->join('students', 'class_memcons.student_id = students.id')
				->join('classes', 'class_memcons.class_id = classes.id')
				->where(array('class_memcons.talker_type' => $talker_type, 'class_memcons.class_id' => $class_id))
				->limit($this->pagination->per, $this->pagination->per * ($this->pagination->cur - 1))
                ->order_by("time", "desc");;
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * 根据学生ID获取谈话记录总数
	 *
	 * @return int 谈话记录总数
	 */
	function countMemconsByStudent($talker_type, $student_id) {
		$this->db->select('COUNT(*) AS total')
				->from('class_memcons')
				->join('students', 'class_memcons.student_id = students.id')
				->join('classes', 'class_memcons.class_id = classes.id')
				->where(array('class_memcons.student_id' => $student_id));

        if ($talker_type) {
            $this->db->where(array('class_memcons.talker_type' => $talker_type));
        }

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
		$this->load->library('pagination');
		$this->db->select($this->getSelectCols())
				->from('class_memcons')
				->join('students', 'class_memcons.student_id = students.id')
				->join('classes', 'class_memcons.class_id = classes.id')
				->where(array('class_memcons.student_id' => $student_id))
				->limit($this->pagination->per, $this->pagination->per * ($this->pagination->cur - 1))
                ->order_by("time", "desc");;

        if ($talker_type) {
            $this->db->where(array('class_memcons.talker_type' => $talker_type));
        }

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

		$this->db->select($this->getSelectCols())
				->from('class_memcons')
				->join('students', 'class_memcons.student_id = students.id')
				->join('classes', 'class_memcons.class_id = classes.id')
				->where(array('class_memcons.talker_type' => $talker_type, 'class_memcons.id' => $id));

        if (in_array($talker_type, array('teacher', 'student'))) {
            $talker_table = ('teacher' == $talker_type) ? 'teachers' : 'students';
            $this->db->join($talker_table . ' as talkers', 'class_memcons.talker_id = talkers.id');
        }

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
