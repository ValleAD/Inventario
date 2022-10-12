<?php
session_start();
 if (!isset($_SESSION['signin'])>0) {
    # code...
    echo '
    <script>
        window.location ="../../log/signin.php";
        session_destroy();  
                </script>
die();

    ';
}
?>
<?php include ('../../templates/menu1.php')?>
<!DOCTYPE html>


<html lang="es">
<head>
    <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
 
    <link rel="icon" type="image/png" sizes="32x32"  href="img/log.png">  
    <title>Vale</title>
</head>
<body>

        <style>  
         section{
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
            .a{
                width: 25%;
            }
            @media (max-width: 952px){

    #form{
        margin: -5%,3%;
        padding: 2%;
    }
    th{
        width: 25%;
    }
    #p{
        margin-top: 5%;
        margin-left: 7%;
    }#buscar{
        width: 100%;
        margin: auto;
    }#buscar1{
        width: 100%;
        margin: auto;
    }
    #lo-que-vamos-a-copiar{
        width: 120px;
    }
    #btn-agregar{
        width: 100%;
        margin-top: -7%;
        margin-left: 10%;
    }
  }
        </style>
        <br><br><br>
<section id="form" style="background:white;border-radius:15px;">
    <form method="post" style="width: 100%;">
            <div id="Registro" class="row" style="margin: 1%;">
                <div id="lo-que-vamos-a-copiar"  style="background:#bfe7ed;margin-right: 1%;margin-top: 1%; border-radius: 5px;width: 82%;">
                    <div id="lo-que-vamos-a-copiar"  class="col-xs-4 "  style="background: #bfe7ed;margin-right: 1%;margin-top: 1%; width: 82%;border-radius: 5px;" style=" margin: 1%;border-radius: 15px;">
                        <div class="well well-sm" style="margin: 1%;padding-bottom: 2%;">
                            
                                <label>Código del Producto</label> 
                                <input  class="form-control" required type="number" name="codigo[]"  style="width: 100%;" placeholder="Ingrese el código del Producto">
                            
                        </div>
                    </div>            
                </div>
                        <div class="col-xs-4">
                            <div class="well my-4" style="position: all;">
                                <button id="btn-agregar" class="btn bg-success" type="button" style="color: white;">Agregar Nueva Casilla</button>                
                            </div>
                        </div>
            </div>
                <hr/>
                    <div class="button21">
                        <input class="btn btn-lg" type="submit" value="Consultar" id="buscar">
                    </div>
</form>
</section>
     
<?php  
include 'Model/conexion.php';
if(isset($_POST['codigo'])){?>
<br>
    <section style="background:white;padding: 1%;border-radius: 15px;">


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
              <div class="col-md-4" style="position: initial">
                <label id="inp1">Departamento que solicita</b></label>   
               <div id="div" style = " max-height: 75px;width: 100%; overflow-y:scroll;"> 
                
                   <?php  
   $sql = "SELECT * FROM selects_departamento";
    $result = mysqli_query($conn, $sql);
    while ($productos = mysqli_fetch_array($result)){ ?>  
                             <input required  id="<?php echo $productos['id'] ?>" type="radio" name="depto" value="<?php echo $productos['departamento'] ?>"> <label style="width: 100%;" id="label1" for="<?php echo $productos['id'] ?>" > <?php echo $productos['departamento'] ?></label><br>
 <?php }?>
                         </div>
                     
 
          
                </div>

            <div class="col-md-4" style="position: initial">
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
            <div class="col-md-4" style="position: initial">
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
    <br>
      <table class="table  table-striped"  style=" width: 100%">
            <thead>
              <tr id="tr">
                <th>Código</th>
                <th >Descripción</th>
                <th>U/M</th>
                <th >Productos Disponibles</th>
                <th>Cantidad</th>
                <th>Costo unitario</th>
               <th >Eliminar Fila</th>
               
              </tr>

          <!--  <td id="td" colspan="7"><h4>No se encontraron resultados 😥</h4></td>-->
              
            </thead>

            <tbody>

    <?php 
         for($i = 0; $i < count($_POST['codigo']); $i++){
 
    $codigo= $_POST['codigo'][$i];
    
    
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
               <td style="min-width: 100%;" data-label="Descripción"><?php echo $productos['descripcion'] ?></td>
               <td data-label="Unidad De Medida"><?php echo $productos['unidad_medida'] ?>
                <input type="hidden"  name="stock[]"  value ="<?php  echo $stock; ?>">
                <input  type="hidden" name="cu[]" value ="<?php  echo $precio ?>">
               </td>
               <td data-label="Productos Disponibles"><?php  echo $stock; ?></td>
               <td data-label="Cantidad"><input  style="background:transparent; border: solid 0.1px; width: 100%; color: gray;" type="number" step="0.01" min="0.00" max="<?php echo $stock ?>"  class="form-control"  name="cant[]" required></td>
               <td data-label="Precio"><?php  echo $precio1 ?></td> 
               <td><input type="button" class="borrar btn btn-success my-1" value="Eliminar" /></td>   
            </tr>
<?php }} ?> 

            </tbody>
        </table>

            <div class="form-floating mb-3 my-2" >
                <label>Observaciones (En qué se ocupará el bien entregado)</label>
              <textarea rows="7" class="form-control" name="jus"  placeholder="Observaciones (En qué se ocupará el bien entregado)" required id="floatingTextarea"></textarea>
            </div>
        <center><button id="buscar1" type="submit" name="form_vale" class="btn a btn-success btn-lg my-2 text-center"  data-bs-toggle="tooltip" data-bs-placement="top" title="Solicitar">Guardar
                        <svg class="bi" width="20" height="20" fill="currentColor">
                        <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#save"/>
                        </svg>
        </button> </center>   
</form>
 </section>
<?php }}} ?>
</section>

   
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