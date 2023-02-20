<div class="container">
    <h1 class="font-weight-bold">
        CRUD e Importador de datos desde API
        <i class="glyphicon glyphicon-calendar"></i>
    </h1>
    <div class="row border mb-3">
        <button type="button" class="btn btn-success m-3">Importar Datos</button>
        <button type="button" class="btn btn-danger m-3">Borrar Todo</button>
    </div>
    <div class="row border p-3 mb-3">
        <form>
            <h4>Creador de registro historico UF</h4>
            <div class="form-group">
                <input type="email" class="form-control" id="valor-en-pesos" placeholder="Valor en pesos">
            </div>
            <div id="datepicker-create" class="input-group date mb-3" data-date-format="dd-mm-yyyy">
                <input class="form-control" type="text" readonly />
                <span class="input-group-addon">
                </span>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="origen" placeholder="Origen dato">
            </div>
            <button type="submit" class="btn btn-success">Crear</button>
        </form>
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
        <div class="col-6 col-sm-4 col-md-3 mb-2">
            <label>Fecha final: </label>
            <div id="datepicker-end" class="input-group date" data-date-format="dd-mm-yyyy">
                <input class="form-control" type="text" readonly />
                <span class="input-group-addon">
                </span>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Origen</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>29149.08</td>
                    <td>09-02-2021</td>
                    <td>miindicador.cl</td>
                    <td>Delete</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    <td>Delete</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                    <td>Delete</td>
                </tr>
            </tbody>
        </table>
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
    $(function () {
        $("#datepicker-create").datepicker({
            autoclose: true,
            todayHighlight: true,
        }).datepicker('update', new Date());
    });
</script>