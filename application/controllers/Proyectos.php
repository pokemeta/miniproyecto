<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Proyectos extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
    }

	public function index(){
		$this->load->view('proyectos_view');
	}
}

?>