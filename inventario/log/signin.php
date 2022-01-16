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

	<link rel="stylesheet" type="text/css" href="../styles/estilo_men.css">
    <link rel="stylesheet" href="../Plugin/bootstrap/css/bootstrap.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" sizes="32x32"  href="../img/log.png">
	<title>Sign In </title>
</head>
<body style="background-image: url(../img/bg1.jpg)">
<style type="text/css">
	img{
		
		width: 30%;
		
	}
	button{
		max-width:100%;
		margin-top:  5%;
		width: 40%;
	}
	#input{
		background: transparent;
		color: white;
	}
	form{
		background: rgb(27, 31, 69, .5);
		color: white;
	}
	@media (max-width: 952px){
	
    h1{
    	max-width:100%;
    	margin-top: 8%;
        font-size: 100%;
       
    }

    img{
		display: flex;
		max-width:100%;
		width: 60%;
		align-items: center;
		padding: 5px;
		justify-content: center;
	}
}

</style>
   
		
		<form id="form" action="" method="POST" style="position: all; width: 70%; height: 10%;margin-top: 3%;margin-bottom: 3%; padding: 1%;margin-left: 15%;">
			<div class="container">
			<center>	<img src="../img/logo1.png" alt="logo"></center>
			
			<label for="username" style="margin-left:  16%">Nombre de usuario</label><br>
				<input id="input" method="POST" style="position: all; width: 70%; height: 110%;margin-top:2%;margin-left:  15%" class="form-control1" type="text" name="username" value="<?php echo $username; ?>" required>
			

			<label for="password" style="margin-left:  16%">Contraseña</label><br>
				<input id="input"  method="POST" style="position: all; width: 70%; height: 110%;margin-top: 2%;margin-left:  15%"  method="POST" class="form-control" type="password" name="password" value="<?php echo $_POST['password']; ?>" required >


            </div>
			<div>
			<center>	<button  class="btn btn-primary "name="submit" >Ingresar</button></center>
			<p class="p" >No tienes cuenta ?&nbsp;&nbsp;<a id="a" href="signup.php">Registrarse</a></p>
					
				
			</div>
			
				
				<style type="text/css">
						.container{
							margin-bottom: 5%;
					}
					.p{
						margin-bottom: 5%;
					}
					#a{
						margin-left: 10%;
						margin-top: -12%;
					}
					#a:hover{
						color: white;
						text-decoration-line: underline;
					}
				</style>
			
		</form>
   
</body>
</html>