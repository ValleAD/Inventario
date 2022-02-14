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
	<title>Cambiar Estado Bodega</title>
</head>
<body>
		<?php $id =$_GET['id'];?> 
<form action="Controller/Aprobar_vale.php" method="POST" style="background: transparent; ">
  <h3 align="center">Actualizando el Estado Producto</h3>
    <div class="container" style="background: rgba(0, 0, 0, 0.6); width: 70%; margin: auto; border-radius: 9px; color:#fff; font-weight: bold;">
        <div class="row">
            <div class="col-6 col-sm-4" style="position: initial; margin: auto; margin-top: 2%">
            
                <input type="hidden" name="id" value="<?php  echo $id; ?>">
                <label for="">Cambiar el estado</label><br> 
                    <select  class="form-control" name="estado" style="cursor: pointer" required>
                        <option>[Seleccione]</option>
                        <option>Aprobado</option>
                        <option>Rechazado</option>
                        
                    </select>
            </div>
         </div>
        <hr>
        <div class="row">
            <div class="col-6 col-sm-4" style="position: initial; margin: auto; margin-bottom: 2%;">
                <button type="submit" class ="btn btn-primary" style="background:rgb(12, 139, 8); margin-right: 1%; border: none">Guardar Cambios</button>
                <a href="Detalle_Bodega.php" class ="btn btn-primary" style="background:rgb(184, 8, 8); border: none">Cancelar</a>
            </div>
        </div>
    </div>
</form>
</body>
</html>