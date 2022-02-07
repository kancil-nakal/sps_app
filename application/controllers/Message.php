<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Message extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        // check_role_danru();
    }

    public function index()
    {
        $messages = $this->db->query("select  * from gms_messages gm ,admin_users au, roles r ,sites s WHERE gm.iduser =au.id and au.id_role =r.role_id and au.id_site =s.site_id  order by gm.mid desc;")->result_array();
        $data = [
            'title' => 'Message',
            'messages' => $messages
        ];
        $this->template->load('templates/template', 'messages/message_data', $data);
    }
}
