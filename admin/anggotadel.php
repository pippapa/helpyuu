<?php 
$sqlag = mysqli_query($kon, "DELETE from anggota where idanggota='$_GET[idag]'");

if($sqlag){
	echo "Anggota Berhasil Dihapus";
}else{
	echo "Gagal Mengapus";
}
echo "<MWTA HTTP-EQUIV='Refresh' Content='1; URL=?p=anggota'>";
?>