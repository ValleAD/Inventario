
<?php include ('menu.php')?>
<!DOCTYPE html>
<!--Es para la version de mobile-->
<style type="text/css">
    @media (min-width: 1080px){
         #section{
        margin-top: 5%;
        margin-left: 15%;
        width: 70%;

       }

    }

      @media (max-width: 952px){
    #section{
        margin-top: 5%;
        margin-left: 12%;
        width: 75%;
       }
    #lab{
        margin-left: 5%;

    }
    .w{
        margin-top: 5%;
    }
    #inp{
            margin-left: 10%;
    }  #inp1{
         margin-top: 2%;
          margin-left: 5%;
    }  #buscar{
         margin-top: 2%;
          margin-left: 25%;
          margin-bottom: 25%;
    }
    #btn{
        margin-top: 5%;
        margin-left: 35%;
        margin-bottom: 15%;
    }
    #buscar{
        margin-top: 5%;
        margin-left: 35%;
        margin-bottom: 15%;
        background: whitesmoke;
    }

      }
</style>

<html lang="es">
<head>
    <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
     <link rel="stylesheet" type="text/css" href="../../styles/estilo.css"> 
     <link rel="stylesheet" type="text/css" href="../../styles/estilos_tablas.css"> 
          <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!--  Datatables  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>  
    
    <!-- searchPanes -->
    <link rel="stylesheet" href="https://cdn.datatables.net/searchpanes/1.0.1/css/searchPanes.dataTables.min.css">
    <!-- select -->
    <link href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous"> 
    <link rel="icon" type="image/png" sizes="32x32"  href="img/log.png">  
    <title>Vale</title>
</head>
<body>

<section class=""  style="margin:2%;">

            <form id="form" action="" method="post"  >
           


 
       <div id="Registro" class="row container" style="position: all; margin-left: 1%;margin-right: 1%;margin-top: 1%"  >

   <div id="lo-que-vamos-a-copiar"  style="background:#bfe7ed;margin-left: 1%;margin-right: 1%;margin-top: 1%; border-radius: 5px;width: 70%;">
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
include '../../Model/conexion.php';
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
                <input id="inp1"class="form-control" type="number" name="numero_vale" required>
            </div>
            <div class="col-.5 col-sm-4" style="position: initial">
                <label id="inp1">Nombre de la persona</label>
            
           <input class="form-control" type="text" name="usuario" id="como3" required  value="">
      <input style="cursor: not-allowed; color: black;"  class="form-control" type="hidden" name="idusuario" id="como4" required readonly value="0">
      <br>
               
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
               <th>Eliminar fila</th>
               
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
               <td data-label="Cantidad"><input  style="background:transparent; border: solid 0.1px; width: 100%; color: gray;" type="decimal" class="form-control"  name="cant[]" required></td>
               <td data-label="Precio"><?php  echo $precio1 ?></td> 
               <td><input type="button" class="borrar btn btn-success my-1" value="Eliminar" /></td>   
            </tr>


            </tbody>
        </table>
        <!-- <div class="form-group" style="position: all;">
                <label>Observaciones (En qué se ocupará el bien entregado)</label>
               <textarea rows="7"  class="form-control" name="jus"  required> </textarea><br>
            </div> -->
        <center><button type="submit" name="form_vale" class="btn btn-success btn-lg my-2 text-center w-25"  data-bs-toggle="tooltip" data-bs-placement="top" title="Solicitar">Guardar</button> </center>   
</form>
 </section>
<?php }}}}} ?>
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

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
   
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