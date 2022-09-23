<?php 

include '../Model/conexion.php';
session_start();
error_reporting(0);

?>

<!DOCTYPE html>
<html lang="en">
<head></head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registro de Usuarios</title>
</head>
<body>
	
</body>
</html>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="../styles/estilo_men.css">

    <link rel="stylesheet" href="../Plugin/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../Plugin/bootstrap/css/sweetalert2.min.css">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" sizes="32x32"  href="../img/log.png">
	<title>Register</title>
</head>
<body  style="background-image: url(../img/bg3.jpg);background-size: 100% 100%,100%;background-repeat: no-repeat;background-position: center;background-attachment: fixed;">
	 <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                                    <div class="card-body">
                                        <form method="POST"  id="regiLogin">
                                          	<div class="container">
                                          		<div class="row">
                    <div class="col-md-6" style="position: initial">
                       <label class="small mb-1">Nombre de usuario</label><br>
                        <input pattern="[A-Za-z0-9_-]{1,}"   class="form-control" type="text"  name="usuario" id="usuario" >
                    </div>
                    <div class="col-md-6" style="position: initial">
                      <label class="small mb-1">Nombre</label><br>
                        <input  class="form-control" type="text"  name="nombre" id="nombre" >
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-6" style="position: initial">
                     <label class="small mb-1">Apellido</label><br>
                        <input class="form-control" type="text"  name="Apellido" id="apellido" >
                        
                                                
                                        
                     
                    </div>
                    <div class="col-md-6" style="position: initial">
                      <label class="small mb-1">Establecimiento</label><br>
                     <input class="form-control" readonly name="Establecimiento" id="Establecimiento" value='Hospital Nacional Zacatecoluca PA "Santa Tereza"'>
                     
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6" style="position: initial">
                      <label class="small mb-1">Contraseña</label><br>
                        <input pattern="[A-Za-z0-9_-]{1,}" class="form-control" id="show" type="password"  name="password"  >
                      <input id="e"  onclick="myFuntion();" type="checkbox" name="id[]"> <label style="margin-top: 1.5%;"  id="h" for="e" ></label>
                  </div>
                  <div class="col-md-6" style="position: initial">
                      <label class="small mb-1">Confirmar Contraseña</label><br>
                        <input pattern="[A-Za-z0-9_-]{1,}" class="form-control" id="show1" type="password"  name="cpassword" >
                        <input id="s"  onclick="myFuntion1();" type="checkbox" name="id[]"> <label style="margin-top: 1.5%;"  id="h" for="s" ></label>
                  </div>
                </div>
                <br>
<div class="row">
                    
                    <div class="col-md-12" style="position: initial">
                        <label id="label"  class="small mb-1">Departamento</label><br>
             <div class="input-group">
                <input type="text" name="unidad" id="Unidad" class="form-control" disabled placeholder="Ingrese El Departamento o Unidad" id="Tipo" value="<?php echo $unidad ?>">
                <label class="btn input-group-text bg-primary" onclick="return unidad()" style="color: white;">Seleccionar</label>
                
             </div>
                       
 
          
                </div>
                <br>
                <div class="col-md-12" style="position: initial">
                 <label id="label" class="small mb-1">Tipo de Usuarios (Roles De Usuario)</label>
             <br>
             <div class="input-group">
             	<input type="text" name="tipo_usuario" class="form-control" disabled placeholder="Ingrese El tipo de Usuario" id="Tipo" value="<?php echo $tipo_usuario ?>">
             	<label class="btn input-group-text bg-success" id="btn1" style="color: white;">Seleccionar</label>
                
             </div><br>
            

                        </div>
                    </div>
                <div>
                    <div class="form-group" style="margin-top: 2%;">
                        <button type="submit" name="submit" class="btn btn-primary btn-block">Registrarse</button>
                    </div>
                          
                <div>

                    

                    </div>
                     <style type="text/css">
                    label{
                    color: black;
                 }
                    </style>
                
                </form> 

								
                                  
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="signin.php">¿Ya tienes una cuenta? Go to login</a></div>
                                    </div>
                                    </main>
                                </div>
                            </div>
	<style type="text/css">

		.container{
			margin-top: 1%;
		margin-bottom: 2%;
}
   
</style>
<script src="../Plugin/bootstrap/js/jquery-latest.js"></script>
<script src="../Plugin/bootstrap/js/bootstrap.min.js"></script>
<script src="../Plugin/bootstrap/js/jquery-latest.js"></script>
<script src="../Plugin/bootstrap/js/sweetalert2.all.min.js"></script>

<!--Es para la Contraseña Normarl-->
	<script type="text/javascript">
					function myFuntion() {
						var show = document.getElementById('show');
						if (show.type=='password') {
							show.type='text';
						}
						else{
							show.type='password';
						}

					}
				</script>
				<!--Es para la Contraseña Confirmacion-->
				<script type="text/javascript">
					function myFuntion1() {
						var show = document.getElementById('show1');
						if (show.type=='password') {
							show.type='text';
						}
						else{
							show.type='password';
						}

					}


    function unidad() {
        var unidad=$.trim($('#unidad').val())

        var segundos = 10;
     Swal.fire({
  icon: 'question', 
  showCloseButton: true,
  showConfirmButton: true,
  footer: 'Sistema De Inventario',
  html: '<form method="POST"  id="t"><p>Departamento o Unidad</p><select id="unidad" name="unidad"  class="form-control" required>'+
                     '<option selected disabled value="">Seleccinar</option>'+
                     '<?php $sql = "SELECT * FROM selects_departamento"; $result = mysqli_query($conn, $sql);while ($productos = mysqli_fetch_array($result)){ ?><option><?php echo $productos['departamento'] ?></option><?php }?>'+
                 '</select></form>',
                 allowOutsideClick: false
    }).then((result) => {
  if (result.isConfirmed) {
                var unidad=$.trim($('#unidad').val())
                  if(unidad==""){
                             Swal.fire({
  icon: 'warning', 
  text: "Debe de Ingrear el Departamento o Unidad",
  footer: 'Sistema De Inventario',
  allowOutsideClick: false
    });
        }else{
 var limpiar = document.getElementById('Unidad'); limpiar.value = unidad
        Swal.fire({icon: 'success',  text: unidad+" Agregado/@",allowOutsideClick: false,});
    }

  }});
     
    }
        $('#btn1').click(function(){
            var tipo_usuario1=$.trim($('#tipo_usuario1').val())

                 Swal.fire({
  icon: 'question', 
  showCloseButton: true,
  showConfirmButton: true,
  footer: 'Sistema De Inventario',
  html: '<form method="POST"  id="t"><p>Tipo de Usuarios (Roles De Usuario)</p><select id="tipo_usuario1" name="tipo_usuario" class="form-control" required>'+
                                          '<option selected disabled value="">Seleccinar</option>'+

                     '<option value="1">Administrador</option>'+
                     '<option value="2">Cliente</option>'+
                 '</select></form>',
                 allowOutsideClick: false
    }).then((result) => {
  if (result.isConfirmed) {

        var tipo_usuario1=$.trim($('#tipo_usuario1').val())
        var tipo=document.getElementById('btn1'); 
          if(tipo_usuario1==""){
    Swal.fire({
  icon: 'warning', 
  text: "Debe de Ingrear el Tipo de Usuarios (Roles De Usuario)",
  footer: 'Sistema De Inventario',
  allowOutsideClick: false
    });
}
        if(tipo_usuario1=="1"){

 var limpiar = document.getElementById('Tipo'); limpiar.value = "Administrador"
    
        Swal.fire({icon: 'success',  text: "Administrador Agregado",footer: 'Sistema De Inventario',allowOutsideClick: false});
    }if(tipo_usuario1=="2"){
        var limpiar = document.getElementById('Tipo');limpiar.value = "Cliente"
        Swal.fire({icon: 'success',  text: "Cliente Agregado",footer: 'Sistema De Inventario',allowOutsideClick: false});
    
    } 
   
  }
});
    
});


   $('#regiLogin').submit(function(e) {
   	e.preventDefault();
   	var usuario=$.trim($('#usuario').val())
   	var nombre=$.trim($('#nombre').val())
   	var apellido=$.trim($('#apellido').val())
   	var Establecimiento=$.trim($('#Establecimiento').val())
   	var unidad=$.trim($('#unidad').val())
   	var password=$.trim($('#show').val())
   	var password1=$.trim($('#show1').val())
   	var tipo_usuario=$.trim($('#Tipo').val())
    if (tipo_usuario=="Administrador") {
        var tipo_usuario1=$.trim($('#Tipo').val()).value="1"
                
    }
    if (tipo_usuario=="Cliente") {
        var tipo_usuario1=$.trim($('#Tipo').val()).value="2"
        
    }  	

    if (usuario=="" || nombre=="" || apellido=="" || password=="" || password1=="" || unidad=="" || tipo_usuario=="") {
   		Swal.fire({
  icon: 'warning',
  title: 'Falta Informacion por Completar',
  footer: 'Sistema De Inventario',
  allowOutsideClick: false
});
   	} else {
        var dataen ='usuario='+usuario +'&nombre='+nombre +'&apellido='+apellido +'&Establecimiento='+Establecimiento+
        '&unidad='+unidad +'&password='+password+'&password1='+password1+'&tipo_usuario='+tipo_usuario1;

   		$.ajax({
        url : 'regiLogin.php',
        type : 'POST',
        data : dataen,
        success:function(resp) {
        	 $('#respa1').html(resp);
}
      });
   	}

   });

</script>
</body>
</html>