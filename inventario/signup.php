<?php 

include 'conexion.php';



session_start();
error_reporting(0);

if (isset($_SESSION['signup'])) {
    header("Location: signin.php");
}

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

	if ($password == $cpassword) {
		$sql = "SELECT * FROM usuarios WHERE username='$username' AND firstname='$firstname' AND lastname='$lastname' AND email='$email' AND password='$password'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO usuarios (username,firstname,lastname, email, password)
					VALUES ('$username','$firstname', '$lastname', '$email', '$password')";
			$result = mysqli_query($conn, $sql);

			if ($result) {
				/*while ($row=mysqli_fetch_array($result)) {
					echo '<script type="text/javascript">alert("You are login successfully and you are logined as '.$row['usertype'].'")</script>';
				}if (mysqli_num_rows($result)>0) {
					
				}*/
				echo "<script>alert('Wow! User Registration Completed.')</script>";
				$username = "";
				$firstname = "";
				$lastname = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
			} else {
				echo "<script>alert('Oops!! something was bad write')</script>";
			}
		} else {
			echo "<script>alert('Oops!! Email Already Exists.')</script>";
		}
		
	} else {
		echo "<script>alert('Password Not Matched. try again')</script>";
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
	<title>Register</title>
</head>
<body>
<div id="head">  
        <h1>Hospital Nacional Santa Teresa de Zacatecoluca</h1>

    </div>
<img id="img1" src="img/" alt="vacancy">
	<div style="position: all; width: 70%; height: 110%;margin-top: 1%" class="container">

		<form action="" method="POST" class="">
			<img src="img/register.png" alt="logo" class="img1">

			<div >
			<label>Username</label><br>
				<input class="form-control1" type="text"  name="username" value="<?php echo $username; ?>" required>
			</div>
            
			<div >
			<label>Firstname</label><br>
				<input class="form-control1" type="text"  name="firstname" value="<?php echo $firstname; ?>" required>
			</div>

			<div >
			<label>Lastname</label><br>
				<input class="form-control1" type="text"  name="lastname" value="<?php echo $lastname; ?>" required>
			</div>

			<div >
			<label>Email</label><br>
				<input class="form-control1" type="email" name="email" value="<?php echo $email; ?>" required>
			</div>

			<div >
			<label>Password</label><br>
				<input class="form-control1" type="password"  name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>

            <div >
			<label >Confirm Password</label><br>
				<input class="form-control1" type="password"  name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
			</div>

			<div>
				<button class="login" name="submit" class="login">Sign Up</button>
			</div>
			<p class="account">Have an account? <a href="signin.php">Login Here</a></p>
		</form>
	</div>
	<footer style="margin-top:  14%;">

  <div align="center">
  <img src="img/log_1.png" alt="" width="" height="150px">
  </div>

</footer>
</body>
</html>