<?php
    mysqli_query($kon, "delete from cart where idcart='$_GET[idc]'");
    echo "<META HTTP-EQUIV='Refresh' Conten='1;
    URL=?P=keranjangbelanja&idag=$_GET[idag]'>";
    ?>
