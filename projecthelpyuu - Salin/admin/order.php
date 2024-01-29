<a href="<?php echo "?p=order&st=Semua"; ?>"><button type="button" class="btn btn-add">TRANSAKSI SEMUA</button></a>
<br>
<a href="<?php echo "?p=order&st=Baru"; ?>"><button type="button" class="btn btn-add">BARU</button></a>
<a href="<?php echo "?p=order&st=Lunas"; ?>"><button type="button" class="btn btn-add">LUNAS</button></a>
<a href="<?php echo "?p=order&st=Dikirim"; ?>"><button type="button" class="btn btn-add">DIKIRIM</button></a>
<a href="<?php echo "?p=order&st=Diterima"; ?>"><button type="button" class="btn btn-add">DITERIMA</button></a>
<br>
<?php
$batas = 4;
$halaman = $_GET["pg"];
if(empty($halaman)){
	$posisi = 0;
	$halaman = 1;
}else{
	$posisi = ($halaman - 1) * $batas;
}

if($_GET["st"] == "Semua"){
	$status = "";
}else{
	$status = "where statusorder='$_GET[st]'";
}

$sqlo = mysqli_query($kon, "select * from orders $status order by tglorder desc");
$no = 1;
while($ro= mysqli_fetch_array($sqlo)){
	if($ro["statusorder"] == "Baru"){
		$pilb = " selected"; $pill =""; $pilk = ""; $pilt = "";
	}
	if($ro["statusorder"] == "Lunas"){
		$pilb = ""; $pill =" selected"; $pilk = ""; $pilt = "";
	}
	if($ro["statusorder"] == "Dikirim"){
		$pilb = ""; $pill =""; $pilk = " selected"; $pilt = "";
	}
	if($ro["statusorder"] == "Diterima"){
		$pilb = ""; $pill =""; $pilk = ""; $pilt = " selected";
	}
	
	$sqlod = mysqli_query($kon, "select * from orders where idorder='$ro[idorder]'");
	$rod = mysqli_fetch_array($sqlod);
	$sqlag = mysqli_query($kon, "select * from anggota where idanggota='$rod[idanggota]'");
	$rag = mysqli_fetch_array($sqlag);
	
	echo "<div class='dh12'>";
	echo "<div class='card'>";
	echo "<div class='kepalacard'>";
	echo "#$ro[noorder]";
	echo "</div>";
	echo "<div class='isicard'>";
	echo "<br>Dipesan oleh : <b>$rag[nama]</b><br>";
	echo "Handphone &nbsp; &nbsp; <b>$rag[nohp]</b><br>";
	echo "Alamat Email : <b>$rag[email]</b><br>";
	echo "Alamat Pemesan : <b>$rag[alamat]</b><br>";
	echo "Dipesan Pada : <b>$ro[tglorder] WIB</b><br>";
	echo "tanggal pemesanan : <b>$ro[tanggalpemesanan]</b>";
	
	echo "<table border='0' cellpading='3px'>";
	$sqlordt = mysqli_query($kon, "select * from orderdetail where idorder='$ro[idorder]'");
	while($rordt = mysqli_fetch_array($sqlordt)){
		$sqlpr = mysqli_query($kon, "select * from produk where idproduk='$rordt[idproduk]'");
		$rpr = mysqli_fetch_array($sqlpr);
		$sqlj = mysqli_query($kon, "select * from jasakirim where idjasa='$rordt[idjasa]'");
		$rj = mysqli_fetch_array($sqlj);
		
		$hrg = number_format($rpr["harga"]);
		$disk = ($rpr["harga"] * $rpr["diskon"]) / 100;
		$hargabaru = $rpr["harga"] - $disk;
		$hrgbr = number_format($hargabaru);
		$brt = $rordt["jumlahbeli"] * $rpr["berat"];
		$berat = $berat + $brt;
		
		if ($rp["diskon"] > 0) {
			$diskon = "<font color='red'>-$rpr[diskon]%</font>";
			$hargalama = "<font style='text-decoration:line-through'>IDR $hrg</font>";
		} else {
			$diskon = "";
			$hargalama = "";
		}
		
		echo "<tr valign='top'>
		<td width='50px'><img src='../fotojasa/$rpr[foto1]' height='50px'></td>
		<td><b>$rpr[nama]</b>
		<br>  IDR $hrgbr
		
		</tr>";
	}
	echo "</table>";
	
	$sqlbyr = mysqli_query($kon, "select * from pembayaran where idorder='$ro[idorder]'");
	$rbyr = mysqli_fetch_array($sqlbyr);
	$rowbyr = mysqli_num_rows($sqlbyr);
	$jmltrs = number_format($rbyr["jumlahtransfer"]);
	
	if($rowbyr > 0){
		echo "<table width='100%' border='0'";
		echo "<tr>";
		echo "<td width='100px'><a href='../buktibayar/$rbyr[bukti]' target='_blank'><img src='../buktibayar/$rbyr[bukti]' width='50px'></a></td>";
		echo "<td>Ditransfer oleh : <br><b>$rbyr[namapengirim]</b></br>
				dari <b>$rbyr[namabankpengirim]</b><br>
				ke <b>$rbyr[namabankpenerima]</b><br>
				pada <b>$rbyr[tgltransfer]</b><br>
				sebesar <br><big><b>IDR $jmltrs</b></big></td>";
		echo "</tr>";
		echo "</table>";
	}
	
	echo "<form method='post' action='?p=orderstatus' enctype='multipart/form-data'>";
	echo "<input type='hidden' name='idorder' value='$ro[idorder]'>";
	echo "<input type='hidden' name='st' value='$_GET[st]'>";
	echo "<select name='statusorder'>";
	echo "<option value='Baru' $pilb>Baru</option>";
	echo "<option value='Lunas' $pill>Lunas</option>";
	echo "<option value='Dikirim' $pilk>Dikirim</option>";
	echo "<option value='Diterima' $pilt>Diterima</option>";
	echo "</select>";
	echo "<input type='submit' value='Ubah Status Pesanan'>";
	echo "</form><br>";
	$total = number_format($ro["total"]);
	echo "</div>";
	echo "<div class='kepalacard'>Total  : IDR $total</div>";
	echo "</div><br>";
	echo "</div>";
}

echo "<div class='dh12' align='right'>";
echo "Halaman ";

$sqlhal = mysqli_query($kon, "select * from orders $status");
$jmldata = mysqli_num_rows($sqlhal);
$jmlhal = ceil($jmldata / $batas);

for($i=1; $i<=$jmlhal; $i++){
	if($i == $halaman){
		echo "<span class='kotak'><b>$i</b></span> ";
	}
}

if($halaman > 1){
	$prev = $halaman - 1;
	echo "<span class='kotak'><a href='?p=order&pg=$prev&st=$_GET[st]'>&laquo; Prev</a></span>";
}else{
	echo "<span class='kotak'>&laquo; Prev</span>";
}

if($halaman < $jmlhal){
	$next = $halaman + 1;
	echo "<span class='kotak'><a href='?p=order&pg=$next&st=$_GET[st]'>Next &raquo;</a></span>";
}else{
	echo "<span class='kotak'>Next &raquo;</span>";
}

echo "Transaksi $_GET[st] <span class='kotak'><b>$jmldata</b></span>";
echo "<p></div>";
echo "<p>&nbsp;</p>";
?>










































