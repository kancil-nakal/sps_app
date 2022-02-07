<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Attendance extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        // check_role_danru();
    }

    public function index()
    {
        $site_id = $this->fungsi->user_login()->id_site;
        if ($site_id == 0) {
            $attendace = $this->db->query("select *, gas.keterangan as shift from gms_new_attendances gna ,gms_attendance_status gas ,sites s ,employees e WHERE gna.att_status =gas.id and gna.id_site =s.site_id and gna.nik = e.nik order by gna.attid desc")->result_array();
        } elseif ($site_id != null) {
            $attendace = $this->db->query("select *, gas.keterangan as shift from gms_new_attendances gna ,gms_attendance_status gas ,sites s ,employees e WHERE gna.att_status =gas.id and gna.id_site =s.site_id and gna.nik = e.nik and e.id_site = $site_id order by gna.attid desc")->result_array();
        }
        $data = [
            'title' => 'Absensi',
            'attendance' => $attendace
        ];
        $this->template->load('templates/template', 'attendances/attendance_data', $data);
    }

    public function report()
    {
        $data = [
            'title' => 'Attencande Report',
            'sites' => $this->M_site->getSite()
        ];
        $this->template->load('templates/template', 'attendances/attendance_report', $data);
    }

    public function export()
    {
        $date = $this->input->post('date');
        $site_id = $this->input->post('site_id');
        $date_range = explode(" - ", $date);
        print_r($date_range);
        die;
    }
}
