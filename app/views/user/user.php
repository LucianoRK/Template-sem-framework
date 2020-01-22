    <div class="row">
        <div class="col">
            <div class="card">
                <h5 class="card-header">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <span class="align-middle">Usuários</span>
                        </div>
                        <div class="form-group col-md-6 text-right">
                            <button id="novo_usuario_btn" class="btn btn-sm btn-primary">Novo Usuário</button>
                        </div>
                    </div>
                </h5>
                <div class="card-body">
                    <div class="form-body">
                        <div class="form-group row">
                            <label class="control-label text-right col-md-3"></label>
                            <div class="col-md-6">
                                <select class="form-control m-b-15" id="select_form_company">
                                    <?php foreach ($dados['company'] as $empresa) { ?>
                                        <option value="<?php echo $empresa['id_empresa']; ?>"><?php echo $empresa['nome']; ?></option>
                                    <?php } ?>
                                </select>
                                <button class="btn btn-primary btn-block" id="buscar_dados">Buscar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="usuarios_ativos"></div>
    <div id="usuarios_desativados"></div>

    <script>
        function loadListUser(company) {
            $("#usuarios_ativos").load(urlAtual() + "/getListActiveUsers", {
                company: company
            }, function() {
                $("#usuarios_desativados").load(urlAtual() + "/getListDisableUsers", {
                    company: company
                }, function() {
                    ativarBotao('#buscar_dados');
                });
            });
        }

        function newUser() {
            $("#usuarios_desativados").html('');
            $("#usuarios_ativos").load(urlAtual() + "/usuarios/newUser", function() {
                ativarBotao('#novo_usuario_btn');
            });
        }

        $(document).ready(function() {
            $('#buscar_dados').on('click', function() {
                let select_form_company = $("#select_form_company").val();
                desativaBotao('#buscar_dados');
                loadListUser(select_form_company);
            });

            $('#novo_usuario_btn').on('click', function() {
                desativaBotao('#novo_usuario_btn');
                newUser();
            });

            $('.data_table').DataTable();
           // $('#select_form_company').select2();
        });
        
    </script>