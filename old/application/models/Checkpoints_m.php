<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Checkpoints_m extends CI_Model
{
    public function get($id = null)
    {
        $this->db->select('gms_nfc_checkpoints.*, employees.name as name, gms_nfc_tags.label as label, gms_nfc_tags.location as location, sites.site');
        $this->db->from('gms_nfc_checkpoints');
        $this->db->join('employees', 'gms_nfc_checkpoints.nik = employees.nik');
        $this->db->join('gms_nfc_tags', 'gms_nfc_checkpoints.tagid = gms_nfc_tags.tagid');
        $this->db->join('sites', 'sites.site_id = gms_nfc_tags.idsite');
        $this->db->order_by('che_id','desc');
        if ($id != null) {
            $this->db->where('nfcid', $id);
        }
        $query = $this->db->get();
        return $query;
    }
}
