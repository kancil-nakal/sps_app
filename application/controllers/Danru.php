<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Danru extends CI_Controller
{

    public function dashboard()
    {
        $data = [
            'title' => 'Dashboard',
        ];
        $this->template->load('templates/template_danru', 'danru/dashboard', $data);
    }

    public function login()
    {
        if ($this->session->userdata('email')) {
            // $user = $this->db->get_where('employee_users', ['email' => $this->session->userdata('email')])->row_array();
            // $role = $this->db->get_where('roles', ['role_id' => $user['id_role']])->row('role');
            redirect('danru/dashboard');
        }
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/login_danru');
        } else {
            $this->_login();
        }
    }
    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('employee_users', ['email' => $email])->row_array();
        if ($user) {
            $data_user = $this->db->query('select * FROM `employees` WHERE `nik` = ' . $user['nik'])->row_array();
            $data = [
                'email' => $user['email'],
                'id_role' => $user['id_role'],
                'nik' => $user['nik'],
                'name' => $data_user['name']
            ];
            $this->session->set_userdata($data);
            if (password_verify($password, $user['password'])) {
                if ($user['id_role'] == 3) {
                    redirect('danru/dashboard');
                } elseif ($user['id_role'] == 2) {
                    redirect('Dashboard');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Password salah!</div>');
                redirect('danru');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Email tidak terdaftar!</div>');
            redirect('danru');
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Done!</strong> Anda telah keluar!</div>');
        redirect('danru');
    }

    public function incident_report()
    {
        $site_id = $this->fungsi->danru_login()->id_site;
        if ($site_id == 0) {
            $sites = $this->db->get_where('sites', ['id_service' => 1])->result_array();
        } elseif ($site_id != null) {
            $sites = $this->db->get_where('sites', ['id_service' => 1, 'site_id' => $site_id])->result_array();
        }
        $data = [
            'title' => 'Incident Report',
            'sites' => $sites
        ];
        $this->template->load('templates/template_danru', 'danru/incident_report_form', $data);
    }
}
