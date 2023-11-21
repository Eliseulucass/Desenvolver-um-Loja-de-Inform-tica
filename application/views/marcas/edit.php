<?php $this->load->view('layout/sidebar'); ?>

<div id="content">
    <?php $this->load->view('layout/navbar'); ?>

    <div class="container-fluid">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('marcas'); ?>">Marca</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo;?></li>
            </ol>
        </nav>

        <div class="card shadow mb-4">
            <div class="card-body">
                <form class="user" method="POST" name="form_edit">
                    <p><strong><i class="fas fa-clock"></i>&nbsp;&nbsp;última alteração:&nbsp;<?php echo formata_data_banco_com_hora($marca->marca_data_alteracao) ?>;</strong></p>

                    <fieldset class="mt-4 border p-2">
                        <legend class="font-small"><i class="fas fa-cubes"></i>&nbsp;Dados Marca</legend>

                        <div class="form-group row mb-3">
                            <div class="col-md-8">
                                <label>Nome da Marca</label>
                                <input type="text" class="form-control form-control-user" name="marca_nome" placeholder="Nome da Marca" value="<?php echo $marca->marca_nome; ?>" readonly>
                            </div>

                            <div class="col-md-4">
                                <label>Marca Ativa</label>
                                <select class="custom-select" name="marca_ativa">
                                    <option value="0"<?php echo ($marca->marca_ativa == 0 ? ' selected' : ''); ?>>Não</option>
                                    <option value="1"<?php echo ($marca->marca_ativa == 1 ? ' selected' : ''); ?>>Sim</option>
                                </select>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="mt-4 border p-2">
                        <legend class="font-small"><i class="fas fa-tools"></i>&nbsp;Configurações</legend>
                        <div class="form-group row">
                            <input type="hidden" name="marca_id" value="<?php echo $marca->marca_id; ?>" />
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                        <a title="Voltar" href="<?php echo base_url('marcas'); ?>" class="btn btn-success btn-sm ml-2"></i>&nbsp;Voltar</a>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
