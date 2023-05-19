    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <link rel="stylesheet" type="text/css" href="../../Plugin/bootstrap/css/sweetalert2.min.css">
        <link rel="stylesheet" type="text/css" href="../../Plugin/bootstrap/css/bootstrap.css">
        <script src="../../Plugin/bootstrap/js/sweetalert2.all.min.js"></script>
        <script src="../../Plugin/bootstrap/js/jquery-latest.js"></script>
        <script src="../../Plugin/bootstrap/js/bootstrap.min.js"></script>
    </head>
    <body><?php

    include ('../../Model/conexion.php');
    
    
    $solicitud_no     = $_POST['odt'];
    $departamento     = $_POST['depto'];
    $usuario          = $_POST['usuario'];
    $idusuario        = $_POST['idusuario'];
    $dia              = $_POST['dia'];
    $mes              = $_POST['mes'];
    $año              = $_POST['año'];

    //crud para guardar los productos en la tabla tb_vale
    $sql = "INSERT INTO tb_bodega (codBodega, departamento,usuario,idusuario,estado,Mes,Año) VALUES ('$solicitud_no', '$departamento','$usuario','$idusuario','Pendiente','$mes','$año')";
    $result = mysqli_query($conn, $sql);   
    $sql="UPDATE  tb_bodega SET estado = 'Pendiente',departamento='$departamento' WHERE codBodega='$solicitud_no'" ;

    $result = mysqli_query($conn, $sql);   
    for($i = 0; $i < count($_POST['cod']); $i++)

    {

        $codigo_producto  = $_POST['cod'][$i];
        $cod= $_POST['cod1'][$i];
        $nombre_articulo  = $_POST['desc'][$i];
        $u_m              = $_POST['um'][$i];
        $soli             = $_POST['cant'][$i];
        $cost             = $_POST['cu'][$i];
        $num_sol          = $_POST['odt'];


        $stock=0;
        $total=0;
        $almacen=0;
        $cods=0;

        $stockw=0;
        $totalw=0;
        $almacenw=0;
        $codsw=0;
        
        $sqlw = "SELECT codProductos,stock FROM tb_productos WHERE codProductos='$codigo_producto'";
        $resultw = mysqli_query($conn, $sqlw);
        $stock=0;
        while ($productosw = mysqli_fetch_array($resultw)){
            // $codsw=$productosw['cod'];
            $almacenw=$productosw['codProductos'];
            $stockw=$productosw['stock'];
            $totalw=$stockw-$soli;
        }
        

        $insert0 = "UPDATE  tb_productos SET stock='$totalw' WHERE codProductos='$almacenw'";
        $query0 = mysqli_query($conn, $insert0);
        if ($solicitud_no==$num_sol || $codigo_producto==$codigo_producto) {
           $sql = "SELECT codBodega,codigo,stock FROM tb_bodega db JOIN detalle_bodega b ON db.codBodega = b.odt_bodega ";
           $result = mysqli_query($conn, $sql);
           $stock=0;
           while ($productos = mysqli_fetch_array($result)){
            $cods=$productos['codBodega'];
            $almacen=$productos['codigo'];
            $stock=$productos['stock'];
            $total=$soli+$stock;
        }



        $insert1 = "UPDATE  detalle_bodega SET stock='$total' WHERE odt_bodega='$solicitud_no' and codigo='$almacen'";
        $query1 = mysqli_query($conn, $insert1);

        $insert3 = "UPDATE  historial SET Entradas='$total' WHERE Detalles='$solicitud_no' and No_Comprovante='$almacen'";
        $query3 = mysqli_query($conn, $insert3);

    if ($solicitud_no!=$cods || $codigo_producto!=$almacen) {
        $insert = "INSERT INTO detalle_bodega (codigo,descripcion,unidad_medida,stock,precio,odt_bodega) VALUES ('$codigo_producto','$nombre_articulo','$u_m','$soli','$cost','$num_sol')";
        $query2 = mysqli_query($conn, $insert);

        $sql3="INSERT INTO historial(descripcion,Concepto,unidad_medida,No_Comprovante,Entradas,Saldo,Detalles,idusuario,Mes,Año) VALUES('$nombre_articulo','Entrada Por Almacen','$u_m','$codigo_producto','$soli','$cost','$solicitud_no','$idusuario','$mes','$año')";
        $query1 = mysqli_query($conn, $sql3);


    }
}
if ($query0) {
 echo "<script>
 Swal.fire({
  title:'Realizado',
  text:'Su producto fue registrado correctamente',
  icon:'success',
  allowOutsideClick: false
  }).then((resultado) =>{
    if (resultado.value) {
        window.location.href='../../Vistas/Bodega/dt_bodega.php?cod=$solicitud_no';                               
    }
    });

    </script>";
}else {
    echo "<script>
    Swal.fire({
       title: 'ERROR',
       text: '¡Error! algo salió mal',
       icon: 'error',
       allowOutsideClick: false
       }).then((resultado) =>{
        if (resultado.value) {
            window.location.href='../../Vistas/Bodega/form_bodega_varios.php';                               
        }
        });

        </script>";
    }
}

    ?>
    <script >
     $(document).ready(function() {
        function disableBack() {
            window.history.forward()
        }
        window.onload = disableBack();
        window.onpageshow = function(e) {
            if (e.persisted)
                disableBack();
        }
    });
</script>
</body>
</html>