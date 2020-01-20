<div class="row">
    <div class="col">
        <div class="card">
            <h5 class="card-header">Editar usuario - [<?php echo $dados['user']['id_usuario'] ?>]<?php echo $dados['user']['nome'] ?></h5>
            <div class="card-body">
                <form action="#" class="form-horizontal">
                    <div class="form-body">
                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">*Empresa</label>
                            <div class="col-md-5">
                                <select id="empresa" class="form-control" disabled="">
                                    <option value="<?php echo $dados['user']['id_empresa']; ?>"><?php echo $dados['user']['nome_empresa']; ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">*Tipo de Usuario</label>
                            <div class="col-md-5">
                                <select id="tipo_usuario" class="form-control" disabled="">
                                    <option value="<?php echo $dados['user']['id_tipo_usuario']; ?>"><?php echo $dados['user']['nome_tipo_usuario']; ?></option>
                                </select>
                            </div>
                        </div>
                        <hr class="dashed">
                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">*Nome Completo</label>
                            <div class="col-md-5">
                                <input id="nome" type="text" placeholder="Nome completo do usuário" class="form-control" value="<?php echo $dados['user']['nome'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">*CPF</label>
                            <div class="col-md-5">
                                <input id="cpf" type="text" placeholder="CPF do usuário" class="form-control" value="<?php echo $dados['user']['cpf'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">Email</label>
                            <div class="col-md-5">
                                <input id="email" type="text" placeholder="Email do Usuário" class="form-control" value="<?php echo $dados['user']['email'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">Data de nascimento</label>
                            <div class="col-md-5">
                                <input id="data_nascimento" class="form-control" placeholder="dd/mm/yyyy" value="<?php echo DATE::mysqlToDate($dados['user']['data_nascimento'])?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">Cidade</label>
                            <div class="col-md-4">
                                <input id="cidade" type="text" class="form-control" placeholder="Cidade do usuário">
                            </div>
                            <div class="col-md-1">
                                <input id="estado" type="text" class="form-control" placeholder="Estado">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">Rua</label>
                            <div class="col-md-4">
                                <input id="rua" type="text" class="form-control" placeholder="Nome da rua do usuário">
                            </div>
                            <div class="col-md-1">
                                <input id="numero_casa" type="text" class="form-control" placeholder="Número">
                            </div>
                        </div>
                        <hr class="dashed ">
                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">*Login</label>
                            <div class="col-md-5">
                                <input id="login" type="text" class="form-control" placeholder="O login deve conter no mínimo 6 caracteres com letras e números" value="<?php echo $dados['user']['login'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">*Redefinir senha</label>
                            <div class="col-md-5">
                                <input id="senha" type="password" class="form-control" placeholder="A senha deve conter no mínimo 8 caracteres com letras e números">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">*Repita a senha</label>
                            <div class="col-md-5">
                                <input id="senha_rep" type="password" class="form-control" placeholder="A senha deve conter no mínimo 8 caracteres com letras e números">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer bg-light">
                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="offset-sm-3 col-md-5">
                                    <button id="editar_usuario_gravar" class="btn btn-primary btn-rounded">Gravar</button>
                                    <button id="editar_usuario_cancelar" class="btn btn-secondary clear-form btn-rounded btn-outline ">Cancelar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
</div>
<script>
    $(document).ready(function() {
        $('#editar_usuario_gravar').on('click', function() {
            desativaBotao('#editar_usuario_gravar');
            $(".form-group").removeClass("has-error");
            $.post(urlAtual() + "/saveUserData", {
                id_user: '<?php echo $dados['user']['id_usuario'] ?>',
                empresa: $("#empresa").val(),
                tipo_usuario: $("#tipo_usuario").val(),
                nome: $("#nome").val(),
                cpf: $("#cpf").val(),
                email: $("#email").val(),
                data_nascimento: $("#data_nascimento").val(),
                cidade: $("#cidade").val(),
                estado: $("#estado").val(),
                rua: $("#rua").val(),
                numero_casa: $("#numero_casa").val(),
                login: $("#login").val(),
                senha: $("#senha").val(),
                senha_rep: $("#senha_rep").val()
            }, function(data) {
                ativarBotao('#editar_usuario_gravar');
                let erros = JSON.parse(data);
                if (erros == 0 || erros == null) {
                    swal({
                        type: 'success',
                        title: 'Editado com sucesso !',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    loadListUser($("#select_form_company").val());
                } else {
                    $.each(erros, function(indice, value) {
                        $("#" + value).parents(".form-group").addClass("has-error");
                    });
                }
            });
        });
        $('#editar_usuario_cancelar').on('click', function() {
            $("#usuarios_ativos").html('');
        });
    });
</script>