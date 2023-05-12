<div class="modal ca" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-danger text-white">
				<h5 class="modal-title">Historial por Código y Fechas </h5>
				<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<form  id="formlogin"  method="POST" >
					<div class="form-group">
						<label style="float: left;">Codigo del Producto</label>
						<div  class="input-group " style="position: initial;">
							<input required type="number" class="form-control " id="codigo1" required readonly style="background: transparent;">
							<label class="input-group-text" for="inputGroupSelect01" onclick="return cods()" data-toggle="tooltip" data-placement="top" title="Seleccionar el Codigo">
								<svg class="bi " width="20" height="20" fill="currentColor">
									<use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#123"/>
								</svg>
							</label>
						</div>
					</div>
					<label style="float: left;">Hasta</label><input required type="Date" readonly  class="form-control bg-transparent " id="f1" required >
					<label style="float: left;margin-top:3%;">Hasta</label><input required type="Date" class="form-control " id="f2"  required>
					<div style="  display: -ms-flexbox;
					display: flex;
					float: right;
					padding-top: 1rem;">

					<button type="button" class="btn btn-secondary mr-2" data-dismiss="modal" aria-label="Close" aria-hidden="true">Close</button>
					<button type="submit" class="btn btn-primary">Buscar por Código y Fechas</button>
				</div>
			</form>
		</div>
		<div class=" p-2 text-center" style="border-top: 1px solid #e9ecef;">
			<p>Sistema De Inventario</p>

		</div>
	</div>
</div>
</div><script type="text/javascript">
	function cods() {
		Swal.fire({icon: 'info', showCloseButton: true,  html: '<form method="POST"  id="t"><p class="float-left">Departamento o Unidad</p><select id="unidad" class"unidad" name="unidad"  class="form-control" required>'+
			'<option selected disabled value="">Seleccinar</option>'+
			'<?php $sql = "SELECT No_Comprovante, descripcion,fecha_registro FROM historial Group by No_Comprovante"; $result = mysqli_query($conn, $sql);while ($productos = mysqli_fetch_array($result)){  ?><option  data-toggle="tooltip" data-placement="right" title="<?php echo $productos['descripcion'] ?>" value="<?php echo $productos['No_Comprovante']?>"><?php echo $productos['No_Comprovante']."-".substr($productos['descripcion'], 0, 25)."..."?><?php }?> </option>'+
			'</select><p class="float-left mt-1">Desde</p><select id="fecha" class"unidad" name="fecha"  class="form-control" required>'+
			'<option selected disabled value="">Seleccinar</option>'+
			'<?php $sql = "SELECT fecha_registro FROM historial Group by No_Comprovante"; $result = mysqli_query($conn, $sql);while ($productos = mysqli_fetch_array($result)){ $Fechas=$productos['fecha_registro'] ?><option  data-toggle="tooltip" data-placement="right"  ><?php echo $Fechas ?><?php }?> </option>'+
			'</select></form>',allowOutsideClick: false,}).then((resultado) =>{
				if (resultado.value) {
					var unidad=$.trim($('#unidad').val())
					var limpiar = document.getElementById('codigo1'); limpiar.value = unidad 

					var fecha=$.trim($('#fecha').val())
					var f = document.getElementById('f1'); f.value = fecha     


				}
			});
		}

		function codigo_fecha() {

			$(document).ready(function() {
				$('.ca').modal('show');
			})

			$('#formlogin').submit(function(e) {
				e.preventDefault();

				var unidad=$.trim($('#codigo1').val())
				var f1=$.trim($('#f1').val())
				var f2=$.trim($('#f2').val())

				Swal.fire({icon: 'success',  text:" En este Momento sera Redigido Hacia el Historial",allowOutsideClick: false,}).then((resultado) =>{
					if (resultado.value) {
						window.location.href='Vistas/Productos/Historial.php?Busqueda='+unidad+'&f1='+f1+'&f2='+f2+'&Consultar2';                               
					}
				});

			})
		}
		
	</script>