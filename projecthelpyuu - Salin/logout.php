<?php 
session_start();
session_destroy();
echo "<p><div align='center'> Anda sudah loguot, kami tungggu kunjungan anda kembali</div><p>";
echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=beranda'>";
?>