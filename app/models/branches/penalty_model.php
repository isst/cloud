<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Penalty_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /**
     * 获取党支部警告总数
     *
     * @return int 党支部警告总数
     */
    function countPenalties($class_id) {
        $this->db->select('COUNT(*) AS total');
        $this->db->from('branch_penalties');
        $this->db->join('students', 'branch_penalties.student_id = students.id');
        $this->db->where(array('branch_penalties.class_id' => $class_id));
        $query = $this->db->get();
        $results = $query->result();
        return $results[0]->total;
    }

    /**
     * 根据学生ID获取党支部警告总数
     *
     * @return int 党支部警告总数
     */
    function countPenaltiesByStudent($student_id) {
        $this->db->select('COUNT(*) AS total');
        $this->db->from('branch_penalties');
        $this->db->join('students', 'branch_penalties.student_id = students.id');
        $this->db->where(array('branch_penalties.student_id' => $student_id));
        $query = $this->db->get();
        $results = $query->result();
        return $results[0]->total;
    }

    /**
     * 获取党支部警告列表
     *
     * @return array 党支部警告列表
     */
    function getPenalties($class_id) {
        $this->load->library('pagination');
        $this->db->select('branch_penalties.student_id as student_id,'
                . ' students.name as student_name,'
                . ' students.sexual as student_sexual,'
                . ' branch_penalties.id as penalty_id,'
                . ' branch_penalties.time as time,'
                . ' branch_penalties.class_id as class_id,'
                . ' branch_penalties.title as title,'
                . ' branch_penalties.content as content,');
        $this->db->from('branch_penalties');
        $this->db->join('students', 'branch_penalties.student_id = students.id');
        $this->db->where(array('branch_penalties.class_id' => $class_id));
        $this->db->limit($this->pagination->per, $this->pagination->per * ($this->pagination->cur - 1));
        $query = $this->db->get();
        return $query->result();
    }

    /**
     * 获取党支部警告
     *
     * @return array 党支部警告
     */
    function getPenalty($id) {
        $this->db->select('students.id as student_id,'
                . ' students.name as student_name,'
                . ' students.sexual as student_sexual,'
                . ' branch_penalties.id as penalty_id,'
                . ' branch_penalties.time as time,'
                . ' branch_penalties.class_id as class_id,'
                . ' branch_penalties.title as title,'
                . ' branch_penalties.content as content,');
        $this->db->from('branch_penalties');
        $this->db->join('students', 'branch_penalties.student_id = students.id');
        $this->db->where(array('branch_penalties.id' => $id));
        $query = $this->db->get();
        return ($ret = $query->result()) ? $ret[0] : false;
    }

    /**
     * 根据学生ID获取党支部警告列表
     *
     * @return array 党支部警告列表
     */
    function getPenaltiesByStudent($student_id) {
        $this->load->library('pagination');
        $this->db->select('branch_penalties.student_id as student_id,'
                . ' students.name as student_name,'
                . ' students.sexual as student_sexual,'
                . ' branch_penalties.id as penalty_id,'
                . ' branch_penalties.time as time,'
                . ' branch_penalties.class_id as class_id,'
                . ' branch_penalties.title as title,'
                . ' branch_penalties.content as content,');
        $this->db->from('branch_penalties');
        $this->db->join('students', 'branch_penalties.student_id = students.id');
        $this->db->where(array('branch_penalties.student_id' => $student_id));
        $this->db->limit($this->pagination->per, $this->pagination->per * ($this->pagination->cur - 1));
        $query = $this->db->get();
        return $query->result();
    }

    /**
     * 添加党支部警告
     *
     * @return bool 是否添加成功
     */
    function addPenalty($data) {
        return $this->db->insert('branch_penalties', $data);
    }

    /**
     * 编辑党支部警告
     *
     * @return bool 是否编辑成功
     */
    function editPenalty($id, $data) {
        return $this->db->update('branch_penalties', $data, array('id' => $id));
    }

    /**
     * 删除党支部警告
     *
     * @return bool 是否编辑成功
     */
    function delPenalty($id) {
        return $this->db->delete('branch_penalties', array('id' => $id));
    }

}
