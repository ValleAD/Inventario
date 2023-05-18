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
$tipo_usuario = $_SESSION['tipo_usuario'];?>

<?php include ('../../Model/conexion.php');

$tabla="";
$query="SELECT codProductos FROM tb_productos";

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['consulta'])){

    $q=$conn->real_escape_string($_POST['consulta']);
    $query="SELECT codProductos FROM tb_productos  WHERE 
        codProductos LIKE '%".$q."%' GROUP BY codProductos HAVING COUNT(*) ORDER BY codProductos desc ";
        $result = mysqli_query($conn, $query);
         while ($productos = mysqli_fetch_array($result)){
            $codigo=$productos['codProductos'];
            if ($_POST['consulta']==$codigo) {
                echo '<div class=" alert alert-warning alert-dismissible fade show" style="position: initial" role="alert">
                          <strong>Este codigo ya Existe</strong>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <style>
                                                    #Guardar{
                                display: none;
                            }
                            #NoGuardar{
                           
                                display: block;
                            }
                    @media (max-width: 800px){
                        #NoGuardar{
                                display: block;
                            }


                    } @media (min-width: 1000px){
                         #NoGuardar{
                          
                                display: block;
                            }

                    }
                        </style>';
            }
    }
}



$buscarAlumnos=$conn->query($query);



echo $tabla;
?>      