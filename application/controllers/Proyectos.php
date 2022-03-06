<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Proyectos extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('proyectos_dao');
    }

	public function index(){
        $datos['registros'] = $this->proyectos_dao->obtenerProyectos();
		$this->load->view('proyectos_view', $datos);
	}
    
    public function crear_pagina()
    {
        $this->load->view('crear_proyecto_view');
    }
    
    public function registrar()
    {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules(
            "titulo",
            "Titulo del proyecto",
            "required|min_length[5]|max_length[20]"
        );
        $this->form_validation->set_rules(
            "descripcion",
            "Descripcion del proyecto",
            "required|min_length[10]"
        );
        $this->form_validation->set_rules(
            "icono",
            "Icono del proyecto",
            "required|min_length[1]"
        );
        $this->form_validation->set_rules(
            "color",
            "Color del proyecto",
            "required"
        );
        
        if($this->form_validation->run())
        {
            $datos = array(
                "titulo" => $this->input->post('titulo'),
                "descripcion" => $this->input->post('descripcion'),
                "icono" => $this->input->post('icono'),
                "color" => $this->input->post('color'),
                "status" => 1,
                "fk_usuario" => $this->input->post('fk_usuario'),
                "fecha_reg" => date('Y-m-d')
            );
            $this->proyectos_dao->registrarProyecto($datos);
            
            //para la adicion del admin a la tabla proyecto_usuarios
            $datos2 = array(
                "fk_usuario" => $this->input->post('fk_usuario'),
                "fk_proyecto" => $this->proyectos_dao->obtenerProyectoId($this->input->post('titulo'))->id
            );
            $this->proyectos_dao->registrarColaborador($datos2);
            redirect('proyectos');
            /*--------------------------------------------------------*/
        }
        else 
        {
            $this->load->library('session');
            $this->session->set_flashdata('errores', $this->form_validation->error_array());
            $this->load->view('crear_proyecto_view');
        }
    }
}

?>