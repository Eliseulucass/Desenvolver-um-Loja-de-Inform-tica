<?php $this->load->view('layout/sidebar'); ?>

<!-- Main Content -->
<div id="content">

    <?php $this->load->view('layout/navbar'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('marcas'); ?>">Marca</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo;?></li>
            </ol>
        </nav>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">

            <div class="card-body">
                <form class="user" method="POST" name="form_add">
                   
                    <!-- Primeiro fieldset -->
                    <fieldset class="mt-4 border p-2">
                        <legend class="font-small"><i class="fas fa-cubes"></i>&nbsp;Dados Marca</legend>
                        
                        <div class="form-group row mb-3">
                            <div class="col-md-8">
                                <label>Nome da Marca</label>
                                <input type="text" class="form-control form-control-user" name="marca_nome" placeholder="nome do marca" value="<?php echo set_value('marca_nome') ; ?>">
                                <?php echo form_error('marca_nome','<small class="form-text text-danger">','</small>'); ?>
                            </div>
                            
                            <div class="col-md-4">
                                <label>Marca Ativa</label>
                                <select class="custom-select" name="marca_ativa">
                                    <option value="0">Não</option>
                                    <option value="1">Sim</option>
                                </select>
                            </div>
                            
                            
                        </div>
                       
                        
                    </fieldset>
                    <!-- Terceiro fieldset -->
                    <fieldset class="mt-4 border p-2">
                        <legend class="font-small"><i class="fas fa-tools"></i>&nbsp;Configurações</legend>
                       
                                <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                                <a title="Voltar" href="<?php echo base_url('marcas'); ?>" class="btn btn-success btn-sm ml-2"></i>&nbsp;Voltar</a>
                        
                    </fieldset>

                    <!-- O restante do formulário continua aqui -->

                </form>

            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
