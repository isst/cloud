<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Aid_request_model extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->request_cols = 'class_aid_requests.*,'
				. 'class_aid_items.title AS item_title,'
				. 'students.id AS student_id,'
				. 'students.name AS student_name,'
				. 'students.sexual AS student_sexual,'
				. 'students.class_id AS class_id,'
				. 'classes.name AS class_name';
	}

	/**
	 * 获取三助申请总数
	 *
	 * @return int 三助申请总数
	 */
	function countAid_requests() {
		$this->db->select('COUNT(*) AS total')
				->from('class_aid_requests')
				->join('class_aid_items', 'class_aid_requests.item_id = class_aid_items.id', 'left')
				->join('students', 'class_aid_requests.student_id = students.id', 'left')
				->join('classes', 'students.class_id = classes.id', 'left');
		$query = $this->db->get();
		$row = $query->row();
		return $row->total;
	}

	/**
	 * 获取三助申请列表
	 *
	 * @return array 三助申请列表
	 */
	function getAid_requests() {
		$this->load->library('pagination');
		$this->db->select($this->request_cols)
				->from('class_aid_requests')
				->join('class_aid_items', 'class_aid_requests.item_id = class_aid_items.id', 'left')
				->join('students', 'class_aid_requests.student_id = students.id', 'left')
				->join('classes', 'students.class_id = classes.id', 'left')
				->limit($this->pagination->per, $this->pagination->per * ($this->pagination->cur - 1));
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * 获取管理员需审核的三助申请总数
	 *
	 * @return int 三助申请总数
	 */
	function countAid_requestsByAdmin($item_id) {
		$where = $item_id ?
				array('class_aid_requests.status >' => 3, 'class_aid_requests.item_id' => $item_id) :
				array('class_aid_requests.status >' => 3);
		$this->db->select('COUNT(*) AS total')
				->from('class_aid_requests')
				->join('class_aid_items', 'class_aid_requests.item_id = class_aid_items.id', 'left')
				->join('students', 'class_aid_requests.student_id = students.id', 'left')
				->where($where);
		$query = $this->db->get();
		$row = $query->row();
		return $row->total;
	}

	/**
	 * 获取管理员需审核的三助申请列表
	 *
	 * @return array 三助申请列表
	 */
	function getAid_requestsByAdmin($item_id) {
		$where = $item_id ?
				array('class_aid_requests.status >' => 3, 'class_aid_requests.item_id' => $item_id) :
				array('class_aid_requests.status >' => 3);
		$this->load->library('pagination');
		$this->db->select($this->request_cols)
				->from('class_aid_requests')
				->join('class_aid_items', 'class_aid_requests.item_id = class_aid_items.id', 'left')
				->join('students', 'class_aid_requests.student_id = students.id', 'left')
				->join('classes', 'students.class_id = classes.id', 'left')
				->where($where);
		$this->db->limit($this->pagination->per, $this->pagination->per * ($this->pagination->cur - 1));
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * 根据学生获取三助申请总数
	 *
	 * @return int 三助申请总数
	 */
	function countAid_requestsByStudent($id) {
		$this->db->select('COUNT(*) AS total')
				->from('class_aid_requests')
				->join('class_aid_items', 'class_aid_requests.item_id = class_aid_items.id', 'left')
				->join('students', 'class_aid_requests.student_id = students.id', 'left')
				->join('classes', 'students.class_id = classes.id', 'left')
				->where(array('class_aid_requests.student_id' => $id));
		$query = $this->db->get();
		$row = $query->row();
		return $row->total;
	}

	/**
	 * 获取学生三助申请列表
	 *
	 * @return array 三助申请列表
	 */
	function getAid_requestsByStudent($id) {
		$this->load->library('pagination');
		$this->db->select($this->request_cols)
				->from('class_aid_requests')
				->join('class_aid_items', 'class_aid_requests.item_id = class_aid_items.id', 'left')
				->join('students', 'class_aid_requests.student_id = students.id', 'left')
				->join('classes', 'students.class_id = classes.id', 'left')
				->where(array('class_aid_requests.student_id' => $id));
		$this->db->limit($this->pagination->per, $this->pagination->per * ($this->pagination->cur - 1));
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * 查询三助岗位是否已申请
	 *
	 * @return int 已申请返回1否则返回0
	 */
	function isAidItemRequestedByStudent($student_id, $item_id) {
		$this->db->select('COUNT(*) AS total')
				->from('class_aid_requests')
				->join('class_aid_items', 'class_aid_requests.item_id = class_aid_items.id', 'left')
				->join('students', 'class_aid_requests.student_id = students.id', 'left')
				->join('classes', 'students.class_id = classes.id', 'left')
				->where(array('class_aid_requests.student_id' => $student_id, 'class_aid_requests.item_id' => $item_id));
		$query = $this->db->get();
		$row = $query->row();
		return $row->total;
	}

	/**
	 * 获取学生已审核三助申请
	 *
	 * @return array 已审核三助申请
	 */
	function getAidRequestReviewedByStudent($id) {
		$this->db->select($this->request_cols)
				->from('class_aid_requests')
				->join('class_aid_items', 'class_aid_requests.item_id = class_aid_items.id', 'left')
				->join('students', 'class_aid_requests.student_id = students.id', 'left')
				->join('classes', 'students.class_id = classes.id', 'left')
				->where(array('class_aid_requests.student_id' => $id));
		$query = $this->db->get();
		return $query->row();
	}

	/**
	 * 根据单位获取三助申请总数
	 *
	 * @return int 三助申请总数
	 */
	function countAid_requestsByUnit($id) {
		$this->db->select('COUNT(*) AS total')
				->from('class_aid_requests')
				->join('class_aid_items', 'class_aid_requests.item_id = class_aid_items.id', 'left')
				->join('students', 'class_aid_requests.student_id = students.id', 'left')
				->where(array('class_aid_items.unit_id' => $id, 'class_aid_requests.status >' => 1));
		$query = $this->db->get();
		$row = $query->row();
		return $row->total;
	}

	/**
	 * 获取单位三助申请列表
	 *
	 * @return array 三助申请列表
	 */
	function getAid_requestsByUnit($id) {
		$this->load->library('pagination');
		$this->db->select($this->request_cols)
				->from('class_aid_requests')
				->join('class_aid_items', 'class_aid_requests.item_id = class_aid_items.id', 'left')
				->join('students', 'class_aid_requests.student_id = students.id', 'left')
				->join('classes', 'students.class_id = classes.id', 'left')
				->where(array('class_aid_items.unit_id' => $id, 'class_aid_requests.status >' => 1));
		$this->db->limit($this->pagination->per, $this->pagination->per * ($this->pagination->cur - 1));
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * 根据德育导师获取三助申请总数
	 *
	 * @return int 三助申请总数
	 */
	function countAid_requestsByClassAdviser($id) {
		$this->db->select('COUNT(*) AS total')
				->from('class_aid_requests')
				->join('class_aid_items', 'class_aid_requests.item_id = class_aid_items.id', 'left')
				->join('students', 'class_aid_requests.student_id = students.id', 'left')
				->join('classes', 'students.class_id = classes.id', 'left')
				->where(array('classes.class_adviser_id' => $id));
		$query = $this->db->get();
		$row = $query->row();
		return $row->total;
	}

	/**
	 * 获取德育导师三助申请列表
	 *
	 * @return array 三助申请列表
	 */
	function getAid_requestsByClassAdviser($id) {
		$this->load->library('pagination');
		$this->db->select($this->request_cols)
				->from('class_aid_requests')
				->join('class_aid_items', 'class_aid_requests.item_id = class_aid_items.id', 'left')
				->join('students', 'class_aid_requests.student_id = students.id', 'left')
				->join('classes', 'students.class_id = classes.id', 'left')
				->where(array('classes.class_adviser_id' => $id));
		$this->db->limit($this->pagination->per, $this->pagination->per * ($this->pagination->cur - 1));
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * 根据岗位获取三助申请总数
	 *
	 * @return int 三助申请总数
	 */
	function countAid_requestsByItem($id) {
		$this->db->select('COUNT(*) AS total')
				->from('class_aid_requests')
				->join('class_aid_items', 'class_aid_requests.item_id = class_aid_items.id', 'left')
				->join('students', 'class_aid_requests.student_id = students.id', 'left')
				->where(array('class_aid_requests.item_id' => $id));
		$query = $this->db->get();
		$row = $query->row();
		return $row->total;
	}

	/**
	 * 获取岗位三助申请列表
	 *
	 * @return array 三助申请列表
	 */
	function getAid_requestsByItem($id) {
		$this->load->library('pagination');
		$this->db->select($this->request_cols)
				->from('class_aid_requests')
				->join('class_aid_items', 'class_aid_requests.item_id = class_aid_items.id', 'left')
				->join('students', 'class_aid_requests.student_id = students.id', 'left')
				->join('classes', 'students.class_id = classes.id', 'left')
				->where(array('class_aid_requests.item_id' => $id));
		$this->db->limit($this->pagination->per, $this->pagination->per * ($this->pagination->cur - 1));
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * 获取三助申请
	 *
	 * @param	int	$id	int	三助申请ID
	 * @return array 三助申请
	 */
	function getAid_request($id) {
		$this->db->select($this->request_cols)
				->from('class_aid_requests')
				->join('class_aid_items', 'class_aid_requests.item_id = class_aid_items.id', 'left')
				->join('students', 'class_aid_requests.student_id = students.id', 'left')
				->join('classes', 'students.class_id = classes.id', 'left')
				->where(array('class_aid_requests.id' => $id));
		$query = $this->db->get();
		return $query->row();
	}

	/**
	 * 添加三助申请
	 *
	 * @param array $data 三助申请数据数组
	 * @return bool 是否添加成功
	 */
	function addAid_request($data) {
		return $this->db->insert('class_aid_requests', $data);
	}

	/**
	 * 编辑三助申请
	 *
	 * @param int $id 三助申请ID
	 * @param array $data 三助申请数据数组
	 * @return bool 是否编辑成功
	 */
	function editAid_request($id, $data) {
		return $this->db->update('class_aid_requests', $data, array('id' => $id));
	}

	/**
	 * 删除三助申请
	 *
	 * @param int $id 三助申请ID
	 * @return bool 是否编辑成功
	 */
	function delAid_request($id) {
		return $this->db->delete('class_aid_requests', array('id' => $id));
	}

}
