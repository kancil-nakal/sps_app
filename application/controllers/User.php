<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $users = $this->db->query("select *,r.`role` ,s.site 
        from admin_users au
        left join roles r on au.id_role =r.role_id 
        LEFT JOIN sites s on s.site_id =id_site ;")->result_array();
        $data = [
            'title' => 'Users',
            'users' => $users
        ];
        $this->template->load('templates/template', 'users/user_data', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Add Users',
            'sites' => $this->M_site->getSite()
        ];
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'email', 'trim|valid_email|required|is_unique[admin_users.email]');
        $this->form_validation->set_rules('password1', 'Password', 'trim|required|matches[password2]');
        $this->form_validation->set_rules('password2', 'Confirm Password', 'trim|required|matches[password1]');
        $this->form_validation->set_rules('role', 'Role', 'required');
        if ($this->form_validation->run() == false) {
            $this->template->load('templates/template', 'users/user_add', $data);
        } else {
            $data = [
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'id_site' => $this->input->post('site_id') != null ? $this->input->post('site_id') : 0,
                'id_role' => $this->input->post('role'),
                'id_area' => 0,
                'new' => 0,
            ];
            $this->db->insert('admin_users', $data);
            $this->session->set_flashdata('message', '<div style="opacity: .6" class="alert alert-success" role="alert">
            Selamat! User baru berhasil ditambahkan!
            </div>');
            redirect('user');
        }
    }

    public function edit($id)
    {
        $query = "select *,s.site from admin_users au left join sites s on au.id_site = s.site_id  where  au.id =$id ";
        $data = [
            'title' => 'Update Users',
            'sites' => $this->M_site->getSite(),
            'user' => $this->db->query($query)->row_array()
        ];

        $this->form_validation->set_rules('name', 'Name', 'required');
        if ($this->input->post('password1')) {
            $this->form_validation->set_rules('password1', 'Password', 'trim|matches[password2]');
        }
        if ($this->input->post('password1')) {
            $this->form_validation->set_rules('password2', 'Confirm Password', 'trim|matches[password1]');
        }

        $this->form_validation->set_rules('role', 'Role', 'required');
        if ($this->form_validation->run() == false) {
            $this->template->load('templates/template', 'users/user_edit', $data);
        } else {
            $id = $this->input->post('user_id');
            if ($this->input->post('password1')) {
                $data = [
                    'name' => $this->input->post('name'),
                    'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                    'id_role' => $this->input->post('role'),
                    'id_area' => 0,
                    'new' => 0,
                ];
            } else {
                $data = [
                    'name' => $this->input->post('name'),
                    'id_role' => $this->input->post('role'),
                    'id_area' => 0,
                    'new' => 0,
                ];
            }
            $this->db->where('id', $id);
            $this->db->update('admin_users', $data);

            $this->session->set_flashdata('message', '<div style="opacity: .6" class="alert alert-success" role="alert">
            Selamat! User berhasil diupdate!
            </div>');
            redirect('user');
        }
    }



    public function delete()
    {
        $id = $this->input->post('user_id');
        $this->db->where('id', $id);
        $this->db->delete('admin_users');
        $this->session->set_flashdata('message', '<div style="opacity: .6" class="alert alert-success" role="alert">
            Selamat! User berhasil dihapus!
            </div>');
        redirect('user');
    }
}
