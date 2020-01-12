<?php if ($dados['user_desativados']) { ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header text-danger">Usuários desativados - <?php echo $dados['nome_empresa'] ?></h5>
                <div class="card-body">
                    <table id="bs4-table" class="table table-striped table-bordered">
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
                            <?php foreach ($dados['user_desativados'] as $usuario) { ?>
                                <?php $dados['count']++ ?>
                                <tr class="text-danger">
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
<?php } ?>