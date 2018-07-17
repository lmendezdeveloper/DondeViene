<?php

class Recorrido extends CI_Model{
    
    public function list_recorrido() {
        return $this->db->get("vrecorrido")->result();
    }

    public function add_recorrido($codigo, $observacion, $id_linea, $id_horario, $id_tarifa, $id_empresa) {
        $data=array("id_recorrido"=>null,
        "codigo"=>$codigo, 
        "observacion"=>$observacion,  
        "id_linea"=>$id_linea,
        "id_horario"=>$id_horario,
        "id_tarifa"=>$id_tarifa,
        "id_empresa"=>$id_empresa
        );
        
        return $this->db->insert("recorrido", $data);
    }
}