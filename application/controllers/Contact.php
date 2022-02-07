<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        check_role();
        // check_role_danru();
    }

    public function index()
    {
        $contacts = $this->db->query("select  *  from gms_emergency_contact gec , sites s WHERE gec.siteid = s.site_id  ;")->result_array();
        $data = [
            'title' => 'Contact',
            'contacts' => $contacts
        ];
        $this->template->load('templates/template', 'contacts/contact_data', $data);
    }
}
