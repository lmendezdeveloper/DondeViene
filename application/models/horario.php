<?php

class Horario extends CI_Model{
    
    public function lista_horarios() {
        return $this->db->get("horario")->result();
    }
}