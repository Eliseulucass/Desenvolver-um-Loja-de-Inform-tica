<?php

defined('BASEPATH') OR exit ('Ação não permitida');

class Core_model extends CI_Model{
    public function get_all($tabela = NULL , $condicao = NULL){
        if($tabela){
            if(is_array($condicao)){
                $this->db->where($condicao);
            }
            return $this->db->get($tabela)->result();
        }else{
            return FALSE;
        }
    }
    
    public function get_by_id($tabela = null, $condicao = null) {
        if ($tabela && is_array($condicao)){
            $this->db->where($condicao);
            $this->db->limit(1);
            
            return $this->db->get($tabela)->row();
        } else {
            return FALSE;
        }   
    }
    
    public function insert($tabela = null, $data= null, $get_last_id = null) {
        if ($tabela && is_array($data)){
            $this->db->insert($tabela, $data);
            if ($get_last_id){
                $this->session->set_userdata( 'last_id', $this->db->insert_id());
            }
            if ($this->db->affected_rows() > 0){
                $this->session->set_flashdata('Sucesso', 'Dados salvos com sucesso');
            } else {
                $this->session->set_flashdata('Erro', 'Erro ao salvar dados');
            }
        } else {    
        } 
    }
    
    public function update($tabela= null, $data = null, $condicao = Null){
         if ($tabela && is_array($data) && is_array($condicao)){
            if($this->db->update($tabela, $data,$condicao)){
             $this->session->set_flashdata('Sucesso','Data salvos com sucesso');
         } else {
             $this->session->set_flashdata('Erro','Erro ao atualizar os dados');
         }
       } else {
           return FALSE;
       }
  }

    public function delete($tabela= null, $condica = null){
        $this->db->db_debug = FALSE;
        if ($tabela && is_array($condica)){
            $status = $this->db->delete($tabela, $condica);
            $error = $this->db->error(); // Correção aqui
            if(!$status){
                foreach ($error as $code){
                    if($code == 1451){
                        $this->session->set_flashdata('Erro','Esse registro não pode ser excluído, pois está sendo utilizado em outra tabela');
                    }
                }
            } else {
                $this->session->set_flashdata('Sucesso','Registro excluído com sucesso');
            }
            $this->db->db_debug = TRUE;
        } else {
            return FALSE;
        }
    }
    
    /**
     * @ Habilitar helper string
     * @param string $table
     * @param string $type_of_code. Ex.: 'numeric', 'alpha', 'alnum', 'basic', 'numeric', 'nozero', 'md5', 'sha1'
     * @param int $size_of_code
     * @param string $field_seach
     * @return int
     */
    public function generate_unique_code($table = NULL, $type_of_code = NULL, $size_of_code, $field_search) {

        do {
            $code = random_string($type_of_code, $size_of_code);
            $this->db->where($field_search, $code);
            $this->db->from($table);
        } while ($this->db->count_all_results() >= 1);

        return $code;
    }
    
    public function check_cliente_association($cliente_id) {
        if ($this->db->table_exists('contas_receber')) {
            $conta_receber = $this->Financeiro_model->get_by_id('contas_receber', array('conta_receber_cliente_id' => $cliente_id, 'conta_receber_status' => 1));

            if ($conta_receber) {
                return true; // Cliente está associado a contas a receber ativas
            } else {
                return false; // Cliente não está associado a contas a receber ativas
            }
        }

        return false; // Tabela 'contas_receber' não existe
    }


}
