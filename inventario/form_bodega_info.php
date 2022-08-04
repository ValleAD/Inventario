<?php
session_start();
 if (!isset($_SESSION['signin'])>0) {
    # code...
    echo '
    <script>
        window.location ="log/signin.php";
        session_destroy();  
                </script>
die();

    ';
}
?>
<?php include ('templates/menu.php')?>
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

  }
</style>
        <br><br><br>
 <?php
    include 'Model/conexion.php';
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
    <section style="background:white;margin: 2%;padding: 1%;border-radius: 15px;">
 <form style="margin: 0%;position: 0; background: transparent;" method="POST" action="Controller/añadir_bodega.php">
    <div class="container-fluid" style="position: initial">
            <div class="row">
              <div class=" col-sm-4" style="position: initial">
                <label id="inp1">Departamento que solicita</b></label>   
               <div id="div" style = " max-height: 75px;width: 100%; overflow-y:scroll;"> 
                
                   <?php  
   $sql = "SELECT * FROM selects_departamento";
    $result = mysqli_query($conn, $sql);
    while ($productos = mysqli_fetch_array($result)){ ?>  
                             <input required id="<?php echo $productos['id'] ?>" type="radio" name="depto" value="<?php echo $productos['departamento'] ?>"> <label style="width: 100%;" id="label1" for="<?php echo $productos['id'] ?>" > <?php echo $productos['departamento'] ?></label><br>
 <?php }?>
                         </div>
                  </div>
            <div class="col-md-4" style="position: initial">
                <label id="inp1">O. de T. N°</b></label>   
                <?php 
                        $sql = "SELECT * FROM tb_bodega  ORDER BY codBodega DESC LIMIT 1";
                        $result = mysqli_query($conn, $sql);
                            $codBodega=1;
                        while ($productos = mysqli_fetch_array($result)){    
                            $codBodega=$productos['codBodega']+1;
                     }
                     ?>
                <input id="inp1"class="form-control" readonly type="number" name="odt" required value="<?php echo $codBodega ?>">
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
    </div><br>
      <?php include('Buscador_ajax/tablaProductos.php') ?>
         <center> <div class="col-md-3" style="padding: 0%;" > 
            <button id="buscar1" type="submit" name="solicitar" class="btn btn-success btn-lg  text-center  my-3"  data-bs-toggle="tooltip" data-bs-placement="top" title="Solicitar">Guardar
                        <svg class="bi" width="20" height="20" fill="currentColor">
                        <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#save"/>
                        </svg>
         </button></div></center>    
</form>
 </section>

    <?php } ?>

    <script>
    $(document).on('click', '.borrar', function (event) {
    event.preventDefault();
    $(this).closest('tr').remove();
});

</script>
</body>
</html>