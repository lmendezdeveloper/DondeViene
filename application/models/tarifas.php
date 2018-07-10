<?php

class Tarifas extends CI_Model{
    
    public function list_tarifas() {
        return $this->db->get("tarifa")->result();
    }

    public function add_tarifas($codigo, $tarifa, $fecha, $vigencia, $observacion, $estado, $id_empresa) {
        $data=array("id_tarifa"=>null,
        "codigo"=>$codigo, 
        "tarifa"=>$tarifa,  
        "fecha"=>$fecha,
        "vigencia"=>$vigencia,  
        "observacion"=>$observacion,
        "estado"=>$estado,
        "id_empresa"=>$id_empresa
        );
        
        return $this->db->insert("tarifa", $data);
    }

    public function edit_tarifas($id_tarifa, $codigo, $tarifa, $fecha, $vigencia, $observacion, $estado) {
        $this->db->where("id_tarifa", $id_tarifa);
        $data=array("codigo"=>$codigo, 
        "tarifa"=>$tarifa,
        "fecha"=>$fecha,
        "vigencia"=>$vigencia,  
        "observacion"=>$observacion,
        "estado"=>$estado
        );
        
        return $this->db->update("tarifa", $data);
    }

    public function delete_tarifas($id_tarifa) {
        $this->db->where("id_tarifa", $id_tarifa);
        return $this->db->delete("tarifa");
    }
}