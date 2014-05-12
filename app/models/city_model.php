<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class city_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /**
     * 获取城市总数
     *
     * @return int 城市总数
     */
    function countcities() {
        $this->db->select('COUNT(*) AS total')
            ->from('cities');
        $query = $this->db->get();
        $row = $query->row();
        return $row->total;
    }

    /**
     * 获取城市列表
     *
     * @return array 城市列表
     */
    function getcities() {
        $this->load->library('pagination');
        $this->db->select('*')
            ->from('cities')
            ->limit($this->pagination->per, $this->pagination->per * ($this->pagination->cur - 1));
        $query = $this->db->get();
        return $query->result();
    }

    /**
     * 获取城市名称列表
     *
     * @return array 城市名称列表
     */
    function getCityNames() {
        $this->db->select('id, name')
            ->from('cities');
        $query = $this->db->get();
        $results = $query->result();
        $names = array();
        foreach ($results as $row) {
            $names[$row->id] = $row->name;
        }
        return $names;
    }

    /**
     * 获取城市
     *
     * @param	int	$id	城市ID
     * @return array 城市
     */
    function getClass($id) {
        $this->db->select('*')
            ->from('cities')
            ->where(array('cities.id' => $id));
        $query = $this->db->get();
        return $query->row();
    }

    /**
     * 添加城市
     *
     * @param array $data 城市数据数组
     * @return bool 是否添加成功
     */
    function addClass($data) {
        return $this->db->insert('cities', $data);
    }

    /**
     * 编辑城市
     *
     * @param int $id 城市ID
     * @param array $data 城市数据数组
     * @return bool 是否编辑成功
     */
    function editClass($id, $data) {
        return $this->db->update('cities', $data, array('id' => $id));
    }

    /**
     * 删除城市
     *
     * @param int $id 班级ID
     * @return bool 是否城市成功
     */
    function delClass($id) {
        return $this->db->delete('cities', array('id' => $id));
    }

}
