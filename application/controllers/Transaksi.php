<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller
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
        $data['no_transaksi'] = $this->Masakan_model->no_transaksi();
        $data['user'] = $this->Admin_model->getUser($this->session->userdata('username'));
        $data['title'] = 'Transaksi';
        $data['masakan'] = $this->Masakan_model->getAllMasakan();
        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar');
        $this->load->view('templates/admin/topbar');
        $this->load->view('transaksi/index', $data);
        $this->load->view('templates/admin/footer');
    }
    
    public function getMasakan()
    {
        echo json_encode($this->Masakan_model->getByMasakan($_POST['id']));
    }

    public function tambah_transaksi()
    {
        $id_user = $this->input->post('id_user');
        $data = [
            "id_user" => $id_user
        ];
        $this->db->insert('transaksi', $data);
        echo $this->Masakan_model->no_transaksi();
       
    }

    public function batal_transaksi()
    {
        $id_transaksi = $this->input->post('id_transaksi');
        $this->db->delete('detail_transaksi', ['id_transaksi' => $id_transaksi]);
    }

    public function bayar_transaksi()
    {
        $id_user = $this->input->post('id_user');
        $id_transaksi = $this->input->post('id_transaksi');
        $total_bayar = $this->input->post('total_bayar');
        $data = [
            "id_user" => $id_user,
            "tanggal" => date('Y-m-d'),
            "total_bayar" => $total_bayar
        ];
        $this->db->insert('transaksi', $data);
    }

    public function tambah_menu()
    {
        $id_transaksi = $this->input->post('id_transaksi');
        $id_masakan = $this->input->post('id_masakan');
        $jumlah_pesan = $this->input->post('jumlah_pesan');
        $total = $this->input->post('total');
        
    
        $data = [
            "id_transaksi" => $id_transaksi,
            "id_masakan" => $id_masakan,
            "qty" => $jumlah_pesan,
            "total" => $total
        ];

        $this->db->insert('detail_transaksi', $data);
    }

    public function history()
    {
        $data['title'] = 'History';
        $data['history'] = $this->Admin_model->history();
        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar');
        $this->load->view('templates/admin/topbar', $data);
        $this->load->view('admin/history');
        $this->load->view('templates/admin/footer');
    }

    public function detail_history($id_transaksi)
    {
        $data['title'] = 'Detail History';
        $data['history'] = $this->Admin_model->detail_history($id_transaksi);
        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar');
        $this->load->view('templates/admin/topbar', $data);
        $this->load->view('admin/detail_history');
        $this->load->view('templates/admin/footer');
    }

    public function cetakpdf($id)
    {
        $this->load->library('pdf');
        $pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,7,'NOTA PEMBELIAN TRANSAKSI',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(10,6,'Id',1,0);
        $pdf->Cell(27,6,'Nama Kasir',1,0);
        $pdf->Cell(35,6,'Tanggal',1,0);
        $pdf->Cell(35,6,'Nama Masakan',1,0);
        $pdf->Cell(35,6,'Harga Satuan',1,0);
        $pdf->Cell(35,6,'Qty',1,0);
        $pdf->Cell(35,6,'Total',1,1);
        $pdf->SetFont('Arial','',10);
        $this->db->select('*');    
        $this->db->from('transaksi');
        $this->db->join('user', 'transaksi.id_user = user.id_user');
        $this->db->join('detail_transaksi', 'transaksi.id_transaksi = detail_transaksi.id_transaksi');
        $this->db->join('masakan', 'detail_transaksi.id_masakan = masakan.id_masakan');
        $this->db->where('transaksi.id_transaksi', $id);
        $query = $this->db->get();
        $transaksi = $query->result();
        foreach ($transaksi as $row){
            $pdf->Cell(10,6,$row->id_transaksi,1,0);
            $pdf->Cell(27,6,$row->nama_user,1,0);
            $pdf->Cell(35,6,$row->tanggal,1,0);
            $pdf->Cell(35,6,$row->nama_masakan,1,0);
            $pdf->Cell(35,6,'Rp. '.number_format($row->harga),1,0);
            $pdf->Cell(35,6,$row->qty,1,0);
            $pdf->Cell(35,6,'Rp. '.number_format($row->total),1,1);
            
            $jumlah = number_format($row->total_bayar);
        }
        $pdf->Cell(177,6,'Total Bayar',1,0);
        $pdf->Cell(35,6,'Rp. '.$jumlah,1,0);
        $pdf->Output();
    }

    public function print()
    {
        $this->load->view('print');
    }


}