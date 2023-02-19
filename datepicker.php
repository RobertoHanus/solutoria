<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap-datepicker.min.css" />

    <style>
      label{margin-left: 20px;}
      #datepicker{width:180px;}
      #datepicker > span:hover{cursor: pointer;}
    </style>
</head>

<body>
    <h1>Great!!!</h1>
    <div class="container">
        <h1 class="text-success font-weight-bold">
            GeeksforGeeks
        </h1>
        <h3>
            setting up bootstrap datepicker
        </h3>
        <label>Select Date: </label>
        <div id="datepicker" 
             class="input-group date" 
             data-date-format="dd-mm-yyyy">
            <input class="form-control" 
                   type="text" readonly />
            <span class="input-group-addon">
                <i class="glyphicon glyphicon-calendar"></i>
            </span>
        </div>
    </div>
    
    <script type="text/javascript" src="js/jquery.min.js"></script>

    <script>
        $(function () {
            $("#datepicker").datepicker({ 
                autoclose: true, 
                todayHighlight: true,
            }).datepicker('update', new Date());
        });
    </script>

    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-datepicker.min.js"></script>
</body>

</html>