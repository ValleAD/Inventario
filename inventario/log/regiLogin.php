 <?php session_start();	include ('../Model/conexion.php');

	$username = $_POST['usuario'];
	$firstname = $_POST['nombre'];
	$lastname = $_POST['apellido'];
	$Establecimiento = $_POST['Establecimiento'];
	$unidad = $_POST['unidad'];
	$password = $_POST['password'];
	$cpassword = $_POST['password1'];
	$tipo_usuario = ($_POST['tipo_usuario']);
$verificar_usuario =mysqli_query($conn, "SELECT * FROM tb_usuarios WHERE username ='$username'");

if (mysqli_num_rows($verificar_usuario)>0) {
	echo "
		<script>
		   		Swal.fire({
  icon: 'warning',
  title: 'Usuario: $username Ya Esta Registrado',
  footer: 'Sistema De Inventario',
  allowOutsideClick: false
}); 
	</script>";
	exit();
}
if ($password == $cpassword) {
	$sql = "SELECT * FROM tb_usuarios WHERE username='$username' AND firstname='$firstname' AND lastname='$lastname'  AND password='$password'";
	
	$result1 = mysqli_query($conn, $sql);
	if ($result1) {
echo"
    <script>
    var username=$.trim($('#username').val())
       const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 2000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
      })

      Toast.fire({
        icon: 'success',
        title: 'Usuario creado correctamente',
        
        }).then((result) => {
          /* Read more about handling dismissals below */
          if (result.dismiss === Swal.DismissReason.timer) {
           window.location.href='signin.php';
         }
         })
 
                </script>
                ";
			}
	if (!$result1->num_rows > 0) {
			$sql = "INSERT INTO tb_usuarios (username,firstname,lastname,Establecimiento,Unidad, password,tipo_usuario,Habilitado)
				VALUES ('$username','$firstname', '$lastname','$Establecimiento','$unidad',  '$password','$tipo_usuario','Si')";
		$result1 = mysqli_query($conn, $sql);	 
	}
	
	}else{
			echo "
		<script>
		   		Swal.fire({
  icon: 'warning',
  title: 'Contraseña Incorrecta',
  footer: 'Sistema De Inventario',
  allowOutsideClick: false
}); 
	</script>";
	}

?>