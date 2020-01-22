<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('username')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda Harus Login Dahulu!</div>');
            redirect('auth/login');
        }
    }
    public function index()
    {
        $data['title'] = 'User';
        $data['user'] = $this->Admin_model->getAllUser();
        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar');
        $this->load->view('templates/admin/topbar', $data);
        $this->load->view('user/user', $data);
        $this->load->view('templates/admin/footer');
    }

    public function registrasi()
    {    
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|numeric|min_length[3]|max_length[6]');
        $this->form_validation->set_rules('nama_user', 'Nama User', 'required');

        if($this->form_validation->run() == FALSE)
        {
            $data['title'] = 'Registrasi';
            $data['get_level'] = $this->Admin_model->getLevel();
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar');
            $this->load->view('templates/admin/topbar');
            $this->load->view('user/registrasi', $data);
            $this->load->view('templates/admin/footer');

        } else {
            $this->Auth_model->registrasi();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! User Baru Berhasil Di Tambahkan</div>');
            redirect('user/index');
        }
    }

    public function edit_user()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('nama_user', 'Nama User', 'required');

        if($this->form_validation->run() == FALSE)
        {
            $data['title'] = 'Edit User';
            $data['get_level'] = $this->Admin_model->getLevel();
            $data['user'] = $this->Auth_model->getUserId();
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar');
            $this->load->view('templates/admin/topbar');
            $this->load->view('user/edit_user', $data);
            $this->load->view('templates/admin/footer');

        } else {
            $this->Auth_model->edit_user();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! User Berhasil Di Perbarui</div>');
            redirect('user/index');
        } 
    }

    public function delete_user()
    {
        $this->Auth_model->delete_user();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! User telah Di Hapus</div>');
        redirect('user/index');
    }
}