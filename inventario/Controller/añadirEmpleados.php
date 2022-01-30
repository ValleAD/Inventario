<?php 
include ('../Model/conexion.php');
	$username = $_POST['Usuario'];
	$firstname = $_POST['Nombres'];
	$lastname = $_POST['Apellidos'];
	$Establecimiento = $_POST['Establecimientos'];
	$unidad = $_POST['Unidad'];
	$password = $_POST['Password'];
	$tipo_usuario = $_POST['tipo_usuario'];
	$verificar_usuario =mysqli_query($conn, "SELECT * FROM tb_usuarios WHERE username ='$username'");

if (mysqli_num_rows($verificar_usuario)>0) {
	echo '
		<script>
		alert("Este Usuario ya esta Registrado, intente con otro diferente");
		 window.location ="../Empleados.php"; 
	</script>
	';
exit();
}
	$sql = "INSERT INTO tb_usuarios (username,firstname,lastname, Establecimiento,unidad, password,tipo_usuario)
				VALUES ('$username','$firstname', '$lastname', '$Establecimiento','$unidad', '$password','$tipo_usuario')";
		$result = mysqli_query($conn, $sql);
		if ($result) {
    
echo '<script>

        alert("Usuario Creado");
       // window.location ="../Empleados.php"; 
                </script>';
} else {
    echo '
    <script>
        alert("No se pudo crear el Usuario");
        //window.location ="../Empleados.php"; 
                </script>
                ';
}
	

	
 ?>