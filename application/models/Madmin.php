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
        $this->db->select('animal.AnimalID, animal.Animalname, animal.Age, animal.Deskripsi, animal.Status, ras.RasID, ras.Namaras, user.UserID, user.Namalengkap');
        $this->db->from('animal');
        $this->db->join('ras', 'animal.RasID = ras.RasID');
        $this->db->join('user', 'animal.UserID = user.UserID');
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

    public function getRasDescription($rasID)
    {
        $query = $this->db->select('Deskripsi')
            ->where('RasID', $rasID)
            ->get('ras');
        if ($query->num_rows() > 0) {
            return $query->row()->Deskripsi;
        } else {
            return NULL;
        }
    }

    public function getTotalAnimalTeradop()
    {
        $this->db->where('Status', 2);
        return $this->db->count_all_results('animal');
    }

    public function getTotalAnimalBTeradop()
    {
    $this->db->where('Status', 1);
    return $this->db->count_all_results('animal');
    }

    public function getTotalAnimalPAdop()
    {
    $this->db->where('Status', 3);
    return $this->db->count_all_results('animal');
    }

    public function getLaporanByJenis($jenis) {
        return $this->db
                    ->where('Jenislaporan', $jenis)
                    ->get('laporan_user')
                    ->result();
    }
    public function deleteLaporan($laporanID) {
            $this->db->where('LaporanID', $laporanID);
            $this->db->delete('laporan_user');
    }
    public function getLaporanByID($laporanID) {
            $query = $this->db->get_where('laporan_user', array('LaporanID' => $laporanID));
            return $query->row();
    }

    public function getLaporanByAdoptionID($adoptionID) {
        $this->db->where('AdoptionID', $adoptionID);
        $query = $this->db->get('laporan_adopsi');
        return $query->result();
    }

    public function getLaporanBulananByAdoptionID() {
        $this->db->select('laporan_adopsi.*, adopsi.AdoptionID, user.Namalengkap');
        $this->db->from('laporan_adopsi');
        $this->db->join('adopsi', 'adopsi.AdoptionID = laporan_adopsi.AdoptionID');
        $this->db->join('user', 'user.UserID = adopsi.UserID');
        $this->db->order_by('laporan_adopsi.AdoptionID', 'asc');
        $query = $this->db->get();
        $results = $query->result();
        $grouped_data = [];
        foreach ($results as $result) {
            $grouped_data[$result->AdoptionID][] = $result;
        }
        return $grouped_data;
    }
    

    public function getLaporanKendalaByAdoptionID() {
        $this->db->select('laporan_adopsi.*');
        $this->db->from('laporan_adopsi');
        $this->db->join('adopsi', 'adopsi.AdoptionID = laporan_adopsi.AdoptionID');
        $this->db->where('laporan_adopsi.Urgensi', 2);
        $query = $this->db->get();
        return $query->result();
    }

}