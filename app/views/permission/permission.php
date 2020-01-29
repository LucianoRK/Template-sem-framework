<div class="row">
    <div class="col">
        <div class="card">
            <h5 class="card-header">PERMISSÕES</h5>
            <div class="card-body">
                <form action="#" class="form-horizontal">
                    <div class="form-body">
                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">Empresa</label>
                            <div class="col-md-6">
                                <select id="empresa" name="empresa" class="form-control selectUm">
                                    <?php if ($dados['company']) { ?>
                                        <option value="0">Selecione uma empresa</option>
                                        <?php foreach ($dados['company'] as $empresa) { ?>
                                            <option value="<?php echo $empresa['id_empresa']; ?>"><?php echo $empresa['nome']; ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row funcionarios"></div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="lista_permissoes"></div>

<script>
    $(document).ready(function() {
        $("#empresa").change(function() {
            let company = $(this).val();
            if (company != 0) {
                $(".funcionarios").load(urlAtual() + "/selectUsers", {company: company});
            }else{
                $(".funcionarios").html('');
                $(".lista_permissoes").html('');
            }
        });
    });
</script>