<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
		$this->load->model('usuario');
		$this->load->model('chofer');
		$this->load->model('micros');
		$this->load->model('lineas');	
		$this->load->model('horarios');	
		$this->load->model('tarifas');
		$this->load->model('trayecto');
		$this->load->model('comentarios');
		$this->load->model('recorrido');
		$this->load->model('preferencia');
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

	// CONTROLLER USUARIOS //

	// cargar modulo usuarios //
	public function modulo_usuarios() {
        if ($this->session->userdata("user")) {
			$this->load->view('mantenedores/usuarios');
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
			$id_empresa = 1;
	
			if ($this->chofer->add_choferes($rut, $nombres, $apellidop, $apellidom, $celular, $correo, $id_empresa)) {
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
		
	// CONTROLLER MICROS //

	// cargar modulo micros //
	public function modulo_micros() {
        if ($this->session->userdata("user")) {
			$this->load->view('mantenedores/micros');
		} else {
			$this->load->view('login'); 
		}
	}

	// listar micros //
    public function list_micros() {
        if ($this->session->userdata("user")) {
        	echo json_encode($this->micros->list_micros());
		} else {
			$this->load->view('login'); 
		}
	}

	// agregar micros //
	public function add_micros() {
		if ($this->session->userdata("user")) {
			$marca = $this->input->post("marca");
			$modelo = $this->input->post("modelo");
			$ano = $this->input->post("ano");
			$patente = $this->input->post("patente");
			$capacidad = $this->input->post("capacidad");
			$km = $this->input->post("km");
			$id_empresa = 1;
	
			if ($this->micros->add_micros($marca, $modelo, $ano, $patente, $capacidad, $km, $id_empresa)) {
				echo json_encode(array("msg"=>"1"));
			} else {
				echo json_encode(array("msg"=>"2"));
			}
		} else {
			$this->load->view('login'); 
		}
	}

	// editar micros //
	public function edit_micros() {
		if ($this->session->userdata("user")) {
			$id_chofer = $this->input->post("id_micros");
			$marca = $this->input->post("marca");
			$modelo = $this->input->post("modelo");
			$ano = $this->input->post("ano");
			$patente = $this->input->post("patente");
			$capacidad = $this->input->post("capacidad");
			$km = $this->input->post("km");
	
			if ($this->micros->edit_micros($id_chofer, $marca, $modelo, $ano, $patente, $capacidad, $km)) {
				echo json_encode(array("msg"=>"1"));
			} else {
				echo json_encode(array("msg"=>"2"));
			}
		} else {
			$this->load->view('login'); 
		}
	}

	// eliminar micros //
	public function delete_micros() {
		if ($this->session->userdata("user")) {
			$id_micro = $this->input->post("id_micro");
			
			if ($this->micros->delete_micros($id_micro)) {
				echo json_encode(array("msg"=>"1"));
			} else {
				echo json_encode(array("msg"=>"2"));
			}
		} else {
			$this->load->view('login'); 
		}
	}
	
	// CONTROLLER LINEAS //

	// cargar modulo lineas //
	public function modulo_lineas() {
        if ($this->session->userdata("user")) {
			$this->load->view('mantenedores/lineas');
		} else {
			$this->load->view('login'); 
		}
	}

	// listar lineas //
    public function list_lineas() {
        if ($this->session->userdata("user")) {
        	echo json_encode($this->lineas->list_lineas());
		} else {
			$this->load->view('login'); 
		}
	}

	// agregar lineas //
	public function add_lineas() {
		if ($this->session->userdata("user")) {
			$codigo = $this->input->post("codigo");
			$nombre = $this->input->post("nombre");
			$list_estado = $this->input->post("list_estado");
			$observacion = $this->input->post("observacion");
			$id_empresa = 1;
	
			if ($this->lineas->add_lineas($codigo, $nombre, $list_estado, $observacion, $id_empresa)) {
				echo json_encode(array("msg"=>"1"));
			} else {
				echo json_encode(array("msg"=>"2"));
			}
		} else {
			$this->load->view('login'); 
		}
	}

	// editar lineas //
	public function edit_lineas() {
		if ($this->session->userdata("user")) {
			$id_linea = $this->input->post("id_linea");
			$codigo = $this->input->post("codigo");
			$nombre = $this->input->post("nombre");
			$list_estado = $this->input->post("list_estado");
			$observacion = $this->input->post("observacion");
	
			if ($this->lineas->edit_lineas($id_linea, $codigo, $nombre, $list_estado, $observacion)) {
				echo json_encode(array("msg"=>"1"));
			} else {
				echo json_encode(array("msg"=>"2"));
			}
		} else {
			$this->load->view('login'); 
		}
	}

	// eliminar lineas //
	public function delete_lineas() {
		if ($this->session->userdata("user")) {
			$id_linea = $this->input->post("id_linea");
			
			if ($this->lineas->delete_lineas($id_linea)) {
				echo json_encode(array("msg"=>"1"));
			} else {
				echo json_encode(array("msg"=>"2"));
			}
		} else {
			$this->load->view('login'); 
		}
	}

	// CONTROLLER HORARIOS //

	// cargar modulo horarios //
	public function modulo_horarios() {
        if ($this->session->userdata("user")) {
			$this->load->view('mantenedores/horarios');
		} else {
			$this->load->view('login'); 
		}
	}

	// listar horarios //
    public function list_horarios() {
        if ($this->session->userdata("user")) {
        	echo json_encode($this->horarios->list_horarios());
		} else {
			$this->load->view('login'); 
		}
	}

	// agregar horarios //
	public function add_horarios() {
		if ($this->session->userdata("user")) {
			$codigo = $this->input->post("codigo");
			$hora_inicio = $this->input->post("hora_inicio");
			$hora_termino = $this->input->post("hora_termino");
			$fecha = $this->input->post("fecha_inicio");
			$vigencia = $this->input->post("fecha_termino");
			$observacion = $this->input->post("observacion");
			$estado = $this->input->post("list_estado");
			$id_empresa = 1;
								
			if ($this->horarios->add_horarios($codigo, $hora_inicio, $hora_termino, $fecha, $vigencia, $observacion, $estado, $id_empresa)) {
				echo json_encode(array("msg"=>"1"));
			} else {
				echo json_encode(array("msg"=>"2"));
			}
		} else {
			$this->load->view('login'); 
		}
	}

	// editar horarios //
	public function edit_horarios() {
		if ($this->session->userdata("user")) {
			$id_horario = $this->input->post("id_horario");
			$codigo = $this->input->post("codigo");
			$hora_inicio = $this->input->post("hora_inicio");
			$hora_termino = $this->input->post("hora_termino");
			$fecha = $this->input->post("fecha_inicio");
			$vigencia = $this->input->post("fecha_termino");
			$observacion = $this->input->post("observacion");
			$estado = $this->input->post("list_estado");
	
			if ($this->horarios->edit_horarios($id_horario, $codigo, $hora_inicio, $hora_termino, $fecha, $vigencia, $observacion, $estado)) {
				echo json_encode(array("msg"=>"1"));
			} else {
				echo json_encode(array("msg"=>"2"));
			}
		} else {
			$this->load->view('login'); 
		}
	}

	// eliminar horarios //
	public function delete_horarios() {
		if ($this->session->userdata("user")) {
			$id_horario = $this->input->post("id_horario");
			
			if ($this->horarios->delete_horarios($id_horario)) {
				echo json_encode(array("msg"=>"1"));
			} else {
				echo json_encode(array("msg"=>"2"));
			}
		} else {
			$this->load->view('login'); 
		}
	}		

	// CONTROLLER TARIFAS //

	// cargar modulo tarifas //
	public function modulo_tarifas() {
        if ($this->session->userdata("user")) {
			$this->load->view('mantenedores/tarifas');
		} else {
			$this->load->view('login'); 
		}
	}

	// listar tarifas //
    public function list_tarifas() {
        if ($this->session->userdata("user")) {
        	echo json_encode($this->tarifas->list_tarifas());
		} else {
			$this->load->view('login'); 
		}
	}

	// agregar tarifas //
	public function add_tarifas() {
		if ($this->session->userdata("user")) {
			$codigo = $this->input->post("codigo");
			$tarifa = $this->input->post("tarifa");
			$fecha = $this->input->post("fecha_inicio");
			$vigencia = $this->input->post("fecha_termino");
			$observacion = $this->input->post("observacion");
			$estado = $this->input->post("list_estado");
			$id_empresa = 1;
								
			if ($this->tarifas->add_tarifas($codigo, $tarifa, $fecha, $vigencia, $observacion, $estado, $id_empresa)) {
				echo json_encode(array("msg"=>"1"));
			} else {
				echo json_encode(array("msg"=>"2"));
			}
		} else {
			$this->load->view('login'); 
		}
	}

	// editar tarifas //
	public function edit_tarifas() {
		if ($this->session->userdata("user")) {
			$id_tarifa = $this->input->post("id_tarifa");
			$codigo = $this->input->post("codigo");
			$tarifa = $this->input->post("tarifa");
			$fecha = $this->input->post("fecha_inicio");
			$vigencia = $this->input->post("fecha_termino");
			$observacion = $this->input->post("observacion");
			$estado = $this->input->post("list_estado");
	
			if ($this->tarifas->edit_tarifas($id_tarifa, $codigo, $tarifa, $fecha, $vigencia, $observacion, $estado)) {
				echo json_encode(array("msg"=>"1"));
			} else {
				echo json_encode(array("msg"=>"2"));
			}
		} else {
			$this->load->view('login'); 
		}
	}

	// eliminar tarifas //
	public function delete_tarifas() {
		if ($this->session->userdata("user")) {
			$id_tarifa = $this->input->post("id_tarifa");
			
			if ($this->tarifas->delete_tarifas($id_tarifa)) {
				echo json_encode(array("msg"=>"1"));
			} else {
				echo json_encode(array("msg"=>"2"));
			}
		} else {
			$this->load->view('login'); 
		}
	}

	// CONTROLLER RECORRIDO //

	// cargar modulo recorrido //
	public function modulo_recorrido() {
        if ($this->session->userdata("user")) {
			$this->load->view('gestores/recorrido');
		} else {
			$this->load->view('login'); 
		}
	}

	// listar recorrido //
	public function list_recorrido() {
		if ($this->session->userdata("user")) {
			echo json_encode($this->recorrido->list_recorrido());
		} else {
			$this->load->view('login'); 
		}
	}

	// agregar recorrido //
	public function add_recorrido() {
		if ($this->session->userdata("user")) {
			$codigo = $this->input->post("codigo");
			$observacion = $this->input->post("observacion");
			$id_linea = $this->input->post("list_linea");
			$id_horario = $this->input->post("list_horario");
			$id_tarifa = $this->input->post("list_tarifa");
			$id_empresa = 1;

			if ($this->recorrido->add_recorrido($codigo, $observacion, $id_linea, $id_horario, $id_tarifa, $id_empresa)) {
				echo json_encode(array("msg"=>"1"));
			} else {
				echo json_encode(array("msg"=>"2"));
			}
		} else {
			$this->load->view('login'); 
		}
	}

	// CONTROLLER TRAYECTO //

	// cargar modulo trayecto //
	public function modulo_trayecto() {
        if ($this->session->userdata("user")) {
			$this->load->view('gestores/trayecto');
		} else {
			$this->load->view('login'); 
		}
	}	

	// listar trayectos //
	
	public function list_trayecto() {
		if ($this->session->userdata("user")) {
			echo json_encode($this->trayecto->list_trayecto());
		} else {
			$this->load->view('login'); 
		}
	}

	// agregar trayecto //
	public function add_trayecto() {
		if ($this->session->userdata("user")) {
			$orden = $this->input->post("orden");
			$lat = $this->input->post("latitud");
			$lon = $this->input->post("longitud");
			$id_recorrido = $this->input->post("list_recorrido");
			$id_tipo_trayecto = 1;
			$id_empresa = 1;

			if ($this->trayecto->add_trayecto($orden, $lat, $lon, $id_recorrido, $id_tipo_trayecto, $id_empresa)) {
				echo json_encode(array("msg"=>"1"));
			} else {
				echo json_encode(array("msg"=>"2"));
			}
		} else {
			$this->load->view('login'); 
		}
	}

	// CONTROLLER COMENTARIO //

	public function list_comentarios() {
		if ($this->session->userdata("user")) {
			echo json_encode($this->comentarios->list_comentarios());
		} else {
			$this->load->view('login'); 
		}
	}

	public function add_comentarios() {
		if ($this->session->userdata("user")) {
			$puntuacion = $this->input->post("puntuacion");
			$titulo = $this->input->post("titulo");
			$observacion = $this->input->post("observacion");
			$mail = $this->input->post("correo");

			$arrayUser = $this->usuario->buscarUsuario($mail);
			$id_usuario = $arrayUser[0]->id_usuario;

			if ($this->comentarios->add_comentarios($puntuacion, $titulo, $observacion, $id_usuario)) {
				echo json_encode(array("msg"=>"1"));
			} else {
				echo json_encode(array("msg"=>"2"));
			}
		} else {
			$this->load->view('login'); 
		}
	}

	// CONTROLLER PREFERENCIAS //

	public function list_preferencias() {
		if ($this->session->userdata("user")) {
			echo json_encode($this->preferencia->list_preferencias());
		} else {
			$this->load->view('login'); 
		}
	}

	public function add_preferencias() {
		if ($this->session->userdata("user")) {
			$fecha = $this->input->post("fecha");
			$hora = $this->input->post("hora");
			$linea = $this->input->post("linea");
			$mail = $this->input->post("correo");

			$arrayLinea = $this->lineas->buscarLinea($linea);
			$id_linea = $arrayLinea[0]->id_linea;

			$arrayUser = $this->usuario->buscarUsuario($mail);
			$id_usuario = $arrayUser[0]->id_usuario;

			if ($this->preferencia->add_preferencias($fecha, $hora, $id_usuario, $id_linea)) {
				echo json_encode(array("msg"=>"1"));
			} else {
				echo json_encode(array("msg"=>"2"));
			}
		} else {
			$this->load->view('login'); 
		}
	}
}
