<?php
$qtd = 1;
?>
<div class="row">
    <div class="col">
        <div class="card">
            <h5 class="card-header">LISTA DE ÚSUARIO</h5>
            <div class="card-body">
                <table id="data_table" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tipo de usuário</th>
                            <th>Nome</th>
                            <th>Quantidade de acesso</th>
                            <th>Opões</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dados['user'] as $dado) { ?>
                            <tr>
                                <td><?php echo $qtd++ ?></td>
                                <td></td>
                                <td><?php echo $dado['nome'] ?></td>
                                <td class="text-center"><?php echo $dado['quantidade_acesso'] ?></td>
                                <td></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#data_table').DataTable();
    });
</script>