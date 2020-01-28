<label class="control-label text-right col-md-3">Cidades</label>
<div class="col-md-6">
    <select id="cidade" name="cidade" class="form-control selectUm">
        <option value="" selected disabled> Selecione uma cidade </option>
        <?php foreach ($dados['cidades'] as $cidade) { ?>
            <option value="<?php echo $cidade['id_cidade']; ?>"> <?php echo $cidade['nome']; ?> </option>
        <?php } ?>
    </select>
</div>

<script>
    $(document).ready(function() {
        selectOne();
    });
</script>