<?php $verificar1 =mysqli_query($conn, "SELECT codBodega FROM tb_bodega ");
        if (!mysqli_num_rows($verificar1)>0) {?>
            <style>
                .c{
                    display: none;
                }
            </style>
        <?php }else{?>
            <style>
                .c{
                    display: block;
                }
            </style>
        <?php } ?>