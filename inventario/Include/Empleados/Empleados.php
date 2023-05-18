
<link rel="stylesheet" type="text/css" href="../../Plugin/bootstrap/css/sweetalert2.min.css">
<link rel="stylesheet" type="text/css" href="../../Plugin/bootstrap/css/bootstrap.css">
<script src="../../Plugin/bootstrap/js/sweetalert2.all.min.js"></script>
<script src="../../Plugin/bootstrap/js/jquery-latest.js"></script>
<script src="../../Plugin/bootstrap/js/bootstrap.min.js"></script>

<?php $verificar1 =mysqli_query($conn, "SELECT id FROM tb_usuarios ");
if (!mysqli_num_rows($verificar1)>0) {?>
 

   <!-- Modal -->
   <div class="modal cs fade" data-backdrop="static" style="background: rgba(0, 0, 0, 1);" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered " role="document">
       <div class="modal-content">
         <div class="modal-header bg-dark text-light" >
           <h5 class="modal-title" id="exampleModalLongTitle">INFO</h5>
       </div>
       <div class="modal-body ">
        La sessión nos se ha registrado vuelva al iniciar sessión
       </div>
       <div class="modal-footer">
        <form method="POST" action="../../log/logout.php">
           <button type="submit" class="btn btn-primary">Iniciar Sessión</button>
            
        </form>
       </div>
   </div>
</div>
</div>
<?php } ?>

<script type="text/javascript">
    $(document).ready(function() {
        $('.cs').modal('show');
    })

</script>