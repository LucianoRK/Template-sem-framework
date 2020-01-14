<div class="row">
    <div class="col">
        <div class="card">
            <h5 class="card-header">Novo Usuário</h5>
            <div class="card-body">
                <form action="#" class="form-horizontal">
                    <div class="form-body">
                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">*Empresa</label>
                            <div class="col-md-5">
                                <select class="form-control">
                                    <option value="">aa</option>
                                    <option value="">aabb</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">*Tipo de Usuario</label>
                            <div class="col-md-5">
                                <select class="form-control">
                                    <option value="">aaa</option>
                                    <option value="">bbbb</option>
                                </select>
                            </div>
                        </div>
                        <hr class="dashed">
                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">*Nome Completo</label>
                            <div class="col-md-5">
                                <input type="text" placeholder="Nome completo do usuário" class="form-control" autocomplete="given-name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">*CPF</label>
                            <div class="col-md-5">
                                <input type="text" placeholder="CPF do usuário" class="form-control" autocomplete="family-name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">Email</label>
                            <div class="col-md-5">
                                <input type="text" placeholder="Email do Usuário" class="form-control" autocomplete="email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">Data de nascimento</label>
                            <div class="col-md-5">
                                <input type="date" class="form-control" placeholder="dd/mm/yyyy">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">Cidade</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" placeholder="Cidade do usuário">
                            </div>
                            <div class="col-md-1">
                                <input type="text" class="form-control" placeholder="Estado">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">Rua</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" placeholder="Nome da rua do usuário">
                            </div>
                            <div class="col-md-1">
                                <input type="text" class="form-control" placeholder="Número">
                            </div>
                        </div>
                        <hr class="dashed ">
                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">*Login</label>
                            <div class="col-md-5">
                                <input type="text" class="form-control" placeholder="O login deve conter no mínimo 6 caracteres com letras e números">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">*Senha</label>
                            <div class="col-md-5">
                                <input type="text" class="form-control" placeholder="A senha deve conter no mínimo 6 caracteres com letras e números">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">*Repita a senha</label>
                            <div class="col-md-5">
                                <input type="text" class="form-control" placeholder="A senha deve conter no mínimo 6 caracteres com letras e números">
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
                                    <button id="novo_usuario_fechar" class="btn btn-secondary clear-form btn-rounded btn-outline ">Cancelar</button>
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
        $('#novo_usuario_fechar').on('click', function() {
            $("#usuarios_ativos").html('');
        });
    });
</script>