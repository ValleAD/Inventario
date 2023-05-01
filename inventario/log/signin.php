<?php 

include '../Model/conexion.php';

session_start();

error_reporting(0);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="../styles/estilo_men.css">
    <link rel="stylesheet" href="../Plugin/bootstrap/css/bootstrap.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" sizes="32x32"  href="../img/log.png">
    <link rel="stylesheet" type="text/css" href="../Plugin/bootstrap/css/sweetalert2.min.css">
	<title>Sign In </title>
</head>
<body style="background-image: url(../img/bg1.jpg);background-size: 100% 100%,100%;
    background-repeat: no-repeat;
    background-position: center;
    background-attachment: fixed;
    font-family: Gill Sans Ultra Bold;">
<style type="text/css">


button:hover{
	color: white;
	background:rgb(9, 94, 61);

}
</style>

  <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
									   <form id="formlogin" method="POST" >
									   	<p id="respa1"></p>
									   	 <div class="form-group">
									   	<label class="small mb-1">Usuario:</label>
									   	<input pattern="[A-Za-z0-9_-]{1,15}" type="text" class="form-control py-4" name="username" placeholder="Ingrese el Usuario" id="username">
									   </div>
									   <div class="form-group">
                                            	<label class="small mb-1" for="inputPassword">Password</label>
                                           		<input  pattern="[A-Za-z0-9_-]{1,15}"  class="form-control py-4" id="password" type="password" placeholder="Ingrese la Contraseña"   method="POST" class="form-control" type="password" name="password">
                                            <input id="e"  onclick="myFuntion();" type="checkbox" name="id[]"> <label style="margin-top: 1.5%;"  id="h" for="e" ></label>

                                        </div>
									   	<button type="submit" class="btn btn-primary btn-block env ">Enviar</button>
									   	<p id="respa1"></p>
									   </form>
                                    </div>
                                    <?php if (isset($_POST['submit'])) { ?>
                                    	<?php echo $eror ?>
                           <?php } ?>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="signup.php">No tienes cuenta ? Registrarse</a></div>
                                        <div class="small mt-2">

                                        	<form action="" method="POST">
                                        	<button class="btn btn-info" type="submit" name="Invitado">Modo Inviado</button>
                                        	
                                        </form>
                                        <?php if (isset($_POST['Invitado'])) {
                                        		?>
                                        		<style type="text/css">.btn-info, .card-body, a{display: none;}</style>
                                        		<br>
                                        		<form action="" method="POST">
	<div class="form-group" style="position: ; margin: 2%">
                      <label>Ingrese su Nombre Completo</label> 
                 <div style="position: initial;" class="input-group mb-3">
                 
                      <input style="position: initial;" id="limpiar" type="text" onkeypress="return validar(event)" name="Invitadocliente" class="form-control"  required>
                      <input type="hidden" name="tipo_usuario" value="0">
                      <label onclick="return validar1()" class="input-group-text input" for="inputGroupSelect01">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#x"/>
                </svg>
                 </label>
                  </div>
                  </div>
                                        			<br>
                       	<div style="position: initial;" class="input-group mb-3">
                  				<input style="position: initial;" onclick="return regresar()" type="button" class="form-control btn btn-danger mr-2"  required value="Regresar">
                  				<input class="form-control btn btn-success" type="submit" name="Invitado1" value="Entrar">
                  		</div>
                                        			
                                        		</form>
                                        		<?php 
                                        	}if (isset($_POST['Invitado1'])) {
                                        		$d=$_POST['Invitadocliente'];
                                        		$a=$_POST['tipo_usuario'];
                                        		
                                        			$_SESSION['Invitado1'] = $d;
                                        			$_SESSION['tipo_usuario1'] = $a;
                                        		 header("Location: Invitado/invitado.php");
                                        		} ?>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            
        </div>
   <style type="text/css">
						.container{
							margin-bottom: 5%;
					}
					.input{
						background: pink;
					}
				.input:hover{
					background: pink;
					color: white;

				}
					
				</style>
				<script type="text/javascript">
					function regresar() {
						  window.location =""; 
					}
						var limpiar = document.getElementById('limpiar');
					function validar1() {
						limpiar.value = '';
					}
				</script>
				<script type="text/javascript">
					function myFuntion() {
						var show = document.getElementById('password');
						if (show.type=='password') {
							show.type='text';
						}
						else{
							show.type='password';
						}

					}
				</script>
				<script language="javascript" type="text/javascript">
					
				</script>
				<script type="text/javascript">
function validar(e) { // 1
tecla = (document.all) ? e.keyCode : e.which; // 2
if (tecla==8) return true; // 3
patron =/[A-Za-z\s]/; // 4
te = String.fromCharCode(tecla); // 5
return patron.test(te); // 6
}
</script>

<script src="../Plugin/bootstrap/js/jquery-latest.js"></script>
<script src="../Plugin/bootstrap/js/bootstrap.min.js"></script>
<script src="../Plugin/bootstrap/js/sweetalert2.all.min.js"></script>

<script type="text/javascript">

   $('#formlogin').submit(function(e) {
   	e.preventDefault();
   	var username=$.trim($('#username').val())
   	var password=$.trim($('#password').val())
   	$('.env').click(function() {
       $('.env').text('Enviando...');
       $('.env').css('...');
    })
                    
   	if (username.length=="" || password.length=="") {
   		
   		Swal.fire({
  icon: 'warning',
  title: 'Debes de Ingesar el Usuario o Contraseña',
  footer: 'Sistema De Inventario',
  allowOutsideClick: false,
});
   	} else {
        var dataen ='username='+username +'&password='+password;

   		$.ajax({
        url : 'login.php',
        type : 'POST',
        data : dataen,
        success:function(resp) {
        	 $('#respa1').html(resp);
        	
}
      });
   	}

   });

</script>
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