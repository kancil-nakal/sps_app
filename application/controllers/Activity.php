<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Activity extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        // check_role_danru();
        $this->load->library('Pdf_report');
    }

    public function index()
    {
        $site_id = $this->fungsi->user_login()->id_site;
        if ($site_id == 0) {
            $activities = $this->db->query("select * FROM gms_activities ga , employees e , sites s WHERE ga.nik =e.nik and e.id_site =s.site_id ORDER by ga.activityid desc;")->result_array();
        } elseif ($site_id != null) {
            $activities = $this->db->query("select * FROM gms_activities ga , employees e , sites s WHERE ga.nik =e.nik and e.id_site =s.site_id and e.id_site = $site_id ORDER by ga.activityid desc ;")->result_array();
        }
        $data = [
            'title' => 'Aktifitas',
            'activities' => $activities
        ];
        $this->template->load('templates/template', 'activities/activity_data', $data);
    }
    public function report()
    {
        $data = [
            'title' => 'Activity Report',
            'sites' => $this->M_site->getSite()
        ];
        $this->template->load('templates/template', 'activities/activity_report', $data);
    }
    public function export_pdf()
    {
        $site_id = $this->input->post('site_id', true);
        $date = $this->input->post('date', true);

        $danru = $this->db->query("select * from employees e WHERE id_site = $site_id and id_position = 2 and not nik = 2134;")->result_array();
        $activity = $this->db->query("select *, ga.date_time as jam FROM gms_activities ga, employees e WHERE ga.nik =e.nik and e.id_site = $site_id and date(ga.date_time) = '$date' ;")->result_array();
        $attendance = $this->db->query("select gna.attid ,e.name, p.`position` , gas.keterangan , gna.hours FROM gms_new_attendances gna, employees e,positions p ,gms_attendance_status gas WHERE gna.nik =e.nik and gna.att_status = gas.id and e.id_position =p.position_id and gna.id_site = $site_id and date(gna.currentdatetime) = '$date' ;")->result_array();
        $visitor = $this->db->query("select * FROM gms_visitor_report gvr WHERE idsite = $site_id  and thedate ='$date';")->row_array();
        $data = [
            'site' => $this->db->get_where('sites', ['site_id' => $site_id])->row_array(),
            'date' => $date,
            'danru' => $danru,
            'activities' => $activity,
            'attendance' => $attendance,
            'visitor' => $visitor
        ];
        $this->load->view('activities/activity_export', $data);
    }
}
