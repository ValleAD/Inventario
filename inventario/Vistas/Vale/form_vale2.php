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
        margin: -5%6%6%3%;
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
   $codigo= $_POST['id'];
if ($codigo=="") {
            echo'
          <script>
             alert("Debe de selecionar los productos");
               window.location ="form_vale1.php"; 
                      </script>
                      ';

}

  if (isset($_POST['solicitar'])){ ?>
        <section >
 <form style="background: transparent;" method="POST" action="../../Controller/Vale/añadir_vale.php">
    <div class="card">
            <div class="card-body">
            <div class="row">
              <div class="col-md-4" style="position: initial">
                <label id="inp1">Departamento que solicita</b></label>   
               <div class="div d" > 
                
                   <?php  
   $sql = "SELECT * FROM selects_departamento";
    $result = mysqli_query($conn, $sql);
    while ($productos = mysqli_fetch_array($result)){ ?>  
                             <input class="p2" required  id="<?php echo $productos['id'] ?>" type="radio" name="depto" value="<?php echo $productos['departamento'] ?>"> <label  style="width: 100%;" id="label1" for="<?php echo $productos['id'] ?>" > <?php echo $productos['departamento'] ?></label><br>
 <?php }?>
                         </div>   
                         <br>  
    <p align="right" class="p">Mostrar todos
        <svg class="bi" width="20" height="20" fill="currentColor">
        <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#caret-down-fill"/></svg></p>
    <p align="right" class="p1">Ocultar
        <svg class="bi" width="20" height="20" fill="currentColor">
        <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#caret-up-fill"/></svg></p>
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
        <button id="buscar1" type="submit" name="form_vale" class="btn  btn-success btn-lg my-2 text-center"  data-bs-toggle="tooltip" data-bs-placement="top" title="Solicitar">Guardar
                        <svg class="bi" width="20" height="20" fill="currentColor">
                        <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#save"/>
                        </svg>
        </button> 
    </div>
</div>
</div>
        </div>
</form>
 </section>

    <?php } ?>


    <script>
    $('.p1').hide();
    $('.p').click(function(){$(".d").removeClass("div");$('.p').hide();$('.p1').show();});   
    $('.p1').click(function(){$(".d").addClass("div");$('.p1').hide();$('.p').show();});


</script>

</body>
</html>