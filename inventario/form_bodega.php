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
<html lang="en">
<head>
    <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/estilo.css" > 
    <link rel="stylesheet" type="text/css" href="styles/estilos_tablas.css"> 
    <link rel="icon" type="image/png" sizes="32x32"  href="img/log.png">  
    <title>Solicitud Bodega</title>
</head>
<body>
<style type="text/css">
        @media (min-width: 1080px){
         #section{
        margin-top: 5%;
        margin-left: 16%;
        width: 69%;

       }
       
    }
</style>
<section id="section">
<form action="form_bodega.php" method="post">
<br>
    <div class="container">
        <div class="row">
    <div class="col" style="position: initial">
     <label>¿Cuántos productos desea solicitar de la bodega?</label>
    </div>
   <div style="margin-bottom: 1%;margin-right: 1%;">
        <input id="inp" style="position: initial" class="form-control" type="number" name="cantidad" value="1"> 
      
    </div>
   <div>
        <input id="btn" class="btn btn-success" type="submit" value="Aceptar" name="aceptar"> 
    </div>
  </div>
</div>
</form>
<?php
    if(isset($_POST['cantidad'])){
        $cantidad = $_POST['cantidad'];
        for($x = 1; $x <= $cantidad; $x++){

            echo'
            <form action="form_bodega.php" method="post" style="margin-top: 2%;">
            <div class="container" style="position: initial">
                <div class="row">
                    <div style="position: initial;" class="col-6 col-sm-3">
                    <input id="inp1 "  class="form-control" required type="number" name="codigo[]" id="codigo" style="margin-bottom: 2%;" placeholder="Ingrese el código del Producto">
                    </div>
                </div>
            </div>
            ';
        }
        echo'
        <input  type="submit" class="btn btn-success" value="Buscar" name="buscar" id="buscar" >
        <style>

            #buscar{
            margin-top: 1%;
            margin-left: 2.5%; 
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
        </style>
        </form>';
    }
?>
     
<?php  
include 'Model/conexion.php';
if(isset($_POST['codigo'])){

    echo'
    <br>
    <form style="margin-bottom: 15%;" action="Controller/añadir_bodega.php" method="post">
        
        <div class="container" style="position: initial">
            <div class="row">
            <div class="col-6.5 col-sm-4" style="position: initial">
                <div class="form-group" >
                    <label>Departamento que lo solicitará <b>*</b></label>
                    <div class="col-md-16" >
                    <div class="invalid-feedback">
                        Por favor seleccione una opción.
                      </div>
                      <select  class="form-control" name="departamento" id="departamento">
                        <option selected disabled value="">Selecione</option>
                        <option>Direccion Hospital</option>
                        <option>Subdirección Hospital</option>
                        <option>Sección Equipo Médico</option>
                        <option>Sección Equipo Básico</option> 
                        <option>Seccion Planta Fisica y Monitoreo</option>
                        <option>Departamento Mantenimiento Local</option>
                        <option>Servicio Centro Quirúrgico</option>
                        <option>Departamento Lavamdería y Ropería</option>
                        <option>Sevicio Medicina Hombre</option>
                        <option>Sevicio Medicina Mujeres</option>
                        <option>Unidad Sala de Operacion</option>
                        <option>Unidad Sala de Partos</option>
                        <option>Sevicio Almacen</option>
                        <option>Sevicio Consulta Externa</option>
                        <option>Unidad Neonatos</option>
                        <option>Unidad Maxima Urgencia</option>
                        <option>Sevicio Trabajo Social</option>
                        <option>Área Saneamiento Ambiental</option>
                        <option>Unidad Financiara Institucional</option>
                        <option>Departamento Estadística y Documento Medicos</option>
                        <option>Departamento Activo Fijo</option>
                        <option>Unidad Auditoria Interna</option>
                        <option>Departamento Recursos Humanos</option>
                        <option>Unidad Asesora de Suministro Médicos</option>
                        <option>Area Servicios Auxiliares</option>
                        <option>Servicio Obstetricia</option>
                        <option>Área Clinica De Úlceras Y Heridas</option>
                        <option>Unidad Atención Integral e Integrada ala Salud Sexual Reproductiva</option>
                        <option>Departamento Terapia Dialítica</option>
                        <option>Área Residencial Médica</option>
                        <option>Unidad Cuidados Especiales</option>
                        <option>Área Epidemiología</option>
                        <option>Area COVID 19</option>
                      </select>
                    </div>
                  </div>

    </div>
            <div style="position: initial;" class="w col-6.5 col-sm-4">
                <label id="inp1" >O. DE T. No. <b>*</b></label>   
                <input id="inp1" class="form-control" type="number" name="odt" required>
            </div>
            <div style="position: initial;" class="w col-6.5 col-sm-4">
            <label id="inp1" >Usuario <b>*</b></label>   
            <input id="inp1" class="form-control" type="text" name="usuario" required>
        </div>
        </div>
        <br>

        <table class="table" style="margin-bottom:3%">
            
            <thead>
              <tr id="tr">
                <th><strong>Código</strong></th>
                <th><strong>Descripción</strong></th>
                <th><strong>U/M</strong></th>
                <th><strong>Cantidad</strong></th>
                <th><strong>Costo unitario</strong></th>
            </tr>
              <tr>
              <center> <td id="td" colspan="5" style="background: red;"><h4 align="center">No se encontraron ningun resutados 😥</h4></td></center> 

            </tr>
             </thead>
            <tbody>';


           


    for($i = 0; $i < count($_POST['codigo']); $i++){

    
    $codigo = $_POST['codigo'][$i];
    $sql = "SELECT * FROM tb_productos WHERE codProductos = '$codigo'";
    $result = mysqli_query($conn, $sql);

    
    while ($productos = mysqli_fetch_array($result)){ ?>    
        <style type="text/css">
        #td{
        display: none;
    }

</style>
    
            <tr>
               <td data-label="Codigo"><input style="background:transparent; border: none; width: 100%;color: black;" type="number"  class="form-control" readonly name="cod[]" value ="<?php  echo $productos['codProductos']; ?>"></td>
               <td data-label="Descripción">
                <textarea style="background:transparent;color: black;border: none;" cols="10" rows="1" readonly name="desc[]" id="" cols="10" rows="3" class="form-control"><?php  echo $productos['descripcion']; ?></textarea>
                </td>
               <td data-label="Unidad De Medida"><input  style="background:transparent; border: none; width: 100%;color: black;"type="text"  class="form-control" readonly name="um[]" value ="<?php  echo $productos['unidad_medida']; ?>"></td>
               <td data-label="Cantidad"><input  style="background:transparent; border: none; width: 100%;color: black;"type="number"  class="form-control"  name="cant[]" values = "<?php  echo $productos['stock']; ?>"></td>
               <td data-label="Costo Unitario"><input style="background:transparent; border: none; width: 100%;color: black;" type="number"  class="form-control" readonly name="cu[]" value ="<?php  echo $productos['precio']; ?>"></td>    
            </tr>
   
        <?php }
    }
    


    echo '    </tbody>
        </table>

    
    <input class="btn btn-lg" type="submit" value="Enviar" id="enviar" name="submits">
        <style>
            #enviar{
            margin-left: 1.5%; 
            background: rgb(5, 65, 114); 
            color: #fff; margin-bottom: 2%; 
            border: rgb(5, 65, 114);
            }
            #enviar:hover{
            background: rgb(9, 100, 175);
            } 
            #enviar:active{
            transform: translateY(5px);
            } 
            form{
    margin: auto;
}
        </style>
    </form>';
}
?>
</section>

</body>
</html>