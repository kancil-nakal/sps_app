<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    is_logged_in();
    check_admin();
    check_client();
    $this->load->model('Users_m');
  }

  public function index()
  {
    $data = [
      'title' => 'Users',
      'admin_users' => $this->Users_m->get()->result()
    ];
    $this->template->load('templates/template', 'users/user_data', $data);
  }

  public function add()
  {
    $data = [
      'title' => 'Add Users',
      'roles' => $this->Users_m->get_roles()->result()
    ];

    $this->form_validation->set_rules('name', 'Name', 'trim|required');
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[admin_users.email]');
    $this->form_validation->set_rules('password1', 'Password', 'trim|required|matches[password2]');
    $this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required|matches[password1]');
    $this->form_validation->set_rules('role_id', 'Role', 'required');

    if ($this->form_validation->run() == false) {
      $this->template->load('templates/template', 'users/user_add', $data);
    } else {
      if (isset($_POST['submit'])) {
        $this->Users_m->add();
        if ($this->db->affected_rows() > 0) {
          $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Congratulation! Users added successfuly!
            </div>');
          redirect('users');
        }
      }
    }
  }
}
