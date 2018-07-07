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
                                require '../Modelo/docente_modelo.php';
                                require '../Modelo/aulas_modelo.php';
                                $objGrupo = new grupos_modelo(); 
                                $objDocente = new docente_modelo();
                                $objAulas = new aulas_modelo();

                                for($j = 0; $j < sizeof($periodos); $j++){
                                    echo'
                                <div class="tab-pane fade" id="'.$periodos[$j][periodo_id].'">                                   
                                        <div class="dataTable_wrapper">
                                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                <thead>
                                                    <tr>
                                                        <th style="display:none;">Id Curso</th>
                                                        <th>Curso</th>
                                                        <th>Id Grupo</th>
                                                        <th>Tipo</th>
                                                        <th>Aula</th>
                                                        <th>Docente</th>
                                                        <th>Días</th>
                                                        <th>H. Inicio</th>
                                                        <th>H. Fin</th>
                                                        <th>Registrar</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                    '; 
                                                                   
                                    $grupos = $objGrupo->get_grupos($periodos[$j][periodo_id]);
                                    for($k = 0; $k < sizeof($grupos); $k++){
                                        echo'
                                                <tr class="odd gradeX">
                                                <form method="post" id="rowgrupo_form2" action="../controlador/registroHorario_controlador.php">
                                                    <td style="display:none;"><input type="number" name="cursoid_input" value="'.$grupos[$k][curso_id].'"></td>
                                                    <td>'.$grupos[$k][curso_nombre].'</td>
                                                    <td>'.$grupos[$k][grupo_id].'</td>
                                                    <td>'.$grupos[$k][tipo].'</td>
                                                    <td>'.$grupos[$k][aula_etiqueta].'</td>
                                                    <td>'.$grupos[$k][docente_nombre].'</td>
                                                    <td><label> Lunes </label><br>
                                                        <label> Martes </label><br>
                                                        <label> Miércoles </label><br>
                                                        <label> Jueves </label><br>
                                                        <label> Viernes </label><br>
                                                    </td>
                                                    <td><input type="time" id="inicioLunes">
                                                        <input type="time" id="inicioMartes">
                                                        <input type="time" id="inicioMiercoles">
                                                        <input type="time" id="inicioJueves">
                                                        <input type="time" id="inicioViernes">
                                                    </td>
                                                    <td>
                                                        <input type="time" id="finLunes">
                                                        <input type="time" id="finMartes">
                                                        <input type="time" id="finMiercoles">
                                                        <input type="time" id="finJueves">
                                                        <input type="time" id="finViernes">
                                                    </td>
                                                    <td><button type="submit" class="btn btn-default ">Registrar</button></td>
                                                </form>
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