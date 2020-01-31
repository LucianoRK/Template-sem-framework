<?php if ($dados['user_desativados']) { ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header text-danger">Usuários desativados - <?php echo $dados['nome_empresa'] ?></h5>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="bs4-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Nome</th>
                                    <th class="text-center">Tipo</th>
                                    <th class="text-center">Acessos disponivéis</th>
                                    <th class="text-center">opções</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($dados['user_desativados'] as $usuario) { ?>
                                    <?php 
                                        $dados['count']++;
                                        $cookie         = new Cookie;
                                        $acessos_usados = $cookie->getCookieAmount($usuario['id_usuario'], $usuario['fk_empresa']);
                                    ?>
                                    <tr class="text-danger">
                                        <td class="text-center">
                                            <?php echo $dados['count'] ?>
                                        </td>
                                        <td>
                                            <?php echo $usuario['nome'] ?>
                                        </td>
                                        <td>
                                            <?php echo $usuario['tipo_nome'] ?>
                                        </td>
                                        <td class="text-center">
                                            <?php echo $usuario['quantidade_acesso']. " ($acessos_usados)";?>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-info btn-rounded btn-sm editar_user" title="Editar" id_usuario_editar="<?php echo $usuario['id_usuario'] ?>">
                                                <i class="la la-edit text-white font-size-22"></i>
                                            </button>
                                            <button class="btn btn-success btn-rounded btn-sm reativar_user" title="Reativar" id_usuario_reativar="<?php echo $usuario['id_usuario'] ?>">
                                                <i class="la la-check-circle text-white font-size-22"></i>
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
    </div>
<?php } ?>
<script>
    function editUser(id_user) {
        $("#usuarios_desativados").empty();
        $("#usuarios_ativos").load(urlAtual() + "/editUser", {
            id_user: id_user
        }, function() {
            ativarBotao('.editar_user');
        });
    }
    $(document).ready(function() {
        $('.reativar_user').on('click', function() {
            desativaBotao(this);
            let id_usuario_reativar = $(this).attr('id_usuario_reativar');
            $.post(urlAtual() + "/reactivateUser", {
                id_usuario_reativar: id_usuario_reativar
            }, function(data) {
                let select_form_company = $("#select_form_company").val();
                loadListUser(select_form_company);
                ativarBotao(this);
            });
        });
        $('.editar_user').on('click', function() {
            let id_usuario_editar = $(this).attr('id_usuario_editar');
            desativaBotao(this);
            editUser(id_usuario_editar);
        });
    });
</script>