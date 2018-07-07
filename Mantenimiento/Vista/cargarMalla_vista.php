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
                            Carga de Malla curricular
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-pills">
                                <li><a href="#Formulario" data-toggle="tab">Formulario</a>
                                </li>
                                <li class="active"><a href="#Archivo" data-toggle="tab">Archivo</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade" id="Formulario">
                                    <form role="form">
                                        <br>
                                        <div class="form-group col-lg-12">
                                            <label>Nombre del curso</label>
                                            <input class="form-control" placeholder="Ingrese el Nombre del curso">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>Código del curso</label>
                                            <input class="form-control" placeholder="Ingrese el Código del curso">
                                        </div>
                                        <br>
                                        <br>
                                        <div class="col-lg-12">
                                            <button type="submit" class="btn btn-default ">Registrar</button>
                                            <button type="reset" class="btn btn-default">Reset</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade in active" id="Archivo">
                                    <br>
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
                                        </div>
                                        <br>
                                        <div class="form-group col-lg-6">
                                            <label>Nombre de la malla curricular</label>
                                            <input class="form-control" name="mallaname" placeholder="Ingrese el nombre de la malla curricular">
                                        </div>
                                        <br>
                                        <div class="form-group col-lg-6">
                                            <label>Subir Archivo con la lista de cursos</label>
                                            <input type="file" class="form-control-file" name="archivoxls" id="archivoxls" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" ID="fileSelect" runat="server">
                                        </div>
                                        <br>
                                        <div class="col-lg-12">
                                            <button name="submit" type="submit" class="btn btn-default ">Registrar</button>
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
