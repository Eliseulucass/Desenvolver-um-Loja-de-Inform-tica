<?php $this->load->view('layout/sidebar'); ?>

<div id="content">
    <?php $this->load->view('layout/navbar'); ?>

    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('os'); ?>">Ordens de serviços</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= $titulo; ?></li>
            </ol>
        </nav>

        <div class="card shadow mb-4">
            <div class="card-body">
                <form class="user" action="" id="form" name="form_add" enctype="multipart/form-data" method="post" accept-charset="utf-8">

                    <!-- Escolha dos Produtos -->
                    <fieldset id="vendas" class="mt-4 border p-2">
                        <legend class="font-small"><i class="fas fa-shopping-cart"></i>&nbsp;&nbsp;Escolha os produtos</legend>

                        <div class="form-group row">
                            <div class="ui-widget col-lg-12 mb-1 mt-1">
                                <input id="buscar_produtos" class="search form-control form-control-lg col-lg-12" placeholder="Que produto você está buscando?">
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="table_produtos" class="table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th class="width-55">Produto</th>
                                        <th class="text-right pr-2 width-12">Valor unitário</th>
                                        <th class="text-center width-8">Qty</th>
                                        <th class="width-8">% Desc</th>
                                        <th class="text-right pr-2 width-15">Total</th>
                                        <th class="width-25"></th>
                                        <th class="width-25"></th>
                                    </tr>
                                </thead>
                                <tbody id="lista_produtos"></tbody>
                            </table>
                            <div class="col-md-2 mb-3 ml-auto">
                                <label>Total a pagar:</label>
                                <input type="text" class="form-control form-control-user-date money2" name="venda_valor_total" value="<?php echo set_value('venda_valor_total'); ?>">
                                <?php echo form_error('venda_valor_total', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>
                        </div>
                    </fieldset>

                    <!-- Dados da Venda -->
                    <fieldset class="mt-4 border p-2">
                        <legend class="font-small"><i class="far fa-money-bill-alt"></i>&nbsp;&nbsp;Dados da venda</legend>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-1 mb-sm-0">
                                <label class="small my-0">Escolha o cliente <span class="text-danger">*</span></label>
                                <select class="custom-select contas_receber" id="venda_cliente_id" name="venda_cliente_id" required="">
                                    <option value="">Escolha</option>
                                    <?php foreach ($clientes as $cliente): ?>
                                        <option value="<?= $cliente->cliente_id; ?>"><?= $cliente->cliente_nome . ' ' . $cliente->cliente_sobrenome . ' | NUIT ou Alvará Comercial: ' . $cliente->cliente_cpf_cnpj; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php echo form_error('venda_cliente_id', '<div class="text-danger small">', '</div>') ?>
                            </div>

                            <div class="col-sm-6 mb-1 mb-sm-0">
                                <label class="small my-0">Tipo da venda<span class="text-danger">*</span></label>
                                <select class="custom-select" id="venda_tipo" name="venda_tipo" required="">
                                    <option value="">Escolha...</option>
                                    <option value="1">Venda à vista</option>
                                    <option value="2">Venda à prazo</option>
                                </select>
                                <?php echo form_error('venda_tipo', '<div class="text-danger small">', '</div>') ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label class="small my-0">Forma de pagamento <span class="text-danger">*</span></label>
                                <select id="id_pagamento" class="custom-select forma-pagamento" id="venda_forma_pagamento_id" name="venda_forma_pagamento_id" required="">
                                    <option value="">Escolha</option>
                                    <?php foreach ($formas_pagamentos as $forma_pagamento): ?>
                                        <option value="<?= $forma_pagamento->forma_pagamento_id; ?>"><?= $forma_pagamento->forma_pagamento_nome; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php echo form_error('venda_forma_pagamento_id', '<div class="text-danger small">', '</div>') ?>
                            </div>

                            <div class="col-md-6">
                                <label class="small my-0">Escolha o vendedor <span class="text-danger">*</span></label>
                                <select id="id_vendedor" class="custom-select vendedor" id="venda_vendedor_id" name="venda_vendedor_id" required="">
                                    <option value="">Escolha</option>
                                    <?php foreach ($vendedores as $vendedor): ?>
                                        <option value="<?= $vendedor->vendedor_id; ?>"><?= $vendedor->vendedor_nome_completo . ' | ' . $vendedor->vendedor_codigo; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php echo form_error('venda_vendedor_id', '<div class="text-danger small">', '</div>') ?>
                            </div>
                        </div>
                        <div class="mt-3">
                        <button class="btn btn-primary btn-sm mr-2" id="btn-cadastrar-venda" form="form">Cadastrar</button>
                        <a href="<?= base_url('vendas'); ?>" class="btn btn-secondary btn-sm">Voltar</a>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
