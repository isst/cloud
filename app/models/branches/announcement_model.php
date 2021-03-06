<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Announcement_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /**
     * 获取党支部信息公告总数
     *
     * @return int 党支部信息公告总数
     */
    function countAnnouncements($class_id) {
        $this->db->select('COUNT(*) AS total');
        $this->db->from('branch_announcements');
        $this->db->where(array('class_id' => $class_id));
        $query = $this->db->get();
        $results = $query->result();
        return $results[0]->total;
    }

    /**
     * 获取党支部信息公告列表
     *
     * @return array 党支部信息公告列表
     */
    function getAnnouncements($class_id) {
        $this->load->library('pagination');
        $this->db->select('*');
        $this->db->from('branch_announcements');
        $this->db->where(array('class_id' => $class_id,'public'=>''));
        $this->db->limit($this->pagination->per, $this->pagination->per * ($this->pagination->cur - 1));
        $query = $this->db->get();
        return $query->result();
    }
    function getAnnouncementsPublic($public) {
        $this->load->library('pagination');
        $this->db->select('*');
        $this->db->from('branch_announcements');
        $this->db->where(array('public' => $public));
        $this->db->limit($this->pagination->per, $this->pagination->per * ($this->pagination->cur - 1));
        $query = $this->db->get();
        return $query->result();
    }

    /**
     * 获取党支部信息公告
     *
     * @return array 党支部信息公告
     */
    function getAnnouncement($id) {
        $this->db->select('*');
        $this->db->from('branch_announcements');
        $this->db->where(array('id' => $id));
        $query = $this->db->get();
        return ($ret = $query->result()) ? $ret[0] : false;
    }

    /**
     * 添加党支部信息公告
     *
     * @return bool 是否添加成功
     */
    function addAnnouncement($data) {
        return $this->db->insert('branch_announcements', $data);
    }

    /**
     * 编辑党支部信息公告
     *
     * @return bool 是否编辑成功
     */
    function editAnnouncement($id, $data) {
        return $this->db->update('branch_announcements', $data, array('id' => $id));
    }

    /**
     * 删除党支部信息公告
     *
     * @return bool 是否编辑成功
     */
    function delAnnouncement($id) {
        return $this->db->delete('branch_announcements', array('id' => $id));
    }

}
