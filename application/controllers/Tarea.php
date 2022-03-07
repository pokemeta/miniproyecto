<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tarea extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('proyectos_dao');
        $this->load->model('tareas_dao');
    }

	public function index($id = null, $idp = null)
    {
        $id = $this->input->get('id');
        $idp = $this->input->get('idp');
        
        $data['dt'] = array(
            "test" => 'test',
            "datos" => $this->tareas_dao->obtenerTareaPorId($id),
            "usrs" => $this->proyectos_dao->mostrarUsuarios($idp),
        );
        
		$this->load->view('tarea_view', $data);
	}
    
    public function editar()
    {
        $this->load->library('form_validation');
        
        $id = $this->input->post('id');
        
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
                "fc_limite" => $this->input->post('fc_limite')
            );
            $this->tareas_dao->modificarTarea($datos, $id);
            redirect('proyecto_tarea?id='.$this->input->post('fk_proyecto'));
        }
        else 
        {
            $this->load->library('session');
            var_dump($this->form_validation->error_array());
            /*$this->session->set_flashdata('errores', $this->form_validation->error_array());
            redirect('proyecto_tarea?id='.$this->input->post('fk_proyecto'));*/
        }
    }
    
    public function borrar($id = null)
    {
        $id = $this->input->get('id');
        $this->tareas_dao->borrarTarea($id);
        redirect('proyectos');
    }
    
    public function marcar_terminado($id = null, $idproc = null)
    {
        $id = $this->input->get('id');
        $idproc = $this->input->get('idp');
        
        $datos = array(
            "status" => 'T'
        );
        
        $this->tareas_dao->modificarTarea($datos, $id);
        redirect('proyecto_tarea?id='.$idproc);
    }
}

?>