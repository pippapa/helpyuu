<?php
$sqlp = mysqli_query($kon, "select * from produk where idproduk='$_GET[id]'");
$rp = mysqli_fetch_array($sqlp);
?>
<a href="?p=produk"><button type="button" class="btn btn-add">PRODUK</button></a>
<button type="button" class="btn btn-dis">Ubah Produk</button>
<br>
<div class="card">
    <div class="kepalacard">Ubah Produk</div>
    <div class="isicard" style="text-align:center;">
        <form name="form1" method="post" action="" enctype="multipart/form-data">
            <input name="idproduk" type="hidden" value="<?php echo $rp['idproduk']; ?>" />
            <?php
            $sqlk = mysqli_query($kon, "select * from kategori where idkat='$rp[idkat]'");
            $rk = mysqli_fetch_array($sqlk);
            ?>
            <input name="namakat" type="text" disabled value="<?php echo $rk['namakat']; ?>" />
            <input name="nama" type="text" id="nama" placeholder="Nama Produk" value="<?php echo $rp['nama']; ?>">
            <input name="harga" type="text" id="harga" placeholder="Harga Produk (dalam Rp.)" value="<?php echo $rp['harga']; ?>">
           
            <textarea name="spesifikasi" id="spesifikasi" placeholder="Spesifikasi Produk"><?php echo $rp['spesifikasi']; ?></textarea>
            <textarea name="detail" id="detail" placeholder="Detail Produk"><?php echo $rp['detail']; ?></textarea>
            <input name="diskon" type="text" id="diskon" placeholder="Diskon Produk (dalam%)" value="<?php echo $rp['diskon']; ?>">
          
           
            <p><img src="<?php echo "../fotojasa/$rp[foto1]"; ?>" height="200px">
                <input name="foto1" type="file" id="foto1">
            <p><img src="<?php echo "../fotojasa/$rp[foto2]"; ?>" height="200px">
                <input name="foto2" type="file" id="foto2">
                <input name="simpan" type="submit" id="simpan" value="SIMPAN JASA">
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["simpan"])) {
            if (!empty($_POST["nama"]) && !empty($_POST["harga"]) && !empty($_POST["spesifikasi"]) && !empty($_POST["detail"])) {
                $nmfoto1 = $_FILES["foto1"]["name"];
                $lokfoto1 = $_FILES["foto1"]["tmp_name"];
                if (!empty($lokfoto1)) {
                    move_uploaded_file($lokfoto1, "../fotojasa/$nmfoto1");
                    $foto1 = ", foto1='$nmfoto1'";
                } else {
                    $foto1 = "";
                }

                $nmfoto2 = $_FILES["foto2"]["name"];
                $lokfoto2 = $_FILES["foto2"]["tmp_name"];
                if (!empty($lokfoto2)) {
                    move_uploaded_file($lokfoto2, "../fotojasa/$nmfoto2");
                    $foto2 = ", foto2='$nmfoto2'";
                } else {
                    $foto2 = "";
                }

                $sqlp = mysqli_query($kon, "update produk set nama='{$_POST['nama']}', harga='{$_POST['harga']}', spesifikasi='{$_POST['spesifikasi']}', detail='{$_POST['detail']}', diskon='{$_POST['diskon']}' $foto1 $foto2 where idproduk='{$_POST['idproduk']}'");
                if ($sqlp) {
                    echo "Perubahan Produk Berhasil Disimpan";
                } else {
                    echo "Gagal Menyimpan";
                }
                echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=produk'>";
            } else {
                echo "Data harus diisi dengan lengkap !!!";
            }
        }
        ?>