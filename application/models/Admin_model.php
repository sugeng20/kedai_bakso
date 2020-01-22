<?php

class Admin_model extends CI_Model
{
    public function getLevel()
    {
        return $this->db->get('level')->result_array();
    }

    public function getAllUser()
    {
        return $this->db->get('user')->result_array();
    }
    public function getUser($username)
    {
        return $this->db->get_where('user', ['username' => $username])->row_array();
    }
    public function history()
    {
        $this->db->select('*');    
        $this->db->from('transaksi');
        $this->db->join('user', 'transaksi.id_user = user.id_user');
        return $this->db->get()->result_array();
    }
    public function detail_history($id_transaksi)
    {
        $this->db->select('*');    
        $this->db->from('transaksi');
        $this->db->join('user', 'transaksi.id_user = user.id_user');
        $this->db->join('detail_transaksi', 'transaksi.id_transaksi = detail_transaksi.id_transaksi');
        $this->db->join('masakan', 'detail_transaksi.id_masakan = masakan.id_masakan');
        $this->db->where('transaksi.id_transaksi', $id_transaksi);
        $query = $this->db->get();
        return $query->result_array();
    }
}