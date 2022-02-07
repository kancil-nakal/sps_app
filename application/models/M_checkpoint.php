<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_checkpoint extends CI_Model
{

    // start datatables
    var $column_order = array(null, 'currentdatetime', 'name', 'site'); //set column field database for datatable orderable
    var $column_search = array('currentdatetime', 'name', 'site'); //set column field database for datatable searchable
    var $order = array('che_id' => 'desc'); // default order

    private function _get_datatables_query()
    {
        $site_id = $this->fungsi->user_login()->id_site;
        if ($site_id == 0) {
            $this->db->select('*');
            $this->db->from('gms_nfc_checkpoints');
            $this->db->join('employees', 'gms_nfc_checkpoints.nik = employees.nik');
            $this->db->join('gms_nfc_tags', 'gms_nfc_checkpoints.tagid = gms_nfc_tags.tagid');
            $this->db->join('sites', 'gms_nfc_tags.idsite = sites.site_id');
        } elseif ($site_id != null) {
            $this->db->select('*');
            $this->db->from('gms_nfc_checkpoints');
            $this->db->join('employees', 'gms_nfc_checkpoints.nik = employees.nik');
            $this->db->join('gms_nfc_tags', 'gms_nfc_checkpoints.tagid = gms_nfc_tags.tagid');
            $this->db->join('sites', 'gms_nfc_tags.idsite = sites.site_id');
            $this->db->where('gms_nfc_tags.idsite', $site_id);
        };

        $i = 0;
        foreach ($this->column_search as $item) { // loop column
            if (@$_POST['search']['value']) { // if datatable send POST for search
                if ($i === 0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    function get_datatables()
    {
        $this->_get_datatables_query();
        if (@$_POST['length'] != -1)
            $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
    function count_all()
    {
        $this->db->from('gms_nfc_checkpoints');
        return $this->db->count_all_results();
    }
    // end datatables
}
