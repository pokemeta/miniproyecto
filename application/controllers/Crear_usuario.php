<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crear_usuario extends CI_Controller 
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('usuario_dao');
    }
    
	public function index()
	{
        if ($this->session->userdata('username') != '')
        {
            $this->load->view('home_view');
        }
		else
        {
            $this->load->view('crear_cuenta');
        }
	}
    
    public function registrar()
    {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules(
            "nombre_completo",
            "Nombre",
            "required|min_length[10]|max_length[180]"
        );
        $this->form_validation->set_rules(
            "email",
            "Correo electronico",
            "required|valid_email|min_length[10]|max_length[200]"
        );
        $this->form_validation->set_rules(
            "password",
            "Contraseña",
            "required|min_length[5]|max_length[120]"
        );
        $this->form_validation->set_rules(
            "confirm_pass",
            "Confirmar Contraseña",
            "required|matches[password]|min_length[5]|max_length[120]"
        );
        $this->form_validation->set_rules(
            "genero",
            "Genero",
            "required|in_list[F,M,X]"
        );
        
        if($this->form_validation->run())
        {
            $datos = array(
                "nombre_completo" => $this->input->post('nombre_completo'),
                "email" => $this->input->post('email'),
                "password" => $this->input->post('password'),
                "genero" => $this->input->post('genero'),
                "status" => 1,
            );
            var_dump($datos);
            $this->usuario_dao->registrarUsuario($datos);
            redirect('welcome');
        }
        else 
        {
            $this->load->library('session');
            $this->session->set_flashdata('errores', $this->form_validation->error_array());
            redirect('crear_usuario');
        }
    }
}