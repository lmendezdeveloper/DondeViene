<?php

class Trayecto extends CI_Model{
    
    public function list_trayecto() {
        return $this->db->get("trayecto")->result();
    }

    public function add_trayecto($orden, $lat, $lon, $id_recorrido, $id_tipo_trayecto, $id_empresa) {
        $data=array("id_trayecto"=>null,
        "orden"=>$orden, 
        "lat"=>$lat,  
        "lon"=>$lon,
        "id_recorrido"=>$id_recorrido,
        "id_tipo_trayecto"=>$id_tipo_trayecto,
        "id_empresa"=>$id_empresa
        );
        
        return $this->db->insert("trayecto", $data);
    }
}