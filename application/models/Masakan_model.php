<?php

class Masakan_model  extends CI_Model
{
    public function tambah_masakan()
    {
        $upload_image = $_FILES['gambar']['name'];
        if($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/img';

            $this->load->library('upload', $config);
            if($this->upload->do_upload('gambar')) {
                echo $gambar = $this->upload->data('file_name');
            } else {
                echo $this->upload->display_errors();
            }
        }

        $data = [
            'nama_masakan' => $this->input->post('nama_masakan', true),
            'harga' => $this->input->post('harga', true),
            'stok' => $this->input->post('stok', true),
            'gambar' => $gambar,
            'kategori' => $this->input->post('kategori', true),
            'deskripsi' => $this->input->post('deskripsi', true)

        ];
        $this->db->insert('masakan', $data);
    }

    public function edit_masakan()
    {
        $gambarlama = $this->input->post('gambarlama');
        $upload_image = $_FILES['gambar']['name'];
        if($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/img';

            $this->load->library('upload', $config);
            if($this->upload->do_upload('gambar')) {
                unlink(FCPATH . 'assets/img/' . $gambarlama);
                $gambarbaru = $this->upload->data('file_name');
                $this->db->set('gambar', $gambarbaru);
                echo "berhasil";
            } else {
                echo $this->upload->display_errors();
                echo "error";
            }
        } else {
            echo "tidak ada gambar";
        }

        $this->db->set('nama_masakan', $this->input->post('nama_masakan', true));
        $this->db->set('harga', $this->input->post('harga', true));
        $this->db->set('stok', $this->input->post('stok', true));
        $this->db->set('kategori', $this->input->post('kategori', true));
        $this->db->set('deskripsi', $this->input->post('deskripsi', true));
        $this->db->where('id_masakan', $this->input->post('id'));
        $this->db->update('masakan');
    }

    public function getAllMasakan()
    {
        return $this->db->get('masakan')->result_array();
    }
    public function getAllMeja()
    {
        return $this->db->get_where('meja', ['status' => 1])->result_array();
    }
    public function getById()
    {
        return $this->db->get_where('masakan', ['id_masakan' =>  $this->uri->segment(3)])->row_array();
    }
    public function getByMasakan($id)
    {
        return $this->db->get_where('masakan', ['id_masakan' => $id ])->row_array();
    }
    public function getByStatus()
    {
        return $this->db->get_where('meja', ['status' => 1 ])->num_rows();
    }
    public function getByStatusOrder()
    {
        $this->db->select('*');    
        $this->db->from('order')->where('status_order', 2);
        $this->db->join('masakan', 'order.id_masakan = masakan.id_masakan');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getByStatusKasir()
    {
        $this->db->select('*');    
        $this->db->from('order')->where('status_order', 1);
        $this->db->join('masakan', 'order.id_masakan = masakan.id_masakan');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getByNama()
    {
        return $this->db->get_where('masakan', ['nama_masakan' => str_replace("-", " ", $this->uri->segment(3))])->row_array();
    }
    public function hapus_masakan()
    {
        $data = $this->db->get_where('masakan', ['id_masakan' => $this->uri->segment(3)])->row_array();
        $gambarlama = $data['gambar'];
        unlink(FCPATH . 'assets/img/' . $gambarlama);
        $this->db->delete('masakan', ['id_masakan' => $this->uri->segment(3)]);
    }
    public function getFavorit()
    {
        return $this->db->get_where('masakan', ['kategori' => 'favorit'])->result_array();
    }
    public function getBiasa()
    {
        return $this->db->get_where('masakan', ['kategori' => 'biasa'])->result_array();
    }
    public function tambah_order()
    {
        $data = [
            'no_meja' => $this->input->post('no_meja'),
            'id_masakan' => $this->input->post('id_masakan'),
            'tanggal' => time(),
            'id_user' => $this->input->post('id_user'),
            'jumlah' => $this->input->post('jumlah'),
            'keterangan' => $this->input->post('keterangan'),
            'status_order' => 2
        ];
        $this->db->insert('order', $data);
    }
    public function tambah_transaksi()
    {
        $data = [
            'id_user' => $this->input->post('id_user', true),
            'id_order' => $this->input->post('id_order', true),
            'tanggal' => time(),
            'total_bayar' => $this->input->post('total_bayar', true)
        ];
        $kembali = $this->input->post('jumlah') - $this->input->post('total_bayar');
        $this->db->insert('transaksi', $data);
        $this->db->set('status_order', 0);
        $this->db->where('id_order', $this->input->post('id_order'));
        $this->db->update('order');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Masakan Sudah di bayar Kembali Rp. ' . number_format($kembali) . '!</div>');
    }

    public function no_transaksi()
    {
        $this->db->order_by('id_transaksi', 'desc');
        $this->db->limit(1);
        $transaksi =  $this->db->get('transaksi')->row_array();
        return $transaksi['id_transaksi'];
    }
}