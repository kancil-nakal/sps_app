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
		$data = [
			'title' => 'Dashboard',
		];
		$this->template->load('templates/template', 'dashboard', $data);
	}
}
