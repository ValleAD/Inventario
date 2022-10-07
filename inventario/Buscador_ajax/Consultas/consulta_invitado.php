
<?php include ('../../Model/conexion.php');

$tabla="";
$query="SELECT cod,codProductos, categoria, catalogo, descripcion, unidad_medida, SUM(stock), precio, fecha_registro FROM tb_productos WHERE stock!=0 GROUP BY codProductos HAVING COUNT(*)  ORDER BY codProductos desc ";

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['consulta']))
{
    $q=$conn->real_escape_string($_POST['consulta']);
    $query="SELECT cod,codProductos, categoria, catalogo, descripcion, unidad_medida, SUM(stock), precio, fecha_registro FROM tb_productos  WHERE 
        codProductos LIKE '%".$q."%' or descripcion LIKE '%".$q."%' GROUP BY codProductos HAVING COUNT(*) ORDER BY codProductos desc ";
        $result = mysqli_query($conn, $query);
         while ($productos = mysqli_fetch_array($result)){
         $cantidad=$productos['SUM(stock)'];
        $stock=number_format($cantidad, 2,".",",");
    }
}


$buscarAlumnos=$conn->query($query);
if ($buscarAlumnos->num_rows > 0)
{
    $tabla.= '         <style>
             #ssas{display: block;}
             #td{display: none;}
             #div{display: block;}
             .well{display:block;}
         </style>';  if(isset($_POST['consulta'])){
                echo ' <style>#well{display:none;}

            #x{
                display: block;
            }
            #y{
                display: none;
            }
        </style>


    ';}echo '
 
    <table class="table table-responsive  table-striped" id="div" style=" width: 100%;">
     
                <thead>
                     <tr id="tr">
                <th style="width: 5%;">Código</th>
                <th style="width: 10%;">Catálogo</th>
                <th style="width: 17%;">Descripción Completa</th>
                <th style="width: 10%;">U/M</th>
                <th style="width: 10%;">Cantidad</th>
                <th style="width: 10%;">Costo Unitario</th>
                <th style="width: 10%;">Fecha Registro</th>
                <th style="width: 10%;" align="center">
                         <div style="position: initial;" class="btn-group mt-3 mx-2 " role="group" aria-label="Basic outlined example">
         
             <div class="form-group" style="position: initial;"> <button onclick = "return Validate()"   type="submit" name="solicitar" class=" form-control btn btn-success btn-sm text-center"  data-bs-toggle="tooltip" data-bs-placement="top" title="Solicitar">Solicitar</button><br class="div"></div>

  
         </form>
 </div>
                  </th> 
                   </tr>
</thead>
</table>
<div id="div" style = " max-height: 442px;  overflow-y:scroll;overflow-x:none;">
    <table id="tblElecProducts" class="table">
    <tbody>';
                $n=0;
    while($productos= $buscarAlumnos->fetch_assoc())
    {
                $categoria=$productos['categoria'];
                $des=$productos['descripcion'];
                if ($des=="") {
                    $des="DESCRIPTION NO DISPONIBLE";
                }else{
                   $des=$productos['descripcion']; 
                }
                if ($categoria=="") {
                    $categoria="Sin categorias";
                
                }else{
                $categoria=$productos['categoria'];
                }
            
        $precio=$productos['precio'];
       $precio1=number_format($precio, 2,".",",");
       $cantidad=$productos['SUM(stock)'];
        $stock=number_format($cantidad, 2,".",",");
        $tabla.='
        <tr id="tr">
              
            <td style="width:7%;min-width: 100%;" id="th" data-label="Código">'.$productos['codProductos'].'</td>
            <td style="width:7%;min-width: 100%;" id="th" data-label="Código del Catálogo">'.$productos['catalogo'].'</td>
            <td style="width:20%;min-width: 100%;" id="th" data-label="Descripción">'.$productos['descripcion'].'</td>
            <td style="width:10%;min-width: 100%;" id="th" data-label="Unidad de Medida">'.$productos['unidad_medida'].'</td>
            <td style="width:10%;min-width: 100%;" id="th" data-label="Cantidad">'.$stock.'</td>
            <td style="width:10%;min-width: 100%;" id="th" data-label="Precio">'.$precio1.'</td>
            <td style="width:10%;min-width: 100%;" id="th" data-label="Fecha">'.$productos['fecha_registro'].'</td>
            <td style="width:11%;min-width: 100%;" id="th" data-label="solicitar">
            
            
                 <input class="case"  id="'.$productos["codProductos"] .'" type="checkbox" name="id[]" value="'.$productos["codProductos"] .'"> <label  id="l" for="'.$productos["codProductos"] .'" > </label>  
           
         </tr>
        ';
    }

    $tabla.='</tbody></table></div> ';
} else
    {
        $tabla="
        <h1 class=' text-center bg-danger my-4' style='font-size:1.5em; padding:3%; border-radius:5px;color :white;'>No se encontraron coincidencias con sus criterios de búsqueda. <a href='' style='font-size: 30px' class='close'>&times;</a></h1> 

        ";
    }


echo $tabla;
?>      
     <script src="../../Plugin/bootstrap/js/validarInput.js"></script>