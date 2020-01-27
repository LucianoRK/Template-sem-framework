<div class="row">
    <div class="col">
        <div class="card">
            <h5 class="card-header">Novo Chamado</h5>
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
                            <label class="control-label text-right col-md-3">*Categoria</label>
                            <div class="col-md-6">
                                <select id="categoria" name="categoria" class="form-control selectUm">
                                    <?php if ($dados['cat_chamado']) { ?>
                                        <?php foreach ($dados['cat_chamado'] as $categoria) { ?>
                                            <option value="<?php echo $categoria['id_categoria']; ?>"><?php echo $categoria['nome']; ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">*Descrição</label>
                            <div class="col-md-6">
                                <textarea id="descricao" class="form-control" name="descricao" rows="7"></textarea>
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
                                    <button id="salvar_chamado" class="btn btn-primary btn-rounded">Gravar</button>
                                    <button id="cancelar_chamado" class="btn btn-secondary clear-form btn-rounded btn-outline ">Cancelar</button>
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
    function saveNewChamado() {
        $("#salvar_chamado").on("click", function () {
            desativaBotao('#salvar_chamado');
            let dados = $("form").serialize();

            $.post(urlAtual() + "/salvarChamado",{dados: dados}, function(data) {
                let erros = JSON.parse(data);
                ativarBotao('#salvar_chamado');
                $("*").removeClass("has-error");
                $(".msg").empty();
                
                if (erros.length > 0) {
                    $.each(erros, function(indice, value) {
                        let campoMsg = value['campos']+'Msg';
                        let msg      = value['msgs'];
                        let campo    = "<label id='campoMsg' class='control-label text-right msg'> "+msg+" </label>"

                        $("#" + value['campos']).parents(".form-group").addClass("has-error");
                        $("#" + value['campos']).parent().append(campo);
                    });
                } else {
                    swal({
                        type: 'success',
                        title: 'Chamado criado com sucesso!',
                        showConfirmButton: false,
                        timer: 1500
                    });

                    // Carrega a div do formulario novamente
                    $("#novoChamado").load(urlAtual() + "/novoChamado");
                }
            });
        });
    }

    $(document).ready(function() {
        selectOne();
        saveNewChamado();
    });
</script>