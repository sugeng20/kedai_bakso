<?php
Class Laporanpdf extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->library('pdf');
    }
    
    public function index(){
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
    }
}