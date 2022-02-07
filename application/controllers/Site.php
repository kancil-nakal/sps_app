<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Site extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        // $this->load->model('M_site');
        // check_role_danru();
    }

    public function index()
    {
        $data = [
            'title' => 'Site',
            'sites' => $this->M_site->getGmsStatusSite()->result_array(),
        ];
        $this->template->load('templates/template', 'sites/site_data', $data);
    }
}
