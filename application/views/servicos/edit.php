<?php $this->load->view('layout/sidebar'); ?>

<!-- Main Content -->
<div id="content">

    <?php $this->load->view('layout/navbar'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('servicos'); ?>">Servicos</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo;?></li>
            </ol>
        </nav>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">

            <div class="card-body">
                <form class="user" method="POST" name="form_edit">
                    <p><strong><i class="fas fa-clock"></i>&nbsp;&nbsp;ultima alteração:&nbsp;<?php echo formata_data_banco_com_hora($servico->servico_data_alteracao) ?>;</strong></p>

                    <!-- Primeiro fieldset -->
                    <fieldset class="mt-4 border p-2">
                        <legend class="font-small"><i class="fas fa-laptop-house"></i>&nbsp;Dados Principais</legend>
                        
                        <div class="form-group row mb-3">
                            <div class="col-md-4">
                                <label>Titulo do Servico</label>
                                <input type="text" class="form-control form-control-user" name="servico_nome" placeholder="nome do servico" value="<?php echo $servico->servico_nome; ?>">
                                <?php echo form_error('servico_nome','<small class="form-text text-danger">','</small>'); ?>
                            </div>
                            <div class="col-md-2">
                                <label>Preço</label>
                                <input type="text" class="form-control form-control-user money" name="servico_preco" placeholder="Codigo do servico" value="<?php echo $servico->servico_preco; ?>">
                                <?php echo form_error('servico_preco','<small class="form-text text-danger">','</small>'); ?>
                            </div>
                            <div class="col-md-4">
                                <label>Vendedor Ativo</label>
                                <select class="custom-select" name="servico_ativo">
                                    <option value="0"<?php echo ($servico->servico_ativo == 0 ? ' selected' : ''); ?>>Não</option>
                                    <option value="1"<?php echo ($servico->servico_ativo == 1 ? ' selected' : ''); ?>>Sim</option>
                                </select>
                            </div>
                            
                            
                        </div>
                       
                        
                    </fieldset>

                    
                    <!-- Terceiro fieldset -->
                    <fieldset class="mt-4 border p-2">
                        <legend class="font-small"><i class="fas fa-tools"></i>&nbsp;Configurações</legend>
                        
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label>Descrição</label>
                                <input type="text" class="form-control form-control-user" name="servico_descricao" style="min-height: 100px!important" value="<?php echo $servico->servico_descricao; ?>">
                                <?php echo form_error('servico_descricao','<small class="form-text text-danger">','</small>'); ?>
                            </div>
                             <input type="hidden" name="servico_id" value="<?php echo $servico->servico_id; ?>" />
                        </div>
                                <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                                <a title="Voltar" href="<?php echo base_url('servicos'); ?>" class="btn btn-success btn-sm ml-2"></i>&nbsp;Voltar</a>
                        
                    </fieldset>

                    <!-- O restante do formulário continua aqui -->

                </form>

            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
