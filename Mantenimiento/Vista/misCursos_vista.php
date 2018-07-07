<<<<<<< HEAD
<?php include("restriccion.php"); ?>

<!DOCTYPE html>
<html lang="en">
<?php include("head.php"); ?>

<body>

    <div id="wrapper">

    <?php include("panel.php");?>
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
                            Grupos de cursos-teoria, cursos-práctica y cursos-laboratorio del docente
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <br>
                            

                            <?php
                                error_reporting(0);
                                require '../Modelo/grupos_modelo.php';
                                require '../Modelo/docente_modelo.php';
                                require '../Modelo/aulas_modelo.php';
                                require '../Modelo/periodos_modelo.php';
                                $objGrupo = new grupos_modelo(); 
                                $objDocente = new docente_modelo();
                                $objAulas = new aulas_modelo();
                                $objPeriodo = new periodos_modelo();
                                $periodos = $objPeriodo->get_periodos();
                                    echo'
                                                                  
                                        <div class="dataTable_wrapper">
                                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                <thead>
                                                    <tr>
                                                        <th style="display:none;">Id Curso</th>
                                                        <th>Curso</th>
                                                        <th>Id Grupo</th>
                                                        <th>Tipo</th>
                                                        <th>Registrar Asistencia</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                    '; 
                                                                   
                                    $grupos = $objGrupo->get_grupos2();
                                    for($k = 0; $k < sizeof($grupos); $k++){
                                        echo'
                                                <tr class="odd gradeX">
                                                <form method="get" id="rowgrupo_form2" action="./asistencia_vista.php">
                                                    <td style="display:none;"><input type="number" name="grupoid_input" value="'.$grupos[$k][grupo_id].'"></td>
                                                    <td>'.$grupos[$k][curso_nombre].'</td>
                                                    <td>'.$grupos[$k][grupo_id].'</td>
                                                    <td>'.$grupos[$k][tipo].'</td>
                                                    <td><button type="submit" class="btn btn-default ">Tomar Asistencia</button></td>
                                                </form>
                                                </tr>
                                        ';
                                        
                                    }
                                    echo'
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.table-responsive -->
                                
                            
                                    ';
                            ?>  
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

=======
<?php include("restriccion.php"); ?>

<!DOCTYPE html>
<html lang="en">
<?php include("head.php"); ?>

<body>

    <div id="wrapper">

    <?php include("panel.php");?>
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
                            Grupos de cursos-teoria, cursos-práctica y cursos-laboratorio del docente
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <br>
                            

                            <?php
                                error_reporting(0);
                                require '../Modelo/grupos_modelo.php';
                                require '../Modelo/docente_modelo.php';
                                require '../Modelo/aulas_modelo.php';
                                require '../Modelo/periodos_modelo.php';
                                $objGrupo = new grupos_modelo(); 
                                $objDocente = new docente_modelo();
                                $objAulas = new aulas_modelo();
                                $objPeriodo = new periodos_modelo();
                                $periodos = $objPeriodo->get_periodos();
                                    echo'
                                                                  
                                        <div class="dataTable_wrapper">
                                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                <thead>
                                                    <tr>
                                                        <th style="display:none;">Id Curso</th>
                                                        <th>Curso</th>
                                                        <th>Id Grupo</th>
                                                        <th>Tipo</th>
                                                        <th>Registrar Asistencia</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                    '; 
                                                                   
                                    $grupos = $objGrupo->get_grupos2();
                                    for($k = 0; $k < sizeof($grupos); $k++){
                                        echo'
                                                <tr class="odd gradeX">
                                                <form method="get" id="rowgrupo_form2" action="./asistencia_vista.php">
                                                    <td style="display:none;"><input type="number" name="grupoid_input" value="'.$grupos[$k][grupo_id].'"></td>
                                                    <td>'.$grupos[$k][curso_nombre].'</td>
                                                    <td>'.$grupos[$k][grupo_id].'</td>
                                                    <td>'.$grupos[$k][tipo].'</td>
                                                    <td><button type="submit" class="btn btn-default ">Tomar Asistencia</button></td>
                                                </form>
                                                </tr>
                                        ';
                                        
                                    }
                                    echo'
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.table-responsive -->
                                
                            
                                    ';
                            ?>  
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

>>>>>>> 1160af6cf3790be2d4a717c7951b8d4cdca6a3cd
</html>