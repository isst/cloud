<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Scholarship_quota_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	/**
	 * 获取配额总数
	 *
	 * @return int 配额总数
	 */
	function countScholarship_quotas() {
		$this->db->select('COUNT(*) AS total')
				->from('classes')
				->join('class_scholarship_quotas', 'classes.id = class_scholarship_quotas.class_id', 'left');
		$query = $this->db->get();
		$row = $query->row();
		return $row->total;
	}

	/**
	 * 获取配额列表
	 *
	 * @return array 配额列表
	 */
	function getScholarship_quotas() {
		$this->load->library('pagination');
		$this->db->select('classes.*, class_scholarship_quotas.quotas as quotas')
				->from('classes')
				->join('class_scholarship_quotas', 'classes.id = class_scholarship_quotas.class_id', 'left')
				->limit($this->pagination->per, $this->pagination->per * ($this->pagination->cur - 1));
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * 获取配额总数
	 *
	 * @return int 配额总数
	 */
	function countScholarship_quotasByClassAdviser($id) {
		$this->db->select('COUNT(*) AS total')
				->from('classes')
				->join('class_scholarship_quotas', 'classes.id = class_scholarship_quotas.class_id', 'left')
				->where(array('classes.class_adviser_id'=>$id));
		$query = $this->db->get();
		$row = $query->row();
		return $row->total;
	}

	/**
	 * 获取配额列表
	 *
	 * @return array 配额列表
	 */
	function getScholarship_quotasByClassAdviser($id) {
		$this->load->library('pagination');
		$this->db->select('classes.*, class_scholarship_quotas.quotas as quotas')
				->from('classes')
				->join('class_scholarship_quotas', 'classes.id = class_scholarship_quotas.class_id', 'left')
				->where(array('classes.class_adviser_id'=>$id))
				->limit($this->pagination->per, $this->pagination->per * ($this->pagination->cur - 1));
		$query = $this->db->get();
		return $query->result();
	}
	/**
	 * 获取配额
	 *
	 * @param	int	$id	int	配额ID
	 * @return array 配额
	 */
	function getScholarship_quota($id) {
		$this->db->select('classes.*, class_scholarship_quotas.quotas as quotas')
				->from('classes')
				->join('class_scholarship_quotas', 'classes.id = class_scholarship_quotas.class_id', 'left')
				->where(array('classes.id' => $id));
		$query = $this->db->get();
		return $query->row();
	}

	/**
	 * 编辑配额
	 *
	 * @param int $id 配额ID
	 * @param array $data 配额数据数组
	 * @return bool 是否编辑成功
	 */
	function editScholarship_quota($id, $data) {
		$this->db->select('COUNT(*) AS total')
				->from('class_scholarship_quotas')
				->where(array('class_id' => $id));
		$query = $this->db->get();
		$row = $query->row();
		$class_count = $row->total;
		if ($class_count) {
			return $this->db->update('class_scholarship_quotas', $data, array('id' => $id));
		} else {
			$data['class_id'] = $id;
			return $this->db->insert('class_scholarship_quotas', $data);
		}
	}

}
