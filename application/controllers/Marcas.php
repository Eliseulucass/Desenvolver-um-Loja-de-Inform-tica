<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Marcas extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        // Verifique se existe uma sessão (você pode adicionar sua lógica de verificação de sessão aqui)
        if (!$this->ion_auth->logged_in()){
            $this->session->set_flashdata('info','Sua Sessão expirou! ');
            redirect('login');
        }
    }
    
    public function index(){
        $data = array(
            'titulo' => 'marcas cadastrados',
            'styles' => array(
                'vendor/datatables/dataTables.bootstrap4.min.css',
            ),
            'scripts' => array(
                'vendor/datatables/jquery.dataTables.min.js',
                'vendor/datatables/dataTables.bootstrap4.min.js',
                'vendor/datatables/app.js'
            ),
            'marcas' => $this->core_model->get_all('marcas'),
        );
        /*
        echo '<pre>';
        print_r($data['marcas']);
        exit();*/
        $this->load->view("layout/header", $data);
        $this->load->view("marcas/index");
        $this->load->view("layout/footer");
    }
    public function add (){
        
            $this->form_validation->set_rules('marca_nome', '', 'trim|required|is_unique[marcas.marca_nome]');//|min_length[4]|max_length[145]
       
            if($this->form_validation->run()){
                 $data = elements(
                array(
                    'marca_nome',
                    'marca_ativa',
                    
                ),
                $this->input->post()
            );
            $data = html_escape($data);

            $this->core_model->insert('marcas', $data);

            redirect('marcas');
            
            } else {
                $data = array(
                'titulo' => 'Cadastrar marca',  
                'scripts' => array(
                    'vendor/mask/jquery.mask.min.js',
                    'vendor/mask/app.js', 
                ),
                
            );
            /*echo '<pre>';
            print_r($data['marca']);
            exit();*/
            $this->load->view("layout/header", $data);
            $this->load->view("marcas/add");
            $this->load->view("layout/footer");
        }
    }
    /////////////////////////////////////////////////////////////////////////////
    public function edit($marca_id = null) {
        if (!$marca_id || !$this->core_model->get_by_id('marcas', array('marca_id' => $marca_id))){
            $this->session->set_flashdata('error', 'Marca não encontrada');
            redirect('marcas');
        } else { 
            $this->form_validation->set_rules('marca_nome', 'Nome da Marca', 'trim|required');
    
            if($this->form_validation->run()) {
                $data = elements(
                    array(
                        'marca_nome',
                        'marca_ativa',
                    ),
                    $this->input->post()
                );
                $data = html_escape($data);
    
                $this->core_model->update('marcas', $data, array('marca_id' => $marca_id));
    
                redirect('marcas');
            } else {
                $data = array(
                    'titulo' => 'Atualizar Marca',  
                    'scripts' => array(
                        'vendor/mask/jquery.mask.min.js',
                        'vendor/mask/app.js', 
                    ),
                    'marca' => $this->core_model->get_by_id('marcas', array('marca_id' => $marca_id)),
                );
    
                $this->load->view("layout/header", $data);
                $this->load->view("marcas/edit");
                $this->load->view("layout/footer");
            }
        }    
    }
 
    public function check_marca_nome($marca_nome) {
        $marca_id = $this->input->post('marca_id');
        $marca_atual = $this->input->post('marca_atual');
    
        if ($marca_nome != $marca_atual) {
            $existe = $this->core_model->get_by_id('marcas', array('marca_nome' => $marca_nome));
    
            if ($existe) {
                $this->form_validation->set_message('check_marca_nome', 'Esta Marca já existe');
                return FALSE;
            }
        }
    
        return TRUE;
    }
    
    public function del($marca_id = null){
        if(!$marca_id || !$this->core_model->get_by_id('marcas',array('marca_id'=> $marca_id))){
            $this->session->set_flashdata('error', 'Marcas não encontrado');
            redirect('marcas');
        } else {
            $this->core_model->delete('marcas', array('marca_id' => $marca_id));
            redirect('marcas');
        }
    }
    
    /*function check_marca_nome($marca_nome) {
        $Smarca_id = $this->input->post('marca_id');

        $marca_data = array(
            'marca_nome' => $marca_nome,
            'marca_id' => $Smarca_id
        );

        $marca_exists = $this->core_model->get_by_id('marcas', $marca_data);

        if ($marca_exists) {
            $this->form_validation->set_message('check_marca_nome', 'Esta marca já existe');
            return FALSE;
        } else {
            return TRUE;
        }
    }*/
}
