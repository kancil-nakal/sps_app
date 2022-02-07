<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manage_site extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_client();
        $this->load->model('Manage_site_m');
    }

    public function sites_list()
    {
        $data = [
            'title' => 'Sites',
            'sites' => $this->Manage_site_m->get()->result(),
        ];
        $this->template->load('templates/template', 'manage_site/sites/site_data.php', $data);
    }

    public function site_checkpoint_list($id)
    {
        $data = [
            'title' => 'Sites Checkpoint List',
            'sites' => $this->Manage_site_m->get()->result(),
            'checkpoints' => $this->Manage_site_m->checkpoint_tags($id)->result()
        ];
        $this->template->load('templates/template', 'manage_site/sites/site_checkpoint_data.php', $data);
    }

    public function site_team_list($id)
    {
        $data = [
            'title' => 'Sites Team List',
            'sites' => $this->Manage_site_m->get()->result(),
            'teams' => $this->Manage_site_m->site_team_list($id)->result()
        ];
        $this->template->load('templates/template', 'manage_site/sites/site_team_data.php', $data);
    }

    public function schedule()
    {
        $data = [
            'title' => 'Improt Schedule',
            'sites' => $this->Manage_site_m->get()->result(),
        ];
    }

    public function shift()
    {
        $data = [
            'title' => 'Sites Shift List',
            'shifts' => $this->Manage_site_m->get_shift()->result(),
        ];
        $this->template->load('templates/template', 'manage_site/shifts/shift_data.php', $data);
    }

    public function shift_add()
    {
        $data = [
            'title' => 'Sites Shift List',
            'shifts' => $this->Manage_site_m->get_shift()->result(),
        ];
        $this->template->load('templates/template', 'manage_site/shifts/shift_data.php', $data);
    }

    public function shift_del($id)
    {
        $this->Manage_site_m->del_shift($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('message', '<div  class="alert alert-success" role="alert">
            Congratulation! Contact deleted successfuly!
            </div>');
            redirect('manage_team/shift');
        }
    }
}
