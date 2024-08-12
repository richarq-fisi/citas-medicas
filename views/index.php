<?php
// Seguridad de sesiones
session_start();
error_reporting(0);
$varsesion = $_SESSION['nombre'];

	if($varsesion== null || $varsesion= ''){

	    header("Location: ../includes/_sesion/login.php");
	die();
	} 


include '../includes/header.php';

?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
        <h1>Bienvenido <?php echo $_SESSION['nombre']; ?> a Medical PC</h1> 
        <br>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Panel Administrativo</h1>
    
</div>


<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <a href="citas.php" class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Numero de citas</a>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php 
                               include "../includes/db.php"; 
    
                                $SQL="SELECT id FROM citas ORDER BY id";
                                $dato = mysqli_query($conexion, $SQL);
                                $fila= mysqli_num_rows($dato);
    
                                echo($fila); ?>
                                
                            </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <a href="pacientes.php" class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Numero de pacientes</a>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php 
                               include "../includes/db.php"; 
    
                                $SQL="SELECT id FROM pacientes ORDER BY id";
                                $dato = mysqli_query($conexion, $SQL);
                                $fila= mysqli_num_rows($dato);
    
                                echo($fila); ?>

                        </div>
                    </div>
                    <div class="col-auto">
                    <i class="fa-solid fa fa-male fa-2x text-gray-300" aria-hidden="true"></i>
             
                      
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <a href="medicos.php" class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Numero de medicos </a>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                <?php 
                               include "../includes/db.php"; 
    
                                $SQL="SELECT id FROM doctor ORDER BY id";
                                $dato = mysqli_query($conexion, $SQL);
                                $fila= mysqli_num_rows($dato);
    
                                echo($fila); ?>

                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-user-md fa-2x text-gray-300" aria-hidden="true"></i></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                           Numero de Usuarios</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php 
                               include "../includes/db.php"; 
    
                                $SQL="SELECT id FROM user ORDER BY id";
                                $dato = mysqli_query($conexion, $SQL);
                                $fila= mysqli_num_rows($dato);
    
                                echo($fila); ?>

                        </div>
                    </div>
                    <div class="col-auto">
                    <i class="fa fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</div>

        <!-- End of Content Wrapper -->

    </div>
    
    <!-- End of Page Wrapper -->  

<?php include '../includes/footer.php'; ?>
</html>

