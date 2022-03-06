<?php

defined('BASEPATH') OR exit('No direct scripts allowed');

class proyectos_dao extends CI_Model 
{
    function obtenerProyectos()
    {
        $registros = $this->db->get('proyectos');
        return $registros->result();
    }
    
    function registrarProyecto($datos) 
    {
        $this->db->insert('proyectos', $datos);
    }
    
    /*function obtenerUsuarioPorId($id)
    {
        $this->db->where('id', $id);
        $registros = $this->db->get('ususarios');
        return $registros->row();
    }*/
}

?>