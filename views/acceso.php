<?php 
error_reporting(0);
session_start();
$actualsesion = $_SESSION['nombre'];

if($actualsesion == null || $actualsesion == ''){
    header("Location: ../includes/_sesion/login.php");
	die();

}


echo "<script language='JavaScript'>
alert('Necesitamos validar que eres Administrador para acceder a esta vista!!Vuelve a Iniciar Sesion');
location.assign('../includes/_sesion/cerrarSesion.php');
</script>"

?>