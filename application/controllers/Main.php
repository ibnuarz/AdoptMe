<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Main extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('Muser');
        $this->load->library('pagination');
    }

    public function index()
	{
		$this->load->view('user/index');
	}

    public function register()
    {
        $this->load->view('user/register');
    }

    public function login()
    {
        $this->load->view('user/login');
    }

    public function saveregisterUser()
    {
        $this->form_validation->set_rules('email', 'Email User', 'required|valid_email|is_unique[user.Email]', array(
            'is_unique' => 'Email Anda Sudah Digunakan Pengguna Lain. Silahkan Ulangi!'
        ));
        $this->form_validation->set_rules('username', 'Username User', 'required|is_unique[user.Username]', array(
            'is_unique' => 'Username Anda Sudah Digunakan Pengguna Lain. Silahkan Ulangi!'
        ));
        $this->form_validation->set_rules('passuser', 'Password User', 'required');
        $this->form_validation->set_rules('namalengkap', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('repeatpassuser', 'Ulangi Password', 'required|matches[passuser]', array(
            'matches' => 'Password yang anda ulangi tidak Cocok. Silahkan Ulangi!'
        ));
        $data['namalengkap'] = $this->input->post('namalengkap');
        $data['username'] = $this->input->post('username');
        $data['email'] = $this->input->post('email');
    
        if ($this->form_validation->run() == true) {
            $data_user = array(
                'Email' => $this->input->post('email'),
                'Namalengkap' => $this->input->post('namalengkap'),
                'Username' => $this->input->post('username'),
                'Password' => password_hash($this->input->post('passuser'), PASSWORD_DEFAULT),
            );
            $this->Muser->insertUser($data_user);
            $this->session->set_flashdata('success_message', 'Registrasi Akun berhasil! Silakan login.');
            $this->load->view('user/register');
            return;
        }
        $data['validation_error'] = validation_errors();
        $this->load->view('user/register', $data);
    }

    public function processLogin()
    {
    if ($this->input->post()) {
        $this->form_validation->set_rules('usernameuser', 'Username', 'required');
        $this->form_validation->set_rules('passuser', 'Password', 'required');
        if ($this->form_validation->run() == true) {
            $username = $this->input->post('usernameuser');
            $password = $this->input->post('passuser');
            $user = $this->Muser->getUserByUsername($username);
            if ($user) {
                if (password_verify($password, $user->Password)) {
                    $this->setUserSession($user);
                    redirect('main/dashboard');
                } else {
                    $this->session->set_flashdata('error_message', 'Password Salah!');
                }
            } else {
                $this->session->set_flashdata('error_message', 'Username tidak ditemukan!');
            }
        }
    }
    redirect('main/login');
    }

    private function setUserSession($user)
    {
    $data_session = array(
        'UserID' => $user->UserID,
        'Username' => $user->Username,
        'Namalengkap' => $user->Namalengkap,
        'Email' => $user->Email
    );
    $this->session->set_userdata($data_session);
    }

    public function logout(){
		$this->session->sess_destroy();
		redirect('main/login');
	}

    public function dashboard(){
        if(empty($this->session->userdata('Username'))) {
            redirect('main/login');        
        }
        $dogs = $this->Muser->getAllAnimalByType(1);
        $cats = $this->Muser->getAllAnimalByType(2);
        foreach ($dogs as $dog) {
            $dog->images = $this->Muser->getAnimalImages($dog->AnimalID);
        }
        foreach ($cats as $cat) {
            $cat->images = $this->Muser->getAnimalImages($cat->AnimalID);
        }
        shuffle($dogs);
        shuffle($cats);
        $data['dogs'] = array_slice($dogs, 0, 5);
        $data['cats'] = array_slice($cats, 0, 5);
        $data['ras_data'] = $this->Muser->getAllras();
        $this->load->view('user/layout/header');
        $this->load->view('user/layout/dashboard', $data);
        $this->load->view('user/layout/footer');
    }
    
    public function inputAdopsi($animalID) {
        if(empty($this->session->userdata('UserID'))) {
            redirect('main/login');        
        }
        $userID = $this->session->userdata('UserID');
        $this->Muser->inputAdopsi($animalID, $userID);
        redirect('main/dashboard');
    }

    public function inputAdopsiList($animalID) {
        if(empty($this->session->userdata('UserID'))) {
            redirect('main/login');        
        }
        $userID = $this->session->userdata('UserID');
        $this->Muser->inputAdopsi($animalID, $userID);
        redirect('main/listhewan/1');
    }

    public function listHewan($page = 1) {
        if(empty($this->session->userdata('Username'))) {
            redirect('main/login');        
        }
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        $total_rows = $this->Muser->countAllAnimals();
        $config['base_url'] = base_url('main/listhewan');
        $config['total_rows'] = $total_rows;
        $config['per_page'] = 3;
        $config['use_page_numbers'] = TRUE;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
        $start = ($page - 1) * $config['per_page'];
        $jenisHewan = $this->input->post('jenisHewan');
    
        if (!empty($jenisHewan)) {
            $data['allAnimals'] = $this->Muser->filterByJenisHewan($jenisHewan, $config['per_page'], $start);
        } else {
            $data['allAnimals'] = $this->Muser->getAllAnimalsWithImages($config['per_page'], $start);
        }

        $this->load->view('user/layout/header');
        $this->load->view('user/listhewan', $data);
        $this->load->view('user/layout/footer');
    }

    public function riwayatAdopsi()
    {
        if ($this->session->userdata('UserID')) {
            $userID = $this->session->userdata('UserID');
            $riwayat_adopsi = $this->Muser->getRiwayatAdopsiByUserID($userID);
            foreach ($riwayat_adopsi as $adopsi) {
                $adopsi->total_laporan = $this->Muser->countLaporanByAdoptionID($adopsi->AdoptionID);
            }
    
            $data['riwayat_adopsi'] = $riwayat_adopsi;
            $this->load->view('user/layout/header');
            $this->load->view('user/riwayatadopsi', $data);
            $this->load->view('user/layout/footer');
        } else {
            redirect('main/login');
        }
    }
    
    public function inputLaporanAdopsi()
    {
        if ($this->input->post()) {
            $this->form_validation->set_rules('adoption_id', 'Adoption ID', 'required');
            $this->form_validation->set_rules('tanggal_awal', 'Tanggal Awal', 'required');
            $this->form_validation->set_rules('tanggal_akhir', 'Tanggal Akhir', 'required');
            $this->form_validation->set_rules('isi', 'Isi Laporan', 'required');
            $this->form_validation->set_rules('urgensi', 'Urgensi', 'required');
    
            if ($this->form_validation->run() == true) {
                $adoption_id = $this->input->post('adoption_id');
                $tanggal_awal = $this->input->post('tanggal_awal');
                $tanggal_akhir = $this->input->post('tanggal_akhir');
                $isi = $this->input->post('isi');
                $urgensi = $this->input->post('urgensi');
    
                $total_laporan = $this->Muser->countLaporanByAdoptionID($adoption_id);
    
                if ($total_laporan <= 12) {
                    $data = array(
                        'AdoptionID' => $adoption_id,
                        'Tanggalawal' => $tanggal_awal,
                        'Tanggalakhir' => $tanggal_akhir,
                        'Isi' => $isi,
                        'Urgensi' => $urgensi
                    );
    
                    $this->Muser->inputLaporan($data);
                    $this->session->set_flashdata('success_message', 'Laporan berhasil disimpan.');
                } else {
                    $this->session->set_flashdata('error_message', 'Jumlah laporan untuk adopsi ini sudah mencapai batas maksimal.');
                }
            }
        }
        redirect('main/riwayatAdopsi');
    }
    
    public function kontakKami(){
        if(empty($this->session->userdata('Username'))) {
            redirect('main/login');        
        }
        $this->load->view('user/layout/header');
        $this->load->view('user/kontakkami');
        $this->load->view('user/layout/footer');
    }

    public function kirimLaporan() {
        $this->form_validation->set_rules('jenis_laporan', 'Jenis Laporan', 'required');
        $this->form_validation->set_rules('isi_laporan', 'Isi Laporan', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('main/kontakKami');
        } else {
            $data = array(
                'Username' => $this->session->userdata('Username'),
                'Email' => $this->session->userdata('Email'),
                'JenisLaporan' => $this->input->post('jenis_laporan'),
                'Isi' => $this->input->post('isi_laporan'),
                'TanggalLaporan' => date('Y-m-d H:i:s')
            );
            $config['upload_path'] = './assets/img/laporan/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
    
            if ($this->upload->do_upload('gambar_laporan')) {
                $upload_data = $this->upload->data();
                $data['GambarLaporan'] = $upload_data['file_name'];
                $this->Muser->inputLaporanUser($data);
                $this->session->set_flashdata('success', 'Laporan berhasil dikirim.');
                redirect('main/kontakKami');
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('main/kontakKami');
            }
        }
    }

    public function fiturCekRasAnjing(){
        if(empty($this->session->userdata('Username'))) {
            redirect('main/login');        
        }
        $this->load->view('user/layout/header');
        $this->load->view('user/fitur/anjing');
        $this->load->view('user/layout/footer');
    }

    public function fiturCekRasKucing(){
        if(empty($this->session->userdata('Username'))) {
            redirect('main/login');        
        }
        $this->load->view('user/layout/header');
        $this->load->view('user/fitur/kucing');
        $this->load->view('user/layout/footer');
    }
    
}