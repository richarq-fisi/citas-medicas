<?php include "../includes/header.php";?>
<?php include "../includes/db.php";?>
<?php
error_reporting(0);
session_start();
$actualsesion = $_SESSION['nombre'];

if($actualsesion == null || $actualsesion == ''){


}
?>
<?php

$sql = "SELECT  user.id, user.nombre, user.correo, user.password, user.fecha,
roles.rol FROM user 
LEFT JOIN roles ON user.rol= roles.id  WHERE nombre ='$actualsesion'";
$usuarios = mysqli_query($conexion, $sql);
if($usuarios -> num_rows > 0){
foreach($usuarios as $key => $fila ){




?>
<tr>

</tr>


<?php
}
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/perfil.css" />
</head>

<body>

<section class="perfil-usuario">
    <div class="contenedor-perfil">
        <div class="portada-perfil" style="background-image: url('../img/portada.jpg');">
            <div class="sombra"></div>
            <div class="avatar-perfil">
                <img src="../img/undraw_profile.svg" alt="img">
                <a href="#" class="cambiar-foto">
                    <i class="fas fa-camera"></i> 
                    <span>(Proximamente)</span>
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                </a>
            </div>
            <div class="datos-perfil">
                <h4 class="titulo-usuario"><?php echo $fila['nombre']; ?></h4>
                <p class="bio-usuario">Medical PC - Sistema Administrativo de Citas Medicas</p>
                <ul class="lista-perfil">
                   <!-- <li>Rol de usuario</li>
                    <li>Correo</li>
                    <li>Fecha de registro</li>-->
                </ul>
            </div>
           <!-- <div class="opcciones-perfil">
                <button type="">Cambiar portada</button>
                <button type=""><i class="fas fa-wrench"></i></button>
            </div>-->
        </div>
        <div class="menu-perfil">
            <ul>
            
                
                <li><a href="#" title=""><i class="icono-perfil fas fa-info-circle"></i><?php echo $fila['rol']; ?></a></li>
                <li><a href="#" title=""><i class="icono-perfil fas fa-grin"></i><?php echo $fila['correo']; ?></a></li>
                <li><a href="#" title=""><i class="icono-perfil fas fa-camera"></i><?php echo $fila['fecha']; ?></a></li>
            </ul>
        </div>
    </div>
</section>
<!--====  End of html  ====-->


</body>

</html>

<?php include "../includes/footer.php" ;?>	