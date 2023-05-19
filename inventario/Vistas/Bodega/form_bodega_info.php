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
	<title>Vista Previa Sol. Bodega</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

</head>
<body>
    <style>
        #NoGuardar, #og{
            display: none;
        }
        #buscar1{
            display: block;
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
}
</style>
<br><br><br>
<?php
$codigo= $_POST['id'];
if ($codigo=="") {
    echo'
    <script>
    alert("Debe de selecionar los productos");
    window.location ="form_bodega_varios.php"; 
    </script>
    ';

}
if (isset($_POST['solicitar'])){ ?>
    <section id="section" style="background:white;padding: 1%;border-radius: 15px;">
       <form style="margin: 0%;position: 0; background: transparent;" method="POST" action="../../Controller/Bodega/añadir_bodega.php">

        <div class="card">
            <div class="card-body">
                <div class="row">
                  <div class=" col-md-4" style="position: initial">
                    <label id="inp1">Departamento que solicita</b></label>   
                    <div class="div d"  > 

                     <?php  
                     $sql = "SELECT * FROM selects_departamento";
                     $result = mysqli_query($conn, $sql);
                     while ($productos = mysqli_fetch_array($result)){
                      ?>  
                       <input  class="p2" required id="<?php echo $productos['id'] ?>" type="radio" name="depto" value="<?php echo $productos['departamento'] ?>"> <label style="width: 100%;" id="label1" for="<?php echo $productos['id'] ?>" > <?php echo $productos['departamento'] ?></label><br>
                   <?php }?>
               </div>
               <br>
               <p style="float: right;" class="p">Mostrar todos
                <svg class="bi" width="20" height="20" fill="currentColor">
                    <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#caret-down-fill"/>
                </svg></p></p>
                <p style="float: right;" class="p1">Ocultar
                    <svg class="bi" width="20" height="20" fill="currentColor">
                        <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#caret-up-fill"/>
                    </svg></p></p>
                </div>
                <div class="col-md-4" style="position: initial">
                    <label id="inp1">O. de T. N°</b></label>   
                    <input id="busq"class="form-control"  type="number" name="odt" required>
                    <section id="resultado" style="margin: 0px;"></section>
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
</div>
<div class="card mt-3">
  <div class="card-body">
      <?php include('../../Buscador_ajax/Tablas/Productos/tablaProductos.php') ?>
  </div>
</div>
<center> <div class="col-md-3 mt-4" style="padding: 0%;" > 
    <button class="btn btn-success btn-lg" id="Guardar" style="width: 100%;" name="solicitar">Guardar</button>  
    <button class="btn btn-success btn-lg" id="NoGuardar" style="width: 100%; cursor: not-allowed;" title="NO DISPONIBLE" disabled>Guardar</button>  
</div></center>    
</form>
</section>

<?php } ?>

<script>
    $('.p1').hide();
    $('.p').click(function(){
        $(".div").removeClass("div");
        $('.p').hide();
        $('.p1').show();

    });
    $('.p1').click(function(){

        $(".d").addClass("div");
        $('.p1').hide();
        $('.p').show();
    });
    $('.p2').click(function(){

        $(".d").addClass("div");
        $('.p1').hide();
        $('.p').show();
    });
    $(obtener_registros1());

    function obtener_registros1(consulta)
    {
        $.ajax({
            url : '../../Buscador_ajax/BODEGA/BODEGA.php',
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