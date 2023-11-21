<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if (!$this->ion_auth->logged_in()){
            $this->session->set_flashdata('info','Sua Sessão expirou! ');
            redirect('login');
        }
    }
    
    public function index(){
        $data = array(
            'titulo' => 'Clientes cadastrados',
            'styles' => array(
                'vendor/datatables/dataTables.bootstrap4.min.css',
            ),
            'scripts' => array(
                'vendor/datatables/jquery.dataTables.min.js',
                'vendor/datatables/dataTables.bootstrap4.min.js',
                'vendor/datatables/app.js'
            ),
            'clientes' => $this->core_model->get_all('clientes'),
        );

        $this->load->view("layout/header", $data);
        $this->load->view("clientes/index");
        $this->load->view("layout/footer");
    }
    
    public function edit($cliente_id = null){
        if (!$cliente_id || !$this->core_model->get_by_id('clientes', array('cliente_id' => $cliente_id))){
            $this->session->set_flashdata('error', 'Cliente não encontrado');
            redirect('clientes');
        } else {
            $this->form_validation->set_rules('cliente_nome', '', 'trim|required|min_length[4]|max_length[45]');
            $this->form_validation->set_rules('cliente_sobrenome', '', 'trim|required|min_length[4]|max_length[150]');
            $this->form_validation->set_rules('cliente_data_nascimento', '', 'required');
            
            $cliente_tipo = $this->input->post('cliente_tipo');
            if ($cliente_tipo == 1){
                $this->form_validation->set_rules('cliente_cnpj', '', 'trim|required|exact_length[9]');
            } else {
                $this->form_validation->set_rules('cliente_cpf', '', 'trim|required|exact_length[10]');
            }
            
            $this->form_validation->set_rules('cliente_rg_ie', '', 'trim|required|max_length[13]|callback_check_rg_ie');
            
            $this->form_validation->set_rules('cliente_email', '', 'trim|required|valid_email|max_length[50]|callback_check_email');
            
            if (!empty($this->input->post('cliente_telefone'))){
                $this->form_validation->set_rules('cliente_telefone', '', 'trim|required|min_length[16]|callback_check_telefone');
            }  
            if (!empty($this->input->post('cliente_celular'))){
                $this->form_validation->set_rules('cliente_celular', '', 'trim|required|min_length[16]|callback_check_celular');
            }
            $this->form_validation->set_rules('cliente_cep', '', 'trim|required|exact_length[8]');
            $this->form_validation->set_rules('cliente_endereco', '', 'trim|required|max_length[155]');
            $this->form_validation->set_rules('cliente_numero_endereco', '', 'trim|required|max_length[4]');
            $this->form_validation->set_rules('cliente_bairro', '', 'trim|required|max_length[45]');
            $this->form_validation->set_rules('cliente_complemento', '', 'trim|max_length[145]');
            $this->form_validation->set_rules('cliente_cidade', '', 'trim|required|max_length[50]');
            $this->form_validation->set_rules('cliente_estado', '', 'trim|required|exact_length[2]');
            $this->form_validation->set_rules('cliente_obs', '', 'max_length[500]');
            $this->form_validation->set_rules('cliente_sexo', '', 'trim|required|exact_length[1]');
            
            if($this->form_validation->run()){
              /*$cliente_ativo = $this->input->post('cliente_ativo');
                    $contas_associadas = $this->core_model->check_cliente_association($cliente_id, $cliente_ativo);
                    if ($contas_associadas) {
                        $this->session->set_flashdata('info', 'Este cliente não pode ser desativado, pois está sendo usado em Contas a Receber');
                        redirect('clientes');
                    }
                }*/

                $data = elements(
                    array(
                        'cliente_nome',
                        'cliente_sobrenome',
                        'cliente_data_nascimento',
                        'cliente_rg_ie',
                        'cliente_email',
                        'cliente_telefone',
                        'cliente_celular',
                        'cliente_endereco',
                        'cliente_numero_endereco',
                        'cliente_complemento',
                        'cliente_bairro',
                        'cliente_cep',
                        'cliente_cidade',
                        'cliente_estado',
                        'cliente_ativo',
                        'cliente_obs',
                        'cliente_tipo',
                        'cliente_sexo',
                    ),
                    $this->input->post()
                );

                if($cliente_tipo == 1){
                    $data['cliente_cpf_cnpj'] = $this->input->post('cliente_cnpj');
                } else {
                    $data['cliente_cpf_cnpj'] = $this->input->post('cliente_cpf');
                }
                $data['cliente_estado'] = strtoupper($this->input->post('cliente_estado'));
                $data = html_escape($data);

                $this->core_model->update('clientes', $data, array('cliente_id' => $cliente_id));

                redirect('clientes');

            } else {
                $data = array(
                    'titulo' => 'Atualizar Cliente',  
                    'scripts' => array(
                        'vendor/mask/jquery.mask.min.js',
                        'vendor/mask/app.js', 
                    ),
                    'cliente' => $this->core_model->get_by_id('clientes', array('cliente_id' => $cliente_id)),
                );

                $this->load->view("layout/header", $data);
                $this->load->view("clientes/edit");
                $this->load->view("layout/footer");
            }
        }
    }

    public function add(){
        $this->form_validation->set_rules('cliente_nome', '', 'trim|required|min_length[4]|max_length[45]');
        $this->form_validation->set_rules('cliente_sobrenome', '', 'trim|required|min_length[4]|max_length[150]');
        $this->form_validation->set_rules('cliente_data_nascimento', '', 'required');
        
        $cliente_tipo = $this->input->post('cliente_tipo');
        if ($cliente_tipo == 1){
            $this->form_validation->set_rules('cliente_cnpj', '', 'trim|required|exact_length[9]');
        } else {
            $this->form_validation->set_rules('cliente_cpf', '', 'trim|required|exact_length[10]');
        }
        
        $this->form_validation->set_rules('cliente_rg_ie', '', 'trim|required|max_length[13]|is_unique[clientes.cliente_rg_ie]');
        
        $this->form_validation->set_rules('cliente_email', '', 'trim|required|valid_email|max_length[50]|is_unique[clientes.cliente_email]');
        
        if (!empty($this->input->post('cliente_telefone'))){
            $this->form_validation->set_rules('cliente_telefone', '', 'trim|required|min_length[15]|is_unique[clientes.cliente_telefone]');
        }  
        if (!empty($this->input->post('cliente_celular'))){
            $this->form_validation->set_rules('cliente_celular', '', 'trim|required|min_length[15]|is_unique[clientes.cliente_telefone]');
        }
        $this->form_validation->set_rules('cliente_cep', '', 'trim|required|exact_length[8]');
        $this->form_validation->set_rules('cliente_endereco', '', 'trim|required|max_length[155]');
        $this->form_validation->set_rules('cliente_numero_endereco', '', 'trim|required|max_length[4]');
        $this->form_validation->set_rules('cliente_bairro', '', 'trim|required|max_length[45]');
        $this->form_validation->set_rules('cliente_complemento', '', 'trim|max_length[145]');
        $this->form_validation->set_rules('cliente_cidade', '', 'trim|required|max_length[50]');
        $this->form_validation->set_rules('cliente_estado', '', 'trim|required|exact_length[2]');
        $this->form_validation->set_rules('cliente_obs', '', 'max_length[500]');
        $this->form_validation->set_rules('cliente_sexo', '', 'trim|required|exact_length[1]');
        
        if($this->form_validation->run()){
            $data = elements(
                array(
                    'cliente_nome',
                    'cliente_sobrenome',
                    'cliente_data_nascimento',
                    'cliente_rg_ie',
                    'cliente_email',
                    'cliente_telefone',
                    'cliente_celular',
                    'cliente_endereco',
                    'cliente_numero_endereco',
                    'cliente_complemento',
                    'cliente_bairro',
                    'cliente_cep',
                    'cliente_cidade',
                    'cliente_estado',
                    'cliente_ativo',
                    'cliente_obs',
                    'cliente_tipo',
                    'cliente_sexo',
                ),
                $this->input->post()
            );

            if($cliente_tipo == 1){
                $data['cliente_cpf_cnpj'] = $this->input->post('cliente_cnpj');
            } else {
                $data['cliente_cpf_cnpj'] = $this->input->post('cliente_cpf');
            }
            $data['cliente_estado'] = strtoupper($this->input->post('cliente_estado'));
            $data = html_escape($data);

            $this->core_model->insert('clientes', $data);

            redirect('clientes');

        } else {
            $data = array(
                'titulo' => 'Cadastrar Cliente',  
                'scripts' => array(
                    'vendor/mask/jquery.mask.min.js',
                    'vendor/mask/app.js',
                    'js/clientes.js'
                ),
            );

            $this->load->view("layout/header", $data);
            $this->load->view("clientes/add");
            $this->load->view("layout/footer");
        }
    }

    public function check_rg_ie($cliente_rg_ie){
         $cliente_id = $this->input->post('cliente_id');
         if ($this->core_model->get_by_id('clientes', array('cliente_rg_ie' => $cliente_rg_ie, 'cliente_id !=' => $cliente_id))){
             $this->form_validation->set_message('check_rg_ie', 'Esse BI Já existe');
             return FALSE;
         } else {
             return TRUE;
         }
     }

    public function check_email($cliente_email){
         $cliente_id = $this->input->post('cliente_id');
         if ($this->core_model->get_by_id('clientes', array('cliente_email' => $cliente_email, 'cliente_id !=' => $cliente_id))){
             $this->form_validation->set_message('check_email', 'Esse email Já existe');
             return FALSE;
         } else {
             return TRUE;
         }
     }

    public function check_telefone($cliente_telefone){
        $cliente_id = $this->input->post('cliente_id');

        // Verifica se o cliente_id está presente na requisição POST
        if ($cliente_id) {
            return TRUE; // Permite a edição sem verificar o telefone
        }

        if ($this->core_model->get_by_id('clientes', array('cliente_telefone' => $cliente_telefone))){
            $this->form_validation->set_message('cliente_telefone', 'Esse Telefone Já existe');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function check_celular($cliente_celular){
         $cliente_id = $this->input->post('cliente_id');
         if ($this->core_model->get_by_id('clientes', array('cliente_telefone' => $cliente_celular, 'cliente_id !=' => $cliente_id))){
             $this->form_validation->set_message('cliente_telefone', 'Esse Telefone Já existe');
             return FALSE;
         } else {
             return TRUE;
         }
     }
    
    public function del($cliente_id = null){
        if(!$cliente_id || !$this->core_model->get_by_id('clientes',array('cliente_id'=> $cliente_id))){
            $this->session->set_flashdata('error', 'Cliente não encontrado');
            redirect('clientes');
        } else {
            $this->core_model->delete('clientes', array('cliente_id' => $cliente_id));
            redirect('clientes');
        }
    }
    
    public function check_cliente_association($cliente_id, $cliente_ativo) {
        if ($this->db->table_exists('contas_receber')) {
            $conta_receber = $this->Financeiro_model->get_by_id('contas_receber', array('conta_receber_cliente_id' => $cliente_id, 'conta_receber_status' => 1));

            if ($conta_receber && $cliente_ativo == 0) {
                return true; // Cliente está associado a contas a receber ativas
            }
        }

        return false; // Cliente não está associado a contas a receber ativas ou a tabela 'contas_receber' não existe
    }

}
