<?php
include("../include/conn/conn.php");
include("../cond/todo.php");
$sql = mysqli_query($conn, "SELECT id, nombres, maquina, labor, cedula, evento, lugar, agente_evento, fecha_evento FROM incidentes");
while ($row = mysqli_fetch_assoc($sql)) {
?>
        <tr>
            <td><?php echo $row['id'] ?></td>
            <td><a onclick="loadData('bi bi-person-square','Visualización de incidentes','visualizar',<?php echo $row['id'] ?>)" href="" data-bs-toggle="modal" data-bs-target="#mimodal"> 
            <?php if ($row['labor'] == '' && $row['maquina'] == ''){
                echo $row['nombres'];

            } elseif ($row['nombres'] == '' && $row['labor'] == ''){
                echo $row['maquina'];

            } else {
                echo $row['labor'];

            }
            ?></a></td>
            <td><?php echo $row['cedula'] ?></td>
            <td><?php echo $eventos_acc[$row['evento']]?></td>
            <td><?php echo $lugares[$row['lugar']] ?></td>
            <td><?php echo $row['agente_evento'] ?></td>
            <td><?php echo $row['fecha_evento'] ?></td>
            <td>
            <a onclick="loadData('bi bi-person-square','Visualización de incidentes','visualizar',<?php echo $row['id'] ?>)" href="" data-toggle="tooltip" title"Ver" class="btn btn-sm btn-sm-info" data-bs-toggle="modal" data-bs-target="#mimodal"> <i class="bi bi-search"></i> </a>
            <a href="editar.php?id=<?php echo $row['id'] ?>"  data-toggle="tooltip" title="Editar datos" class="btn btn-sm btn-success"> <i class="bi bi-pencil-fill"></i> </a>
            </td>
        </tr>
<?php } ?>
        <div class="modal fade" id="mimodal" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 id="titulo" class="panel-title"></h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal"><i class="bi bi-arrow-left"></i> Regresar</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function loadData(icon,titulo,archivo,idC){
                document.getElementById("titulo").innerHTML = '<i class="'+icon+'"></i>'+titulo;
                $(".modal-body").load(archivo+".php?id="+idC,function(){
                    $("#mimodal").modal({show:true});
                });
            }
            function loadDataTarea(icon,titulo,idC){
                document.getElementById("titulo").innerHTML = '<i class="'+icon+'"></i>'+titulo;
                $(".modal-body").load("../tareas/crudTarea.php?grupo="+idC,function(){
                    $("#mimodal").modal({show:true});
                });
            }
        </script>