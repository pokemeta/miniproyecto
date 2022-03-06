<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Proyecto_tarea extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('proyectos_dao');
    }

	public function index($id = null)
    {
        //validacion usando obtenerColaboradorDeProyecto
        $id = $this->input->get('id');
        if($this->proyectos_dao->obtenerColaboradorDeProyecto($this->session->userdata('app_sess')['_email'], $id))
        {
            $datos['registros'] = array(
                "admin" => $this->proyectos_dao->obtenerAdminDelProyecto($id),
                "usuarios" => $this->proyectos_dao->obtenerUsuarios()
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
}

?>