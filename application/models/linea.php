<?php

class Linea extends CI_Model{
    
    public function lista_lineas() {
        return $this->db->get("linea")->result();
    }
}