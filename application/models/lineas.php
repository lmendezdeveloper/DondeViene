<?php

class Lineas extends CI_Model{
    
    public function list_lineas() {
        return $this->db->get("linea")->result();
    }

    public function add_lineas($codigo, $nombre, $list_estado, $observacion, $id_empresa) {
        $data=array("id_linea"=>null,
        "codigo"=>$codigo, 
        "nombre"=>$nombre,  
        "estado"=>$list_estado,
        "observacion"=>$observacion, 
        "id_empresa"=>$id_empresa
        );
        
        return $this->db->insert("linea", $data);
    }

    public function edit_lineas($id_linea, $codigo, $nombre, $list_estado, $observacion) {
        $this->db->where("id_linea", $id_linea);
        $data=array("codigo"=>$codigo, 
        "nombre"=>$nombre,  
        "estado"=>$list_estado,
        "observacion"=>$observacion
        );
        
        return $this->db->update("linea", $data);
    }

    public function delete_lineas($id_linea) {
        $this->db->where("id_linea", $id_linea);
        return $this->db->delete("linea");
    }
}