<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Adminc extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('Madmin');
    }

    public function index()
	{
		$this->load->view('admin/login');
	}

    public function dashboard()
	{
        if(empty($this->session->userdata('Username'))){
			redirect('Admin/adminc');
		}
        $data['user_data'] = $this->Madmin->getAllUser();
        $data['ras_data'] = $this->Madmin->getAllras();
        $animal_data = $this->Madmin->getAllAnimal();
        foreach ($animal_data as $animal) {
            $animal->gambar = $this->Madmin->getAnimalImages($animal->AnimalID);
        }
        $data['animal_data'] = $animal_data;
        $adoption_data = $this->Madmin->getAllAdoptionsWithImages();
        $grouped_adoptions = [];
        foreach ($adoption_data as $adoption) {
            if (!isset($grouped_adoptions[$adoption->AnimalID])) {
                $grouped_adoptions[$adoption->AnimalID] = $adoption;
                $grouped_adoptions[$adoption->AnimalID]->images = [];
            }
            $grouped_adoptions[$adoption->AnimalID]->images[] = $adoption->NamaGambar;
        }
        $data['adoption_data'] = $grouped_adoptions;
        $data['teradopsi_data'] = $this->Madmin->getTotalAnimalTeradop();
		$data['belumadopsi_data'] = $this->Madmin->getTotalAnimalBTeradop();
        $data['verifadopsi_data'] = $this->Madmin->getTotalAnimalPAdop();
		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/dashboard', $data);
		$this->load->view('admin/layout/footer');
	}

    public function login(){
        $u = $this->input->post('username'); 
        $p = $this->input->post('password');
        $cek = $this->Madmin->checkAdminLogin($u);
    
        if ($cek) {
            $data_session = array(
                'Username' => $u,
                'AdminID' => $cek->AdminID,
                'Adminname' => $cek->Adminname,
                'status' => 'login'
            );
            $this->session->set_userdata($data_session);
            redirect('Admin/adminc/dashboard');
        } else {
            $this->session->set_flashdata('error', 'Username atau password salah.');
            redirect('Admin/adminc');
        }
    }

    public function logout(){
		$this->session->sess_destroy();
		redirect('Admin/adminc');
	}

    public function datauser(){
        if(empty($this->session->userdata('Username'))){
			redirect('Admin/adminc');
		}
		$data['user_data'] = $this->Madmin->getAllUser();
        $data['ras_data'] = $this->Madmin->getAllras();
        $animal_data = $this->Madmin->getAllAnimal();
        foreach ($animal_data as $animal) {
            $animal->gambar = $this->Madmin->getAnimalImages($animal->AnimalID);
        }
        $data['animal_data'] = $animal_data;
        $adoption_data = $this->Madmin->getAllAdoptionsWithImages();
        $grouped_adoptions = [];
        foreach ($adoption_data as $adoption) {
            if (!isset($grouped_adoptions[$adoption->AnimalID])) {
                $grouped_adoptions[$adoption->AnimalID] = $adoption;
                $grouped_adoptions[$adoption->AnimalID]->images = [];
            }
            $grouped_adoptions[$adoption->AnimalID]->images[] = $adoption->NamaGambar;
        }
        $data['adoption_data'] = $grouped_adoptions;
		$this->load->view('admin/layout/header');
		$this->load->view('admin/datauser',$data);
		$this->load->view('admin/layout/footer');
	}

    public function deleteuser($id){
        if(empty($this->session->userdata('Username'))){
			redirect('Admin/adminc');
		}
        $this->Madmin->deleteUser($id);
        redirect('Admin/adminc/datauser');
    }

    public function dataras(){
        if(empty($this->session->userdata('Username'))){
			redirect('Admin/adminc');
		}
		$data['user_data'] = $this->Madmin->getAllUser();
        $data['ras_data'] = $this->Madmin->getAllRas();
        $animal_data = $this->Madmin->getAllAnimal();
        foreach ($animal_data as $animal) {
            $animal->gambar = $this->Madmin->getAnimalImages($animal->AnimalID);
        }
        $data['animal_data'] = $animal_data;
        $adoption_data = $this->Madmin->getAllAdoptionsWithImages();
        $grouped_adoptions = [];
        foreach ($adoption_data as $adoption) {
            if (!isset($grouped_adoptions[$adoption->AnimalID])) {
                $grouped_adoptions[$adoption->AnimalID] = $adoption;
                $grouped_adoptions[$adoption->AnimalID]->images = [];
            }
            $grouped_adoptions[$adoption->AnimalID]->images[] = $adoption->NamaGambar;
        }
        $data['adoption_data'] = $grouped_adoptions;
		$this->load->view('admin/layout/header');
		$this->load->view('admin/dataras',$data);
		$this->load->view('admin/layout/footer');
	}

    public function deleteras($id){
        if(empty($this->session->userdata('Username'))){
			redirect('Admin/adminc');
		}
        $this->Madmin->deleteRas($id);
        redirect('Admin/adminc/dataras');
    }

    public function addRas() {
        if(empty($this->session->userdata('Username'))){
            redirect('Admin/adminc');
        }
        if ($this->input->post()) {
            $this->form_validation->set_rules('namaras', 'Nama Ras', 'required');
            $this->form_validation->set_rules('jenis', 'Jenis', 'required');
            $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
    
            if ($this->form_validation->run() == TRUE) {
                $data = array(
                    'RasID' => $this->input->post('id'),
                    'Namaras' => $this->input->post('namaras'),
                    'Jenis' => $this->input->post('jenis'),
                    'Deskripsi' => $this->input->post('deskripsi')
                );
                $this->Madmin->insertRas($data);
                redirect('Admin/adminc/dataras');
            }
        }
    }
    
    public function editras($id) {
        if(empty($this->session->userdata('Username'))) {
            redirect('Admin/adminc');
        }
    
        if ($this->input->post()) {
            $this->form_validation->set_rules('namaras', 'Nama Ras', 'required');
            $this->form_validation->set_rules('jenis', 'Jenis', 'required');
            $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
    
            if ($this->form_validation->run() == true) {
                $data = array(
                    'Namaras' => $this->input->post('namaras'),
                    'Jenis' => $this->input->post('jenis'),
                    'Deskripsi' => $this->input->post('deskripsi')
                );
                $this->Madmin->editRas($id, $data);
                redirect('Admin/adminc/dataras');
            }
        }
    }

    public function datahewan(){
        if(empty($this->session->userdata('Username'))){
            redirect('Admin/adminc');
        }
        $data['user_data'] = $this->Madmin->getAllUser();
        $data['ras_data'] = $this->Madmin->getAllras();
        $animal_data = $this->Madmin->getAllAnimal();
        foreach ($animal_data as $animal) {
            $animal->gambar = $this->Madmin->getAnimalImages($animal->AnimalID);
        }
        $data['animal_data'] = $animal_data;
        $adoption_data = $this->Madmin->getAllAdoptionsWithImages();
        $grouped_adoptions = [];
        foreach ($adoption_data as $adoption) {
            if (!isset($grouped_adoptions[$adoption->AnimalID])) {
                $grouped_adoptions[$adoption->AnimalID] = $adoption;
                $grouped_adoptions[$adoption->AnimalID]->images = [];
            }
            $grouped_adoptions[$adoption->AnimalID]->images[] = $adoption->NamaGambar;
        }
        $data['adoption_data'] = $grouped_adoptions;
        $this->load->view('admin/layout/header');
        $this->load->view('admin/dataanimal',$data);
        $this->load->view('admin/layout/footer');
    }
    
    public function deleteanimal($id){
        if(empty($this->session->userdata('Username'))){
            redirect('Admin/adminc');
        }
        $this->Madmin->deleteAnimal($id);
        redirect('Admin/adminc/datahewan');
    }

    public function addAnimal() {
        if (empty($this->session->userdata('Username'))) {
            redirect('Admin/adminc');
        }
    
        if ($this->input->post()) {
            $this->form_validation->set_rules('animalname', 'Nama Hewan', 'required');
            $this->form_validation->set_rules('age', 'Usia', 'required|numeric');
            $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
            $this->form_validation->set_rules('status', 'Status', 'required');
            $this->form_validation->set_rules('rasID', 'Ras Hewan', 'required');
    
            if ($this->form_validation->run() == TRUE) {
                $data = array(
                    'Animalname' => $this->input->post('animalname'),
                    'Age' => $this->input->post('age'),
                    'Deskripsi' => $this->input->post('deskripsi'),
                    'Status' => $this->input->post('status'),
                    'RasID' => $this->input->post('rasID')
                );
                $animalID = $this->Madmin->insertAnimal($data);
                $gambarData = $_FILES['gambar'];
                foreach ($gambarData['name'] as $key => $gambarName) {
                    $config['upload_path'] = './Assets/img/post';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['max_size'] = 2048; 
                    $config['encrypt_name'] = TRUE;
                    $this->load->library('upload', $config);
                    $_FILES['gambar']['name'] = $gambarData['name'][$key];
                    $_FILES['gambar']['type'] = $gambarData['type'][$key];
                    $_FILES['gambar']['tmp_name'] = $gambarData['tmp_name'][$key];
                    $_FILES['gambar']['error'] = $gambarData['error'][$key];
                    $_FILES['gambar']['size'] = $gambarData['size'][$key];
    
                    if ($this->upload->do_upload('gambar')) {
                        $gambarInfo = $this->upload->data();
                        $dataGambar = array(
                            'AnimalID' => $animalID,
                            'NamaGambar' => $gambarInfo['file_name']
                        );
                        $this->Madmin->insertAnimalImage($dataGambar);
                    } else {
                        echo $this->upload->display_errors();
                    }
                }
    
                redirect('Admin/adminc/datahewan');
            }
        }
    }
  
    public function editAnimal() {
        if (empty($this->session->userdata('Username'))) {
            redirect('Admin/adminc');
        }
        if ($this->input->post()) {
            $id = $this->input->post('animalID');
            
            $this->form_validation->set_rules('animalname', 'Nama Hewan', 'required');
            $this->form_validation->set_rules('age', 'Usia', 'required|numeric');
            $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
            $this->form_validation->set_rules('status', 'Status', 'required');
            $this->form_validation->set_rules('rasID', 'Ras Hewan', 'required');
    
            if ($this->form_validation->run() == TRUE) {
                $data = array(
                    'Animalname' => $this->input->post('animalname'),
                    'Age' => $this->input->post('age'),
                    'Deskripsi' => $this->input->post('deskripsi'),
                    'Status' => $this->input->post('status'),
                    'RasID' => $this->input->post('rasID')
                );
                $this->Madmin->editAnimal($id, $data);
                
                if (!empty($_FILES['gambar']['name'][0])) {
                    $this->uploadImages($id);
                }
    
                redirect('Admin/adminc/datahewan');
            } 
            
        }
        redirect('Admin/adminc/datahewan');
    }
    
    
    
    private function uploadImages($animalID) {
        $gambarData = $_FILES['gambar'];
        foreach ($gambarData['name'] as $key => $gambarName) {
            $_FILES['upload']['name'] = $gambarData['name'][$key];
            $_FILES['upload']['type'] = $gambarData['type'][$key];
            $_FILES['upload']['tmp_name'] = $gambarData['tmp_name'][$key];
            $_FILES['upload']['error'] = $gambarData['error'][$key];
            $_FILES['upload']['size'] = $gambarData['size'][$key];
    
            $config['upload_path'] = './assets/img/post/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 2048; // 2MB
            $config['encrypt_name'] = TRUE;
    
            $this->load->library('upload', $config);
    
            if ($this->upload->do_upload('upload')) {
                $uploadData = $this->upload->data();
                $gambar = array(
                    'AnimalID' => $animalID,
                    'NamaGambar' => $uploadData['file_name']
                );
                $this->Madmin->insertAnimalImage($gambar);
            } else {
                echo $this->upload->display_errors();
            }
        }
    }

    public function deleteImage($gambarID) {
        if (empty($this->session->userdata('Username'))) {
            redirect('Admin/adminc');
        }
        $this->Madmin->deleteImageEdit($gambarID);
        redirect('Admin/adminc/editAnimal/' . $animalID);
    }

    public function getRasByJenis() {
        if ($this->input->post('jenis')) {
            $jenis = $this->input->post('jenis');
            $ras_data = $this->Madmin->getRasByJenis($jenis);
            echo json_encode($ras_data);
        }
    }
    
    public function dataadopsi() {
        if(empty($this->session->userdata('Username'))) {
            redirect('Admin/adminc');
        }
    
        $data['user_data'] = $this->Madmin->getAllUser();
        $data['ras_data'] = $this->Madmin->getAllras();
        $animal_data = $this->Madmin->getAllAnimal();
        foreach ($animal_data as $animal) {
            $animal->gambar = $this->Madmin->getAnimalImages($animal->AnimalID);
        }
        $data['animal_data'] = $animal_data;
        $adoption_data = $this->Madmin->getAllAdoptionsWithImages();
        $grouped_adoptions = [];
        foreach ($adoption_data as $adoption) {
            if (!isset($grouped_adoptions[$adoption->AnimalID])) {
                $grouped_adoptions[$adoption->AnimalID] = $adoption;
                $grouped_adoptions[$adoption->AnimalID]->images = [];
            }
            $grouped_adoptions[$adoption->AnimalID]->images[] = $adoption->NamaGambar;
        }
        $data['adoption_data'] = $grouped_adoptions;
        $this->load->view('admin/layout/header');
        $this->load->view('admin/dataadopsi', $data);
        $this->load->view('admin/layout/footer');
    }
    
    public function deleteadopsi($id){
        if(empty($this->session->userdata('Username'))){
			redirect('Admin/adminc');
		}
        $this->Madmin->deleteAdopsi($id);
        redirect('Admin/adminc/dataadopsi');
    }

    public function addAdopsi() {
        if (empty($this->session->userdata('Username'))) {
            redirect('Admin/adminc');
        }
        $data['user_data'] = $this->Madmin->getAllUser();
        $data['animal_data'] = $this->Madmin->getAllAnimal();
        $this->form_validation->set_rules('userID', 'User', 'required');
        $this->form_validation->set_rules('animalID', 'Hewan', 'required');
        $this->form_validation->set_rules('adoptionDate', 'Tanggal Adopsi', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('keteranganStatus', 'Keterangan Status', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/layout/header');
            $this->load->view('admin/dataadopsi', $data);
            $this->load->view('admin/layout/footer');
        } else {
            $data = array(
                'UserID' => $this->input->post('userID'),
                'AnimalID' => $this->input->post('animalID'),
                'AdoptionDate' => $this->input->post('adoptionDate'),
                'Status' => $this->input->post('status'),
                'KeteranganStatus' => $this->input->post('keteranganStatus')
            );
            $this->Madmin->insertAdopsi($data);
            $this->Madmin->updateAnimalStatus($this->input->post('animalID'), 3);
            redirect('Admin/adminc/dataadopsi');
        }
    }

    public function editAdopsi($id) {
        $this->form_validation->set_rules('adoptionDate', 'Tanggal Adopsi', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('keteranganStatus', 'Keterangan Status', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/layout/header');
            $this->load->view('admin/dataadopsi', $data);
            $this->load->view('admin/layout/footer');
        } else {
            $data = array(
                'AdoptionDate' => $this->input->post('adoptionDate'),
                'Status' => $this->input->post('status'),
                'KeteranganStatus' => $this->input->post('keteranganStatus')
            );
            $this->Madmin->updateAdopsi($id, $data);
            if ($data['Status'] == 2) {
                $adoption = $this->Madmin->getAdoptionById($id);
                $this->Madmin->updateAnimalStatus($adoption->AnimalID, 2);
            }
            redirect('Admin/adminc/dataadopsi');
        }
    }

    public function detectAnjing() {
        if(empty($this->session->userdata('Username'))) {
            redirect('Admin/adminc');
        }
    
        $data['user_data'] = $this->Madmin->getAllUser();
        $data['ras_data'] = $this->Madmin->getAllras();
        $animal_data = $this->Madmin->getAllAnimal();
        foreach ($animal_data as $animal) {
            $animal->gambar = $this->Madmin->getAnimalImages($animal->AnimalID);
        }
        $data['animal_data'] = $animal_data;
        $adoption_data = $this->Madmin->getAllAdoptionsWithImages();
        $grouped_adoptions = [];
        foreach ($adoption_data as $adoption) {
            if (!isset($grouped_adoptions[$adoption->AnimalID])) {
                $grouped_adoptions[$adoption->AnimalID] = $adoption;
                $grouped_adoptions[$adoption->AnimalID]->images = [];
            }
            $grouped_adoptions[$adoption->AnimalID]->images[] = $adoption->NamaGambar;
        }
        $data['adoption_data'] = $grouped_adoptions;
        $this->load->view('admin/layout/header');
        $this->load->view('admin/anjing', $data);
        $this->load->view('admin/layout/footera');
    }

    public function detectKucing() {
        if(empty($this->session->userdata('Username'))) {
            redirect('Admin/adminc');
        }
    
        $data['user_data'] = $this->Madmin->getAllUser();
        $data['ras_data'] = $this->Madmin->getAllras();
        $animal_data = $this->Madmin->getAllAnimal();
        foreach ($animal_data as $animal) {
            $animal->gambar = $this->Madmin->getAnimalImages($animal->AnimalID);
        }
        $data['animal_data'] = $animal_data;
        $adoption_data = $this->Madmin->getAllAdoptionsWithImages();
        $grouped_adoptions = [];
        foreach ($adoption_data as $adoption) {
            if (!isset($grouped_adoptions[$adoption->AnimalID])) {
                $grouped_adoptions[$adoption->AnimalID] = $adoption;
                $grouped_adoptions[$adoption->AnimalID]->images = [];
            }
            $grouped_adoptions[$adoption->AnimalID]->images[] = $adoption->NamaGambar;
        }
        $data['adoption_data'] = $grouped_adoptions;
        $this->load->view('admin/layout/header');
        $this->load->view('admin/kucing', $data);
        $this->load->view('admin/layout/footerk');
    }
    public function getRasDescription($rasID)
    {
        $description = $this->Madmin->getRasDescription($rasID);
        if ($description) {
            $response = array(
                'success' => true,
                'description' => $description
            );
        } else {
            $response = array(
                'success' => false,
                'message' => 'Deskripsi tidak ditemukan'
            );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}