<?php $verificar1 =mysqli_query($conn, "SELECT codCirculante FROM tb_circulante ");
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