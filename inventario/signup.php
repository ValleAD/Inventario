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
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.min.js" integrity="sha384-PsUw7Xwds7x08Ew3exXhqzbhuEYmA2xnwc8BuD6SEr+UmEHlX8/MCltYEodzWA4u" crossorigin="anonymous"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style1.css">
	
	<title>Register</title>
</head>
<body>
	<img src="img/vacancy1.png" alt="vacancy1" class="img1">
	<div class="container" >

		<form action="" method="POST" class="">
			<img src="img/logo.png" alt="logo" class="img2">

			<div >
			<label class="username" >Username</label><br>
				<input class="username-input" type="text"  name="username" value="<?php echo $username; ?>" required>
			</div>
            
			<div >
			<label class="firstname" >Firstname</label><br>
				<input class="firstname-input" type="text"  name="firstname" value="<?php echo $firstname; ?>" required>
			</div>

			<div >
			<label class="lastname" >Lastname</label><br>
				<input class="lastname-input" type="text"  name="lastname" value="<?php echo $lastname; ?>" required>
			</div>

			<div >
			<label class="email" >Email</label><br>
				<input class="email-input" type="email" name="email" value="<?php echo $email; ?>" required>
			</div>

			<div >
			<label class="password" >Password</label><br>
				<input class="password-input" type="password"  name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>

            <div >
			<label class="cpassword" >Confirm Password</label><br>
				<input class="cpassword-input" type="password"  name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
			</div>

			<div>
				<button class="login" name="submit" class="login">Sign Up</button>
			</div>
			<p class="account">Have an account? <a href="signin.php">Login Here</a></p>
		</form>
	</div>
</body>
</html>