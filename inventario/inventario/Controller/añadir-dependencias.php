<?php 
include ('../Model/conexion.php');
	$username = $_POST['dependencia'];
	
	$verificar_usuario =mysqli_query($conn, "SELECT * FROM  selects_dependencia WHERE dependencia ='$username'");

if (mysqli_num_rows($verificar_usuario)>0) {
	echo '
		<script>
		alert("Esta dependencias ya fue registrado anteriormente, intentelo con otra dependencias");
		 window.location ="../dependencias.php"; 
	</script>
	';
exit();
}
	$sql = "INSERT INTO  selects_dependencia (dependencia, Habilitado)
				VALUES ('$username','Si')";
		$result = mysqli_query($conn, $sql);
		if ($result) {
    
echo '<script>

        alert("Dependencia Creada");
        window.location ="../dependencias.php"; 
                </script>';
} else {
    echo '
    <script>
        alert("No se pudo crear la Dependencia");
        window.location ="../dependencias.php"; 
                </script>
                ';
}
	

	
 ?>