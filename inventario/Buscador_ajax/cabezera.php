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

        <div class="row" >   
 <div class="col-md-3 mb-2"style="position: initial;" >
    <form method="POST" action="">
            <input  type="text" name="q" class="form-control"  id="consulta" placeholder="Buscar el código del Producto">

    </div>
     <div class="col-md-2 mb-2"style="position: initial;" >
            <input type="submit" class="form-control btn btn-outline-primary" name="consulta" value="Buscar">
</form>
     </div>
</div>