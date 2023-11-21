<?php $this->load->view('layout/sidebar'); ?>

<div id="content">

    <?php $this->load->view('layout/navbar'); ?>

    <div class="container-fluid">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('vendas'); ?>">Vendas</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= $titulo; ?></li>
            </ol>
        </nav>

        <div class="card shadow mb-4">

            <div class="card-body">

                <form class="user" action="" id="form" name="form_edit" enctype="multipart/form-data" method="post" accept-charset="utf-8">

                    <fieldset class="mt-4 border p-2">

                        <legend class="font-small"><i class="far fa-file-alt"></i>&nbsp;&nbsp;Historico de venda</legend>

                        <div class="">
                            <div class="form-group row">

                                <div class="col-sm-6 mb-1 mb-sm-0">
                                    <label class="small my-0">Escolha o cliente <span class="text-danger">*</span></label>
                                    <select class="custom-select contas_receber" name="venda_cliente_id" required="" disabled>
                                        <?php foreach ($clientes as $cliente): ?>
                                            <option value="<?php echo $cliente->cliente_id; ?>" <?php echo ($venda->venda_cliente_id == $cliente->cliente_id ? 'selected' : '') ?>><?php echo $cliente->cliente_nome . ' ' . $cliente->cliente_sobrenome . ' |  NUIT ou Alvará Comercial: ' . $cliente->cliente_cpf_cnpj; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?php echo form_error('venda_cliente_id', '<div class="text-danger small">', '</div>') ?>
                                </div>
                                <div class="col-sm-6 mb-1 mb-sm-0">
                                    <label class="small my-0">Tipo da venda<span class="text-danger">*</span></label>
                                    <select class="custom-select" name="venda_tipo" required="" disabled>
                                        <option value="1" <?php echo ($venda->venda_tipo == 1 ? 'selected' : '') ?>>Venda à vista</option>
                                        <option value="2" <?php echo ($venda->venda_tipo == 2 ? 'selected' : '') ?>>Venda à prazo</option>
                                    </select>
                                    <?php echo form_error('venda_tipo', '<div class="text-danger small">', '</div>') ?>
                                </div>


                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label class="small my-0">Forma de pagamento <span class="text-danger">*</span></label>
                                    <select id="id_pagamento" class="custom-select forma-pagamento" name="venda_forma_pagamento_id" required="" disabled>
                                        <?php foreach ($formas_pagamentos as $forma_pagamento): ?>
                                            <option value="<?php echo $forma_pagamento->forma_pagamento_id; ?>" <?php echo ($forma_pagamento->forma_pagamento_id == $venda->venda_forma_pagamento_id ? 'selected' : '') ?> ><?php echo $forma_pagamento->forma_pagamento_nome; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?php echo form_error('venda_forma_pagamento_id', '<div class="text-danger small">', '</div>') ?>
                                </div>

                                <div class="col-md-6">
                                    <label class="small my-0">Escolha o vendedor <span class="text-danger">*</span></label>
                                    <select id="id_vendedor" class="custom-select vendedor" name="venda_vendedor_id" required="" disabled>
                                        <?php foreach ($vendedores as $vendedor): ?>
                                            <option value="<?php echo $vendedor->vendedor_id; ?>" <?php echo ($vendedor->vendedor_id == $venda->venda_vendedor_id ? 'selected' : '') ?> ><?php echo $vendedor->vendedor_nome_completo . ' | ' . $vendedor->vendedor_codigo; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?php echo form_error('venda_vendedor_id', '<div class="text-danger small">', '</div>') ?>
                                </div>
                            </div>
                            </div>
                        <div class="mt-3">
                            <button class="btn btn-primary btn-sm mr-2" id="btn-cadastrar-venda" form="form" <?php echo ($desabilitar == TRUE ? 'disabled' : ''); ?>>
                                <?php echo ($desabilitar == TRUE ? 'Encerrada' : 'Salvar'); ?>
                            </button>
                            <a href="<?php echo base_url('vendas'); ?>" class="btn btn-secondary btn-sm">Voltar</a>
                        </div>
                        </div>
                    </fieldset>

                    <input type="hidden" name="venda_id" value="<?php echo $venda->venda_id ?>" />

                    

                </form>

            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
