<?php session_start(); include '../Model/conexion.php';
$username=$_POST['username'];
$pass=$_POST['password'];

$sql = "SELECT * FROM tb_usuarios WHERE username='$username' AND password='$pass'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
	$row = mysqli_fetch_assoc($result);
		$usuario=$row['username'];
		$password=$row['password'];
		if ($pass==$row['password']) {

		}else{
echo"
    <script>
     var password= document.getElementById('password');
     password.value=''
       Swal.fire({
  icon: 'warning',
  title: 'Contraseña Incorrecta',
  footer: 'Sistema de Inventario',
  allowOutsideClick: false
});
  </script>
                ";
		}
		if ($usuario==$username) {
			$_SESSION['signin'] = $row['username'];
		$_SESSION['tipo_usuario'] = $row['tipo_usuario'];
		$_SESSION['iduser'] = $row['id'];
			  echo"
    <script>
    var username=$.trim($('#username').val())
       Swal.fire({
  icon: 'success',
  title: 'Bienvenido/@ '+username,
  footer: 'Sistema de Inventario',
  allowOutsideClick: false
}).then((resultado) =>{
if (resultado.value) {
	window.location.href='../home.php';
					
					 
				}
		});
 
                </script>
                ";
		}		
else{
	echo"
    <script>
    var username=$.trim($('#username').val())
       Swal.fire({
  icon: 'success',
  title: username+' Es Incorrecto',
  footer: 'Sistema de Inventario',
  allowOutsideClick: false
});
  </script>";
		}
				if ($row ['Habilitado']=="Si") { 
		$_SESSION['signin'] = $row['username'];
		$_SESSION['tipo_usuario'] = $row['tipo_usuario'];
		$_SESSION['iduser'] = $row['id'];
	}else{
		echo"
    <script>
    var username=$.trim($('#username').val())
       Swal.fire({
  icon: 'warning',
  title: username+' Esta Desabilitado Contatece con el Administrador del Sistema',
  footer: 'Sistema de Inventario',
  allowOutsideClick: false
});
  </script>
                ";
	}
		
	}else{
		echo"
    <script>
    var password= document.getElementById('password');
     password.value=''     
     var username= document.getElementById('username');
     username.value=''
       Swal.fire({
  icon: 'error',
  title: 'Usuario o Contraseña estan Incorrectos',
  footer: 'Sistema de Inventario',
  allowOutsideClick: false

});
  </script>
                ";

	}
		?>
<script src="../Plugin/bootstrap/js/jquery-latest.js"></script>
<script src="../Plugin/bootstrap/js/bootstrap.min.js"></script>
<script src="../Plugin/bootstrap/js/sweetalert2.all.min.js"></script>
