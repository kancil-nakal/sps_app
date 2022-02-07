<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manage_team extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_client();
        $this->load->model('Manage_team_m');
    }

    public function team_list()
    {
        $data = [
            'title' => 'Sites',
            'teams' => $this->Manage_team_m->get()->result(),
        ];
        $this->template->load('templates/template', 'manage_team/teams/team_data.php', $data);
    }
}
