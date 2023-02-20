<style>
    label {
        margin-left: 20px;
    }

    #datepicker {
        width: 180px;
    }

    #datepicker>span:hover {
        cursor: pointer;
    }
</style>


<div class="container">
    <h1 class="text-success font-weight-bold">
        GeeksforGeeks
    </h1>
    <h3>
        setting up bootstrap datepicker
    </h3>
    <label>Select Date: </label>
    <div id="datepicker" class="input-group date" data-date-format="dd-mm-yyyy">
        <input class="form-control" type="text" readonly />
        <span class="input-group-addon">
            <i class="glyphicon glyphicon-calendar"></i>
        </span>
    </div>
</div>

<script>
    $(function () {
        $("#datepicker").datepicker({
            autoclose: true,
            todayHighlight: true,
        }).datepicker('update', new Date());
    });
</script>