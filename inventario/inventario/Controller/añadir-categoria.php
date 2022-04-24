<?php 
include ('../Model/conexion.php');
	$username = $_POST['categoria'];
	
	$verificar_usuario =mysqli_query($conn, "SELECT * FROM selects_categoria WHERE categoria ='$username'");

if (mysqli_num_rows($verificar_usuario)>0) {
	echo '
		<script>
		alert("Esta Categoria ya fue registrado anteriormente, intentelo con otra Categoria");
		 window.location ="../categorias.php"; 
	</script>
	';
exit();
}
	$sql = "INSERT INTO selects_categoria (categoria, Habilitado)
				VALUES ('$username','Si')";
		$result = mysqli_query($conn, $sql);
		if ($result) {
    
echo '<script>

        alert("Categoria Creada");
        window.location ="../categorias.php"; 
                </script>';
} else {
    echo '
    <script>
        alert("No se pudo crear la Categoria");
        window.location ="../categorias.php"; 
                </script>
                ';
}
	

	
 ?>