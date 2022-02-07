<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tags_m extends CI_Model
{

  public function get_checkpoint_tag($id = null)
  {
    $this->db->select('gms_nfc_tags.*, sites.site as site');
    $this->db->from('gms_nfc_tags');
    $this->db->join('sites', 'sites.site_id=gms_nfc_tags.idsite', 'left');
    if ($id != null) {
      $this->db->where('gms_nfc_tags.nfcid', $id);
    }
    $query = $this->db->get();
    return $query;
  }

  public function get_id_checkpoint_tag($id)
  {
    $query = $this->db->get_where('gms_nfc_tags', ['nfcid' => $id])->row_array();
    return $query;
  }

  public function add_checkpoint_tag()
  {
    $data = [
      'idsite' => $this->input->post('siteid', true),
      'tagid' => $this->input->post('tagid', true),
      'label' => $this->input->post('label', true),
      'location' => $this->input->post('location', true),
      'is_active' => $this->input->post('status', true),
    ];
    $this->db->insert('gms_nfc_tags', $data);
  }

  public function edit_checkpoint_tag()
  {
    $data = [
      'location' => $this->input->post('location', true),
      'is_active' => $this->input->post('status', true),
      'updated_at' => date('Y-m-h h:i:s'),
    ];
    $this->db->where('nfcid', $this->input->post('nfcid'));
    $this->db->update('gms_nfc_tags', $data);
  }

  public function del_checkpoint_tag($id)
  {
    $this->db->where('nfcid', $id);
    $this->db->delete('gms_nfc_tags');
  }

  public function get_attendance_tag($id = null)
  {
    $this->db->select('*');
    $this->db->from('sites');
    $this->db->where('id_service', 1);
    if ($id != null) {
      $this->db->where('site_id', $id);
    }
    // $this->db->order_by('gms_status', 'desc');
    $query = $this->db->get();
    return $query;
  }

  public function edit_attendance_tag()
  {
    $data = [
      'nfcid' => $this->input->post('nfcid', true),
      'gms_status' => $this->input->post('status', true),
    ];
    $this->db->where('site_id', $this->input->post('site_id'));
    $this->db->update('sites', $data);
  }
}
