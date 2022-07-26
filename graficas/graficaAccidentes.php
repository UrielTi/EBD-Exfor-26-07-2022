<?php session_start(); include "../include/conn/conn.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php include("head.php");
        include("../cond/todo.php"); 
        $fecha1 = $_POST['fecha1'];
        $fecha2 = $_POST['fecha2'];
        $nucleo = $_POST['nucleo'];

        //Lista de consultas a la tabla de la base de datos llamada accidentes
        
        /*Consultas al nombre con dias de incapacidad y 
        un contador de cuantas veces se accidenta la misma persona*/
        $result = mysqli_query($conn, "SELECT nombres, sum(dias_incapacidad) AS dias FROM accidentes WHERE nucleo='$nucleo' and fecha_inicio BETWEEN '$fecha1' AND '$fecha2' GROUP BY nombres ORDER BY dias DESC") or die("Error in Selecting " . mysqli_error($conn));
        $resultCont = mysqli_query($conn, "SELECT nombres, COUNT(nombres) AS cont FROM accidentes WHERE nucleo='$nucleo' and fecha_inicio BETWEEN '$fecha1' AND '$fecha2' GROUP BY nombres ORDER BY cont DESC") or die("Error in Selecting " . mysqli_error($conn));

        /*Consultas al cargo con dias de incapacidad y 
        un contador de cuantas veces se accidenta por el mismo cargo*/
        $result1 = mysqli_query($conn, "SELECT cargo, sum(dias_incapacidad) AS dias FROM accidentes WHERE nucleo='$nucleo' and fecha_inicio BETWEEN '$fecha1' AND '$fecha2' GROUP BY cargo ORDER BY dias DESC") or die("Error in Selecting " . mysqli_error($conn));
        $result1Cont = mysqli_query($conn, "SELECT cargo, COUNT(cargo) AS cont FROM accidentes WHERE nucleo='$nucleo' and fecha_inicio BETWEEN '$fecha1' AND '$fecha2' GROUP BY cargo ORDER BY cont DESC") or die("Error in Selecting " . mysqli_error($conn));

        /*Consultas al proceso con dias de incapacidad y 
        un contador de cuantas veces se accidenta por el mismo proceso*/
        $result2 = mysqli_query($conn, "SELECT proceso, sum(dias_incapacidad) AS dias FROM accidentes WHERE nucleo='$nucleo' and fecha_inicio BETWEEN '$fecha1' AND '$fecha2' GROUP BY proceso ORDER BY dias DESC") or die("Error in Selecting " . mysqli_error($conn));
        $result2Cont = mysqli_query($conn, "SELECT proceso, count(proceso) AS cont FROM accidentes WHERE nucleo='$nucleo' and fecha_inicio BETWEEN '$fecha1' AND '$fecha2' GROUP BY proceso ORDER BY cont DESC") or die("Error in Selecting " . mysqli_error($conn));

        /*Consultas al supervisor con dias de incapacidad y 
        un contador de cuantas veces se accidenta con el mismo supervisor*/
        $result3 = mysqli_query($conn, "SELECT supervisor, SUM(dias_incapacidad) AS dias FROM accidentes WHERE nucleo='$nucleo' and fecha_inicio BETWEEN '$fecha1' AND '$fecha2' GROUP BY supervisor ORDER BY dias DESC") or die("Error in Selecting " . mysqli_error($conn));
        $result3Cont = mysqli_query($conn, "SELECT supervisor, COUNT(supervisor) AS cont FROM accidentes WHERE nucleo='$nucleo' and fecha_inicio BETWEEN '$fecha1' AND '$fecha2' GROUP BY supervisor ORDER BY cont DESC") or die("Error in Selecting " . mysqli_error($conn));

        /*Consultas al evento con dias de incapacidad y 
        un contador de cuantos accidentes hay por el mismo evento*/
        $result4 = mysqli_query($conn, "SELECT evento, SUM(dias_incapacidad) AS dias FROM accidentes WHERE nucleo='$nucleo' and fecha_inicio BETWEEN '$fecha1' AND '$fecha2' GROUP BY evento ORDER BY dias DESC") or die("Error in Selecting " . mysqli_error($conn));
        $result4Cont = mysqli_query($conn, "SELECT evento, COUNT(evento) AS cont FROM accidentes WHERE nucleo='$nucleo' and fecha_inicio BETWEEN '$fecha1' AND '$fecha2' GROUP BY evento ORDER BY cont DESC") or die("Error in Selecting " . mysqli_error($conn));

        /*Consultas al nucleo con dias de incapacidad y 
        un contador de cuantas veces se accidenta por el nucleo*/
        $result5 = mysqli_query($conn, "SELECT nucleo, SUM(dias_incapacidad) AS dias FROM accidentes WHERE fecha_inicio BETWEEN '$fecha1' AND '$fecha2' GROUP BY nucleo ORDER BY dias DESC") or die("Error in Selecting " . mysqli_error($conn));
        $result5Cont = mysqli_query($conn, "SELECT nucleo, COUNT(nucleo) AS cont FROM accidentes WHERE fecha_inicio BETWEEN '$fecha1' AND '$fecha2' GROUP BY nucleo ORDER BY cont DESC") or die("Error in Selecting " . mysqli_error($conn));

        /*Consultas al dia con dias de incapacidad y 
        un contador de cuantas veces se accidenta por el dia */
        $result6 = mysqli_query($conn, "SELECT dia, SUM(dias_incapacidad) AS dias FROM accidentes WHERE nucleo='$nucleo' and fecha_inicio BETWEEN '$fecha1' AND '$fecha2' GROUP BY dia ORDER BY dias DESC") or die("Error in Selecting " . mysqli_error($conn));
        $result6Cont = mysqli_query($conn, "SELECT dia, COUNT(dia) AS cont FROM accidentes WHERE nucleo='$nucleo' and fecha_inicio BETWEEN '$fecha1' AND '$fecha2' GROUP BY dia ORDER BY cont DESC") or die("Error in Selecting " . mysqli_error($conn));

        /*Consultas a la hora con dias de incapacidad y 
        un contador de cuantas veces se accidenta a la misma hora*/
        $result7 = mysqli_query($conn, "SELECT hora, SUM(dias_incapacidad) AS dias FROM accidentes WHERE nucleo='$nucleo' and fecha_inicio BETWEEN '$fecha1' AND '$fecha2' GROUP BY hora ORDER BY dias DESC") or die("Error in Selecting " . mysqli_error($conn));
        $result7Cont = mysqli_query($conn, "SELECT hora, COUNT(hora) AS cont FROM accidentes WHERE nucleo='$nucleo' and fecha_inicio BETWEEN '$fecha1' AND '$fecha2' GROUP BY hora ORDER BY cont DESC") or die("Error in Selecting " . mysqli_error($conn));
        
        /*Consultas al mes con dias de incapacidad y 
        un contador de cuantas veces se accidenta por mes del envento*/
        $result8 = mysqli_query($conn, "SELECT mes, SUM(dias_incapacidad) AS dias FROM accidentes WHERE nucleo='$nucleo' and fecha_inicio BETWEEN '$fecha1' AND '$fecha2' GROUP BY mes ORDER BY dias DESC") or die("Error in Selecting " . mysqli_error($conn));
        $result8Cont = mysqli_query($conn, "SELECT mes, COUNT(mes) AS cont FROM accidentes WHERE nucleo='$nucleo' and fecha_inicio BETWEEN '$fecha1' AND '$fecha2' GROUP BY mes ORDER BY cont DESC") or die("Error in Selecting " . mysqli_error($conn));

        /*Consultas al año con dias de incapacidad y 
        un contador de cuantas veces se accidentan por año*/
        $result9 = mysqli_query($conn, "SELECT año, SUM(dias_incapacidad) AS dias FROM accidentes WHERE nucleo='$nucleo' GROUP BY año ORDER BY dias DESC") or die("Error in Selecting " . mysqli_error($conn));
        $result9Cont = mysqli_query($conn, "SELECT año, COUNT(año) AS cont FROM accidentes WHERE nucleo='$nucleo' GROUP BY año ORDER BY cont DESC") or die("Error in Selecting " . mysqli_error($conn));

        /*Consultas a la finca con dias de incapacidad y 
        un contador de cuantas veces se accidenta en la misma finca*/
        $result10 = mysqli_query($conn, "SELECT finca, SUM(dias_incapacidad) AS dias FROM accidentes WHERE nucleo='$nucleo' and fecha_inicio BETWEEN '$fecha1' AND '$fecha2' GROUP BY finca ORDER BY dias DESC") or die("Error in Selecting " . mysqli_error($conn));
        $result10Cont = mysqli_query($conn, "SELECT finca, COUNT(finca) AS cont FROM accidentes WHERE nucleo='$nucleo' and fecha_inicio BETWEEN '$fecha1' AND '$fecha2' GROUP BY finca ORDER BY cont DESC") or die("Error in Selecting " . mysqli_error($conn));

        /*Consultas al peligro o factor de riesgo con dias de incapacidad y 
        un contador de cuantas veces se accidenta con el mismo peligro o factor de riesgo*/
        $result11 = mysqli_query($conn, "SELECT peligro, SUM(dias_incapacidad) AS dias FROM accidentes WHERE nucleo='$nucleo' and fecha_inicio BETWEEN '$fecha1' AND '$fecha2' GROUP BY peligro ORDER BY dias DESC") or die("Error in Selecting " . mysqli_error($conn));
        $result11Cont = mysqli_query($conn, "SELECT peligro, COUNT(peligro) AS cont FROM accidentes WHERE nucleo='$nucleo' and fecha_inicio BETWEEN '$fecha1' AND '$fecha2' GROUP BY peligro ORDER BY cont DESC") or die("Error in Selecting " . mysqli_error($conn));

        /*Consultas al mecanismo con dias de incapacidad y 
        un contador de cuantas veces se accidenta por el mismo mecanismo*/
        $result12 = mysqli_query($conn, "SELECT mecanismo, SUM(dias_incapacidad) AS dias FROM accidentes WHERE nucleo='$nucleo' and fecha_inicio BETWEEN '$fecha1' AND '$fecha2' GROUP BY mecanismo ORDER BY dias DESC") or die("Error in Selecting " . mysqli_error($conn));
        $result12Cont = mysqli_query($conn, "SELECT mecanismo, COUNT(mecanismo) AS cont FROM accidentes WHERE nucleo='$nucleo' and fecha_inicio BETWEEN '$fecha1' AND '$fecha2' GROUP BY mecanismo ORDER BY cont DESC") or die("Error in Selecting " . mysqli_error($conn));

        /*Consultas al agente de lesion con dias de incapacidad y 
        un contador de cuantas veces se accidenta con el mismo agente de lesion*/
        $result13 = mysqli_query($conn, "SELECT agente_lesion, SUM(dias_incapacidad) AS dias FROM accidentes WHERE nucleo='$nucleo' and fecha_inicio BETWEEN '$fecha1' AND '$fecha2' GROUP BY agente_lesion ORDER BY dias DESC") or die("Error in Selecting " . mysqli_error($conn));
        $result13Cont = mysqli_query($conn, "SELECT agente_lesion, COUNT(agente_lesion) AS cont FROM accidentes WHERE nucleo='$nucleo' and fecha_inicio BETWEEN '$fecha1' AND '$fecha2' GROUP BY agente_lesion ORDER BY cont DESC") or die("Error in Selecting " . mysqli_error($conn));

        /*Consultas al tipo de lesion con dias de incapacidad y 
        un contador de cuantas veces se accidenta por el mismo tipo de lesion*/
        $result14 = mysqli_query($conn, "SELECT tipo_lesion, SUM(dias_incapacidad) AS dias FROM accidentes WHERE nucleo='$nucleo' and fecha_inicio BETWEEN '$fecha1' AND '$fecha2' GROUP BY tipo_lesion ORDER BY dias DESC") or die("Error in Selecting " . mysqli_error($conn));
        $result14Cont = mysqli_query($conn, "SELECT tipo_lesion, COUNT(tipo_lesion) AS cont FROM accidentes WHERE nucleo='$nucleo' and fecha_inicio BETWEEN '$fecha1' AND '$fecha2' GROUP BY tipo_lesion ORDER BY cont DESC") or die("Error in Selecting " . mysqli_error($conn));

        /*Consultas a la parte afectada con dias de incapacidad y 
        un contador de cuantas veces se accidenta en la misma parte afectada */
        $result15 = mysqli_query($conn, "SELECT parte_afectada, SUM(dias_incapacidad) AS dias FROM accidentes WHERE nucleo='$nucleo' and fecha_inicio BETWEEN '$fecha1' AND '$fecha2' GROUP BY parte_afectada ORDER BY dias DESC") or die("Error in Selecting " . mysqli_error($conn));
        $result15Cont = mysqli_query($conn, "SELECT parte_afectada, COUNT(parte_afectada) AS cont FROM accidentes WHERE nucleo='$nucleo' and fecha_inicio BETWEEN '$fecha1' AND '$fecha2' GROUP BY parte_afectada ORDER BY cont DESC") or die("Error in Selecting " . mysqli_error($conn));

        /*Consultas al lugar con dias de incapacidad y 
        un contador de cuantas veces se accidenta en el mismo lugar */
        $result16 = mysqli_query($conn, "SELECT lugar, SUM(dias_incapacidad) AS dias FROM accidentes WHERE nucleo='$nucleo' and fecha_inicio BETWEEN '$fecha1' AND '$fecha2' GROUP BY lugar ORDER BY dias DESC") or die("Error in Selecting " . mysqli_error($conn));
        $result16Cont = mysqli_query($conn, "SELECT lugar, COUNT(lugar) AS cont FROM accidentes WHERE nucleo='$nucleo' and fecha_inicio BETWEEN '$fecha1' AND '$fecha2' GROUP BY lugar ORDER BY cont DESC") or die("Error in Selecting " . mysqli_error($conn));

    ?>
    <script type="text/javascript">
        function drawChart() {
            //Dibuja grafica del nombre empleado, unida ala consulta result
            //dias
            var data = new google.visualization.DataTable();
            var data = google.visualization.arrayToDataTable([
                ["Nombres - Dias","Dias"],
                <?php           
                    while($row = mysqli_fetch_assoc($result)){
                        echo "['".$row["nombres"].' - '.$row['dias']."', ".$row["dias"]."],";
                    }
                ?>
            ]);

            var options = {
                title: "Dias de accidentes por persona",
                is3D: true,
                width: "100%",
                height: 450,

            };

            //contador
            var data1 = new google.visualization.DataTable();
            var data1 = google.visualization.arrayToDataTable([
                ["Nombres - Cont","Cont"],
                <?php            
                    while($row = mysqli_fetch_assoc($resultCont)){
                        echo "['".$row["nombres"].' - '.$row['cont']."', ".$row["cont"]."],";
                    }
                ?>
            ]);

            var options1 = {
                title: "Contador de accidentes por persona",
                is3D: true,
                width: "100%",
                height: 450,

            };

            var chart = new google.visualization.PieChart(document.getElementById("verfigura"));
            chart.draw(data, options);
            var chart1 = new google.visualization.PieChart(document.getElementById("verfiguraCont"));
            chart1.draw(data1, options1);

            //---------------------------------------------------------------------------------------------

            //Dibuja grafica del cargo empleado, unida ala consulta result1
            //dias
            var data = new google.visualization.DataTable();
            var data = google.visualization.arrayToDataTable([
                ["Cargo - Dias","Dias"],
                <?php
                    while($row = mysqli_fetch_assoc($result1)){
                        echo "['".$cargos[$row['cargo']].' - '.$row['dias']."', ".$row["dias"]."],";
                    }
                ?>
            ]); 
                
            var options = {
                title: "Dias de accidentes por cargo",
                is3D: true,
                width: "100%",
                height: 450
            };

            //contador
            var data1 = new google.visualization.DataTable();
            var data1 = google.visualization.arrayToDataTable([
                ["Cargo - Cont","Cont"],
                <?php                
                    while($row = mysqli_fetch_assoc($result1Cont)){
                        echo "['".$cargos[$row["cargo"]].' - '.$row['cont']."', ".$row["cont"]."],";
                    }
                ?>
            ]);

            var options1 = {
                title: "Contador de accidentes por cargo",
                is3D: true,
                width: "100%",
                height: 450,            
            };

            var chart = new google.visualization.PieChart(document.getElementById("verfigura1"));
            chart.draw(data, options);
            var chart1 = new google.visualization.PieChart(document.getElementById("verfigura1Cont"));
            chart1.draw(data1, options1);

            //----------------------------------------------------------------------------------------------

            //Dibuja grafica del proceso unida ala consulta result2
            //dias
            var data = new google.visualization.DataTable();
            var data = google.visualization.arrayToDataTable([
                ["proceso - Dias","Dias"],
                <?php
                    while($row = mysqli_fetch_assoc($result2)){
                        echo "['".$procesos[$row['proceso']].' - '.$row['dias']."', ".$row["dias"]."],";
                    }
                ?>
            ]); 

            var options = {
                title: "Dias de accidentes por proceso",
                is3D: true,
                width: "100%",
                height: 450
            };

            //contador
            var data1 = new google.visualization.DataTable();
            var data1 = google.visualization.arrayToDataTable([
                ["Proceso - Cont","Cont"],
                <?php            
                    while($row = mysqli_fetch_assoc($result2Cont)){
                        echo "['".$procesos[$row["proceso"]].' - '.$row['cont']."', ".$row["cont"]."],";
                    }
                ?>
            ]);

            var options1 = {
                title: "Contador de accidentes por proceso",
                is3D: true,
                width: "100%",
                height: 450,            
            };

            var chart = new google.visualization.PieChart(document.getElementById("verfigura2"));
            chart.draw(data, options);
            var chart1 = new google.visualization.PieChart(document.getElementById("verfigura2Cont"));
            chart1.draw(data1, options1);

            //----------------------------------------------------------------------------------------------

            //Dibuja grafica con el supervisor, unida ala consulta result3
            //dias
            var data = new google.visualization.DataTable();
            var data = google.visualization.arrayToDataTable([
                ["supervisor - Dias","Dias"],
                <?php
                    while($row = mysqli_fetch_assoc($result3)){
                        echo "['".$supervisores[$row['supervisor']].' - '.$row['dias']."', ".$row["dias"]."],";
                    }
                ?>
            ]); 

            var options = {
                title: "Dias de accidentes por supervisor",
                is3D: true,
                width: "100%",
                height: 450
            };

            //contador
            var data1 = new google.visualization.DataTable();
            var data1 = google.visualization.arrayToDataTable([
                ["Supervisor - Cont","Cont"],
                <?php            
                    while($row = mysqli_fetch_assoc($result3Cont)){
                        echo "['".$supervisores[$row["supervisor"]].' - '.$row['cont']."', ".$row["cont"]."],";
                    }
                ?>
            ]);

            var options1 = {
                title: "Contador de accidentes por supervisor",
                is3D: true,
                width: "100%",
                height: 450,            
            };

            var chart = new google.visualization.PieChart(document.getElementById("verfigura3"));
            chart.draw(data, options);
            var chart1 = new google.visualization.PieChart(document.getElementById("verfigura3Cont"));
            chart1.draw(data1, options1);

            //---------------------------------------------------------------------------------------------

            //Dibuja grafica del evento, unida ala consulta result4
            //dias
            var data = new google.visualization.DataTable();
            var data = google.visualization.arrayToDataTable([
                ["evento - Dias","Dias"],
                <?php
                    while($row = mysqli_fetch_assoc($result4)){
                        echo "['".$eventos_acc[$row['evento']].' - '.$row['dias']."', ".$row["dias"]."],";
                    }
                ?>
            ]); 

            var options = {
                title: "Dias de accidentes por evento",
                is3D: true,
                width: "100%",
                height: 450
            };

            //contador
            var data1 = new google.visualization.DataTable();
            var data1 = google.visualization.arrayToDataTable([
                ["evento - Cont","Cont"],
                <?php        
                    while($row = mysqli_fetch_assoc($result4Cont)){
                        echo "['".$eventos_acc[$row["evento"]].' - '.$row['cont']."', ".$row["cont"]."],";
                    }
                ?>
            ]);

            var options1 = {
                title: "Contador de accidentes por evento",
                is3D: true,
                width: "100%",
                height: 450,            
            };

            var chart = new google.visualization.PieChart(document.getElementById("verfigura4"));
            chart.draw(data, options);
            var chart1 = new google.visualization.PieChart(document.getElementById("verfigura4Cont"));
            chart1.draw(data1, options1);

            //----------------------------------------------------------------------------------------
                
            //Dibuja grafica por nucleo, unida ala consulta result5
            //dias
            var data = new google.visualization.DataTable();
            var data = google.visualization.arrayToDataTable([
                ["nucleo - Dias","Dias"],
                <?php
                    while($row = mysqli_fetch_assoc($result5)){
                        echo "['".$nucleos[$row['nucleo']].' - '.$row['dias']."', ".$row["dias"]."],";
                    }
                ?>
            ]); 

            var options = {
                title: "Dias de accidentes por nucleo",
                is3D: true,
                width: "100%",
                height: 450
            };

            //contador
            var data1 = new google.visualization.DataTable();
            var data1 = google.visualization.arrayToDataTable([
                ["nucleo - Cont","Cont"],
                <?php        
                    while($row = mysqli_fetch_assoc($result5Cont)){
                        echo "['".$nucleos[$row["nucleo"]].' - '.$row['cont']."', ".$row["cont"]."],";
                    }
                ?>
            ]);

            var options1 = {
                title: "Contador de accidentes por nucleo",
                is3D: true,
                width: "100%",
                height: 450,            
            };

            var chart = new google.visualization.PieChart(document.getElementById("verfigura5"));
            chart.draw(data, options);
            var chart1 = new google.visualization.PieChart(document.getElementById("verfigura5Cont"));
            chart1.draw(data1, options1);

            //---------------------------------------------------------------------------------------

            //Dibuja grafica del dia, unida ala consulta result6
            //dias
            var data = new google.visualization.DataTable();
            var data = google.visualization.arrayToDataTable([
                ["Dias - Dias totales","Dias totales"],
                <?php
                    while($row = mysqli_fetch_assoc($result6)){
                        echo "['".$dias_semana[$row['dia']].' - '.$row['dias']."', ".$row["dias"]."],";
                    }
                ?>
            ]); 

            var options = {
                title: "Dias de accidentes por Dia",
                is3D: true,
                width: "100%",
                height: 450
            };

            //contador
            var data1 = new google.visualization.DataTable();
            var data1 = google.visualization.arrayToDataTable([
                ["Dia - Cont","Cont"],
                <?php        
                    while($row = mysqli_fetch_assoc($result6Cont)){
                        echo "['".$dias_semana[$row["dia"]].' - '.$row['cont']."', ".$row["cont"]."],";
                    }
                ?>
            ]);

            var options1 = {
                title: "Contador de accidentes por dia",
                is3D: true,
                width: "100%",
                height: 450,            
            };

            var chart = new google.visualization.PieChart(document.getElementById("verfigura6"));
            chart.draw(data, options);
            var chart1 = new google.visualization.PieChart(document.getElementById("verfigura6Cont"));
            chart1.draw(data1, options1);

            //----------------------------------------------------------------------------------------

            //Dibuja grafica por hora, unida ala consulta result7
            //dias
            var data = new google.visualization.DataTable();
            var data = google.visualization.arrayToDataTable([
                ["Hora - Dias","Dias"],
                <?php
                    while($row = mysqli_fetch_assoc($result7)){
                        echo "['".$row['hora'].' - '.$row['dias']."', ".$row["dias"]."],";
                    }
                ?>
            ]); 

            var options = {
                title: "Dias de accidentes por hora",
                is3D: true,
                width: "100%",
                height: 450
            };
            //contador
            var data1 = new google.visualization.DataTable();
            var data1 = google.visualization.arrayToDataTable([
                ["Hora - Cont","Cont"],
                <?php        
                    while($row = mysqli_fetch_assoc($result7Cont)){
                        echo "['".$row["hora"].' - '.$row['cont']."', ".$row["cont"]."],";
                    }
                ?>
            ]);

            var options1 = {
                title: "Contador de accidentes por hora",
                is3D: true,
                width: "100%",
                height: 450,            
            };

            var chart = new google.visualization.PieChart(document.getElementById("verfigura7"));
            chart.draw(data, options);
            var chart1 = new google.visualization.PieChart(document.getElementById("verfigura7Cont"));
            chart1.draw(data1, options1);

            //----------------------------------------------------------------------------------------

            //Dibuja grafica por mes, unida ala consulta result8
            //dias
            var data = new google.visualization.DataTable();
            var data = google.visualization.arrayToDataTable([
                ["Mes del evento - Dias","Dias"],
                <?php
                    while($row = mysqli_fetch_assoc($result8)){
                        echo "['". $meses[$row['mes']] .' - '.$row['dias']."', ".$row["dias"]."],";
                    }
                ?>
            ]); 

            var options = {
                title: "Dias de accidentes por mes",
                is3D: true,
                width: "100%",
                height: 450
            };
            //contador
            var data1 = new google.visualization.DataTable();
            var data1 = google.visualization.arrayToDataTable([
                ["Mes del evento - Cont","Cont"],
                <?php        
                    while($row = mysqli_fetch_assoc($result8Cont)){
                        echo "['".$meses[$row["mes"]].' - '.$row['cont']."', ".$row["cont"]."],";
                    }
                ?>
            ]);

            var options1 = {
                title: "Contador de accidentes por mes",
                is3D: true,
                width: "100%",
                height: 450,            
            };

            var chart = new google.visualization.PieChart(document.getElementById("verfigura8"));
            chart.draw(data, options);
            var chart1 = new google.visualization.PieChart(document.getElementById("verfigura8Cont"));
            chart1.draw(data1, options1);

            //----------------------------------------------------------------------------------------

            //Dibuja grafica del año, unida ala consulta result9
            //dias
            var data = new google.visualization.DataTable();
            var data = google.visualization.arrayToDataTable([
                ["Año - Dias","Dias"],
                <?php
                    while($row = mysqli_fetch_assoc($result9)){
                        echo "['". $row['año'] .' - '.$row['dias']."', ".$row["dias"]."],";
                    }
                ?>
            ]); 

            var options = {
                title: "Dias de accidentes por año",
                is3D: true,
                width: "100%",
                height: 450
            };
            //contador
            var data1 = new google.visualization.DataTable();
            var data1 = google.visualization.arrayToDataTable([
                ["Año - Cont","Cont"],
                <?php        
                    while($row = mysqli_fetch_assoc($result9Cont)){
                        echo "['".$row["año"].' - '.$row['cont']."', ".$row["cont"]."],";
                    }
                ?>
            ]);

            var options1 = {
                title: "Contador de accidentes por año",
                is3D: true,
                width: "100%",
                height: 450,            
            };

            var chart = new google.visualization.PieChart(document.getElementById("verfigura9"));
            chart.draw(data, options);
            var chart1 = new google.visualization.PieChart(document.getElementById("verfigura9Cont"));
            chart1.draw(data1, options1);

            //----------------------------------------------------------------------------------------

            //Dibuja grafica de la finca, unida ala consulta result10
            //dias
            var data = new google.visualization.DataTable();
            var data = google.visualization.arrayToDataTable([
                ["Finca - Dias","Dias"],
                <?php
                    while($row = mysqli_fetch_assoc($result10)){
                        echo "['". $fincas[$row['finca']] .' - '.$row['dias']."', ".$row["dias"]."],";
                    }
                ?>
            ]); 

            var options = {
                title: "Dias de accidentes por finca",
                is3D: true,
                width: "100%",
                height: 450
            };
            //contador
            var data1 = new google.visualization.DataTable();
            var data1 = google.visualization.arrayToDataTable([
                ["Finca - Cont","Cont"],
                <?php        
                    while($row = mysqli_fetch_assoc($result10Cont)){
                        echo "['".$fincas[$row["finca"]].' - '.$row['cont']."', ".$row["cont"]."],";
                    }
                ?>
            ]);

            var options1 = {
                title: "Contador de accidentes por finca",
                is3D: true,
                width: "100%",
                height: 450,            
            };

            var chart = new google.visualization.PieChart(document.getElementById("verfigura10"));
            chart.draw(data, options);
            var chart1 = new google.visualization.PieChart(document.getElementById("verfigura10Cont"));
            chart1.draw(data1, options1);

            //----------------------------------------------------------------------------------------

            //Dibuja grafica del peligro asociado o factor riesgo, unida ala consulta result11
            //dias
            var data = new google.visualization.DataTable();
            var data = google.visualization.arrayToDataTable([
                ["peligro asociado - Dias","Dias"],
                <?php
                    while($row = mysqli_fetch_assoc($result11)){
                        echo "['". $peligros[$row['peligro']] .' - '.$row['dias']."', ".$row["dias"]."],";
                    }
                ?>
            ]); 

            var options = {
                title: "Dias de accidentes por peligro",
                is3D: true,
                width: "100%",
                height: 450
            };
            //contador
            var data1 = new google.visualization.DataTable();
            var data1 = google.visualization.arrayToDataTable([
                ["peligro asociado - Cont","Cont"],
                <?php        
                    while($row = mysqli_fetch_assoc($result11Cont)){
                        echo "['".$peligros[$row["peligro"]].' - '.$row['cont']."', ".$row["cont"]."],";
                    }
                ?>
            ]);

            var options1 = {
                title: "Contador de accidentes por peligro",
                is3D: true,
                width: "100%",
                height: 450,            
            };

            var chart = new google.visualization.PieChart(document.getElementById("verfigura11"));
            chart.draw(data, options);
            var chart1 = new google.visualization.PieChart(document.getElementById("verfigura11Cont"));
            chart1.draw(data1, options1);

            //----------------------------------------------------------------------------------------

            //Dibuja grafica del mecanismo, unida ala consulta result12
            //dias
            var data = new google.visualization.DataTable();
            var data = google.visualization.arrayToDataTable([
                ["Mecanismo - Dias","Dias"],
                <?php
                    while($row = mysqli_fetch_assoc($result12)){
                        echo "['". $mecanismos[$row['mecanismo']] .' - '.$row['dias']."', ".$row["dias"]."],";
                    }
                ?>
            ]); 

            var options = {
                title: "Dias de accidentes por mecanismo",
                is3D: true,
                width: "100%",
                height: 450
            };
            //contador
            var data1 = new google.visualization.DataTable();
            var data1 = google.visualization.arrayToDataTable([
                ["Mecanismo - Cont","Cont"],
                <?php        
                    while($row = mysqli_fetch_assoc($result12Cont)){
                        echo "['".$mecanismos[$row["mecanismo"]].' - '.$row['cont']."', ".$row["cont"]."],";
                    }
                ?>
            ]);

            var options1 = {
                title: "Contador de accidentes por mecanismo",
                is3D: true,
                width: "100%",
                height: 450,            
            };

            var chart = new google.visualization.PieChart(document.getElementById("verfigura12"));
            chart.draw(data, options);
            var chart1 = new google.visualization.PieChart(document.getElementById("verfigura12Cont"));
            chart1.draw(data1, options1);

            //----------------------------------------------------------------------------------------

            //Dibuja grafica del agente de lesion, unida ala consulta result13
            //dias
            var data = new google.visualization.DataTable();
            var data = google.visualization.arrayToDataTable([
                ["Agente de lesion - Dias","Dias"],
                <?php
                    while($row = mysqli_fetch_assoc($result13)){
                        echo "['". $agente_lesion[$row['agente_lesion']] .' - '.$row['dias']."', ".$row["dias"]."],";
                    }
                ?>
            ]); 

            var options = {
                title: "Dias de accidentes por agente de lesion",
                is3D: true,
                width: "100%",
                height: 450
            };
            //contador
            var data1 = new google.visualization.DataTable();
            var data1 = google.visualization.arrayToDataTable([
                ["Agente de lesion - Cont","Cont"],
                <?php        
                    while($row = mysqli_fetch_assoc($result13Cont)){
                        echo "['".$agente_lesion[$row["agente_lesion"]].' - '.$row['cont']."', ".$row["cont"]."],";
                    }
                ?>
            ]);

            var options1 = {
                title: "Contador de accidentes por agente de lesion",
                is3D: true,
                width: "100%",
                height: 450,            
            };

            var chart = new google.visualization.PieChart(document.getElementById("verfigura13"));
            chart.draw(data, options);
            var chart1 = new google.visualization.PieChart(document.getElementById("verfigura13Cont"));
            chart1.draw(data1, options1);

            //----------------------------------------------------------------------------------------

            //Dibuja grafica del tipo de lesion, unida ala consulta result14
            //dias
            var data = new google.visualization.DataTable();
            var data = google.visualization.arrayToDataTable([
                ["Tipo de lesion - Dias","Dias"],
                <?php
                    while($row = mysqli_fetch_assoc($result14)){
                        echo "['". $tipo_lesion[$row['tipo_lesion']] .' - '.$row['dias']."', ".$row["dias"]."],";
                    }
                ?>
            ]); 

            var options = {
                title: "Dias de accidentes por tipo de lesion",
                is3D: true,
                width: "100%",
                height: 450
            };
            //contador
            var data1 = new google.visualization.DataTable();
            var data1 = google.visualization.arrayToDataTable([
                ["Tipo de lesion - Cont","Cont"],
                <?php        
                    while($row = mysqli_fetch_assoc($result14Cont)){
                        echo "['".$tipo_lesion[$row["tipo_lesion"]].' - '.$row['cont']."', ".$row["cont"]."],";
                    }
                ?>
            ]);

            var options1 = {
                title: "Contador de accidentes por tipo de lesion",
                is3D: true,
                width: "100%",
                height: 450,            
            };

            var chart = new google.visualization.PieChart(document.getElementById("verfigura14"));
            chart.draw(data, options);
            var chart1 = new google.visualization.PieChart(document.getElementById("verfigura14Cont"));
            chart1.draw(data1, options1);

            //----------------------------------------------------------------------------------------

            //Dibuja grafica del parte afectada, unida ala consulta result15
            //dias
            var data = new google.visualization.DataTable();
            var data = google.visualization.arrayToDataTable([
                ["Parte afectada - Dias","Dias"],
                <?php
                    while($row = mysqli_fetch_assoc($result15)){
                        echo "['". $parte_afectada[$row['parte_afectada']] .' - '.$row['dias']."', ".$row["dias"]."],";
                    }
                ?>
            ]); 

            var options = {
                title: "Dias de accidentes por parte afectada",
                is3D: true,
                width: "100%",
                height: 450
            };
            //contador
            var data1 = new google.visualization.DataTable();
            var data1 = google.visualization.arrayToDataTable([
                ["Parte afectada - Cont","Cont"],
                <?php        
                    while($row = mysqli_fetch_assoc($result15Cont)){
                        echo "['".$parte_afectada[$row["parte_afectada"]].' - '.$row['cont']."', ".$row["cont"]."],";
                    }
                ?>
            ]);

            var options1 = {
                title: "Contador de accidentes por parte afectada",
                is3D: true,
                width: "100%",
                height: 450,            
            };

            var chart = new google.visualization.PieChart(document.getElementById("verfigura15"));
            chart.draw(data, options);
            var chart1 = new google.visualization.PieChart(document.getElementById("verfigura15Cont"));
            chart1.draw(data1, options1);

            //----------------------------------------------------------------------------------------

            //Dibuja grafica del lugar, unida ala consulta result16
            //dias
            var data = new google.visualization.DataTable();
            var data = google.visualization.arrayToDataTable([
                ["Lugar - Dias","Dias"],
                <?php
                    while($row = mysqli_fetch_assoc($result16)){
                        echo "['". $lugares[$row['lugar']] .' - '.$row['dias']."', ".$row["dias"]."],";
                    }
                ?>
            ]); 

            var options = {
                title: "Dias de accidentes por lugar",
                is3D: true,
                width: "100%",
                height: 450
            };
            //contador
            var data1 = new google.visualization.DataTable();
            var data1 = google.visualization.arrayToDataTable([
                ["Lugar - Cont","Cont"],
                <?php        
                    while($row = mysqli_fetch_assoc($result16Cont)){
                        echo "['".$lugares[$row["lugar"]].' - '.$row['cont']."', ".$row["cont"]."],";
                    }
                ?>
            ]);

            var options1 = {
                title: "Contador de accidentes por lugar",
                is3D: true,
                width: "100%",
                height: 450,            
            };

            var chart = new google.visualization.PieChart(document.getElementById("verfigura16"));
            chart.draw(data, options);
            var chart1 = new google.visualization.PieChart(document.getElementById("verfigura16Cont"));
            chart1.draw(data1, options1);

            //----------------------------------------------------------------------------------------
        }

        google.charts.load("current", {"packages":["corechart"]});

        google.charts.setOnLoadCallback(drawChart);

        $(window).resize(function(){
            drawChart();
        });
    </script>
</head>

<body>
	<?php include("../include/navegacion/nav.php"); ?>
	
    <div class="container-fluid border border-success bg-light">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title"><i class="bi bi-person-plus-fill"></i> Graficas de accidentes</h4>
            </div>

            <!-- Formulario para las consultas segun las fechas indicadas -->
            <form name="graficaFechas" id="graficaFechas" class="form-horizontal row-fluid" method="POST" action="graficaAccidentes.php">
                
                <div class="control-group">
                    <div class="controls">
                        <a href="../accidentes/index.php" class="btn btn-sm btn-danger"><i class="bi bi-arrow-left"></i>
                            Regresar</a>
                    </div>
                </div>
                <hr>

                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" id="fecha1">(*) Periodo inicial: </span>
                    <input class="form-control" type="date" name="fecha1" id="fecha1" value="<?php echo $fecha1;?>">
                </div>
                <hr>
                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" id="fecha2">(*) Periodo Final: </span>
                    <input class="form-control" type="date" name="fecha2" id="fecha2" value="<?php echo $fecha2;?>">
                </div>
                <hr>
                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" id="nucleo">(*) Nucleo: </span>
                    <select class="form-select" name="nucleo" id="nucleo" required>
                        <option value="1" <?php if ($nucleo == 1) {
                        	echo "selected";
                        } ?>>SANTA ROSA DE CABAL</option>
                        <option value="2" <?php if ($nucleo == 2) {
                        	echo "selected";
                        } ?>>QUINDIO</option>
                        <option value="3" <?php if ($nucleo == 3) {
                        	echo "selected";
                        } ?>>RIOSUCIO</option>
					</select>
                </div>
                <hr>
                <div class="input-group shadow-sm">
                    <div class="controls">
                        <input type="submit" name="consulta" id="consulta" value="Consultar" class="btn btn-sm btn-primary" />
                    </div>
                </div>
            </form>
            <hr>

            <!-- Estilo acordion en donde estaran guardadas las graficas -->
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            Mostrar grafica de accidentalidad por persona
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <h3><strong><?php echo 'Periodo de: '.$fecha1.' a '.$fecha2 ?></strong></h3>
                            <div id="verfigura"></div>
                            <div id="verfiguraCont"></div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                            Mostrar grafica de accidentalidad por cargo
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <h3><strong><?php echo 'Periodo de: '.$fecha1.' a '.$fecha2 ?></strong></h3>
                            <div id="verfigura1"></div>
                            <div id="verfigura1Cont"></div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                            Mostrar grafica de accidentalidad por proceso
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse show" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <h3><strong><?php echo 'Periodo de: '.$fecha1.' a '.$fecha2 ?></strong></h3>
                            <div id="verfigura2"></div>
                            <div id="verfigura2Cont"></div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFour">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                            Mostrar grafica de accidentalidad por supervisor
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse show" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <h3><strong><?php echo 'Periodo de: '.$fecha1.' a '.$fecha2 ?></strong></h3>
                            <div id="verfigura3"></div>
                            <div id="verfigura3Cont"></div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFive">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                            Mostrar grafica de accidentalidad por evento
                        </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse show" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <h3><strong><?php echo 'Periodo de: '.$fecha1.' a '.$fecha2 ?></strong></h3>
                            <div id="verfigura4"></div>
                            <div id="verfigura4Cont"></div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingSix">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
                            Mostrar grafica de accidentalidad por nucleo
                        </button>
                    </h2>
                    <div id="collapseSix" class="accordion-collapse collapse show" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <h3><strong><?php echo 'Periodo de: '.$fecha1.' a '.$fecha2 ?></strong></h3>
                            <div id="verfigura5"></div>
                            <div id="verfigura5Cont"></div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingSeven">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">
                            Mostrar grafica de accidentalidad por dia
                        </button>
                    </h2>
                    <div id="collapseSeven" class="accordion-collapse collapse show" aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <h3><strong><?php echo 'Periodo de: '.$fecha1.' a '.$fecha2 ?></strong></h3>
                            <div id="verfigura6"></div>
                            <div id="verfigura6Cont"></div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingEight">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="true" aria-controls="collapseEight">
                            Mostrar grafica de accidentalidad por hora
                        </button>
                    </h2>
                    <div id="collapseEight" class="accordion-collapse collapse show" aria-labelledby="headingEight" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <h3><strong><?php echo 'Periodo de: '.$fecha1.' a '.$fecha2 ?></strong></h3>
                            <div id="verfigura7"></div>
                            <div id="verfigura7Cont"></div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingNine">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="true" aria-controls="collapseNine">
                            Mostrar grafica de accidentalidad por mes de evento
                        </button>
                    </h2>
                    <div id="collapseNine" class="accordion-collapse collapse show" aria-labelledby="headingNine" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <h3><strong><?php echo 'Periodo de: '.$fecha1.' a '.$fecha2 ?></strong></h3>
                            <div id="verfigura8"></div>
                            <div id="verfigura8Cont"></div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTen">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTen" aria-expanded="true" aria-controls="collapseTen">
                            Mostrar grafica de accidentalidad por año
                        </button>
                    </h2>
                    <div id="collapseTen" class="accordion-collapse collapse show" aria-labelledby="headingTen" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <h3><strong><?php echo 'Periodo de: '.$fecha1.' a '.$fecha2 ?></strong></h3>
                            <div id="verfigura9"></div>
                            <div id="verfigura9Cont"></div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingEleven">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEleven" aria-expanded="true" aria-controls="collapseEleven">
                            Mostrar grafica de accidentalidad por finca
                        </button>
                    </h2>
                    <div id="collapseEleven" class="accordion-collapse collapse show" aria-labelledby="headingEleven" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <h3><strong><?php echo 'Periodo de: '.$fecha1.' a '.$fecha2 ?></strong></h3>
                            <div id="verfigura10"></div>
                            <div id="verfigura10Cont"></div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwelve">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwelve" aria-expanded="true" aria-controls="collapseTwelve">
                            Mostrar grafica de accidentalidad por factor de riesgo o peligro asociado
                        </button>
                    </h2>
                    <div id="collapseTwelve" class="accordion-collapse collapse show" aria-labelledby="headingTwelve" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <h3><strong><?php echo 'Periodo de: '.$fecha1.' a '.$fecha2 ?></strong></h3>
                            <div id="verfigura11"></div>
                            <div id="verfigura11Cont"></div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThirteen">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThirteen" aria-expanded="true" aria-controls="collapseThirteen">
                            Mostrar grafica de accidentalidad por mecanismo
                        </button>
                    </h2>
                    <div id="collapseThirteen" class="accordion-collapse collapse show" aria-labelledby="headingThirteen" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <h3><strong><?php echo 'Periodo de: '.$fecha1.' a '.$fecha2 ?></strong></h3>
                            <div id="verfigura12"></div>
                            <div id="verfigura12Cont"></div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFourteen">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFourteen" aria-expanded="true" aria-controls="collapseFourteen">
                            Mostrar grafica de accidentalidad por agente de lesion
                        </button>
                    </h2>
                    <div id="collapseFourteen" class="accordion-collapse collapse show" aria-labelledby="headingFourteen" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <h3><strong><?php echo 'Periodo de: '.$fecha1.' a '.$fecha2 ?></strong></h3>
                            <div id="verfigura13"></div>
                            <div id="verfigura13Cont"></div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFifteen">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFifteen" aria-expanded="true" aria-controls="collapseFifteen">
                            Mostrar grafica de accidentalidad por tipo de lesion
                        </button>
                    </h2>
                    <div id="collapseFifteen" class="accordion-collapse collapse show" aria-labelledby="headingFifteen" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <h3><strong><?php echo 'Periodo de: '.$fecha1.' a '.$fecha2 ?></strong></h3>
                            <div id="verfigura14"></div>
                            <div id="verfigura14Cont"></div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingSixteen">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSixteen" aria-expanded="true" aria-controls="collapseSixteen">
                            Mostrar grafica de accidentalidad por parte afectada
                        </button>
                    </h2>
                    <div id="collapseSixteen" class="accordion-collapse collapse show" aria-labelledby="headingSixteen" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <h3><strong><?php echo 'Periodo de: '.$fecha1.' a '.$fecha2 ?></strong></h3>
                            <div id="verfigura15"></div>
                            <div id="verfigura15Cont"></div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingSeventeen">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeventeen" aria-expanded="true" aria-controls="collapseSeventeen">
                            Mostrar grafica de accidentalidad por lugar
                        </button>
                    </h2>
                    <div id="collapseSeventeen" class="accordion-collapse collapse show" aria-labelledby="headingSeventeen" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <h3><strong><?php echo 'Periodo de: '.$fecha1.' a '.$fecha2 ?></strong></h3>
                            <div id="verfigura16"></div>
                            <div id="verfigura16Cont"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
	<!--/.container-->

	<!--/.wrapper--><br>
    <div class="card-footer">
    	<div class="container">
            <center> <b class="copyright"><a href=""> EXFOR S.A.S</a> &copy; <?php echo date("Y") ?> Servicios Forestales </b></center>
    	</div>
    </div>

	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

</body>

</html>