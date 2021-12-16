<?php 
require '../Model/conexion.php';

//conversion
$id1 =$_POST['codProducto'];
$codCatalogo =$_POST['codCatalogo'];
$nombre =$_POST['nombre'];
$descripcion =$_POST['descripcion'];
$um =$_POST['um'];
$stock =$_POST['stock'];
$precio=$_POST['precio'];

 

//sql
$sql="UPDATE tb_productos SET codProductos='$id1', catalogo='$codCatalogo',nombre='$nombre',Descripcion='$descripcion',unidad_medida='$um',stock='$stock',precio='$precio' WHERE codProductos='$id1'" ;
$result = mysqli_query($conn, $sql);
if ($result) {
	echo '
    <script>
       alert("Los datos fueron Actualizados");
        window.location ="../vistaProductos.php"; 
                </script>
                ';
} else {
	echo '
    <script>
        alert("No se pudo actualizar");
        window.location ="../vistaProductos.php"; 
                </script>
                ';
}

/*if(isset($_POST['codProductos'],$_POST['catalogo'],$_POST['nombre'],$_POST['descuento'],$_POST['um'], $_POST['stock'], $_POST['precio'])){
	$codProductos=$_POST['codProductos'];
	$codCatalogo=$_POST['catalogo'];
	$nombre =$_POST['nombre'];
	$descuento=$_POST['descuento'];
    $um =$_POST['um'];
    $stock =$_POST['stock'];
    $precio=$_POST['precio'];
	edit_product('',$prid,$prname,$prctry,$prqty);
}
*/
/*
<?php
include ('Model/conexion.php');
	function edit_product($id,$codProductos,$codCatalogo,$nombre,$descripcion, $um, $stock, $precio){
		global $con;
	$q="UPDATE tblprod SET codProductos='$codProductos', catalogo='$codCatalogo',nombre='$nombre',Descripcion='$descripcion',unidad_medida='$um',stock='$stock',precio='$precio' WHERE codProductos='$codProductos'";
	if(mysqli_query($con,$q)){
	echo "<script language='javascript'>
		alert('PRODUCTO ACTUALIZADO SATISFACTORIAMENTE');
		window.location = 'vistaProductos.php';
		</script>";
}
	else{
	echo "<script language='javascript'>
		alert('Error no se pudo actualizar');
		window.location = 'Actualizar_productos.php';
		</script>";	
		}
}
 
	if(isset($_POST['eprodid'],$_POST['eprodname'],$_POST['ecategory'],$_POST['equantity'])){
	$prid=$_POST['eprodid'];
	$prname=$_POST['eprodname'];
	$prctry=$_POST['ecategory'];
	$prqty=$_POST['equantity'];
	edit_product('',$prid,$prname,$prctry,$prqty);
}
?>
*/

?>