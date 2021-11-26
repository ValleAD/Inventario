<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/estilo_menu.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="styles/modal.css">
</head>
<body>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <a href="home.php" class="enlace">
            <img src="img/log.png" alt="" class="logo">
        </a>
        <ul>
        <li><a href="reg_producto.php">Registro de productos</a></li>
            <li><a href="form_sol_bodega.php">Solicitud de materiales a bodega</a></li>
            <li><a href="form_vale.php">Vale</a></li>
            <li><a href="form_sol_almacen.php">Solicitud de materiales a almacen</a></li>
            <li><a href="form_sol_compra.php">Solicitud de compra</a></li>
            <li><a href="form_sol_circulante.php">Solicitud de fondo circulante</a></li>
            

            <div class="modal">
        <div class="modal-content">
            <button class="close-modal">
                <i class="fas fa-times"></i>
            </button>
            <div class="title">Perfil</div>
            
            
              <img src="img/logo1.png" style="width:  25%">
              
                <p class="info">Nombre:<br>Apellido:<br>Email:</p>
            <div class="actions">
                <button class="cancel">Cancel</button>
                <button><a href="logout.php">Cerrar Sesion</a></button>
            </div>
        </div>
    </div>

    <button class="open-modal">Perfil</button>

    <script>
        var btnOpen = document.querySelector('.open-modal');
        var btnClose = document.querySelector('.close-modal');
        var modal = document.querySelector('.modal');
        var toggleOpenClose = () => {
            modal.classList.toggle('opened')
        }

        btnOpen.addEventListener('click', toggleOpenClose);
        btnClose.addEventListener('click', toggleOpenClose);

    </script>

        </li>
        </ul>
    </nav>
    <section></section>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>