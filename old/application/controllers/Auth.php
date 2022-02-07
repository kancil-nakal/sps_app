<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Users_m');
	}

	public function index()
	{
		if ($this->session->userdata('id_user')) {
			redirect('dashboard');
		}

		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('auth/login');
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$email = $this->input->post('email', TRUE);
		$password = $this->input->post('password', TRUE);
		$users = $this->db->get_where('admin_users', ['email' => $email])->row_array();

		if (isset($_POST['submit'])) {
			if ($users) {
				if (password_verify($password, $users['password'])) {
					$data = [
						'email' => $users['email'],
						'name' => $users['name'],
						'id_role' => $users['id_role'],
						'id_user' => $users['id'],
					];
					$this->session->set_userdata($data);

					if ($users['id_role'] == 6) {
						redirect('dashboard');
					} elseif ($users['id_role'] == 7) {
						redirect('dashboard');
					} elseif ($users['id_role'] == 8) {
						redirect('dashboard');
					} else {
						$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    		Email is not registered!
                		</div>');
						redirect('auth');
					}
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Email / Password Incorrect!
                </div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				Email / Password Incorrect!
                </div>');
				redirect('auth');
			}
		}
	}

	public function logout()
	{
		$data = ['id_user', 'id_role', 'name', 'email'];
		$this->session->unset_userdata($data);
		redirect('auth');
	}
}
