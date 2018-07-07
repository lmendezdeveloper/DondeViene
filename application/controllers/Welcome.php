<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->model('usuario');
    }

	public function index()
	{
		$user = $this->session->userdata("user");
        if ($this->session->userdata("user")) {
			$this->load->view('header');
			$this->load->view('home');
			$this->load->view('footer');
        } else {
            $this->load->view('login'); 
        }
	}
	    
    public function signin() {
        $mail = $this->input->post('mail');
        $pass = $this->input->post('pass');
        
        $arrayUser = $this->usuario->login($mail, md5($pass));
        if (count($arrayUser) > 0) {
            $this->session->set_userdata("user", $arrayUser);
            echo json_encode(array("msg" => "1"));
        } else {
            echo json_encode(array("msg" => "0"));
        }
	}
	
	public function home() {
		$this->load->view('home');
	}
}
