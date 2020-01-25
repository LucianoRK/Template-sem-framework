<div class="row">
    <div class="col">
        <div class="card">
            <h5 class="card-header">Novo Chamado</h5>
            <div class="card-body">
                <form action="#" class="form-horizontal">
                    <div class="form-body">
                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">*Empresa</label>
                            <div class="col-md-6">
                                <select id="empresa" class="form-control selectUm">
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
                                <select id="categoria" class="form-control selectUm">
                                    <?php if ($dados['cat_chamado']) { ?>
                                        <?php foreach ($dados['cat_chamado'] as $categoria) { ?>
                                            <option value="<?php echo $categoria['id_categoria']; ?>"><?php echo $categoria['nome']; ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">*Carregar Imagem</label>

                            <div class="col-md-6 custom-file">
                                <input type="file" accept="image/png, image/jpeg">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">*Descrição</label>
                            <div class="col-md-6">
                                <textarea class="form-control" rows="5"></textarea>
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
</section>
</div>

<script>
    $(document).ready(function() {
        selectOne();
    });
</script>