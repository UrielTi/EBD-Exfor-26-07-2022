                    <?php session_start();
                        include "../include/conn/conn.php";
                        $grupo = $_GET['grupo'];
                        if (isset($_POST['input'])) {
                            $autor = mysqli_real_escape_string($conn, (strip_tags($_POST['autor'], ENT_QUOTES)));
                            $grupo = mysqli_real_escape_string($conn, (strip_tags($_POST['grupo'], ENT_QUOTES)));
                            $tarea = mysqli_real_escape_string($conn, (strip_tags($_POST['tarea'], ENT_QUOTES)));
            
                            $insert = mysqli_query($conn, "INSERT INTO tareas(id, autor, grupo, tarea)
                                VALUES (NULL, '$autor', '$grupo', '$tarea')") or die(mysqli_error($conn));
                            if ($insert) {
                                echo "<script>alert('Se ha registrado la tarea!'); window.history.back();</script>";
                            } else {
                                echo "<script>alert('Error, no se pudo registrar la tarea'); window.history.back();</script>";
                            }
                        }

                        if (isset($_POST['update'])) {
                            $tareaEditar = mysqli_real_escape_string($conn, (strip_tags($_POST['tareaEditar'], ENT_QUOTES)));
                            $idEditar = mysqli_real_escape_string($conn, (strip_tags($_POST['idEditar'], ENT_QUOTES)));
            
                            $update = mysqli_query($conn, "UPDATE tareas SET tarea='$tareaEditar' WHERE id='$idEditar'") or die(mysqli_error($conn));
                            if ($update) {
                                echo "<script>alert('Se ha actualizado la tarea!'); window.history.back(); </script>";
                            } else {
                                echo "<script>alert('Error, no se pudo actualizar la tarea'); window.history.back(); </script>";
                            }
                        }

                        if(isset($_GET['action']) == 'delete'){
                            $id_delete = intval($_GET['id']);
                            $query = mysqli_query($conn, "SELECT * FROM tareas WHERE id='$id_delete'");
                            if(mysqli_num_rows($query) == 0){
                                echo "<script>alert('No se ha encontrado ningun dato.'); window.history.back(); </script>";
                            }else{
                                $delete = mysqli_query($conn, "DELETE FROM tareas WHERE id='$id_delete'");
                                if($delete){
                                    echo "<script>alert('Se ha eliminado la tarea!'); window.history.back(); </script>";
                                }else{
                                    echo "<script>alert('Error, la tarea no se pudo eliminar'); window.history.back(); </script>";
                                }
                            }
                        }
					?>
					
                    <div class="panel panel-default">
                        <form name="form1" id="form1" class="form-horizontal row-fluid" action="../tareas/crudTarea.php"
                            method="POST">
                            <div class="input-group shadow-sm">
                                <span class="input-group-text" for="autor">(*) Autor:</span>
                                <input name="autor" id="autor" required class="form-control" type="text" 
                                    value="<?php echo $_SESSION['username'] ?>" readonly>
                                <span class="input-group-text" for="grupo">(*) Grupo:</span>
                                <input name="grupo" id="grupo" required class="form-control" type="text"
                                    value="<?php echo $grupo ?>" readonly>
                            </div>
                            <br>
                            <div class="input-group shadow-sm">
                                <span class="input-group-text" for="tarea">(*) Tarea:</span>
                                <textarea name="tarea" id="tarea" required class="form-control"
                                    placeholder="Ingrese la tarea"></textarea>
                            </div>
                            <br>
                            <div class="control-group">
                                <div class="controls">
                                    <button type="submit" name="input" id="input" class="btn btn-sm btn-primary">Registrar</button>
                                </div>
                            </div>
                            <hr>
                        </form>
                    </div>

                <?php 
                    $username = $_SESSION['username'];
                    $sql = mysqli_query($conn, "SELECT * FROM tareas WHERE autor='$username' AND grupo='$grupo'");
                    while ($row = mysqli_fetch_assoc($sql)) {
                ?>
                    <div class="panel panel-default">
                        <form name="form2" id="form2" class="form-horizontal row-fluid" action="../tareas/crudTarea.php"
                            method="POST">
                            <div class="input-group shadow-sm">
                                <span class="input-group-text" for="autor">(*) Autor:</span>
                                <input name="autor" id="autor" required class="form-control" type="text" 
                                    value="<?php echo $row['autor'] ?>" readonly>
                                <span class="input-group-text" for="grupo">(*) Grupo:</span>
                                <input name="grupo" id="grupo" required class="form-control" type="text"
                                    value="<?php echo $row['grupo'] ?>" readonly>
                            </div>
                            <br>
                            <div class="input-group shadow-sm">
                                <span class="input-group-text" for="tareaEditar">(*) Tarea:</span>
                                <input name="idEditar" id="idEditar" required class="form-control" type="hidden"
                                    value="<?php echo $row['id'] ?>" readonly>
                                <textarea name="tareaEditar" id="tareaEditar" required class="form-control"
                                    placeholder="Ingrese la tarea"><?php echo $row['tarea'] ?></textarea>
                            </div>
                            <br>
                            <div class="input-group shadow-sm">
                                <div class="controls">
                                    <input type="submit" name="update" id="update" value="Actualizar" class="btn btn-sm btn-primary" />
                                    <a href="../tareas/crudTarea.php?action=delete&id=<?php echo $row['id'] ?>" data-toggle="tooltip" title="Eliminar" class="btn btn-sm btn-danger"><i class="bi bi-trash-fill"></i> Eliminar </a>
                                </div>
                            </div>
                            <hr>
                        </form>
                    </div>
                <?php } ?>

