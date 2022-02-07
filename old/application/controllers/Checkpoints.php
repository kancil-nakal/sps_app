<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Checkpoints extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Checkpoints_m');
    }

    public function index()
    {
        $data = [
            'title' => 'Checkpoints',
            'checkpoints' => $this->Checkpoints_m->get()->result(),
        ];

        $this->template->load('templates/template', 'checkpoints/checkpoint_data.php', $data);
    }
}
