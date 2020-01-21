<select class="form-control cidades" id="s2_demo1">
    <option disabled selected value=""> Selecione a cidade desejado </option>
    <?php foreach ($dados['cidades'] as $cidade) { ?>
        <option value="<?php echo $cidade['id_cidade']; ?>"> <?php echo $cidade['nome']; ?> </option>
    <?php } ?>
</select>
