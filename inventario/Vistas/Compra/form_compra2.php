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
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Vista Previa</title>

</head>
<body>
    <style>  
       #NoGuardar,#jus1, #og , .n2, .m-0{
            display: none;
        }
        #buscar1{
            display: block;
        }
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

$codigo= $_POST['id'];
if ($codigo=="") {
    echo'
    <script>
    alert("Debe de selecionar los productos");
    window.location ="form_compra1.php"; 
    </script>
    ';

}

if (isset($_POST['solicitar'])){ ?>
    <section id="section" class="bg-white">
       <form style="background: transparent;" method="POST" action="../../Controller/Compra/añadir_compra.php">
        <div class="card">
            <div class="card-body">
                <div class="row">
                  <div id="w" class="col-md-4" style="position: initial">

                      <label id="inp1">Solicitud N°</label>  

                    <input id="busq" class="form-control" type="number" name="nsolicitud"  required> 
                    
                </div>

                <div id="w" class="col-md-4" style="position: initial">
                    <font color="black"><label id="inp1">Dependencia que Solicita</label></font>   
                    <input type="text"  class="form-control" name="dependencia" id="um" required style="color: black;" value="Mantenimiento" readonly>

                </div>
                <div id="w" class="col-md-4" style="position: initial">
                    <font color="black"><label id="inp1">Plazo y Numero de Entregas</label></font> 
                    <input  style=" color: black;" class="form-control n1" type="text" name="plazo" id="como3" required>
                    <input disabled  style=" color: black;" class="form-control n2" type="text"  id="como3" required value="No Disponible">
                    <br>
                </div>
                <div id="w" class="col-md-4" style="position: initial">
                    <label >Unidad Tecnica</label>
                    <input style=" color: black;"  class="form-control n1" type="text" name="unidad_tecnica" id="como3" required>
                    <input disabled  style=" color: black;" class="form-control n2" type="text"  id="como3" required value="No Disponible">
                    <br>
                </div>
                <div id="w" class="col-md-4" style="position: initial">
                    <label >Suministros Solicita</label> 
                    <input style=" color: black;"  class="form-control n1" type="text" name="descripcion_solicitud" id="como3" required>
                    <input disabled  style=" color: black;" class="form-control n2" type="text"  id="como3" required value="No Disponible">
                    <br>
                </div>
                <div id="w" class="col-md-4" style="position: initial">
                  <?php     $cliente =$_SESSION['signin'];
                  $data =mysqli_query($conn, "SELECT * FROM tb_usuarios WHERE username = '$cliente'");
                  while ($consulta =mysqli_fetch_array($data)) {
                   ?>
                   <label >Encargado</label> 
                   <input style="cursor: initialowed; color: black;"  class="form-control" type="text" name="usuario" id="como3" required readonly value="<?php  echo $consulta['firstname']?> <?php  echo $consulta['lastname']?>">
                   <input style="cursor: initialowed; color: black;"  class="form-control" type="hidden" name="idusuario" id="como4" required readonly value="<?php  echo $consulta['id']?>">
                   <br>
               <?php }?>
           </div>
       </div>
   </div>
</div>
<br>     <div class="row">
    <div class="col-md-9">
        <div class="card">
            <div class="card-body">
                <?php include('../../Buscador_ajax/Tablas/Productos/tablaProductos.php') ?>
            </div>
        </div>
        <br>

        <div class="card m-0">
                <div id="resultado" style="margin: 0%;background: transparent;"></div>
            
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <label>Justificación por el OBS solicitado</label>
                 <textarea rows="7" id="jus" class="form-control" name="jus"  placeholder="" required id="floatingTextarea"></textarea>
                <textarea disabled rows="7" id="jus1" class="form-control" name="jus"  placeholder="" required >NO DISPONIBLE</textarea>
                <br>

                <button class="btn btn-success btn-lg" id="Guardar" style="width: 100%;" name="submit">Guardar</button>  
                <button class="btn btn-success btn-lg" id="NoGuardar" style="width: 100%; cursor: not-allowed;" title="NO DISPONIBLE" disabled>Guardar</button>  

            </div>
        </div>
    </div>
</form>
</section>

<?php } ?>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>


<script>
    $(document).on('click', '.borrar', function (event) {
        event.preventDefault();
        $(this).closest('tr').remove();
    });
   $(obtener_registros1());

    function obtener_registros1(consulta)
    {
        $.ajax({
            url : '../../Buscador_ajax/COMPRA/COMPRA.php',
            type : 'POST',
            dataType : 'html',
            data : { consulta: consulta },
        })

        .done(function(resultado){
            $("#resultado").html(resultado);
        })
    }

    $(document).on('keyup', '#busq', function()
    {
        var valorBusqueda=$(this).val();
        if (valorBusqueda!="")
        {
            obtener_registros1(valorBusqueda);
        }
        else
        {
            obtener_registros1();
        }
    });
</script>
</body>
</html>