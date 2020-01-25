<select class="form-control cidades selectUm">
    <?php foreach ($dados['cidades'] as $cidade) { ?>
        <option value="<?php echo $cidade['id_cidade']; ?>"> <?php echo $cidade['nome']; ?> </option>
    <?php } ?>
</select>

<script>
    $(document).ready(function() {
        selectOne();
    });
</script>