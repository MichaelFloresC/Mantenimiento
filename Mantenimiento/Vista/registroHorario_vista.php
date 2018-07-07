<?php
session_start();

echo "<h2 style='text-aligin:center;'>Bienvenido! " . $_SESSION['nombre_acceso']."</h2>";
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

} else {
   echo "Esta pagina es solo para usuarios registrados.<br>";
   echo "<br><a href='../index.php'>Login</a>";
    exit;
}

$now = time();

if($now > $_SESSION['expire']) {
session_destroy();

echo "Su sesion a terminado,
<a href='../index.php'>Necesita Hacer Login</a>";
exit;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistema de Asistencia</title>

    <!-- Bootstrap Core CSS -->
    <link href="../plugins/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../plugins/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../plugins/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../plugins/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../plugins/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../plugins/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php
        include("desplegable.php")
        ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <br>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Registro de Horarios por Periodo
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <ul class="nav nav-pills">
                            <?php
                                error_reporting(0);
                                require '../Modelo/periodos_modelo.php';
                                $objPeriodo = new periodos_modelo();
                                $periodos = $objPeriodo->get_periodos();
                                for($j = 0; $j < sizeof($periodos); $j++)
                                    echo '<li><a href="#'.$periodos[$j][periodo_id].'" data-toggle="tab">'.$periodos[$j][periodo_descripcion].'</a></li>';
                            ?>
                            </ul>
                            <br>
                            <!-- Tab panes -->
                            <div class="tab-content">

                            <?php
                                require '../Modelo/grupos_modelo.php';
                                $objGrupo = new grupos_modelo(); 
                                for($j = 0; $j < sizeof($periodos); $j++){
                                    echo'
                                <div class="tab-pane fade" id="'.$periodos[$j][periodo_id].'">                                   
                                        <div class="dataTable_wrapper">
                                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                <thead>
                                                                    <tr>
                                                                        <th>Curso</th>
                                                                        <th>Grupo</th>
                                                                        <th>Tipo</th>
                                                                        <th>Aula</th>
                                                                        <th>Profesor</th>
                                                                        <th>Días</th>
                                                                        <th>H. Inicio</th>
                                                                        <th>H. Fin</th>
                                                                        <th>Registrar</th>
                                                                    </tr>
                                                </thead>
                                                <tbody>
                                    '; 
                                                                   
                                    
                                    //error_reporting(0);
                                    $grupos = $objGrupo->get_grupos($periodos[$j][periodo_id]);
                                    for($k = 0; $k < sizeof($grupos); $k++){
                                        echo'
                                                    <tr class="odd gradeX">
                                                        <td>'.$grupos[$k][curso_id].'</td>
                                                        <td>'.$grupos[$k][grupo_id].'</td>
                                                        <td>'.$grupos[$k][tipo_grupo_id].'</td>
                                                        <td>'.$grupos[$k][aula_id].'</td>
                                                        <td>'.$grupos[$k][docente_id].'</td>
                                                        <td><input type="checkbox" name="lunes" value=" "> Lunes<br>
                                                            <input type="checkbox" name="martes" value=" "> Martes<br>
                                                            <input type="checkbox" name="miercoles" value=" ">Miércoles<br>
                                                            <input type="checkbox" name="jueves" value=" "> Jueves<br>
                                                            <input type="checkbox" name="viernes" value=" ">Viernes<br>
                                                        </td>
                                                        <td><input type="time" id="myTime">
                                                            <input type="time" id="myTime">
                                                            <input type="time" id="myTime">
                                                            <input type="time" id="myTime">
                                                            <input type="time" id="myTime">
                                                        </td>
                                                        <td><input type="time" id="myTime">
                                                            <input type="time" id="myTime">
                                                            <input type="time" id="myTime">
                                                            <input type="time" id="myTime">
                                                            <input type="time" id="myTime">
                                                        </td>
                                                        <td><button type="submit" class="btn btn-default ">Registrar</button></td>
                                                    </tr>
                                        ';
                                    }
                                    echo'
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.table-responsive -->
                                </div>
                            
                                    ';
                                }
                            ?>  
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../plugins/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../plugins/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../plugins/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../plugins/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../plugins/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <script src="../plugins/bower_components/datatables-responsive/js/dataTables.responsive.js"></script>
    
    <!-- Custom Theme JavaScript -->
    <script src="../plugins/dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

</body>

</html>