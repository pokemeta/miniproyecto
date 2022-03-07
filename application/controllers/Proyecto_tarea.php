<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Proyecto_tarea extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('proyectos_dao');
        $this->load->model('tareas_dao');
    }

	public function index($id = null)
    {
        //validacion usando obtenerColaboradorDeProyecto
        $id = $this->input->get('id');
        if($this->proyectos_dao->obtenerColaboradorDeProyecto($this->session->userdata('app_sess')['_email'], $id))
        {
            $datos['registros'] = array(
                "admin" => $this->proyectos_dao->obtenerAdminDelProyecto($id),
                "usuarios" => $this->proyectos_dao->obtenerUsuarios(),
                "usrs" => $this->proyectos_dao->mostrarUsuarios($id),
                "tareas" => $this->tareas_dao->obtenerTareas($id)
            );
            $this->load->view('proyecto_tarea_view', $datos);
        }
        else
        {
            redirect('proyectos');
        }
	}
    
    //para la barra de administrador para agregar a colaboradores
    public function reg_colaborador($id = null)
    {
        $id = $this->input->get('id');
        $datos = array(
            "fk_usuario" => $this->input->post('fk_usuario'),
            "fk_proyecto" => $id
        );
        $this->proyectos_dao->registrarColaborador($datos);
        redirect('proyecto_tarea?id='.$id);
    }
    
    public function registrar()
    {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules(
            "titulo",
            "Titulo de la tarea",
            "required|min_length[5]|max_length[20]"
        );
        $this->form_validation->set_rules(
            "descripcion",
            "Descripcion de la tarea",
            "required|min_length[5]"
        );
        $this->form_validation->set_rules(
            "fc_limite",
            "Fecha limite de la tarea",
            "required"
        );
        $this->form_validation->set_rules(
            "fk_usuario",
            "Responsable de la tarea",
            "required"
        );
        
        if($this->form_validation->run())
        {
            $datos = array(
                "titulo" => $this->input->post('titulo'),
                "descripcion" => $this->input->post('descripcion'),
                "fk_usuario" => $this->input->post('fk_usuario'),
                "fc_limite" => $this->input->post('fc_limite'),
                "fc_entregado" => date('1000-01-01'),
                "status" => 'P',
                "fk_proyecto" => $this->input->post('fk_proyecto')
            );
            $this->tareas_dao->registrarTarea($datos);
            redirect('proyecto_tarea?id='.$this->input->post('fk_proyecto'));
        }
        else 
        {
            $this->load->library('session');
            $this->session->set_flashdata('errores', $this->form_validation->error_array());
            redirect('proyecto_tarea?id='.$this->input->post('fk_proyecto'));
        }
    }
}

?>