<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendedores extends CI_Controller {
    
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
            'titulo' => 'Vendedores cadastrados',
            'styles' => array(
                'vendor/datatables/dataTables.bootstrap4.min.css',
            ),
            'scripts' => array(
                'vendor/datatables/jquery.dataTables.min.js',
                'vendor/datatables/dataTables.bootstrap4.min.js',
                'vendor/datatables/app.js'
            ),
            'vendedores' => $this->core_model->get_all('vendedores'),
        );
        /*
        echo '<pre>';
        print_r($data['vendedores']);
        exit();*/
        $this->load->view("layout/header", $data);
        $this->load->view("vendedores/index");
        $this->load->view("layout/footer");
    }
    ///////////////////////////////////////////////////////////////////////////
    
    public function add(){
       
            $this->form_validation->set_rules('vendedor_nome_completo', '', 'trim|required|min_length[4]|max_length[145]');
            $this->form_validation->set_rules('vendedor_codigo', '', 'trim|required|exact_length[8]');
           
            $this->form_validation->set_rules('vendedor_cpf', '', 'trim|required|exact_length[9]|is_unique[vendedores.vendedor_cpf]');
            $this->form_validation->set_rules('vendedor_rg', '', 'trim|required|max_length[13]|is_unique[vendedores.vendedor_rg]');
            $this->form_validation->set_rules('vendedor_email', '', 'trim|required|valid_email|max_length[50]|is_unique[vendedores.vendedor_email]');
            $this->form_validation->set_rules('vendedor_telefone', '', 'trim|min_length[15]');
            $this->form_validation->set_rules('vendedor_celular', '', 'trim|required|min_length[16]|is_unique[vendedores.vendedor_celular]');
            $this->form_validation->set_rules('vendedor_cep', '', 'trim|required|exact_length[8]');
            $this->form_validation->set_rules('vendedor_endereco', '', 'trim|required|max_length[155]');
            $this->form_validation->set_rules('vendedor_numero_endereco', '', 'trim|required|max_length[4]');
            $this->form_validation->set_rules('vendedor_bairro', '', 'trim|required|max_length[45]');
            $this->form_validation->set_rules('vendedor_complemento', '', 'trim|max_length[145]');
            $this->form_validation->set_rules('vendedor_cidade', '', 'trim|required|max_length[50]');
            $this->form_validation->set_rules('vendedor_estado', '', 'trim|required|exact_length[2]');
            $this->form_validation->set_rules('vendedor_obs', '', 'max_length[500]');
       
            if($this->form_validation->run()){
                 $data = elements(
                array(
                    'vendedor_codigo',
                    'vendedor_nome_completo',
                    'vendedor_cpf',
                    'vendedor_rg',
                    'vendedor_email',
                    'vendedor_telefone',
                    'vendedor_celular',
                    'vendedor_endereco',
                    'vendedor_numero_endereco',
                    'vendedor_complemento',
                    'vendedor_bairro',
                    'vendedor_cep',
                    'vendedor_cidade',
                    'vendedor_estado',
                    'vendedor_ativo',
                    'vendedor_obs',
                    
                ),
                $this->input->post()
            );
            $data['vendedor_estado'] = strtoupper($this->input->post('vendedor_estado'));
            $data = html_escape($data);

            $this->core_model->insert('vendedores', $data);

            redirect('vendedores');
            
            } else {
                $data = array(
                'titulo' => 'Cadastrar vendedor',  
                'scripts' => array(
                    'vendor/mask/jquery.mask.min.js',
                    'vendor/mask/app.js', 
                ),
                    'vendedor_codigo'=> $this->core_model->generate_unique_code('vendedores','numeric',8,'vendedor_codigo'),
              
            );
            /*echo '<pre>';
            print_r($data['vendedor']);
            exit();*/
            $this->load->view("layout/header", $data);
            $this->load->view("vendedores/add");
            $this->load->view("layout/footer");
        }  
    }

    ///////////////////////*******************************************************
    
    public function edit($vendedor_id=null){
        if (!$vendedor_id || !$this->core_model->get_by_id('vendedores', array('vendedor_id' => $vendedor_id))){
            $this->session->set_flashdata('error', 'Vendedor não encontrado');
            redirect('vendedores');
        } else { 
            $this->form_validation->set_rules('vendedor_nome_completo', '', 'trim|required|min_length[4]|max_length[145]');
            $this->form_validation->set_rules('vendedor_codigo', '', 'trim|required|exact_length[8]');
           
            $this->form_validation->set_rules('vendedor_cpf', '', 'trim|required|exact_length[9]');
            $this->form_validation->set_rules('vendedor_rg', '', 'trim|required|max_length[13]');
            $this->form_validation->set_rules('vendedor_email', '', 'trim|required|valid_email|max_length[50]|callback_check_email');
            $this->form_validation->set_rules('vendedor_telefone', '', 'trim|min_length[15]');
            $this->form_validation->set_rules('vendedor_celular', '', 'trim|required|min_length[16]|callback_check_telefone');
            $this->form_validation->set_rules('vendedor_cep', '', 'trim|required|exact_length[8]');
            $this->form_validation->set_rules('vendedor_endereco', '', 'trim|required|max_length[155]');
            $this->form_validation->set_rules('vendedor_numero_endereco', '', 'trim|required|max_length[4]');
            $this->form_validation->set_rules('vendedor_bairro', '', 'trim|required|max_length[45]');
            $this->form_validation->set_rules('vendedor_complemento', '', 'trim|max_length[145]');
            $this->form_validation->set_rules('vendedor_cidade', '', 'trim|required|max_length[50]');
            $this->form_validation->set_rules('vendedor_estado', '', 'trim|required|exact_length[2]');
            $this->form_validation->set_rules('vendedor_obs', '', 'max_length[500]');
       
            if($this->form_validation->run()){
                 $data = elements(
                array(
                    'vendedor_codigo',
                    'vendedor_nome_completo',
                    'vendedor_cpf',
                    'vendedor_rg',
                    'vendedor_email',
                    'vendedor_telefone',
                    'vendedor_celular',
                    'vendedor_endereco',
                    'vendedor_numero_endereco',
                    'vendedor_complemento',
                    'vendedor_bairro',
                    'vendedor_cep',
                    'vendedor_cidade',
                    'vendedor_estado',
                    'vendedor_ativo',
                    'vendedor_obs',
                    
                ),
                $this->input->post()
            );
            $data['vendedor_estado'] = strtoupper($this->input->post('vendedor_estado'));
            $data = html_escape($data);

            $this->core_model->update('vendedores', $data, array('vendedor_id' => $vendedor_id));

            redirect('vendedores');
            
            } else {
                $data = array(
                'titulo' => 'Atualizar vendedor',  
                'scripts' => array(
                    'vendor/mask/jquery.mask.min.js',
                    'vendor/mask/app.js', 
                ),
                'vendedor' => $this->core_model->get_by_id('vendedores', array('vendedor_id' => $vendedor_id)),
            );
            /*echo '<pre>';
            print_r($data['vendedor']);
            exit();*/
            $this->load->view("layout/header", $data);
            $this->load->view("vendedores/edit");
            $this->load->view("layout/footer");
        }
      }    
    }

    public function check_email($vendedor_email){
         $vendedor_id = $this->input->post('vendedor_id');
         if ($this->core_model->get_by_id('vendedores', array('vendedor_email' => $vendedor_email, 'vendedor_id !=' => $vendedor_id))){
             $this->form_validation->set_message('check_email', 'Esse email Já existe');
             return FALSE;
         } else {
             return TRUE;
         }
     }

    public function check_telefone($vendedor_telefone){
        $vendedor_id = $this->input->post('vendedor_id');

        // Verifica se o vendedor_id está presente na requisição POST
        if ($vendedor_id) {
            return TRUE; // Permite a edição sem verificar o telefone
        }

        if ($this->core_model->get_by_id('vendedores', array('vendedor_telefone' => $vendedor_telefone))){
            $this->form_validation->set_message('vendedor_telefone', 'Esse Telefone Já existe');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function check_celular($vendedor_celular){
         $vendedor_id = $this->input->post('vendedor_id');
         if ($this->core_model->get_by_id('vendedores', array('vendedor_telefone' => $vendedor_celular, 'vendedor_id !=' => $vendedor_id))){
             $this->form_validation->set_message('vendedor_telefone', 'Esse Telefone Já existe');
             return FALSE;
         } else {
             return TRUE;
         }
     }
    
    public function del($vendedor_id = null){
        if(!$vendedor_id || !$this->core_model->get_by_id('vendedores',array('vendedor_id'=> $vendedor_id))){
            $this->session->set_flashdata('error', 'Vendedor não encontrado');
            redirect('vendedores');
        } else {
            $this->core_model->delete('vendedores', array('vendedor_id' => $vendedor_id));
            redirect('vendedores');
        }
    }
}
