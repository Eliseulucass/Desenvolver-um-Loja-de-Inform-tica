<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fornecedores extends CI_Controller {
    
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
            'titulo' => 'Fornecedores cadastrados',
            'styles' => array(
                'vendor/datatables/dataTables.bootstrap4.min.css',
            ),
            'scripts' => array(
                'vendor/datatables/jquery.dataTables.min.js',
                'vendor/datatables/dataTables.bootstrap4.min.js',
                'vendor/datatables/app.js'
            ),
            'fornecedores' => $this->core_model->get_all('fornecedores'),
        );

        $this->load->view("layout/header", $data);
        $this->load->view("fornecedores/index");
        $this->load->view("layout/footer");
    }

    public function add(){
        $this->form_validation->set_rules('fornecedor_nome_fantasia', '', 'trim|required|min_length[4]|max_length[145]|is_unique[fornecedores.fornecedor_nome_fantasia]');
        $this->form_validation->set_rules('fornecedor_razao', '', 'trim|required|min_length[4]|max_length[200]');
        $this->form_validation->set_rules('fornecedor_cnpj', '', 'trim|required|exact_length[9]');
        $this->form_validation->set_rules('fornecedor_ie', '', 'trim|required|max_length[10]|is_unique[fornecedores.fornecedor_ie]|callback_check_ie');
        $this->form_validation->set_rules('fornecedor_email', '', 'trim|required|valid_email|max_length[50]|is_unique[fornecedores.fornecedor_email]|callback_check_email');
        $this->form_validation->set_rules('fornecedor_telefone', '', 'trim|required|min_length[15]|is_unique[fornecedores.fornecedor_telefone]|callback_check_telefone');
        $this->form_validation->set_rules('fornecedor_celular', '', 'trim|min_length[16]');
        $this->form_validation->set_rules('fornecedor_cep', '', 'trim|required|exact_length[8]');
        $this->form_validation->set_rules('fornecedor_endereco', '', 'trim|required|max_length[155]');
        $this->form_validation->set_rules('fornecedor_numero_endereco', '', 'trim|required|max_length[4]');
        $this->form_validation->set_rules('fornecedor_bairro', '', 'trim|required|max_length[45]');
        $this->form_validation->set_rules('fornecedor_complemento', '', 'trim|max_length[145]');
        $this->form_validation->set_rules('fornecedor_cidade', '', 'trim|required|max_length[50]');
        $this->form_validation->set_rules('fornecedor_estado', '', 'trim|required|exact_length[2]');
        $this->form_validation->set_rules('fornecedor_obs', '', 'max_length[500]');
       
        
        if($this->form_validation->run()){
            $data = elements(
                array(
                    'fornecedor_nome_fantasia',
                    'fornecedor_razao',
                    'fornecedor_cnpj',
                    'fornecedor_ie',
                    'fornecedor_email',
                    'fornecedor_telefone',
                    'fornecedor_celular',
                    'fornecedor_endereco',
                    'fornecedor_numero_endereco',
                    'fornecedor_complemento',
                    'fornecedor_bairro',
                    'fornecedor_cep',
                    'fornecedor_cidade',
                    'fornecedor_estado',
                    'fornecedor_ativo',
                    'fornecedor_obs',
                ),
                $this->input->post()
            );
            $data['fornecedor_estado'] = strtoupper($this->input->post('fornecedor_estado'));
            $data = html_escape($data);

            $this->core_model->insert('fornecedores', $data);

            redirect('fornecedores');
        } else {
            $data = array(
                'titulo' => 'Cadastrar fornecedor',  
                'scripts' => array(
                    'vendor/mask/jquery.mask.min.js',
                    'vendor/mask/app.js', 
                ),
            );

            $this->load->view("layout/header", $data);
            $this->load->view("fornecedores/add");
            $this->load->view("layout/footer");
        }
    }

    public function edit($fornecedor_id=null){
        if (!$fornecedor_id || !$this->core_model->get_by_id('fornecedores', array('fornecedor_id' => $fornecedor_id))){
            $this->session->set_flashdata('error', 'fornecedor não encontrado');
            redirect('fornecedores');
        } else { 
            $this->form_validation->set_rules('fornecedor_nome_fantasia', '', 'trim|required|min_length[4]|max_length[145]|callback_check_nome_fantasia');
            $this->form_validation->set_rules('fornecedor_razao', '', 'trim|required|min_length[4]|max_length[200]');
            $this->form_validation->set_rules('fornecedor_cnpj', '', 'trim|required|exact_length[9]');
            $this->form_validation->set_rules('fornecedor_ie', '', 'trim|required|max_length[10]|callback_check_ie');
            $this->form_validation->set_rules('fornecedor_email', '', 'trim|required|valid_email|max_length[50]|callback_check_email');
            $this->form_validation->set_rules('fornecedor_telefone', '', 'trim|required|min_length[15]|callback_check_telefone');
            $this->form_validation->set_rules('fornecedor_celular', '', 'trim|min_length[16]');
            $this->form_validation->set_rules('fornecedor_cep', '', 'trim|required|exact_length[8]');
            $this->form_validation->set_rules('fornecedor_endereco', '', 'trim|required|max_length[155]');
            $this->form_validation->set_rules('fornecedor_numero_endereco', '', 'trim|required|max_length[4]');
            $this->form_validation->set_rules('fornecedor_bairro', '', 'trim|required|max_length[45]');
            $this->form_validation->set_rules('fornecedor_complemento', '', 'trim|max_length[145]');
            $this->form_validation->set_rules('fornecedor_cidade', '', 'trim|required|max_length[50]');
            $this->form_validation->set_rules('fornecedor_estado', '', 'trim|required|exact_length[2]');
            $this->form_validation->set_rules('fornecedor_obs', '', 'max_length[500]');

            if($this->form_validation->run()){

                $fornecedor_ativo = $this->input->post('fornecedor_ativo');
                if ($this->db->table_exists('produto')) {
                    if ($fornecedor_ativo == 0) {
                        $produto = $this->care_model->get_by_id('produtos', $produto_id);
                        if (!$produto) {
                            $this->session->set_flashdata('info', 'Este fornecedor não pode ser de redirecionado');
                            redirect('fornecedores');
                        }
                    } 
                }

                $data = elements(
                    array(
                        'fornecedor_nome_fantasia',
                        'fornecedor_razao',
                        'fornecedor_cnpj',
                        'fornecedor_ie',
                        'fornecedor_email',
                        'fornecedor_telefone',
                        'fornecedor_celular',
                        'fornecedor_endereco',
                        'fornecedor_numero_endereco',
                        'fornecedor_complemento',
                        'fornecedor_bairro',
                        'fornecedor_cep',
                        'fornecedor_cidade',
                        'fornecedor_estado',
                        'fornecedor_ativo',
                        'fornecedor_obs',
                        'fornecedor_contato',
                    ),
                    $this->input->post()
                );
                $data['fornecedor_estado'] = strtoupper($this->input->post('fornecedor_estado'));
                $data = html_escape($data);

                $this->core_model->update('fornecedores', $data, array('fornecedor_id' => $fornecedor_id));

                redirect('fornecedores');
            } else {
                $data = array(
                    'titulo' => 'Atualizar fornecedor',  
                    'scripts' => array(
                        'vendor/mask/jquery.mask.min.js',
                        'vendor/mask/app.js', 
                    ),
                    'fornecedor' => $this->core_model->get_by_id('fornecedores', array('fornecedor_id' => $fornecedor_id)),
                );

                $this->load->view("layout/header", $data);
                $this->load->view("fornecedores/edit");
                $this->load->view("layout/footer");
            }
        }    
    }

    public function check_nome_fantasia($fornecedor_nome_fantasia){
        $fornecedor_id = $this->input->post('fornecedor_id');
        $existing_fornecedor = $this->core_model->get_by_id('fornecedores', array('fornecedor_nome_fantasia' => $fornecedor_nome_fantasia));

        if ($existing_fornecedor && $existing_fornecedor->fornecedor_id != $fornecedor_id){
            $this->form_validation->set_message('check_nome_fantasia', 'Esse Fornecedor já existe');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function check_ie($fornecedor_ie){
        $fornecedor_id = $this->input->post('fornecedor_id');
        $existing_fornecedor = $this->core_model->get_by_id('fornecedores', array('fornecedor_ie' => $fornecedor_ie));

        if ($existing_fornecedor && $existing_fornecedor->fornecedor_id != $fornecedor_id){
            $this->form_validation->set_message('check_ie', 'Essa Alvará Comercial já existe');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function check_email($fornecedor_email){
         $fornecedor_id = $this->input->post('fornecedor_id');
         if ($this->core_model->get_by_id('fornecedores', array('fornecedor_email' => $fornecedor_email, 'fornecedor_id !=' => $fornecedor_id))){
             $this->form_validation->set_message('check_email', 'Esse email Já existe');
             return FALSE;
         } else {
             return TRUE;
         }
     }

    public function check_telefone($fornecedor_telefone){
        $fornecedor_id = $this->input->post('fornecedor_id');

        // Verifica se o fornecedor_id está presente na requisição POST
        if ($fornecedor_id) {
            return TRUE; // Permite a edição sem verificar o telefone
        }

        if ($this->core_model->get_by_id('fornecedores', array('fornecedor_telefone' => $fornecedor_telefone))){
            $this->form_validation->set_message('fornecedor_telefone', 'Esse Telefone Já existe');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function check_celular($fornecedor_celular){
         $fornecedor_id = $this->input->post('fornecedor_id');
         if ($this->core_model->get_by_id('fornecedores', array('fornecedor_telefone' => $fornecedor_celular, 'fornecedor_id !=' => $fornecedor_id))){
             $this->form_validation->set_message('fornecedor_telefone', 'Esse Telefone Já existe');
             return FALSE;
         } else {
             return TRUE;
         }
     }
    
    public function del($fornecedor_id = null){
        if(!$fornecedor_id || !$this->core_model->get_by_id('fornecedores',array('fornecedor_id'=> $fornecedor_id))){
            $this->session->set_flashdata('error', 'Fornecedor não encontrado');
            redirect('fornecedores');
        } else {
            $this->core_model->delete('fornecedores', array('fornecedor_id' => $fornecedor_id));
            redirect('fornecedores');
        }
    }
}
