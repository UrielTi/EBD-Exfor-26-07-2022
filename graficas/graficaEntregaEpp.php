<?php session_start(); include "../include/conn/conn.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php include("head.php");
        include("../cond/todo.php"); 
        $fecha1 = $_POST['fecha1'];
        $fecha2 = $_POST['fecha2'];
        $nucleo = $_POST['nucleo'];

        //Consultas ala tabla de la base de datos llamada entrega_epp

        //Consulta al elemento y nombre 
        $result = mysqli_query($conn, "SELECT elemento, nombre, sum(cantidad) as cantidades FROM entrega_epp WHERE nucleo='$nucleo' and fecha BETWEEN '$fecha1' AND '$fecha2' GROUP BY elemento, nombre ORDER BY cantidades DESC") or die("Error in Selecting " . mysqli_error($conn));
        
        //Consulta al nombre y precio
        $result1 = mysqli_query($conn, "SELECT nombre, SUM(precio) AS total FROM entrega_epp WHERE nucleo='$nucleo' and fecha BETWEEN '$fecha1' AND '$fecha2' GROUP BY nombre") or die("Error in Selecting " . mysqli_error($conn));

        //Consulta al nucleo y precio
        $result2 = mysqli_query($conn, "SELECT nucleo, SUM(precio) AS total FROM entrega_epp WHERE nucleo='$nucleo' and fecha BETWEEN '$fecha1' AND '$fecha2' GROUP BY nucleo") or die("Error in Selecting " . mysqli_error($conn));

        //Consulta al proceso y precio
        $result3 = mysqli_query($conn, "SELECT proceso, SUM(precio) AS total FROM entrega_epp WHERE nucleo='$nucleo' and fecha BETWEEN '$fecha1' AND '$fecha2' GROUP BY proceso") or die("Error in Selecting " . mysqli_error($conn));

        //Consulta al cargo y precio
        $result4 = mysqli_query($conn, "SELECT cargo, SUM(precio) AS total FROM entrega_epp WHERE nucleo='$nucleo' and fecha BETWEEN '$fecha1' AND '$fecha2' GROUP BY cargo") or die("Error in Selecting " . mysqli_error($conn));
?>
        <script type="text/javascript">
            function drawChart() {

                //dibuja grafica de nombre elemento y cantidad, unida ala consulta de la variable result
                var data = new google.visualization.DataTable();
                var data = google.visualization.arrayToDataTable([
                    ["nombre - elemento","cantidad"],
                    <?php
                        while($row = mysqli_fetch_assoc($result)){
                            echo "['".$row["nombre"].' - '.$row['elemento'].' - '.$row['cantidades']."', ".$row["cantidades"]."],";
                        }
                    ?>
                ]); 
                
                var options = {
                    title: "Entrega de EPP de cantidad del mismo producto por persona y elemento",
                    is3D: true,
                    width: "100%",
                    height: 450
                };
                
                var chart = new google.visualization.PieChart(document.getElementById("verfigura"));
                chart.draw(data, options);

                //dibuja grafica de nombre y total, unida ala consulta de la variable result1
                var data = new google.visualization.DataTable();
                var data = google.visualization.arrayToDataTable([
                    ["nombre - total","total"],
                    <?php
                        while($row = mysqli_fetch_assoc($result1)){
                            echo "['".$row["nombre"].' - '.$row['total']."', ".$row["total"]."],";
                        }
                    ?>
                ]); 
                
                var options = {
                    title: "Entrega de EPP precio total por empleado",
                    is3D: true,
                    width: "100%",
                    height: 450
                };
                var chart = new google.visualization.PieChart(document.getElementById("verfigura1"));
                chart.draw(data, options);

                //dibuja grafica de nucleo y precio, unida ala consulta de la variable result2
                var data = new google.visualization.DataTable();
                var data = google.visualization.arrayToDataTable([
                    ["nucleo - total","total"],
                    <?php
                        while($row = mysqli_fetch_assoc($result2)){
                            echo "['".$nucleos[$row['nucleo']].' - '.$row['total']."', ".$row["total"]."],";
                        }
                    ?>
                ]); 
                
                var options = {
                    title: "Entrega de EPP precio total por nucleo",
                    is3D: true,
                    width: "100%",
                    height: 450
                };
                var chart = new google.visualization.PieChart(document.getElementById("verfigura2"));
                chart.draw(data, options);

                //dibuja grafica de proceso y precio, unida ala consulta de la variable result3
                var data = new google.visualization.DataTable();
                var data = google.visualization.arrayToDataTable([
                    ["proceso - total","total"],
                    <?php
                        while($row = mysqli_fetch_assoc($result3)){
                            echo "['".$procesos[$row['proceso']].' - '.$row['total']."', ".$row["total"]."],";
                        }
                    ?>
                ]); 
                
                var options = {
                    title: "Entrega de EPP precio total por proceso",
                    is3D: true,
                    width: "100%",
                    height: 450
                };
                var chart = new google.visualization.PieChart(document.getElementById("verfigura3"));
                chart.draw(data, options);

                //dibuja grafica de cargo y precio, unida ala consulta de la variable result4
                var data = new google.visualization.DataTable();
                var data = google.visualization.arrayToDataTable([
                    ["cargo - total","total"],
                    <?php
                        while($row = mysqli_fetch_assoc($result4)){
                            echo "['".$cargos[$row['cargo']].' - '.$row['total']."', ".$row["total"]."],";
                        }
                    ?>
                ]); 
                
                var options = {
                    title: "Entrega de EPP precio total por cargo",
                    is3D: true,
                    width: "100%",
                    height: 450
                };
                var chart = new google.visualization.PieChart(document.getElementById("verfigura4"));
                chart.draw(data, options);
            }

            google.charts.load("current", {"packages":["corechart"]});
                
            google.charts.setOnLoadCallback(drawChart);
                
            $(window).resize(function(){
                drawChart();
            });
        </script>

<body>
	<?php include("../include/navegacion/nav.php"); ?>
    
    <div class="container-fluid border border-success bg-light">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title"><i class="bi bi-person-plus-fill"></i> Graficas de entregas de epp</h4>
            </div>

            <!-- Formulario para las consultas segun las fechas indicadas -->
            <form name="graficaFechas" id="graficaFechas" class="form-horizontal row-fluid" method="POST" action="graficaEntregaEpp.php">
                <div class="control-group">
                    <div class="controls">
                        <a href="../entregaEPP/index.php" class="btn btn-sm btn-danger"><i class="bi bi-arrow-left"></i>
                            Regresar</a>
                    </div>
                </div>
                <hr>
                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" id="fecha1">(*) Periodo inicial: </span>
                    <input class="form-control" type="date" name="fecha1" id="fecha1" value="<?php echo $fecha1; ?>">
                </div>
                <hr>
                <div class="input-group shadow-sm">
                    <span class="input-group-text w-25" id="fecha2">(*) Periodo Final: </span>
                    <input class="form-control" type="date" name="fecha2" id="fecha2" value="<?php echo $fecha2; ?>">
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
                            Mostrar grafica de cantidad del mismo producto por persona y elemento
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <h3><strong><?php echo 'Periodo de: '.$fecha1.' a '.$fecha2 ?></strong></h3>
                            <div id="verfigura"></div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Mostrar grafica precio total por empleado
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <h3><strong><?php echo 'Periodo de: '.$fecha1.' a '.$fecha2 ?></strong></h3>
                            <div id="verfigura1"></div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Mostrar grafica precio total por nucleo
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse show" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <h3><strong><?php echo 'Periodo de: '.$fecha1.' a '.$fecha2 ?></strong></h3>
                            <div id="verfigura2"></div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFour">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            Mostrar grafica precio total por proceso
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse show" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <h3><strong><?php echo 'Periodo de: '.$fecha1.' a '.$fecha2 ?></strong></h3>
                            <div id="verfigura3"></div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFive">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            Mostrar grafica precio total por cargo
                        </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse show" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <h3><strong><?php echo 'Periodo de: '.$fecha1.' a '.$fecha2 ?></strong></h3>
                            <div id="verfigura4"></div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </div>
    </div>
    
    <!--/.wrapper-->
    <div class="card-footer">
        <div class="container">
            <center> <b class="copyright"><a href=""> EXFOR S.A.S</a> &copy; <?php echo date("Y") ?> Servicios
                Forestales </b></center>
        </div>
    </div>
