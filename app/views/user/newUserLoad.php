<div class="row">
    <div class="col">
        <div class="card">
            <h5 class="card-header">Novo Usuário</h5>
            <div class="card-body">
                <form>
                    <div class="form-body">
                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">*Empresa</label>
                            <div class="col-md-6">
                                <select id="empresa" name="empresa" class="form-control selectUm">
                                    <?php if ($dados['company']) { ?>
                                        <?php foreach ($dados['company'] as $empresa) { ?>
                                            <option value="<?php echo $empresa['id_empresa']; ?>"><?php echo $empresa['nome']; ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">*Tipo de Usuario</label>
                            <div class="col-md-6">
                                <select id="tipo_usuario" name="tipo_usuario" class="form-control selectUm">
                                    <?php if ($dados['types_user']) { ?>
                                        <?php foreach ($dados['types_user'] as $tipo_usuario) { ?>
                                            <option value="<?php echo $tipo_usuario['id_tipo_usuario']; ?>"><?php echo $tipo_usuario['nome']; ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <hr class="dashed">
                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">*Nome Completo</label>
                            <div class="col-md-6">
                                <input id="nome" name="nome" type="text" placeholder="Nome completo do usuário" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">*CPF</label>
                            <div class="col-md-6">
                                <input id="cpf" name="cpf" type="text" placeholder="CPF do usuário" class="form-control cpfMask">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">Email</label>
                            <div class="col-md-6">
                                <input id="email" name="email" type="text" placeholder="Email do Usuário" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">*Data de nascimento</label>
                            <div class="col-md-6">
                                <input id="data_nascimento" name="data_nascimento" type="date" class="form-control" placeholder="dd/mm/yyyy">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">Cep</label>
                            <div class="col-md-6">
                                <input id="cep" name="cep" type="text" class="form-control cepMask" placeholder="CEP">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">Estado</label>
                            <div class="col-md-6">
                                <select id="estado" name="estado" class="form-control selectUm">
                                    <option value="" selected disabled> Selecione um estado </option>
                                    <?php if ($dados['estados']) { ?>
                                        <?php foreach ($dados['estados'] as $estado) { ?>
                                            <option value="<?php echo $estado['id_estado']; ?>"> <?php echo $estado['nome']; ?> </option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row" id="comboCidades">
                            
                        </div>

                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">Rua</label>
                            <div class="col-md-6">
                                <input id="rua" name="rua" type="text" class="form-control" placeholder="Nome da rua do usuário">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">Número</label>
                            <div class="col-md-6">
                                <input id="numero_casa" name="numero_casa" type="text" class="form-control" placeholder="Número">
                            </div>
                        </div>

                        <hr class="dashed">

                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">*Login</label>
                            <div class="col-md-6">
                                <input id="login" name="login" type="text" class="form-control" placeholder="O login deve conter no mínimo 6 caracteres com letras e números">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">*Senha</label>
                            <div class="col-md-6">
                                <input id="senha" name="senha" type="password" class="form-control" placeholder="A senha deve conter no mínimo 8 caracteres com letras e números">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">*Repita a senha</label>
                            <div class="col-md-6">
                                <input id="senha_rep" name="senha_rep" type="password" class="form-control" placeholder="A senha deve conter no mínimo 8 caracteres com letras e números">
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
                                    <button id="novo_usuario_gravar" class="btn btn-primary btn-rounded">Gravar</button>
                                    <button id="novo_usuario_cancelar" class="btn btn-secondary clear-form btn-rounded btn-outline ">Cancelar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function buscar_cidades() {
        $('#estado').on('change', function() {
            let id_estado = $(this).val();

            $("#comboCidades").load(urlAtual() + "/buscar/cidades", {
                id_estado: id_estado
            }, function() {});
        });
    }

    function saveNewUser() {
        $('#novo_usuario_gravar').on('click', function() {
            desativaBotao('#novo_usuario_gravar');
            let dados = $("form").serialize();

            $.post(urlAtual() + "/saveUserData", {
                dados: dados
            }, function(data) {
                let erros = JSON.parse(data);

                ativarBotao('#novo_usuario_gravar');
                $("*").removeClass("has-error");
                $(".msg").empty();

                if (erros.length > 0) {
                    $.each(erros, function(indice, value) {
                        let campoMsg = value['campos'] + 'Msg';
                        let msg = value['msgs'];
                        let campo = "<label id='campoMsg' class='control-label text-right msg'> " + msg + " </label>"

                        $("#" + value['campos']).parents(".form-group").addClass("has-error");
                        $("#" + value['campos']).parent().append(campo);
                    });
                } else {
                    swal({
                        type: 'success',
                        title: 'Usuário criado com sucesso!',
                        showConfirmButton: false,
                        timer: 1500
                    });

                    // Carrega a div do formulario novamente
                    $("#usuarios_ativos").load(urlAtual() + "/newUser");
                }
            });
        });
    }
    
    function cancelNewUser() {
        $('#novo_usuario_cancelar').on('click', function() {
            desativaBotao('#novo_usuario_cancelar');

            $("#usuarios_ativos").load(urlAtual() + "/newUser", function() {
                ativarBotao('#novo_usuario_cancelar');
            });
        });
    }

    $(document).ready(function() {
        myMasks();
        selectOne();
        buscar_cidades();
        saveNewUser();
        cancelNewUser();

    });
</script>