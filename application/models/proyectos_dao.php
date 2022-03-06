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
    
    //estas dos functions son necesarias para registrar al admin
    function obtenerProyectoId($nombre)
    {
        $this->db->where('titulo', $nombre);
        $registros = $this->db->get('proyectos');
        return $registros->row();
    }
    
    function registrarColaborador($datos)
    {
        $this->db->insert('proyecto_usuarios', $datos);
    }
    /*----------------*/
    
    function obtenerColaboradoresDeProyecto($email, $id)
    {
        $this->db->where('fk_usuario', $email);
        $this->db->where('fk_proyecto', $id);
        $registros = $this->db->get('proyecto_usuarios');
        return $registros->row();
    }
}

?>