<?php

session_start();
error_reporting(0);
$varsesion = $_SESSION['nombre'];
	if($varsesion== null || $varsesion= ''){

	    header("Location:_sesion/login.php");
	
	}
	$id = $_GET['id'];
	include "db.php";
	$query = mysqli_query($conexion,"DELETE FROM horario WHERE id = '$id'");
	
	header ('Location: ../views/horarios.php?m=1');

?>
