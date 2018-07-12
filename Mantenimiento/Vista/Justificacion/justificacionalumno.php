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
                            Justificar Inasistencia del Alumno
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-pills">
                                <li class="active"><a href="#Formulario" data-toggle="tab">Formulario</a>
                                </li>
                                <li><a href="#Archivo" data-toggle="tab">Archivo</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="Formulario">
									<form role="form" id="frm-alumno" action="?c=justificacionalumno&a=EnviarJustificacion" method="post" >
                                        <input type="hidden" name="justificado" value="1" />
										<label >Seleccionar alumno</label>
										<select class="form-control" name="estudiante_id">									
										<?php foreach($this->model->Listar() as $r): ?>
											<option name=<?php echo $r->estudiante_id; ?>><?php echo $r->estudiante_nombre; ?></option>                                      
										<?php endforeach; ?>    
										</select>
										<br>
										<div class="col-lg-12">
											<button type="submit" class="btn btn-default ">Justificar</button>
											<button type="reset" class="btn btn-default">Reset</button>
										</div>
                                    </form>
								</div>
                                <div class="tab-pane fade" id="Archivo">
                                    <form role="form" id="frm-alumno-archivo"  action="?c=justificacionalumno&a=EnviarJustificacion" enctype="multipart/form-data" method="post">
                                        <input type="hidden" name="justificado" value="1" />
                                        <input type="hidden" name="documento_justificacion" value="1" />
										<label >Seleccionar alumno</label>
										<select class="form-control" name="estudiante_id">									
										<?php foreach($this->model->Listar() as $r): ?>
											<option name=<?php echo $r->estudiante_id; ?>><?php echo $r->estudiante_nombre; ?></option>                                      
										<?php endforeach; ?>    
										</select>
										<br>
                                        <div class="form-group">
                                            <label>Subir Archivo</label>
                                            <input id="archivo" accept=".csv" name="archivo" type="file" /> 
                                        </div>
                                  
                                        <button type="submit" class="btn btn-default">Justificar</button>
                                        <button type="reset" class="btn btn-default">Reset</button>
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
	<?php include("scripts.php"); ?>

</body>

</html>
