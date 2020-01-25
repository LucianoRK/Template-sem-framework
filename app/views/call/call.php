<div class="row">
    <div class="col">
        <div class="card">
            <h5 class="card-header">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <span class="align-middle">Chamados</span>
                    </div>
                    <div class="form-group col-md-6 text-right">
                        <button id="novo_chamado_btn" class="btn btn-sm btn-primary">Novo chamado</button>
                    </div>
                </div>
            </h5>
            <div class="card-body">
                <div class="form-body">
                    <div class="form-group row">
                        <label class="control-label text-right col-md-3"></label>
                        <div class="col-md-6">
                            <select class="form-control m-b-15 selectUm" id="select_form_company">
                                <?php if ($dados['company']) { ?>
                                    <?php foreach ($dados['company'] as $empresa) { ?>
                                        <option value="<?php echo $empresa['id_empresa']; ?>"><?php echo $empresa['nome']; ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                            <hr>
                            <button class="btn btn-primary btn-block" id="buscar_dados">Buscar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="novoChamado"></div>

<script>
    function novoChamado() {
        $('#novo_chamado_btn').on('click', function() {
            desativaBotao('#novo_chamado_btn');

            $("#novoChamado").load(urlAtual() + "/novoChamado", function() {
                ativarBotao('#novo_chamado_btn');
            });
        });
    }

    $(document).ready(function() {
        selectOne();
        novoChamado();
    });
</script>