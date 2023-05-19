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
     #NoGuardar,#og{
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
    window.location ="form_circulante1.php"; 
    </script>
    ';

}

if (isset($_POST['solicitar'])){ ?>
    <section id="section">
     <form style="background: transparent;" method="POST" action="../../Controller/Circulante/añadir_circulante.php">
        <div class="card">
            <div class="card-body">
                <div class="row">
                  <div id="w," class="col-md-3" style="position: initial">

                    <label>Solicitud N°</label>   

                    <input id="busq"class="form-control"  type="number" name="solicitud_no" required>   
                    <section id="resultado" style="margin: 0px;background: transparent;"></section>
                </div>
            </div>
        </div>
    </div> <br>
    <div class="card">
        <div class="card-body">
          <?php include('../../Buscador_ajax/Tablas/Productos/tablaProductos.php') ?>

          </div>
       </div>
          <center>  
            <div class="col-md-3 mt-4" style="padding: 0;">
              <button class="btn btn-success btn-lg" id="Guardar" style="width: 100%;" name="submit">Guardar</button>  
              <button class="btn btn-success btn-lg" id="NoGuardar" style="width: 100%; cursor: not-allowed;" title="NO DISPONIBLE" disabled>Guardar</button>  
   </div>
      </center>
  </form>
</section>

<?php } ?>


<script>
    $(document).on('click', '.borrar', function (event) {
        event.preventDefault();
        $(this).closest('tr').remove();
    });
    $(obtener_registros1());

    function obtener_registros1(consulta)
    {
        $.ajax({
            url : '../../Buscador_ajax/CIRCULANTE/CIRCULANTE.php',
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