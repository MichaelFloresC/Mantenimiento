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
                            Alumnos Registrados
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Apellidos y Nombres</th>
                                            <th>CUI</th>
                                            <th>Email</th>
                                            <th>Direccion</th>
                                            
											<?php
												if($_SESSION['rol']==1){
											?>
											<th>Editar</th>
											<th>Eliminar</th>
											<?php
												}
											?>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php foreach($this->model->Listar() as $r): ?>
                                        <tr class="odd gradeX">
											<td><?php echo $r->estudiante_nombre; ?></td>
											<td><?php echo $r->CUI; ?></td>
											<td><?php echo $r->email; ?></td>
											<td><?php echo $r->direccion; ?></td>
											<?php
												if($_SESSION['rol']==1){
											?>
											<td class="center"><a href="?c=alumno&a=Crud&persona_id=<?php echo $r->estudiante_id; ?>"><button type="button" class="btn btn-outline btn-warning">Editar</button></a></td>
											<td class="center"><a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=alumno&a=Eliminar&persona_id=<?php echo $r->estudiante_id; ?>"><button type="button" class="btn btn-outline btn-danger">Eliminar</button></a></td>
											<?php
												}
											?>
                                        </tr>                                        
                                    <?php endforeach; ?>    
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
