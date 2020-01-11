<div class="row">
    <div class="col">
        <div class="card">
            <h5 class="card-header">Empresas</h5>
            <div class="card-body">
                <div class="form-body">
                    <div class="form-group row">
                        <label class="control-label text-right col-md-3"></label>
                        <div class="col-md-6">
                            <div class=>
                                <select class="form-control m-b-15" id="select_form">
                                    <option value="AL">Alabama</option>
                                </select>
                            </div>
                            <button class="btn btn-primary btn-block" id="buscar_dados">Buscar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#data_table').DataTable();
        $('#buscar_dados').on('click',function(){
            
        });

        //$('#select_form').select2();
    });
</script>