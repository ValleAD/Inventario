<?php 

include ('../../../Model/conexion.php');

 ?>
 <!DOCTYPE html>
 <html>
 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Exportar Empleados</title>
        <link rel="stylesheet" type="text/css" href="../../../bootstrap/css/bootstrap.css">
   <link rel="stylesheet" type="text/css" href="../../../styles/estilos_tablas.css">
 </head>
 <body>

<img src="../../../img/hospital.png" style="width:20%">
    <img src="../../../img/log_1.png" style="width:20%; float:right">
<h3 align="center" style="margin-top: 2%;">MINISTERIO DE SALUD</h3>
<h3 align="center" style="margin-top: 2%;">HOSPITAL NACIONAL SANTA TERESA</h3>
<h5 align="center" style="margin-top: 2%;">EMPLEADOS</h5>

<?php if (isset($_POST['Empleados'])) { ?>
    <table class="table table-responsive"  style=" width: 100%;margin: 0;">

    <thead>
        <tr id="tr">
            <th style="width:5%;font-size: 14px;">Usuario</th>
            <th style="width:10%;font-size: 14px;">Nombre Completo</th>
            <th style="width:20%;font-size: 14px;">Establecimiento</th>
            <th style="width:10%;font-size: 14px;">Departamento a que Pertenece</th>
            <th style="width:10%;font-size: 14px;">Cuenta</th>
                   <tr> <td align="center" id="td" colspan="7"><h4>No se encontraron resultados 😥</h4></td></tr>

        </tr>
    </thead>
    <tbody>
  <?php

   $sql = "SELECT * FROM `tb_usuarios`";

        $result = mysqli_query($conn, $sql);
        
 while ($productos = mysqli_fetch_array($result)){
    $username= $productos['username'];
    $unidad=$productos['unidad'];
    $Establecimiento= $productos['Establecimiento'];
                if ($unidad=="") {
                    $unidad="Sin unidad";
                
                }else{
                $unidad=$productos['unidad'];
                }
        if ($productos['tipo_usuario']==1) {
            $u='Administrador';
    }else if($productos['tipo_usuario']==2){
        $u='Cliente';
    } if($productos['Habilitado']=="No"){
    $u='Cuenta Desabilitada';
}
    ?>
     <style type="text/css">
     #td{
    text-align:center;
        display: none;
    }
</style>
 <tr style="border: 1px solid #ccc;border-collapse: collapse;">
       <td data-label="Usuario" style="font-size: 12px;"><?php echo $username ?></td>
        <td data-label="Nombre Completo" style="font-size: 12px;"><?php echo $productos['firstname']," ",$productos['lastname']; ?></td>
        <td data-label="Establecimiento" style="font-size: 12px;"><?php echo $Establecimiento ?></td>
        <td data-label="Departamento a que Pertenece" style="font-size: 12px;"><?php echo $unidad ?></td>
        <td data-label="Cuenta" style="font-size: 12px;"><?php echo $u ?></td>
        <?php } ?>
    </tr>
    </tbody>
</table> 
<?php }
   if (isset($_POST['user2'])) {
              $cod=$_POST['user1']; ?>

<table class="table table-responsive"  style=" width: 100%;margin: 0;">

    <thead>
        <tr id="tr">
            <th style="width:5%;font-size: 14px;">Usuario</th>
            <th style="width:10%;font-size: 14px;">Nombre Completo</th>
            <th style="width:20%;font-size: 14px;">Establecimiento</th>
            <th style="width:10%;font-size: 14px;">Departamento a que Pertenece</th>
            <th style="width:10%;font-size: 14px;">Cuenta</th>
                   <tr> <td align="center" id="td" colspan="7"><h4>No se encontraron resultados 😥</h4></td></tr>

        </tr>
    </thead>
    <tbody>
  <?php

   $sql = "SELECT * FROM `tb_usuarios` WHERE username LIKE '%".$cod."%' or lastname LIKE '%".$cod."%' or firstname LIKE '%".$cod."%'";

        $result = mysqli_query($conn, $sql);
        
 while ($productos = mysqli_fetch_array($result)){
    $username= $productos['username'];
    $unidad=$productos['unidad'];
    $Establecimiento= $productos['Establecimiento'];
                if ($unidad=="") {
                    $unidad="Sin unidad";
                
                }else{
                $unidad=$productos['unidad'];
                }
        if ($productos['tipo_usuario']==1) {
            $u='Administrador';
    }else if($productos['tipo_usuario']==2){
        $u='Cliente';
    } if($productos['Habilitado']=="No"){
    $u='Cuenta Desabilitada';
}
    ?>
     <style type="text/css">
     #td{
    text-align:center;
        display: none;
    }
</style>
 <tr style="border: 1px solid #ccc;border-collapse: collapse;">
        <td data-label="Usuario" style="font-size: 12px;"><?php echo $username ?></td>
        <td data-label="Nombre Completo" style="font-size: 12px;"><?php echo $productos['firstname']," ",$productos['lastname']; ?></td>
        <td data-label="Establecimiento" style="font-size: 12px;"><?php echo $Establecimiento ?></td>
        <td data-label="Departamento a que Pertenece" style="font-size: 12px;"><?php echo $unidad ?></td>
        <td data-label="Cuenta" style="font-size: 12px;"><?php echo $u ?></td>
        <?php } ?>
    </tr>
    </tbody>
</table> 
<?php } ?>
 </body>
 </html>
<script type="text/javascript">
window.print();
</script>