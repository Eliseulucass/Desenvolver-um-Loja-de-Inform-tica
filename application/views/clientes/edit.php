<?php $this->load->view('layout/sidebar'); ?>

<!-- Main Content -->
<div id="content">

    <?php $this->load->view('layout/navbar'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('clientes'); ?>">Clientes</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo;?></li>
            </ol>
        </nav>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">

            <div class="card-body">
                <form class="user" method="POST" name="form_edit">
                    <p><strong><i class="fas fa-clock"></i>&nbsp;&nbsp;ultima alteração:&nbsp;<?php echo formata_data_banco_com_hora($cliente->cliente_data_alteracao) ?>;</strong></p>

                    <!-- Primeiro fieldset -->
                    <fieldset class="mt-4 border p-2">
                        <legend class="font-small"><i class="fas fa-user-tie"></i>&nbsp;Dados Pessoais</legend>
                        
                        <div class="form-group row mb-3">
                                    
                            <div class="col-md-5">
                                <label>Nome</label>
                                <input type="text" class="form-control form-control-user" name="cliente_nome" placeholder="nome do cliente" value="<?php echo $cliente->cliente_nome; ?>">
                               <?php echo form_error('cliente_nome','<small class="form-text text-danger">','</small>'); ?>
                            </div>

                            <div class="col-md-5">
                                <label>Sobrenome</label>
                                <input type="text" class="form-control form-control-user" name="cliente_sobrenome" placeholder="sobrenome do cliente" value="<?php echo $cliente->cliente_sobrenome; ?>">
                                <?php echo form_error('cliente_sobrenome','<small class="form-text text-danger">','</small>'); ?>
                            </div>

                                <div class="col-md-2">
                                    <label>Data de Nascimento</label>
                                    <input type="date" class="form-control form-control-user-date " name="cliente_data_nascimento" value="<?php echo $cliente->cliente_data_nascimento ; ?>">
                                    <?php echo form_error('cliente_data_nascimento','<small class="form-text text-danger">','</small>'); ?>
                                </div>
                                </div>

                                <div class="form-group row mb-3">
                                 <div class="col-md-3">
                                     <?php if($cliente->cliente_tipo==1):?>
                                     <label>NUIT</label>
                                     <input type="text" class="form-control form-control-user cnpj" name="cliente_cnpj" placeholder="<?php echo ($cliente->cliente_tipo==1 ? 'nuit': 'Alvará Comercial'); ?>" value="<?php echo $cliente->cliente_cpf_cnpj ; ?>">
                                     <?php echo form_error('cliente_cnpj','<small class="form-text text-danger">','</small>'); ?>
                                     <?php else: ?>
                                     <label>Alvará Comercial</label>
                                     <input type="text" class="form-control form-control-user cpf" name="cliente_cpf" placeholder="<?php echo ($cliente->cliente_tipo==1 ? 'nuit': 'Alvará Comercial'); ?>" value="<?php echo $cliente->cliente_cpf_cnpj ; ?>">
                                     <?php echo form_error('cliente_cpf','<small class="form-text text-danger">','</small>'); ?>
                                     <?php endif; ?>
                                     
                                </div>
                                 <div class="col-md-3">
                                      <?php if($cliente->cliente_tipo==1):?>
                                      <label>Bilhete de Identidade (BI)</label>
                                      <input type="text" class="form-control form-control-user _rg_ie" name="cliente_rg_ie" placeholder="<?php echo ($cliente->cliente_tipo==1 ? 'Bilhete de Identidade (BI)': 'Número de Identificação Fiscal (NIF)'); ?>" value="<?php echo $cliente->cliente_rg_ie ; ?>">
                                      <?php echo form_error('cliente_rg_ie','<small class="form-text text-danger">','</small>'); ?>
                                     <?php else: ?>
                                     <label>Nº de Identificação Fiscal (NIF)</label>
                                     <input type="text" class="form-control form-control-user NIF" name="cliente_rg_ie" placeholder="<?php echo ($cliente->cliente_tipo==1 ? 'Bilhete de Identidade (BI)': 'Número de Identificação Fiscal (NIF)'); ?>" value="<?php echo $cliente->cliente_rg_ie ; ?>">
                                      <?php echo form_error('cliente_rg_ie','<small class="form-text text-danger">','</small>'); ?>
                                     <?php endif; ?>
                                    
                                    
                                </div>
                                <div class="col-md-4">
                                    <label>E-Mail</label>
                                    <input type="email" class="form-control form-control-user" name="cliente_email" placeholder="e-mail do cliente" value="<?php echo $cliente->cliente_email ; ?>">
                                    <?php echo form_error('cliente_email','<small class="form-text text-danger">','</small>'); ?>
                                </div>
                                 <div class="col-md-2">
                                    <label>Sexo</label>
                                    <select class="custom-select" name="cliente_sexo">
                                        <option value="M">M</option>
                                        <option value="F">F</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-3">

                                <div class="col-md-6">
                                   <label>Nº de Telefone</label>
                                   <input type="text" class="form-control form-control-user phone_with_ddd" name="cliente_telefone" placeholder="telefone do cliente" value="<?php echo $cliente->cliente_telefone ; ?>">
                                   <?php echo form_error('cliente_telefone','<small class="form-text text-danger">','</small>'); ?>
                               </div>

                                <div class="col-md-6">
                                   <label>Nº Alternativo</label>
                                   <input type="text" class="form-control form-control-user phone_with_ddd" name="cliente_celular" placeholder="alternativo do cliente" value="<?php echo $cliente->cliente_celular ; ?>">
                                   <?php echo form_error('cliente_celular','<small class="form-text text-danger">','</small>'); ?>
                               </div>
                            </div>
                        
                    </fieldset>

                    <!-- Segundo fieldset -->
                    <fieldset class="mt-4 border p-2">
                        <legend class="font-small"><i class="fas fa-map-marker-alt"></i>&nbsp;Cadastro de Endereço</legend>
                        
                        <div class="form-group row mb-3"> 
                            <div class="col-md-6">
                                <label>Endereço</label>
                                <input type="text" class="form-control form-control-user " name="cliente_endereco" value="<?php echo $cliente->cliente_endereco ; ?>">
                                <?php echo form_error('cliente_endereco','<small class="form-text text-danger">','</small>'); ?>
                            </div>
                             <div class="col-md-2">
                                <label>NºEndereço</label>
                                <input type="text" class="form-control form-control-user en" name="cliente_numero_endereco" value="<?php echo $cliente->cliente_numero_endereco ; ?>">
                                <?php echo form_error('cliente_numero_endereco','<small class="form-text text-danger">','</small>'); ?>
                             </div>
                            <div class="col-md-4">
                                <label>Nacionalidade</label>
                                <input type="text" class="form-control form-control-user " name="cliente_complemento" value="<?php echo $cliente->cliente_complemento ; ?>">
                                <?php echo form_error('cliente_complemento','<small class="form-text text-danger">','</small>'); ?>
                             </div>
                        </div>
                        <div class="form-group row mb-3">
                             <div class="col-md-4">
                                <label>Bairro</label>
                                <input type="text" class="form-control form-control-user" name="cliente_bairro" value="<?php echo $cliente->cliente_bairro ; ?>">
                                <?php echo form_error('cliente_bairro','<small class="form-text text-danger">','</small>'); ?>
                             </div>
                            <div class="col-md-2">
                                <label>Código Postal</label>
                                <input type="text" class="form-control form-control-user cep" name="cliente_cep" placeholder="Código Postal do cliente" value="<?php echo $cliente->cliente_cep ; ?>">
                                <?php echo form_error('cliente_cep','<small class="form-text text-danger">','</small>'); ?>
                            </div>
                            <div class="col-md-3">
                                <label>Cidade</label>
                                <input type="text" class="form-control form-control-user" name="cliente_cidade" value="<?php echo $cliente->cliente_cidade ; ?>">
                                <?php echo form_error('cliente_cidade','<small class="form-text text-danger">','</small>'); ?>
                            </div>

                            <div class="col-md-2">
                                <label>Província</label>
                                <input type="text" class="form-control form-control-user uf" name="cliente_estado" value="<?php echo $cliente->cliente_estado ; ?>">
                                <?php echo form_error('cliente_estado','<small class="form-text text-danger">','</small>'); ?>
                            </div>
                            </div>
                        
                    </fieldset>

                    <!-- Terceiro fieldset -->
                    <fieldset class="mt-4 border p-2">
                        <legend class="font-small"><i class="fas fa-tools"></i>&nbsp;Configurações</legend>
                        
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label>Cliente Ativo</label>
                                <select class="custom-select" name="cliente_ativo">
                                    <option value="0"<?php echo ($cliente->cliente_ativo == 0 ? ' selected' : ''); ?>>Não</option>
                                    <option value="1"<?php echo ($cliente->cliente_ativo == 1 ? ' selected' : ''); ?>>Sim</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label>Observação</label>
                                <textarea type="text" class="form-control form-control-user" name="cliente_obs" value="<?php echo $cliente->cliente_obs ; ?>"></textarea>
                                <?php echo form_error('cliente_obs','<small class="form-text text-danger">','</small>'); ?>
                            </div>
                             <input type="hidden" name="cliente_tipo" value="<?php echo $cliente->cliente_tipo; ?>" />
                             <input type="hidden" name="cliente_id" value="<?php echo $cliente->cliente_id; ?>" />
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                        <a title="Voltar" href="<?php echo base_url('clientes'); ?>" class="btn btn-success btn-sm ml-2"></i>&nbsp;Voltar</a>

                        
                    </fieldset>

                    <!-- O restante do formulário continua aqui -->

                </form>

            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
