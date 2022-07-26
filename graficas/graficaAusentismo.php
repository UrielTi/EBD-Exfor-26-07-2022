<?php session_start(); include "../include/conn/conn.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php include("head.php");
        include("../cond/todo.php"); 
        $fecha1 = $_POST['fecha1'];
        $fecha2 = $_POST['fecha2'];
        $nucleo = $_POST['nucleo'];

        //Lista de consultas a la tabla de la base de datos llamada ausentismo
        
        /*Consultas al nombre con dias de ausentismo y 
        un contador de cuantas veces se ausenta la misma persona*/
        $result = mysqli_query($conn, "SELECT nombres, sum(dias_ausentismo) AS dias FROM ausentismo WHERE nucleo='$nucleo' and fecha_inicio BETWEEN '$fecha1' AND '$fecha2' GROUP BY nombres ORDER BY dias DESC") or die("Error in Selecting " . mysqli_error($conn));
        $resultCont = mysqli_query($conn, "SELECT nombres, COUNT(nombres) AS cont FROM ausentismo WHERE nucleo='$nucleo' and fecha_inicio BETWEEN '$fecha1' AND '$fecha2' GROUP BY nombres ORDER BY cont DESC") or die("Error in Selecting " . mysqli_error($conn));

        /*Consultas al cargo con dias de ausentismo y 
        un contador de cuantas veces se ausenta por el mismo cargo*/
        $result1 = mysqli_query($conn, "SELECT cargo, sum(dias_ausentismo) AS dias FROM ausentismo WHERE nucleo='$nucleo' and fecha_inicio BETWEEN '$fecha1' AND '$fecha2' GROUP BY cargo ORDER BY dias DESC") or die("Error in Selecting " . mysqli_error($conn));
        $result1Cont = mysqli_query($conn, "SELECT cargo, COUNT(cargo) AS cont FROM ausentismo WHERE nucleo='$nucleo' and fecha_inicio BETWEEN '$fecha1' AND '$fecha2' GROUP BY cargo ORDER BY cont DESC") or die("Error in Selecting " . mysqli_error($conn));

        /*Consultas al proceso con dias de ausentismo y 
        un contador de cuantas veces se ausenta por el mismo proceso*/
        $result2 = mysqli_query($conn, "SELECT proceso, sum(dias_ausentismo) AS dias FROM ausentismo WHERE nucleo='$nucleo' and fecha_inicio BETWEEN '$fecha1' AND '$fecha2' GROUP BY proceso ORDER BY dias DESC") or die("Error in Selecting " . mysqli_error($conn));
        $result2Cont = mysqli_query($conn, "SELECT proceso, count(proceso) AS cont FROM ausentismo WHERE nucleo='$nucleo' and fecha_inicio BETWEEN '$fecha1' AND '$fecha2' GROUP BY proceso ORDER BY cont DESC") or die("Error in Selecting " . mysqli_error($conn));

        /*Consultas al evento con dias de ausentismo y 
        un contador de cuantos ausentismo hay por el mismo evento*/
        $result4 = mysqli_query($conn, "SELECT evento, SUM(dias_ausentismo) AS dias FROM ausentismo WHERE nucleo='$nucleo' and fecha_inicio BETWEEN '$fecha1' AND '$fecha2' GROUP BY evento ORDER BY dias DESC") or die("Error in Selecting " . mysqli_error($conn));
        $result4Cont = mysqli_query($conn, "SELECT evento, COUNT(evento) AS cont FROM ausentismo WHERE nucleo='$nucleo' and fecha_inicio BETWEEN '$fecha1' AND '$fecha2' GROUP BY evento ORDER BY cont DESC") or die("Error in Selecting " . mysqli_error($conn));

        /*Consultas al nucleo con dias de ausentismo y 
        un contador de cuantas veces se ausenta por el nucleo*/
        $result5 = mysqli_query($conn, "SELECT nucleo, SUM(dias_ausentismo) AS dias FROM ausentismo WHERE fecha_inicio BETWEEN '$fecha1' AND '$fecha2' GROUP BY nucleo ORDER BY dias DESC") or die("Error in Selecting " . mysqli_error($conn));
        $result5Cont = mysqli_query($conn, "SELECT nucleo, COUNT(nucleo) AS cont FROM ausentismo WHERE fecha_inicio BETWEEN '$fecha1' AND '$fecha2' GROUP BY nucleo ORDER BY cont DESC") or die("Error in Selecting " . mysqli_error($conn));

        /*Consultas al mes con dias de ausentismo y 
        un contador de cuantas veces se ausenta por mes del envento*/
        $result8 = mysqli_query($conn, "SELECT mes_evento, SUM(dias_ausentismo) AS dias FROM ausentismo WHERE nucleo='$nucleo' and fecha_inicio BETWEEN '$fecha1' AND '$fecha2' GROUP BY mes_evento ORDER BY dias DESC") or die("Error in Selecting " . mysqli_error($conn));
        $result8Cont = mysqli_query($conn, "SELECT mes_evento, COUNT(mes_evento) AS cont FROM ausentismo WHERE nucleo='$nucleo' and fecha_inicio BETWEEN '$fecha1' AND '$fecha2' GROUP BY mes_evento ORDER BY cont DESC") or die("Error in Selecting " . mysqli_error($conn));

        /*Consultas al peligro o factor de riesgo con dias de ausentismo y 
        un contador de cuantas veces se ausenta con el mismo peligro o factor de riesgo*/
        $result11 = mysqli_query($conn, "SELECT peligro_aso, SUM(dias_ausentismo) AS dias FROM ausentismo WHERE nucleo='$nucleo' and fecha_inicio BETWEEN '$fecha1' AND '$fecha2' GROUP BY peligro_aso ORDER BY dias DESC") or die("Error in Selecting " . mysqli_error($conn));
        $result11Cont = mysqli_query($conn, "SELECT peligro_aso, COUNT(peligro_aso) AS cont FROM ausentismo WHERE nucleo='$nucleo' and fecha_inicio BETWEEN '$fecha1' AND '$fecha2' GROUP BY peligro_aso ORDER BY cont DESC") or die("Error in Selecting " . mysqli_error($conn));

        /*Consultas al programa o sve con dias de ausentismo y 
        un contador de cuantas veces se ausenta con el mismo programa o sve*/
        $result12 = mysqli_query($conn, "SELECT sve, SUM(dias_ausentismo) AS dias FROM ausentismo WHERE nucleo='$nucleo' and fecha_inicio BETWEEN '$fecha1' AND '$fecha2' GROUP BY sve ORDER BY dias DESC") or die("Error in Selecting " . mysqli_error($conn));
        $result12Cont = mysqli_query($conn, "SELECT sve, COUNT(sve) AS cont FROM ausentismo WHERE nucleo='$nucleo' and fecha_inicio BETWEEN '$fecha1' AND '$fecha2' GROUP BY sve ORDER BY cont DESC") or die("Error in Selecting " . mysqli_error($conn));

        /*Consultas al diagnostico con dias de ausentismo y 
        un contador de cuantas veces se ausenta con el mismo diagnostico*/
        $result13 = mysqli_query($conn, "SELECT diagnostico, SUM(dias_ausentismo) AS dias FROM ausentismo WHERE nucleo='$nucleo' and fecha_inicio BETWEEN '$fecha1' AND '$fecha2' GROUP BY diagnostico ORDER BY dias DESC") or die("Error in Selecting " . mysqli_error($conn));
        $result13Cont = mysqli_query($conn, "SELECT diagnostico, COUNT(diagnostico) AS cont FROM ausentismo WHERE nucleo='$nucleo' and fecha_inicio BETWEEN '$fecha1' AND '$fecha2' GROUP BY diagnostico ORDER BY cont DESC") or die("Error in Selecting " . mysqli_error($conn));

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
                title: "Dias de ausentismo por persona",
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
                title: "Contador de ausentismo por persona",
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
                title: "Dias de ausentismo por cargo",
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
                title: "Contador de ausentismo por cargo",
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
                title: "Dias de ausentismo por proceso",
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
                title: "Contador de ausentismo por proceso",
                is3D: true,
                width: "100%",
                height: 450,            
            };

            var chart = new google.visualization.PieChart(document.getElementById("verfigura2"));
            chart.draw(data, options);
            var chart1 = new google.visualization.PieChart(document.getElementById("verfigura2Cont"));
            chart1.draw(data1, options1);

            //----------------------------------------------------------------------------------------------

            //Dibuja grafica del evento, unida ala consulta result4
            //dias
            var data = new google.visualization.DataTable();
            var data = google.visualization.arrayToDataTable([
                ["evento - Dias","Dias"],
                <?php
                    while($row = mysqli_fetch_assoc($result4)){
                        echo "['".$eventos[$row['evento']].' - '.$row['dias']."', ".$row["dias"]."],";
                    }
                ?>
            ]); 

            var options = {
                title: "Dias de ausentismo por evento",
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
                        echo "['".$eventos[$row["evento"]].' - '.$row['cont']."', ".$row["cont"]."],";
                    }
                ?>
            ]);

            var options1 = {
                title: "Contador de ausentismo por evento",
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
                title: "Dias de ausentismo por nucleo",
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
                title: "Contador de ausentismo por nucleo",
                is3D: true,
                width: "100%",
                height: 450,            
            };

            var chart = new google.visualization.PieChart(document.getElementById("verfigura5"));
            chart.draw(data, options);
            var chart1 = new google.visualization.PieChart(document.getElementById("verfigura5Cont"));
            chart1.draw(data1, options1);

            //---------------------------------------------------------------------------------------

            //Dibuja grafica por mes, unida ala consulta result8
            //dias
            var data = new google.visualization.DataTable();
            var data = google.visualization.arrayToDataTable([
                ["Mes del evento - Dias","Dias"],
                <?php
                    while($row = mysqli_fetch_assoc($result8)){
                        echo "['". $meses[$row['mes_evento']] .' - '.$row['dias']."', ".$row["dias"]."],";
                    }
                ?>
            ]); 

            var options = {
                title: "Dias de ausentismo por mes",
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
                        echo "['".$meses[$row["mes_evento"]].' - '.$row['cont']."', ".$row["cont"]."],";
                    }
                ?>
            ]);

            var options1 = {
                title: "Contador de ausentismo por mes",
                is3D: true,
                width: "100%",
                height: 450,            
            };

            var chart = new google.visualization.PieChart(document.getElementById("verfigura8"));
            chart.draw(data, options);
            var chart1 = new google.visualization.PieChart(document.getElementById("verfigura8Cont"));
            chart1.draw(data1, options1);

            //----------------------------------------------------------------------------------------

            //Dibuja grafica del peligro asociado o factor riesgo, unida ala consulta result11
            //dias
            var data = new google.visualization.DataTable();
            var data = google.visualization.arrayToDataTable([
                ["peligro asociado - Dias","Dias"],
                <?php
                    while($row = mysqli_fetch_assoc($result11)){
                        echo "['". $peligros[$row['peligro_aso']] .' - '.$row['dias']."', ".$row["dias"]."],";
                    }
                ?>
            ]); 

            var options = {
                title: "Dias de ausentismo por peligro asociado",
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
                        echo "['".$peligros[$row["peligro_aso"]].' - '.$row['cont']."', ".$row["cont"]."],";
                    }
                ?>
            ]);

            var options1 = {
                title: "Contador de ausentismo por peligro asociado",
                is3D: true,
                width: "100%",
                height: 450,            
            };

            var chart = new google.visualization.PieChart(document.getElementById("verfigura11"));
            chart.draw(data, options);
            var chart1 = new google.visualization.PieChart(document.getElementById("verfigura11Cont"));
            chart1.draw(data1, options1);

            //----------------------------------------------------------------------------------------
            //Dibuja grafica del sve, unida ala consulta result11
            //dias
            var data = new google.visualization.DataTable();
            var data = google.visualization.arrayToDataTable([
                ["Programa - Dias","Dias"],
                <?php
                    while($row = mysqli_fetch_assoc($result12)){
                        echo "['". $programas[$row['sve']] .' - '.$row['dias']."', ".$row["dias"]."],";
                    }
                ?>
            ]); 

            var options = {
                title: "Dias de ausentismo por Programa",
                is3D: true,
                width: "100%",
                height: 450
            };
            //contador
            var data1 = new google.visualization.DataTable();
            var data1 = google.visualization.arrayToDataTable([
                ["Programa - Cont","Cont"],
                <?php        
                    while($row = mysqli_fetch_assoc($result12Cont)){
                        echo "['".$programas[$row["sve"]].' - '.$row['cont']."', ".$row["cont"]."],";
                    }
                ?>
            ]);

            var options1 = {
                title: "Contador de ausentismo por Programa",
                is3D: true,
                width: "100%",
                height: 450,            
            };

            var chart = new google.visualization.PieChart(document.getElementById("verfigura12"));
            chart.draw(data, options);
            var chart1 = new google.visualization.PieChart(document.getElementById("verfigura12Cont"));
            chart1.draw(data1, options1);

            //----------------------------------------------------------------------------------------
            //Dibuja grafica del diagnostico, unida ala consulta result11
            //dias
            var data = new google.visualization.DataTable();
            var data = google.visualization.arrayToDataTable([
                ["Diagnostico - Dias","Dias"],
                <?php
                    while($row = mysqli_fetch_assoc($result13)){
                        echo "['". $row['diagnostico'] .' - '.$row['dias']."', ".$row["dias"]."],";
                    }
                ?>
            ]); 

            var options = {
                title: "Dias de ausentismo por Diagnostico",
                is3D: true,
                width: "100%",
                height: 450
            };
            //contador
            var data1 = new google.visualization.DataTable();
            var data1 = google.visualization.arrayToDataTable([
                ["Diagnostico - Cont","Cont"],
                <?php        
                    while($row = mysqli_fetch_assoc($result13Cont)){
                        echo "['".$row["diagnostico"].' - '.$row['cont']."', ".$row["cont"]."],";
                    }
                ?>
            ]);

            var options1 = {
                title: "Contador de ausentismo por Diagnostico",
                is3D: true,
                width: "100%",
                height: 450,            
            };

            var chart = new google.visualization.PieChart(document.getElementById("verfigura13"));
            chart.draw(data, options);
            var chart1 = new google.visualization.PieChart(document.getElementById("verfigura13Cont"));
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
                <h4 class="panel-title"><i class="bi bi-person-plus-fill"></i> Graficas de ausentismo</h4>
            </div>

            <!-- Formulario para las consultas segun las fechas indicadas -->
            <form name="graficaFechas" id="graficaFechas" class="form-horizontal row-fluid" method="POST" action="graficaAusentismo.php">
                
                <div class="control-group">
                    <div class="controls">
                        <a href="../Ausentismo/index.php" class="btn btn-sm btn-danger"><i class="bi bi-arrow-left"></i>
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
                            Mostrar grafica de ausentismos por persona
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
                            Mostrar grafica de ausentismos por cargo
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
                            Mostrar grafica de ausentismos por proceso
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
                    <h2 class="accordion-header" id="headingFive">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                            Mostrar grafica de ausentismos por evento
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
                            Mostrar grafica de ausentismos por nucleo
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
                    <h2 class="accordion-header" id="headingNine">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="true" aria-controls="collapseNine">
                            Mostrar grafica de ausentismos por mes de evento
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
                    <h2 class="accordion-header" id="headingTwelve">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwelve" aria-expanded="true" aria-controls="collapseTwelve">
                            Mostrar grafica de ausentismos por factor de riesgo o peligro asociado
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
                            Mostrar grafica de ausentismos por programa
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
                            Mostrar grafica de ausentismos por diagnostico
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