<?php

class Auth_model extends CI_Model
{
    public function registrasi()
    {
        $data = [
            'username' =>  htmlspecialchars($this->input->post('username', true)),
            'password' =>  password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'nama_user' => htmlspecialchars($this->input->post('nama_user', true)),
            'id_level' => htmlspecialchars($this->input->post('id_level', true))
        ];
        $this->db->insert('user', $data);
    }

    public function getUserId()
    {
        $id = $this->uri->segment(3);
        return $this->db->get_where('user', ['id_user' => $id])->row_array();
    }

    public function edit_user()
    {
       $data = [
            'username' =>  htmlspecialchars($this->input->post('username', true)),
            'nama_user' => htmlspecialchars($this->input->post('nama_user', true)),
            'id_level' => htmlspecialchars($this->input->post('id_level', true))
        ]; 
        $this->db->where('id_user', $this->input->post('id_user', true));
        $this->db->update('user', $data);
    }

    public function delete_user()
    {
        $this->db->delete('user', ['id_user' => $this->uri->segment(3)]);
    }
}