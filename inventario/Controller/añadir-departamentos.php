<?php 
include ('../Model/conexion.php');
	$username = $_POST['departamentos'];
	
	$verificar_usuario =mysqli_query($conn, "SELECT * FROM  selects_departamento WHERE departamento ='$username'");

if (mysqli_num_rows($verificar_usuario)>0) {
	echo '
		<script>
		alert("Esta departamentos ya fue registrado anteriormente, intentelo con otra departamentos");
		 window.location ="../departamentos.php"; 
	</script>
	';
exit();
}
	$sql = "INSERT INTO  selects_departamento (departamento, Habilitado)
				VALUES ('$username','Si')";
		$result = mysqli_query($conn, $sql);
		if ($result) {
    
echo '<script>

        alert("Categoria Creada");
        window.location ="../departamentos.php"; 
                </script>';
} else {
    echo '
    <script>
        alert("No se pudo crear la Categoria");
        window.location ="../departamentos.php"; 
                </script>
                ';
}
	

	
 ?>