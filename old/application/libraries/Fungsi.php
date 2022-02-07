<?php

class Fungsi
{
    protected $ci;

    function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('Users_m');
    }

    function user_login()
    {
        $id_user = $this->ci->session->userdata('id_user');
        $user_data = $this->ci->Users_m->get($id_user)->row();
        return $user_data;
    }
}
