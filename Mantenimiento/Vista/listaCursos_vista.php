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
                            Cursos Registrados por Malla Curricular
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
							<ul class="nav nav-pills">
                                <li class="active"><a href="#2012" data-toggle="tab">Malla Curricular 2012</a>
                                </li>
                                <li><a href="#2018" data-toggle="tab">Malla Curricular 2018</a>
                                </li>
                            </ul>
							
							<!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="2012">									
								<div class="dataTable_wrapper">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Código</th>
                                            <th>Nombre</th>
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="odd gradeX">
                                            <td>2012010406</td>
                                            <td>Fundamentos de Programación</td>
                                            <td class="center"><button type="button" class="btn btn-outline btn-warning">Actualizar</button></td>
                                            <td class="center"><button type="button" class="btn btn-outline btn-danger">Eliminar</button></td>
                                        </tr>

                                    </tbody>
                                </table>
								</div>
                            <!-- /.table-responsive -->
								</div>
                                <div class="tab-pane fade" id="2018">
                                    <div class="dataTable_wrapper">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Código</th>
                                            <th>Nombre</th>
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="odd gradeX">
                                            <td>2012010406</td>
                                            <td>Comunicación Oral y Escrita</td>
                                            <td class="center"><button type="button" class="btn btn-outline btn-warning">Actualizar</button></td>
                                            <td class="center"><button type="button" class="btn btn-outline btn-danger">Eliminar</button></td>
                                        </tr>
                                    </tbody>
                                </table>
								</div>
								</div>
                                
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
