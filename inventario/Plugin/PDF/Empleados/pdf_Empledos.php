    <?php ob_start();
    include ('../../../Model/conexion.php') ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Empleados en PDF</title>
       <link rel="icon" type="image/png" sizes="32x32"  href="../../../img/log.png">
        
    </head>
    <body style="font-family: sans-serif;">
        <img src="../../../img/hospital.png" style="width:20%">
        <img src="../../../img/log_1.png" style="width:20%; float:right">
<h3 align="center" style="margin-top: 2%;">MINISTERIO DE SALUD</h3>
<h3 align="center" style="margin-top: 2%;">HOSPITAL NACIONAL SANTA TERESA</h3>
<h5 align="center" style="margin-top: 2%;">EMPLEADOS</h5>
<?php if (isset($_POST['user'])) {?>
    <table style="width: 100%; border: 1px solid #ccc;border-collapse: collapse;">
            <thead style="background-color: #46466b;color: white;">     
            <tr style="border: 1px solid #ddd;">
            <th style="width:5%;font-size: 12px;">Usuario</th>
            <th style="width:10%;font-size: 12px;">Nombre Completo</th>
            <th style="width:15%;font-size: 12px;">Establecimiento</th>
            <th style="width:10%;font-size: 12px;">Departamento a que Pertenece</th>
            <th style="width:10%;font-size: 12px;">Cuenta</th>
                   <tr> <td align="center" id="td" colspan="4"><h4>No se encontraron resultados 😥</h4></td></tr>

        </tr>
    </thead>
    <tbody>
  <?php

   $sql = "SELECT * FROM `tb_usuarios` ";
   

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
        <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;"><?php echo $username ?></td>
        <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;"><?php echo $productos['firstname']," ",$productos['lastname']; ?></td>
        <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;"><?php echo $Establecimiento ?></td>
        <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;"><?php echo $unidad ?></td>
        <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;"><?php echo $u ?></td>
        <?php } ?>
    </tr>
    </tbody>
</table> 
<?php }
   if (isset($_POST['user2'])) {
              $cod=$_POST['user1']; ?>

    <table style="width: 100%; border: 1px solid #ccc;border-collapse: collapse;">
            <thead style="background-color: #46466b;color: white;">     
            <tr style="border: 1px solid #ddd;">
            <th style="width:5%;font-size: 12px;">Usuario</th>
            <th style="width:10%;font-size: 12px;">Nombre Completo</th>
            <th style="width:15%;font-size: 12px;">Establecimiento</th>
            <th style="width:10%;font-size: 12px;">Departamento a que Pertenece</th>
            <th style="width:10%;font-size: 12px;">Cuenta</th>
                   <tr> <td align="center" id="td" colspan="4"><h4>No se encontraron resultados 😥</h4></td></tr>

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
        <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;"><?php echo $username ?></td>
        <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;"><?php echo $productos['firstname']," ",$productos['lastname']; ?></td>
        <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;"><?php echo $Establecimiento ?></td>
        <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;"><?php echo $unidad ?></td>
        <td style="text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;"><?php echo $u?></td>
        <?php } ?>
    </tr>
    </tbody>
</table> 
<?php } ?>
    </body>
    </html>
                <?php $html=ob_get_clean();
                     // echo $html 
    require_once '../../dompdf/autoload.inc.php';
    // reference the Dompdf namespace
    use Dompdf\Dompdf;
    use Dompdf\Options;

    // instantiate and use the dompdf class
    $dompdf = new Dompdf();
    $options = $dompdf->getOptions();
    $options->setIsHtml5ParserEnabled(true);
    $dompdf->setOptions($options);
    $dompdf->loadHtml($html);
    $dompdf->setPaper('letter');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $dompdf->stream("pdf_vale.pdf",array("Attachment"=>0));
            ?>