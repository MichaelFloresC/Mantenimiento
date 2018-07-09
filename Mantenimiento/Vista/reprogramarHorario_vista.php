<?php include("restriccion.php"); ?>
<!DOCTYPE html>
<html lang="en">

<?php include("head2.php"); ?>

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
                            REPROGRAMACIÓN DE HORARIOS
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <form method="post" action="./asistenciaMes_vista.php">
                                <div class="form-group col-lg-12">
                                    <label>Seleccionar Docente</label>
                                    <select class="form-control" name="cbx_docente" id="cbx_docente">
                                        <option value="0"> Seleccione un docente </option>
                                        <?php
                                            require '../Modelo/docente_modelo.php';
                                            $objDocente = new docente_modelo();
                                            $docentes = $objDocente->get_docentes();
                                            for($l = 0; $l < sizeof($docentes); $l++){
                                                echo' 
                                                            <option value="'.$docentes[$l][docente_id].'">'.$docentes[$l][docente_nombre].'</option>
                                                ';
                                            }
   
                                        ?>   
                                    </select>
                                    <br>
                                    <label>Seleccionar el curso - grupo</label>
                                    <select name ="cbx_grupos" id="cbx_grupos" class="form-control">
                                        
                                    </select>
                                </div>
                                <br>
                                <div class="form-group col-lg-6">
                                    
                                    <select class="form-control" name="periodoinput">
                                        <?php
                                            require '../Modelo/periodos_modelo.php';
                                            $objPeriodos = new periodos_modelo();
                                            $meses = $objPeriodos->get_actual_periodos_inicio_fin();
                                            for($l = $meses[0][inicio]; $l <= $meses[0][fin]; $l++){
                                                echo' 
                                                    <option value="'.$l.'">';
                                                switch ($l) {
                                                    case 1:
                                                        echo "enero";
                                                        break;
                                                    case 2:
                                                        echo "febero";
                                                        break;
                                                    case 3:
                                                        echo "marzo";
                                                        break;
                                                    case 4:
                                                        echo "abril";
                                                        break;
                                                    case 5:
                                                        echo "mayo";
                                                        break;
                                                    case 6:
                                                        echo "junio";
                                                        break;
                                                    case 7:
                                                        echo "julio";
                                                        break;
                                                    case 8:
                                                        echo "agosto";
                                                        break;
                                                    case 9:
                                                        echo "setiembre";
                                                        break;
                                                    case 10:
                                                        echo "octubre";
                                                        break;
                                                    case 11:
                                                        echo "noviembre";
                                                        break;
                                                    case 12:
                                                        echo "diciembre";
                                                        break;

                                                }



                                                    echo '</option>
                                                ';
                                            }


                                        ?>
                                    </select>
                                </div>
                                <br>
                                <div class="form-group col-lg-3">
                                    <button name="submit" type="submit" class="btn btn-default ">Continuar</button>
                                </div>
                                <br>
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
