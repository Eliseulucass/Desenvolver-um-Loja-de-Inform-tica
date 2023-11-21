<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Formas_pagamentos extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        if (!$this->ion_auth->logged_in()) {
            $this->session->set_flashdata('info', 'Sua Sessão expirou! ');
            redirect('login');
        }
    }
    
    public function index() {
        $data = array(
            'titulo' => 'formas de pagamentos Cadastradas',
            'styles' => array(
                'vendor/datatables/dataTables.bootstrap4.min.css',
            ),
            'scripts' => array(
                'vendor/datatables/jquery.dataTables.min.js',
                'vendor/datatables/dataTables.bootstrap4.min.js',
                'vendor/datatables/app.js'
            ),
            'formas_pagamentos' => $this->core_model->get_all('formas_pagamentos'),
        );
        
      /*  echo '<pre>';
        print_r($data['formas_pagamentos']);
        exit();*/
        
        $this->load->view("layout/header", $data);
        $this->load->view("formas_pagamentos/index");
        $this->load->view("layout/footer");
    }
    
    public function add() {
        
        $this->form_validation->set_rules('forma_pagamento_nome','','trim|required|min_length[4]|max_length[45]|is_unique[formas_pagamentos.forma_pagamento_nome]');
        if($this->form_validation->run()){
            
            $data = elements(
                array(
                    'forma_pagamento_nome',
                    'forma_pagamento_ativa',
                    'forma_pagamento_aceita_parc',
                ),
                $this->input->post()
            );
            $data = html_escape($data);
            $this->core_model->insert('formas_pagamentos', $data);
            redirect('formas_pagamentos');
        }else{
            //erro de validacao
            $data = array(
            'titulo' => 'Cadastrar formas de pagamentos',
        );

        $this->load->view("layout/header", $data);
        $this->load->view("formas_pagamentos/add", $data);
        $this->load->view("layout/footer");
        }
  }
    
   public function edit($forma_pagamento_id = null) {
    if (!$forma_pagamento_id || !$this->core_model->get_by_id('formas_pagamentos', array('forma_pagamento_id' => $forma_pagamento_id))) {
        $this->session->set_flashdata('error', 'Forma de Pagamento não encontrada');
        redirect('formas_pagamentos');
    } else {
        // Obtenha os dados da forma de pagamento
        $forma_pagamento = $this->core_model->get_by_id('formas_pagamentos', array('forma_pagamento_id' => $forma_pagamento_id));

        // Verifique se a forma de pagamento foi encontrada
        if (!$forma_pagamento) {
            $this->session->set_flashdata('error', 'Forma de Pagamento não encontrada');
            redirect('formas_pagamentos');
        }
        
        $this->form_validation->set_rules('forma_pagamento_nome', '', 'trim|required|min_length[4]|max_length[45]|callback_check_pagamento_nome');

        if ($this->form_validation->run()) {
            $forma_pagamento_ativa = $this->input->post('forma_pagamento_ativa');

            if ($this->db->table_exists('vendas')) {
                if ($forma_pagamento_ativa == 0 && $this->core_model->get_by_conditions('vendas', array('venda_forma_pagamento_id' => $forma_pagamento_id, 'venda_status' => 0))) {
                    $this->session->set_flashdata('info', 'A forma de pagamento não pode ser desativada, pois está atualmente em uso em vendas.');
                    redirect('formas_pagamentos');
                }
            }

            if ($this->db->table_exists('ordens_servicos')) {
                if ($forma_pagamento_ativa == 0 && $this->core_model->get_by_conditions('ordens_servicos', array('ordem_servico_forma_pagamento_id' => $forma_pagamento_id, 'ordem_servico_status' => 0))) {
                    $this->session->set_flashdata('info', 'A forma de pagamento não pode ser desativada, pois está atualmente em uso em ordem de serviço.');
                    redirect('formas_pagamentos');
                }
            }

            $data = elements(
                array(
                    'forma_pagamento_nome',
                    'forma_pagamento_ativa',
                    'forma_pagamento_aceita_parc',
                ),
                $this->input->post()
            );
            $data = html_escape($data);
            $this->core_model->update('formas_pagamentos', $data, array('forma_pagamento_id' => $forma_pagamento_id));
            redirect('formas_pagamentos');
        } else {
            // erro de validacao
            $data = array(
                'titulo' => 'Editar formas de pagamentos',
                'forma_pagamento' => $forma_pagamento,
            );

            $this->load->view("layout/header", $data);
            $this->load->view("formas_pagamentos/edit", $data);
            $this->load->view("layout/footer");
        }
    }
}


  
  
    public function check_pagamento_nome($forma_pagamento_nome){
      $forma_pagamento_id = $this->input->post('forma_pagamento_id');
      
      if ($this->core_model->get_by_id('formas_pagamentos', array('forma_pagamento_nome'=>$forma_pagamento_nome,'forma_pagamento_id !='=>$forma_pagamento_id))){
           $this->form_validation->set_message('forma_pagamento_nome', 'Essa Forma de Pagamento Já existe');
          return FALSE;
      } else {
          return TRUE;
      }
  }
  
    public function del($forma_pagamento_id = null) {
    if (!$forma_pagamento_id || !$this->core_model->get_by_id('formas_pagamentos', array('forma_pagamento_id' => $forma_pagamento_id))) {
        $this->session->set_flashdata('error', 'Forma de Pagamento não encontrada');
        redirect('formas_pagamentos');
    } else {
        if ($this->core_model->get_by_id('formas_pagamentos', array('forma_pagamento_id' => $forma_pagamento_id, 'forma_pagamento_ativa' => 1))) {
            $this->session->set_flashdata('info', 'Não é possível excluir uma forma de pagamento que está ativa');
            redirect('formas_pagamentos');
        } else {
            $this->core_model->delete('formas_pagamentos', array('forma_pagamento_id' => $forma_pagamento_id));
            redirect('formas_pagamentos');
        }
    }
}
}