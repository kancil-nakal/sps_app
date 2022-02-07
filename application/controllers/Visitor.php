<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Visitor extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        // check_role_danru();
    }

    public function index()
    {

        $site_id = $this->fungsi->user_login()->id_site;
        if ($site_id == 0) {
            $visitors = $this->db->query("select  * FROM gms_visitor_report gvr , sites s WHERE gvr.idsite = s.site_id ORDER by gvr.vid ;")->result_array();
        } elseif ($site_id != null) {
            $visitors = $this->db->query("select  * FROM gms_visitor_report gvr , sites s WHERE gvr.idsite = s.site_id and gvr.idsite = $site_id ORDER by gvr.vid ;")->result_array();
        }

        $data = [
            'title' => 'Visitor',
            'visitors' => $visitors
        ];
        $this->template->load('templates/template', 'visitors/visitor_data', $data);
    }
}
