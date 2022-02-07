<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function index()
    {
        if ($this->session->userdata('email')) {
            // $user = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
            // $role = $this->db->get_where('roles', ['role_id' => $user['id_role']])->row('role');
            // redirect($role);
            redirect('dashboard');
        }
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/login');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('admin_users', ['email' => $email])->row_array();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'email' => $user['email'],
                    'id_role' => $user['id_role'],
                    'id_area' => $user['id_area'],
                    'id_site' => $user['id_site'],
                    'name' => $user['name']
                ];
                $this->session->set_userdata($data);
                // redirect('dashboard');
                if ($user['id_role'] == 1) {
                    // redirect('admin');
                    redirect('auth/blocked');
                } elseif ($user['id_role'] == 2) {
                    // redirect('hrd');
                    redirect('Dashboard');
                } elseif ($user['id_role'] == 3) {
                    // redirect('employee');
                    redirect('auth/blocked');
                } elseif ($user['id_role'] == 4) {
                    // client
                    redirect('checkpoint');
                } elseif ($user['id_role'] == 5) {
                    // redirect('operation');
                    redirect('auth/blocked');
                } elseif ($user['id_role'] == 6) {
                    //admin
                    redirect('Dashboard');
                } elseif ($user['id_role'] == 7) {
                    //ops
                    redirect('Dashboard');
                } elseif ($user['id_role'] == 8) {
                    //danru
                    redirect('Dashboard');
                } else {
                    // redirect('client');
                    redirect('auth/blocked');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Password salah!
                    </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Email tidak terdaftar!
                    </div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Done!</strong> Anda telah keluar!</div>');
        redirect('auth');
    }

    public function blocked()
    {
        if ($_SESSION['id_role'] == 6 || $_SESSION['id_role'] == 2) {
            redirect('dashboard');
        } else {
            echo 'access blocked! Hak akses pengguna dibatasi!';
        }
    }
}
