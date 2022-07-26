<?php
include("../include/conn/conn.php");
include("../cond/todo.php");
$sql = mysqli_query($conn, "SELECT * FROM dotacion");
while ($row = mysqli_fetch_assoc($sql)) {
?>
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><a onclick="loadDataDota(<?php echo $row['id'] ?>)" href="" data-bs-toggle="modal" data-bs-target="#viewDataDota"><?php echo $row['nombre'] ?></a></td>
                        <td><?php echo $row['cedula'] ?></td>
                        <td><?php echo $cargos[$row['cargo']] ?></td>
                        <td><?php echo $row['fecha1'] ?></td>
                        <td><?php echo $row['fecha2'] ?></td>
                        <td><?php echo $row['fecha3'] ?></td>
                        
                        <td>
                        <a onclick="loadDataDota('bi bi-search',' Visualizacion de la dotacion','visualizar',<?php echo $row['id'] ?>)" href="" data-toggle="tooltip" title"Ver" class="btn btn-sm btn-sm-info" data-bs-toggle="modal" data-bs-target="#viewDataDota"> <i class="bi bi-search"></i> </a>
                        <a href="editar.php?id=<?php $row['id'] ?>"  data-toggle="tooltip" title="Editar datos" class="btn btn-sm btn-success"> <i class="bi bi-pencil-fill"></i> </a>
                        <a href="index.php?action=delete&id=<?php $row['id'] ?>" data-toggle="tooltip" title="Eliminar" onclick="return confirm(\'Esta seguro de borrar los datos de: <?php $row['nombre'] ?>?\')" class="btn btn-sm btn-danger"> <i class="bi bi-trash-fill"></i> </a>
                        </td>
                    </tr>
<?php } ?>

                    <div class="modal fade" id="viewDataDota" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                        function loadDataDota(icon,titulo,archivo,idC){
                            document.getElementById("titulo").innerHTML = '<i class="'+icon+'"></i>'+titulo;
                            $(".modal-body").load(archivo+".php?id="+idC,function(){
                                $("#viewDataDota").modal({show:true});
                            });
                        }
                        function loadDataTarea(icon,titulo,idC){
                            document.getElementById("titulo").innerHTML = '<i class="'+icon+'"></i>'+titulo;
                            $(".modal-body").load("../tareas/crudTarea.php?grupo="+idC,function(){
                                $("#viewDataDota").modal({show:true});
                            });
                        }
                    </script>