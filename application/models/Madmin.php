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
    
    public function getAllAnimal() {
        $this->db->select('animal.AnimalID, animal.Animalname, animal.Age, animal.Deskripsi, animal.Status, ras.RasID, ras.Namaras');
        $this->db->from('animal');
        $this->db->join('ras', 'animal.RasID = ras.RasID');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function getAnimalImages($animalID) {
        $this->db->select('GambarID, NamaGambar');
        $this->db->where('AnimalID', $animalID);
        $query = $this->db->get('gambar_animal');
        return $query->result();
    }
    
    public function deleteAnimal($id) {
        $this->db->where('AnimalID', $id);
        $gambar = $this->db->get('gambar_animal')->result();
        foreach ($gambar as $g) {
            $file_path = './assets/img/post/' . $g->NamaGambar;
            if (file_exists($file_path)) {
                unlink($file_path);
            }
        }
        $this->db->where('AnimalID', $id);
        $this->db->delete('gambar_animal');

        $this->db->where('AnimalID', $id);
        $this->db->delete('animal');
    }
    
    public function insertAnimal($data) {
        $this->db->insert('animal', $data);
        return $this->db->insert_id();
    }
    
    public function insertAnimalImage($data) {
        return $this->db->insert('gambar_animal', $data);
    }
        
    public function editAnimal($id, $data) {
        $this->db->where('AnimalID', $id);
        $this->db->update('animal', $data);
    }

    public function deleteImageEdit($gambarID) {
        $gambar = $this->db->get_where('gambar_animal', array('GambarID' => $gambarID))->row();
        if ($gambar) {
            $this->db->where('GambarID', $gambarID);
            $this->db->delete('gambar_animal');
            $path = './assets/img/post/' . $gambar->NamaGambar;
            if (file_exists($path)) {
                unlink($path);
            }
        }
    }
    
    public function getRasByJenis($jenis) {
        $this->db->where('Jenis', $jenis);
        return $this->db->get('ras')->result_array();
    }

    public function getAllAdoptionsWithImages() {
        $this->db->select('adopsi.*, animal.Animalname, animal.Age, animal.RasID, ras.Namaras, gambar_animal.NamaGambar, user.UserId, user.Namalengkap, user.Email, user.Nomortlp');
        $this->db->from('adopsi');
        $this->db->join('animal', 'animal.AnimalID = adopsi.AnimalID');
        $this->db->join('ras', 'animal.RasID = ras.RasID');
        $this->db->join('gambar_animal', 'gambar_animal.AnimalID = adopsi.AnimalID', 'left');
        $this->db->join('user', 'user.UserId = adopsi.UserID');
        return $this->db->get()->result();
    }
    
    public function deleteAdopsi($id) {
        $animalID = $this->db->select('AnimalID')->where('AdoptionID', $id)->get('adopsi')->row()->AnimalID;
        $this->db->where('AnimalID', $animalID);
        $this->db->update('animal', array('Status' => 1));
        $this->db->where('AdoptionID', $id);
        $this->db->delete('adopsi');
    }

    public function insertAdopsi($data) {
        $this->db->insert('adopsi', $data);
        return $this->db->insert_id();
    }

    public function updateAnimalStatus($animalID, $status) {
        $this->db->where('AnimalID', $animalID);
        $this->db->update('animal', array('Status' => $status));
    }

    public function updateAdopsi($id, $data) {
        $this->db->where('AdoptionID', $id);
        $this->db->update('adopsi', $data);
    }

    public function getAdoptionById($id) {
        return $this->db->get_where('adopsi', array('AdoptionID' => $id))->row();
    }
}