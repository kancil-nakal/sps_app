<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        check_client();
        $this->load->model('Activities_m');
    }

    public function activity_report()
    {
        $query = "SELECT date(ga.date_time) as tanggal, s.site, count(*) as jumlah from gms_activities ga, sites s, employees e 
        where ga.nik = e.nik and e.id_site = s.site_id 
        group by date(ga.date_time), s.site;
        ";


        $data = [
            'title' => 'Activity Report',
            'activities' => $this->db->query($query)->result(),
        ];

        $this->template->load('templates/template', 'reports/activity_report/activity_data.php', $data);
    }

    public function activity_export_pdf()
    {
        $this->load->library('dompdf_gen');

        $data['activities'] = $this->Activities_m->get()->result();
        $this->template->load('templates/template', 'reports/activity_report/activity_export.php', $data);

        $paper_size = 'A4';
        $orientation = 'potrait';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream('Activity Report -' . date('Y-m-d_H:i:s') . '.pdf', array('Attachment' => 0));
    }

    public function incident_report()
    {
        $query = "SELECT gar.*, s.site as site , e.name as name from gms_accident_report gar ,sites s, employees e 
        WHERE gar.nikreporter = e.nik and gar.idsite =s.site_id ;        
        ";


        $data = [
            'title' => 'Activity Report',
            'incidents' => $this->db->query($query)->result(),
        ];

        $this->template->load('templates/template', 'reports/incident_report/incident_data.php', $data);
    }
}
