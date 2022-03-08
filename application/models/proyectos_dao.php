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
    
    function borrarColaborador($em, $id)
    {
        $this->db->where('fk_usuario', $em);
        $this->db->where('fk_proyecto', $id);
        $this->db->delete('proyecto_usuarios');
    }
    /*----------------*/
    
    //para poder verificar si el usuario que entro al proyecto esta en la lista del proyecto o no
    function obtenerColaboradorDeProyecto($email, $id)
    {
        $this->db->where('fk_usuario', $email);
        $this->db->where('fk_proyecto', $id);
        $registros = $this->db->get('proyecto_usuarios');
        return $registros->row();
    }
    
    function obtenerColaboradores($id)
    {
        $this->db->where('fk_proyecto', $id);
        $registros = $this->db->get('proyecto_usuarios');
        return $registros->result();
    }
    /*---------------------------------------------*/
    
    //para revisar si es admin o no
    function obtenerAdminDelProyecto($id)
    {
        $this->db->where('fk_proyecto', $id);
        $registros = $this->db->get('proyecto_usuarios');
        return $registros->row();
    }
    /*------------------*/
    
    //para obtener los usuarios para agregarlos en el proyecto despues
    function obtenerUsuarios()
    {
        $registros = $this->db->get('usuarios');
        return $registros->result();
    }
    
    /*-----------------------*/
    
    //usuarios que se muestran en base a los emails que tienen el fk_proyecto(puesto como id)
    function mostrarUsuarios($id)
    {
        $registros = $this->db->query('
            SELECT * FROM usuarios WHERE email IN(
            SELECT fk_usuario FROM proyecto_usuarios WHERE fk_proyecto ='.$id.'
            )
        '
        );
        return $registros->result();
    }
    
    function obtenerProyectosDeUsuario($email_usuario)
    {
        //selecciona el numero total de registros de colaboradores por cada proyecto filtrado por dueño
        $quer = "SELECT p.*, (SELECT COUNT(*) FROM proyecto_usuarios WHERE fk_proyecto = p.id ) as total FROM proyectos AS p WHERE id IN(SELECT fk_proyecto FROM proyecto_usuarios WHERE fk_usuario = '$email_usuario');";
        $registros = $this->db->query($quer);
        return $registros->result();
    }
    /*------------------------------------*/
}

?>