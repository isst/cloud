<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Option_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	/**
	 * 选项设置
	 *
	 * @param string $key 选项名
	 * @param int $data 选项值数据
	 * @return bool 是否设置成功
	 */
	function setOption($key, $data) {
		$this->db->select('COUNT(*) AS total')
				->from('options')
				->where(array('key' => $key));
		$query = $this->db->get();
		$row = $query->row();
		$value = is_scalar($data) ? $data : serialize($data);
		if ($row->total) {
			return $this->db->update('options', array('value' => $value), array('key' => $key));
		} else {
			return $this->db->insert('options', array('key' => $key, 'value' => $value));
		}
	}

	/**
	 * 获取选项
	 *
	 * @param string $key 选项名
	 * @return array 成功时返回选项值，否则返回FALSE
	 */
	function getOption($key) {
		$this->db->select('value')
				->from('options')
				->where(array('key' => $key));
		$query = $this->db->get();
		$row = $query->row();
		if ($row) {
			$data = @unserialize($row->value);
			return ($data === false && $row->value !== 'b:0;') ? $row->value : $data;
		} else {
			return FALSE;
		}
	}

}
