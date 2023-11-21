<?php $this->load->view('layout/sidebar'); ?>

<!-- Main Content -->
<div id="content">

    <?php $this->load->view('layout/navbar'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('vendedores'); ?>">Vendedores</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo;?></li>
            </ol>
        </nav>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">

            <div class="card-body">
                <form class="user" method="POST" name="form_add">
                   

                    <!-- Primeiro fieldset -->
                    <fieldset class="mt-4 border p-2">
                        <legend class="font-small"><i class="fas fa-user-secret"></i>&nbsp;Dados Principais</legend>
                        
                        <div class="form-group row mb-3">
                            <div class="col-md-4">
                                <label>Nome Vendedor ou Atendente</label>
                                <input type="text" class="form-control form-control-user" name="vendedor_nome_completo" placeholder="nome do vendedor" value="<?php echo set_value('vendedor_nome_completo'); ?>">
                                <?php echo form_error('vendedor_nome_completo','<small class="form-text text-danger">','</small>'); ?>
                            </div>
                            <div class="col-md-2">
                                <label>Codigo</label>
                                <input type="text" class="form-control form-control-user cod" name="vendedor_codigo" value="<?php echo $vendedor_codigo ?>"readonly="">
                               
                            </div>
                            <div class="col-md-2">
                                <label>NUIT</label>
                                <input type="text" class="form-control form-control-user cnpj" name="vendedor_cpf" placeholder="NUIT do vendedor" value="<?php echo set_value('vendedor_cpf'); ?>">
                                <?php echo form_error('vendedor_cpf','<small class="form-text text-danger">','</small>'); ?>
                            </div>
                            <div class="col-md-4">
                                <label>Bilhete de Identidade (BI)</label>
                                <input type="text" class="form-control form-control-user _rg_ie" name="vendedor_rg" placeholder="(BI) do vendedor" value="<?php echo set_value('vendedor_rg'); ?>">
                                <?php echo form_error('vendedor_rg','<small class="form-text text-danger">','</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <div class="col-md-4">
                                 <label>E-Mail</label>
                                 <input type="email" class="form-control form-control-user" name="vendedor_email" placeholder="e-mail do vendedor" value="<?php echo set_value('vendedor_email') ; ?>">
                                 <?php echo form_error('vendedor_email','<small class="form-text text-danger">','</small>'); ?>
                            </div>
                            <div class="col-md-4">
                                <label>Nº Telefone</label>
                                <input type="text" class="form-control form-control-user phone_with_ddd" name="vendedor_celular" placeholder="Nº Alternativo" value="<?php echo set_value('vendedor_celular') ; ?>">
                                <?php echo form_error('vendedor_celular','<small class="form-text text-danger">','</small>'); ?>
                            </div>
                            <div class="col-md-4">
                                 <label>Nº de Alternativo </label>
                                 <input type="text" class="form-control form-control-user phone_with_ddd" name="vendedor_telefone" placeholder="telefone do vendedor" value="<?php echo set_value('vendedor_telefone') ; ?>">
                                 <?php echo form_error('vendedor_telefone','<small class="form-text text-danger">','</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            
                            
                        </div>
                        
                        
                    </fieldset>

                    <!-- Segundo fieldset -->
                    <fieldset class="mt-4 border p-2">
                        <legend class="font-small"><i class="fas fa-map-marker-alt"></i>&nbsp;Dados Endereço</legend>
                        <div class="form-group row mb-3">
                            <div class="col-md-6">
                                <label>Endereço</label>
                                <input type="text" class="form-control form-control-user " name="vendedor_endereco" value="<?php echo set_value('vendedor_endereco') ; ?>">
                                <?php echo form_error('vendedor_endereco','<small class="form-text text-danger">','</small>'); ?>
                            </div>
                            <div class="col-md-2">
                                <label>NºEndereço</label>
                                <input type="text" class="form-control form-control-user en" name="vendedor_numero_endereco" value="<?php echo set_value('vendedor_numero_endereco') ; ?>">
                                <?php echo form_error('vendedor_numero_endereco','<small class="form-text text-danger">','</small>'); ?>
                             </div>
                            <div class="col-md-4">
                                <label>Alguma Doença</label>
                                <input type="text" class="form-control form-control-user " name="vendedor_complemento" value="<?php echo set_value('vendedor_complemento') ; ?>">
                                <?php echo form_error('vendedor_complemento','<small class="form-text text-danger">','</small>'); ?>
                             </div>
                        </div> 
                        <div class="form-group row mb-3">
                            <div class="col-md-4">
                                <label>Bairro</label>
                                <input type="text" class="form-control form-control-user" name="vendedor_bairro" value="<?php echo set_value('vendedor_bairro') ; ?>">
                                <?php echo form_error('vendedor_bairro','<small class="form-text text-danger">','</small>'); ?>
                             </div>
                            <div class="col-md-2">
                                <label>Código Postal</label>
                                <input type="text" class="form-control form-control-user cep" name="vendedor_cep" placeholder="Código Postal do vendedor" value="<?php echo set_value('vendedor_cep'); ?>">
                                <?php echo form_error('vendedor_cep','<small class="form-text text-danger">','</small>'); ?>
                            </div>
                            <div class="col-md-3">
                                <label>Cidade</label>
                                <input type="text" class="form-control form-control-user" name="vendedor_cidade" value="<?php echo set_value('vendedor_cidade'); ?>">
                                <?php echo form_error('vendedor_cidade','<small class="form-text text-danger">','</small>'); ?>
                            </div>

                            <div class="col-md-2">
                                <label>Província</label>
                                <input type="text" class="form-control form-control-user uf" name="vendedor_estado" value="<?php echo set_value('vendedor_estado') ; ?>">
                                <?php echo form_error('vendedor_estado','<small class="form-text text-danger">','</small>'); ?>
                            </div>
                        </div>
                        
                    </fieldset>

                    <!-- Terceiro fieldset -->
                    <fieldset class="mt-4 border p-2">
                        <legend class="font-small"><i class="fas fa-tools"></i>&nbsp;Configurações</legend>
                        
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label>Vendedor Ativo</label>
                                <select class="custom-select" name="vendedor_ativo">
                                    <option value="0">Não</option>
                                    <option value="1">Sim</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label>Observação</label>
                                <textarea type="text" class="form-control form-control-user" name="vendedor_obs" value="<?php echo set_value('vendedor_obs') ; ?>"></textarea>
                                <?php echo form_error('vendedor_obs','<small class="form-text text-danger">','</small>'); ?>
                            </div>
                            
                        </div>
                                <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                                <a title="Voltar" href="<?php echo base_url('vendedores'); ?>" class="btn btn-success btn-sm ml-2"></i>&nbsp;Voltar</a>
                        
                    </fieldset>

                    <!-- O restante do formulário continua aqui -->

                </form>

            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
