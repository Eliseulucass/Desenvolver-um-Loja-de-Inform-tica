<?php $this->load->view('layout/sidebar'); ?>

<div id="content">
    <?php $this->load->view('layout/navbar'); ?>

    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('contas_pagar'); ?>">Contas a Pagar</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo;?></li>
            </ol>
        </nav>

        <div class="card shadow mb-4">
            <div class="card-body">
                <form class="user" method="POST" name="form_edit">

                    <fieldset class="mt-4 border p-2">
                        <legend class="font-small"><i class="fas fa-money-bill-alt"></i>&nbsp;Dados da Conta</legend>
                        
                        <div class="form-group row mb-3">
                            <div class="col-md-5 mb-3">
                                <label>Fornecedor</label>
                                <select class="custom-select contas_pagar" name="conta_pagar_fornecedor_id">
                                    <?php foreach ($fornecedores as $fornecedor): ?>
                                        <option title="<?php echo ($fornecedor->fornecedor_ativo == 0 ? 'Não pode ser escolhido' : 'Fornecedor Ativo');?>" value="<?php echo $fornecedor->fornecedor_id;?>"><?php echo ($fornecedor->fornecedor_ativo == 0 ? $fornecedor->fornecedor_nome_fantasia . '&nbsp;->&nbsp;Inativa' : $fornecedor->fornecedor_nome_fantasia); ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php echo form_error('conta_pagar_fornecedor_id','<small class="form-text text-danger">','</small>'); ?>
                            </div>

                            <div class="col-md-2 mb-3">
                                <label>Data de Vencimento</label>
                                <input type="date" class="form-control form-control-user-date" name="conta_pagar_data_vencimento" value="<?php echo set_value('conta_pagar_data_vencimento'); ?>">
                                <?php echo form_error('conta_pagar_data_vencimento','<small class="form-text text-danger">','</small>'); ?>
                            </div>


                            <div class="col-md-2 mb-3">
                                <label>Valor da Conta</label>
                                <input type="text" class="form-control form-control-user-date money2" name="conta_pagar_valor" value="<?php echo set_value('conta_pagar_valor'); ?>">
                                <?php echo form_error('conta_pagar_valor','<small class="form-text text-danger">','</small>'); ?>
                            </div>

                            <div class="col-md-2">
                                <label>Conta Pagar Ativo</label>
                                <select class="custom-select" name="conta_pagar_status">
                                    <option value="0">Pendente</option>
                                    <option value="1">paga</option>
                                </select>
                            </div>

                        </div>
                    </fieldset>
                    
                    <fieldset class="mt-4 border p-2">
                        <legend class="font-small"><i class="fas fa-tools"></i>&nbsp;Configurações</legend>

                        <div class="form-group row">
                            <div class="col-md-9 md-3">
                                <label>Observações da Conta</label>
                                <textarea class="form-control form-control-user" name="conta_pagar_obs"><?php echo set_value('conta_pagar_obs') ; ?></textarea>
                                <?php echo form_error('conta_pagar_obs','<small class="form-text text-danger">','</small>'); ?>
                            </div>
                        </div>                        
                        <button type="submit" class="btn btn-primary btn-sm">Salvar</button>

                        <a title="Voltar" href="<?php echo base_url('pagar'); ?>" class="btn btn-success btn-sm ml-2">
                            <i class="fas fa-arrow-left"></i>&nbsp;Voltar
                        </a>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
