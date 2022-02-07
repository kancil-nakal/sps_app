<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manage_site_m extends CI_Model
{
    public function get($id = null)
    {
        $this->db->from('sites');
        $this->db->where('id_service', 1);
        $this->db->where('gms_status', 1);
        if ($id != null) {
            $this->db->where('site_id', $id);
        }
        // $this->db->order_by('gms_status', 'desc');
        $query = $this->db->get();
        return $query;
    }

    public function checkpoint_tags($id)
    {
        $this->db->select('gms_nfc_tags.*, sites.site as site');
        $this->db->from('gms_nfc_tags');
        $this->db->join('sites', 'sites.site_id = gms_nfc_tags.idsite', 'left');
        $this->db->where('site_id', $id);
        $query = $this->db->get();
        return $query;
    }

    public function site_team_list($id)
    {
        $this->db->select('employees.*, sites.site as site, sites.gms_status as gms_status, positions.position as position');
        $this->db->from('employees');
        $this->db->join('sites', 'sites.site_id =employees.id_site');
        $this->db->join('positions', 'positions.position_id =employees.id_position');
        $this->db->where('sites.id_service', 1);
        if ($id != null) {
            $this->db->where('site_id', $id);
        }
        // $this->db->order_by('gms_status', 'desc');
        $query = $this->db->get();
        return $query;
    }

    public function get_shift($id = null)
    {
        $this->db->from('gms_shift');
        if ($id != null) {
            $this->db->where('shift_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function del_shift($id)
    {

        $this->db->where('shift_id', $id);
        $this->db->delete('gms_shift');
    }
}
