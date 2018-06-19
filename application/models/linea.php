<?php

class Linea extends CI_Model{
    
    public function lista_lineas() {
        return $this->db->get("linea")->result();
    }

    public function agregar_linea($nombre) {
        $data = array("ID_LINEA"=>null,
                    "NOMBRE"=>$nombre,
                    "ID_EMPRESA"=>1
        );
        
        return $this->db->insert("linea", $data);
    }

    public function editar_linea($id_linea, $nombre) {
        $this->db->where("ID_LINEA", $id_linea);
        $data = array("NOMBRE"=>$nombre, "ID_EMPRESA"=>1);
        return $this->db->update("linea", $data);
    }

    public function eliminar_linea($id_linea) {
        $this->db->where("ID_LINEA", $id_linea);
        return $this->db->delete("linea");
    }
}