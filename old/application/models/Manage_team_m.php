<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manage_team_m extends CI_Model
{
    public function get($id = null)
    {
        $this->db->select('employees.*, sites.site as site, sites.gms_status as gms_status, positions.position as position');
        $this->db->from('employees');
        $this->db->join('sites', 'sites.site_id =employees.id_site');
        $this->db->join('positions', 'positions.position_id =employees.id_position');
        $this->db->where('sites.id_service', 1);
        $this->db->where('sites.gms_status', 1);
        if ($id != null) {
            $this->db->where('site_id', $id);
        }
        // $this->db->order_by('gms_status', 'desc');
        $query = $this->db->get();
        return $query;
    }
}
