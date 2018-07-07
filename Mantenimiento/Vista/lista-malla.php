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
                            Malla Curricular
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
							<ul class="nav nav-pills">
                                <li class="active"><a href="#2012" data-toggle="tab">2012</a>
                                </li>
                                <li><a href="#2018" data-toggle="tab">2018</a>
                                </li>
                            </ul>
							
							<!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="2012">									
								<div class="dataTable_wrapper">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Curso</th>
                                            <th>Codigo</th>
                                            <th>Codigo Pre-requisito</th>
                                            <th>Semestre</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="odd gradeX">
                                            <td>Fundamentos de la Programación</td>
                                            <td>2864</td>
                                            <td>2024</td>
                                            <td>V</td>
                                        </tr>
                                        <tr class="even gradeC">
                                            <td>Comunicación Oral y Escrita</td>
                                            <td>2642</td>
                                            <td>2467</td>
                                            <td>III</td>
                                        </tr>
                                        <tr class="odd gradeA">
                                            <td>Proyecto de Software</td>
                                            <td>2783</td>
                                            <td>4246</td>
                                            <td>II</td>
                                        </tr>
                                        <tr class="even gradeA">
                                            <td>Cálculo en I Variable</td>
                                            <td>2483</td>
                                            <td>2684</td>
                                            <td>I</td>
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
                                            <th>Curso</th>
                                            <th>Codigo</th>
                                            <th>Codigo Pre-requisito</th>
                                            <th>Semestre</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="odd gradeX">
                                            <td>Fundamentos de la Programación</td>
                                            <td>2864</td>
                                            <td>2024</td>
                                            <td>V</td>
                                        </tr>
                                        <tr class="even gradeC">
                                            <td>Comunicación Oral y Escrita</td>
                                            <td>2642</td>
                                            <td>2467</td>
                                            <td>III</td>
                                        </tr>
                                        <tr class="odd gradeA">
                                            <td>Proyecto de Software</td>
                                            <td>2783</td>
                                            <td>4246</td>
                                            <td>II</td>
                                        </tr>
                                        <tr class="even gradeA">
                                            <td>Cálculo en I Variable</td>
                                            <td>2483</td>
                                            <td>2684</td>
                                            <td>I</td>
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
	<?php include("scripts.php"); ?>
</body>

</html>
