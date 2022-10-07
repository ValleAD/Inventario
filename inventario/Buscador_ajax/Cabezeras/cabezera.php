
       <div class="row p-2" >   
 <div class="col-md-3 mb-2"style="position: initial;" >
            
<div style="position: initial;" class="input-group">
                 
            <input type="text" style="position: initial;" name="busqueda" class="form-control"  id="busqueda" placeholder="Buscar Código ó Descripción">
                      <label onclick="return validar1()" class="input-group-text input" for="inputGroupSelect01">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#x"/>
                </svg>
                 </label>
                 </div>
       
    </div>
    <div class="col-md-9 mb-2" style="position: initial;float: right;" >
        <div id="div">

<form method="POST" action="" style="float: right;margin-left: 0.5%;">
    <input type="hidden" name="columna" value="codProductos">
    <input type="hidden" name="tipo" value="desc">
    
       <button id="desc" type="submit" name="Consultar" class="form-control">Descendente</button>
    
<?php if (isset($_POST['Consultar'])) {

        if ($_POST['tipo']=="desc") {?>
             <style>
           #desc{
            display: none;
           }
           #desc1{
            display: block;
           }
       </style>
<button id="desc1" name="Consultar" class="form-control" type="button" style="background-color:green ;position: initial; border-radius:5px;text-align:center; color: white;">Descendente</button>
    <?php } }?>
</form>


<form method="POST" action="" style="float: right;margin-left: 0.5%;">
    <input type="hidden" name="columna" value="codProductos">
    <input type="hidden" name="tipo" value="asc">
    
       <button id="asc" type="submit" name="Consultar" class="form-control">Ascendente</button>
    
<?php if (isset($_POST['Consultar'])) {

        if ($_POST['tipo']=="asc") {?>
             <style>
           #asc{
            display: none;
           }
           #asc1{
            display: block;
           }
       </style>
<button id="asc1" name="Consultar" class="form-control" type="button" style="background-color:green ;position: initial; border-radius:5px;text-align:center; color: white;">Ascendente</button>
    <?php } }?>
</form>
<p style="float: right;margin-left: 0.5%;margin-top: .5%;">Ordenar por</p>

</div>

</div>
   
</div>
     <script>
    $(obtener_registros());

function obtener_registros(consulta)
{
    $.ajax({
        url : '../../Buscador_ajax/Consultas/Consulta2.php',
        type : 'POST',
        dataType : 'html',
        data : { consulta: consulta },
        })

    .done(function(resultado){
        $("#tabla_resultado").html(resultado);
    })
}

$(document).on('keyup', '#busqueda', function()
{
    var valorBusqueda=$(this).val();
    if (valorBusqueda!="")
    {
        obtener_registros(valorBusqueda);
    }
    else
        {
            obtener_registros();
        }
});
var limpiar = document.getElementById('busqueda');
                    function validar1() {
                        limpiar.value = '';
                    }
</script>