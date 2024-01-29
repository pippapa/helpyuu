<div class="container5">
    <div class="grid">
        <div class="dh12">

<?php
//Membuat Nomor Order
$tgl = date("d");
$bln = date("m");
$thn = date("Y");
$jam = date("H");
$mnt = date("i");
$dtk = date("s");

//Menyimpan data order
mysqli_query($kon, "insert into orders (noorder, idanggota, tanggalpemesanan, tglorder, statusorder) values ('$thn$bln$tgl$jam$mnt$dtk', '$_POST[idag]', '$_POST[tanggalpemesanan]', NOW(), 'Baru')");

//Mendapatkan ID Order
$idorder = mysqli_insert_id($kon);

//Memanggil fungsi dan menghitung produk yang dipesan
$sqlc =mysqli_query($kon, "select * from cart where idanggota='$_POST[idag]'");
$rowc = mysqli_num_rows($sqlc);
$jml = $rowc;

//menghapus data dari table cart
mysqli_query($kon, "delete from cart where idanggota='$_POST[idag]'");

//Menampilkan data dan order dari anggota
echo "<div class='kepalacard'>Terima Kasih</div>";
echo "<div class='isicard' style='text-align:left;'>";
echo "<p>NO. ORDER : <big><b>#$thn$bln$tgl$jam$mnt$dtk</b></big></p>";
echo "Nama <br> <big><b>$_POST[nama]</b></big><br>";
echo "Email <br> <big><b>$_POST[email]</b></big><br>";
echo "No. Handphone <br> <big><b>$_POST[nohp]</b></big><br>";
echo "Alamat <br> <big><b>$_POST[alamat]</b></big><br>";
echo "Tanggal Pemesanan <br> <big><b>$_POST[tanggalpemesanan]</b></big><br>";
echo "</div>";
echo "</div>";

while($rc = mysqli_fetch_array($sqlc)){
    //Merubah Stok di table produk
    $sqlp = mysqli_query($kon, "select * from produk where idproduk='$rc[idproduk]'");
    $rp = mysqli_fetch_array($sqlp);
    $stok = $rp["stok"];
    $jumlahbeli = $rc["jumlahbeli"];
    $stokakhir = $stok - $jumlahbeli;
    mysqli_query($kon, "update produk set stok='$stokakhir' where idproduk='$rc[idproduk]'");
    
    $no = $i + 1;
    $disk = ($rp["diskon"] * $rp["harga"]) / 100;
    $hrgbaru = $rp["harga"] - $disk;
    $subtotal = $jumlahbeli * $hrgbaru;
    $tot = $tot + $subtotal;
    $brt = $jumlahbeli *$rp["berat"];
    $berat = $berat + $brt;
    $st = number_format($subtotal);
    $hrg = number_format($rp["harga"]);
    $hrgbr = number_format($hrgbaru);

    if($rp["diskon"] > 0){
        $diskon ="<font color='red'>-$rp[diskon]%</font>";
        $hrglama ="<font style='text-decoration:line-through'>IDR $hrg</font>";
    }else{
        $diskon ="";
        $hrglama ="";
    }

    if(!empty($rp["foto1"])){
        $foto1 = "fotojasa/$rp[foto1]";
    }else{
        $foto1 = "foto/avatar.png";
    }

    echo "<div class='dh6'>";
    echo "<div class='card'>";
    echo "<div class='isicard'>";
    echo "<table width='100%' border='0' cellpadding='5' cellspacing='5'>";
    echo "<tr valign='top'>";
    echo "<td width='100px'>
        <img src='$foto1' width='100px'>
        </td>";
    echo"<td>
        <big>$rp[nama]</big><p>
        $diskon $hrglama<br>
        <big>IDR $hrgbr * $jumlahbeli</big>
        </td>";
    echo "</tr>";
    echo "</table>";
    echo "</div>";
    echo "<div class='kepalacard'>";
    echo "Subtotal : IDR $st";
    echo "</div>";
    echo "</div>";
    echo "<br>";
    echo "</div>";

    //Simpan data detail order
    mysqli_query($kon, "insert into orderdetail (idorder, idproduk, idjasa, jumlahbeli, subtotal) values ('$idorder', '$rc[idproduk]', '$_POST[idjasa]', '$jumlahbeli', '$subtotal')");
}

$sqlj = mysqli_query($kon, "select * from jasakirim where idjasa='$_POST[idjasa]'");
$rj = mysqli_fetch_array($sqlj);
$tarif = $berat * $rj["tarif"];
$trf = number_format($tarif);
$total = $tot + $tarif;
$t = number_format($total);

echo "<div class='dh12'>";
echo "<div class='kepalacard'>";

echo "<div class='kepalacard'>";
echo "Total : IDR $t";
echo "</div>";
echo "</div>";

//update data total
mysqli_query($kon, "update orders set total='$total' where idorder='$idorder'");
?>

<div class="dh12">
<div align="right"><a href="javascript:window.print()"><button type="button" class="btn btn-add">CetakFaktur</button></a></div>
<div align="right"><a href="?p=konfirmasi&idag=$rag[idanggota]"><button type="button" class="btn btn-add">Pembayaran</button></a></div>
</div>

</div>
</div>
<div>