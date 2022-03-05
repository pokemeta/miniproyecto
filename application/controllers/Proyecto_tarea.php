<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Proyecto_tarea extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
    }

	public function index(){
		$this->load->view('proyecto_tarea_view');
	}
}

?>