<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Main extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('Muser');
    }

    public function index()
	{
		$this->load->view('index');
	}
}