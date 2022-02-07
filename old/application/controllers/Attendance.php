<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Attendance extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Attendance_m');
    }

    function get_ajax() {
        $list = $this->Attendance_m->get_datatables();
        $data = array();
        // $no = @$_POST['start'];
        foreach ($list as $att) {
            // $no++;
            $row = array();
            $row[] = $att->name;
            $row[] = $att->site;
            $row[] = $att->tagid;
            // $row[] = $att->id_shift;
            $row[] = $att->currentdatetime ;
            $data[] = $row;
        }
        $output = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->Attendance_m->count_all(),
                    "recordsFiltered" => $this->Attendance_m->count_filtered(),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($output);
    }

    public function index()
    {
        $data = [
            'title' => 'Attendance',
            'attendances' => $this->Attendance_m->get()->result(),
        ];

        $this->template->load('templates/template', 'attendance/attendance_data.php', $data);
    }
}
