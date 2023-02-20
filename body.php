<div class="container">
    <h1 class="font-weight-bold">
        CRUD e Importador de datos desde API
        <i class="glyphicon glyphicon-calendar"></i>
    </h1>
    <div class="row border mb-3">
        <button type="button" class="btn btn-success m-3">Importar Datos</button>
        <button type="button" class="btn btn-danger m-3">Borrar Todo</button>
    </div>
    <div class="row border p-2 mb-3">
    </div>
    <div class="row border p-2">
        <div class="col-6 col-sm-4 col-md-3">
            <label>Fecha inicio: </label>
            <div id="datepicker-start" class="input-group date" data-date-format="dd-mm-yyyy">
                <input class="form-control" type="text" readonly />
                <span class="input-group-addon">
                </span>
            </div>
        </div>
        <div class="col-6 col-sm-4 col-md-3">
            <label>Fecha final: </label>
            <div id="datepicker-end" class="input-group date" data-date-format="dd-mm-yyyy">
                <input class="form-control" type="text" readonly />
                <span class="input-group-addon">
                </span>
            </div>
        </div>
    </div>
</div>

<script>
    $(function () {
        $("#datepicker-start").datepicker({
            autoclose: true,
            todayHighlight: true,
        }).datepicker('update', new Date());
    });
    $(function () {
        $("#datepicker-end").datepicker({
            autoclose: true,
            todayHighlight: true,
        }).datepicker('update', new Date());
    });
</script>