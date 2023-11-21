
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
                <form class="user" method="POST" name="form_add">
                    

                    <!-- Primeiro fieldset -->
                    <fieldset class="mt-4 border p-2">
                        <legend class="font-small"><i class="fas fa-laptop-house"></i>&nbsp;Dados Servico</legend>
                        
                        <div class="form-group row mb-3">
                            <div class="col-md-4">
                                <label>Titulo do Servico</label>
                                <input type="text" class="form-control form-control-user" name="servico_nome" placeholder="nome do servico" value="<?php echo set_value('$servico_nome'); ?>">
                                <?php echo form_error('servico_nome','<small class="form-text text-danger">','</small>'); ?>
                            </div>
                            <div class="col-md-2">
                                <label>Preço</label>
                                <input type="text" class="form-control form-control-user money" name="servico_preco" placeholder="Codigo do servico" value="<?php echo set_value('servico_preco'); ?>">
                                <?php echo form_error('servico_preco','<small class="form-text text-danger">','</small>'); ?>
                            </div>
                            <div class="col-md-4">
                                <label>Vendedor Ativo</label>
                                <select class="custom-select" name="servico_ativo">
                                    <option value="0">Não</option>
                                    <option value="1">Sim</option>
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
                                <input type="text" class="form-control form-control-user" name="servico_descricao" style="min-height: 100px!important" value="<?php echo set_value('servico_descricao'); ?>">
                                <?php echo form_error('servico_descricao','<small class="form-text text-danger">','</small>'); ?>
                            </div>
                             
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
