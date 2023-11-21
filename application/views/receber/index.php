<?php
$this->load->view('layout/sidebar');
?>

<div id="content">
    <?php
    $this->load->view('layout/navbar');
    ?>
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('/home'); ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo; ?></li>
            </ol>
        </nav>
        <?php if ($message = $this->session->flashdata('sucesso')): ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong><i class="far fa-smile-wink"></i>&nbsp;&nbsp;<?php echo $message; ?></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($message = $this->session->flashdata('error')): ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong><i class="fas fa-exclamation-triangle"></i>&nbsp;&nbsp;<?php echo $message; ?></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($message = $this->session->flashdata('info')): ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-warning alert-dismissible fade show text-gray-900" role="alert">
                        <strong><i class="fas fa-exclamation-triangle"></i>&nbsp;&nbsp;<?php echo $message; ?></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php echo date('d/m/Y H:i:s'); ?>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a title="Cadastrar nova Conta" href="<?php echo base_url('receber/add'); ?>" class="btn btn-success btn-sm float-right"><i class="fas fa-plus"></i>&nbsp;Nova</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Cliente</th>
                                <th>Valor da Conta</th>
                                <th>Data de Validade</th>
                                <th>Data de Pagamento</th>
                                <th class="text-center">Situação</th>
                                <th class="text-right no-sort pr-2">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($contas_receber as $conta): ?>
                                <tr>
                                    <td><?php echo $conta->conta_receber_id ?></td>
                                    <td><?php echo $conta->cliente_nome ?></td>
                                    <td><?php echo 'MT&nbsp;' . $conta->conta_receber_valor ?></td>
                                    <td><?php echo formata_data_banco_sem_hora($conta->conta_receber_data_vencto); ?></td>
                                    <td><?php echo ($conta->conta_receber_status == 1 ? formata_data_banco_sem_hora($conta->conta_receber_data_pagamento) : 'Aguardando Pagamento') ?></td>
                                    <td class="text-center pr-4">
                                        <?php
                                        if ($conta->conta_receber_status == 1) {
                                            echo '<span class="badge badge-success btn-sm">Pago</span>';
                                        } else if (strtotime($conta->conta_receber_data_vencto) > strtotime(date('Y-m-d'))) {
                                            echo '<span class="badge badge-secondary btn-sm">A receber</span>';
                                        } else if ((strtotime($conta->conta_receber_data_vencto) == strtotime(date('Y-m-d')))) {
                                            echo '<span class="badge badge-warning btn-sm">Vence Hoje</span>';
                                        } else {
                                            echo '<span class="badge badge-danger btn-sm">Vencida</span>';
                                        }
                                        ?>
                                    </td>
                                    <td class="text-right">
                                        <a title="Editar" href="<?php echo base_url('receber/edit/' . $conta->conta_receber_id); ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                        
                                        <?php if ($this->ion_auth->is_admin()): ?>
                                            <a title="Excluir" href="javascript:void(0)" data-toggle="modal" data-target="#contas_receber-<?php echo $conta->conta_receber_id; ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                        <?php else: ?>
                                            <span class="text-muted"></span><!--Sem permissão para excluir-->
                                        <?php endif; ?>
                                    </td>
                                </tr>

                                <div class="modal fade" id="contas_receber-<?php echo $conta->conta_receber_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Tem certeza da deleção?</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <?php if ($this->ion_auth->is_admin()): ?>
                                                    <p>Para excluir o registro, clique em <strong>"Sim"</strong>.</p>
                                                <?php else: ?>
                                                    <p>Você não tem permissão para excluir este registro.</p>
                                                <?php endif; ?>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Não</button>
                                                <?php if ($this->ion_auth->is_admin()): ?>
                                                    <a class="btn btn-danger btn-sm" href="<?php echo base_url('receber/del/' . $conta->conta_receber_id); ?>">Sim</a>
                                                <?php else: ?>
                                                    <!-- Adicione aqui o que deseja mostrar para usuários não administradores -->
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
