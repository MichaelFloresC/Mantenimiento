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
                            Reporte por Cursos
                        </div>
                        <!--  -->
						<div class="dropdown show">
							<a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Seleccione un curso
							</a>

							<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
							<?php foreach($this->model->Listar() as $r): ?>
								<a class="dropdown-item" href="../Vista/reporte.php?c=PorCurso&a=Reporte&curso_id=<?php echo $r->curso_id; ?>"><?php echo $r->curso_nombre; ?></a>
							<?php endforeach; ?>
							</div>
						</div>

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
