<?php

class Horarios extends CI_Model{
    
    public function list_horarios() {
        return $this->db->get("horario")->result();
    }

    public function add_horarios($codigo, $hora_inicio, $hora_termino, $fecha, $vigencia, $observacion, $estado, $id_empresa) {
        $data=array("id_horario"=>null,
        "codigo"=>$codigo, 
        "hora_inicio"=>$hora_inicio,  
        "hora_termino"=>$hora_termino,
        "fecha"=>$fecha,
        "vigencia"=>$vigencia,  
        "observacion"=>$observacion,
        "estado"=>$estado,
        "id_empresa"=>$id_empresa
        );
        
        return $this->db->insert("horario", $data);
    }

    public function edit_horarios($id_horario, $codigo, $hora_inicio, $hora_termino, $fecha, $vigencia, $observacion, $estado) {
        $this->db->where("id_horario", $id_horario);
        $data=array("codigo"=>$codigo, 
        "hora_inicio"=>$hora_inicio,  
        "hora_termino"=>$hora_termino,
        "fecha"=>$fecha,
        "vigencia"=>$vigencia,  
        "observacion"=>$observacion,
        "estado"=>$estado
        );
        
        return $this->db->update("horario", $data);
    }

    public function delete_horarios($id_horario) {
        $this->db->where("id_horario", $id_horario);
        return $this->db->delete("horario");
    }
}