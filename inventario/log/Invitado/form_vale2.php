<?php require '../../Model/conexion.php';
include ('menu.php');
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
         <link rel="stylesheet" type="text/css" href="../../styles/estilo_men.css">
      <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="../../Plugin/bootstrap/css/bootstrap.css">

    <!--  Datatables  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>  
    
    <!-- searchPanes -->
    <link rel="stylesheet" href="https://cdn.datatables.net/searchpanes/1.0.1/css/searchPanes.dataTables.min.css">
    <!-- select -->
    <link href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous"> 
         <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
     <style>
    table thead{
    background: linear-gradient(to right, #4A00E0, #8E2DE2); 
    color:white;
    }
    </style>
      <link rel="icon" type="image/png" sizes="32x32"  href="../../../img/log.png"> 
    <title>Productos</title>
</head>

<body style="background-image: url(../../../img/4k.jpg);  
            background-repeat: no-repeat;
            background-attachment: fixed;">
                <style type="text/css">
        #a:hover{
   text-decoration: none;
   color: lawngreen;
}
 #b:hover{
   text-decoration: none;
   color:whitesmoke;
}
.children{
background:burlywood;
}
 </style>

    <font color="white"><h2 class="text-center" >Solicutud Vale</h2></font>

	<section style="background:white;margin: 2%;color: black; padding: 1%;border-radius: 15px;">
 <form style="margin: 0%;position: 0; background: transparent;" method="POST" action="Controller/añadir_vale.php">
    <div class="container-fluid" style="position: initial">
            <div class="row">
              <div class="col-6.5 col-sm-4" style="position: initial">
                <label id="inp1">Departamento que solicita</b></label>   
                <select  class="form-control" name="depto" id="depto" required>
                        <option selected disabled value="">Selecione</option>
                      ';?>
                      <?php 
                        $sql = "SELECT * FROM selects_departamento";
                        $result = mysqli_query($conn, $sql);

                        while ($productos = mysqli_fetch_array($result)){ 

                          echo'  <option>'.$productos['departamento'].'</option>
                      ';   
                     }


                         ?>
                      </select>
                  </div>
            <div class="col-.5 col-sm-4" style="position: initial">
                <label id="inp1">Vale N°</b></label>   
                <input id="inp1"class="form-control" type="number" name="numero_vale" required>
            </div><div class="col-.5 col-sm-4" style="position: initial">
      <label id="inp1">Nombre de la persona</label>
            <input class="form-control" type="" name="usuario" required="" type="text"?>
            <input style="cursor: not-allowed; color: black;"  class="form-control" type="hidden" name="idusuario" id="como4" required readonly value="20"> 
            </div>
        </div>
        <br>
<table class="table table-responsive table-striped" id="example" style=" width: 100%">
<thead>
<tr id="tr" style="text-align: left;">
    <th style="width: 10%;">Código</th>
    <th style="width: 20%;">Descripción</th>
    <th style="width: 10%;">U/M</th>
    <th style="width: 15%;">Productos Disponibles</th>
    <th style="width: 15%;">Cantidad</th>
    <th style="width: 15%;">Costo unitario</th>
    <th>Eliminar fila</th>
               
              </tr>

              
            </thead>

            <tbody>

 <?php
  if (isset($_POST['solicitar'])){ 

         for($i = 0; $i < count($_POST['id']); $i++)

    {
 
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
    <tr id="tr">
      <td data-label="Codigo"><input style="background:transparent; border: none; width: 100%; color: black;"  type="number" class="form-control" readonly name="cod[]" value ="<?php  echo $productos['codProductos']; ?>"></td>
               
               <td data-label="Descripción"><textarea  style="background:transparent; border: none; width: 100%; color: black;" cols="10" rows="1" type="text" class="form-control" readonly name="desc[]"><?php  echo $productos['descripcion']; ?></textarea></td>
               <td data-label="Unidad De Medida"><input  style="background:transparent; border: none; width: 100%; color: black;" type="text" class="form-control" readonly name="um[]" value ="<?php  echo $productos['unidad_medida']; ?>"></td>
               <td data-label="Productos Disponibles"><input  style="background:transparent; border: none; width: 100%; color: gray;" type="decimal" class="form-control" readonly  name="stock[]"  value ="<?php  echo $stock; ?>"></td>
               <td data-label="Cantidad"><input  style="background:transparent; border: solid 0.1px; width: 100%; color: gray;" type="decimal" class="form-control" step="0.1"  name="cant[]" required></td>
               <td data-label="Precio" ><input style="background:transparent; border: none; width: 100%; color: black; text-align: center;"  type="text" class="form-control" readonly name="cu[]" value ="<?php  echo $precio1 ?>"></td>  
               <td><input type="button" class="borrar btn btn-success" value="Eliminar" /></td>   
      
     </tr>
<?php }} ?> 

            </tbody>
        </table>
         <center> <button type="submit" name="solicitar" class="btn btn-success btn-lg  text-center w-25"  data-bs-toggle="tooltip" data-bs-placement="top" title="Solicitar">Guardar</button></center>    
</form>
 </section>

    <?php } ?>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.js"></script>
    <script>
    $(document).ready(function(){
        $('#example').DataTable({
            dom:'ltirp',
            language: {
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "sProcessing":"Procesando...", 
            }
        });

    });
    </script>
    <script>
    $(document).on('click', '.borrar', function (event) {
    event.preventDefault();
    $(this).closest('tr').remove();
});

</script>
</body>
</html>