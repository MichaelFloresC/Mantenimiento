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
                            REGISTRAR ASISTENCIA - 
                            <?php
                            error_reporting(0);
                            require '../Modelo/grupos_modelo.php';
                            $objGrupo = new grupos_modelo();
                            $dato = $objGrupo->get_curso_grupo($_GET['grupoid_input']);
                            echo $dato[0][curso_nombre]. ' - ' .$dato[0][tipo];
                            ?>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <form>


                            <div class="dataTable_wrapper">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                
                                        <tr>
                                            <th>Nombres</th>
                                            <th>CUI</th>
                                            <th><center>Asistencia</center></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $alumnos = $objGrupo->get_alumnos_grupo($_GET['grupoid_input']);
                                            for($i = 0; $i < sizeof($alumnos); $i++){
                                                echo '
                                                    <tr class="odd gradeX">
                                                        <input type="hidden" value="'.$alumnos[$i][estudiante_id] .'"> 
                                                        <td>'.$alumnos[$i][estudiante_nombre].'</td>
                                                        <td>'.$alumnos[$i][CUI].'</td>
                                                        <td class="center"><center><input type="checkbox" name="check" value="check">   Asistio </center><br></td>
                                                    </tr>
                                                ';
                                            }
                                        ?>
                                                       
                                    </tbody>
                                </table>
                               <center><button type="button" class="btn btn-outline btn-warning">Guardar Asistencias</button></a></center>
                            </div>
                            <!-- /.table-responsive -->
                            </form> 
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
	<?php include("scripts.php"); ?>
</body>

</html>
