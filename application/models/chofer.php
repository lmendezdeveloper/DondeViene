<?php

class Chofer extends CI_Model{
    
    public function list_choferes() {
        return $this->db->get("chofer")->result();
    }

    public function add_choferes($rut, $nombres, $apellidop, $apellidom, $celular, $correo) {
        $data=array("id_chofer"=>null,
        "rut"=>$rut, 
        "nombre"=>$nombres,  
        "apellidop"=>$apellidop,
        "apellidom"=>$apellidom, 
        "telefono"=>$celular, 
        "mail"=>$correo
        );
        
        return $this->db->insert("chofer", $data);
    }

    public function edit_choferes($id_chofer, $nombres, $apellidop, $apellidom, $celular, $correo) {
        $this->db->where("id_chofer", $id_chofer);
        $data=array("nombre"=>$nombres,  
        "apellidop"=>$apellidop,
        "apellidom"=>$apellidom, 
        "telefono"=>$celular, 
        "mail"=>$correo
        );
        
        return $this->db->update("chofer", $data);
    }

    public function delete_choferes($id_chofer) {
        $this->db->where("id_chofer", $id_chofer);
        return $this->db->delete("chofer");
    }
}