<?php if ($tipo_usuario==1) { ?>
	                <div id="div">
<form method="POST" action="" style="float: right;margin-left: 0.5%;">
    <input type="hidden" name="columna" value="codVale">
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
    <input type="hidden" name="columna" value="codVale">
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

	<?php } if ($tipo_usuario==2) {?>
		<div id="div">
<form method="POST" action="" style="float: right;margin-left: 0.5%;">
    <input type="hidden" name="columna" value="codVale">
    <input type="hidden" name="tipo" value="desc">
    
       <button id="desc" type="submit" name="Consultar1" class="form-control">Descendente</button>
    
<?php if (isset($_POST['Consultar1'])) {

        if ($_POST['tipo']=="desc") {?>
             <style>
           #desc{
            display: none;
           }
           #desc1{
            display: block;
           }
       </style>
<button id="desc1" name="Consultar1" class="form-control" type="button" style="background-color:green ;position: initial; border-radius:5px;text-align:center; color: white;">Descendente</button>
    <?php } }?>
</form>


<form method="POST" action="" style="float: right;margin-left: 0.5%;">
    <input type="hidden" name="columna" value="codVale">
    <input type="hidden" name="tipo" value="asc">
    
       <button id="asc" type="submit" name="Consultar1" class="form-control">Ascendente</button>
    
<?php if (isset($_POST['Consultar1'])) {

        if ($_POST['tipo']=="asc") {?>
             <style>
           #asc{
            display: none;
           }
           #asc1{
            display: block;
           }
       </style>
<button id="asc1" name="Consultar1" class="form-control" type="button" style="background-color:green ;position: initial; border-radius:5px;text-align:center; color: white;">Ascendente</button>
    <?php } }?>
</form>
<p style="float: right;margin-left: 0.5%;margin-top: .5%;">Ordenar por</p>
      
</div>
		<?php } ?>