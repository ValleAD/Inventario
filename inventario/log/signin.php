<?php 

include '../Model/conexion.php';

session_start();

error_reporting(0);

if (isset($_SESSION['signin'])) {
    header("Location: ../home.php");
}

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
//	$email = $_POST['email'];
	$password = ($_POST['password']);

	$sql = "SELECT * FROM tb_usuarios WHERE username='$username' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['signin'] = $row['username'];
		header("Location: ../home.php");
	} else {
		 echo '
    <script>
        alert("Woops! Email or Password is Wrong.");
        window.location ="signin.php";
        session_destroy();  
                </script>
	';

	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../styles/log.css" > 
    <link rel="stylesheet" href="../Plugin/bootstrap/css/bootstrap.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" sizes="32x32"  href="../img/log.png">
	<title>Sign In </title>
</head>
<body>
<style type="text/css">
	img{
		display: flex;
		max-width:100%;
		min-width: 10%;
		align-items: center;
		padding: 20px;
		justify-content: center;
	}
	button{
		max-width:100%;
		margin-top:  5%;
		width: 40%;
	}
	@media (max-width: 952px){
	
    h1{
    	max-width:100%;
    	margin-top: 8%;
        font-size: 100%;
       
    }
  .container-fluid{
  	margin-top: -7%;
  	margin-right: 30%;
  }
  p{
  	margin-right: -120%;
  	 font-size: 1em;
  }
}
</style>
    <br>
	<div style="position: all; width: 70%; height: 110%;margin-top: 7%" class="container-fluid">
		
		<form action="" method="POST" style="position: all; width: 70%; height: 110%;margin-top: 1%">
			<div class="container">
			<center>	<img src="../img/logo1.png" alt="logo"></center>
			</div>
			
			
			<div>
			<label for="username" style="margin-left:  16%">Nombre de usuario</label><br>
				<input  method="POST" style="position: all; width: 70%; height: 110%;margin-top:2%;margin-left:  15%" class="form-control1" type="text" name="username" value="<?php echo $username; ?>" required>
			</div>
			<div>

			<label for="password" style="margin-left:  16%">Contraseña</label><br>
				<input  method="POST" style="position: all; width: 70%; height: 110%;margin-top: 2%;margin-left:  15%"  method="POST" class="form-control" type="password" name="password" value="<?php echo $_POST['password']; ?>" required >


            
			<div>
			<center>	<button  class="btn btn-primary "name="submit" >Ingresar</button></center>
			</div>
			<p class="p" style="margin-top:2%;margin-left:  35%">No tienes cuenta ?</p>
			<p class="p" style="margin-top:4%;"></p>
				<a id="a" href="signup.php" class="nav-link text-center" style="margin-top:-7.5%;">Registrarse</a>
				<style type="text/css">
					#a{
						width: 20%;
						margin-left: 50%;
					}
					#a:hover{
						text-decoration-line: underline;
					}
				</style>
			
		</form>
	</div>
	</div>
   
</body>
</html>