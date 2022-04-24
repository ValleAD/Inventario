<?php 
include ('../Model/conexion.php');
	$username = $_POST['unidad'];
	
	$verificar_usuario =mysqli_query($conn, "SELECT * FROM selects_unidad_medida WHERE unidad_medida ='$username'");

if (mysqli_num_rows($verificar_usuario)>0) {
	echo '
		<script>
		alert("Esta Unidad de Medida ya fue registrado anteriormente, intentelo con otra Unidad de Medida");
		 window.location ="../unidad_medidad.php"; 
	</script>
	';
exit();
}
	$sql = "INSERT INTO selects_unidad_medida (unidad_medida, Habilitado)
				VALUES ('$username','Si')";
		$result = mysqli_query($conn, $sql);
		if ($result) {
    
echo '<script>

        alert("Unidad de Medida Creada");
        window.location ="../unidad_medidad.php"; 
                </script>';
} else {
    echo '
    <script>
        alert("No se pudo crear la Unidad de Medida");
        window.location ="../unidad_medidad.php"; 
                </script>
                ';
}
	

	
 ?>