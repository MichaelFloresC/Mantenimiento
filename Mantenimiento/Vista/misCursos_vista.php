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
                            Grupos de Cursos y Laboratorios del docente
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                
                                        <tr>
                                            <th>Código</th>
                                            <th>Curso</th>
                                            <th>Id Grupo</th>
                                            <th>Tipo</th>
                                            <th><center>Registrar asistencia</center></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr class="odd gradeX">
                                            <td>1</td>
                                            <td>Calculo</td>
                                            <td>2</td>
                                            <td>Laboratorio</td>
                                            <td class="center"><center><button type="button" class="btn btn-outline btn-warning">Tomar asistencia</button></a></center><br>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            
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
