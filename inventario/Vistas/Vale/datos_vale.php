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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <link rel="stylesheet" type="text/css" href="../../styles/estilo.css" > 

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vale</title>
</head>
<body>
    <style> 
        #NoGuardar, #og,#jus1, .m-0{
            display: none;
        } 
        #div{margin: 0%}
        #section{background: whitesmoke;border-radius: 15px;margin: 1%;padding: 1%;}
        form{background: transparent;padding: 1%;}
               @media (min-width: 1028px){
           #section{
                margin: 5%6%6%1%;
                width: 97%;
            } 
        }
        @media (max-width: 800px){
            #ver{
                margin-top: 2%;
            }
            #section{
                margin: -10%6%6%1%;
                width: 97%;
            }

            th{
                width: 25%;
            }
            #p{
                margin-top: 5%;
                margin-left: 7%;
            }

        }
            </style>
            <br><br><br>
            <?php
            $verificar1 =mysqli_query($conn, "SELECT codigo FROM detalle_vale ");
        if (!mysqli_num_rows($verificar1)>0) {?>
            <style>
                .c{
                    display: none;
                }
            </style>
        <?php }else{?>
            <style>
                .c{
                    display: block;
                }
            </style>
        <?php }
            $verificar =mysqli_query($conn, "SELECT codVale FROM tb_vale ");
            if (!mysqli_num_rows($verificar)>0) {
                echo "<script>window.location.href='../../Vistas/Vale/solicitudes_vale.php'; </script>";
            }
            $total = 0;
            $final = 0;
            $final1 = 0;
            $final2 = 0;
            $final3 = 0;
            $final4 = 0;
            $final5 = 0;
            $final6 = 0;
            $final7 = 0;
            $final8 = 0;
            $final9 = 0;
            $codigo=$_GET['cod'];
            $sql = "SELECT * FROM tb_vale WHERE codVale=$codigo ORDER BY codVale DESC LIMIT 1";
            $result = mysqli_query($conn, $sql);
            while ($productos1 = mysqli_fetch_array($result)){
               if ($productos1['observaciones']=="") {
                $jus = 'Sin observacion por el momento';

            }else{
                $jus = $productos1['observaciones'];
            }
            echo'   
            <section id="section" class="section">


            <div class="card">
            <div class="card-body">
            <div class="row">

            <div class="col-md-3" style="position: initial">


            <label style="font-weight: bold;">Depto. o Servicio:</label>
            <p>' .$productos1['departamento']. '</p>

            </div>

            <div class="col-md-2" style="position: initial">
            <label style="font-weight: bold;">N° de Vale:</label>
            <p>' .$productos1['codVale']. '</p>
            <input type="hidden" id="codVale" value="' .$productos1['codVale']. '">
            </div>

            <div class="col-md-3" style="position: initial">
            <label style="font-weight: bold;">Encargado:</label>
            <p>' .$productos1['usuario']. '</p>
            </div>


            <div class="col-md-2" style="position: initial">
            <label style="font-weight: bold;">Fecha:</label>
            <p>' .date("d-m-Y",strtotime($productos1['fecha_registro'])).  '</p>
            </div>';?>
            <div class="col-md-2" style="position: initial">
              <label style="font-weight: bold;">Estado</label>
              <input <?php
              if($productos1['estado']=='Pendiente') {
                echo ' style="background-color:green ;width:100%; border-radius:5px;text-align:center; color: white;"';
            }
        ?> readonly class="form-control"  type="text" value="<?= $productos1['estado'] ?>" name="id"> 
    </div>
</div>
</div>
</div>

<br>

<div class="row">

    <div class="col-md-9 mb-3">
        <div class="card">
            <div class="card-body">


                <table class="table " id="example">
                    <thead>
                      <tr id="tr">
                        <th>Código</th>
                        <th>Descripción Completa</th>
                        <th>Unidad de Medida</th>
                        <th>Cantidad solicitada</th>
                        <th >Cantidad Depachada</th>

                        <th>Costo unitario</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 

                    $num_vale = $productos1['codVale'];

                    $sql = "SELECT codigo,SUM(stock),SUM(cantidad_despachada),precio,descripcion,unidad_medida FROM detalle_vale WHERE numero_vale = $num_vale Group by codigo";
                    $result = mysqli_query($conn, $sql);
                    while ($productos = mysqli_fetch_array($result)){
                        $total = $productos['SUM(stock)'] * $productos['precio'];
                        $final += $total;
                        $total1= number_format($total, 2, ".",",");
                        $final1=number_format($final, 2, ".",",");
                        $codigo=$productos['codigo'];
                        $descripcion=$productos['descripcion'];
                        $um=$productos['unidad_medida'];


                        $precio   =    $productos['precio'];
                        $precio2  =    number_format($precio, 2,".",",");  
                        $cant_aprobada=$productos['SUM(stock)'];
                        $cantidad_despachada=$productos['SUM(cantidad_despachada)'];
                        $stock=number_format($cant_aprobada, 2,".",",");
                        $cantidad_desp=number_format($cantidad_despachada, 2,".",",");

                        $final2 += $cant_aprobada;
                        $final3   =    number_format($final2, 2, ".",",");

                        $final4 += $cantidad_despachada;
                        $final5   =    number_format($final4, 2, ".",",");

                        $final8 += $precio;
                        $final9   =    number_format($final8, 2, ".",",");?>
                        <style type="text/css">
                           #td{
                            display: none;
                        }


                    </style> 
                    <tr>
                     <td  data-label="Código"><?php echo $productos['codigo'] ?></td>
                     <td  data-label="Descripción"><?php echo $productos['descripcion'] ?></td>
                     <td  data-label="Unidada de Medida"><?php echo $productos['unidad_medida'] ?></td>
                     <td  data-label="Cantidad"><?php echo $stock ?></td>
                     <td  data-label="Cantidad"><?php echo $cantidad_desp ?></td>
                     <td  data-label="Costo unitario"><?php echo $precio2 ?></td>
                     <td  data-label="total"><?php echo $total1 ?></td>
                 </tr>

             <?php }
             ?> 
         </tbody>

     </table>
 </div>
</div>
</div>
<div class="col-md-3  mb-3 " >
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div style="position: initial;" class="btn-group mb-3 my-3 mx-2" role="group" aria-label="Basic outlined example">
                        <form method="POST" action="../../Plugin/Imprimir/Vale/vale.php" target="_blank" class="c">
                           <input type="hidden" readonly class="form-control"  type="text" value="<?php echo $productos1['codVale']?>" name="vale">

                           <textarea style="display: none;" name="jus" ><?php echo $jus ?></textarea>

                           <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="aprobado">
                            <svg class="bi" width="20" height="20" fill="currentColor">
                                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                            </svg>

                        </button>
                    </form>
                    <form method="GET" action="../../Plugin/PDF/Vale/pdf_vale.php" target="_blank" class="c">
                        <input type="hidden" readonly class="form-control"  type="text" value="<?php echo $productos1['codVale']?>" name="vale">

                        <textarea style="display: none;" name="jus" ><?php echo $jus ?></textarea>

                        <button style="position: initial;" type="submit" class="btn btn-outline-primary">
                            <svg class="bi" width="20" height="20" fill="currentColor">
                                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                            </svg>

                        </button>
                    </form>
                    <form method="POST" action="../../Plugin/Excel/Detalles_dt/Excel.php" class="c">
                       <input type="hidden" readonly class="form-control"  type="text" value="<?php echo $productos1['codVale']?>" name="vale">

                       <input type="hidden" name="cod" value="<?php echo $codigo ?>">
                       <input type="hidden" name="tot" value="<?php echo $total1 ?>">
                       <input type="hidden" name="tot_f" value="<?php echo $final1 ?>" >
                       <textarea style="display: none;" name="jus" ><?php echo $jus ?></textarea>
                       <button type="submit" class="btn btn-outline-primary" name="DT" target="_blank">
                        <svg class="bi" width="20" height="20" fill="currentColor">
                            <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-earmark-excel-fill"/>
                        </svg>
                    </button>
                </form>
                <form class="mx-1" style="" method="POST" action="" style="margin: 0px;" >
                    <input type="hidden" name="cod" value="<?php echo $productos1["codVale"] ?>">
                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#new">➕</button>
                </form>
            </div>
            <hr>
            <p align="right"><b style="float: left;">Cantidad Solicitada: </b><?php echo $final3 ?></p>
            <p align="right"><b style="float: left;">Cantidad Despachada: </b><?php echo $final5 ?></p>
            <p align="right"><b style="float: left;">Costo Unitario: </b><?php echo $final9 ?></p>
            <p align="right"><b style="float: left;">SubTotal</b><?php echo $final1?></p>

        </div>

    </div>

</div>

</div>
<div class="card mt-3">
  <div class="card-body">
   <label>Observaciones (En qué se ocupará el bien entregado)</label>
   <textarea rows="7"  class="form-control" name="jus"  required><?php echo $jus ?> </textarea><br>

   <button class="btn btn-success as">Detalles Vale</button>
</div>
</div>
</div>


</div>
</section>
<div class="modal fade" id="new" style="background: rgba(0, 0, 0, 0.3)"  data-backdrop="static"  tabindex="-1" role="dialog">
    <div class="modal-dialog modal-xl" >
        <div class="modal-content" style="background:  rgba(255, 255, 255, 1); position: initial;">
            <div class="modal-header">
                <h5 class="modal-title" style="color:black;">Información del Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">
                      <svg class="bi text-danger" width="30" height="30" fill="currentColor">
                        <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#backspace-fill"/>
                    </svg>
                </span>
            </button>
        </div>

        <div class="modal-body ">
            <form id="frm-example" method="post" action="">
                <?php include ('../../Buscador_ajax/Cabezeras/cabezera.php') ?>
                <input type="" style="display: none;" readonly class="form-control"  value="<?php echo $num_vale?>" name="bodega">
                <div id="tabla_resultado" style="margin: 0">
                    <!-- AQUI SE DESPLEGARA NUESTRA TABLA DE CONSULTA -->

                </div>

            </form>
        </div>
    </div>
</div>
</div>

<?php } if(isset($_POST['solicitar'])){$cod=$_POST['bodega']?>
<style type="text/css">.section{display: none;}</style>
<section id="section">
 <form style="background: transparent;" method="POST" action="../../Controller/Vale/añadir_vale.php">
    <div class="card">
        <div class="card-body">
            <div class="row">
              <div class="col-md-4" style="position: initial">
                <label id="inp1"><b>Departamento que solicita</b></label>   

                <?php  
                $sql = "SELECT * FROM tb_vale WHERE codVale='$cod'";
                $result = mysqli_query($conn, $sql);
                while ($productos = mysqli_fetch_array($result)){ ?>  
                    <input type="" name="depto" class="form-control " readonly value="<?php echo $productos['departamento'] ?>">
                <?php }?>


            </div>
            <div class="col-md-4" style="position: initial">
                <label id="inp1"><b>Vale N°</b></label>   
                <input id="busq"class="form-control" readonly  type="number" name="numero_vale" value="<?php echo $cod ?>" required >
                <section id="resultado" style="margin: 0px;background: transparent;width: 100%;"></section>
            </div>
            <div class="col-md-4" style="position: initial">
                <label id="inp1"><b>Nombre de la persona</b></label>
                <?php     $cliente =$_SESSION['signin'];
                $data =mysqli_query($conn, "SELECT * FROM tb_usuarios WHERE username = '$cliente'");
                while ($consulta =mysqli_fetch_array($data)) {
                 ?>
                 <label><b>Encargado</b></label>
                 <input style="cursor: not-allowed; color: black;"  class="form-control" type="text" name="usuario" id="como3" required readonly value="<?php  echo $consulta['firstname']?> <?php  echo $consulta['lastname']?>">
                 <input style="cursor: not-allowed; color: black;"  class="form-control" type="hidden" name="idusuario" id="como4" required readonly value="<?php  echo $consulta['id']?>"/>
                 <br>
             <?php }?> 

         </div>
     </div>
 </div>
</div>

<br>
<div class="row">
    <div class="col-md-9">
        <div class="card">
            <div class="card-body">
              <?php include('../../Buscador_ajax/Tablas/Productos/tablaProductos.php') ?>
          </div>
      </div>
  </div>
  <div class="col-md-3">
     <div class="card">
        <div class="card-body">   


         <div class="form-floating mb-3 my-2" >
            <label>Observaciones (En qué se ocupará el bien entregado)</label>
            <textarea rows="7" class="form-control" name="jus"  placeholder="" required id="floatingTextarea"></textarea>
        </div>
        <button id="buscar1" type="submit" class="btn btn-lg btn-success" style="width: 49%;float: left; margin-right: 1%;font-size: 1.4em; text-align: center;" name="NuevaSoli">Guardar

        </button>
    </form>
    <form method="POST" action="" style="margin:0;">

        <button class="btn btn-danger btn-lg" id="" style="width: 50%;" name="detalle">Cancelar</button>
        <input type="hidden" name="id" value="<?php echo $cod ?>">
    </form>
</div>
</div>
</div>
</div>
</section>

<?php 
}  ?>


<script>
    $('.p1').hide();
    $('.p').click(function(){$(".d").removeClass("div");$('.p').hide();$('.p1').show();});   
    $('.p1').click(function(){$(".d").addClass("div");$('.p1').hide();$('.p').show();});

    var table = $('#tblElecProducts').DataTable( {
      responsive: true,
      autoWidth:false,      
      columnDefs: [ {
        orderable: false,
        className: 'select-checkbox',
        targets:   0
    } ],
      select: {
        style:    'multi'
    },
    lengthMenu: [[10, -1], [10,"Todos los registros"]],

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
    $('#submit').on('click', function (event) {


      $('#frm-example').find('input[type="hidden"]').remove();
      var seleccionados = table.rows({ selected: true });

      if(!seleccionados.data().length){
        alert("No ha seleccionado ningún producto");
        event.preventDefault();
    }

    else{
        seleccionados.every(function(key,data){
          console.log(this.data());

          $('<input>', {
              type: 'hidden',
              value: this.data()[1],
              name: 'id[]'
          }).appendTo('#frm-example');

      $("#frm-example").submit(); //submiteas el form
  });
    }
});
    $(document).ready(function () {
        $('.as').click(function() {
            var nSolicitud=document.getElementById("codVale").value;
            window.location.href='Detalle_Vale.php?detalle&id='+nSolicitud;
        });
        $('#ver').click(function() {
            window.location.href="";
        });


        $('#example').DataTable({
            dom: 'lrtip',
            responsive: true,
            autoWidth:false,
            deferRender: true,

            lengthMenu: [[10, -1], [10,"Todos"]],
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
    window.onload = function(){
  var fecha = new Date(); //Fecha actual
  var mes = fecha.getMonth()+1; //obteniendo mes
  var dia = fecha.getDate(); //obteniendo dia
  var ano = fecha.getFullYear(); //obteniendo año
  if(dia<10)
    dia='0'+dia; //agrega cero si el menor de 10
if(mes<10)
    mes='0'+mes //agrega cero si el menor de 10
var limpiar = document.getElementById('dia'); limpiar.value = dia
var limpiar1 = document.getElementById('mes'); limpiar1.value = mes;
var limpiar4 = document.getElementById('ano'); limpiar4.value = ano;


}

</script>    
</body>
</html>


