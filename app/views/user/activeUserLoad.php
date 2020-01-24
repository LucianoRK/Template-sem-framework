<div id="editar_usuario"></div>

<?php if ($dados['user_ativos']) { ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header text-success">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <span class="align-middle">Usuários ativos - <?php echo $dados['nome_empresa'] ?></span>
                        </div>
                    </div>
                </h5>
                <div class="card-body">
                    <table id="bs4-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Nome</th>
                                <th class="text-center">Tipo de Usuário</th>
                                <th class="text-center">Acessos disponivéis</th>
                                <th class="text-center">Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dados['user_ativos'] as $usuario) { ?>
                                <?php $dados['count']++ ?>
                                <tr>
                                    <td class="text-center"><?php echo $dados['count'] ?></td>
                                    <td><?php echo $usuario['nome'] ?></td>
                                    <td><?php echo $usuario['tipo_nome'] ?></td>
                                    <td class="text-center">
                                        <div class="form-row">
                                            <div class="form-group col-md-6 text-right quantidade_acesso">
                                                <?php echo $usuario['quantidade_acesso'] ?>
                                            </div>
                                            <div class="form-group col-md-6 text-right">
                                                <i id_user="<?php echo $usuario['id_usuario'] ?>" class="zmdi zmdi-plus-circle zmdi-hc-fw zmdi-hc-2x text-success adicionar_acesso" title="Adcionar acesso"></i>
                                                <i id_user="<?php echo $usuario['id_usuario'] ?>" class="zmdi zmdi-minus-circle zmdi-hc-fw zmdi-hc-2x text-danger remover_acesso" title="Remover todos os acessos"></i>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-info btn-rounded editar_user" title="Editar Usuário" id_usuario_editar="<?php echo $usuario['id_usuario'] ?>">
                                            Editar
                                        </button>
                                        <button class="btn btn-danger btn-rounded excluir_user" title="Deletar Usuário" id_usuario_excluir="<?php echo $usuario['id_usuario'] ?>">
                                            Desativar
                                        </button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php } else { ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php echo $dados['error']; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" class="la la-close"></span>
        </button>
    </div>
<?php } ?>
<script>
    function editUser(id_user) {
        $("#usuarios_desativados").html('');
        $("#usuarios_ativos").load(urlAtual() + "/editUser", {
            id_user: id_user
        }, function() {
            ativarBotao(".editar_user");
        });
    }
    $(document).ready(function() {
        $(".excluir_user").on("click", function() {
            desativaBotao(this);
            let id_usuario_excluir = $(this).attr("id_usuario_excluir");
            $.post(urlAtual() + "/deleteUser", {
                id_usuario_excluir: id_usuario_excluir
            }, function(data) {
                let select_form_company = $("#select_form_company").val();
                loadListUser(select_form_company);
                ativarBotao(this);
            });
        });
        $(".adicionar_acesso").on("click", function() {
            desativaBotao(this);
            let id_usuario = $(this).attr("id_user");
            let quantidade_acesso = parseInt($(this).parents(".form-row").find(".quantidade_acesso").html()) + 1;
            if (quantidade_acesso <= 10) {
                $(this).parents(".form-row").find(".quantidade_acesso").html(quantidade_acesso);
                $.post(urlAtual() + "/adicionarAcesso", {
                    id_usuario: id_usuario,
                    quantidade_acesso: quantidade_acesso
                });
            }
            ativarBotao(this);         
        });
        $(".remover_acesso").on("click", function() {
            desativaBotao(this);
            let id_usuario = $(this).attr("id_user");
            $(this).parents(".form-row").find(".quantidade_acesso").html('0');
            $.post(urlAtual() + "/removerTodosAcessos", {
                id_usuario: id_usuario
            });
            ativarBotao(this); 
        });
        $(".editar_user").on("click", function() {
            let id_usuario_editar = $(this).attr("id_usuario_editar");
            desativaBotao(this);
            editUser(id_usuario_editar);
        });
    });
</script>