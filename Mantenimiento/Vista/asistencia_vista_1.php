<?php include("restriccion.php"); ?>

<!DOCTYPE html>
<html lang="en">

<?php include("head.php"); ?>

<body>
    <div id="wrapper">
        <!-- Navigation -->
        <?php
        include("panel.php")
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
                            Asistencia
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <div class="form-group col-lg-6">
                                <label>Nombre del curso</label>
                            </div>
                            <br>
                            <div class="form-group col-lg-6">
                                <label>Clase Fecha ID</label>
                            </div>
                            <br><div class="form-group col-lg-6">
                                <label>Porcentaje de avance</label>
                                <input class="form-control" name="pavance" placeholder="Ingrese el porcentaje de avance">
                            </div>
                            <br>
                            <div class="dataTable_wrapper">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                
                                        <tr>
                                            <th><center>#</center></th>
                                            <th>Nombres</th>
                                            <th>CUI</th>
                                            <th><center>Asistencia</center></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr class="odd gradeX">
                                            <td><center>3</center></td>
                                            <td>Luis Jimenez Gonzales</td>
                                            <td>20123677</td>
                                            <td class="center"><center><input type="checkbox" name="check" value="check">   Asistio </center><br></td>
                                        </tr>
                                    </tbody>
                                </table>
                               <center><button type="button" class="btn btn-outline btn-warning">Guardar Asistencias</button></a></center>
                            </div>
                            <!-- /.table-responsive -->    
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