    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <link rel="stylesheet" type="text/css" href="../../Plugin/bootstrap/css/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="../../Plugin/bootstrap/css/bootstrap.css">
    <script src="../../Plugin/bootstrap/js/sweetalert2.all.min.js"></script>
    <script src="../../Plugin/bootstrap/js/jquery-latest.js"></script>
    <script src="../../Plugin/bootstrap/js/bootstrap.min.js"></script>
    </head>
    <body>
      <?php 
require '../../Model/conexion.php';

//conversion
$id2 =$_POST['cod'];
$id1 =$_POST['codProducto'];
$codCatalogo =$_POST['codCatalogo'];
$descripcion =$_POST['descripcion'];
$categoria = $_POST['categoria'];
 $um =$_POST['um'];
 $stock=$_POST['stock'];
$precio=$_POST['precio'];
$idusuario = $_POST['idusuario'];


      

//sql


$sql="UPDATE tb_productos SET cod='$id2', codProductos='$id1',categoria='$categoria',catalogo='$codCatalogo',descripcion='$descripcion',stock='$stock',unidad_medida='$um',precio='$precio' WHERE cod='$id2'" ;
$result = mysqli_query($conn, $sql);

  $verificar =mysqli_query($conn, "SELECT * FROM historial WHERE Concepto='Inventario Físico' and idusuario='$idusuario' and Entradas='$stock' AND Saldo='$precio' and descripcion='$descripcion' and No_Comprovante='$id1' and Detalles='0'  and No_Comprovante='$id1'");

if (mysqli_num_rows($verificar)>0) {

      $sql2="UPDATE historial SET Salidas='$cantidad_despachada' WHERE Concepto='Inventario Físico' and idusuario='$idusuario' and Entradas='$stock' AND Saldo='$precio' and descripcion='$descripcion' and No_Comprovante='$id1' and Detalles='0'  and No_Comprovante='$id1'";
      $query3 = mysqli_query($conn, $sql2);

}else{

     $sql4="INSERT INTO historial(descripcion,Concepto,unidad_medida,No_Comprovante,Entradas,Saldo,idusuario) VALUES('$descripcion','Inventario Físico','$um','$id1','$stock','$precio','$idusuario')";
          $query4 = mysqli_query($conn, $sql4);
      
}

if ($result || $query3 || $query4) {
  echo "<script>
    Swal.fire({
      title:'Actualizado',
      text:'Los Datos Fueron Actualizados Correctamente',
      icon:'success',
      allowOutsideClick: false
    }).then((resultado) =>{
if (resultado.value) {
        window.location.href='../../Vistas/Productos/vistaProductos.php';                               
               }
                });

        </script>";
}else {
  echo "<script>
    Swal.fire({
      title:'ERROR',
      text:'Nos Se pudo Actualizar',
      icon:'error',
      allowOutsideClick: false
    }).then((resultado) =>{
if (resultado.value) {
        window.location.href='../../Vistas/Productos/vistaProductos.php';                               
               }
                });

        </script>";
}

?>
</body>
</html>
