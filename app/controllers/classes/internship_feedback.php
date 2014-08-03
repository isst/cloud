<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 实习信息
 */
class Internship_feedback extends MY_Controller {

    function __construct() {
        // 设置各角色的访问权限
        $this->user_permit = array(
            'administrator' => array('index', 'add', 'edit', 'del'),
        );
        parent::__construct();
        $this->load->model('classes/internship_model');
        $this->load->model('classes/internship_feedback_model');
    }

    /**
     * 实习反馈信息列表
     */
    public function index() {
        $this->load->library('pagination');
        $this->student_id = $studentId = intval($_GET['student_id']);
        $this->pagination->total($this->internship_feedback_model->countFeedbacks($studentId));
        $this->feedbacks = $this->internship_feedback_model->getFeedbacks($studentId);
        $this->load->view('classes/internship/feedback/list', $this);
    }

    /**
     * 创建实习信息
     */
    public function add() {
        $this->student_id = $studentId = intval($_GET['student_id']);

        if (empty($_POST)) {
            $this->internships = $this->internship_model->getInternshipOptions($studentId);
            $this->load->view('classes/internship/feedback/add', $this);
        } else {
            $data = array(
                'student_id' => $studentId,
                'internship_id' => @$_POST['internship_id'],
                'editor' => @$_POST['editor'],
                'content' => @$_POST['content'],
                'feedback_time' => @$_POST['feedback_time'],
                'updated' => date('Y-m-d H:i:s')
            );
            if ($this->internship_feedback_model->addFeedback($data)) {
                $ret = array(
                    'statusCode' => '200',
                    'message' => '添加成功',
                    'rel' =>  'internship_feedback_list',
                    'callbackType' => 'closeCurrent',
                );
            } else {
                $ret = array(
                    'statusCode' => '300',
                    'message' => '添加失败',
                    'rel' =>  'internship_feedback_list',
                    'callbackType' => 'closeCurrent',
                );
            }
            echo json_encode($ret);
        }
    }

    /**
     * 编辑实习信息
     */
    public function edit() {
        $this->id = $id = (int) $_GET['id'];
        $this->feedback = $this->internship_feedback_model->getFeedback($id);
        if (empty($_POST)) {
            $this->internships = $this->internship_model->getInternshipOptions($this->feedback->student_id);
            $this->load->view('classes/internship/feedback/edit', $this);
        } else {
            $data = array(
                'internship_id' => @$_POST['internship_id'],
                'editor' => @$_POST['editor'],
                'content' => @$_POST['content'],
                'feedback_time' => @$_POST['feedback_time'],
                'updated' => date('Y-m-d H:i:s')
            );
            if ($this->internship_feedback_model->editFeedback($id, $data)) {
                $ret = array(
                    'statusCode' => '200',
                    'message' => '修改实习反馈信息信息成功',
                    'rel' =>  'internship_feedback_list',
                    'callbackType' => 'closeCurrent',
                );
            } else {
                $ret = array(
                    'statusCode' => '300',
                    'message' => '修改实习反馈信息信息失败',
                    'rel' =>  'internship_feedback_list',
                    'callbackType' => 'closeCurrent',
                );
            }
            echo json_encode($ret);
        }
    }

    /**
     * 删除实习信息
     */
    public function del() {
        $this->id = empty($_GET['id']) ? 0 : (int) $_GET['id'];
        if ($this->internship_feedback_model->delFeedback($this->id)) {
            $ret = array(
                'statusCode' => '200',
                'message' => '删除成功',
                'rel' =>  'internship_feedback_list',
            );
        } else {
            $ret = array(
                'statusCode' => '300',
                'message' => '删除失败',
                'rel' =>  'internship_feedback_list',
            );
        }
        echo json_encode($ret);
    }
}
