<?php

class Microbus extends CI_Model{
    
    public function lista_microbus() {
        return $this->db->get("microbus")->result();
    }
}