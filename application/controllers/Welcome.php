<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
		$this->load->model('usuario');
		$this->load->model('chofer');
    }

	// CONTROLADOR PRINCIPAL //
    // validar index por sesiones //
	public function index()
	{
        if ($this->session->userdata("user")) {
			$this->load->view('header');
			$this->load->view('home');
			$this->load->view('footer');
        } else {
            $this->load->view('login'); 
        }
	}
	 
	// validar usuario //
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

	// cerrar sesión //
	public function logout() {
		if ($this->session->userdata("user")) {
			$this->session->sess_destroy();
			redirect('');
		} else {
			$this->load->view('login'); 
		}	
	}

	// home del main //
	public function home() {
		if ($this->session->userdata("user")) {
			$this->load->view('home');
		} else {
			$this->load->view('login'); 
		}		
	}

	// CONTROLLER CHOFERES //

	// cargar modulo chofer //
	public function modulo_choferes() {
        if ($this->session->userdata("user")) {
			$this->load->view('mantenedores/choferes');
		} else {
			$this->load->view('login'); 
		}
	}

	// listar chofer //
    public function list_choferes() {
        if ($this->session->userdata("user")) {
        	echo json_encode($this->chofer->list_choferes());
		} else {
			$this->load->view('login'); 
		}
	}

	// agregar chofer //
	public function add_choferes() {
		if ($this->session->userdata("user")) {
			$rut = $this->input->post("rut");
			$nombres = $this->input->post("nombres");
			$apellidop = $this->input->post("apellidop");
			$apellidom = $this->input->post("apellidom");
			$celular = $this->input->post("celular");
			$correo = $this->input->post("correo");
	
			if ($this->chofer->add_choferes($rut, $nombres, $apellidop, $apellidom, $celular, $correo)) {
				echo json_encode(array("msg"=>"1"));
			} else {
				echo json_encode(array("msg"=>"2"));
			}
		} else {
			$this->load->view('login'); 
		}
	}

	// editar chofer //
	public function edit_choferes() {
		if ($this->session->userdata("user")) {
			$id_chofer = $this->input->post("id_chofer");
			$nombres = $this->input->post("nombres");
			$apellidop = $this->input->post("apellidop");
			$apellidom = $this->input->post("apellidom");
			$celular = $this->input->post("celular");
			$correo = $this->input->post("correo");
	
			if ($this->chofer->edit_choferes($id_chofer, $nombres, $apellidop, $apellidom, $celular, $correo)) {
				echo json_encode(array("msg"=>"1"));
			} else {
				echo json_encode(array("msg"=>"2"));
			}
		} else {
			$this->load->view('login'); 
		}
	}

	// eliminar chofer //
	public function delete_choferes() {
		if ($this->session->userdata("user")) {
        	$id_chofer = $this->input->post("id_chofer");

			if ($this->chofer->delete_choferes($id_chofer)) {
				echo json_encode(array("msg"=>"1"));
			} else {
				echo json_encode(array("msg"=>"2"));
			}
		} else {
			$this->load->view('login'); 
		}
		
	}
}
