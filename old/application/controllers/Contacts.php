<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contacts extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        check_client();
        $this->load->model('Contacts_m');
        $this->load->model('Sites_m');
    }

    public function index()
    {
        $data = [
            'title' => 'Contacts',
            'contacts' => $this->Contacts_m->get()->result()
        ];
        $this->template->load('templates/template', 'contacts/contact_data.php', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Add Contacts ',
            'sites' => $this->Sites_m->get()->result()
        ];
        $this->template->load('templates/template', 'contacts/contact_add.php', $data);
        if (isset($_POST['submit'])) {
            $this->Contacts_m->add_contact();
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Congratulation! Contact saved successfuly!
                </div>');
                redirect('contacts');
            }
        }
    }

    public function del($id)
    {
        $this->Contacts_m->del_contact($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('message', '<div  class="alert alert-success" role="alert">
            Congratulation! Contact deleted successfuly!
            </div>');
            redirect('contacts');
        }
    }
}
