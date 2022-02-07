<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Attendance_m extends CI_Model
{

     // start datatables
     var $column_order = array('name', 'site', 'tagid','currentdatetime'); //set column field database for datatable orderable
     var $column_search = array('name', 'site'); //set column field database for datatable searchable
     var $order = array('att_id' => 'desc'); // default order 
  
     private function _get_datatables_query() {
        $this->db->select('gms_nfc_attendances.*, employees.name as name, sites.site as site');
        $this->db->from('gms_nfc_attendances');
        $this->db->join('employees', 'gms_nfc_attendances.nik = employees.nik');
        $this->db->join('sites', 'sites.nfcid = gms_nfc_attendances.tagid');
         $i = 0;
         foreach ($this->column_search as $att) { // loop column 
             if(@$_POST['search']['value']) { // if datatable send POST for search
                 if($i===0) { // first loop
                     $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                     $this->db->like($att, $_POST['search']['value']);
                 } else {
                     $this->db->or_like($att, $_POST['search']['value']);
                 }
                 if(count($this->column_search) - 1 == $i) //last loop
                     $this->db->group_end(); //close bracket
             }
             $i++;
         }
          
         if(isset($_POST['order'])) { // here order processing
             $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
         }  else if(isset($this->order)) {
             $order = $this->order;
             $this->db->order_by(key($order), $order[key($order)]);
         }
     }
     function get_datatables() {
         $this->_get_datatables_query();
         if(@$_POST['length'] != -1)
         $this->db->limit(@$_POST['length'], @$_POST['start']);
         $query = $this->db->get();
         return $query->result();
     }
     function count_filtered() {
         $this->_get_datatables_query();
         $query = $this->db->get();
         return $query->num_rows();
     }
     function count_all() {
         $this->db->from('gms_nfc_attendances');
         return $this->db->count_all_results();
     }
     // end datatables

     
    public function get($id = null)
    {
        $this->db->select('gms_nfc_attendances.*, employees.name as name, sites.site as site');
        $this->db->from('gms_nfc_attendances');
        $this->db->join('employees', 'gms_nfc_attendances.nik = employees.nik');
        $this->db->join('sites', 'sites.nfcid = gms_nfc_attendances.tagid');
        $this->db->order_by('att_id','desc');
        if ($id != null) {
            $this->db->where('att_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }
}
