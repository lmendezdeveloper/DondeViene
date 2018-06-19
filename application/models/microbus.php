<?php

class Microbus extends CI_Model{
    
    public function lista_microbus() {
        return $this->db->get("vmicrobus")->result();
    }

    public function agregar_microbus($marca, $patente, $id_chofer) {
        $data = array("ID_MICROBUS"=>null,
                    "MARCA"=>$marca, 
                    "PATENTE"=>$patente, 
                    "ID_CHOFER"=>$id_chofer,
                    "ID_EMPRESA"=>1
        );
        
        return $this->db->insert("microbus", $data);
    }

    public function editar_microbus($id_microbus, $marca, $patente) {
        $this->db->where("ID_MICROBUS", $id_microbus);
        $data = array("MARCA"=>$marca, "PATENTE"=>$patente);
        return $this->db->update("microbus", $data);
    }

    public function eliminar_microbus($id_microbus) {
        $this->db->where("ID_MICROBUS", $id_microbus);
        return $this->db->delete("microbus");
    }
}