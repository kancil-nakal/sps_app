<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		// check_role_danru();
	}

	public function index()
	{
		$id_site = $this->fungsi->user_login()->id_site;
		$site = $this->db->query('select COUNT(site_id) as counts from sites s WHERE id_service =1;')->row_array();
		if ($id_site != 0) {
			$manpower = $this->db->query("select COUNT(e.nik) as counts from employees e JOIN sites s on e.id_site =s.site_id WHERE s.id_service=1 and e.id_site =$id_site;")->row_array();
		} else {
			$manpower = $this->db->query("select COUNT(e.nik) as counts from employees e JOIN sites s on e.id_site =s.site_id  WHERE s.id_service =1;")->row_array();
		}
		if ($id_site != 0) {
			$tag = $this->db->query("select COUNT(nfcid) as counts FROM gms_nfc_tags gnt WHERE  is_active =1 and idsite =$id_site;")->row_array();
		} else {
			$tag = $this->db->query("select COUNT(nfcid) as counts FROM gms_nfc_tags gnt where is_active =1;")->row_array();
		}
		$data = [
			'title' => 'Dashboard',
			'site_count' => $site,
			'manpower_count' => $manpower,
			'tag_count' => $tag
		];
		$this->template->load('templates/template', 'dashboard', $data);
	}
}
