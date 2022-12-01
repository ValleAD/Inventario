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
$tipo_usuario = $_SESSION['tipo_usuario'];?>


<?php include ('../../Model/conexion.php');

$tabla="";
$query="SELECT catalogo FROM tb_productos";

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['consulta']))
{

    $q=$conn->real_escape_string($_POST['consulta']);
    $query="SELECT catalogo FROM tb_productos  WHERE 
        catalogo LIKE '%".$q."%' GROUP BY catalogo HAVING COUNT(*) ORDER BY catalogo desc ";
        $result = mysqli_query($conn, $query);
         while ($productos = mysqli_fetch_array($result)){
            $codigo=$productos['catalogo'];
            if ($_POST['consulta']==$codigo) {
                echo '<div class=" alert alert-warning alert-dismissible fade show" style="position: initial" role="alert">
                          <strong style="font-size: 15px;">Este Catálogo ya Existe</strong>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <style>
                            #Guardar{
                                display: none;
                            }
                            #NoGuardar{
                            margin-left: -10%;
                                display: block;
                            }
                            #ver{
                                 margin-top: -7%;
                                margin-left: 10%;
                            }
                    @media (max-width: 800px){
                        #NoGuardar{
                            margin-left: -35%;
                                display: block;
                            }
                            #ver{
                                 margin-top: -14.5%;
                                margin-left: 10%;
                            }

                    } @media (min-width: 1000px){
                         #NoGuardar{
                            margin-left: -15%;
                                display: block;
                            }
                            #ver{
                                 margin-top: -8.5%;
                                margin-left: 10%;
                            }
                    }
                        </style>';
            }
    }
}




$buscarAlumnos=$conn->query($query);



echo $tabla;
?>      
     <script src="../Plugin/bootstrap/js/jquery-latest.js"></script>
<script src="../Plugin/bootstrap/js/bootstrap.min.js"></script>