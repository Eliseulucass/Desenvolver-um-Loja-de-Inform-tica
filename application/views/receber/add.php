<?php $this->load->view('layout/sidebar'); ?>

<div id="content">
    <?php $this->load->view('layout/navbar'); ?>

    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('contas_receber'); ?>">Contas a Receber</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo;?></li>
            </ol>
        </nav>

        <div class="card shadow mb-4">
            <div class="card-body">
                <form class="user" method="POST" name="form_add">

                    <fieldset class="mt-4 border p-2">
                        <legend class="font-small"><i class="fas fa-money-bill-alt"></i>&nbsp;Dados da Conta</legend>
                        
                        <div class="form-group row mb-3">
                             <div class="col-md-5 mb-3">
                                <label>Cliente</label>
                                <select class="custom-select contas_pagar" name="conta_receber_cliente_id">
                                    <?php foreach ($clientes as $cliente): ?>
                                        <option title="<?php echo ($cliente->cliente_ativo == 0 ? 'Não pode ser escolhido' : 'Cliente Ativo');?>" value="<?php echo $cliente->cliente_id;?>">
                                            <?php echo ($cliente->cliente_ativo == 0 ? $cliente->cliente_nome . '&nbsp;->&nbsp;Inativa' : $cliente->cliente_nome); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <?php echo form_error('conta_receber_cliente_id','<small class="form-text text-danger">','</small>'); ?>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label>Data de Vencimento</label>
                                <input type="date" class="form-control form-control-user-date" name="conta_receber_data_vencto" value="<?php echo set_value('conta_receber_data_vencto'); ?>">
                                <?php echo form_error('conta_receber_data_vencimento','<small class="form-text text-danger">','</small>'); ?>
                            </div>

                            <div class="col-md-2 mb-3">
                                <label>Valor da Conta</label>
                                <input type="text" class="form-control form-control-user-date money2" name="conta_receber_valor" value="<?php echo set_value('conta_receber_valor'); ?>">
                                <?php echo form_error('conta_receber_valor','<small class="form-text text-danger">','</small>'); ?>
                            </div>

                            <div class="col-md-2">
                                <label>Conta Receber Ativo</label>
                                <select class="custom-select" name="conta_receber_status">
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
                                <textarea class="form-control form-control-user" name="conta_receber_obs"><?php echo set_value('conta_receber_obs') ; ?></textarea>
                                <?php echo form_error('conta_receber_obs','<small class="form-text text-danger">','</small>'); ?>
                            </div>
                        </div>                        
                        <button type="submit" class="btn btn-primary btn-sm">Salvar</button>

                        <a title="Voltar" href="<?php echo base_url('receber'); ?>" class="btn btn-success btn-sm ml-2">
                            <i class="fas fa-arrow-left"></i>&nbsp;Voltar
                        </a>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>

