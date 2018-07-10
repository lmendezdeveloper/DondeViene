<?php

class Trayecto extends CI_Model{
    
    public function list_trayecto() {
        return $this->db->get("trayecto")->result();
    }
}