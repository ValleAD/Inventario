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
$query="SELECT codVale FROM tb_vale";

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['consulta'])){
    echo '    ';



    $q=$conn->real_escape_string($_POST['consulta']);
    $query="SELECT codVale FROM tb_vale  WHERE 
        codVale LIKE '%".$q."%' GROUP BY codVale HAVING COUNT(*) ORDER BY codVale desc ";
        $result = mysqli_query($conn, $query);
         while ($productos = mysqli_fetch_array($result)){
            $codigo=$productos['codVale'];
            if ($_POST['consulta']==$codigo) {
                echo '<div class=" alert alert-warning alert-dismissible fade show  " style="position: initial;" role="alert">
                <strong style="font-size: 15px;">Este Código ya Existe</strong>
                </div>
                 <style>
                           #Guardar, #og1,#jus, .n1{
                                display: none;
                            }
                            #NoGuardar,#og,#jus1,.n2, .m-0{
                           
                                display: block;
                            }
                            @media (max-width: 800px){
                                .alert{
                                    margin-right: -6%;
                                    margin-left: -1.5%;
                                }
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
     <script src="../Plugin/bootstrap/js/jquery-latest.js"></script>
<script src="../Plugin/bootstrap/js/bootstrap.min.js"></script>