<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Checkpoint extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        // check_role_danru();
        $this->load->model('M_checkpoint');
        $this->load->library('Pdf_report');
    }

    function get_ajax()
    {
        $checkpoints = $this->M_checkpoint->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($checkpoints as $check) {
            $no++;
            $row = array();
            $row[] = $no . ".";

            $row[] = indo_date($check->currentdatetime);
            $row[] = indo_time($check->currentdatetime);
            $row[] = $check->name;
            $row[] = $check->site;
            $row[] = $check->location;
            $row[] = $check->isclear == 1 ? '<span class="text-success"><i class="fa fa-check"></i></span>' : '<span class="text-danger"><i class="fa fa-ban"></i></span>';
            $row[] = $check->desc;

            $data[] = $row;
        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->M_checkpoint->count_all(),
            "recordsFiltered" => $this->M_checkpoint->count_filtered(),
            "data" => $data,
        );
        // output to json format
        echo json_encode($output);
    }


    public function index()
    {
        $checkpoints = $this->db->query('select * from sites s , gms_nfc_checkpoints gnc ,employees e, gms_nfc_tags gnt WHERE gnc.nik = e.nik and gnc.tagid =gnt.tagid and gnt.idsite = s.site_id order by `desc` ;')->result_array();
        $data = [
            'title' => 'Checkpoint',
            'checkpoints' => $checkpoints,

        ];
        $this->template->load('templates/template', 'checkpoints/checkpoint_data', $data);
    }
    public function report()
    {
        $checkpoints = $this->db->query('select * from sites s , gms_nfc_checkpoints gnc ,employees e, gms_nfc_tags gnt WHERE gnc.nik = e.nik and gnc.tagid =gnt.tagid and gnt.idsite = s.site_id order by `desc` ;')->result_array();
        $data = [
            'title' => 'Checkpoint Report',
            'checkpoints' => $checkpoints,
            'sites' => $this->M_site->getSite()
        ];
        $this->template->load('templates/template', 'checkpoints/checkpoint_report', $data);
    }

    public function export_pdf()
    {
        $site_id = $this->input->post('site_id', true);
        $date = $this->input->post('date', true);
        $danru = $this->db->query("select * from employees e WHERE id_site = $site_id and id_position = 2 and not nik = 2134;")->result_array();
        $checkpoints = $this->db->query("select gnc.currentdatetime as jam ,e.name, gnt.location,gnc.isclear , gnc.`desc` from gms_nfc_checkpoints gnc ,employees e, gms_nfc_tags gnt WHERE gnc.nik =e.nik and gnc.tagid =gnt.tagid and e.id_site = $site_id and  date(gnc.currentdatetime) = '$date';")->result_array();
        $data = [
            'site' => $this->db->get_where('sites', ['site_id' => $site_id])->row_array(),
            'date' => $date,
            'danru' => $danru,
            'checkpoints' => $checkpoints
        ];
        $this->load->view('checkpoints/checkpoint_export', $data);
    }
}
