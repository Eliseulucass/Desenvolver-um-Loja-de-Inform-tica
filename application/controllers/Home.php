<?php

defined('BASEPATH') OR exit('Nenhum acesso direto de script permitido');

class Home extends CI_Controller{
    public function __construct() {
        parent::__construct();
        if (!$this->ion_auth->logged_in()){
            $this->session->set_flashdata('info','Sua Sessão expirou! ');
          redirect('login');
        }
    }
    public function index(){
        $this->load->view("layout/header");
        $this->load->view("home/index");
        $this->load->view("layout/footer");
    }
}
