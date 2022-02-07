<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tags extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        check_admin();
        check_client();
        $this->load->model('Tags_m');
        $this->load->model('Sites_m');
    }

    public function checkpoint_tags()
    {
        $data = [
            'title' => 'Checkpoint Tags',
            'tags' => $this->Tags_m->get_checkpoint_tag()->result()
        ];
        $this->template->load('templates/template', 'tags/checkpoint_tag/checkpoint_tag_data', $data);
    }

    public function checkpoint_add()
    {
        $data = [
            'title' => 'Add Checkpoint Tags',
            'sites' => $this->Sites_m->get()->result()
        ];
        $this->template->load('templates/template', 'tags/checkpoint_tag/checkpoint_tag_add', $data);
        if (isset($_POST['submit'])) {
            $this->Tags_m->add_checkpoint_tag();
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Congratulation! Checkpoint tags saved successfuly!
                </div>');
                redirect('tags/checkpoint_tags');
            }
        }
    }

    public function checkpoint_edit($id)
    {
        $data = [
            'title' => 'Edit Checkpoint Tags',
            'tags' => $this->Tags_m->get_checkpoint_tag($id)->row_array(),
        ];

        $this->template->load('templates/template', 'tags/checkpoint_tag/checkpoint_tag_edit', $data);
        if (isset($_POST['submit'])) {
            $this->Tags_m->edit_checkpoint_tag();
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Congratulation! Checkpoint tags saved successfuly!
                </div>');
                redirect('tags/checkpoint_tags');
            }
        }
    }

    public function checkpoint_del($id)
    {
        $this->Tags_m->del_checkpoint_tag($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('message', '<div  class="alert alert-success" role="alert">
            Congratulation! Checkpoint tag deleted successfuly!
            </div>');
            redirect('tags/checkpoint_tags');
        }
    }


    public function attendance_tags()
    {
        $data = [
            'title' => 'Checkpoint Tags',
            'tags' => $this->Tags_m->get_attendance_tag()->result()
        ];
        $this->template->load('templates/template', 'tags/attendance_tag/attendance_tag_data', $data);
    }

    public function attendance_edit($id)
    {
        $data = [
            'title' => 'Edit Attendance Tags',
            'tags' => $this->Tags_m->get_attendance_tag($id)->row_array(),
        ];
        $this->template->load('templates/template', 'tags/attendance_tag/attendance_tag_edit', $data);
        if (isset($_POST['submit'])) {
            $this->Tags_m->edit_attendance_tag();
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Congratulation! Checkpoint tags saved successfuly!
                </div>');
                redirect('tags/attendance_tags');
            }
        }
    }
}
