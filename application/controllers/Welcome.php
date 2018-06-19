<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
		$this->load->model('usuario');
		$this->load->model('chofer');
		$this->load->model('microbus');
		$this->load->model('linea');
		$this->load->model('horario');
		$this->load->model('tarifa');
    }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('header');
		$this->load->view('welcome');
		$this->load->view('footer');
	}

	public function login()
	{
		$this->load->view('header');
		$this->load->view('login');
		$this->load->view('footer');
	}
	    
    public function signin() {
        $mail = $this->input->post('mail');
        $pass = $this->input->post('pass');
        
        $arrayUser = $this->usuario->login($mail, md5($pass));
        if (count($arrayUser) > 0) {
            //$this->session->set_userdata("user", $arrayUser);
            echo json_encode(array("msg" => "1"));
        } else {
            echo json_encode(array("msg" => "0"));
        }
	}
	
	public function home() {
		$this->load->view('header');
		$this->load->view('home');
		$this->load->view('footer');
	}

	// controller chofer //

	// cargar modulo //
	public function chofer() {
		$this->load->view('chofer');
	}

	// listar choferes //
	public function lista_choferes() {
		echo json_encode($this->chofer->lista_choferes());
	}

	// agregar choferes //
	public function agregar_chofer() {
		$rut = $this->input->post("rut");
		$nombre = $this->input->post("nombre");
		$apellidos = $this->input->post("apellidos");
		
		if($this->chofer->agregar_chofer($rut, $nombre, $apellidos)) {
			echo json_encode(array("msg"=>"Registro exitoso"));
		}else{
			echo json_encode(array("msg"=>"Error al ingresar"));    
		}
	}

	// editar choferes //
	public function editar_chofer() {
		$id_chofer = $this->input->post("id_chofer");
		$nombre = $this->input->post("nombre");
		$apellidos = $this->input->post("apellidos");
		
		if($this->chofer->editar_chofer($id_chofer, $nombre, $apellidos)) {
			echo json_encode(array("msg"=>"Chofer Actualizado"));
		}else{
			echo json_encode(array("msg"=>"Error al ingresar"));    
		}
	}

	// eliminar choferes //
	public function eliminar_chofer() {
		$id_chofer = $this->input->post("id_chofer");
		
		if($this->chofer->eliminar_chofer($id_chofer)) {
			echo json_encode(array("msg"=>"Chofer Eliminado"));
		}else{
			echo json_encode(array("msg"=>"Error al ingresar"));    
		}
	}	

	// controller microbus //

	// cargar modulo microbuses //
	public function microbus() {
		$this->load->view('microbus');
	}

	// listar microbuses //
	public function lista_microbus() {
		echo json_encode($this->microbus->lista_microbus());
	}

	// agregar microbuses //
	public function agregar_microbus() {
		$marca = $this->input->post("marca");
		$patente = $this->input->post("patente");
		$id_chofer = $this->input->post("lista_choferes");
		
		if($this->microbus->agregar_microbus($marca, $patente, $id_chofer)) {
			echo json_encode(array("msg"=>"Registro exitoso"));
		}else{
			echo json_encode(array("msg"=>"Error al ingresar"));    
		}
	}

	// editar microbuses //
	public function editar_microbus() {
		$id_microbus = $this->input->post("id_microbus");
		$marca = $this->input->post("marca");
		$patente = $this->input->post("patente");
		
		if($this->microbus->editar_microbus($id_microbus, $marca, $patente)) {
			echo json_encode(array("msg"=>"Microbus Actualizado"));
		}else{
			echo json_encode(array("msg"=>"Error al ingresar"));    
		}
	}

	// eliminar microbuses //
	public function eliminar_microbus() {
		$id_microbus = $this->input->post("id_microbus");
		
		if($this->microbus->eliminar_microbus($id_microbus)) {
			echo json_encode(array("msg"=>"Microbus Eliminado"));
		}else{
			echo json_encode(array("msg"=>"Error al ingresar"));    
		}
	}

	// controller linea //

	// cargar modulo //
	public function linea() {
		$this->load->view('linea');
	}

	// listar lineas //
	public function lista_lineas() {
		echo json_encode($this->linea->lista_lineas());
	}
	
	// agregar linea //
	public function agregar_linea() {
		$nombre = $this->input->post("nombre");
		
		if($this->linea->agregar_linea($nombre)) {
			echo json_encode(array("msg"=>"Registro exitoso"));
		}else{
			echo json_encode(array("msg"=>"Error al ingresar"));    
		}
	}

	// editar linea //
	public function editar_linea() {
		$id_linea = $this->input->post("id_linea");
		$nombre = $this->input->post("nombre");
		
		if($this->linea->editar_linea($id_linea, $nombre)) {
			echo json_encode(array("msg"=>"Linea Actualizada"));
		}else{
			echo json_encode(array("msg"=>"Error al ingresar"));    
		}
	}

	// eliminar linea //
	public function eliminar_linea() {
		$id_linea = $this->input->post("id_linea");
		
		if($this->linea->eliminar_linea($id_linea)) {
			echo json_encode(array("msg"=>"Linea Eliminada"));
		}else{
			echo json_encode(array("msg"=>"Error al ingresar"));    
		}
	}


	// controller tarifa //

	public function tarifa() {
		$this->load->view('tarifa');
	}

	public function lista_tarifas() {
		echo json_encode($this->tarifa->lista_tarifas());
	}

	// controller horario //

	public function horario() {
		$this->load->view('horario');
	}

	public function lista_horarios() {
		echo json_encode($this->horario->lista_horarios());
	}
	
}
