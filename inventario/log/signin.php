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
   
  <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form method="POST">
                                            <div class="form-group"><label class="small mb-1" for="inputEmailAddress">Usuario</label>
                                            	<input id="input" method="POST" class="form-control py-4" id="inputEmailAddress" placeholder="Ingrese el usuario" type="text" name="username" value="<?php echo $username; ?>" required></div>
                                            <div class="form-group"><label class="small mb-1" for="inputPassword">Password</label>
                                            <input  class="form-control py-4" id="inputPassword" type="password" placeholder="Enter password" id="input"  method="POST" class="form-control" type="password" name="password" value="<?php echo $_POST['password']; ?>" required ></div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox"><input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" /><label class="custom-control-label" for="rememberPasswordCheck">Remember password</label></div>
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                            	<button  type="submit" class="btn btn-primary btn-block "name="submit" >Ingresar</button></div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="signup.php">No tienes cuenta ? Sign up!</a></div>
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
					.p{
					
				</style>
</body>
</html>