<?php

class Madmin extends CI_Model{
    public function checkAdminLogin($username) {
        return $this->db->get_where('admin', array('Username' => $username))->row();
    }

    public function getAllUser() {
        $query = $this->db->get('user');
        return $query->result();
    }

    public function deleteUser($id) {
        $this->db->where('UserID', $id);
        $this->db->delete('user');
    }

    public function getAllRas() {
        $query = $this->db->get('ras');
        return $query->result();
    }

    public function deleteRas($id) {
        $this->db->where('RasID', $id);
        $this->db->delete('ras');
    }

    public function insertRas($data)
    {
    $this->db->insert('ras', $data);
    }

    public function editRas($id, $data) {
        $this->db->where('RasID', $id);
        $this->db->update('ras', $data);
    }
}