<?php
session_start();
 if (!isset($_SESSION['signin'])>0) {
    # code...
    echo '
    <script>
        alert("Por favor debes de iniciar sesión");
        window.location ="signin.php";
        session_destroy();  
                </script>
die();

    ';
}
    
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="#" />  
    <title>Hospital Nacional Santa Teresa de Zacatecoluca</title>
      <link rel="stylesheet" type="text/css" href="styles/style.css" > 
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
     
    <!-- CSS personalizado --> 
    <link rel="stylesheet" href="main.css">  
      
    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css"/>
    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
           
    <!--font awesome con CDN-->  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">  
      
  </head>
    
  <body> 
   <div id="head"  style="position: relative;
  height: 17% ;margin-top: -15">
   <div style="float: left; position: absolute;">
      <img src="img/log.png" height="90px">
    </div>
    <h1>Hospital Nacional Santa Teresa de Zacatecoluca</h1>
    <h3>Departamento de mantenimiento</h3>
   
  </div>
  <br>
    <div style="height:70px"></div>
    <?php
    
    if ( isset($_POST["cod"]) ) { 

      $fecha=$_POST['fech'];
      $Depto=$_POST['depto'];
      $Vale=$_POST['vale'];

      echo 
      '
     <form  style="position: all; width: 70%; height: 100%;margin-bottom: 5%;margin-top: -2%;" method="post" action="db_vale">
         <section>
     
        <div class="row">
          <div class="col-6">
        
              <label>Fecha:</label>
              <input class="form-control" disabled type="text" value="' .$fecha. '">
      
          </div>
          <div class="col">
        
              <label>Depto. o Servicio:</label>
              <input class="form-control" disabled type="text" value="' .$Depto. '">
    
          </div>
        </div>
        <div align="right">
            <label style="margin-right: 157px;">VALE No.</label>
            <div class="col-md-2">
              <input class="form-control" type="number" value="'.$Vale.'" style="margin-top: -25%;" required>
            </div>
        </div>
          <br>
           <br>
              ';
            }
              ?>

                  
</section>
  
  
        
    <!--Ejemplo tabla con DataTables-->
    <div class="container" style="background: white">
        <div class="row">
                <div class="col-lg-12">
                 
                    <div class="table-responsive">        
                        <table  id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    
                        
                        <thead>
                            <tr>
                                <th>Codigo</th>
                                <th>Fecha</th>
                                <th>Depto. o Servicio</th>
                                <th>VALE No</th>
                                <th>Descriocion</th>
                                <th>U/D</th>                               
                                <th>Cantidad</th>
                                <th>Costo Unitario</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                         <?php
                           for($i = 0; $i < count($_POST['cod']); $i++){
       
                          $codigo = $_POST['cod'][$i];
                          $des = $_POST['desc'][$i];
                          $um = $_POST['um'][$i];
                          $cantidad = $_POST['cant'][$i];
                          $cost = $_POST['cu'][$i];


                      $total = $cost * $cantidad; 

                      echo'
                            <tr>
                               <td>' .$codigo. '</td>
                               <td>' .$fecha. '</td>
                               <td>' .$Depto. '</td>
                               <td>' .$Vale. '</td>
                                <td>' .$des. '</td>
                                <td>' .$um. '</td>                           
                               <td>' .$cantidad. '</td>
                                <td>$' .$cost. '</td>
                                 <td>$' .$total. '</td>
                            </tr>';
                          }
                            ?>

                        </tbody> 

                       </table>    
                         
                   </div>
                </div>
        </div>  
    </div>   

       </form>
                  
          <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="jquery/jquery-3.3.1.min.js"></script>
    <script src="popper/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
      
    <!-- datatables JS -->
    <script type="text/javascript" src="datatables/datatables.min.js"></script>    
     
    <!-- para usar botones en datatables JS -->  
    <script src="datatables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>  
    <script src="datatables/JSZip-2.5.0/jszip.min.js"></script>    
    <script src="datatables/pdfmake-0.1.36/pdfmake.min.js"></script>    
    <script src="datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script src="datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>
     
    <!-- código JS propìo-->    
    <script type="text/javascript" src="main.js"></script>  
    
    
  </body>
</html>
