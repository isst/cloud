<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Internship_feedback_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

    /**
     * 获取实习反馈信息
     *
     * @param	int	$id	int	实习反馈信息ID
     * @return array 实习反馈信息
     */
    function getFeedback($id) {
        $this->db->select('*')
            ->from('class_internship_feedbacks')
            ->where(array('id' => $id));
        $query = $this->db->get();
        return $query->row();
    }

    function getLatestFeedback($studentId) {
        $this->db->select('*')
            ->from('class_internship_feedbacks')
            ->where(array('student_id' => $studentId))
            ->order_by('feedback_time', 'desc')
            ->order_by('updated', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    /**
	 * 获取学生的实习反馈信息总数
	 *
     * @param $studentId int 学生ID
	 * @return int 实习反馈信息总数
	 */
	function countFeedbacks($studentId) {
		$this->db->select('COUNT(*) AS total')
				->from('class_internship_feedbacks')
                ->where(array("student_id" => $studentId));
		$query = $this->db->get();
		$row = $query->row();
		return $row->total;
	}

	/**
	 * 获取学生的实习反馈信息列表
	 *
     * @param $studentId int 学生ID
	 * @return array 实习反馈信息列表
	 */
	function getFeedbacks($studentId) {
		$this->load->library('pagination');
		$this->db->select('cif.*, ci.company')
                ->from('class_internship_feedbacks cif')
				->join('class_internships ci', 'ci.id=cif.internship_id', 'left')
                ->where(array("cif.student_id" => $studentId))
				->limit($this->pagination->per, $this->pagination->per * ($this->pagination->cur - 1))
                ->order_by('cif.feedback_time', 'desc')
                ->order_by('cif.updated', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * 添加实习反馈信息
	 *
	 * @param array $data 实习反馈信息数据数组
	 * @return bool 是否添加成功
	 */
	function addFeedback($data) {
		return $this->db->insert('class_internship_feedbacks', $data);
	}

	/**
	 * 编辑实习信息
	 *
	 * @param int $id 实习反馈信息ID
	 * @param array $data 实习反馈信息数据数组
	 * @return bool 是否编辑成功
	 */
	function editFeedback($id, $data) {
		return $this->db->update('class_internship_feedbacks', $data, array('id' => $id));
	}

	/**
	 * 删除实习反馈信息
	 *
	 * @param int $id 实习反馈信息ID
	 * @return bool 是否编辑成功
	 */
	function delFeedback($id) {
		return $this->db->delete('class_internship_feedbacks', array('id' => $id));
	}
}
