<label class="control-label text-right col-md-3">Usuario</label>
<div class="col-md-6">
    <select id="user" name="user" class="form-control selectUm">
        <?php var_dump($dados); ?>
        <?php if ($dados['users']) { ?>
            <option value="0">Selecione um usuário</option>
            <?php foreach ($dados['users'] as $user) { ?>
                <option value="<?php echo $user['id_usuario']; ?>"><?php echo $user['nome']; ?></option>
            <?php } ?>
        <?php } ?>
    </select>
</div>
<script>
    $(document).ready(function() {
        $("#user").change(function() {
            let user = $(this).val();
            if (user != 0) {
                $(".lista_permissoes").load(urlAtual() + "/list", {user: user});
            }else{
                $(".lista_permissoes").html('');
            }
        });
    });
</script>