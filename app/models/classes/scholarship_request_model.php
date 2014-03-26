<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Scholarship_request_model extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->request_cols = 'class_scholarship_requests.*,'
				. 'class_scholarship_items.title AS item_title,'
				. 'class_scholarship_items.money AS item_money,'
				. 'students.id AS student_id,'
				. 'students.name AS student_name,'
				. 'students.sexual AS student_sexual,'
				. 'students.class_id AS class_id,'
				. 'classes.name AS class_name';
	}

	/**
	 * 获取年度奖学金情况列表
	 *
	 * @return array 奖学金情况列表
	 */
	function getScholarshipsWinnersByYear($year = null) {
		$where = array('class_scholarship_requests.status' => 4,);
		if ($year) {
			$where['classes.start_year'] = $year;
		}
		$this->db->select($this->request_cols . ', students.student_num AS student_num,')
				->from('class_scholarship_requests')
				->join('class_scholarship_items', 'class_scholarship_requests.item_id = class_scholarship_items.id', 'left')
				->join('students', 'class_scholarship_requests.student_id = students.id', 'left')
				->join('classes', 'students.class_id = classes.id', 'left')
				->where($where);
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * 获取奖学金申请总数
	 *
	 * @return int 奖学金申请总数
	 */
	function countScholarship_requests() {
		$this->db->select('COUNT(*) AS total')
				->from('class_scholarship_requests')
				->join('class_scholarship_items', 'class_scholarship_requests.item_id = class_scholarship_items.id', 'left')
				->join('students', 'class_scholarship_requests.student_id = students.id', 'left')
				->join('classes', 'students.class_id = classes.id', 'left');
		$query = $this->db->get();
		$row = $query->row();
		return $row->total;
	}

	/**
	 * 获取奖学金申请列表
	 *
	 * @return array 奖学金申请列表
	 */
	function getScholarship_requests() {
		$this->load->library('pagination');
		$this->db->select($this->request_cols)
				->from('class_scholarship_requests')
				->join('class_scholarship_items', 'class_scholarship_requests.item_id = class_scholarship_items.id', 'left')
				->join('students', 'class_scholarship_requests.student_id = students.id', 'left')
				->join('classes', 'students.class_id = classes.id', 'left')
				->limit($this->pagination->per, $this->pagination->per * ($this->pagination->cur - 1));
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * 获取管理员需审核的奖学金申请总数
	 *
	 * @return int 奖学金申请总数
	 */
	function countScholarship_requestsByAdmin($item_id) {
		$where = $item_id ?
				array('class_scholarship_requests.status >' => 1, 'class_scholarship_requests.item_id' => $item_id) :
				array('class_scholarship_requests.status >' => 1);
		$this->db->select('COUNT(*) AS total')
				->from('class_scholarship_requests')
				->join('class_scholarship_items', 'class_scholarship_requests.item_id = class_scholarship_items.id', 'left')
				->join('students', 'class_scholarship_requests.student_id = students.id', 'left')
				->where($where);
		$query = $this->db->get();
		$row = $query->row();
		return $row->total;
	}

	/**
	 * 获取管理员需审核的奖学金申请列表
	 *
	 * @return array 奖学金申请列表
	 */
	function getScholarship_requestsByAdmin($item_id) {
		$where = $item_id ?
				array('class_scholarship_requests.status >' => 1, 'class_scholarship_requests.item_id' => $item_id) :
				array('class_scholarship_requests.status >' => 1);
		$this->load->library('pagination');
		$this->db->select($this->request_cols)
				->from('class_scholarship_requests')
				->join('class_scholarship_items', 'class_scholarship_requests.item_id = class_scholarship_items.id', 'left')
				->join('students', 'class_scholarship_requests.student_id = students.id', 'left')
				->join('classes', 'students.class_id = classes.id', 'left')
				->where($where);
		$this->db->limit($this->pagination->per, $this->pagination->per * ($this->pagination->cur - 1));
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * 根据学生获取奖学金申请总数
	 *
	 * @return int 奖学金申请总数
	 */
	function countScholarship_requestsByStudent($id) {
		$this->db->select('COUNT(*) AS total')
				->from('class_scholarship_requests')
				->join('class_scholarship_items', 'class_scholarship_requests.item_id = class_scholarship_items.id', 'left')
				->join('students', 'class_scholarship_requests.student_id = students.id', 'left')
				->join('classes', 'students.class_id = classes.id', 'left')
				->where(array('class_scholarship_requests.student_id' => $id));
		$query = $this->db->get();
		$row = $query->row();
		return $row->total;
	}

	/**
	 * 获取学生奖学金申请列表
	 *
	 * @return array 奖学金申请列表
	 */
	function getScholarship_requestsByStudent($id) {
		$this->load->library('pagination');
		$this->db->select($this->request_cols)
				->from('class_scholarship_requests')
				->join('class_scholarship_items', 'class_scholarship_requests.item_id = class_scholarship_items.id', 'left')
				->join('students', 'class_scholarship_requests.student_id = students.id', 'left')
				->join('classes', 'students.class_id = classes.id', 'left')
				->where(array('class_scholarship_requests.student_id' => $id));
		$this->db->limit($this->pagination->per, $this->pagination->per * ($this->pagination->cur - 1));
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * 根据德育导师获取奖学金申请总数
	 *
	 * @return int 奖学金申请总数
	 */
	function countScholarship_requestsByClassAdviser($id) {
		$this->db->select('COUNT(*) AS total')
				->from('class_scholarship_requests')
				->join('class_scholarship_items', 'class_scholarship_requests.item_id = class_scholarship_items.id', 'left')
				->join('students', 'class_scholarship_requests.student_id = students.id', 'left')
				->join('classes', 'students.class_id = classes.id', 'left')
				->where(array('classes.class_adviser_id' => $id));
		$query = $this->db->get();
		$row = $query->row();
		return $row->total;
	}

	/**
	 * 获取德育导师奖学金申请列表
	 *
	 * @return array 奖学金申请列表
	 */
	function getScholarship_requestsByClassAdviser($id) {
		$this->load->library('pagination');
		$this->db->select($this->request_cols)
				->from('class_scholarship_requests')
				->join('class_scholarship_items', 'class_scholarship_requests.item_id = class_scholarship_items.id', 'left')
				->join('students', 'class_scholarship_requests.student_id = students.id', 'left')
				->join('classes', 'students.class_id = classes.id', 'left')
				->where(array('classes.class_adviser_id' => $id));
		$this->db->limit($this->pagination->per, $this->pagination->per * ($this->pagination->cur - 1));
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * 根据奖项获取奖学金申请总数
	 *
	 * @return int 奖学金申请总数
	 */
	function countScholarship_requestsByItem($id) {
		$this->db->select('COUNT(*) AS total')
				->from('class_scholarship_requests')
				->join('class_scholarship_items', 'class_scholarship_requests.item_id = class_scholarship_items.id', 'left')
				->join('students', 'class_scholarship_requests.student_id = students.id', 'left')
				->where(array('class_scholarship_requests.item_id' => $id));
		$query = $this->db->get();
		$row = $query->row();
		return $row->total;
	}

	/**
	 * 根据奖项获取奖学金申请列表
	 *
	 * @return array 奖学金申请列表
	 */
	function getScholarship_requestsByItem($id) {
		$this->load->library('pagination');
		$this->db->select($this->request_cols)
				->from('class_scholarship_requests')
				->join('class_scholarship_items', 'class_scholarship_requests.item_id = class_scholarship_items.id', 'left')
				->join('students', 'class_scholarship_requests.student_id = students.id', 'left')
				->join('classes', 'students.class_id = classes.id', 'left')
				->where(array('class_scholarship_requests.item_id' => $id));
		$this->db->limit($this->pagination->per, $this->pagination->per * ($this->pagination->cur - 1));
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * 获取奖学金申请
	 *
	 * @param	int	$id	int	奖学金申请ID
	 * @return array 奖学金申请
	 */
	function getScholarship_request($id) {
		$this->db->select($this->request_cols)
				->from('class_scholarship_requests')
				->join('class_scholarship_items', 'class_scholarship_requests.item_id = class_scholarship_items.id', 'left')
				->join('students', 'class_scholarship_requests.student_id = students.id', 'left')
				->join('classes', 'students.class_id = classes.id', 'left')
				->where(array('class_scholarship_requests.id' => $id));
		$query = $this->db->get();
		return $query->row();
	}

	/**
	 * 添加奖学金申请
	 *
	 * @param array $data 奖学金申请数据数组
	 * @return bool 是否添加成功
	 */
	function addScholarship_request($data) {
		return $this->db->insert('class_scholarship_requests', $data);
	}

	/**
	 * 编辑奖学金申请
	 *
	 * @param int $id 奖学金申请ID
	 * @param array $data 奖学金申请数据数组
	 * @return bool 是否编辑成功
	 */
	function editScholarship_request($id, $data) {
		return $this->db->update('class_scholarship_requests', $data, array('id' => $id));
	}

	/**
	 * 删除奖学金申请
	 *
	 * @param int $id 奖学金申请ID
	 * @return bool 是否编辑成功
	 */
	function delScholarship_request($id) {
		return $this->db->delete('class_scholarship_requests', array('id' => $id));
	}

}
