<?php 
  $servidor= "localhost";
  $usuario= "root";
  $password = "";
  $nombreBD= "medicina";
  $conexion = new mysqli($servidor, $usuario, $password, $nombreBD);
  if ($conexion->connect_error) {
      die("la conexión ha fallado: " . $conexion->connect_error);
  }

  if (!isset($_POST['buscar'])){$_POST['buscar'] = '';}
  if (!isset($_REQUEST["mostrar_todo"])){$_REQUEST["mostrar_todo"] = '';}

?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<title></title>
</head>
<body>

<div class="container mt-5">
<div class="col-12">

<form method="POST" action="consulta.php">
<div class="mb-3">
<label class="form-label">Introduce tu nombre</label>
<input type="text" class="form-control" id="buscar" name="buscar" value="<?php echo $_POST['buscar']; ?>">
</div>
<button type="text" class="btn btn-primary">Buscar</button>
</form>



<div class="card col-12 mt-0 border-0">
<div class="card-body border-0">


<?php 
if(!empty($_POST))
{

        // resaltamos el resultado
        function resaltar_frase($string, $frase, $taga = '<b>', $tagb = '</b>'){
            return ($string !== '' && $frase !== '')
            ? preg_replace('/('.preg_quote($frase, '/').')/i'.('true' ? 'u' : ''), $taga.'\\1'.$tagb, $string)
            : $string;
             }
    
  //Aqui poner el nombre de tu db y los campos que quieres buscara en tu caso es la MATRICULA lo puedes sustituir
      $aKeyword = explode(" ", $_POST['buscar']);
      $filtro = "WHERE paciente LIKE LOWER('%".$aKeyword[0]."%') OR fecha LIKE LOWER('%".$aKeyword[0]."%')";
      $query ="SELECT * FROM citas WHERE paciente LIKE LOWER('%".$aKeyword[0]."%') OR fecha LIKE LOWER('%".$aKeyword[0]."%')";
  
// Recuedr declarar tu variable en cada una de las consultas
     for($i = 1; $i < count($aKeyword); $i++) {
        if(!empty($aKeyword[$i])) {
            $query .= " OR paciente LIKE '%" . $aKeyword[$i] . "%' OR fecha LIKE '%" . $aKeyword[$i] . "%'";
        }
      }
     
     $result = $conexion->query($query);
     $numero = mysqli_num_rows($result);
     if (!isset($_POST['buscar'])){
     echo "Has buscado la palabra:<b> ". $_POST['buscar']."</b>";
     }
//Aqui tu le cambias el estilo de la tabla que quieres usar
     if( mysqli_num_rows($result) > 0 AND $_POST['buscar'] != '') {
        $row_count=0;
        echo "<br>Resultados encontrados:<b> ".$numero."</b>";
        echo "<br><br><table class='table table-striped'>
        <thead>    
        <tr>
       <th>Id</th>
       <th>Nombre</th>
       <th>Fecha-Cita</th>
       <th>Hora</th>
       <th>Estado</th>    
       <th>Fecha-Registro</th>

       </tr>
       </thead>
       <tbody>";

        While($row = $result->fetch_assoc()) {   
            $row_count++;   
            echo "<tr><td>".$row_count." </td><td>". resaltar_frase($row['paciente'] ,$_POST['buscar']) . 
            "</td><td>". resaltar_frase($row['fecha'] ,$_POST['buscar']).  "</td><td>". resaltar_frase($row['hora'] ,$_POST['buscar']).
            "</td><td>". resaltar_frase($row['estado'] ,$_POST['buscar']).  "</td><td>". resaltar_frase($row['fecha_registro'] ,$_POST['buscar']) ; 
            //En el href pondrias un update para editar el registro y6 poner el saldo manualmente. O bien podrias usar una ventana modal para que se vea mejor
            
        }
        echo "</table>";
	
    }

}
?>


</div>
</div>

</div>
</div>


</body>
</html>