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
                            Asignar grupos por periodo
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
                                                                        <th>Código</th>
                                                                        <th>Curso</th>
                                                                        <th>Tipo</th>
                                                                        <th>Aula</th>
                                                                        <th>Docente</th>
                                                                        <th>ListaAlumnos</th>
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
                                                        <td>'.$grupos[$k][grupo_id].'</td>
                                                        <td>'.$grupos[$k][curso_id].'</td>
                                                        <td><input class="form-control" placeholder="Tipo de grupo" type="text"></td>
                                                        <td><input class="form-control" placeholder="Número de aula" type="number" min="0" step="1"></td>
                                                        <td><input class="form-control" placeholder="Docente asignado" type="text"></td>
                                                        <td><input class="form-control" placeholder="Alumnos asignados" type="text"></td>
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