<?php

class Chofer extends CI_Model{
    
    public function lista_choferes() {
        return $this->db->get("chofer")->result();
    }
}