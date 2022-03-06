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
        $id = $this->input->get('id');
        if($this->proyectos_dao->obtenerColaboradoresDeProyecto($this->session->userdata('app_sess')['_email'], $id))
        {
            $this->load->view('proyecto_tarea_view');
        }
        else
        {
            redirect('proyectos');
        }
	}
}

?>