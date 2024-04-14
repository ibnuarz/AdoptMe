<?php

class Muser extends CI_Model{
    public function insertUser($data) {
        $this->db->insert('user', $data);
    }

    public function getUserByUsername($username) {
        $this->db->where('Username', $username);
        $query = $this->db->get('user');
        return $query->row();
    }

    public function getAllAnimalByType($jenis) {
        $this->db->select('animal.AnimalID, animal.Animalname, animal.Age, animal.Deskripsi, animal.Status, ras.RasID, ras.Namaras, user.UserID, user.Namalengkap');
        $this->db->from('animal');
        $this->db->join('ras', 'animal.RasID = ras.RasID');
        $this->db->join('user', 'animal.UserID = user.UserID');
        $this->db->where('ras.Jenis', $jenis); 
        $this->db->where('animal.Status', 1); 
        $query = $this->db->get();
        return $query->result();         
    }

    public function getAnimalImages($animalID) {
        $this->db->select('GambarID, NamaGambar');
        $this->db->where('AnimalID', $animalID);
        $query = $this->db->get('gambar_animal');
        return $query->result();
    }

    public function getAllRas() {
        $query = $this->db->get('ras');
        return $query->result();
    }

    public function getAllUser() {
        $query = $this->db->get('user');
        return $query->result();
    }

    public function inputAdopsi($animalID, $userID) {
        $data = array(
            'UserID' => $userID,
            'AnimalID' => $animalID,
            'Adoptiondate' => date('Y-m-d'),
            'Status' => 1,
            'Keteranganstatus' => 'Proses Verifikasi Oleh Admin'
        );
        $this->db->insert('adopsi', $data);
        $this->db->where('AnimalID', $animalID);
        $this->db->update('animal', array('Status' => 3));
    }
    
    public function countAllAnimals() {
        return $this->db->count_all('animal');
    }

    public function getAllAnimalsWithImages($limit, $start) {
        $this->db->select('animal.AnimalID, animal.Animalname, animal.Age, animal.Deskripsi, animal.Status, ras.RasID, ras.Namaras, user.UserID, user.Namalengkap');
        $this->db->from('animal');
        $this->db->join('ras', 'animal.RasID = ras.RasID');
        $this->db->join('user', 'animal.UserID = user.UserID');
        $this->db->where('animal.Status', 1);
        $this->db->order_by('RAND()');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        $animals = $query->result();
    
        foreach ($animals as $animal) {
            $animal->images = $this->getAnimalImages($animal->AnimalID);
        }
        return $animals;
    }

    

    public function getRiwayatAdopsiByUserID($userID)
    {
        $this->db->select('adopsi.AdoptionID, adopsi.Adoptiondate, adopsi.Status, adopsi.Keteranganstatus, animal.Animalname, animal.Age, animal.Deskripsi, ras.Jenis, ras.Namaras');
        $this->db->from('adopsi');
        $this->db->join('animal', 'adopsi.AnimalID = animal.AnimalID');
        $this->db->join('ras', 'animal.RasID = ras.RasID');
        $this->db->where('adopsi.UserID', $userID);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function countLaporanByAdoptionID($adoption_id)
    {
        $this->db->where('AdoptionID', $adoption_id);
        $this->db->from('laporan_adopsi');
        return $this->db->count_all_results();
    }
    
    public function inputLaporan($data)
    {
        $this->db->insert('laporan_adopsi', $data);
    }
    
    public function inputLaporanUser($data) {
        $this->db->insert('laporan_user', $data);
    }

    public function updateUserProfile($username, $data) {
        $this->db->where('Username', $username);
        $this->db->update('user', $data);
    }

    public function getRasById($rasID) {
        $this->db->where('RasID', $rasID);
        $query = $this->db->get('ras');
        return $query->result();
    }

    public function getAllAnimalByUser() {
        $userID = $this->session->userdata('UserID');
        $this->db->select('animal.AnimalID, animal.Animalname, animal.Age, animal.Deskripsi, animal.Status, ras.RasID, ras.Namaras, user.UserID, user.Namalengkap');
        $this->db->from('animal');
        $this->db->join('ras', 'animal.RasID = ras.RasID');
        $this->db->join('user', 'animal.UserID = user.UserID');
        $this->db->where('animal.UserID', $userID);
        $query = $this->db->get();
        return $query->result();        
    }
    
    public function getAnimalImagesUser($animalID) {
        $this->db->select('GambarID, NamaGambar');
        $this->db->where('AnimalID', $animalID);
        $query = $this->db->get('gambar_animal');
        return $query->result();
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

    public function insertAnimalImage($data) {
        return $this->db->insert('gambar_animal', $data);
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

    public function searchAnimals($keyword) {
        $this->db->select('animal.AnimalID, animal.Animalname, animal.Age, animal.Deskripsi, animal.Status, ras.RasID, ras.Namaras, ras.Jenis, user.UserID, user.Namalengkap');
        $this->db->from('animal');
        $this->db->join('ras', 'animal.RasID = ras.RasID');
        $this->db->join('user', 'animal.UserID = user.UserID');
        $this->db->where("(animal.AnimalID LIKE '%$keyword%' OR animal.Animalname LIKE '%$keyword%' OR animal.Age LIKE '%$keyword%' OR animal.Deskripsi LIKE '%$keyword%' OR ras.RasID LIKE '%$keyword%' OR ras.Namaras LIKE '%$keyword%' OR ras.Jenis LIKE '%$keyword%')");
        $this->db->where('animal.Status', 1); 
        $query = $this->db->get();
        $animals = $query->result();
        
        foreach ($animals as $animal) {
            $animal->images = $this->getAnimalImages($animal->AnimalID);
        }
        return $animals;
    }
}