<?php
if (empty($_SESSION["userag"]) and empty($_SESSION["passag"])) {
    echo "<p><div align='center'>Sebelum membeli produk kami, Anda harus login terlebih dahulu</div><p>";
    echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=login'>";
}else{
    $sqlc = mysqli_query($kon, "select idproduk from cart where idproduk='$_GET[idp]' and idanggota='$_GET[idag]'");
    $rowc = mysqli_num_rows($sqlc);

    $sqlp = mysqli_query($kon, "select * from produk where idproduk='$_GET[idp]'");
    $rp = mysqli_fetch_array($sqlp);

    
        if ($rowc == 0){
            mysqli_query($kon, "insert into cart (idproduk, idanggota, jumlahbeli, tglcart) values ('$_GET[idp]', '$_GET[idag]', 1, NOW())");
        }else{
            $sqlcr = mysqli_query($kon, "select * from cart where idproduk='$_GET[idp]'");
            $rcr = mysqli_fetch_array($sqlcr);
           $rcr= mysqli_query($kon, "update cart set jumlahbeli=jumlahbeli+1 where idproduk='$_GET[idp]' and idanggota='$_GET[idag]'");
            
        }
    
    echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?P=keranjangbelanja&idag=$rag[idanggota]'>";
}
?>
   