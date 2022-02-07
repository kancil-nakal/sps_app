<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users_m extends CI_Model
{

  public function get($id = null)
  {
    $this->db->from('admin_users');
    if ($id != null) {
      $this->db->where('id', $id);
      // $this->db->where('id_role', 6);
      // $this->db->or_where('id_role', 7);
    }
    // $id_role = [7, 8];
    $query = $this->db->get();
    return $query;
  }

  public function add()
  {
    $data = [
      'email' => $this->input->post('email', true),
      'name' => $this->input->post('name', true),
      'password' =>  password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
      'id_role' => $this->input->post('role_id', true),
    ];
    $this->db->insert('admin_users', $data);
  }

  public function get_roles()
  {
    $this->db->from('roles');
    $this->db->where('role_id', 6);
    $this->db->or_where('role_id', 7);
    $this->db->or_where('role_id', 8);
    $query = $this->db->get();
    return $query;
  }
}
