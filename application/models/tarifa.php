<?php

class Tarifa extends CI_Model{
    
    public function lista_tarifas() {
        return $this->db->get("vtarifa")->result();
    }
}