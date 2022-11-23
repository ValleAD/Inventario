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
<?php include ('../../templates/menu1.php') ?>
<?php include ('../../Model/conexion.php') ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.13.1/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.13.1/datatables.min.js"></script>
    <title>Productos</title>
</head>
<body> 
  <style>

#h2{
    margin: 0;
}
    #div{
        margin: 0%;
        display: none;
    }

    .input:hover{
        background: pink;
        color: white;
    }
 @media (max-width: 952px){
    #dia, #mes, #año{
        text-align: left;
    }
   #cat{
    margin-top: 2%;
   }
      #h2{
    padding: 1%;
   }
   #h3{
    color: white;
   }

    }
  </style>
<?php      

if (isset($_POST['editar'])){       
    $id = $_POST['id'];       
   
  
 
$sql = "SELECT cod, codProductos, categoria, catalogo,  descripcion, unidad_medida, SUM(stock), precio, fecha_registro FROM tb_productos WHERE  codProductos = '$id'";
$result = mysqli_query($conn, $sql);


    while ($productos1 = mysqli_fetch_array($result)){
           $precio=$productos1['precio'];
        $precio1=number_format($precio, 2,".",",");
        $cantidad=$productos1['SUM(stock)'];
        $stock=number_format($cantidad, 2,".",",");
         //$stock=round($stock);
?>

<br><br><br>
<style type="text/css">section{display: none;}</style>
<form action="../../Controller/Productos/Actualizar.php" method="post">
    <div class="container" style="background: rgba(0, 0, 0, 0.6); border-radius: 9px; color:#fff; font-weight: bold;">
  <h3 id="h3" align="center">Actualizar Producto</h3>
  <div class="row">
    <div class="col-md-6" style="position: initial; margin-top: 2%">
         <label for="">Categoría</label><br> 
                <select  class="form-control" name="categoria" id="um" >
                        <option   ><?php  echo $productos1['categoria']; ?></option>
                        <?php 
                     $sql = "SELECT * FROM  selects_categoria";
                        $result = mysqli_query($conn, $sql);

                        while ($productos = mysqli_fetch_array($result)){ 

                          echo'  <option>'.$productos['categoria'].'</option>
                      ';   
                     } 
                           ?>
                      </select>
        <label class="my-2">Codificación de Catálogo</label>
                <input class="form-control"  type="text" name="codCatalogo" id="act" value="<?php  echo $productos1['catalogo']; ?>">
         <label class="my-2">Unidad de medida (U/M)</label>
            
                    <select  class="form-control" name="um" id="um" >
                            <option  ><?php  echo $productos1['unidad_medida']; ?></option>
                            <?php 
                     $sql = "SELECT * FROM  selects_unidad_medida";
                        $result = mysqli_query($conn, $sql);

                        while ($productos = mysqli_fetch_array($result)){ 

                          echo'  <option>'.$productos['unidad_medida'].'</option>
                      ';   
                     } 
                           ?>
                        </select>
        <label class="my-2">Costo unitario</label>
                <input class="form-control" type="number" name="precio" id="act" step="0.01" value="<?php  echo $precio1 ?>">
    </div>
    <div class="col-md-6" style="position: initial; margin-top: 2%">
         <label>Código</label>
        <input class="form-control"  type="hidden" name="cod"  value="<?php  echo $productos1['cod']; ?>">
        <input class="form-control"  type="text" name="codProducto" id="act" value="<?php  echo $productos1['codProductos']; ?>">
        <label class="my-2">Descripción</label>
                <textarea rows="1" class="form-control" type="text"  name="descripcion"><?php  echo $productos1['descripcion']; ?></textarea>
                <label class="my-2">Cantidad Actual (Stock)</label>
                <input class="form-control" type="number" step="0.01" name="stock" id="act" value="<?php echo $stock?>">
                
    </div>
</div>
        <hr style="background: white;">
        <div class="row">
            <div class="col-md-12" style="position: initial; margin-bottom: 2%;">
                <button type="submit" class ="btn btn-primary" style="background:rgb(12, 139, 8); margin-right: 1%; border: none">Guardar Cambios</button>
                <a href="vistaProductos.php" class ="btn btn-primary" style="background:rgb(184, 8, 8); border: none">Cancelar</a>
            </div>
        </div>
    </div>
</form>

<style>
  #act {
    margin-top: 0.5%;
  }
</style>
<?php 
  }
} 
?>
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
  <section  style="background: rgba(255, 255, 255, 0.9);margin: 7%1%1%1%;padding: 1%; border-radius: 15px;">
<h2  class="text-center">Inventario de Productos</h2>
<br>

                 <div class="row">
                    <div class="col-md-3" style="position: initial; margin-top: 0%">
 <div class="card">
    <div class="card-body">
        <form method="POST" action="" class="well hidden">
                        <label>Desde</label>
                     <input type="DATE" id="fechaActual" class="form-control" name="F1" required>

                        <label class="">Hasta</label>
                     <input type="DATE" id="fechaActual1" class="form-control" name="F2" required>
                      <input type="submit"  class="btn btn-success my-2 w-100" id="submit"  name="Fecha" value="Filtrar Fechas">
                  </form>
                                     <form method="POST" action="" class="mt-5">
                               <label>Exportar Dia (1-31)</label>
                         <select  class="form-control" name="dia" id="dia" onchange="this.form.submit()">
                        <option disabled selected>Seleccione el Dia</option>
                            <?php for ($i=1; $i <=31 ; $i++) { 
                                echo "<option>$i</option>";
                            }
                                 ?>
                        </select>
                        <?php if (isset($_POST['dia'])){?>
                            <style type="text/css">#dia, #tabla_resultado{display: none;}</style>
                        <button type="button" readonly style="width: 100%;background-color:green ;position: initial; border-radius:5px;text-align:center; color: white;" class="form-control "><?php echo $_POST['dia'] ?>
                        <a href="" style="float: right;color: white;">
                                <svg class="bi" width="20" height="20" fill="currentColor">
                        <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#arrow-counterclockwise"/>
                        </svg>
                            </a>
                        </button>

                        <?php } ?>
                                <label>Exportar Mes (Enero-Diciembre)</label>
                        <select  class="form-control"  name="mes" id="mes" onchange="this.form.submit()">
                        <option disabled selected>Seleccione el Mes</option>
                        <?php    
$Meses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
       'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');

for ($i=1; $i<=12; $i++) {
     if ($i == date('m'))
echo '<option value="'.$i.'">'.$Meses[($i)-1].'</option>';
     else
echo '<option value="'.$i.'">'.$Meses[($i)-1].'</option>';
     }
?>
                        </select>
                        <?php if (isset($_POST['mes'])){ $mes=$_POST['mes'];    
                            if ($mes==1)  { $mes="Enero";}
                            if ($mes==2)  { $mes="Febrero";}
                            if ($mes==3)  { $mes="Marzo";}
                            if ($mes==4)  { $mes="Abril";}
                            if ($mes==5)  { $mes="Mayo";}
                            if ($mes==6)  { $mes="Junio";}
                            if ($mes==7)  { $mes="Junio";}
                            if ($mes==8)  { $mes="Agosto";}
                            if ($mes==9)  { $mes="Septiembre";}
                            if ($mes==10) { $mes="Octubre";}
                            if ($mes==11) { $mes="Noviembre";}
                            if ($mes==12) { $mes="Diciembre";}?>

                            <style type="text/css">#mes, #tabla_resultado{display: none;}</style>
                            
                        <button type="button" readonly style="width: 100%;background-color:green ;position: initial; border-radius:5px;text-align:center; color: white;" class="form-control "><?php echo $mes ?>
                            <a href="" style="float: right;color: white;">
                                <svg class="bi" width="20" height="20" fill="currentColor">
                        <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#arrow-counterclockwise"/>
                        </svg>
                            </a>
                        </button>
                        <?php } ?>
                                <label>Exportar Año (2022-3000)</label>
        <select  class="form-control" name="año" id="año" onchange="this.form.submit()">
                        <option disabled selected>Seleccione el Año</option>
                            <?php for ($i=2022; $i <=3000 ; $i++) { 
                                echo "<option>$i</option>";
                            } ?>
                        </select>
                        <?php if (isset($_POST['año'])){?>
                            <style type="text/css">#año, #tabla_resultado{display: none;}</style>
                        <button type="button" readonly style="width: 100%;background-color:green ;position: initial; border-radius:5px;text-align:center; color: white;" class="form-control "><?php echo $_POST['año'] ?>
                            <a href="" style="float: right;color: white;">
                                <svg class="bi" width="20" height="20" fill="currentColor">
                        <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#arrow-counterclockwise"/>
                        </svg>
                            </a>   
                        </button>
                        <?php } ?>
                  </form>
                   <form method="POST" action="" class="well hidden">
                     <select id="hidden" class="form-control mt-5" name="cat"  required>
                    <option selected disabled value="">Seleccione</option>
                <?php  $sql = "SELECT * FROM tb_productos GROUP BY categoria ";
        $result = mysqli_query($conn, $sql);
            while ($productos = mysqli_fetch_array($result)){
                $categoria=$productos['categoria'];
                if ($categoria=="") {
                    $categoria="Sin categorias";
                }else{
                $categoria=$productos['categoria'];
                }
                ?>
                <option value="<?php echo $categoria ?>" ><?php echo $categoria ?></option>
                <?php 
            }
         ?></select>
         
                       <button id="hidden" class="btn btn-secondary my-2 w-100" name="categorias" type="submit">Exportar por Categorias</button>

                   </form>

                   
                  </div>
              </div>          
          </div>
                    <div class="col-md-9" style="position: initial;">
            <div class="card productos">
    <div class="card-body p-1">

                    <div class=" "  style=" border-radius: ">
        <div style="position: initial;" class="btn-group  mb-3 my-3 mx-2 " role="group" aria-label="Basic outlined example">
         <form class="botones" method="POST" action="../../Plugin/Imprimir/Producto/tproductos.php" target="_blank">
             
             <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="tproductos">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
             </button>
         </form>
         <form class="botones" method="POST" action="../../Plugin/PDF/Productos/tpdf_productos.php" target="_blank" class="mx-1">
            
             <button  style="position: initial;"type="submit" class="btn btn-outline-primary mx-1" name="tproductospdf" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
             </button>
         </form>
         <form class="botones" method="POST" action="../../Plugin/Excel/Productos/Excel.php" target="_blank">
            
             <button style="position: initial;"type="submit" class="btn btn-outline-primary" name="tproductospdf" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-earmark-excel-fill"/>
                </svg>
             </button>
         </form>
    

 <div class="col-md-10"style="position: initial;">
            <section class="well" >
                <form method="POST" action="" class="well hidden"> 
                <div style="position: initial;" class="input-group">
            <input required type="text" style="position: initial;" name="Busqueda"  class="form-control"  placeholder="Buscar Código ó Descripción">
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
                    <?php if ($cliente=="egchoto") { ?>
    <button title="Respaldo de la base de datos completa" id="b" onclick="return Exportar_bd()" class="btn btn-outline-primary"  style="position: initial; float: right;margin-top: 1%; margin-bottom: 1%; margin-right: 15px;">Exportar bd</button>
                    <?php } ?>
     <a  href="../Unidad/unidad_medidad.php" class="btn btn-outline-secondary" id="b" style="position: initial; float: right;margin-top: 1%;margin-bottom: 1%; margin-right: 15px;">Unidad de medidas</a>
</div>
</div>
     </div>
          


<?php include('../../Buscador_ajax/Fechas/fecha.php') ?>
<?php include('../../Buscador_ajax/Categorias/categoria.php') ?>


            <section id="tabla_resultado"  style="margin-top: 2%;">
        <!-- AQUI SE DESPLEGARA NUESTRA TABLA DE CONSULTA -->

        </section>
                    </div>
                </div>
        

                 
</section>
 <script>
    function Exportar_bd() {
    Swal.fire({
      title:'NOTA IMPORTANTE:',
      text:'Este Momento Va a Hacer un Respaldo de la Base de Datos',
      icon:'warning',
      confirmButtonText: "Exportar",
      showCancelButton:true,
      allowOutsideClick: false
    }).then((resultado) =>{
if (resultado.value) {
        window.location.href='../../Database/Respaldos_sql/Respaldos.php';                               
               }
                });
        return false;
    }
    $(obtener_registros());

function obtener_registros(consulta)
{
    $.ajax({
        url : '../../Buscador_ajax/Consultas/consulta.php',
        type : 'POST',
        dataType : 'html',
        data : { consulta: consulta },
        })

    .done(function(resultado){
        $("#tabla_resultado").html(resultado);
    })
        .done(function(resultado){
        $("#tabla_resultado1").html(resultado);
    })
}

$(document).on('keyup', '#busqueda', function()
{
    var valorBusqueda=$(this).val();
    var limpiar = document.getElementById('busqueda');
                    function validar1() {
                        limpiar.value = '';
                    }
    if (valorBusqueda!="")
    {
        obtener_registros(valorBusqueda);
    }
    else
        {
            obtener_registros();
        }
});

</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#busqueda').load('../../Buscador_ajax/Consultas/consulta.php');
    });





         var limpiar = document.getElementById('busqueda');
                    function validar1() {
                        limpiar.value = '';
                    }
    $(document).ready( function () {
    $('#div').DataTable();
} );
 </script>

</body>
</html>