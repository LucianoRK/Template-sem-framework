<?php if ($dados['user_ativos']) { ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <h5 class="card-header text-success">Usuários ativos</h5>
            <div class="card-body">
                <table id="bs4-table" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Nome</th>
                            <th class="text-center">Tipo de Usuário</th>
                            <th class="text-center">Acessos disponivéis (usados)</th>
                            <th class="text-center">opções</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dados['user_ativos'] as $usuario) { ?>
                            <?php $dados['count']++ ?>
                            <tr>
                                <td class="text-center"><?php echo $dados['count'] ?></td>
                                <td><?php echo $usuario['nome'] ?></td>
                                <td><?php echo $usuario['tipo_nome'] ?></td>
                                <td class="text-center"><?php echo $usuario['quantidade_acesso'] ?></td>
                                <td class="text-center"></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php }else{ ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php echo $dados['error']; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" class="la la-close"></span>
        </button>
    </div>
<?php } ?>