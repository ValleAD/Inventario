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
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.min.js" integrity="sha384-PsUw7Xwds7x08Ew3exXhqzbhuEYmA2xnwc8BuD6SEr+UmEHlX8/MCltYEodzWA4u" crossorigin="anonymous"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style1.css">

	<title>Sign In </title>
</head>
<body>
<img id="img1" src="img/vacancy.png" alt="vacancy">
	<div class="container1">
		
		<form action="" method="POST" class="">
			<img class="img2" src="img/logo.png" alt="logo">
			
			<div>
			<label class="email1" for="username">Username</label><br>
				<input class="email1-input" type="text" name="username" value="<?php echo $username; ?>" required>
			</div>
			<div>
			<label class="password1" for="password">password</label><br>
				<input  class="password1-in" type="password" name="password" value="<?php echo $_POST['password']; ?>" required>
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
</body>
</html>