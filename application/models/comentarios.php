<?php

class Comentarios extends CI_Model{
    
    public function list_comentarios() {
        return $this->db->get("comentarios")->result();
    }

    public function add_comentarios($puntuacion, $titulo, $observacion, $id_usuario) {
        $data=array("id_comentarios"=>null,
        "puntuacion"=>$puntuacion, 
        "titulo"=>$titulo,  
        "observacion"=>$observacion,
        "id_usuario"=>$id_usuario
        );
        
        return $this->db->insert("comentarios", $data);
    }
}