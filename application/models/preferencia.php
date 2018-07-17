<?php

class Preferencia extends CI_Model{
    
    public function list_preferencias() {
        return $this->db->get("preferencia")->result();
    }

    public function add_preferencias($fecha, $hora, $id_usuario, $id_linea) {
        $data=array("id_preferencia"=>null,
        "fecha"=>$fecha, 
        "hora"=>$hora,  
        "id_usuario"=>$id_usuario,
        "id_linea"=>$id_linea
        );
        
        return $this->db->insert("preferencia", $data);
    }
}