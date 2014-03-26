<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Hardship_request_model extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->request_cols = 'class_hardship_requests.*,'
				. 'class_hardship_items.title AS item_title,'
				. 'students.id AS student_id,'
				. 'students.major AS student_major,'
				. 'students.username AS student_username,'
				. 'students.name AS student_name,'
				. 'students.sexual AS student_sexual,'
				. 'students.class_id AS class_id,'
				. 'classes.name AS class_name';
		$this->load->model('classes/classes_model');
	}

	/**
	 * 获取困难补助申请总数
	 *
	 * @return int 困难补助申请总数
	 */
	function countHardship_requests() {
		$this->db->select('COUNT(*) AS total')
				->from('class_hardship_requests')
				->join('class_hardship_items', 'class_hardship_requests.item_id = class_hardship_items.id', 'left')
				->join('students', 'class_hardship_requests.student_id = students.id', 'left')
				->join('classes', 'students.class_id = classes.id', 'left');
		$query = $this->db->get();
		$row = $query->row();
		return $row->total;
	}

	/**
	 * 获取困难补助申请列表
	 *
	 * @return array 困难补助申请列表
	 */
	function getHardship_requests() {
		$this->load->library('pagination');
		$this->db->select($this->request_cols)
				->from('class_hardship_requests')
				->join('class_hardship_items', 'class_hardship_requests.item_id = class_hardship_items.id', 'left')
				->join('students', 'class_hardship_requests.student_id = students.id', 'left')
				->join('classes', 'students.class_id = classes.id', 'left')
				->limit($this->pagination->per, $this->pagination->per * ($this->pagination->cur - 1));
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * 获取管理员需审核的困难补助申请总数
	 *
	 * @return int 困难补助申请总数
	 */
	function countHardship_requestsByAdmin($item_id) {
		$where = $item_id ?
				array('class_hardship_requests.status >' => 1, 'class_hardship_requests.item_id' => $item_id) :
				array('class_hardship_requests.status >' => 1);
		$this->db->select('COUNT(*) AS total')
				->from('class_hardship_requests')
				->join('class_hardship_items', 'class_hardship_requests.item_id = class_hardship_items.id', 'left')
				->join('students', 'class_hardship_requests.student_id = students.id', 'left')
				->where($where);
		$query = $this->db->get();
		$row = $query->row();
		return $row->total;
	}

	/**
	 * 获取管理员需审核的困难补助申请列表
	 *
	 * @return array 困难补助申请列表
	 */
	function getHardship_requestsByAdmin($item_id) {
		$where = $item_id ?
				array('class_hardship_requests.status >' => 1, 'class_hardship_requests.item_id' => $item_id) :
				array('class_hardship_requests.status >' => 1);
		$this->load->library('pagination');
		$this->db->select($this->request_cols)
				->from('class_hardship_requests')
				->join('class_hardship_items', 'class_hardship_requests.item_id = class_hardship_items.id', 'left')
				->join('students', 'class_hardship_requests.student_id = students.id', 'left')
				->join('classes', 'students.class_id = classes.id', 'left')
				->order_by('request_time','desc')
				->where($where);
		$this->db->limit($this->pagination->per, $this->pagination->per * ($this->pagination->cur - 1));
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * 根据学生获取困难补助申请总数
	 *
	 * @return int 困难补助申请总数
	 */
	function countHardship_requestsByStudent($id) {
		$this->db->select('COUNT(*) AS total')
				->from('class_hardship_requests')
				->join('class_hardship_items', 'class_hardship_requests.item_id = class_hardship_items.id', 'left')
				->join('students', 'class_hardship_requests.student_id = students.id', 'left')
				->join('classes', 'students.class_id = classes.id', 'left')
				->where(array('class_hardship_requests.student_id' => $id));
		$query = $this->db->get();
		$row = $query->row();
		return $row->total;
	}

	/**
	 * 获取学生困难补助申请列表
	 *
	 * @return array 困难补助申请列表
	 */
	function getHardship_requestsByStudent($id) {
		$this->load->library('pagination');
		$this->db->select($this->request_cols)
				->from('class_hardship_requests')
				->join('class_hardship_items', 'class_hardship_requests.item_id = class_hardship_items.id', 'left')
				->join('students', 'class_hardship_requests.student_id = students.id', 'left')
				->join('classes', 'students.class_id = classes.id', 'left')
				->where(array('class_hardship_requests.student_id' => $id));
		$this->db->limit($this->pagination->per, $this->pagination->per * ($this->pagination->cur - 1));
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * 根据德育导师获取困难补助申请总数
	 *
	 * @return int 困难补助申请总数
	 */
	function countHardship_requestsByClassAdviser($id) {
		$this->db->select('COUNT(*) AS total')
				->from('class_hardship_requests')
				->join('class_hardship_items', 'class_hardship_requests.item_id = class_hardship_items.id', 'left')
				->join('students', 'class_hardship_requests.student_id = students.id', 'left')
				->join('classes', 'students.class_id = classes.id', 'left')
				->where(array('classes.class_adviser_id' => $id));
		$query = $this->db->get();
		$row = $query->row();
		return $row->total;
	}

	/**
	 * 获取德育导师困难补助申请列表
	 *
	 * @return array 困难补助申请列表
	 */
	function getHardship_requestsByClassAdviser($id) {
		$this->load->library('pagination');
		$this->db->select($this->request_cols)
				->from('class_hardship_requests')
				->join('class_hardship_items', 'class_hardship_requests.item_id = class_hardship_items.id', 'left')
				->join('students', 'class_hardship_requests.student_id = students.id', 'left')
				->join('classes', 'students.class_id = classes.id', 'left')
				->where(array('classes.class_adviser_id' => $id));
		$this->db->limit($this->pagination->per, $this->pagination->per * ($this->pagination->cur - 1));
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * 根据补助项目获取困难补助申请总数
	 *
	 * @return int 困难补助申请总数
	 */
	function countHardship_requestsByItem($id) {
		$this->db->select('COUNT(*) AS total')
				->from('class_hardship_requests')
				->join('class_hardship_items', 'class_hardship_requests.item_id = class_hardship_items.id', 'left')
				->join('students', 'class_hardship_requests.student_id = students.id', 'left')
				->where(array('class_hardship_requests.item_id' => $id));
		$query = $this->db->get();
		$row = $query->row();
		return $row->total;
	}

	/**
	 * 根据补助项目获取困难补助申请列表
	 *
	 * @return array 困难补助申请列表
	 */
	function getHardship_requestsByItem($id) {
		$this->load->library('pagination');
		$this->db->select($this->request_cols)
				->from('class_hardship_requests')
				->join('class_hardship_items', 'class_hardship_requests.item_id = class_hardship_items.id', 'left')
				->join('students', 'class_hardship_requests.student_id = students.id', 'left')
				->join('classes', 'students.class_id = classes.id', 'left')
				->where(array('class_hardship_requests.item_id' => $id));
		$this->db->limit($this->pagination->per, $this->pagination->per * ($this->pagination->cur - 1));
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * 获取困难补助申请
	 *
	 * @param	int	$id	int	困难补助申请ID
	 * @return array 困难补助申请
	 */
	function getHardship_request($id) {
		$this->db->select($this->request_cols)
				->from('class_hardship_requests')
				->join('class_hardship_items', 'class_hardship_requests.item_id = class_hardship_items.id', 'left')
				->join('students', 'class_hardship_requests.student_id = students.id', 'left')
				->join('classes', 'students.class_id = classes.id', 'left')
				->where(array('class_hardship_requests.id' => $id));
		$query = $this->db->get();
		return $query->row();
	}

	/**
	 * 添加困难补助申请
	 *
	 * @param array $data 困难补助申请数据数组
	 * @return bool 是否添加成功
	 */
	function addHardship_request($data) {
		return $this->db->insert('class_hardship_requests', $data);
	}

	/**
	 * 编辑困难补助申请
	 *
	 * @param int $id 困难补助申请ID
	 * @param array $data 困难补助申请数据数组
	 * @return bool 是否编辑成功
	 */
	function editHardship_request($id, $data) {
		return $this->db->update('class_hardship_requests', $data, array('id' => $id));
	}

	/**
	 * 删除困难补助申请
	 *
	 * @param int $id 困难补助申请ID
	 * @return bool 是否编辑成功
	 */
	function delHardship_request($id) {
		return $this->db->delete('class_hardship_requests', array('id' => $id));
	}

}
