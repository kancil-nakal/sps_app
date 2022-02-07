<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_site extends CI_Model
{
    public function getSite()
    {
        $site_id = $this->fungsi->user_login()->id_site;
        if ($site_id == 0) {
            $query = $this->db->query("select * from sites s where id_service =1;")->result_array();
        } elseif ($site_id != null) {
            $query = $this->db->query("select * from sites s where id_service =1 and s.site_id = $site_id;")->result_array();
        }
        return $query;
    }
    public function getIdsSite()
    {
        $query = $this->db->query("select * from sites s where id_service =1 order by gms_status desc;");
        return $query;
    }
    public function getGmsStatusSite()
    {
        $query = $this->db->query("select * from sites s where id_service =1 order by gms_status desc;");
        return $query;
    }
}
