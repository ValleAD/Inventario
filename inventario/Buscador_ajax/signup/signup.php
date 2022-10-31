

<?php include ('../../Model/conexion.php');

$tabla="";
$query="SELECT username FROM tb_usuarios";

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['consulta'])){

    $q=$conn->real_escape_string($_POST['consulta']);
    $query="SELECT username FROM tb_usuarios  WHERE 
        username LIKE '%".$q."%' GROUP BY username HAVING COUNT(*) ORDER BY username desc ";
        $result = mysqli_query($conn, $query);
         while ($productos = mysqli_fetch_array($result)){
            $codigo=$productos['username'];
            if ($_POST['consulta']==$codigo) {
                echo '<div class=" alert alert-warning mt-3 p-1 " style="position: initial" role="alert">
                          <p style="font-size:14px"><b>Este Usuario ya Existe ingresa otro</b></p>
                        
                        </div>';
            }
    }
}



$buscarAlumnos=$conn->query($query);



echo $tabla;
?>      
     <script src="../Plugin/bootstrap/js/jquery-latest.js"></script>
<script src="../Plugin/bootstrap/js/bootstrap.min.js"></script>