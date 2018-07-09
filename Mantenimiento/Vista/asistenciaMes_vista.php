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



                                        <?php
                                        error_reporting(0);
                                            require '../Modelo/clase_modelo.php';
                                            $objClase = new clase_modelo();
                                            $clases = $objClase->get_clase_by_group($_POST['cbx_grupos']);
                                            $clasesfecha = $objClase->get_clase_fecha_by_group($_POST['cbx_grupos'],  $_POST['periodoinput']);
                                            $clasesfechar = $objClase->get_clase_fecha_by_group_repro($_POST['cbx_grupos'],  $_POST['periodoinput']);

                                        $dateComponents = getdate();

                                         $month = $_POST['periodoinput'];                
                                        $year = $dateComponents['year'];
                                        // Create array containing abbreviations of days of week.
                                        $daysOfWeek = array('Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado');

                                         // What is the first day of the month in question?
                                         $firstDayOfMonth = mktime(0,0,0,$month,1,$year);

                                         // How many days does this month contain?
                                         $numberDays = date('t',$firstDayOfMonth);

                                         // Retrieve some information about the first day of the
                                         // month in question.
                                         $dateComponents = getdate($firstDayOfMonth);

                                         // What is the name of the month in question?
                                         $monthName = $dateComponents['month'];

                                         // What is the index value (0-6) of the first day of the
                                         // month in question.
                                         $dayOfWeek = $dateComponents['wday'];

                                         // Create the table tag opener and day headers

                                         echo "<table class='table table-bordered'>";
                                         echo "<caption>$monthName $year</caption>";
                                         echo "<tr>";

                                         // Create the calendar headers

                                         foreach($daysOfWeek as $day) {
                                              echo "<th class='header'>$day</th>";
                                         } 

                                         // Create the rest of the calendar

                                         // Initiate the day counter, starting with the 1st.

                                         $currentDay = 1;

                                         echo "</tr><tr>";

                                         // The variable $dayOfWeek is used to
                                         // ensure that the calendar
                                         // display consists of exactly 7 columns.

                                         if ($dayOfWeek > 0) { 
                                              echo"<td colspan='$dayOfWeek'>&nbsp;</td>"; 
                                         }
                                         
                                         $month = str_pad($month, 2, "0", STR_PAD_LEFT);
                                      
                                         while ($currentDay <= $numberDays) {

                                              // Seventh column (Saturday) reached. Start a new row.

                                              if ($dayOfWeek == 7) {

                                                   $dayOfWeek = 0;
                                                   echo "</tr><tr>";

                                              }
                                              
                                              $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
                                              
                                              $date = "$year-$month-$currentDayRel";

                                              echo "<td class='day' rel='$date'>$currentDay ";
                                              if($dayOfWeek > 0 && $dayOfWeek < 6){
                                                $dayt = $dayOfWeek - 1; 
                                                if($clases[$dayt][activo] == 1) {
                                                     echo "<br>".$clases[$dayt][hora_ingreso]. " - ".$clases[$dayt][hora_salida];
                                                    if(in_array($currentDay, $clasesfecha))
                                                        echo '<br> <p style="color:rgb(0, 153, 0);">asistio</p>';
                                                    else if(in_array($currentDay, $clasesfechar))
                                                        echo '<br> <p style="color:rgb(034, 113, 179);">reprogramado</p>';
                                                    else{
                                                        echo '<br> <p style="color:rgb(204, 0, 0);">falto</p>';
                                                        echo '<form method="post" action="./reprogramacion_vista.php">
                                                                    <input type="hidden" name="diafecha" value="'.$currentDay.'">
                                                                    <input type="hidden" name="mesfecha" value="'.$month.'">
                                                                    <input type="hidden" name="añofecha" value="'.$year.'">
                                                                    <input type="hidden" name="claseid" value="'.$clases[$dayt][clase_id].'">
                                                        <button type="submit">Reprogramar</button></form>';
                                                    }
                                                 }

                                              }
                                              echo "</td>";

                                              // Increment counters
                                     
                                              $currentDay++;
                                              $dayOfWeek++;

                                         }
                                         
                                         

                                         // Complete the row of the last week in month, if necessary

                                         if ($dayOfWeek != 7) { 
                                         
                                              $remainingDays = 7 - $dayOfWeek;
                                              echo "<td colspan='$remainingDays'>&nbsp;</td>"; 

                                         }
                                         
                                         echo "</tr>";

                                         echo "</table>";
                                ?>

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
