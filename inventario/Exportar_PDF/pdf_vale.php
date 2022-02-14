<?php

if(isset($_POST['cod'])){

    $depto = $_POST['depto'];
    $fech = $_POST['fech'];
    $encargado = $_POST['usuario'];
    
        
    $final = 0;

// incluir cargador automático 
require_once  '../Plugin/dompdf/autoload.inc.php' ;

// instanciar y usar la clase dompdf 
$dompdf = new  Dompdf ();
$dompdf -> loadHtml ( 'hola mundo' );



    $vale = $_POST['vale'];
    
   

for($i = 0; $i < count($_POST['cod']); $i++)
{
   
    $codigo = $_POST['cod'][$i];
    $des = $_POST['desc'][$i];
    $um = $_POST['um'][$i];
    $cantidad = $_POST['cant'][$i];
    $cost = $_POST['cost'][$i];
    $estado = $_POST['estado'][$i];
    $tot = $_POST['tot'][$i];

}
}

?>