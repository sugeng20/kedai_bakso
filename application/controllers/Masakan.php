<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masakan extends CI_Controller
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
        $data['title'] = 'Masakan';
        $data['masakan'] = $this->Masakan_model->getAllMasakan();
        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar');
        $this->load->view('templates/admin/topbar');
        $this->load->view('masakan/index_masakan', $data);
        $this->load->view('templates/admin/footer');
    }

    public function tambah_masakan()
    {
        $this->form_validation->set_rules('nama_masakan', 'Nama Masakan', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
        $this->form_validation->set_rules('deskripsi', 'Harga', 'required');

        if($this->form_validation->run() == FALSE) {
            $data['title'] = 'Tambah Masakan';
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar');
            $this->load->view('templates/admin/topbar');
            $this->load->view('masakan/tambah_masakan');
            $this->load->view('templates/admin/footer'); 
        } else {
            $this->Masakan_model->tambah_masakan();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Masakan Baru Saja Berhasil Di Tambahkan!</div>');
            redirect('masakan/index');
        }
    }

    public function edit_masakan()
    {
        $this->form_validation->set_rules('nama_masakan', 'Nama Masakan', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
        $this->form_validation->set_rules('deskripsi', 'Harga', 'required');
        $this->form_validation->set_rules('stok', 'Stok', 'required');
    

        if($this->form_validation->run() == FALSE) {
            $data['title'] = 'Edit Masakan';
            $data['masakan'] = $this->Masakan_model->getById();
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar');
            $this->load->view('templates/admin/topbar');
            $this->load->view('masakan/edit_masakan', $data);
            $this->load->view('templates/admin/footer'); 
        } else {
            $this->Masakan_model->edit_masakan();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Masakan Baru Saja Berhasil Di Update!</div>');
            redirect('masakan/index');
        }
    }

    public function hapus_masakan()
    {
        $this->Masakan_model->hapus_masakan();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Masakan Baru Saja Berhasil Di dihapus!</div>');
        redirect('masakan/index');
    }

    public function order()
    {
        $data['favorit'] = $this->Masakan_model->getFavorit();
        $data['biasa'] = $this->Masakan_model->getBiasa();
        $this->load->view('templates/masakan/header_masakan');
        $this->load->view('masakan/order_masakan', $data);
        $this->load->view('templates/masakan/footer_masakan');
    }
    public function list_order()
    {
        $data['order'] = $this->Masakan_model->getByStatusOrder();
            $data['title'] = "List";
        $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar');
            $this->load->view('templates/admin/topbar');
            $this->load->view('masakan/list_order', $data);
            $this->load->view('templates/admin/footer');
    }
    public function kasir()
    {
        $this->form_validation->set_rules('jumlah', 'Jumlah Pembayaran', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = "Kasir";
            $data['order'] = $this->Masakan_model->getByStatuskasir();
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar');
            $this->load->view('templates/admin/topbar');
            $this->load->view('masakan/kasir', $data);
            $this->load->view('templates/admin/footer');
        } else {
            $this->Masakan_model->tambah_transaksi();
            redirect('masakan/kasir');
        }
}
    public function update_order()
    {
        $this->db->set('status_order', 1);
        $this->db->where('id_order', $this->input->post('id_order'));
        $this->db->update('order');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Masakan Sudah Selesai Harap Hubungi Kasir!</div>');
        redirect('masakan/list_order');
    }
    public function cart()
    {

        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');

        if($this->form_validation->run() == FALSE) {
            $data['masakan'] = $this->Masakan_model->getByNama();
            $data['meja']    = $this->Masakan_model->getAllMeja();
            $data['status']  = $this->Masakan_model->getByStatus();
            $data['user']    = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $this->load->view('templates/masakan/header_masakan');
            $this->load->view('masakan/cart_masakan', $data);
            $this->load->view('templates/masakan/footer_masakan');
        } else {
            $this->Masakan_model->tambah_order(); 
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Order Baru Saja Berhasil ditambahkan!</div>');
            redirect('masakan/list_order');
        }
    }

    public function meja()
    {
            $this->form_validation->set_rules('no_meja', 'No Meja', 'required');
            if($this->form_validation->run() == FALSE) {
                $data['title'] = "Meja";
                $data['meja'] = $this->db->get('meja')->result_array();
                $this->load->view('templates/admin/header', $data);
                $this->load->view('templates/admin/sidebar');
                $this->load->view('templates/admin/topbar');
                $this->load->view('masakan/meja', $data);
                $this->load->view('templates/admin/footer');
            } else {
                $data = [
                    'no_meja' => $this->input->post('no_meja'),
                    'status' => 1
                ];
                $this->db->insert('meja', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Meja Baru Saja Berhasil ditambahkan!</div>');
                redirect('masakan/meja');
            }
            
    }

        
}