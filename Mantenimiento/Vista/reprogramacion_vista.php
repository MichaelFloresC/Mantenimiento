<?php include("restriccion.php"); ?>

<!DOCTYPE html>
<html lang="en">
<?php include("head.php"); ?>

<body>
    <div id="wrapper">

    <?php include("panel.php"); ?>  

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
                            INGRESAR DATOS DE REPROGRAMACIÓN
                            <?php
                            $dia = $_POST['diafecha'];
                            $mes = $_POST['mesfecha'];
                            $año = $_POST['añofecha'];
                            $fecha = $año."-".$mes."-".$dia;
                            $claseid = $_POST['claseid'];
                            ?>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <form role="form" method="post" action="../Controlador/reprogramacion_Controller.php">
                            <br>
                                <div class="form-group col-lg-12">
                                            <label>Ingresar fecha</label>
                                             <input type="date" name="fecharep">
                                </div>
                                <br>
                                <br>
                                <div class="form-group col-lg-6">
                                            <label>Ingresar hora - inicio</label>
                                            <input type="time" name="horain">
                                </div>
                                <br>
                                <br>
                                 <div class="col-lg-12">
                                            <label>Ingresar hora -fin </label>
                                             <input type="time" name="horasal">
                                </div>
                                <br>
                                <input type="hidden" name="fecha" value=<?php echo '"'.$fecha.'"' ?>>
                                <input type="hidden" name="claseid" value=<?php echo '"'.$claseid.'"' ?>>
                                <br>
                                <br>
                                <div class="col-lg-12">
                                            <button name="submit" type="submit" class="btn btn-default ">Reprogramar</button>
                                </div>
                                </form>
                        </div>
                               
                                   
                    </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.Registro -->
                
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

    <!-- Custom Theme JavaScript -->
    <script src="../plugins/dist/js/sb-admin-2.js"></script>

</body>

</html>