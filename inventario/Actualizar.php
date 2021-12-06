<?php 
include ('conexion.php');
$id=$_POST['id'];
$codct =$_POST['codct'];
$nombre_producto =$_POST['nom'];
$desc =$_POST['desc'];
$um =$_POST['um'];
$cant =$_POST['cant'];
$cant_uni=$_POST['cant_uni'];
$actualizar="UPDATE tb_productos SET catalogo='codct',nombre='nom',Descripcion='Descri',unidad_medida='um',stock='cant',precio='cant_uni' WHERE codProductos='id'";
$result= mysqli_query($conn, $actualizar);
if ($result) {
	echo '
    <script>
        alert("Los datos fueron Actualizados");
        window.location ="vistaProductos.php"; 
                </script>
                ';
} else {
	echo '
    <script>
        alert("No se pudo actualizar");
        window.location ="vistaProductos.php"; 
                </script>
                ';
}
