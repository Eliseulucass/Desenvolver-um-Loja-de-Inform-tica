<?php $this->load->view('layout/sidebar'); ?>

<div id="content">

    <?php $this->load->view('layout/navbar'); ?>

    <div class="container-fluid">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('formas_pagamentos'); ?>">Forma de Pagamento</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo; ?></li>
            </ol>
        </nav>

        <div class="card shadow mb-4">

            <div class="card-body">
                <form class="user" method="POST" name="form_add">
                   
                    <fieldset class="mt-4 border p-2">
                        <legend class="font-small"><i class="fas fa-money-check-alt text-gray-900"></i>&nbsp;Dados da Forma de Pagamento</legend>
                        
                        <div class="form-group row mb-3">
                            <div class="col-md-6">
                                <label>Forma de Pagamento</label>
                                <input type="text" class="form-control form-control-user" name="forma_pagamento_nome" placeholder="nome do forma_pagamento" value="<?php echo set_value('forma_pagamento_nome'); ?>">
                                <?php echo form_error('forma_pagamento_nome','<small class="form-text text-danger">','</small>'); ?>
                            </div>
                            
                            <div class="col-md-3">
                                <label>Forma de Pagamento Ativa</label>
                                <select class="custom-select" name="forma_pagamento_ativa">
                                    <option value="0">Não</option>
                                    <option value="1">Sim</option>
                                </select>
                            </div>
                            
                            <div class="col-md-3">
                                <label>Aceita Parcelamento</label>
                                <select class="custom-select" name="forma_pagamento_aceita_parc">
                                    <option value="0">Não</option>
                                    <option value="1">Sim</option>
                                </select>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="mt-4 border p-2">
                        <legend class="font-small"><i class="fas fa-tools"></i>&nbsp;Configurações</legend>
                       
                        <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                        <a title="Voltar" href="<?php echo base_url('formas_pagamentos'); ?>" class="btn btn-success btn-sm ml-2"></i>&nbsp;Voltar</a>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
