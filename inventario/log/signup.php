<?php 

include '../Model/conexion.php';
session_start();
error_reporting(0);

if (isset($_SESSION['signup'])) {
    header("Location: signin.php");
}

if (isset($_POST['submit'])) {

	$username = $_POST['usuario'];
	$firstname = $_POST['nombre'];
	$lastname = $_POST['Apellido'];
	$Establecimiento = $_POST['Establecimientos'];
	$unidad = $_POST['Unidad'];
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];
	$tipo_usuario = ($_POST['tipo_usuario']);
	

			$verificar_usuario =mysqli_query($conn, "SELECT * FROM tb_usuarios WHERE username ='$username'");

if (mysqli_num_rows($verificar_usuario)>0) {
	echo '
		<script>
		alert("Este Usuario ya esta Registrado, intente con otro diferente");
		 window.location ="signup.php"; 
	</script>
	';
	exit();
}
if ($password == $cpassword) {
	$sql = "SELECT * FROM tb_usuarios WHERE username='$username' AND firstname='$firstname' AND lastname='$lastname'  AND password='$password'";
	
	$result1 = mysqli_query($conn, $sql);
	if ($result1) {
				echo '
				 <script>
				   alert("Usuario Creado");
				        window.location ="signin.php";
				        session_destroy();  
				                </script>';
			}
	if (!$result->num_rows > 0) {
			$sql = "INSERT INTO tb_usuarios (username,firstname,lastname,Establecimiento,Unidad, password,tipo_usuario,Habilitado)
				VALUES ('$username','$firstname', '$lastname','$Establecimiento','$unidad',  '$password','$tipo_usuario','Si')";
		$result = mysqli_query($conn, $sql);	 
	}
	
	}else{
		$eror= '<p class="alert-heading"><i class="text-danger  bi bi-exclamation-triangle-fill"></i> Las Contraseñas no Coinsiden</p> ';
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head></head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registro de Usuarios</title>
</head>
<body>
	
</body>
</html>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="../styles/estilo_men.css">

    <link rel="stylesheet" href="../Plugin/bootstrap/css/bootstrap.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" sizes="32x32"  href="../img/log.png">
	<title>Register</title>
</head>
<body style="background-image: url(../img/bg3.jpg);background-size: 100% 100%,100%;background-repeat: no-repeat;background-position: center;background-attachment: fixed;">
	 <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                                    <div class="card-body">
                                        <form method="POST" action="">
                                          	<div class="container">
                                          		<div class="row">
                    <div class="col-md-6" style="position: initial">
                       <label class="small mb-1">Nombre de usuario</label><br>
                        <input pattern="[A-Za-z0-9_-]{1,}"   class="form-control" type="text"  name="usuario"  required>
                    </div>
                    <div class="col-md-6" style="position: initial">
                      <label class="small mb-1">Nombre</label><br>
                        <input  class="form-control" type="text"  name="nombre" required>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-6" style="position: initial">
                     <label class="small mb-1">Apellido</label><br>
                        <input class="form-control" type="text"  name="Apellido"  required>
                        
                                                
                                        
                     
                    </div>
                    <div class="col-md-6" style="position: initial">
                      <label class="small mb-1">Establecimiento</label><br>
                     <input class="form-control" readonly name="Establecimiento" value='Hospital Nacional Zacatecoluca PA "Santa Tereza"'>
                     
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6" style="position: initial">
                      <label class="small mb-1">Contraseña</label><br>
                        <input pattern="[A-Za-z0-9_-]{1,}" class="form-control" id="show" type="password"  name="password"  required>
                      <div class="custom-control custom-checkbox"><input class="custom-control-input" onclick="myFuntion();" id="rememberPasswordCheck" type="checkbox" /><label class="custom-control-label" for="rememberPasswordCheck">Mostrar Contraseña</label></div>
                  </div>
                  <div class="col-md-6" style="position: initial">
                      <label class="small mb-1">Confirmar Contraseña</label><br>
                        <input pattern="[A-Za-z0-9_-]{1,}" class="form-control" id="show1" type="password"  name="cpassword" required>
                        <div class="custom-control custom-checkbox"><input class="custom-control-input" onclick=" myFuntion1();" id="PasswordCheck" type="checkbox" /><label class="custom-control-label" for="PasswordCheck">Mostrar Contraseña</label></div>
                  </div>
                </div>
                <br>
<div class="row">
                    
                    <div class="col-md-12" style="position: initial">
                        <label id="label"  class="small mb-1">Departamento</label><br>
                         
               <div id="div" style = " max-height: 150px; overflow-y:scroll;margin-bottom: 5%;"> 
                
                   <?php  
   $sql = "SELECT * FROM selects_departamento";
    $result = mysqli_query($conn, $sql);
    while ($productos = mysqli_fetch_array($result)){ ?>  
                             <input required  id="<?php echo $productos['id'] ?>" type="radio" name="Unidad" value="<?php echo $productos['departamento'] ?>"> <label style="width: 100%;" id="label1" for="<?php echo $productos['id'] ?>" > <?php echo $productos['departamento'] ?></label><br>
 <?php }?>
                         </div>
 
          
                </div>
                <br>
                <div class="col-md-12" style="position: initial">
                 <label id="label" class="small mb-1">Tipo de Usuarios (Roles De Usuario)</label>
             <br>
            <input required id="input" type="radio" name="tipo_usuario" value="1"> <label id="label1" for="input" > Admistrador</label>
            <input required id="input1" type="radio" name="tipo_usuario" value="2"> <label id="label1" for="input1"> Cliente</label> 

                        </div>
                    </div>
                <div>
                    <div class="form-group" style="margin-top: 2%;">
                        <button type="submit" name="submit" class="btn btn-primary btn-block">Registrarse</button>
                    </div>
                                    <?php if (isset($_POST['submit'])) { ?>
                           <div class="mx-2 mt-2 alert alert-warning alert-dismissible fade show" style="height:50px" role="alert">
						  <strong><?php echo $eror ?></strong>
						  <form action="" method="POST">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						  </form>
						</div><?php } ?>                    
                <div>

                    

                    </div>
                     <style type="text/css">
                    label{
                    color: black;
                 }
                    </style>
                
                </form> 

								
                                  
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="signin.php">¿Ya tienes una cuenta? Go to login</a></div>
                                    </div>
                                    </main>
                                </div>
                            </div>
	<style type="text/css">

		.container{
			margin-top: 1%;
		margin-bottom: 2%;
}
   
</style>
<script src="../Plugin/bootstrap/js/jquery-latest.js"></script>
<script src="../Plugin/bootstrap/js/bootstrap.min.js"></script>
<!--Es para la Contraseña Normarl-->
	<script type="text/javascript">
					function myFuntion() {
						var show = document.getElementById('show');
						if (show.type=='password') {
							show.type='text';
						}
						else{
							show.type='password';
						}

					}
				</script>
				<!--Es para la Contraseña Confirmacion-->
				<script type="text/javascript">
					function myFuntion1() {
						var show = document.getElementById('show1');
						if (show.type=='password') {
							show.type='text';
						}
						else{
							show.type='password';
						}

					}
				</script>
</body>
</html>