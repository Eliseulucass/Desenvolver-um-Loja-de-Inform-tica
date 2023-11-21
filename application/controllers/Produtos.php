<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        // Verifique se existe uma sessão (você pode adicionar sua lógica de verificação de sessão aqui)
        if (!$this->ion_auth->logged_in()){
            $this->session->set_flashdata('info','Sua Sessão expirou! ');
            redirect('login');
        }
        $this->load->model('Produtos_model');
    }
    
    public function index(){
        $data = array(
            'titulo' => 'produtos cadastrados',
            'styles' => array(
                'vendor/datatables/dataTables.bootstrap4.min.css',
            ),
            'scripts' => array(
                'vendor/datatables/jquery.dataTables.min.js',
                'vendor/datatables/dataTables.bootstrap4.min.js',
                'vendor/datatables/app.js'
            ),
            'produtos' => $this->Produtos_model->get_all(),
        );
        $this->load->view("layout/header", $data);
        $this->load->view("produtos/index");
        $this->load->view("layout/footer");
    }
    public function add (){
        $this->form_validation->set_rules('produto_descricao','','trim|required|min_length[2]|max_length[145]|is_unique[produtos.produto_descricao]');
        $this->form_validation->set_rules('produto_unidade','produto unidade','trim|required|min_length[2]|max_length[20]');
        $this->form_validation->set_rules('produto_preco_custo','preço custa','trim|required|max_length[45]');
        $this->form_validation->set_rules('produto_preco_venda','preço venda','trim|required|max_length[45]|callback_check_produto_preco_venda');
        $this->form_validation->set_rules('produto_estoque_minimo','estoque minimo','trim|required|greater_than_equal_to[0]');
        $this->form_validation->set_rules('produto_qtde_estoque','quantidade em estoque','trim|required');
        $this->form_validation->set_rules('produto_obs','quantidade em estoque','trim|max_length[200]');

        if ($this->form_validation->run()) {
            // Se a validação do formulário passar, prosseguimos
        
            $data = elements(
                array(
                    'produto_codigo',
                    'produto_categoria_id',
                    'produto_marca_id',
                    'produto_fornecedor_id',
                    'produto_descricao',
                    'produto_unidade',
                    'produto_preco_custo',
                    'produto_preco_venda',
                    'produto_estoque_minimo',
                    'produto_qtde_estoque',
                    'produto_ativo',
                    'produto_obs',
                ),
                $this->input->post()
            );
        
            $data = html_escape($data);
        
            // Debugging: imprime os dados para verificar se estão corretos
          /*  echo '<pre>';
            print_r($data);
            exit();*/
        
            $this->core_model->insert('produtos', $data);
        
            // Após a atualização, redireciona para a página de produtos
            redirect('produtos');
        } else {
            // Caso haja erro de validação
        
          $data = array(
                'titulo' => 'Cadastrar Produto',  
                'scripts' => array(
                    'vendor/mask/jquery.mask.min.js',
                    'vendor/mask/app.js', 
                ),
                'produto_codigo' => $this->core_model->generate_unique_code('produtos','numeric',8,'produto_codigo'),
                'marcas' => $this->core_model->get_all('marcas', array('marca_ativa'=>1)),
                'categorias' => $this->core_model->get_all('categorias', array('categoria_ativa'=>1)),
                'fornecedores' => $this->core_model->get_all('fornecedores', array('fornecedor_ativo'=>1)),
            );

            $this->load->view("layout/header", $data);
            $this->load->view("produtos/add");
            $this->load->view("layout/footer");
        } 
    }
    
    public function edit ($produto_id = null){
        if(!$produto_id || !$this->core_model->get_by_id('produtos',array('produto_id'=>$produto_id))){
            $this->session->set_flasdata('error','Produto não encontrado');
            redirect('produtos');
        } else {
            
            $this->form_validation->set_rules('produto_descricao','','trim|required|min_length[2]|max_length[145]|is_unique[produtos.produto_descricao]');////callback_check_produto_descricao
            // No seu controlador, antes de definir as regras de validação
            if ($this->input->post('produto_id')) {
                // Se produto_id existe no POST, significa que é uma edição
                $produto_id = $this->input->post('produto_id');
                $this->form_validation->set_rules('produto_descricao', 'Descrição do Produto', 'trim|required|min_length[2]|max_length[145]');
            } else {
                // Se produto_id não existe, é uma inserção
                $this->form_validation->set_rules('produto_descricao', 'Descrição do Produto', 'trim|required|min_length[2]|max_length[145]|is_unique[tabela.produto_descricao]');
            }

            $this->form_validation->set_rules('produto_unidade','produto unidade','trim|required|min_length[2]|max_length[20]');
            $this->form_validation->set_rules('produto_preco_custo','preço custa','trim|required|max_length[45]');
            $this->form_validation->set_rules('produto_preco_venda','preço venda','trim|required|max_length[45]|callback_check_produto_preco_venda');
            $this->form_validation->set_rules('produto_estoque_minimo','estoque minimo','trim|required|greater_than_equal_to[0]');
            $this->form_validation->set_rules('produto_qtde_estoque','quantidade em estoque','trim|required');
            $this->form_validation->set_rules('produto_obs','quantidade em estoque','trim|max_length[200]');

            if ($this->form_validation->run()) {
                // Se a validação do formulário passar, prosseguimos
            
                $data = elements(
                    array(
                        'produto_codigo',
                        'produto_categoria_id',
                        'produto_marca_id',
                        'produto_fornecedor_id',
                        'produto_descricao',
                        'produto_unidade',
                        'produto_preco_custo',
                        'produto_preco_venda',
                        'produto_estoque_minimo',
                        'produto_qtde_estoque',
                        'produto_ativo',
                        'produto_obs',
                    ),
                    $this->input->post()
                );
            
                $data = html_escape($data);
            
                // Debugging: imprime os dados para verificar se estão corretos
              /*  echo '<pre>';
                print_r($data);
                exit();*/
            
                $this->core_model->update('produtos', $data, array('produto_id' => $produto_id));
            
                // Após a atualização, redireciona para a página de produtos
                redirect('produtos');
            } else {
                // Caso haja erro de validação
                $data = array(
                    'titulo' => 'Atualizar produto',  
                    'scripts' => array(
                        'vendor/mask/jquery.mask.min.js',
                        'vendor/mask/app.js', 
                    ),
                    'produto' => $this->core_model->get_by_id('produtos', array('produto_id' => $produto_id)),
                    'marcas' => $this->core_model->get_all('marcas', array('marca_ativa'=>1)),   
                    'categorias' => $this->core_model->get_all('categorias', array('categoria_ativa'=>1)),
                    'fornecedores' => $this->core_model->get_all('fornecedores', array('fornecedor_ativo'=>1)),
                );

                $this->load->view("layout/header", $data);
                $this->load->view("produtos/edit");
                $this->load->view("layout/footer");

            }   
        }
    }
    
    public function check_produto_descricao($produto_descricao){
        $produto_id = $this->input->post('produto_id');
        if($this->core_model->get_by_id('produto',array('produto_descricao' => $produto_descricao,'$produto_id !=' =>$produto_id))){
            $this->form_validation->set_message('check_produto_descricao','Esta Produto já existe');
            return FALSE;
        } else {
            return TRUE;
        }
    }   
    
    public function check_produto_preco_venda($produto_preco_venda){
        $produto_preco_custo = $this->input->post('produto_preco_custo');

        $produto_preco_custo = str_replace(".", '', $produto_preco_custo);
        $produto_preco_venda = str_replace(".", '', $produto_preco_venda);

        $produto_preco_custo = str_replace(",", '', $produto_preco_custo);
        $produto_preco_venda = str_replace(",", '', $produto_preco_venda);

        if($produto_preco_custo > $produto_preco_venda){
            $this->form_validation->set_message('check_produto_preco_venda','O preço de venda deve ser igual ou maior que o preço de custo');
            return FALSE;
        } else {
            return TRUE;
        }
    }   
    
    public function del($produto_id  = null){
        if(!$produto_id  || !$this->core_model->get_by_id('produtos',array('produto_id '=> $produto_id ))){
            $this->session->set_flashdata('error', 'produto não encontrado');
            redirect('produtos');
        } else {
            $this->core_model->delete('produtos', array('produto_id ' => $produto_id ));
            redirect('produtos');
        }
    }
}

