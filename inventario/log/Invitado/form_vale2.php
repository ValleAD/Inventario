<?php require '../../Model/conexion.php';
include ('menu.php');
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
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
                                  <?php 
                        $sql = "SELECT * FROM tb_vale  ORDER BY codVale DESC LIMIT 1";
                        $result = mysqli_query($conn, $sql);
                            $cod_vale=1;
                        while ($productos = mysqli_fetch_array($result)){    
                            $cod_vale=$productos['codVale']+1;
                     }
                     ?>
                <input id="inp1"class="form-control" readonly type="number" name="numero_vale" required value="<?php echo $cod_vale ?>">
            </div><div class="col-.5 col-sm-4" style="position: initial">
      <label id="inp1">Nombre de la persona</label>
            <input pattern="[A-Za-z]{1,}" class="form-control" type="" name="usuario" required="" type="text"?>
            <input style="cursor: not-allowed; color: black;"  class="form-control" type="hidden" name="idusuario" id="como4" required readonly value="0"> 
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
     <td data-label="Codigo"><?php echo $productos['codProductos'] ?>
                <input  type="hidden" class="form-control" readonly name="cod[]" value ="<?php  echo $productos['codProductos']; ?>"></td>
               <input type="hidden" name="desc[]" value="<?php  echo $productos['descripcion']; ?>">
               <input  type="hidden" name="um[]" value ="<?php  echo $productos['unidad_medida']; ?>">
                </td>
               <td data-label="Descripción"><?php echo $productos['descripcion'] ?>
               <td data-label="Unidad De Medida"><?php echo $productos['unidad_medida'] ?>
                <input type="hidden"  name="stock[]"  value ="<?php  echo $stock; ?>">
                <input  type="hidden" name="cu[]" value ="<?php  echo $precio ?>">
               </td>
               <td data-label="Productos Disponibles"><?php  echo $stock; ?></td>
               <td data-label="Cantidad"><input  style="background:transparent; border: solid 0.1px; width: 100%; color: gray;" type="decimal" class="form-control"  name="cant[]" required></td>
               <td data-label="Precio"><?php  echo $precio1?></td> 
               <td><input type="button" class="borrar btn btn-success my-1" value="Eliminar" /></td>   
            </tr>
<?php }} ?> 

            </tbody>
        </table>
         <center> <button type="submit" name="solicitar" class="btn btn-success btn-lg  text-center w-25"  data-bs-toggle="tooltip" data-bs-placement="top" title="Solicitar">Guardar</button></center>    
</form>
 </section>

    <?php } ?>
   
    <script>
    $(document).on('click', '.borrar', function (event) {
    event.preventDefault();
    $(this).closest('tr').remove();
});

</script>
</body>
</html>