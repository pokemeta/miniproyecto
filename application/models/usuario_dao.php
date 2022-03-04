<?php

defined('BASEPATH') OR exit('No direct scripts allowed');

class usuario_dao extends CI_Model 
{
    function obtenerUsuario()
    {
        $registros = $this->db->get('usuarios');
        return $registros->result();
    }
    
    function registrarUsuario($datos) 
    {
        $this->db->insert('usuarios', $datos);
    }
    
    function obtenerUsuarioPorId($id)
    {
        $this->db->where('id', $id);
        $registros = $this->db->get('ususarios');
        return $registros->row();
    }
}

?>