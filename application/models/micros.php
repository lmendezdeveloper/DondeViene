<?php

class Micros extends CI_Model{
    
    public function list_micros() {
        return $this->db->get("micros")->result();
    }

    public function add_micros($marca, $modelo, $ano, $patente, $capacidad, $km, $id_empresa) {
        $data=array("id_micros"=>null,
        "marca"=>$marca, 
        "modelo"=>$modelo,  
        "ano"=>$ano,
        "patente"=>$patente, 
        "capacidad"=>$capacidad, 
        "kilometraje"=>$km,
        "id_empresa"=>$id_empresa
        );
        
        return $this->db->insert("micros", $data);
    }

    public function edit_micros($id_chofer, $marca, $modelo, $ano, $patente, $capacidad, $km) {
        $this->db->where("id_micros", $id_chofer);
        $data=array("marca"=>$marca, 
        "modelo"=>$modelo,  
        "ano"=>$ano,
        "patente"=>$patente, 
        "capacidad"=>$capacidad, 
        "kilometraje"=>$km
        );
        
        return $this->db->update("micros", $data);
    }

    public function delete_micros($id_micro) {
        $this->db->where("id_micros", $id_micro);
        return $this->db->delete("micros");
    }
}