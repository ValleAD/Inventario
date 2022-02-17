
<?php
session_start();
 if (!isset($_SESSION['signin'])>0) {
    # code...
    echo '
    <script>
        window.location ="../log/signin.php";
        session_destroy();  
                </script>
die();

    ';
}
?><?php include ('templates/menu.php') ?>
<?php include ('Model/conexion.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle_Compra</title>
   
      <link rel="stylesheet" type="text/css" href="styles/estilos_tablas.css"> 
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!--  Datatables  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>  
    <!-- select -->
    <link href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css">
    <style>
    table thead{
    background: linear-gradient(to right, #4A00E0, #8E2DE2); 
    color:white;
    }
    </style>
</head>
<body>
<?php
if(isset($_POST['submit'])){
$total = 0;
$final = 0;
$a=$_POST['sol_compra'];

   include 'Model/conexion.php';
    $sql = "SELECT * FROM tb_compra WHERE  nSolicitud='$a' ORDER BY fecha_registro DESC LIMIT 1";
    $result = mysqli_query($conn, $sql);
 while ($datos = mysqli_fetch_array($result)){

  echo'   
  <section id="section">
  <form method="POST"  action="Plugin/pdf_compra.php" target="_blank" style="background-color:white;padding:1%">
           
        
          <div class="row">
        
            <div class="col-6 col-sm-3" style="position: initial">
        
                <label style="font-weight: bold;">Solicitud No.</label>
                <input readonly class="form-control"  type="text" value="' .$datos['nSolicitud']. '" name="sol_compra">
  
            </div>
  
            <div class="col-6 col-sm-3" style="position: initial">
              <label style="font-weight: bold;">Dependencia Solicitante</label>
              <input readonly class="form-control"  type="text" value="' .$datos['dependencia']. '" name="dependencia">
            </div>
  
          <div class="col-6 col-sm-3" style="position: initial">
              <label style="font-weight: bold;">Plazo y No. de Entregas</label>
              <input readonly class="form-control"  type="text" value="' .$datos['plazo']. '" name="plazo">
          </div>
  
          <div class="col-6 col-sm-3" style="position: initial">
              <label style="font-weight: bold;">Unidad Técnica</label>
              <input readonly class="form-control"  type="text" value="' .$datos['unidad_tecnica']. '" name="unidad">
          </div>
  
          <div class="col-6 col-sm-3" style="position: initial">
              <label style="font-weight: bold;">Suministro Solicitado</label>
              <input readonly class="form-control"  type="text" value="' .$datos['descripcion_solicitud']. '" name="suministro">
          </div>

          <div class="col-6 col-sm-3" style="position: initial">
              <label style="font-weight: bold;">Encargado</label>
              <input readonly class="form-control"  type="text" value="' .$datos['usuario']. '" name="usuario">
          </div>
  
            <div class="col-6 col-sm-3" style="position: initial">
              <label style="font-weight: bold;">Fecha</label>
                <input readonly class="form-control"  type="text" value="'.date("d-m-Y",strtotime($datos['fecha_registro'])). '" name="fech">
            </div>
            <div class="col-6 col-sm-3" style="position: initial">
              <label style="font-weight: bold;">Estado</label>
              <input readonly class="form-control"  type="hidden" value="' .$datos['nSolicitud']. '" name="id"> 
                <select  class="form-control"  type="text"  name="estado" required>
                <option disabled selected>Selecione</option>
                <option>Aprobado</option>
                <option>Rechazado</option>
                </select>
            </div>
          </div>
        
          <br>
            
<table class="table table-responsive  table-striped" id="example" style=" width: 100% ">
              
              <thead>
                <tr id="tr">
                  <th style="width: 20%;">Categoría</th>
                  <th style="width: 20%;">Código</th>
                  <th style="width: 15%;">Cod. Catálogo</th>
                  <th style="width:50%;">Descripción Completa</th>
                  <th style="width:5%;">U/M</th>
                  <th style="width: 100%;">Cantidad Solicitada</th>
                  <th style="width: 100%;">Cantidad Despachada</th>
                  <th style="width: 100%;">Costo Unitario (estimado)Actual</th>
                  <th style="width: 100%;">Nuevo Costo Unitario (estimado)</th>
                  <th style="width: 100%;">Monto Total (estimado)
                  
                
             </thead>
              <tbody>';
  
  $cod_compra = $datos['nSolicitud'];
  }
   $sql = "SELECT * FROM detalle_compra WHERE solicitud_compra = $cod_compra";
      $result = mysqli_query($conn, $sql);
  while ($productos = mysqli_fetch_array($result)){
        
        $total = $productos['stock'] * $productos['precio'];
        $final += $total;?>
  
      <style type="text/css">
       #td{
          display: none;
      }
      
     
  </style> 
        <tr>
      <td  data-label="Categoría"><input style="background:transparent; border: none; width: 100%;"  name="cat[]" readonly value="<?php echo $productos['categoria']?>"></td>
        <td  data-label="Código"><input style="background:transparent; border: none; width: 100%;"  name="cod[]" readonly value="<?php echo $productos['codigo']?>"></td>
        <td  data-label="Cod. Catálogo"><input style="background:transparent; border: none; width: 100%;"  name="catalogo[]" readonly value="<?php echo $productos['catalogo']?>"></td>
        <td  data-label="Descripción"><textarea style="background:transparent; border: none; width: 100%;"  name="desc[]" readonly style="border: none"><?php echo $productos['descripcion']?></textarea></td>
        <td  data-label="Unidada de Medida"><input  style="background:transparent; border: none; width: 100%;" name="um[]" readonly value="<?php echo $productos['unidad_medida']?>"></td>
        <td  data-label="Cantidad"><input style="background:transparent; border: none; width: 100%;"  name="cant[]" readonly value="<?php echo $productos['stock']?>"></td>
        <td  data-label="Cantidad"><input style="background:transparent; border: 1 solid #000;  width: 100%;" class="form-control" type="number" required  name="cant_aprobada[]" required value=""></td>
          <td  data-label="Costo unitario"><input style="background:transparent; border: none; width: 100%;"  type="text" step="0.01"  required readonly  value="$<?php echo $productos['precio']?>"></td>

          <td  data-label="Costo unitario"><input class="form-control" type="number" style="background:transparent;border: 1 solid #000; width: 100%;" required step="0.01" name="cost[]"></td>
          
          <td  data-label="total"><input style="background:transparent; border: none; width: 100%;"  name="tot[]" readonly value="$<?php echo $total?>"></td>
      
        <?php }?>
         <tfoot style="text-align:right;">
            <th >SubTotal</th>
            <th colspan="8"></th>
            <td data-label="Subtotal"><input style="background:transparent; border: none; width: 100%; color: red; font-weight: bold;"  name="tot_f" readonly value="$<?php echo $final?>" ></td></tr>
        </tfoot>

        </tr>
             </tbody>
          </table>
          
  

      <input id="pdf" type="submit" class="btn btn-success btn-lg" value="Guardar Estado" name="detalle_compra">
    <?php } ?>   
  </form>
  </section>




<br>
    <style>
        #ver{
            margin-top: 2%;
            margin-right: 1%; 
            background: rgb(5, 65, 114); 
            color: #fff; 
            margin-bottom: 0.5%;  
            border: rgb(5, 65, 114);
        }
        #ver:hover{
            background: rgb(9, 100, 175);
        } 
        #ver:active{
        transform: translateY(5px);
        } 
    </style>
</table>
</div>
      <?php 
       if(isset($_POST['detalle'])){


$total = 0;
$final = 0;

$cod_compra = $_POST['id'];

   include 'Model/conexion.php';
    $sql = "SELECT * FROM tb_compra WHERE nSolicitud = $cod_compra";
    $result = mysqli_query($conn, $sql);
 while ($productos1 = mysqli_fetch_array($result)){ ?>
    <div class="mx-5 p-2 r-5" style="background-color: white; border-radius: 5px;">
        <div class="row">
            <div class="col">
     <form id="form" method="POST" action="Detalle_Compra.php" target="_blank">
        <div class="row">
          <div class="col-6 col-sm-3" style="position: initial">
      
              <label style="font-weight: bold;">Solicitud No.</label>
              <input readonly class="form-control" type="text" value="<?php echo $productos1['nSolicitud'] ?>" name="sol_compra">

          </div>

          <div class="col-6 col-sm-3" style="position: initial">
            <label style="font-weight: bold;">Dependencia Solicitante</label>
            <input readonly class="form-control"  type="text" value="<?php echo $productos1['dependencia'] ?>" name="dependencia">
          </div>

        <div class="col-6 col-sm-3" style="position: initial">
            <label style="font-weight: bold;">Plazo y No. de Entregas</label>
            <input readonly class="form-control"  type="text" value="<?php echo $productos1['plazo'] ?>" name="plazo">
        </div>

        <div class="col-6 col-sm-3" style="position: initial">
            <label style="font-weight: bold;">Unidad Técnica</label>
            <input readonly class="form-control"  type="text" value="<?php echo $productos1['unidad_tecnica'] ?>" name="unidad">
        </div>

        <div class="col-6 col-sm-3" style="position: initial">
            <label style="font-weight: bold;">Suministro Solicitado</label>
            <input readonly class="form-control"  type="text" value="<?php echo $productos1['descripcion_solicitud'] ?>" name="suministro">
        </div>

        <div class="col-6 col-sm-3" style="position: initial">
          <label style="font-weight: bold;">Encargado</label>
          <input readonly class="form-control"  type="text" value="<?php echo $productos1['usuario'] ?>" name="usuario">
        </div>

          <div class="col-6 col-sm-3" style="position: initial">
            <label style="font-weight: bold;">Fecha</label>
              <input readonly class="form-control"  type="text" value="<?php echo date("d-m-Y",strtotime($productos1['fecha_registro'])) ?>" name="fech">
          </div>
          <div class="col-6 col-sm-3" style="position: initial">
              <label style="font-weight: bold;">Estado</label>
              <br>
              <input <?php
                if($productos1['estado']=='Pendiente') {
                    echo ' style="background-color:green ;width:100%; border-radius:5px;text-align:center; color: white;"';
                }else if($productos1['estado']=='Aprobado') {
                     echo ' style="background-color:blueviolet ;width:100%; border-radius:5px;text-align:center; color: white;"';
                }else if($productos1['estado']=='Rechazado') {
                     echo ' style="background-color:red ;width:100%; border-radius:5px;text-align:center; color: white;"';
                }
            ?> class="form-control" type="text" name="" value="<?php echo $productos1['estado'] ?>"><br>
              <input readonly class="form-control" type="hidden" value="<?php echo $productos1['nSolicitud'] ?>" name="sol_compra">
                <button type="submit" name="submit" <?php
                if($productos1['estado']=='Aprobado') {
                     echo ' style="display:none"';
                }else if($productos1['estado']=='Rechazado') {
                     echo ' style="display:none"';
                }
            ?> style="float: right;margin-bottom:5%" class="btn btn-danger" href="dt_compra_copy.php"> Cambiar estado</button>
            </div>
        </div>
       </form>
         <form method="POST" action="Exportar_PDF/pdf_compra.php" target="_blank"> 

            <input readonly class="form-control"  type="hidden" value="<?php echo $productos1['nSolicitud'] ?>" name="sol_compra">
            <input readonly class="form-control"  type="hidden" value="<?php echo $productos1['dependencia'] ?>" name="dependencia">
            <input readonly class="form-control"  type="hidden" value="<?php echo $productos1['plazo'] ?>" name="plazo">
            <input readonly class="form-control"  type="hidden" value="<?php echo $productos1['unidad_tecnica'] ?>" name="unidad">
            <input readonly class="form-control"  type="hidden" value="<?php echo $productos1['descripcion_solicitud'] ?>" name="suministro">
            <input readonly class="form-control"  type="hidden" value="<?php echo $productos1['usuario'] ?>" name="usuario">
            <input readonly class="form-control"  type="hidden" value="<?php echo date("d-m-Y",strtotime($productos1['fecha_registro'])) ?>" name="fech">
          
<table class="table table-responsive  table-striped" id="example" style=" width: 100% ">
                <thead>
                     <tr id="tr">
                     <th style=" width: 20%">Categoria</th>
                     <th style=" width: 20%">Código</th>
                     <th style=" width: 20%">Cod. de Catálogo</th>
                     <th style=" width: 100%">Descripción Completa</th>
                     <th style=" width: 100%">U/M</th>
                     <th style=" width: 100%">Cantidad</th>
                     <th style=" width: 100%">Costo Unitario (estimado)</th>
                     <th style=" width: 100%">Monto Total (estimado)</th>
                     
                   </tr>
                </thead>
                <tbody>

<?php
  $cod_compra = $productos1['nSolicitud'];
}
 $sql = "SELECT * FROM detalle_compra WHERE solicitud_compra = $cod_compra";
    $result = mysqli_query($conn, $sql);
while ($productos = mysqli_fetch_array($result)){
      
      $total = $productos['stock'] * $productos['precio'];
      $final += $total;
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
        <td  data-label="Categoría"><input style="background:transparent; border: none; width: 100%;"  name="categoria[]" readonly value="<?php echo $productos['categoria']?>"></td>
        <td  data-label="Código"><input style="background:transparent; border: none; width: 100%;"  name="cod[]" readonly value="<?php echo $productos['codigo']?>"></td>
        <td  data-label="Cod. Catálogo"><input style="background:transparent; border: none; width: 100%;"  name="catalogo[]" readonly value="<?php echo $productos['catalogo']?>"></td>
        <td  data-label="Descripción"><textarea style="background:transparent; border: none; width: 100%;"  name="desc[]" readonly style="border: none"><?php echo $productos['descripcion']?></textarea></td>
        <td  data-label="Unidada de Medida"><input  style="background:transparent; border: none; width: 100%;" name="um[]" readonly value="<?php echo $productos['unidad_medida']?>"></td>
        <td  data-label="Cantidad"><input style="background:transparent; border: none; width: 100%;"  name="cant[]" readonly value="<?php echo $productos['stock']?>"></td>
        <td  data-label="Costo unitario"><input style="background:transparent; border: none; width: 100%;"  name="cost[]" readonly value="$<?php echo $productos['precio']?>"></td>
        <td  data-label="total"><input style="background:transparent; border: none; width: 100%;"  name="tot[]" readonly value="$<?php echo $total?>"></td>
      
        <?php } ?>
         <tfoot>
            <th colspan="7">SubTotal</th>
            <td data-label="Subtotal"><input style="background:transparent; border: none; width: 100%; color: red; font-weight: bold;"  name="tot_f" readonly value="$<?php echo $final?>" ></td></tr>
        </tfoot>

    
         </tbody>
        </table>
   
    <input id="pdf" type="submit" class="btn btn-lg" value="Exportar a PDF" name="">
     <?php } ?>  
          <style>
        #pdf{
        margin-top:2%;
        margin-left: 38%; 
        background: rgb(175, 0, 0); 
        color: #fff; margin-bottom: 2%; 
        border: rgb(0, 0, 0);
        }
        #pdf:hover{
        background: rgb(128, 4, 4);
        } 
        #pdf:active{
        transform: translateY(5px);
        }  form{
            border-radius: 0px;
            margin:0% 2%;
            border-radius:0px 0px 10px 10px
        }  #form{
            border-radius: 0px;
            margin:0% 2%;
            border-radius:10px 10px 0px 0px
        }
      </style>
            </form>       
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
            
    <!--   Datatables-->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>  


    <script>
    $(document).ready(function(){
        $('#example').DataTable({
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
    <script type="text/javascript">
function confirmaion(e) {
    if (confirm("¿Estas seguro que deseas Eliminar este registro?")) {
        return true;
    } else {
        return false;
        e.preventDefault();
    }
}
</script>
</body>
</html>