<?php


session_start();
error_reporting(0);
$varsesion = $_SESSION['nombre'];

if ($varsesion == null || $varsesion = '') {
    header("Location: _sesion/login.php");
}

include "db.php";
$id = $_GET['id'];
$consulta = "SELECT * FROM citas WHERE id = $id";
$resultado = mysqli_query($conexion, $consulta);
$usuario = mysqli_fetch_assoc($resultado);
?>
<?php include_once "header.php"; ?>



<form action="functions.php" id="form" method="POST">

    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12">

                    <h3 class="text-center">Editar Cita del Paciente <?php echo $usuario['paciente']; ?></h3>
                    <br>
                    <div class="form-group ">
                        <label for="fecha" class="form-label">Fecha*</label>
                        <input type="date" id="fecha" name="fecha" class="form-control" value="<?php echo $usuario['fecha']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="hora" class="form-label">Hora*</label>
                        <input type="time" id="hora" name="hora" class="form-control" value="<?php echo $usuario['hora']; ?>" required>
                    </div>

                    <div class="form-group ">
                        <label>Paciente</label>
                        <select class="form-control" id="id_paciente" name="id_paciente">
                            <option <?php echo $usuario['id_paciente'] === 'id_paciente' ? "selected='selected' " : "" ?> value="<?php echo $usuario['id_paciente']; ?>"><?php echo $usuario['id_paciente']; ?> </option>
                            <?php

                            include("db.php");
                            //Codigo para mostrar categorias desde otra tabla
                            $sql = "SELECT * FROM pacientes ";
                            $resultado = mysqli_query($conexion, $sql);
                            while ($consulta = mysqli_fetch_array($resultado)) {
                                echo '<option value="' . $consulta['id'] . '">' . $consulta['nombre'] . '</option>';
                            }

                            ?>


                        </select>
                    </div>

                    <div class="form-group ">
                        <label>Doctor</label>
                        <select class="form-control" id="id_doctor" name="id_doctor">
                            <option <?php echo $usuario['id_doctor'] === 'id_doctor' ? "selected='selected' " : "" ?> value="<?php echo $usuario['id_doctor']; ?>"><?php echo $usuario['id_doctor']; ?> </option>
                            <?php

                            include("db.php");
                            $sql = "SELECT * FROM doctor ";
                            $resultado = mysqli_query($conexion, $sql);
                            while ($consulta = mysqli_fetch_array($resultado)) {
                                echo '<option value="' . $consulta['id'] . '">' . $consulta['nombres'] . '</option>';
                            }

                            ?>

                        </select>
                    </div>


                    <div class="form-group ">
                        <label>Especialidad</label>
                        <select class="form-control" id="id_especialidad" name="id_especialidad">
                            <option <?php echo $usuario['id_especialidad'] === 'id_especialidad' ? "selected='selected' " : "" ?> value="<?php echo $usuario['id_especialidad']; ?>"><?php echo $usuario['id_especialidad']; ?> </option>
                            <?php

                            include("db.php");
                            //Codigo para mostrar categorias desde otra tabla
                            $sql = "SELECT * FROM especialidades ";
                            $resultado = mysqli_query($conexion, $sql);
                            while ($consulta = mysqli_fetch_array($resultado)) {
                                echo '<option value="' . $consulta['id'] . '">' . $consulta['nombre'] . '</option>';
                            }

                            ?>


                        </select>
                    </div>

                    <div class="form-group ">
                        <label for="observacion">Observacion:</label>
                        <textarea required id="observacion" name="observacion" cols="30" rows="5" class="form-control"><?php echo $usuario['observacion']; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="pendiente" class="form-label">Estado:</label>
                        <select name="estado" id="estado" class="form-control" required>
                            <option <?php echo $usuario['estado'] === '2' ? "selected='selected' " : "" ?> value="2">Pendiente</option>
                            <option <?php echo $usuario['estado'] === '1' ? "selected='selected' " : "" ?> value="1">Atendido</option>
                        </select>
                    </div>

                    <input type="hidden" name="accion" value="editar_cita">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">

                    <br>
                    <div class="mb-3">

                        <button type="submit" id="form" name="form" class="btn btn-success">Editar</button>
                        <a href="../views/citas.php" class="btn btn-danger">Cancelar</a>

                    </div>

                </div>
            </div>
</form>
</div>
</div>

<?php include_once "footer.php"; ?>