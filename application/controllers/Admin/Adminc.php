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
		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/dashboard');
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

}