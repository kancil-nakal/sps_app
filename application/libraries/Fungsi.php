<?php

class Fungsi
{
    protected $ci;

    function __construct()
    {
        $this->ci = &get_instance();
        // $this->ci->load->model('M_user');
    }

    function user_login()
    {
        $email = $this->ci->session->userdata('email');
        $user_data = $this->ci->db->get_where('admin_users', ['email' => $email])->row();
        return $user_data;
    }

    function danru_login()
    {
        $email = $this->ci->session->userdata('email');
        $danru_data = $this->ci->db->query("select * from employee_users eu , employees e WHERE eu.nik = e.nik and eu.email = '$email' ;")->row();
        // $danru_data = $this->ci->db->get_where('employee_users', ['email' => $email])->row();
        return $danru_data;
    }
}
