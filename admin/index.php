<?php
session_start();
include "koneksi.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <link rel="stylesheet" href="style112.css" type="text/css" />
    <title>Administrator epwm Online Shop</title>
</head>

<body>

    <?php
    if (!empty($_SESSION["useradm"]) && !empty($_SESSION["passadm"])) {
        $sqla = mysqli_query($kon, "select * from admin where username='$_SESSION[useradm]' and password='$_SESSION[passadm]'");
        $ra = mysqli_fetch_array($sqla);
    ?>

        <div class="grid">
            <div class="dh12">
                <div class="container1">
                    <span style="font-size:20px; cursor:pointer; padding-right:15px;" onclick="openNav()">&#9776;</span>
                    <a href="<?php echo "?p=home"; ?>">ADMIN HELPYUU</a>
                </div>
            </div>
        </div>

        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <img src="../foto/avatar.jpg" width="150px" />
            <p>Selamat Datang</p>
            <h3><?php echo "$ra[namalengkap]"; ?></h3>
            <hr><a href="<?php echo "?p=home"; ?>">Beranda</a>
            <hr><a href="<?php echo "?p=kategori"; ?>">Kategori</a>
            <hr><a href="<?php echo "?p=produk"; ?>">layanan dan jasa</a>
            <hr><a href="<?php echo "?p=anggota"; ?>">Anggota</a>
            <hr><a href="<?php echo "?p=order&st=semua"; ?>">Transaksi</a>
            <hr><a href="<?php echo "?p=logout"; ?>">Logout</a>
        </div>

        <script>
            function openNav() {
                document.getElementById("mySidenav").style.width = "350px";
            }

            function closeNav() {
                document.getElementById("mySidenav").style.width = "0px";
            }
        </script>

        <div class="grid">
            <div class="dh12">
                <div class="container2">
                    <?php
               if ($_GET["p"] == "logout") {
               		include "logout.php";
               } else if ($_GET["p"] == "kategori") {
               		include "kategori.php";
               } else if ($_GET["p"] == "kategoriadd") {
               		include "kategoriadd.php";
               } else if ($_GET["p"] == "kategoriedit") {
                    include "kategoriedit.php";
               } else if ($_GET["p"] == "kategoridel") {
                    include "kategoridel.php";
			   } else if ($_GET["p"] == "produk") {
                    include "produk.php";
			   } else if ($_GET["p"] == "produkadd") {
                    include "produkadd.php";
			   } else if ($_GET["p"] == "produkedit") {
                    include "produkedit.php";
			   } else if ($_GET["p"] == "produkdel") {
                    include "produkdel.php";
			   } else if ($_GET["p"] == "produkdetail") {
                    include "produkdetail.php";
			   } else if ($_GET["p"] == "anggota") {
                    include "anggota.php";
			   } else if ($_GET["p"] == "anggotadel") {
                    include "anggotadel.php";
			   } else if ($_GET["p"] == "order") {
                    include "order.php";
			   } else if ($_GET["p"] == "orderdetail") {
                    include "orderdetail.php";
                } else if ($_GET["p"] == "orderstatus") {
                    include "orderstatus.php";
               } else {
                    include "home.php";
               }
            ?>
         </div>
         </div>
         </div>

         <div class="grid">
            <div class="dh12">
                <div class="container3">
                    Copyright &copy; PIPAPPUPA | 2024
                </div>
            </div>
        </div>

    <?php
    } else {
        include "login.php";
    }
    ?>

</body>

</html>