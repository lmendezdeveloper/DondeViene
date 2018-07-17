<?php

class Usuario extends CI_Model{
    
    public function login($mail, $pass) {
        $this->db->where("mail", $mail);
        $this->db->where("clave", $pass);
        return $this->db->get("usuario")->result();
    }

    public function buscarUsuario($mail) {
        $this->db->where("mail", $mail);
        return $this->db->get("usuario")->result();
    }
    
}