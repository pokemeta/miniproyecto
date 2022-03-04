<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login_dao extends CI_Model {

    public function obtenerUsuarioPorEmail($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('usuarios');
        return $query->row();
    }
    
}

?>