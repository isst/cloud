<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reward_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /**
     * 获取党支部表扬总数
     *
     * @return int 党支部表扬总数
     */
    function countRewards($class_id) {
        $this->db->select('COUNT(*) AS total');
        $this->db->from('branch_rewards');
        $this->db->join('students', 'branch_rewards.student_id = students.id');
        $this->db->where(array('branch_rewards.class_id' => $class_id));
        $query = $this->db->get();
        $results = $query->result();
        return $results[0]->total;
    }

    /**
     * 根据学生ID获取党支部表扬总数
     *
     * @return int 党支部表扬总数
     */
    function countRewardsByStudent($student_id) {
        $this->db->select('COUNT(*) AS total');
        $this->db->from('branch_rewards');
        $this->db->join('students', 'branch_rewards.student_id = students.id');
        $this->db->where(array('branch_rewards.student_id' => $student_id));
        $query = $this->db->get();
        $results = $query->result();
        return $results[0]->total;
    }

    /**
     * 获取党支部表扬列表
     *
     * @return array 党支部表扬列表
     */
    function getRewards($class_id) {
        $this->load->library('pagination');
        $this->db->select('branch_rewards.student_id as student_id,'
                . ' students.name as student_name,'
                . ' students.sexual as student_sexual,'
                . ' branch_rewards.id as reward_id,'
                . ' branch_rewards.time as time,'
                . ' branch_rewards.class_id as class_id,'
                . ' branch_rewards.title as title,'
                . ' branch_rewards.content as content,');
        $this->db->from('branch_rewards');
        $this->db->join('students', 'branch_rewards.student_id = students.id');
        $this->db->where(array('branch_rewards.class_id' => $class_id));
        $this->db->limit($this->pagination->per, $this->pagination->per * ($this->pagination->cur - 1));
        $query = $this->db->get();
        return $query->result();
    }

    /**
     * 获取党支部表扬
     *
     * @return array 党支部表扬
     */
    function getReward($id) {
        $this->db->select('students.id as student_id,'
                . ' students.name as student_name,'
                . ' students.sexual as student_sexual,'
                . ' branch_rewards.id as reward_id,'
                . ' branch_rewards.time as time,'
                . ' branch_rewards.class_id as class_id,'
                . ' branch_rewards.title as title,'
                . ' branch_rewards.content as content,');
        $this->db->from('branch_rewards');
        $this->db->join('students', 'branch_rewards.student_id = students.id');
        $this->db->where(array('branch_rewards.id' => $id));
        $query = $this->db->get();
        return ($ret = $query->result()) ? $ret[0] : false;
    }

    /**
     * 根据学生ID获取支部表扬
     *
     * @param int $id 学生ID
     * @return array 成功时返回支部表扬信息，否则返回FALSE
     */
    function getRewardsByStudent($student_id) {
        $this->load->library('pagination');
        $this->db->select('branch_rewards.student_id as student_id,'
                . ' students.name as student_name,'
                . ' students.sexual as student_sexual,'
                . ' branch_rewards.id as reward_id,'
                . ' branch_rewards.time as time,'
                . ' branch_rewards.class_id as class_id,'
                . ' branch_rewards.title as title,'
                . ' branch_rewards.content as content,');
        $this->db->from('branch_rewards');
        $this->db->join('students', 'branch_rewards.student_id = students.id');
        $this->db->where(array('branch_rewards.student_id' => $student_id));
        $this->db->limit($this->pagination->per, $this->pagination->per * ($this->pagination->cur - 1));
        $query = $this->db->get();
        return $query->result();
    }

    /**
     * 添加党支部表扬
     *
     * @return bool 是否添加成功
     */
    function addReward($data) {
        return $this->db->insert('branch_rewards', $data);
    }

    /**
     * 编辑党支部表扬
     *
     * @return bool 是否编辑成功
     */
    function editReward($id, $data) {
        return $this->db->update('branch_rewards', $data, array('id' => $id));
    }

    /**
     * 删除党支部表扬
     *
     * @return bool 是否编辑成功
     */
    function delReward($id) {
        return $this->db->delete('branch_rewards', array('id' => $id));
    }

}
