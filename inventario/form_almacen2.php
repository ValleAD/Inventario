<?php
session_start();
 if (!isset($_SESSION['signin'])>0) {
    # code...
    echo '
    <script>
        window.location ="log/signin.php";
        session_destroy();  
                </script>
die();

    ';
}
?>
<?php include ('templates/menu.php')?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Vista Previa</title>
</head>
<body>
        <style>  
         section{
            background: white;
            border-radius: 15px;
            margin: 1%;
            padding: 1%;
            }
            #buscar{
            margin-bottom: 5%;
            margin-left: 2.5%;
            margin-top: 0.5%; 
            background: rgb(5, 65, 114); 
            color: #fff; margin-bottom: 2%; 
            border: rgb(5, 65, 114);
            }
            #buscar:hover{
            background: rgb(9, 100, 175);
            } 
            #buscar:active{
            transform: translateY(5px);
            } 
            #buscar1{
                width: 25%;
            }
            @media (max-width: 952px){
   section{
        margin: -15%6%6%3%;
        width: 95%;
    }
    }#buscar1{
        width: 100%;
        margin: 0;
    }
    label{
        margin-top: 3%;
    }
  }
        </style>
        <br><br><br>

 <?php
    include 'Model/conexion.php';
   $codigo= $_POST['id'];
if ($codigo=="") {
            echo'
          <script>
             alert("Debe de selecionar los productos");
               window.location ="form_almacen1.php"; 
                      </script>
                      ';

}

  if (isset($_POST['solicitar'])){ ?>
        <section >
 <form style="background: transparent;" method="POST" action="Controller/almacen.php">
    <div class="container-fluid" style="position: initial">
<div class="row">
      <div class="col-md-4" style="position: initial">
    
    
          <label id="inp1">Solicitud N°</b></label>   
          <?php 
                        $sql = "SELECT * FROM tb_almacen  ORDER BY codAlmacen DESC LIMIT 1";
                        $result = mysqli_query($conn, $sql);
                        $codAlmacen=1;
                        while ($productos = mysqli_fetch_array($result)){    

                            $codAlmacen=$productos['codAlmacen']+1;
                     }
                     ?>
                <input id="inp1"class="form-control" readonly type="number" name="nsolicitud" required value="<?php echo $codAlmacen ?>">
    </div>

    <div class="col-md-4" style="position: initial">
    <font color="black"><label>Departamento</label></font>   
    <input type="text"  class="form-control" name="depto" id="um" required style="background:transparent;" value="Mantenimiento" readonly>
                     </div>
  <div class="col-md-4" style="position: initial">
  <?php     $cliente =$_SESSION['signin'];
    $data =mysqli_query($conn, "SELECT * FROM tb_usuarios WHERE username = '$cliente'");
    while ($consulta =mysqli_fetch_array($data)) {
 ?>
    <font color="black"><label>Encargado</label> </font>
      <input style="cursor: not-allowed; color: black;"  class="form-control" type="text" name="usuario" id="como3" required readonly value="<?php  echo $consulta['firstname']?> <?php  echo $consulta['lastname']?>">
      <input style="cursor: not-allowed; color: black;"  class="form-control" type="hidden" name="idusuario" id="como4" required readonly value="<?php  echo $consulta['id']?>">
      <br>
      <?php }?>
    </div>
</div>
      <table class="table  table-striped"  style=" width: 100%">
            <thead>
              <tr id="tr">
               
                <th>Código</th>
                <th>Descripción</th>
                <th>U/M</th>
                <th>Productos Disponibles</th>
                <th>Cantidad</th>
                <th>Costo unitario</th>
               <th>Eliminar Fila</th>
               
              </tr>

          <!--  <td id="td" colspan="7"><h4>No se encontraron resultados 😥</h4></td>-->
              
            </thead>

            <tbody>
    <?php 
         for($i = 0; $i < count($_POST['id']); $i++){
 
    $codigo= $_POST['id'][$i];
    //    $sql = "SELECT * FROM tb_productos";
    $sql = "SELECT codProductos, categoria, catalogo, descripcion, unidad_medida, SUM(stock), precio, fecha_registro FROM tb_productos WHERE cod='$codigo' GROUP BY precio, codProductos";
    $result = mysqli_query($conn, $sql);

    while ($productos = mysqli_fetch_array($result)){

      $precio=$productos['precio'];
       $precio1=number_format($precio, 2,".",",");
       $cantidad=$productos['SUM(stock)'];

        $stock=number_format($cantidad, 2,".",",");
      ?>

       
               


<style type="text/css">

    #td{
        display: none;
    }
   th{
       width: 100%;
   }
</style>
    <tr>
               <td data-label="Codigo"><?php echo $productos['codProductos'] ?>
                <input  type="hidden" class="form-control" readonly name="cod[]" value ="<?php  echo $productos['codProductos']; ?>">
                <input  type="hidden" class="form-control" readonly name="cat[]" value ="<?php  echo $productos['catalogo']; ?>">
                <input  type="hidden" class="form-control" readonly name="cate[]" value ="<?php  echo $productos['categoria']; ?>"></td>
               <input type="hidden" name="desc[]" value="<?php  echo $productos['descripcion']; ?>">
               <input  type="hidden" name="um[]" value ="<?php  echo $productos['unidad_medida']; ?>">
                </td>
               <td data-label="Descripción"><?php echo $productos['descripcion'] ?></td>
               <td data-label="Unidad De Medida"><?php echo $productos['unidad_medida'] ?>
                <input type="hidden"  name="stock[]"  value ="<?php  echo $stock; ?>">
                <input  type="hidden" name="cu[]" value ="<?php  echo $precio ?>">
               </td>
               <td data-label="Productos Disponibles"><?php  echo $stock; ?></td>
               <td data-label="Cantidad"><input  style="background:transparent; border: solid 0.1px; width: 100%; color: gray;" type="number" step="0.01" class="form-control"  name="cant[]" required></td>
               <td data-label="Precio"><?php  echo $precio1 ?></td> 
               <td><input type="button" class="borrar btn btn-success my-1" value="Eliminar" /></td>   
            </tr>
<?php }} ?> 

            </tbody>
        </table>
           
          <center>  <div class="col-md-3" style="padding: 0;">
        <button id="buscar1" type="submit" name="form_compra2" class="btn  btn-success btn-lg my-2 text-center"  data-bs-toggle="tooltip" data-bs-placement="top" title="Solicitar">Guardar
                        <svg class="bi" width="20" height="20" fill="currentColor">
                        <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#save"/>
                        </svg>
        </button> 
</div></center> 
</form>
 </section>

    <?php } ?>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>


    <script>
    $(document).on('click', '.borrar', function (event) {
    event.preventDefault();
    $(this).closest('tr').remove();
});

</script>
</body>
</html>