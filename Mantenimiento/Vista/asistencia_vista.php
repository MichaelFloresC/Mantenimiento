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
                            Asistencia
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                
                                        <tr>
                                            <th><center>#</center></th>
                                            <th>Nombres</th>
                                            <th>CUI</th>
                                            <th><center>Asistencia</center></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr class="odd gradeX">
                                            <td><center>3</center></td>
                                            <td>Luis Jimenez Gonzales</td>
                                            <td>20123677</td>
                                            <td class="center"><center><input type="checkbox" name="check" value="check">   Asistio </center><br></td>
                                        </tr>
                                         <tr class="odd gradeX">
                                             <td><center>4</center></td>
                                            <td>Michael Flores Conislla</td>
                                            <td>20148677</td>
                                            <td class="center"><center><input type="checkbox" name="check" value="check">   Asistio </center><br></td>
                                        </tr>
                                         <tr class="odd gradeX">
                                            <td><center>1</center></td>
                                            <td>Eloi Gutierres Conde</td>
                                            <td>20123677</td>
                                            <td class="center"><center><input type="checkbox" name="check" value="check">   Asistio </center><br></td>
                                        </tr>
                                         <tr class="odd gradeX">
                                             <td><center>2</center></td>
                                            <td>Esthepany Luzar Flores</td>
                                            <td>20123677</td>
                                            <td class="center"><center><input type="checkbox" name="check" value="check">   Asistio </center><br></td>
                                        </tr>
                                         <tr class="odd gradeX">
                                             <td><center>5</center></td>
                                            <td>Veronica Vallesiano Cartagena</td>
                                            <td>20123677</td>
                                            <td class="center"><center><input type="checkbox" name="check" value="check">   Asistio </center><br></td>
                                        </tr>
                                                   
                                    </tbody>
                                </table>
                               <center><button type="button" class="btn btn-outline btn-warning">Guardar Asistencias</button></a></center>
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
