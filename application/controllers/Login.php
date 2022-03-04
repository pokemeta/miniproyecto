<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('login_dao');
    }

	public function index(){
		$this->load->view('login_page');
	}
    
    public function acceso()
    {
        //validaciones
        $usuario_existe_email = $this->login_dao->obtenerUsuarioPorEmail($this->input->post('email'));
        
        if($usuario_existe_email)
        {
            if($usuario_existe_email->password == $this->input->post('password'))
            {
                if($usuario_existe_email->status =='1')
                {
                    $session = array(
                        "_name" => $usuario_existe_email->nombre_completo,
                        "_email" => $usuario_existe_email->email
                    );
                    $this->session->set_userdata('app_sess', $session);
                    redirect('Proyectos');
                }
                else
                {
                    $this->session->set_flashdata('logerr', 'tu cuenta esta deshabilitada');
                    redirect('login');
                }
            }
            else
            {
                $this->session->set_flashdata('logerr', 'la contraseña no es valida');
                redirect('login');
            }
        }
        else
        {
            $this->session->set_flashdata('logerr', 'el correo no existe');
            redirect('login');
        }
    }
    
    public function cerrar_sesion()
    {
        $this->session->unset_userdata('app_sess');
        redirect('welcome');
    }
}

?>