<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 col-lg-3">
                        <div class="nav flex-column nav-pills" id="my-account-tabs" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="true">Minha conta</a>
                            <a class="nav-link" id="v-pills-payment-tab" data-toggle="pill" href="#v-pills-payment" role="tab" aria-controls="v-pills-payment" aria-selected="false">Alterar senha</a>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-9">
                        <div class="tab-content" id="my-account-tabsContent">

                            <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                <h4 class="card-heading p-b-20">Minha conta</h4>
                                <div class="form-group">
                                    <label for="inputName">Nome</label>
                                    <input type="text" class="form-control" id="inputName" value="<?php echo $nome ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">E-mail</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" value="<?php echo $email ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Usuario</label>
                                    <input type="text" class="form-control" id="inputName" value="<?php echo $login ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="inputText">Data de cadastro</label>
                                    <input type="text" class="form-control" id="inputText" value="<?php echo $data_registro ?>" disabled>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="v-pills-payment" role="tabpanel" aria-labelledby="v-pills-payment-tab">
                                <h4 class="card-heading p-b-20">Alterar senha </h4>
                                <form>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">*Nova senha </label>
                                        <input type="password" class="form-control nova_senha" name="nova_senha" placeholder="A senha deve conter no mínimo 8 caracteres com letras e números">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">*Repita a nova senha </label>
                                        <input type="password" class="form-control nova_senha_rep" name="nova_senha_rep" placeholder="A senha deve conter no mínimo 8 caracteres com letras e números">
                                    </div>
                                </form>
                                <button class="btn btn-primary" id="salvar"> Salvar </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function alterarSenha() {
        $('#salvar').on('click', function() {
            let dados = $("form").serialize();
            desativaBotao('#salvar');

            $.post(urlAbsoluta() + "/alterar/minha/senha", {
                dados: dados
            }, function(data) {
                let erros = JSON.parse(data);

                if (erros['erros']) {
                    swal({
                        type: 'error',
                        title: 'Oops...',
                        text: erros['erros'],
                        footer: '',
                    })
                } else {
                    swal({
                        type: 'success',
                        title: 'Senha alterada com sucesso!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    $(".nova_senha").val("");
                    $(".nova_senha_rep").val("");
                }
                ativarBotao('#salvar');
            });
        });
    }

    $(document).ready(function() {
        alterarSenha();
    });
</script>