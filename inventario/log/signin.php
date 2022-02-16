<?php 

include '../Model/conexion.php';

session_start();

error_reporting(0);

if (isset($_SESSION['signin'])) {
    header("Location: ../log/signin.php");
}else {
	header("windows.location: ../log/signin.php");
}
if (isset($_POST['submit'])) {
	$username = $_POST['username'];
//	$email = $_POST['email'];
	$password = ($_POST['password']);
	//$password = MD5($pass);
	$sql = "SELECT * FROM tb_usuarios WHERE username='$username' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		if($_SESSION['signin']==$row['password']){
          
        
            $_SESSION['signin'] = $row['username'];
		$_SESSION['tipo_usuario'] = $row['tipo_usuario'];
		
       }if ($row ['Habilitado']=="Si") { 
			$_SESSION['signin'] = $row['username'];
		$_SESSION['tipo_usuario'] = $row['tipo_usuario'];
		header("Location: ../home.php");
		}else{
			$eror= '<p class="alert-heading"><i style="width: 50%;font-size: 2rem;" class="text-danger bi bi-exclamation-triangle-fill"></i></p>No Puede Entrar Usuario Desabilitado';
		
	session_destroy();  
		}
		
		
	} else {
		$eror= '<p class="alert-heading"><i style="width: 50%;font-size: 2rem;" class="text-danger  bi bi-exclamation-triangle-fill"></i></p> Usuario o Contraseña son Incorrectos ';

	}

}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="../styles/estilo_men.css">
    <link rel="stylesheet" href="../Plugin/bootstrap/css/bootstrap.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" sizes="32x32"  href="../img/log.png">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
	<title>Sign In </title>
</head>
<body style="background-image: url(../img/bg1.jpg)">
<style type="text/css">

	}
	button{
		max-width:100%;
		margin-top:  5%;
		width: 40%;
	}


</style>
   
  <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form method="POST" class="needs-validation" >
                                            <div class="form-group"><label class="small mb-1" for="inputEmailAddress">Usuario</label>
                                            	<input pattern="[A-Za-z0-9_-]{1,}" id="input" method="POST" class="form-control py-4" id="inputEmailAddress" placeholder="Ingrese el usuario" type="text" name="username" value="<?php echo $username; ?>" required></div>
                                            <div class="form-group"><label class="small mb-1" for="inputPassword">Password</label>
                                            <input pattern="[A-Za-z0-9_-]{1,}"  class="form-control py-4" id="show" type="password" placeholder="Ingrese la Contraseña" id="input"  method="POST" class="form-control" type="password" name="password" value="<?php echo $_POST['password']; ?>" required ></div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox"><input class="custom-control-input" onclick="myFuntion();" id="rememberPasswordCheck" type="checkbox" /><label class="custom-control-label" for="rememberPasswordCheck">Mostrar Contraseña</label></div>
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                            	<button  type="submit" class="btn btn-primary btn-block "name="submit" >Ingresar</button></div>
                                            	
                                        </form>
                                    </div>
                                    <?php if (isset($_POST['submit'])) { ?>
                           <div class="mx-2 alert alert-warning alert-dismissible fade show" role="alert">
						  <strong><?php echo $eror ?></strong>
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div><?php } ?>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="signup.php">No tienes cuenta ? Registrarse</a></div>
                                        <div class="small"><form action="Invitado/invitado.php">
                                        	<button class="btn btn-info" type="submit">Modo inviado</button>
                                        </form></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            
        </div>
   <style type="text/css">
						.container{
							margin-bottom: 5%;
					}
				
					
				</style>
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
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
</body>
</html>