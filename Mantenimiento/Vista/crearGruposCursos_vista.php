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
                            Crear grupos de Cursos
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <form method="post" action="../Controlador/cargarMalla_controlador.php" enctype="multipart/form-data">
                                <div class="form-group col-lg-12">
                                    <label>Seleccionar Escuela Profesional</label>
                                    <select class="form-control" name="escuelaid">
                                    <?php
                                        require '../Modelo/escuelas_modelo.php';
                                        $objEscuela = new escuelas_modelo();
                                        $escuelas = $objEscuela->get_escuelas();
                                        for($j = 0; $j < sizeof($escuelas); $j++)
                                            echo '<option value="'.$escuelas[$j][escuela_id].'">'.$escuelas[$j][escuela_nombre].'</option>';
                                    ?>
                                    </select>
                                    <br>
                                    <label>Seleccionar Periodo</label>
                                    <select class="form-control" name="periodoid">
                                    <?php
                                        require '../Modelo/periodos_modelo.php';
                                        $objPeriodo = new periodos_modelo();
                                        $periodos = $objPeriodo->get_periodos();
                                        for($j = 0; $j < sizeof($periodos); $j++)
                                            echo '<option value="'.$periodos[$j][periodo_id].'">'.$periodos[$j][periodo_descripcion].'</option>';
                                    ?>
                                    </select>
                                </div>
                            </form>
                            <ul class="nav nav-pills">
                            <?php
                                //error_reporting(0);
                                require '../Modelo/plan_modelo.php';
                                $objMalla = new plan_modelo();
                                $mallas = $objMalla->get_malla();
                                for($j = 0; $j < sizeof($mallas); $j++)
                                    echo '<li><a href="#'.$mallas[$j][plan_id].'" data-toggle="tab">'.$mallas[$j][plan_nombre].'</a></li>';
                            ?>
                            </ul>
                            <br>
                            <!-- Tab panes -->
                            <div class="tab-content">

                            <?php
                                require '../Modelo/cursos_modelo.php';
                                $objCurso = new cursos_modelo(); 
                                for($j = 0; $j < sizeof($mallas); $j++){
                                    echo'
                                <div class="tab-pane fade" id="'.$mallas[$j][plan_id].'">                                   
                                        <div class="dataTable_wrapper">
                                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                <thead>
                                                                    <tr>
                                                                        <th>Código</th>
                                                                        <th>Nombre</th>
                                                                        <th>Teoría</th>
                                                                        <th>Laboratorio</th>
                                                                        <th>Práctica</th>
                                                                        <th>Registrar</th>
                                                                    </tr>
                                                </thead>
                                                <tbody>
                                    '; 
                                                                   
                                    
                                    //error_reporting(0);
                                    $cursos = $objCurso->get_cursos($mallas[$j][plan_id]);
                                    for($k = 0; $k < sizeof($cursos); $k++){
                                        echo'
                                                    <tr class="odd gradeX">
                                                        <td>'.$cursos[$k][curso_id].'</td>
                                                        <td>'.$cursos[$k][curso_nombre].'</td>
                                                        <td><input class="form-control" placeholder="Cantidad grupos Teoría" type="number" min="0" step="1"></td>
                                                        <td><input class="form-control" placeholder="Cantidad grupos Laboratorio" type="number" min="0" step="1"></td>
                                                        <td><input class="form-control" placeholder="Cantidad grupos Prácticas" type="number" min="0" step="1"></td>
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