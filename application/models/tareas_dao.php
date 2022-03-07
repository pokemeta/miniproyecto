<?php

defined('BASEPATH') OR exit('No direct scripts allowed');

class tareas_dao extends CI_Model 
{
    function registrarTarea($datos) 
    {
        $this->db->insert('proyecto_tareas', $datos);
    }
    
    function obtenerTareas($id)
    {
        $this->db->where('fk_proyecto', $id);
        $registro = $this->db->get('proyecto_tareas');
        return $registro->result();
    }
}

?>