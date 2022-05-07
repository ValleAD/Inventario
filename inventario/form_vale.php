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


<html lang="es">
<head>
    <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
 
    <link rel="icon" type="image/png" sizes="32x32"  href="img/log.png">  
    <title>Vale</title>
</head>
<body>

<section style="margin:2%;">
    <form id="form" method="post" style="width: auto;">
        <div class="container" style="background:white;border-radius:15px;">
            <div id="Registro" class="row container" style="position: all; margin-left: 1%;margin-right: 1%;margin-top: 1%"  >
                <div id="lo-que-vamos-a-copiar"  style="background:#bfe7ed;margin-left: 1%;margin-right: 1%;margin-top: 1%; border-radius: 10px;width: 70%;">
                    <div class="col-xs-4 "  style="background: #bfe7ed;margin-left: 1;margin-right: 1%;margin-top: 1%;border-radius: 5px;width: 100%;" >
                        <div class="well well-sm" style="position: all; margin: 1%">
                            <div style="position: all; margin: 1%;">
                                <label>Código del Producto</label> 
                                <input  class="form-control" required type="number" name="codigo[]"  style="width: 100%;" placeholder="Ingrese el código del Producto">
                            </div>   
                        </div>
                    </div>            
                </div>
                        <div class="col-xs-4">
                            <div class="well" style="position: all; margin:5%">
                                <button id="btn-agregar" class="btn btn-block btn-default bg-success" type="button" style="color: white;">Agregar Nueva Casilla</button>                
                            </div>
                        </div>
            </div>
                <hr/>
                    <div class="button21">
                        <input class="btn btn-lg" type="submit" value="Consultar" id="buscar">
                    </div>
        </div>
</form>
        <style>
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
        </style>
        </form>
     
<?php  
include 'Model/conexion.php';
if(isset($_POST['codigo'])){?>
<br>
    <section style="background:white;margin: 0%;padding: 1%;border-radius: 15px;">


 <form style="margin: 0%;position: 0; background: transparent;" method="POST" action="Controller/añadir_vale.php">
<p class="text-center bg-danger" style="color:white;border-radius: 5px;font-size: 1.5em;padding: 3%;">No se Encontró la información que busca, intentelo de nuevo</p>

    <?php
  for($i = 0; $i < count($_POST['codigo']); $i++){
     $codigo = $_POST['codigo'][$i];
    //    $sql = "SELECT * FROM tb_productos";
    $sql = "SELECT codProductos, categoria, catalogo, descripcion, unidad_medida, SUM(stock), precio, fecha_registro FROM tb_productos WHERE codProductos='$codigo' GROUP BY precio, codProductos";
    $result = mysqli_query($conn, $sql);

    while ($productos = mysqli_fetch_array($result)){

      $precio=$productos['precio'];
       $precio1=number_format($precio, 2,".",",");
       $cantidad=$productos['SUM(stock)'];

        $stock=number_format($cantidad, 2,".",",");
      ?>
             <style>
        p{

            display: none;
       }
   </style>
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

                        while ($productos = mysqli_fetch_array($result)){ ?>

                        <option><?php echo $productos['departamento']?></option>
                         
                     <?php }


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
            </div>
            <div class="col-.5 col-sm-4" style="position: initial">
                <label id="inp1">Nombre de la persona</label>
                <?php     $cliente =$_SESSION['signin'];
    $data =mysqli_query($conn, "SELECT * FROM tb_usuarios WHERE username = '$cliente'");
    while ($consulta =mysqli_fetch_array($data)) {
 ?>
    <font color="black"><label>Encargado</label> </font>
      <input style="cursor: not-allowed; color: black;"  class="form-control" type="text" name="usuario" id="como3" required readonly value="<?php  echo $consulta['firstname']?> <?php  echo $consulta['lastname']?>">
      <input style="cursor: not-allowed; color: black;"  class="form-control" type="hidden" name="idusuario" id="como4" required readonly value="<?php  echo $consulta['id']?>">
      <br>
      <?php }?> 
               
            </select>
                </label>   
            </div>
        </div>
    </div>
      <table class="table table-responsive table-striped"  style=" width: 100%">
            <thead>
              <tr id="tr">
               
                <th style="width: 10%;">Código</th>
                <th style="width: 50%;">Descripción</th>
                <th style="width: 10%;">U/M</th>
                <th style="width: 15%;">Productos Disponibles</th>
                <th style="width: 50%;">Cantidad</th>
                <th style="width: 15%;">Costo unitario</th>
               <th>Eliminar Fila</th>
               
              </tr>

            <td id="td" colspan="7"><h4>No se encontraron resultados 😥</h4></td>
              
            </thead>

            <tbody>

 

       <?php
  for($i = 0; $i < count($_POST['codigo']); $i++){
     $codigo = $_POST['codigo'][$i];
    //    $sql = "SELECT * FROM tb_productos";
    $sql = "SELECT codProductos, categoria, catalogo, descripcion, unidad_medida, SUM(stock), precio, fecha_registro FROM tb_productos WHERE codProductos='$codigo' GROUP BY precio, codProductos";
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
               <td data-label="Cantidad"><input  style="background:transparent; border: solid 0.1px; width: 100%; color: gray;" type="number" step="0.01" class="form-control"  name="cant[]" required></td>
               <td data-label="Precio"><?php  echo $precio1 ?></td> 
               <td><input type="button" class="borrar btn btn-success my-1" value="Eliminar" /></td>   
            </tr>

<?php } ?>
            </tbody>
        </table>

            <div class="form-floating mb-3 my-2" >
                <label>Observaciones (En qué se ocupará el bien entregado)</label>
              <textarea rows="7" class="form-control" name="jus"  placeholder="Observaciones (En qué se ocupará el bien entregado)" required id="floatingTextarea"></textarea>
            </div>
        <center><button type="submit" name="form_vale" class="btn btn-success btn-lg my-2 text-center w-25"  data-bs-toggle="tooltip" data-bs-placement="top" title="Solicitar">Guardar
                        <svg class="bi" width="20" height="20" fill="currentColor">
                        <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#save"/>
                        </svg>
        </button> </center>   
</form>
 </section>
<?php }}}} ?>
</section>
        <style>
            #enviar{
                margin-top: 2%;
                margin-bottom: 5%;
            margin-left: 1.5%; 
            background: rgb(5, 65, 114); 
            color: #fff; margin-bottom: 2%; 
            border: rgb(5, 65, 114);
            }
            #enviar:hover{
            background: rgb(9, 100, 175);
            } 
            #enviar:active{
            transform: translateY(5px);
            } 
        </style>

   
    <script>
    $(document).ready(function(){
        
        // El formulario que queremos replicar
        var formulario_registro = $("#lo-que-vamos-a-copiar").html();
        
// El encargado de agregar más formularios
$("#btn-agregar").click(function(){
    // Agregamos el formulario
    $("#Registro").prepend(formulario_registro);

    // Agregamos un boton para retirar el formulario
    $("#Registro .col-xs-4:first .well").append('<button class="btn-danger btn btn-block btn-retirar-registro my-1" type="button">Retirar</button>');

    // Hacemos focus en el primer input del formulario
    $("#Registro .col-xs-4:first .well input:first").focus();

    // Volvemos a cargar todo los plugins que teníamos, dentro de esta función esta el del datepicker assets/js/ini.js
    Plugins();
});
        
        // Cuando hacemos click en el boton de retirar
        $("#Registro").on('click', '.btn-retirar-registro', function(){
            $(this).closest('.col-xs-4').remove();
        })
            
        $("#frm-registro").submit(function(){
            return $(this).validate();
        });
    })
</script>
<script>
    $(document).on('click', '.borrar', function (event) {
    event.preventDefault();
    $(this).closest('tr').remove();
});

</script>

</body>
</html>