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
            @media (max-width: 952px){
   section{
        margin: -15%6%6%3%;
        width: 95%;
    }
    }#buscar1{
        width: 100%;
        margin: 0;
    }
    label{
        margin-top: 3%;
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
        <section >
 <form style="background: transparent;" method="POST" action="../../Controller/Compra/añadir_compra.php">
        <div class="card">
            <div class="card-body">
<div class="row">
      <div id="w" class="col-md-4" style="position: initial">
         
          <label id="inp1">Solicitud N°</label>  
           <?php 
          
          $sql = "SELECT * FROM tb_compra";
          $result = mysqli_query($conn, $sql);
          $compra=1;
          while ($datos_sol = mysqli_fetch_array($result)){
            $compra=$datos_sol['nSolicitud']+1;
            } ?> 
          <input readonly class="form-control" type="number" name="nsolicitud" value="<?php echo $compra ?>" required> 
    </div>

    <div id="w" class="col-md-4" style="position: initial">
    <font color="black"><label id="inp1">Dependencia que Solicita</label></font>   
    <input type="text"  class="form-control" name="dependencia" id="um" required style="color: black;" value="Mantenimiento" readonly>
                     
    </div>
    <div id="w" class="col-md-4" style="position: initial">
    <font color="black"><label id="inp1">Plazo y Numero de Entregas</label></font> 
      <input  style=" color: black;" class="form-control" type="text" name="plazo" id="como3" required>
      <br>
    </div>
    <div id="w" class="col-md-4" style="position: initial">
    <label >Unidad Tecnica</label>
      <input style=" color: black;"  class="form-control" type="text" name="unidad_tecnica" id="como3" required>
      <br>
    </div>
    <div id="w" class="col-md-4" style="position: initial">
    <label >Suministros Solicita</label> 
      <input style=" color: black;"  class="form-control" type="text" name="descripcion_solicitud" id="como3" required>
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
</div>
    <div class="col-md-3">
                <div class="card">
            <div class="card-body">
            <label>Justificación por el OBS solicitado</label>
              <textarea rows="7" class="form-control" name="jus"  placeholder="" required id="floatingTextarea"></textarea>
            <br>
        <button id="buscar1" type="submit" name="form_compra2" class="btn  btn-success btn-lg my-2 text-center"  data-bs-toggle="tooltip" data-bs-placement="top" title="Solicitar">Guardar
                        <svg class="bi" width="20" height="20" fill="currentColor">
                        <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#save"/>
                        </svg>
        </button> 
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

</script>
</body>
</html>