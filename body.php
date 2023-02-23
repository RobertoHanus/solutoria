<div class="container">
    <h1 class="font-weight-bold">
        CRUD e Importador de datos desde API
    </h1>
    <h3>Desarrollado por Roberto Arturo Hanus Morales</h3>
    <div class="row border mb-3">
        <input type="text" class="form-control w-25 m-3" id="user-name" name="user-name" placeholder="User name">
        <div class="input-group-prepend">
            <button id="importar" type="button" class="btn btn-success m-3">Importar Datos</button>
            <button type="button" class="btn btn-danger m-3" data-toggle="modal" data-target="#erase-confirm">Borrar
                Todo</button>
        </div>
    </div>
    <div class="row border p-3 mb-3">
        <form action="save_task.php" method="POST" id="save_task">
            <h4>Creador de registro historico UF</h4>
            <div class="form-group">
                <input type="number" step="0.01" class="form-control" id="valor-en-pesos" name="valor"
                    placeholder="Valor en pesos">
            </div>
            <div id="datepicker-create" class="input-group date mb-3" data-date-format="dd-mm-yyyy">
                <input class="form-control" name="date" type="text" readonly />
                <span class="input-group-addon">
                </span>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="origen" name="source" placeholder="Origen dato">
            </div>
            <button type="submit" name="save_task_request" class="btn btn-success">Crear</button>
        </form>
    </div>
    <div class="row border p-2">
        <div class="col-6 col-sm-4 col-md-3">
            <label>Fecha inicio: </label>
            <div id="datepicker-start" class="input-group date" data-date-format="dd-mm-yyyy">
                <input id="inicio" class="form-control" type="text" readonly />
                <span class="input-group-addon">
                </span>
            </div>
        </div>
        <div class="col-6 col-sm-4 col-md-3 mb-2">
            <label>Fecha final: </label>
            <div id="datepicker-end" class="input-group date" data-date-format="dd-mm-yyyy">
                <input id="termino" class="form-control" type="text" readonly />
                <span class="input-group-addon">
                </span>
            </div>
        </div>
        <table class="table" id="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Origen</th>
                    <th scope="col">
                        <button type="button" id="reload" class="btn btn-success">
                            <i class="fa-solid fa-rotate-right"></i>
                        </button>
                        <button type="button" data-toggle="modal" data-target="#chart" class="btn btn-primary"
                            onClick="updateChart()">
                            <i class="fa-solid fa-eye"></i>
                        </button>
                    </th>
                </tr>
            </thead>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="erase-confirm" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>¿Está seguro de borrar toda la base de datos?.</p>
                </div>
                <div class="modal-footer">
                    <button id="delete-all" type="button" class="btn btn-danger" data-dismiss="modal">Sí</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="update-register" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <form action="update_task.php" method="POST" id="update_task">
                    <input id="id-updater" type="hidden" name="id">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <h4>Actualizar registro historico UF</h4>
                        <div class="form-group">
                            <input name="valor" id="value-updater" type="number" step="0.01" class="form-control"
                                id="valor-en-pesos" placeholder="Valor en pesos">
                        </div>
                        <div id="datepicker-update" class="input-group date mb-3" data-date-format="dd-mm-yyyy">
                            <input name="date" id="date-updater" class="form-control" type="text" readonly />
                            <span class="input-group-addon">
                            </span>
                        </div>
                        <div class="form-group">
                            <input name="source" id="source-updater" type="text" class="form-control" id="origen"
                                placeholder="Origen dato">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Actualizar</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Descartar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="chart" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div>
                    <canvas id="myChart"></canvas>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(function () {
        $("#datepicker-start").datepicker({
            autoclose: true,
            todayHighlight: true,
        }).datepicker('update', new Date('01-01-2000'));
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
    $(function () {
        $("#datepicker-update").datepicker({
            autoclose: true,
            todayHighlight: true,
        }).datepicker('update', new Date());
    });
    $(function () {
        $('#save_task').on('submit', function (e) {
            e.preventDefault();
            var data = $(this).serializeArray();
            $.ajax({
                url: 'save_task.php',
                type: 'post',
                data: data,
                success: function (result) {
                    updateTableView();
                    alert(result);
                },
                error: function () {
                    alert('Error!!!');
                }
            });
        });
        $('#update_task').on('submit', function (e) {
            e.preventDefault();
            $('#update-register').modal('hide');
            var data = $(this).serializeArray();
            $.ajax({
                url: 'update_task.php',
                type: 'post',
                data: data,
                success: function (result) {
                    updateTableView();
                    alert(result);
                },
                error: function () {
                    alert('Error!!!');
                }
            });
        });
    });


    numItems = 0;
    function addRow(id, valor, fecha, origen) {
        numItems++;
        $("#table").append(`
                <tr class="entry">
                    <th scope="row">${numItems}</th>
                    <td>${valor}</td>
                    <td>${fecha}</td>
                    <td>${origen}</td>
                    <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#update-register" onClick="fillUpdater(${id},${valor},'${fecha}','${origen}')">
                            <i class="fa-sharp fa-solid fa-pencil"></i>
                        </button>
                        <button type="button" class="btn btn-danger" onClick="deleteSingle(${id})">
                            <i class="fa-sharp fa-solid fa-trash"></i>
                        </button>
                    </td>
                </tr>`);
    };

    chartLabelData = [];
    chartData = [];
    function updateTableView() {
        $.ajax({
            url: 'select_uf.php',
            type: 'post',
            data: { inicio: $('#inicio').val(), termino: $('#termino').val() },
            success: function (result) {
                result_parsed = JSON.parse(result)
                $('#table tr.entry').remove();
                numItems = 0;
                chartLabelData = [];
                chartData = [];
                result_parsed.forEach(element => {
                    addRow(element[0], element[1], element[2], element[3]);
                    chartLabelData.push(element[2]);
                    chartData.push(element[1]);
                });
            },
            error: function () {
                alert('Error!!!');
            }
        });
    }

    $('#reload').click(updateTableView);


    function deleteAll() {
        $.ajax({
            url: 'delete_all.php',
            type: 'post',
            success: function (result) {
                updateTableView();
                alert(result);
            },
            error: function () {
                alert('Error!!!');
            }
        });
    }

    $('#delete-all').click(deleteAll);

    function deleteSingle(id) {
        $.ajax({
            url: 'delete_single.php',
            type: 'post',
            data: { id: id },
            success: function (result) {
                updateTableView();
                alert(result);
            },
            error: function () {
                alert('Error!!!');
            }
        });
    }

    function fillUpdater(id, valor, fecha, origen) {
        $('#id-updater').val(id);
        $('#value-updater').val(valor);
        $('#date-updater').val(fecha);
        $('#source-updater').val(origen);
    }

    function importData() {
        $.ajax({
            url: 'import.php',
            type: 'post',
            data: { userName: $('#user-name').val() },
            success: function (result) {
                updateTableView();
                alert(result);
            },
            error: function () {
                alert('Error!!!');
            }
        });
    }

    $('#importar').click(importData);

    $(function () {
        updateTableView();
    });

    $('#datepicker-start').change(updateTableView);
    $('#datepicker-end').change(updateTableView);

    chartObject = null;
    function updateChart() {
        const ctx = document.getElementById('myChart');

        if(chartObject!=null) chartObject.destroy();

        chartObject = new Chart(ctx, {
            type: 'line',
            data: {
                labels: chartLabelData,
                datasets: [{
                    label: 'Valor UF',
                    data: chartData,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        })
    }

    

</script>