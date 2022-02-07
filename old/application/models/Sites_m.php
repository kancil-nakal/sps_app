<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sites_m extends CI_Model {

	public function get($id = null)
	{
        $this->db->from('sites');
        if($id != null) {
            $this->db->where('site_id', $id);
        }
        $this->db->where('id_service', 1);
        $query = $this->db->get();
        return $query;
  }
  
}
