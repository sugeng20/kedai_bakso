<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        
    }

    public function index()
    {
        $data['favorit'] = $this->Masakan_model->getFavorit();
        $data['biasa'] = $this->Masakan_model->getBiasa();
        $this->load->view('auth/index', $data);
    }

    public function login()
    {
        if($this->session->userdata('username')) {
            redirect('admin');
        }
        
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('auth/login');
        }
        else {
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['username' => $username])->row_array();

        if($user) {
            if(password_verify($password, $user['password'])) {
                $data = [
                    'username' => $user['username'],
                    'id_level' => $user['id_level']
                ];
                $this->session->set_userdata($data);
                redirect('admin');
            } else {
               $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Salah Password!</div>');
            redirect('auth/login'); 
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username Tidak Terdaftar!</div>');
            redirect('auth/login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('id_level');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda Telah Berhasil Logout!</div>');
        redirect('auth/login');
    }
}