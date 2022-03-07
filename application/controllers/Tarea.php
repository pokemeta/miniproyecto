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
}

?>