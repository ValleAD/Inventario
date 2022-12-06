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
?><?php include ('../../templates/menu1.php') ?>
<?php include ('../../Model/conexion.php') ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Buscador al Producto</title>
</head>
<body>
  <section  style="background: rgba(255, 255, 255, 0.9);margin: 7%1%1%1%;padding: 1%; border-radius: 15px;">
<h2  class="text-center">Buscador al Producto</h2>
<br>

<style>p{font-size: 12px;</style>
<div class="card">
<div class="card-body">
                <div class="row" >
               <div class="col-md-3" style="position: initial; ">
        <p class="mx-3" style="color: #000; font-weight: bold;">Buscar Codigo del Producto</p>
    </div>          
             <div class="col-md-8"style="position: initial;">
            <section class="well" >
                <form method="POST" action="" class="well hidden"> 
                <div style="position: initial;" class="input-group">
                    Del: <input type="DATE" name="f1" class="form-control mx-3" required>
                    Al: <input type="DATE" name="f2" class="form-control mx-3" required >
            <input required type="number" style="position: initial;" name="Busqueda"  class="form-control"  placeholder="Buscar">
                      <button name="Consultar2" type="submit" onclick="return validar1()" class="input-group-text input" for="inputGroupSelect01">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#search"/>
                </svg>
                 </button>
                 </div> 
             </form>
        </section>
    </div>
</div>         
                </div>  
            </div>
        </div>

<?php
 if (isset($_POST['Consultar2'])) {$Busqueda=$_POST['Busqueda'];$f1=$_POST['f1'];$f2=$_POST['f2']?>
<br>
<div class="card card1" id="card1" >
            <div class="card-body">
                <div class="alert alert-warning" rol="alert">No se Encontró resultados</div>
            </div>
        </div>
        <br id="card2">
        <style type="text/css">#card{display: none;}</style>
<div class="row" >
    <div class="col-md-3" id="card">
        <div class="card">
            <div class="card-body">
<?php $sql = "SELECT Concepto,No_Comprovante,h.descripcion,  h.fecha_registro,h.unidad_medida, SUM(Entradas), SUM(Salidas),Saldo, p.precio FROM historial h JOIN tb_productos p ON h.No_Comprovante= p.codProductos WHERE  No_Comprovante = '$Busqueda' or h.fecha_registro BETWEEN ' $f1' AND ' $f2' GROUP BY Concepto order by h.fecha_registro DESC LIMIT 1";
$result = mysqli_query($conn, $sql);

    while ($productos = mysqli_fetch_array($result)){
        $fecha=date("d-m-Y",strtotime($productos['fecha_registro']));
        $fecha1=date("d-m-Y",strtotime($productos['fecha_registro']));
        $Comprovante= $productos['No_Comprovante'];
        $Concepto= $productos['Concepto'];
        $Entradas=$productos['SUM(Entradas)'];
        $Salida=$productos['SUM(Salidas)'];
        $Saldo=$productos['Saldo'];
        $cod= $productos['No_Comprovante'];
        $descripcion=$productos['descripcion'];
        $um=$productos['unidad_medida'];
?>
<style type="text/css">#card{display: block;}.card1, #card2{display: none;}</style>
                 <div  style="position: initial;" class="btn-group mb-3 my-3  mx-2" role="group" aria-label="Basic outlined example">
         <form method="POST" action="../../Plugin/Imprimir/Producto/productos.php" target="_blank">
            <input type="hidden" name="cod" value="<?php echo $cod ?>">
            <input type="hidden" name="Busqueda" value="<?php echo $Busqueda ?>">
            <input type="hidden" name="descripcion" value="<?php echo $descripcion ?>">
            <input type="hidden" name="fecha" value="<?php echo $fecha ?>">
            <input type="hidden" name="fecha" value="<?php echo $fecha ?>">
            <input type="hidden" name="fecha1" id="p1">
            <input type="hidden" name="um" value="<?php echo $um ?>">            

             <button  style="position: initial;" type="submit" class="btn btn-outline-primary" name="Historial">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
             </button>
         </form>
         <form method="POST" action="../../Plugin/PDF/Productos/pdf_productos.php" target="_blank" class="mx-1">
            <input type="hidden" name="cod" value="<?php echo $cod ?>">
            <input type="hidden" name="Busqueda" value="<?php echo $Busqueda ?>">
            <input type="hidden" name="descripcion" value="<?php echo $descripcion ?>">
            <input type="hidden" name="fecha" value="<?php echo $fecha ?>">
            <input type="hidden" name="um" value="<?php echo $um ?>">
            <input type="hidden" name="fecha1" id="p2">
             <button  style="position: initial;" type="submit" class="btn btn-outline-primary" name="Historial" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
             </button>
         </form>
                 <form  method="POST" action="../../Plugin/Excel/Productos/Historial.php" >
            <input type="hidden" name="cod" value="<?php echo $cod ?>">
            <input type="hidden" name="Busqueda" value="<?php echo $Busqueda ?>">
            <input type="hidden" name="descripcion" value="<?php echo $descripcion ?>">
            <input type="hidden" name="fecha" value="<?php echo $fecha ?>">
            <input type="hidden" name="fecha1" id="p3">
                <?php $sql = "SELECT fecha_registro,codProductos, precio FROM tb_productos WHERE  codProductos = '$Busqueda' GROUP BY codProductos";
$result = mysqli_query($conn, $sql);

    while ($productos = mysqli_fetch_array($result)){
        $fecha=date("d-m-Y",strtotime($productos['fecha_registro']));
        $Comprovante= $productos['codProductos'];
        $Saldo= $productos['precio'];?>
        <input type="hidden" name="fecha2" value="<?php echo $fecha ?>">
        <input type="hidden" name="precio" value="<?php echo $Saldo ?>">
    <?php } ?>
            <input type="hidden" name="um" value="<?php echo $um ?>">
                <button type="submit" class="btn btn-outline-primary" name="Historial" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-earmark-excel-fill"/>
                </svg>
                </button>
            </form>
</div>

<p><b>PERIODO DE MOVIMIENTO</b></p>
<div class="row">
    <div class="col-md-6">
<p><b>DE:</b> <?php echo $fecha ?></p>     
    </div>
    <div class="col-md-6">
<p id="p"> </p>
    </div>    
<div class="col-md-6">
<p><b>Codigo del Producto:</b></p>     
    </div>
 <div class="col-md-6">
<p><?php echo $cod ?></p>
    </div>
    <div class="col-md-6">
<p><b>Descripción</b></p>     
    </div>
 <div class="col-md-6">
<p> <?php echo $descripcion ?></p>
    </div>    
<div class="col-md-6">
<p><b>Unidad de Medida</b></p>     
    </div>
 <div class="col-md-6">
<p> <?php echo $um ?></p>
    </div>
</div>

    </div>
        </div>
    </div>
<?php } ?>
        <div class="col-md-9">
        <div class="card">
            <div class="card-body">
                         <table class="table  table-striped" id="examp" style="">
                   <thead>
             <tr id="tr">
                     <th style="width:7%"  id="th">Fecha</th>
                     <th style="width:7%"  id="th">Concepto</th>
                     <th style="width:27%;" id="th">No. Comprobante</th>
                     <th style="width:8%"  id="th">Entradas</th>
                     <th style="width:8%"  id="th">Salidas</th>
                     <th style="width:10%"  id="th">Saldo</th>
                
            </tr>
           
     </thead>
<tbody>
    <?php $sql = "SELECT fecha_registro,codProductos,SUM(stock), precio FROM tb_productos WHERE  codProductos = '$Busqueda' GROUP BY codProductos";
$result = mysqli_query($conn, $sql);

    while ($productos = mysqli_fetch_array($result)){
        $fecha=date("d-m-Y",strtotime($productos['fecha_registro']));
        $Comprovante= $productos['codProductos'];
        $Saldo= $productos['precio'];?>
        <tr>
            <td id="th" data-label="Fecha"><?php echo $fecha ?></td>
            <td id="th" data-label="Concepto">Inventario Físico</td>
            <td id="th" data-label="No. Comprovante"><?php echo $Comprovante ?></td>
            <td id="th" data-label="Entradas"><?php echo $productos['SUM(stock)'] ?></td>
            <td id="th" data-label="Salidas">0.00</td>
            <td id="th" data-label="Saldo"><?php echo $Saldo ?></td>
        </tr> 
    <?php } $sql = "SELECT Concepto,No_Comprovante,h.descripcion, h.fecha_registro,h.unidad_medida, SUM(Entradas), SUM(Salidas),Saldo, p.precio FROM historial h JOIN tb_productos p ON h.No_Comprovante= p.codProductos WHERE  No_Comprovante = '$Busqueda' GROUP BY Concepto ";
$result = mysqli_query($conn, $sql);

    while ($productos = mysqli_fetch_array($result)){
        $fecha=date("d-m-Y",strtotime($productos['fecha_registro']));
        $Comprovante= $productos['No_Comprovante'];
        $Concepto= $productos['Concepto'];
        $Entradas=$productos['SUM(Entradas)'];
        $Salida=$productos['SUM(Salidas)'];
        $Saldo=$productos['Saldo'];
?>
        <tr>
            <td id="th" data-label="Fecha"><?php echo $fecha ?></td>
            <td id="th" data-label="Concepto"><?php echo $Concepto ?></td>
            <td id="th" data-label="No. Comprovante"><?php echo $Comprovante ?></td>
            <td id="th" data-label="Entradas"><?php echo $Entradas ?></td>
            <td id="th" data-label="Salidas"><?php echo $Salida ?></td>
            <td id="th" data-label="Saldo"><?php echo $Saldo ?></td>
        </tr>        
<?php } ?>
           </tbody>
        </table>
            </div>
        </div>
        </div>
    </div>
</div>
<?php } ?>
  </section>

        <script type="text/javascript">

            $(document).ready(function () {

       $('#examp').DataTable({

            responsive: true,
            autoWidth:false,
            deferRender: true,
            scroller: true,
            lengthMenu: [[10, -1], [10,"Todos"]],
            scrollY: 400,
            "searching": false,
            scrollCollapse: true,
                    language: {
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast":"Último",
                    "sNext":"Siguiente",
                    "sPrevious": "Anterior"
                 },
                 "sProcessing":"Procesando...",
            },

    });
}); 
function confirmaion(e) {
    if (confirm("¿Estas seguro que deseas Eliminar este registro?")) {
        return true;
    } else {
        return false;
        e.preventDefault();
    }
}
let linkDelete =document.querySelectorAll("delete");
date = new Date();
year = date.getFullYear();
month = date.getMonth() + 1;
day = date.getDate();
document.getElementById("p").innerHTML ="<b>AL:</b> "+ day + "-" + month + "-" + year;
document.getElementById("p1").value = day + "-" + month + "-" + year;
document.getElementById("p2").value = day + "-" + month + "-" + year;
document.getElementById("p3").value = day + "-" + month + "-" + year;
</script>
</section>
</body>
</html>