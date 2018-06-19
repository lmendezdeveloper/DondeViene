<?php

class Chofer extends CI_Model{
    
    public function lista_choferes() {
        return $this->db->get("chofer")->result();
    }
    
    public function agregar_chofer($rut, $nombre, $apellidos) {
        $data = array("ID_CHOFER"=>null,
                    "RUT"=>$rut, 
                    "NOMBRE"=>$nombre, 
                    "APELLIDOS"=>$apellidos,
                    "ID_EMPRESA"=>1
        );
        
        return $this->db->insert("chofer", $data);
    }

    public function editar_chofer($id_chofer, $nombre, $apellidos) {
        $this->db->where("ID_CHOFER", $id_chofer);
        $data = array("NOMBRE"=>$nombre, "APELLIDOS"=>$apellidos);
        return $this->db->update("chofer", $data);
    }

    public function eliminar_chofer($id_chofer) {
        $this->db->where("ID_CHOFER", $id_chofer);
        return $this->db->delete("chofer");
    }
}