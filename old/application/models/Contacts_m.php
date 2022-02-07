<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contacts_m extends CI_Model {

	public function get($id = null)
	{
        $this->db->select('gms_emergency_contact.*,sites.site as site');
        $this->db->from('gms_emergency_contact');
        $this->db->join('sites', 'sites.site_id = gms_emergency_contact.siteid', 'left');
        if($id != null) {
            $this->db->where('emergency_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add_contact()
    {
        $data = [
            'siteid' => $this->input->post('siteid'),
            'name' => $this->input->post('namecontact'),
            'phone' => $this->input->post('phone'),
            'service' => $this->input->post('service'),
            'address' => $this->input->post('address'),
            'maps' => $this->input->post('maps'),
        ];
        $this->db->insert('gms_emergency_contact', $data);
        
    }

    public function del_contact($id)
    {
        $this->db->where('emergency_id', $id);
        $this->db->delete('gms_emergency_contact');
    }

  
}
