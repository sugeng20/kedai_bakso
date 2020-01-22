<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
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
        $data['title'] = 'Dashboard';
        $data['masakan'] = $this->db->get('masakan')->num_rows();
        $data['transaksi'] = $this->db->get('transaksi')->num_rows();
        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar');
        $this->load->view('templates/admin/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/admin/footer');
    }

    public function laporan()
    {
        
        $this->form_validation->set_rules('tanggal_awal', 'Tanggal Awal', 'required');
        $this->form_validation->set_rules('tanggal_akhir', 'Tanggal Akhir', 'required');

        if($this->form_validation->run() == FALSE) {
            $data['title'] = 'Laporan';
            $data['kasir'] = $this->db->get_where('user', ['id_level' => 2])->result_array();
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar');
            $this->load->view('templates/admin/topbar', $data);
            $this->load->view('admin/laporan', $data);
            $this->load->view('templates/admin/footer'); 
        } else {
        
            $this->load->library('pdf');
            $pdf = new FPDF('l','mm','A4');
            // membuat halaman baru
            $pdf->AddPage();
            // setting jenis font yang akan digunakan
            $pdf->SetFont('Arial','B',16);
            // mencetak string 
            $tanggal_awal =  $this->input->post('tanggal_awal');
            $tanggal_akhir = $this->input->post('tanggal_akhir');
            $kasir = $this->input->post('kasir');
            $pdf->Cell(190,7,'LAPORAN PENJUALAN MASAKAN',0,1,'C');
            $pdf->Cell(190,7,'Dari Tanggal ' . $tanggal_awal . ' Sampai Tanggal ' . $tanggal_akhir,0,1,'C');
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
            $this->db->where('transaksi.tanggal >=', $tanggal_awal);
            $this->db->where('transaksi.tanggal <=', $tanggal_akhir);
            
            if($kasir == "") {
                
            } else {
                $this->db->where('transaksi.id_user', $kasir);
            }
            
            $query = $this->db->get();
            $transaksi = $query->result();
            $jumlah = 0;
            foreach ($transaksi as $row){
                $pdf->Cell(10,6,$row->id_transaksi,1,0);
                $pdf->Cell(27,6,$row->nama_user,1,0);
                $pdf->Cell(35,6,$row->waktu,1,0);
                $pdf->Cell(35,6,$row->nama_masakan,1,0);
                $pdf->Cell(35,6,'Rp. '.number_format($row->harga),1,0);
                $pdf->Cell(35,6,$row->qty,1,0);
                $pdf->Cell(35,6,'Rp. '.number_format($row->total),1,1);
                
                
                $jumlah += $row->total;
               
            }
            $pdf->Cell(177,6,'Total Pendapatan',1,0);
            $pdf->Cell(35,6,'Rp. '.number_format($jumlah),1,0);
            $pdf->Output();
        }
       
    }

    public function cetak_laporan()
    {
        $this->load->library('pdf');
        $pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,7,'LAPORAN PENJUALAN MASAKAN',0,1,'C');
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
        $tanggal_awal =  $this->input->post('tanggal_awal');
        $tanggal_akhir = $this->input->post('tanggal_akhir');
        $this->db->where('transaksi.tanggal', "BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
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
        $pdf->Cell(177,6,'Total Pendapatan',1,0);
        $pdf->Cell(35,6,'Rp. '.$jumlah,1,0);
        $pdf->Output();
        // $tanggal_awal =  $this->input->post('tanggal_awal');
        // $tanggal_akhir = $this->input->post('tanggal_akhir');
        // $query = "SELECT * FROM transaksi WHERE tanggal BETWEEN '$tanggal_awal' AND '$tanggal_akhir'";
        // $transaksi = $this->db->query($query)->result_array();
        // foreach($transaksi as $tr) {
        //     $pdf->Cell(10,6,$tr['id_transaksi'],1,0);
        //     $pdf->Cell(27,6,$tr['id_user'],1,0);
        //     $pdf->Cell(35,6,$tr['tanggal'],1,0);
        //     $pdf->Cell(35,6,'',1,0);
        //     $pdf->Cell(35,6,'Rp. '.number_format($tr['total_bayar']),1,0);
        //     $pdf->Cell(35,6,'',1,0);
        //     $pdf->Cell(35,6,'Rp. '.number_format($tr['total_bayar']),1,1);
        // }
    }

    
    public function pdf()
    {
        $this->load->library('dompdf_gen');
        $data['history'] = $this->Admin_model->detail_history();

        $this->load->view('laporan_pdf', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream('laporan.pdf', ['Attachment' => 0]);
    }
}