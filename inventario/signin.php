<?php 

include 'conexion.php';

session_start();

error_reporting(0);

if (isset($_SESSION['signin'])) {
    header("Location: home.php");
}

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
//	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM usuarios WHERE username='$username' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['signin'] = $row['username'];
		header("Location: home.php");
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="styles/log.css" > 
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" sizes="32x32"  href="img/log.png">
	<title>Sign In </title>
</head>
<body>

<div id="head">  
        <h1>Hospital Nacional Santa Teresa de Zacatecoluca</h1>

    </div>
<img id="img1" src="img/baner.png" alt="vacancy">
	<div style="position: all; width: 70%; height: 110%;margin-top: 1%" class="container">
		
		<form action="" method="POST">
			<img class="img2" src="img/logo.png" alt="logo">
			
			<div>
			<label for="username">Username</label><br>
				<input type="text" name="username" value="<?php echo $username; ?>" required>
			</div>
			<div>
			<label for="password">password</label><br>
				<input  class="form-control1" type="password" name="password" value="<?php echo $_POST['password']; ?>" required>
			</div>
			<div>
				<button name="submit" class="login1">Sign In</button>
			</div>
			
			<p class="account1">
			<b>Forgot your password? </b>
			</p>
				<p class="paragrafh">New in "Anuncios Modernos"? </p>
				<a href="signup.php" class="href">Sign Up</a>
			
		</form>
	</div>
    <footer style="margin-top:  14%;">

  <div align="center">
  <img src="img/log_1.png" alt="" width="" height="150px">
  </div>

</footer>
</body>
</html>